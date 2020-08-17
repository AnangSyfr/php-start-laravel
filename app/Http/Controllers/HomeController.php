<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use SweetAlert;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $level = 'admin';
        }else if ($user->hasRole('user')) {
            $level = 'user';
        }else {
            $level = 'undefined';
        }
        SweetAlert::success('Login Successfully!');
        return view('home',compact('level'));
    }
}
