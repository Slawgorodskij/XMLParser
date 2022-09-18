<?php

namespace App\Services;

class RepositoryServices
{
    private array $data = [];

    public function dataPreparationAllElement($fillable, $dataArray): array
    {
        for ($i=0; $i < count($dataArray); $i++) {
            $this->data[$fillable[$i]] = (string)$dataArray[$i];
        };

        return $this->data;
    }

    public function dataPreparation($fillable, $dataArray): array
    {
        foreach ($dataArray as $key=>$value){
            $this->data[$fillable[$key]] = (string)$value;
        }

        return $this->data;
    }
}
