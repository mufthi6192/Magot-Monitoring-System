<?php

namespace App\Repositories\User;

use App\Interfaces\User\UserSeederRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeederRepositoryImpl implements UserSeederRepositoryInterface {

    public function UserLoginSeed()
    {
        $uniqueId = randomUserId();

        DB::table('users')->insert([
           [
               'username'   => 'admin',
               'email'      => 'admin@test.com',
               'password'   => Hash::make('admin'),
               'unique_id'  => $uniqueId
           ]
        ]);

    }

    public function UserDetailSeed()
    {
        $uniqueId = getRandomUserId("admin");

        DB::table('user_details')->insert([
           [
               'unique_id'      => $uniqueId,
               'name'           => 'Admin',
               'phone_number'   => '081234567890',
               'level'          => 'Admin'
           ]
        ]);

    }

}
