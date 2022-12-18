<?php

namespace App\Interfaces\Sensor\Humidity;

interface HumidityRepositoryInterface{
    public function getData();
    public function latestData();
    public function insertData($value);
}
