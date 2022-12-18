<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function index(){
        $title = 'Error Page';
        return view('Errors.error',[
           'title' => $title,
        ]);
    }
}
