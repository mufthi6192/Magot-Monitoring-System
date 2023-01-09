<?php

namespace Database\Seeders;

use App\Interfaces\Sensor\Humidity\HumidityRepositoryInterface;
use App\Interfaces\Sensor\Temperature\TemperatureRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{

    private TemperatureRepositoryInterface $temperatureRepository;
    private HumidityRepositoryInterface $humidityRepository;

    public function __construct(TemperatureRepositoryInterface $temperatureRepository, HumidityRepositoryInterface $humidityRepository)
    {
        $this->humidityRepository = $humidityRepository;
        $this->temperatureRepository = $temperatureRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->temperatureRepository->insertData(32);
        $this->humidityRepository->insertData(66);
    }
}
