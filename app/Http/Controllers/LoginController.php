<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index() {


        return view('login');
    }

    public function doLogin(Request $request) {

        if(Auth::attempt()) {



        }

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
    }

}
