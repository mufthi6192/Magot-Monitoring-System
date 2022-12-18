<?php

if(! function_exists('randomUserId')){

    function randomUserId(){

        do {
            $code = random_int(10000000,999999999999);
        } while(
          \Illuminate\Support\Facades\DB::table('users')
                                            ->where('unique_id','=',$code)
                                            ->first()
        );

        return $code;

    }

}

if(! function_exists('getRandomUserId')){

    function getRandomUserId($username){

        $dbProcess = \Illuminate\Support\Facades\DB::table('users')
                                                        ->where('username','=',$username)
                                                        ->first();
        return $dbProcess->unique_id;

    }

}
