<?php

namespace App\Http\Controllers\Main\Output\LampB;

use App\Http\Controllers\Controller;
use App\Interfaces\Output\OutputRepositoryInterface;

class LampBController extends Controller
{

    private OutputRepositoryInterface $outputRepository;

    public function __construct(OutputRepositoryInterface $outputRepository){
        $this->outputRepository = $outputRepository;
    }

    public function index(){

        $status = $this->outputRepository->latestDataLampB();

        return view('Main.Output.LampB.index',[
            'title' => 'Menu Output',
            'uri_segment' => 'lamp-b',
            'script_code' => 'lamp-b',
            'status' => $status['data']
        ]);
    }
}
