<?php

namespace App\Http\Controllers\Main\Merge;

use App\Http\Controllers\Controller;
use App\Interfaces\Merge\MergeRepositoryInterface;

class MergeController extends Controller
{

    private MergeRepositoryInterface $mergeRepository;

    public function __construct(MergeRepositoryInterface $mergeRepository){
        $this->mergeRepository = $mergeRepository;
    }

    public function index(){

        $data = $this->mergeRepository->latestDataStatus();
        $allData = $this->mergeRepository->allData();

        if($data['status']==false){
            return redirect()->route('error');
        }

        if($allData['status']==false){
            return redirect()->route('error');
        }

        return view('Main.Merge.index',[
            'title' => 'Halaman Monitoring',
            'uri_segment' => 'merge',
            'script_code' => 'merge',
            'temperature' => $data['data']->temperature,
            'humidity' => $data['data']->humidity,
            'lamp' => $data['data']->lamp,
            'pump' => $data['data']->pump,
            'time' => $data['data']->updated_at,
            'data' => $allData['data']
        ]);

    }

}
