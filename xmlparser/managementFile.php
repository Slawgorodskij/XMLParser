<?php

use App\Http\Controllers\BaseController;

require 'vendor/autoload.php';

echo 'введите путь до файла';

$line = trim(fgets(STDIN));

$baseController = new BaseController();

$answerBaseController = $baseController->index($line);

foreach ($answerBaseController as $itemAnswer){
    if(is_string($itemAnswer)){
        echo $itemAnswer .PHP_EOL;
    } else {
        foreach ($itemAnswer as $answer){
            echo $answer .PHP_EOL;
        }
    }
}

