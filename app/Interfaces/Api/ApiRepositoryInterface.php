<?php

namespace App\Interfaces\Api;

interface ApiRepositoryInterface{

    public function allData();
    public function latestData();
    public function insertData(array $data);

}
