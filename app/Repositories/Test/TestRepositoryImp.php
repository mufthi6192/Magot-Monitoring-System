<?php

namespace App\Repositories\Test;

use App\Interfaces\Test\TestRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestRepositoryImp implements TestRepositoryInterface{

    public function testCarbon(): array
    {

        $query = DB::table('messages')->get();

        $minute = 0;
        foreach ($query as $index => $item){
            $data[] = array(
                'message' => $item->message,
                'code' => 'test',
                'uplink' => 'test',
                'created_at' => Carbon::parse('First day of december 2022')->addMinutes($index+1)
            );
        }

        try{
            DB::beginTransaction();
            if(!DB::table('messages')->insert($data)){
                throw new \Exception("FAILED INSERT");
            }else{
                DB::commit();
                return array(
                    'status' => true,
                    'msg' => 'OK',
                    'data' => null
                );
            }
        }catch (\Throwable $err){
            DB::rollBack();
            return array(
                'status' => false,
                'msg' => $err->getMessage(),
                'data' => null
            );
        }

    }

}
