<?php

require_once ('../../Settings.php');
require_once (Settings::ENGINE_PATH.'data/DataStreamFactory.php');
require_once (Settings::ENGINE_PATH.'data/DayDataController.php');

if(!isset($_POST['rating']) || !isset($_POST['comment'])){
    echo false;
    die();
}

$dayData = new DayData('29.05.2018', $_POST['rating'], $_POST['comment']);

//Добавляем данные в хранилище
$dataStream = DataStreamFactory::create();
$dataStream->open();

if($dataStream->addDayData($dayData)){
    $dayDataController = new DayDataController();
    $dayDataController->addDayData($dayData);
    $dayDataController->echoDataAsHTML();
} else {
    echo false;
}


