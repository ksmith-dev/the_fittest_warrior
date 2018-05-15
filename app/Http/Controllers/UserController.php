<?php

namespace App\Http\Controllers;



use App\User;
use App\Group;
use App\Member;
use App\FormFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /*--------------------------------- GLOBAL INPUT STRUCTURE ---------------------------------*/
    /*---- MAKE EDITS BEFORE ADDING THIS AS A PARAMETER IF YOU NEED TO CHANGE FUNCTIONALITY ----*/
    // list of protected columns - will be ignored by parser
    private $_protected = array('id', 'password', 'remember_token', 'created_at', 'updated_at');
    // key => value pairs of 'option value' => 'option label'
    private $_states = array(
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
    private $_sex = array('male' => 'male', 'female' => 'female');
    private $_status = array('active' => 'active', 'deactivated' => 'deactivated');
    private $_roles = array('admin' => 'admin', 'member' => 'member', 'guest' => 'guest');
    private $_group_roles = array('admin' => 'admin', 'member' => 'member', 'guest' => 'guest', 'coach' => 'coach');
    // key => value pairs of 'mixed' => 'mixed' look at default for further info
    private $_input_structure = null;
    /*--------------------------------- GLOBAL INPUT STRUCTURE ---------------------------------*/

    /**
     * UserController constructor.
     * @param array|null $input_structure
     */
    public function  buildInputStructure(array $input_structure = null)
    {
        if (empty($input_structure))
        {
            $this->_input_structure['class'] = array('label' => 'col-md-4 col-form-label text-md-right', 'input' => 'form-control', 'select' => 'form-control');
            // key => value pairs of 'old label' => 'new label'
            $this->_input_structure['override_label'] = array('user_id' => 'user_name', 'group_id' => 'group_name');
            //list input types other than of type text
            $this->_input_structure['override_type'] = array('state' => 'select', 'sex' => 'select', 'status' => 'select', 'role' => 'select', 'group_role' => 'select');
            // key => value pairs 'column key' => array of options (example should be seen above)
            $this->_input_structure['options'] = array('state' => $this->_states, 'sex' => $this->_sex, 'status' => $this->_status, 'role' => $this->_roles, 'group_role' => $this->_group_roles);
            // list of columns that will be ignored by form factory and not displayed on form for editing
            $this->_input_structure['protected'] = $this->_protected;
        } else {
            $this->_input_structure = $input_structure;
        }
    }

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

        //builds global form input structure,
        //no param will result in a default structure
        $this->buildInputStructure();

        $model = null;
        $inputs = null;

        if (Auth::check())
        {
            if (Auth::user()->role == 'admin')
            {
                if ($request->data_type == 'user')
                {
                    empty($request->identity) ? $model = Auth::user() : $model = User::find($request->identity);
                    $inputs = new FormFactory('user', $this->_input_structure);
                }
                if ($request->data_type == 'advertisement')
                {
                    empty($request->identity) ? $model = null : $model = DB::table('advertisement')->where('id', $request->identity)->first();
                    $inputs = new FormFactory('advertisement', $this->_input_structure);
                }
                if ($request->data_type == 'member')
                {
                    empty($request->identity) ? $model = null : $model = Member::find($request->identity);

                    if(empty($model))
                    {
                        // do nothing
                    } else {
                        $user = User::find($model['user_id']);
                        $model['user_id'] = $user['first_name'] . ' ' . $user['last_name'];

                        $group = Group::find($model['group_id']);
                        $model['group_id'] = $group['name'];
                    }
                    $inputs = new FormFactory('member', $this->_input_structure);
                }
            } else {
                if ($request->data_type == 'user')
                {
                    $model = Auth::user();
                    $local_input_structure = $this->_input_structure;
                    array_push($local_input_structure['protected'], 'role');
                    $inputs = new FormFactory('user', $local_input_structure);
                }
            }

        } else {
            return view('/login');
        }

        $inputs->createFormInputs();
        $inputs = $inputs->getInputs();

        return view('forms.form', ['data_type' => $request->data_type, 'data_id' => $request->identity, 'model' => $model, 'states' => $this->_states, 'inputs' => $inputs]);
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
                $user = User::find($request['id']);

                $columns = Schema::getColumnListing('user');

                foreach ($columns as $column)
                {
                    if (!in_array($column, $this->_protected))
                    {
                        empty($request[$column]) ? null : $user->$column = $request[$column];
                    }
                }

                $user->save();

                return redirect('admin/users');
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

                    $columns = Schema::getColumnListing('user');

                    foreach ($columns as $column)
                    {
                        if (!in_array($column, $this->_protected))
                        {
                            empty($request[$column]) ? null : $user->$column = $request[$column];
                        }
                    }

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

        if (!empty($admin))
        {
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
        } else {
            return redirect('/login');
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
}
