<?php

namespace App\Repositories\Sensor\Humidity;

use App\Interfaces\Sensor\Humidity\HumidityRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HumidityRepositoryImpl implements HumidityRepositoryInterface{

    public function getData()
    {

        try{
            $query = DB::table('humidities')->limit(1000)->get();

            if(!$query){
                throw new \Exception("Failed get database data");
            }else{
                $response = array(
                    'status' => true,
                    'msg' => 'Successfully get database data',
                    'data' => $query,
                );
            }
        }catch (\Throwable $err){
            $response = array(
                'status' => false,
                'msg' => $err->getMessage(),
                'data' => null,
            );
        }

        return $response;

    }

    public function latestData()
    {
        try{
            $query = DB::table('humidities')->orderByDesc('id')->first();
            if(!$query){
                throw new \Exception("Failed to get database");
            }else{
                $response = array(
                  'status' => true,
                  'msg' => 'Successfully get database',
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

    public function insertData($value)
    {
        try{

            if(is_null($value)){
                throw new \Exception("Failed ! need query parameter");
            }

            DB::beginTransaction();

            $query = DB::table('humidities')
                ->insert([
                    'sensor_value' => $value,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

            if(!$query){
                throw new \Exception("Failed insert database");
            }else{
                DB::commit();
                $response = array(
                    'status' => true,
                    'msg' => 'Success insert database',
                    'data' => null
                );
            }

        }catch (\Throwable $err){
            DB::rollBack();
            $response = array(
                'status' => false,
                'msg' => $err->getMessage(),
                'data' => null
            );
        }

        return $response;
    }

}
