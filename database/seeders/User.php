<?php

namespace Database\Seeders;

use App\Interfaces\User\UserSeederRepositoryInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User extends Seeder
{

    private UserSeederRepositoryInterface $userSeederRepository;

    public function __construct(UserSeederRepositoryInterface $userSeederRepository)
    {
        $this->userSeederRepository = $userSeederRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userSeederRepository->UserLoginSeed();
        $this->userSeederRepository->UserDetailSeed();
    }
}
