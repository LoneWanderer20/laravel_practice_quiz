<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
use App\Profile;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $userInfo = $user->profile;

        if (!$user->setup) {
            return redirect('/profile/setup');
        }

        return view('profile', compact(['user', 'userInfo']));
    }

    public function setup()
    {
        $user = auth()->user();

        return view('setup', compact('user'));
    }

    public function profileSetup(Request $request)
    {
        $profile = new Profile;

        $user = auth()->user();

        try {
            $profile->user_id = $user->id;
            $profile->favourite = $request->favourite;
            $profile->strongest = $request->strongest;
            $profile->weakest = $request->weakest;
            $profile->bio = $request->bio;

            $profile->save();

            try {
                $user->setup = 1;
                $user->save();
            } catch(Exception $e) {
                return redirect()-back()->with($e);
            }

        } catch (Exception $e) {
            return redirect()-back()->with($e);
        }

        return $this->index();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
