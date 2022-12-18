<?php

namespace App\Http\Controllers\Main\Output\LampA;

use App\Http\Controllers\Controller;
use App\Interfaces\Output\OutputRepositoryInterface;

class LampAController extends Controller
{

    private OutputRepositoryInterface $outputRepository;

    public function __construct(OutputRepositoryInterface $outputRepository){
        $this->outputRepository = $outputRepository;
    }

    public function index(){

        $status = $this->outputRepository->latestDataLampA();

        return view('Main.Output.LampA.index',[
            'title' => 'Menu Output',
            'uri_segment' => 'lamp-a',
            'script_code' => 'lamp-a',
            'status' => $status['data']
        ]);
    }

}
