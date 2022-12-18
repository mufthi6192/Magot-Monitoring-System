<?php

namespace App\Repositories\Auth\Login;

use App\Interfaces\Auth\Login\LoginRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginRepositoryImpl implements LoginRepositoryInterface{

    public function loginProcess($email,$password)
    {
        $emailOrUsername = filter_var($email,FILTER_VALIDATE_EMAIL);

        if($emailOrUsername==false){
            $getUser = DB::table('users')->where('username','=',$email)->first();
        }else{
            $getUser = DB::table('users')->where('email','=',$email)->first();
        }

        if(!is_null($getUser)){
            if(Hash::check($password,$getUser->password)==true){
                return [
                    'status' => true,
                    'unique_id' => $getUser->unique_id
                ];
            }else{
                return [
                    'status' => false,
                    'unique_id' => null,
                ];
            }
        }else{
            return [
                'status' => false,
                'unique_id' => null,
            ];
        }
    }

}
