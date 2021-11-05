<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function login(){
        return view('auth.login');
    }
    public function allclients(){
        $users = User::where('user_category', 'subscriber')->get();
      
        return view('admin.all-users')->with('users', $users);
    }
    public function allsubscribers(){
        $users = Subscriber::all();
        return view('admin.all-subscribers')->with('users', $users);
    }
}
