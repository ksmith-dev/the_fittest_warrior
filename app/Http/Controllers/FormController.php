<?php

namespace App\Http\Controllers;

use App\Health;
use App\Nutrition;
use App\User;
use App\Group;
use App\Member;
use App\FormFactory;
use App\Advertisement;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class FormController extends Controller
{
    /*--------------------------------- GLOBAL INPUT STRUCTURE ---------------------------------*/
    /*---- MAKE EDITS BEFORE ADDING THIS AS A PARAMETER IF YOU NEED TO CHANGE FUNCTIONALITY ----*/
    // list of protected columns - will be ignored by parser
    private $_protected = array(
            'global' => array('id', 'password', 'remember_token', 'created_at', 'updated_at'),
            'user' => array('role'),
            'member' => array(),
            'advertisements' => array(),
            'nutrition' => array('user_id')
        );
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
            $this->_input_structure['override_label'] = array('b_m_i' => 'body_mass_index');
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

            $params['badges'] = DB::table('badge')->where('user_id', $user->id)->get();
            $params['form_type'] = 'user';

            return view('account', ['params' => $params, 'user' => $user]);

        } else {
            return redirect('/login');
        }

    }

    public function formModified(Request $request)
    {
        switch ($request->modifier)
        {
            case 'toggle_status' :
                $this->toggleStatus($request);
                break;
            case null :
                // do nothing
                break;
            default :
                $request->workout_type = $request->modifier;
                $this->form($request);
                break;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form(Request $request) {

        /*---- this builds global form structure  ----*/
        $this->buildInputStructure();
        /*----- no parameters will use defaults  -----*/

        $model = null;
        $inputs = null;

        if (Auth::check())
        {
            // available only to site admin
            if (Auth::user()->role == 'admin')
            {
                switch ($request->type)
                {
                    case 'user' :
                        empty($request->identity) ? $model = Auth::user() : $model = User::find($request->identity);
                        $local_input_structure = $this->_input_structure;
                        array_push($local_input_structure['protected']['global'], 'role');
                        $inputs = new FormFactory('user', $local_input_structure);
                        break;
                    case 'advertisement' :
                        empty($request->identity) ? $model = new Advertisement() : $model = Advertisement::find($request->identity);
                        $inputs = new FormFactory('advertisement', $this->_input_structure);
                        break;
                    case 'member' :
                        empty($request->identity) ? $model = new Member() : $model = Member::find($request->identity);
                        $inputs = new FormFactory('member', $this->_input_structure);
                }
            }
            // available to all users except site admin
            if (Auth::user()->role != 'admin')
            {
                switch ($request->type)
                {
                    case 'user' :
                        $model = Auth::user();
                        $local_input_structure = $this->_input_structure;
                        array_push($local_input_structure['protected']['global'], 'role');
                        $inputs = new FormFactory('user', $local_input_structure);
                        break;
                }
            }

            // available to all users
            switch ($request->type)
            {
                case 'workout' :
                    empty($request->identity) ? $model = new Workout() : $model = Workout::find($request->identity);
                    $inputs = new FormFactory('workout', $this->_input_structure);
                    break;
                case 'health' :
                    empty($request->identity) ? $model = new Health() : $model = Health::find($request->identity);
                    $inputs = new FormFactory('health', $this->_input_structure);
                    break;
                case 'nutrition' :
                    empty($request->identity) ? $model = new Nutrition() : $model = Nutrition::find($request->identity);
                    $local_input_structure = $this->_input_structure;
                    array_push($local_input_structure['protected']['global'], 'role');
                    $inputs = new FormFactory('nutrition', $local_input_structure);
                    break;
            }

            $inputs->createFormInputs();
            $inputs = $inputs->getInputs();

            $params['form_type'] = $request->type;
            $params['form_id'] = $request->identity;

            return view('forms.form', ['params' => $params, 'model' => $model, 'inputs' => $inputs]);
        }
        else
        {
            return view('/login');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $url = null;
        $model = null;
        $columns = null;
        $local_protected['user'] = array('role');
        $local_protected['member'] = array();
        $local_protected['advertisement'] = array();

        $inputs = $request->all();

        validator($inputs);

        if (Auth::check())
        {
            if (Auth::user()->role == 'admin')
            {
                switch ($request->type)
                {
                    case 'user' :
                        empty($request->identity) ? $model = new User() : $model = User::find($request->identity);
                        $columns = Schema::getColumnListing('user');
                        // remove protected columns - unique case
                        unset($columns[array_search('role', $columns)]);
                        break;
                    case 'member' :
                        empty($request->identity) ? $model = new Member() : Member::find($request->identity);
                        $columns = Schema::getColumnListing('member');
                        break;
                    case 'advertisement' :
                        empty($request->identity) ? $model = new Advertisement() : Advertisement::find($request->identity);
                        $columns = Schema::getColumnListing('advertisement');
                        break;
                }
                $url = 'admin/dashboard';
            }
            if (Auth::user()->role != 'admin')
            {
                switch ($request->type)
                {
                    case 'user' :
                        $model = Auth::user();
                        $columns = Schema::getColumnListing('user');
                        unset($columns[array_search('role', $columns)]);
                        break;
                }
                $url = 'account';
            }
            else
            {
                switch ($request->type)
                {
                    case 'workout' :
                        empty($request->identity) ? $model = new Workout() : $model = Workout::find($request->identity);
                        $columns = Schema::getColumnListing('workout');
                        $url = 'workout/' . $model->id;
                        break;
                    case 'health' :
                        empty($request->identity) ? $model = new Health() : $model = Health::find($request->identity);
                        $columns = Schema::getColumnListing('health');
                        $url = 'health';
                        break;
                    case 'nutrition' :
                        empty($request->identity) ? $model = new Nutrition() : $model = Nutrition::find($request->identity);
                        $columns = Schema::getColumnListing('nutrition');
                        $url = 'nutrition';
                        break;
                }
            }

            if (!empty($model) && !empty($columns))
            {
                foreach ($columns as $column)
                {
                    if (!in_array($column, $this->_protected['global']))
                    {
                        empty($inputs[$column]) ? $model->$column = null : $model->$column = $inputs[$column];
                    }
                }
                $model->save();
                return redirect($url);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function admin(Request $request) {

        if (Auth::check())
        {
            if (Auth::user()->role == 'admin') {

                switch ($request->type) {
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
            }
            else
            {
                return redirect('account', ['user' => Auth::user()]);
            }
        } else {
            return redirect('/login');
        }
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function toggleStatus(Request $request)
    {
        $result = DB::table($request->type)->where('id', $request->identity)->first();

        if (!empty($result))
        {
            if ($result->status == 'active')
            {
                DB::table($request->type)->where('id', $request->identity)->update(
                    ['status' => 'deactivated']
                );
            } else {
                DB::table($request->type)->where('id', $request->identity)->update(
                    ['status' => 'active']
                );
            }
        }

        return redirect('/admin/' . $request->type . 's');
    }
}
