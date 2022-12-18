<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{

    public function index(){

        return view('Auth.index',[
            'uri_segment' => 'register',
            'title' => 'Login Page'
        ]);

    }

}
