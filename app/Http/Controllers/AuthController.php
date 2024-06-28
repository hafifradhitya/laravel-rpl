<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    //
    public function proses_login(Request $request){
        $credentials = $request->only("email", "password");

        if(Auth::attempt($credentials)){
            return redirect()->intended("home");
        }else{
            session()->flash('message', 'Gagal login');
            return redirect("/");
        }
    }

    public function proses_logout(){
        Auth::logout();
        return redirect("/");
    }
}
