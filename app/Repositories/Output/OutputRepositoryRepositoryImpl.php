<?php

namespace App\Repositories\Output;

use App\Interfaces\Output\OutputRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OutputRepositoryRepositoryImpl implements OutputRepositoryInterface {

    public function findOutputData()
    {
        $data = DB::table('output_models')->count();
        if($data!=null){
            return $data;
        }else{
            return 0;
        }
    }

    public function insertIfDoesntExist()
    {
        $data = DB::table('output_models')
                        ->insert([
                            'pump_a' => 'off',
                            'pump_b' => 'off',
                            'lamp_a' => 'off',
                            'lamp_b' => 'off',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

        if(!$data){
            return false;
        }else{
            return true;
        }

    }

    public function updateLampA($status)
    {
        $countData = $this->findOutputData();

        if($countData==0 OR $countData == null){

            $insertData = $this->insertIfDoesntExist();

            if($insertData!=true){
                return array(
                    'status'    => 'FAILED',
                    'msg'       => 'Gagal menambahkan ke database',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Sistem melakukan reset ulang ! Silahkan coba lagi',
                    'data'      => null,
                );
            }

        }

        $process = DB::table('output_models')
                        ->update(['lamp_a'=>$status,'updated_at' => Carbon::now()]);

        if(!$process){
            return array(
                'status'    => 'FAILED',
                'msg'       => 'Gagal menambahkan ke database',
                'data'      => null,
            );
        }else{
            if($status == 'on'){
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil menghidupkan Lampu A',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil mematikan Lampu A',
                    'data'      => null,
                );
            }
        }

    }

    public function updateLampB($status)
    {
        $countData = $this->findOutputData();

        if($countData==0 OR $countData == null){

            $insertData = $this->insertIfDoesntExist();

            if($insertData!=true){
                return array(
                    'status'    => 'FAILED',
                    'msg'       => 'Gagal menambahkan ke database',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Sistem melakukan reset ulang ! Silahkan coba lagi',
                    'data'      => null,
                );
            }

        }

        $process = DB::table('output_models')
            ->update(['lamp_b'=>$status, 'updated_at' => Carbon::now()]);

        if(!$process){
            return array(
                'status'    => 'FAILED',
                'msg'       => 'Gagal menambahkan ke database',
                'data'      => null,
            );
        }else{
            if($status == 'on'){
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil menghidupkan Lampu B',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil mematikan Lampu B',
                    'data'      => null,
                );
            }
        }
    }

    public function updatePumpA($status)
    {
        $countData = $this->findOutputData();

        if($countData==0 OR $countData == null){

            $insertData = $this->insertIfDoesntExist();

            if($insertData!=true){
                return array(
                    'status'    => 'FAILED',
                    'msg'       => 'Gagal menambahkan ke database',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Sistem melakukan reset ulang ! Silahkan coba lagi',
                    'data'      => null,
                );
            }

        }

        $process = DB::table('output_models')
            ->update(['pump_a'=>$status, 'updated_at' => Carbon::now()]);

        if(!$process){
            return array(
                'status'    => 'FAILED',
                'msg'       => 'Gagal menambahkan ke database',
                'data'      => null,
            );
        }else{
            if($status == 'on'){
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil menghidupkan Pompa A',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil mematikan Pompa A',
                    'data'      => null,
                );
            }
        }
    }

    public function updatePumpB($status)
    {
        $countData = $this->findOutputData();

        if($countData==0 OR $countData == null){

            $insertData = $this->insertIfDoesntExist();

            if($insertData!=true){
                return array(
                    'status'    => 'FAILED',
                    'msg'       => 'Gagal menambahkan ke database',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Sistem melakukan reset ulang ! Silahkan coba lagi',
                    'data'      => null,
                );
            }

        }

        $process = DB::table('output_models')
            ->update(['pump_b'=>$status, 'updated_at' => Carbon::now()]);

        if(!$process){
            return array(
                'status'    => 'FAILED',
                'msg'       => 'Gagal menambahkan ke database',
                'data'      => null,
            );
        }else{
            if($status == 'on'){
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil menghidupkan Pompa B',
                    'data'      => null,
                );
            }else{
                return array(
                    'status'    => 'SUCCESS',
                    'msg'       => 'Berhasil mematikan Pompa B',
                    'data'      => null,
                );
            }
        }
    }

    public function latestDataLampA()
    {
        try {
            $query = DB::table('output_models')->orderByDesc('created_at')->first();
            if(!$query){
                throw new \Exception("Failed to get data");
            }else{
                return array(
                    'status' => true,
                    'msg' => 'Successfully get data',
                    'data' => $query
                );
            }
        }catch (\Throwable $err){
            return array(
                'status'    => false,
                'msg'       => $err->getMessage(),
                'data'      => null,
            );
        }
    }

    public function latestDataLampB()
    {
        try {
            $query = DB::table('output_models')->orderByDesc('created_at')->first();
            if(!$query){
                throw new \Exception("Failed to get data");
            }else{
                return array(
                    'status' => true,
                    'msg' => 'Successfully get data',
                    'data' => $query
                );
            }
        }catch (\Throwable $err){
            return array(
                'status'    => false,
                'msg'       => $err->getMessage(),
                'data'      => null,
            );
        }
    }

    public function latestDataPumpA()
    {
        try {
            $query = DB::table('output_models')->orderByDesc('created_at')->first();
            if(!$query){
                throw new \Exception("Failed to get data");
            }else{
                return array(
                    'status' => true,
                    'msg' => 'Successfully get data',
                    'data' => $query
                );
            }
        }catch (\Throwable $err){
            return array(
                'status'    => false,
                'msg'       => $err->getMessage(),
                'data'      => null,
            );
        }
    }

    public function latestDataPumpB()
    {
        try {
            $query = DB::table('output_models')->first();
            if(!$query){
                throw new \Exception("Failed to get data");
            }else{
                return array(
                    'status' => true,
                    'msg' => 'Successfully get data',
                    'data' => $query
                );
            }
        }catch (\Throwable $err){
            return array(
                'status'    => false,
                'msg'       => $err->getMessage(),
                'data'      => null,
            );
        }
    }

}
