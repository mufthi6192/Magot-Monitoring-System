<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\Login\LoginRepositoryInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private LoginRepositoryInterface $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function index(){
        return view('Auth.index',[
            'uri_segment' => 'login',
            'title' => 'Login Page'
        ]);

    }

    public function loginProcess(Request $request){

        $validated = $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $process = $this->loginRepository->loginProcess($validated['email'],$validated['password']);

        if ($process['status'] == true){
            $request->session()->put('is_login','true');
            $request->session()->put('unique_id',$process['unique_id']);
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('fail','Username, Email atau Password anda salah ! Silahkan coba lagi');
        }

    }

    public function logoutProcess(Request $request){

        $request->session()->flush();
        return redirect()->route('login');

    }

}
