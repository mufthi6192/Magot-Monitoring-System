<?php

namespace App\Interfaces\Message;

interface MessageRepositoryInterface{

    public function insertData($uplink,$msg,$code);
    public function filterData($code);

}
