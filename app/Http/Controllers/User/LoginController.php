<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('user.Auth.login');
    }

    public function login(LoginRequest $request){
        $remember_me = $request->has('remember_me');
        if (auth()->guard('web')->attempt(['email'=>$request->input("email"), 'password'=>$request->input("password")])){
//            notify()->success('you are logged in successfly');
            return redirect()->route('user.profile');
        }
//        notify()->error('incorrect information try again');
        return redirect()->back()->with(['error' => 'incorect information']);
    }

}
