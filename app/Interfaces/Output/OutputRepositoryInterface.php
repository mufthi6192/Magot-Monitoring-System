<?php

namespace App\Interfaces\Output;

interface OutputRepositoryInterface{

    public function updatePumpA($status);
    public function updatePumpB($status);
    public function updateLampA($status);
    public function updateLampB($status);

    /*
     * Recommend for first use only
     */

    public function findOutputData();
    public function insertIfDoesntExist();

    /**
     * Get latest data
     */

    public function latestDataPumpA();
    public function latestDataPumpB();
    public function latestDataLampA();
    public function latestDataLampB();


}
