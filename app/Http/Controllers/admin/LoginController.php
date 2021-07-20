<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin() {
        return view('admin.Auth.login');
    }

    public function login(LoginRequest $request){
        $remember_me = $request->has('remember_me');
        if (auth()->guard('admin')->attempt(['email'=>$request->input("email"), 'password'=>$request->input("password")])){
//            notify()->success('you are logged in successfly');
            return redirect()->route('admin.dashboard');
        }
//        notify()->error('incorrect information try again');
        return redirect()->back()->with(['error' => 'incorect information']);
    }
}
