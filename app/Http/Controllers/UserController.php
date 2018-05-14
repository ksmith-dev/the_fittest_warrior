<?php

namespace App\Http\Controllers;


use App\FormSelect;
use App\User;
use App\Group;
use App\Member;
use App\FormColumns;
use App\FormInput;
use App\FormLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    // list of editable columns for user table
    private $editable = array(
        'user' => array(
            'first_name',
            'last_name',
            'email',
            'address',
            'unit',
            'city',
            'state',
            'zip',
            'age',
            'sex',
            'weight',
            'height',
            'b_m_i'
        ),
        'advertisement' => array(
            "user_id",
            "company_name",
            "subscription",
            "frequency",
            "pricing",
            "banner_src",
            "banner_alt",
            "message",
            "link",
            "status",
        ),
        'member' => array(
            "user_id",
            "group_id",
            "group_role",
            "status"
        ),
    );

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        if (Auth::check()) {

            $user = Auth::user();

            $badges = DB::table('badge')->where('user_id', $user->id)->get();

            return view('account', ['user' => $user, 'badges' => $badges]);

        } else {
            return redirect('/');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form(Request $request) {

        $model = null;
        $columns = null;
        $states = array(
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District Of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
        );
        $sex = array('male' => 'Male', 'female' => 'Female');

        if (Auth::check() &&  Auth::user()->role == 'admin' && $request->identity) {

            if ($request->data_type == 'user')
            {
                $columns = Schema::getColumnListing('user');

                if ($request->identity)
                {
                    $model = User::find($request->identity);
                }
            }

            if ($request->data_type == 'advertisement')
            {
                $columns = Schema::getColumnListing('advertisement');

                if ($request->identity)
                {
                    $model = DB::table('advertisement')->where('id', $request->identity)->first();
                }
            }

            if ($request->data_type == 'member')
            {
                $columns = Schema::getColumnListing('member');

                if ($request->identity)
                {
                    $model = DB::table('member')->where('id', $request->identity)->first();
                }
            }

            $forms = new FormColumns();

            foreach ($columns as $column) {

                if ($this->isEditable($column, $request->data_type)) {

                    if ($column == 'state' || $column == 'sex')
                    {
                        $label = new FormLabel();
                        $label->setFor($column);
                        $label->setValue($column);
                        $label->setClass('col-md-4 col-form-label text-md-right');
                        $forms->addFormLabel($label);

                        $select = new FormSelect();
                        $select->setId($column);
                        $select->setName($column);
                        $select->setClass('form-control');

                        if ($column == 'state') { $select->setOptions($states); }
                        if ($column == 'sex') { $select->setOptions($sex); }

                        $forms->addFormSelect($select);
                    } else {
                        $label = new FormLabel();
                        $label->setFor($column);
                        if ($request->data_type == 'member')
                        {
                            if ($column == 'user_id')
                            {
                                $label->setValue('user_name');
                            } elseif($column == 'group_id')
                            {
                                $label->setValue('group_name');
                            } else {
                                $label->setValue($column);
                            }
                        } else {
                            $label->setValue($column);
                        }
                        $label->setClass('col-md-4 col-form-label text-md-right');
                        $forms->addFormLabel($label);

                        $input = new FormInput();
                        $input->setType('text');
                        $input->setClass('form-control');
                        $input->setName($column);
                        $input->setIdentity($column);
                        if ($request->data_type == 'member')
                        {
                            if (!empty($model))
                            {
                                if ($column == 'user_id')
                                {
                                    $user = User::find($model->$column);

                                    if (!empty($user)) { $input->setValue($user->first_name . ' ' . $user->last_name); }
                                } elseif($column == 'group_id') {
                                    $group = Group::find($model->$column);

                                    if (!empty($group)) { $input->setValue($group->name); }
                                }else {
                                    $input->setValue(strval($model->$column));
                                }
                            }
                        } else {
                            if (!empty($model)) { $input->setValue(strval($model->$column)); }
                        }
                        $input->setPlaceholder(ucwords(str_replace('_', ' ', 'enter ' . $column)));
                        $forms->addFormInput($input);
                    }
                }
            }

            $forms = $forms->getFormColumns();

            return view('forms.form', ['data_type' => $request->data_type, 'data_id' => $request->identity, 'model' => $model, 'states' => $states, 'forms' => $forms]);

        } else {

            if ($request->data_type == 'user')
            {
                $columns = Schema::getColumnListing('user');

                $model = Auth::user();
            }

            $forms = new FormColumns();

            foreach ($columns as $column) {

                if ($this->isEditable($column, $request->data_type)) {

                    if ($column == 'state' || $column == 'sex')
                    {
                        $label = new FormLabel();
                        $label->setFor($column);
                        $label->setValue($column);
                        $label->setClass('col-md-4 col-form-label text-md-right');
                        $forms->addFormLabel($label);

                        $select = new FormSelect();
                        $select->setId($column);
                        $select->setName($column);
                        $select->setClass('form-control');

                        if ($column == 'state') { $select->setOptions($states); }
                        if ($column == 'sex') { $select->setOptions($sex); }

                        $forms->addFormSelect($select);
                    } else {
                        $label = new FormLabel();
                        $label->setFor($column);
                        $label->setValue($column);
                        $label->setClass('col-md-4 col-form-label text-md-right');
                        $forms->addFormLabel($label);

                        $input = new FormInput();
                        $input->setType('text');
                        $input->setClass('form-control');
                        $input->setName($column);
                        $input->setIdentity($column);
                        if (!empty($model)) { $input->setValue(strval($model->$column)); }
                        $input->setPlaceholder(ucwords(str_replace('_', ' ', 'enter ' . $column)));
                        $forms->addFormInput($input);
                    }
                }
            }

            $forms = $forms->getFormColumns();

            return view('forms.form', ['data_type' => $request->data_type, 'data_id' => Auth::user()->getAuthIdentifier(), 'model' => $model, 'states' => $states, 'forms' => $forms]);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        if (Auth::check() && Auth::user()->role == 'admin' && $request->identity)
        {
            $data_type = $request->data_type;
            $identity = $request->identity;

            $request = $request->all();

            validator($request);

            if ($data_type == 'user')
            {
                if ($request['data_type'] == 'user')
                {
                    $user = User::find($request['id']);

                    if (!empty($request['first_name'])) { $user->first_name = $request['first_name']; }
                    if (!empty($request['last_name'])) { $user->last_name = $request['last_name']; }
                    if (!empty($request['email'])) { $user->email = $request['email']; }
                    if (!empty($request['address'])) { $user->address = $request['address']; }
                    if (!empty($request['unit'])) { $user->unit = $request['unit']; }
                    if (!empty($request['city'])) { $user->city = $request['city']; }
                    if (!empty($request['state'])) { $user->state = $request['state']; }
                    if (!empty($request['age'])) { $user->age = $request['age']; }
                    if (!empty($request['sex'])) { $user->sex = $request['sex']; }
                    if (!empty($request['zip'])) { $user->zip = $request['zip']; }
                    if (!empty($request['weight'])) { $user->weight = $request['weight']; }
                    if (!empty($request['height'])) { $user->height = $request['height']; }
                    if (!empty($request['b_m_i'])) { $user->b_m_i = $request['b_m_i']; }

                    $user->save();

                    return redirect('admin/users');
                }
            }

            if ($data_type == 'advertisement')
            {
                if (empty($identity))
                {
                    DB::table('advertisement')->insert([
                        'user_id' => intval($request['user_id']),
                        'company_name' => $request['company_name'],
                        'subscription' => $request['subscription'],
                        'frequency' => $request['frequency'],
                        'pricing' => $request['pricing'],
                        'banner_src' => $request['banner_src'],
                        'banner_alt' => $request['banner_alt'],
                        'message' => $request['message'],
                        'link' => $request['link'],
                        'status' => $request['status']
                    ]);
                } else {
                    DB::table('advertisement')->where('id', $identity)->update([
                        'user_id' => intval($request['user_id']),
                        'company_name' => $request['company_name'],
                        'subscription' => $request['subscription'],
                        'frequency' => $request['frequency'],
                        'pricing' => $request['pricing'],
                        'banner_src' => $request['banner_src'],
                        'banner_alt' => $request['banner_alt'],
                        'message' => $request['message'],
                        'link' => $request['link'],
                        'status' => $request['status']
                    ]);
                }

                return redirect('admin/' . $data_type . 's');
            }

            if ($data_type == 'member')
            {
                //input name is user_id
                $name_array = explode(' ', $request['user_id']);

                if (sizeof($name_array) == 2)
                {
                    $user = DB::table('user')->where([
                        ['first_name', '=', $name_array[0]],
                        ['last_name', '=', $name_array[1]],
                    ])->get();
                } elseif (sizeof($name_array) == 1) {
                    $user = DB::table('user')->where('first_name', '=', $name_array[0])->get();
                }

                $group = DB::table('fitness_group')->where('name', 'like', $request['group_id'])->get();

                if (sizeof($user) == 1 && sizeof($group) == 1)
                {
                    if (empty($identity))
                    {
                        DB::table('member')->insert([
                            'user_id' => intval($user->id),
                            'group_id' => intval($group->id),
                            'group_role' => $request['group_role'],
                            'status' => $request['status']
                        ]);
                    } else {
                        DB::table('member')->where('id', $identity)->update([
                            'user_id' => intval($user->id),
                            'group_id' => intval($group->id),
                            'group_role' => $request['group_role'],
                            'status' => $request['status']
                        ]);
                    }

                    return redirect('admin/' . $data_type);

                } else {
                    return redirect('admin');
                }
            }
        } else {
            $data_type = $request->data_type;

            $request = $request->all();

            validator($request);

            if ($data_type == 'user')
            {
                if ($request['data_type'] == 'user')
                {
                    $user = User::find(Auth::user()->getAuthIdentifier());

                    if (!empty($request['first_name'])) { $user->first_name = $request['first_name']; }
                    if (!empty($request['last_name'])) { $user->last_name = $request['last_name']; }
                    if (!empty($request['email'])) { $user->email = $request['email']; }
                    if (!empty($request['address'])) { $user->address = $request['address']; }
                    if (!empty($request['unit'])) { $user->unit = $request['unit']; }
                    if (!empty($request['city'])) { $user->city = $request['city']; }
                    if (!empty($request['state'])) { $user->state = $request['state']; }
                    if (!empty($request['age'])) { $user->age = $request['age']; }
                    if (!empty($request['sex'])) { $user->sex = $request['sex']; }
                    if (!empty($request['zip'])) { $user->zip = $request['zip']; }
                    if (!empty($request['weight'])) { $user->weight = $request['weight']; }
                    if (!empty($request['height'])) { $user->height = $request['height']; }
                    if (!empty($request['b_m_i'])) { $user->b_m_i = $request['b_m_i']; }

                    $user->save();

                    return redirect('/account');
                }
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function admin(Request $request) {

        $admin = Auth::user();

        if (empty($admin)) {
            return redirect('/');
        } else {

            if ($admin->role == 'admin') {

                switch ($request->data_type) {
                    case 'advertisements':
                        return $this->adminAdvertisements();
                        break;
                    case 'users':
                        return $this->adminUsers();
                        break;
                    case 'members':
                        return $this->adminMembers();
                        break;
                    case 'user' :
                        return $this->adminEditUser($request->identity);
                    default:
                        return $this->adminDefault();
                }
            } else {

                // semantic assignment - user not admin
                $user = $admin;

                return redirect('account', ['user' => $user]);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deactivate(Request $request)
    {
        $result = DB::table($request->data_type)->where('id', $request->identity)->first();

        if (!empty($result))
        {
            if ($result->status == 'active')
            {
                DB::table($request->data_type)->where('id', $request->identity)->update(
                    ['status' => 'deactivated']
                );
            } else {
                DB::table($request->data_type)->where('id', $request->identity)->update(
                    ['status' => 'active']
                );
            }

        }

        return redirect('/admin/' . $request->data_type . 's');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminAdvertisements() {

        $advertisements = DB::table('advertisement')->get();

        return view('admin', ['advertisements' => $advertisements]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminUsers() {

        $users = User::all();

        return view('admin', ['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminMembers() {

        $members = Member::all();

        foreach ($members as $member) {

            $user = User::find($member->user_id);
            $member->user_name = $user['first_name'] . ' ' .  $user['last_name'];

            $group = Group::find($member->group_id);
            $member->group_name = $group['name'];
        }

        return view('admin', ['members' => $members]);
    }

    /**
     * @param string $identity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminEditUser(string $identity)
    {
        $user = User::find($identity);

        return view('forms.account', ['user' => $user]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminDefault() {
        return view('admin', []);
    }

    /**
     * @param string $column
     * @param string $data_type
     * @return bool
     */
    private function isEditable(string $column, string $data_type)
    {
        return in_array($column, $this->editable[$data_type]);
    }
}
