<?php

namespace App\Http\Controllers;

use App\SocialFeed;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @param $index
     * @return \Illuminate\Http\Response
     */
    public function index($index)
    {
        $member = Auth::user();

        $feeds = SocialFeed::where('user_id', $member->getAuthIdentifier())->orderBy('share_date')->get();

        $chunked = $feeds->chunk(4);

        $pagination = array('index' => intval($index), 'max_index' => sizeof($chunked) - 1);

        return view('community', ['pagination' => $pagination, 'member' => $member, 'feeds' => $chunked[$index]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //TODO edit validation
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }
}