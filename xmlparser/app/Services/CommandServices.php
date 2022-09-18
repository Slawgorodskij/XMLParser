<?php

namespace App\Services;

use App\Models\City;
use App\Models\ModelAuto;
use App\Models\Salon;
use App\Models\Stock;

class CommandServices
{
    private function dataObject($nameClass, $id){
        return match ($nameClass){
            'City' => City::find($id),
            'Salon' => Salon::find($id),
            'ModelAuto' => ModelAuto::find($id),
            'Stock' => Stock::find($id),
        };
    }

    private function dataObjectAll($nameClass){
        return match ($nameClass){
            'City' => City::all(),
            'Salon' => Salon::all(),
            'ModelAuto' => ModelAuto::all(),
            'Stock' => Stock::all(),
        };
    }

    public function checkingForDataDeletion($class, $XMLArray): array
    {
        $objectsClass = self::dataObjectAll($class);
        $arrayIdDB=[];
        $arrayIdXML=[];
        foreach ($objectsClass as $element){
            $arrayIdDB[] = $element->id;
        };

        foreach ($XMLArray as $element){
            $arrayIdXML[] = +$element[0];
        };

        return array_diff($arrayIdDB, $arrayIdXML);
    }


    public function checkingForDataChanges($fillable, $class, $dataXML): array
    {
        $dataCityDB=[];

        $objectsClass = self::dataObject($class, $dataXML[0]);

        foreach ($fillable as $nameColumns){
            $dataCityDB[]=(string)$objectsClass->$nameColumns;
        }

        array_splice($dataXML, -2, 2);
        array_splice($dataCityDB, -2, 2);

        return array_diff($dataXML, $dataCityDB);
    }
}
