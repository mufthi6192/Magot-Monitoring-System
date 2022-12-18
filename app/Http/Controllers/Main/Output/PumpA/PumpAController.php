<?php

namespace App\Http\Controllers\Main\Output\PumpA;

use App\Http\Controllers\Controller;
use App\Interfaces\Output\OutputRepositoryInterface;

class PumpAController extends Controller
{

    private OutputRepositoryInterface $outputRepository;

    public function __construct(OutputRepositoryInterface $outputRepository){
        $this->outputRepository = $outputRepository;
    }

    public function index(){

        $status = $this->outputRepository->latestDataPumpA();

        return view('Main.Output.PumpA.index',[
            'title' => 'Menu Output',
            'uri_segment' => 'pump-a',
            'script_code' => 'pump-a',
            'status' => $status['data']
        ]);
    }
}
