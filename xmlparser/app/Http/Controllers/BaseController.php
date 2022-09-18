<?php

namespace App\Http\Controllers;

use App\Http\Commands\CityCommandController;
use App\Http\Commands\ModelAutoCommandController;
use App\Http\Commands\SalonCommandController;
use App\Http\Commands\StockCommandController;

class BaseController extends Controller
{
    protected $pathToFile = __DIR__ . '/../../../public/default.xml';
    //protected $pathToFile = __DIR__ . '/../../../public/xmlparsertest.xml';

    public function index()
    {
        $cityAnswer = app(CityCommandController::class)->start($this->pathToFile);
        print_r($cityAnswer);

        $salonAnswer = app(SalonCommandController::class)->start($this->pathToFile);
        print_r($salonAnswer);

        $modelAnswer = app(ModelAutoCommandController::class)->start($this->pathToFile);
        print_r($modelAnswer);

        $stockAnswer = app(StockCommandController::class)->start($this->pathToFile);
        print_r($stockAnswer);


    }
}
