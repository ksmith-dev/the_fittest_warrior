<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Member;
use App\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    /**
     * @param Request $request
     * @param $group_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $group_id)
    {


        $param = null;
        $param['user_is_member'] = false;

        $group = Group::find($group_id);

        empty($group) ? $param['group'] = null : $param['group'] = $group;

        $memberships = Member::where([['group_id', '=', $group_id], ['status', '=', 'active']])->get();

        if (!empty($memberships))
        {
            if ($memberships->count() > 0) {
                foreach ($memberships as $membership)
                {
                    if (intval($membership->user_id) === Auth::user()->getAuthIdentifier())
                    {
                        $param['user_is_member'] = true;
                    }

                    $user = User::where('id', $membership->user_id)->first();
                    $user->group_role = $membership->group_role;
                    $param['members'][$user->id] = $user;

                    $workouts = DB::table('workout')
                        ->join('member', 'workout.user_id', '=', 'member.user_id')
                        ->join('fitness_group', 'fitness_group.id', '=', 'member.group_id')
                        ->select('workout.*', 'member.group_id')
                        ->where('member.status', '=', 'active')
                        ->orderByDesc('updated_at')
                        ->orderByDesc('weight')
                        ->limit(100)
                        ->get();

                    $param['workouts'] = $workouts;
                }
            }
        }

        if ($group->visibility !== 'public') {
            if (!$param['user_is_member'])
            {
                return redirect('fitness_group/sign-up/' . $group_id);
            }
        }

        return view('group', ['param' => $param]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gym() {

        $gyms = Group::where([['type', 'gym'], ['status', 'active']])->get();

        return view('gym', [ 'gyms' => $gyms]);
    }

    public function sign_up(Request $request, string $group_id)
    {
        $param = null;

        $group = Group::find($group_id);

        $param['group'] = $group;

        return view('sign_up', ['param' => $param]);
    }

    public function public_sign_up(Request $request, string $status, string $group_id)
    {
        $member = null;

        switch ($status)
        {
            case 'sign_up' :
                $member = new Member();
                $member->user_id = Auth::user()->getAuthIdentifier();
                $member->group_id = $group_id;
                $member->group_role = 'member';
                $member->status = 'active';

                $member->save();
                break;
            case 'leave_group' :
                $member = Member::where('user_id', Auth::user()->getAuthIdentifier())->first();
                if ($member->count() > 0)
                {
                    $member->status = 'inactive';
                    $member->save();
                } else {
                    return redirect('fitness_group/' . $group_id);
                }
                break;
        }

        return redirect('fitness_group/' . $group_id);
    }
}
