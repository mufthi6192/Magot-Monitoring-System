<?php

if(!function_exists('getUserDetails')){
    function getUserDetails($unique_id){
        $data = \Illuminate\Support\Facades\DB::table('user_details')
                                                    ->where('unique_id','=',$unique_id)
                                                    ->first();
        if(is_null($data)){
            return redirect()->route('error');
        }else{
            return $data;
        }
    }
}

if(!function_exists('getUserAuth')){
    function getUserAuth($unique_id){
        $data = \Illuminate\Support\Facades\DB::table('users')
            ->where('unique_id','=',$unique_id)
            ->first();
        if(is_null($data)){
            return redirect()->route('error');
        }else{
            return $data;
        }
    }
}
