<?php

namespace App\Http\Controllers\Main\Home;

use App\Http\Controllers\Controller;
use App\Interfaces\Output\OutputRepositoryInterface;
use App\Interfaces\Sensor\Humidity\HumidityRepositoryInterface;
use App\Interfaces\Sensor\Temperature\TemperatureRepositoryInterface;

class HomeController extends Controller
{

    private TemperatureRepositoryInterface $temperatureRepository;
    private HumidityRepositoryInterface $humidityRepository;
    private OutputRepositoryInterface $outputRepository;

    public function __construct(
        TemperatureRepositoryInterface $temperatureRepository,
        HumidityRepositoryInterface $humidityRepository,
        OutputRepositoryInterface $outputRepository,
    ){
        $this->temperatureRepository = $temperatureRepository;
        $this->humidityRepository = $humidityRepository;
        $this->outputRepository = $outputRepository;
    }

    public function index(){

        $humidity = $this->humidityRepository->latestData();
        $temperature = $this->temperatureRepository->latestData();
        $output = $this->outputRepository->latestDataLampB();

        return view('Main.Home.home',[
            'title' => 'Halaman Utama',
            'uri_segment' => 'homepage',
            'script_code' => 'home',
            'temperature' => $temperature['data'],
            'humidity' => $humidity['data'],
            'status' => $output['data']
        ]);
    }

}
