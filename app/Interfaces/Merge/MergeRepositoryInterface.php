<?php

namespace App\Interfaces\Merge;

interface MergeRepositoryInterface{
    public function getLatestData($table_name);
    public function insertBySensor(array $data);
    public function insertByOutput(array $data);
    public function latestDataStatus();
    public function allData();
}
