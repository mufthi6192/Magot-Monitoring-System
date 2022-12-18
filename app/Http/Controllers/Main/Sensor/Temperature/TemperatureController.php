<?php /** @noinspection DuplicatedCode */

namespace App\Http\Controllers\Main\Sensor\Temperature;

use App\Http\Controllers\Controller;
use App\Interfaces\Merge\MergeRepositoryInterface;
use App\Interfaces\Sensor\Temperature\TemperatureRepositoryInterface;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    private TemperatureRepositoryInterface $temperatureRepository;
    private MergeRepositoryInterface $mergeRepository;

    public function __construct(TemperatureRepositoryInterface $temperatureRepository, MergeRepositoryInterface $mergeRepository){
        $this->temperatureRepository = $temperatureRepository;
        $this->mergeRepository = $mergeRepository;
    }

    public function index(){

        $data = $this->temperatureRepository->getData();
        $latestData = $this->temperatureRepository->latestData();

        if($data['status'] != true){
            return redirect()->route('error');
        }else{
            return view('Main.Sensor.Temperature.temperature',[
                'temperature_data' => $data['data'],
                'title' => 'Data Suhu',
                'latest_data' => $latestData['data'],
                'script_code' => 'temperature'
            ]);
        }

    }

    public function insertByQueryParam(Request $request){

        $humidity = $request->query('humidity');
        $temperature = $request->query('temperature');

        $param = array(
            'temperature' => $temperature,
            'humidity' => $humidity
        );

        $process = $this->temperatureRepository->insertData($humidity);
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
