<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;

class DevController extends Controller
{
    public function index(){
        return view('Dev.index');
    }
}
