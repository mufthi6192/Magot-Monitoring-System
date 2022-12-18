<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Interfaces\Test\TestRepositoryInterface;

class TestController extends Controller
{

    private TestRepositoryInterface $testRepository;

    public function __construct(TestRepositoryInterface $testRepository){
        $this->testRepository = $testRepository;
    }

    public function index(){
        $data = $this->testRepository->testCarbon();
        return response()->json($data);
    }

}
