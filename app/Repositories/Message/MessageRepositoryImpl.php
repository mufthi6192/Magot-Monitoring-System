<?php

namespace App\Repositories\Message;

use App\Interfaces\Message\MessageRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MessageRepositoryImpl implements MessageRepositoryInterface{

    public function insertData($uplink, $msg, $code)
    {
        $process = DB::table('messages')
                            ->insert([
                                'uplink' => $uplink,
                                'message' => $msg,
                                'code' => $code,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]);

        if(!$process){
            return false;
        }

        return true;
    }

    public function filterData($code)
    {
        // TODO: Implement filterData() method.
    }

}
