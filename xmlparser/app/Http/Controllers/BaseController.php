<?php

namespace App\Http\Controllers;

use App\Http\Commands\CityCommandController;
use App\Http\Commands\ModelAutoCommandController;
use App\Http\Commands\SalonCommandController;
use App\Http\Commands\StockCommandController;

class BaseController extends Controller
{

    public function index($pathToFile)
    {
        if($pathToFile===''){
            $pathToFile = __DIR__ . '/../../../public/default.xml';
        }

        $cityAnswer = app(CityCommandController::class)->start($pathToFile);

        $salonAnswer = app(SalonCommandController::class)->start($pathToFile);

        $modelAnswer = app(ModelAutoCommandController::class)->start($pathToFile);

        $stockAnswer = app(StockCommandController::class)->start($pathToFile);

        return [$cityAnswer, $salonAnswer, $modelAnswer, $stockAnswer];
    }
}
