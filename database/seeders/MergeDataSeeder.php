<?php

namespace Database\Seeders;

use App\Interfaces\Merge\MergeRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MergeDataSeeder extends Seeder
{

    private MergeRepositoryInterface $mergeRepository;

    public function __construct(MergeRepositoryInterface $mergeRepository)
    {
        $this->mergeRepository = $mergeRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
          'temperature' => 32,
          'humidity' => 66
        );
        $this->mergeRepository->insertBySensor($data);
    }
}
