has<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
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

    public function home()
    {
        if (Auth::check()) {
             return redirect('/profile');
        }
        return view('Auth/login');
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

}
