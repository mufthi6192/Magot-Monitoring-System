<?php

namespace App\Interfaces\Sensor\Temperature;

interface TemperatureRepositoryInterface {
    public function getData();
    public function latestData();
    public function insertData($value);
}
