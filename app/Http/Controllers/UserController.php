<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    public function getLogin() {
        return view('login');
    }
    public function postLogin(Request $request) {
        $validatedData = $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:5',
        ]);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('web')->attempt($arr)) {

            return redirect()->route("public.home");

        } else {

            return redirect()->route("login")->withErrors("Tài khoản mật khẩu không chính xác");
        }
    }
    public function getLogout() {
        Auth::logout();
        return redirect()->route("login");
    }
}
