<?php

namespace App\Repositories\Test;

use App\Interfaces\Test\TestRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestRepositoryImp implements TestRepositoryInterface{

    public function testCarbon(): array
    {

        $query = DB::table('merge_data')->offset(1000)->limit(250)->get();

        $minute = 0;
        $data = [];
        foreach ($query as $index => $item){
            $data[] = array(
                'temperature' => $item->temperature,
                'humidity' => $item->humidity,
                'lamp' => $item->lamp,
                'pump' => $item->pump,
//                'created_at' => Carbon::parse('2022-5-30 11:00:00')->addMinutes($index+1),
//                'updated_at' => Carbon::parse('2022-5-30 11:00:00')->addMinutes($index+1)
            );
        }

        $dataCollect = collect($data)->shuffle();
        $dataInsert = [];
        foreach ($dataCollect as $index => $item){
            $dataInsert[] = array(
                'temperature' => $item['temperature'],
                'humidity' => $item['humidity'],
                'lamp' => $item['lamp'],
                'pump' => $item['pump'],
                'created_at' => Carbon::parse('2022-6-7 11:00:00')->addMinutes($index+1),
                'updated_at' => Carbon::parse('2022-6-7 11:00:00')->addMinutes($index+1)
            );
        }

        try{
            DB::beginTransaction();
            if(!DB::table('merge_data')->insert($dataInsert)){
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
