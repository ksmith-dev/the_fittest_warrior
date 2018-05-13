<?php

namespace App\Http\Controllers;

use App\Group;
use App\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form() {

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

        if (Auth::check()) {

            $user = Auth::user();

            return view('forms.account', ['user' => $user, 'states' => $states]);

        } else {

            return view('forms.account', ['states' => $states]);

        }

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $request = $request->all();

        validator($request);

        $user = User::find(Auth::user()->getAuthIdentifier());

        if ($request['id'] == $user->id) {

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

            return redirect('account');

        } else {
            return redirect('account');
        }


    }

    public function admin($data_type = null) {

        $admin = Auth::user();

        if (empty($admin)) {
            return redirect('/');
        } else {

            if ($admin->role == 'admin') {

                switch ($data_type) {
                    case 'advertisements':
                        return $this->adminAdvertisements();
                        break;
                    case 'users':
                        return $this->adminUsers();
                        break;
                    case 'members':
                        return $this->adminMembers();
                        break;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function adminAdvertisements() {

        $advertisements = DB::table('advertisement')->get();

        return view('admin', ['advertisements' => $advertisements]);
    }

    private function adminUsers() {

        $users = User::all();

        return view('admin', ['users' => $users]);
    }

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

    private function adminDefault() {
        return view('admin', []);
    }
}
