<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\ApiRepositoryInterface;
use App\Interfaces\Merge\MergeRepositoryInterface;
use App\Interfaces\Output\OutputRepositoryInterface;
use App\Interfaces\Sensor\Humidity\HumidityRepositoryInterface;
use App\Interfaces\Sensor\Temperature\TemperatureRepositoryInterface;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    private ApiRepositoryInterface $apiRepository;
    private MergeRepositoryInterface $mergeRepository;
    private OutputRepositoryInterface $outputRepository;
    private HumidityRepositoryInterface $humidityRepository;
    private TemperatureRepositoryInterface $temperatureRepository;

    public function __construct
    (ApiRepositoryInterface $apiRepository,
     MergeRepositoryInterface $mergeRepository,
    OutputRepositoryInterface $outputRepository,
    HumidityRepositoryInterface $humidityRepository,
    TemperatureRepositoryInterface $temperatureRepository
    )
    {
        $this->apiRepository = $apiRepository;
        $this->mergeRepository = $mergeRepository;
        $this->outputRepository = $outputRepository;
        $this->humidityRepository = $humidityRepository;
        $this->temperatureRepository = $temperatureRepository;
    }

    public function allData(){

        $data = $this->apiRepository->allData();

        if($data['status']==false){
            return response($data,400);
        }else{
            return response($data,200);
        }

    }

    public function latestData(){

        $data = $this->apiRepository->latestData();

        if($data['status']==false){
            return response($data,400);
        }else{
            return response($data,200);
        }

    }

    public function insertData(Request $request){

        $dataLatest = $this->mergeRepository->getLatestData('merge_data');

        if($dataLatest['status']==false){
            return response($dataLatest,400);
        }

        $temperature = $request->query('temperature');
        $humidity = $request->query('humidity');

        $data = array(
          'temperature' => $temperature,
          'humidity' => $humidity,
          'lamp' => $dataLatest['data']->lamp,
          'pump' => $dataLatest['data']->pump
        );

        $insertTemperature = $this->temperatureRepository->insertData($data['temperature']);

        if($insertTemperature['status']==false){
            return response($insertTemperature,400);
        }

        $insertHumidity = $this->humidityRepository->insertData($data['humidity']);

        if($insertHumidity['status']==false){
            return response($insertHumidity,400);
        }

        $insertOutputData = $this->outputRepository->updatePumpA($data['pump']);
        $insertOutputData2 = $this->outputRepository->updatePumpB($data['pump']);
        $insertOutputData3 = $this->outputRepository->updateLampA($data['pump']);
        $insertOutputData4 = $this->outputRepository->updateLampB($data['pump']);

        if($insertOutputData['status'] != 'SUCCESS' AND $insertOutputData2['status'] != 'SUCCESS' AND $insertOutputData3['status'] != 'SUCCESS' AND $insertOutputData4['status'] != 'SUCCESS'){
            return response()->json([
               'status' => false,
               'msg' => 'Failed inserting data',
               'data' => null
            ]);
        }

        $insertMergeData = $this->apiRepository->insertData($data);

        if($insertMergeData['status']==false){
            return response($insertMergeData,400);
        }

        return response()->json([
           'status' => true,
           'msg' => 'Successfully inserting data',
           'data' => null
        ]);

    }


}
