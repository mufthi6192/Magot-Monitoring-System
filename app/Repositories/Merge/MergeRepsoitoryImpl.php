<?php

namespace App\Repositories\Merge;

use App\Interfaces\Merge\MergeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MergeRepsoitoryImpl implements MergeRepositoryInterface{

    public function getLatestData($tableName){

        try {

            $query = DB::table($tableName)->orderByDesc('id')->first();
            if(!$query){
                throw new \Exception("Failed fetch data");
            }else{
                $response = array(
                  'status' => true,
                  'msg' => 'Successfully get data',
                  'data' => $query
                );
            }

        }catch (\Throwable $err){
            $response = array(
                'status' => false,
                'msg' => $err->getMessage(),
                'data' => null
            );
        }

        return $response;

    }

    public function insertBySensor(array $data)
    {

        $param = $this->getLatestData('output_models');

        try{

            if($param['status'] == false){
                throw new \Exception("Failed insert data ! Please try again");
            }

            DB::beginTransaction();

            $query = DB::table('merge_data')->insert([
                'temperature' => $data['temperature'],
                'humidity' => $data['humidity'],
                'lamp' => $param['data']->lamp_a,
                'pump' => $param['data']->pump_a,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if(!$query){
                throw new \Exception("Failed inserting data ! please try again later");
            }else{
                DB::commit();
                $response = array(
                  'status' => true,
                  'msg' => 'Successfully insert data',
                  'data' => null
                );
            }

        }catch (\Throwable $err){
            DB::rollBack();
            $response = array(
                'status' => false,
                'msg' => 'Failed insert data',
                'data' => null
            );
        }

        return $response;

    }

    public function insertByOutput(array $data)
    {
        $paramTemperature = $this->getLatestData('temperatures');
        $paramHumidity = $this->getLatestData('humidities');

        try{

            if($paramTemperature['status'] == false OR $paramHumidity['status'] == false){
                throw new \Exception("Failed insert data ! Please try again");
            }

            DB::beginTransaction();

            $query = DB::table('merge_data')->insert([
                'temperature' => $paramTemperature['data']->sensor_value,
                'humidity' => $paramHumidity['data']->sensor_value,
                'lamp' => $data['lamp'],
                'pump' => $data['pump'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if(!$query){
                throw new \Exception("Failed inserting data ! please try again later");
            }else{
                DB::commit();
                $response = array(
                    'status' => true,
                    'msg' => 'Successfully insert data',
                    'data' => null
                );
            }

        }catch (\Throwable $err){
            DB::rollBack();
            $response = array(
                'status' => false,
                'msg' => 'Failed insert data',
                'data' => null
            );
        }

        return $response;
    }

    public function latestDataStatus()
    {

        try{

            $query = DB::table('merge_data')->orderByDesc('id')->first();

            if(!$query){
                throw new \Exception("Failed get data");
            }else{
                $response = array(
                    'status' => true,
                    'msg' => 'Successfully get data',
                    'data' => $query
                );
            }

        }catch (\Throwable $err){
            $response = array(
                'status' => false,
                'msg' => $err->getMessage(),
                'data' => null
            );
        }

        return $response;

    }

    public function allData()
    {
        try{

            $query = DB::table('merge_data')->get();

            if(!$query){
                throw new \Exception("Failed get data");
            }else{
                $response = array(
                    'status' => true,
                    'msg' => 'Successfully get data',
                    'data' => $query
                );
            }

        }catch (\Throwable $err){
            $response = array(
                'status' => false,
                'msg' => $err->getMessage(),
                'data' => null
            );
        }

        return $response;
    }


}
