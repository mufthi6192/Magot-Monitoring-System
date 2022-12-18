<?php

namespace App\Http\Controllers\Main\Sensor\Humidity;

use App\Http\Controllers\Controller;
use App\Interfaces\Merge\MergeRepositoryInterface;
use App\Interfaces\Sensor\Humidity\HumidityRepositoryInterface;
use Illuminate\Http\Request;

class HumidityController extends Controller
{

    private HumidityRepositoryInterface $humidityRepository;
    private MergeRepositoryInterface $mergeRepository;

    public function __construct(HumidityRepositoryInterface $humidityRepository, MergeRepositoryInterface $mergeRepository){
        $this->humidityRepository = $humidityRepository;
        $this->mergeRepository = $mergeRepository;
    }

    public function index(){

        $data = $this->humidityRepository->getData();
        $latestData = $this->humidityRepository->latestData();

        if($data['status'] != true){
            return redirect()->route('error');
        }else{
            return view('Main.Sensor.Humidity.humidity',[
                'humidity_data' => $data['data'],
                'title' => 'Data Kelembaban',
                'latest_data' => $latestData['data'],
                'script_code' => 'humididty'
            ]);
        }

    }

    public function insertDataByQueryParam(Request $request){

        $humidity = $request->query('humidity');
        $temperature = $request->query('temperature');

        $param = array(
            'temperature' => $temperature,
            'humidity' => $humidity
        );

        $process = $this->humidityRepository->insertData($humidity);
        $processMerge = $this->mergeRepository->insertBySensor($param);

        $responseSuccess = array(
            'status' => true,
            'msg' => array(
                'first_process' => $process['msg'],
                'second_process' => $processMerge['msg'],
            ),
            'data' => array(
                'first_process' => $process['data'],
                'second_process' => $processMerge['data'],
            )
        );

        $responseFail = array(
            'status' => false,
            'msg' => array(
                'first_process' => $process['msg'],
                'second_process' => $processMerge['msg'],
            ),
            'data' => array(
                'first_process' => $process['data'],
                'second_process' => $processMerge['data'],
            )
        );

        if($process['status']==true AND $processMerge['status']==true){
            return response($responseSuccess,http_response_code(200));
        }else{
            return response($responseFail,http_response_code(400));
        }

    }
}
