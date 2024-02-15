<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
    //
    public function viewLogin(){
        return view('admins.login');
    }

    public function checkLogin(Request $req){
        $remember_me = $req->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email'=> $req->input("email"), 'password' => $req->input('password')], $remember_me)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function index(){
        return view('admins.dashboard');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('admin.login');
    }

}
