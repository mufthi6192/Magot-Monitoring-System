<?php

namespace App\Interfaces\Auth\Login;

interface LoginRepositoryInterface {

    public function loginProcess($email,$password);

}
