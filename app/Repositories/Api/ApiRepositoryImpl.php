<?php

namespace App\Repositories\Api;

use App\Interfaces\Api\ApiRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApiRepositoryImpl implements ApiRepositoryInterface{

    public function allData()
    {
       try{
           $query = DB::table('merge_data')->get();
           if(!$query){
               throw new \Exception("Failed to stream data");
           }else{
               $response = array(
                 'status' => true,
                 'msg' => 'Successfully to stream data',
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

    public function latestData(){

        try{
            $query = DB::table('merge_data')->orderByDesc('id')->select(['temperature','humidity','lamp','pump'])->first();
            if(!$query){
                throw new \Exception("Failed to stream data");
            }else{
                $response = array(
                    'status' => true,
                    'msg' => 'Successfully to get data',
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

    public function insertData(array $data)
    {
        try{
            DB::beginTransaction();

            $query = DB::table('merge_data')->insert([
               'temperature' => $data['temperature'],
               'humidity' => $data['humidity'],
               'lamp' => $data['lamp'],
               'pump' => $data['pump'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if(!$query){
                throw new \Exception("Failed inserting merge data");
            }else{
                DB::commit();
                $response = array(
                    'status' => true,
                    'msg' => 'Successfully inserting merge data',
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
