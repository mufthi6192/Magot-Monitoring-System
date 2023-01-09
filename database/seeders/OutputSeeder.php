<?php

namespace Database\Seeders;

use App\Interfaces\Output\OutputRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutputSeeder extends Seeder
{

    private OutputRepositoryInterface $outputRepository;

    public function __construct(OutputRepositoryInterface $outputRepository)
    {
        $this->outputRepository = $outputRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->outputRepository->updateLampA('on');
    }
}
