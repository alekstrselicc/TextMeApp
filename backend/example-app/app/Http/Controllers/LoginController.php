<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function checkLogin(Request $request)
    {
        //in progress.. myb delete..
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ]);
    }
}
