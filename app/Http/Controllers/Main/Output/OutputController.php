<?php

namespace App\Http\Controllers\Main\Output;

use App\Http\Controllers\Controller;
use App\Interfaces\Merge\MergeRepositoryInterface;
use App\Interfaces\Message\MessageRepositoryInterface;
use App\Interfaces\Output\OutputRepositoryInterface;
use App\Repositories\Message\MessageRepositoryImpl;

class OutputController extends Controller
{

    private OutputRepositoryInterface $outputRepository;
    private MessageRepositoryInterface $messageRepository;
    private MergeRepositoryInterface $mergeRepository;

    public function __construct(OutputRepositoryInterface $outputRepository, MessageRepositoryInterface $messageRepository, MergeRepositoryInterface $mergeRepository){
        $this->outputRepository = $outputRepository;
        $this->messageRepository = $messageRepository;
        $this->mergeRepository = $mergeRepository;
    }

    public function turnOnLampA(){

        $process = $this->outputRepository->updateLampA('on');
        $process2 = $this->outputRepository->updateLampB('on');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => 'on',
            'pump' => $pumpStatus['data']->pump_a
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal menghidupkan Lampu A'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal menghidupkan Lampu A'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil menghidupkan Lampu A'
                ]);
            }
        }

    }

    public function turnOffLampA(){

        $process = $this->outputRepository->updateLampA('off');
        $process2 = $this->outputRepository->updateLampB('off');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => 'off',
            'pump' => $pumpStatus['data']->pump_a
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal mematikan Lampu A'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal mematikan Lampu A'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil mematikan Lampu A'
                ]);
            }
        }

    }

    public function turnOnLampB(){

        $process = $this->outputRepository->updateLampA('on');
        $process2 = $this->outputRepository->updateLampB('on');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => 'on',
            'pump' => $pumpStatus['data']->pump_a
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal menghidupkan Lampu A'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal menghidupkan Lampu A'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil menghidupkan Lampu A'
                ]);
            }
        }

    }

    public function turnOffLampB(){

        $process = $this->outputRepository->updateLampA('off');
        $process2 = $this->outputRepository->updateLampB('off');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => 'off',
            'pump' => $pumpStatus['data']->pump_a
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal mematikan Lampu A'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal mematikan Lampu A'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil mematikan Lampu A'
                ]);
            }
        }

    }

    public function turnOnPumpA(){

        $process = $this->outputRepository->updatePumpA('on');
        $process2 = $this->outputRepository->updatePumpB('on');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => $pumpStatus['data']->lamp_a,
            'pump' => 'on'
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal menghidupkan Pompa A'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal menghidupkan Pompa A'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil menghidupkan Pompa A'
                ]);
            }
        }
    }

    public function turnOffPumpA(){
        $process = $this->outputRepository->updatePumpA('off');
        $process2 = $this->outputRepository->updatePumpB('off');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => $pumpStatus['data']->lamp_a,
            'pump' => 'off'
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal mematikan Pompa A'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal mematikan Pompa A'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil mematikan Pompa A'
                ]);
            }
        }
    }

    public function turnOnPumpB(){
        $process = $this->outputRepository->updatePumpB('on');
        $process2 = $this->outputRepository->updatePumpA('on');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => $pumpStatus['data']->lamp_a,
            'pump' => 'on'
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal menghidupkan Pompa B'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal menghidupkan Pompa B'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil menghidupkan Pompa B'
                ]);
            }
        }
    }

    public function turnOffPumpB(){
        $process = $this->outputRepository->updatePumpA('off');
        $process2 = $this->outputRepository->updatePumpB('off');

        $pumpStatus = $this->mergeRepository->getLatestData('output_models');

        $data = array(
            'lamp' => $pumpStatus['data']->pump_a,
            'pump' => 'off'
        );

        $processMerge = $this->mergeRepository->insertByOutput($data);

        if($process['status'] == 'failed' OR $process2['status'] == 'failed' OR $processMerge['status'] == false){
            echo json_encode([
                'status' => 'failed',
                'msg' => 'Gagal mematikan Pompa B'
            ]);
        }else{
            $inputMsg = $this->messageRepository->insertData('Admin','Lampu A telah dihidupkan','lamp_a');
            if($inputMsg != true){
                echo json_encode([
                    'status' => 'failed',
                    'msg' => 'Gagal mematikan Pompa B'
                ]);
            }else{
                echo json_encode([
                    'status' => 'success',
                    'msg' => 'Berhasil mematikan Pompa B'
                ]);
            }
        }
    }

}
