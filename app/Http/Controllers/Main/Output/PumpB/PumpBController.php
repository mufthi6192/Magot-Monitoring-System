<?php

namespace App\Http\Controllers\Main\Output\PumpB;

use App\Http\Controllers\Controller;
use App\Interfaces\Output\OutputRepositoryInterface;

class PumpBController extends Controller
{

    private OutputRepositoryInterface $outputRepository;

    public function __construct(OutputRepositoryInterface $outputRepository){
        $this->outputRepository = $outputRepository;
    }

    public function index(){

        $status = $this->outputRepository->latestDataPumpB();

        return view('Main.Output.PumpB.index',[
            'title' => 'Menu Output',
            'uri_segment' => 'pump-b',
            'script_code' => 'pump-b',
            'status' => $status['data']
        ]);
    }
}
