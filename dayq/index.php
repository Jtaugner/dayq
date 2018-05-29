<?php

require_once('Settings.php');
require_once(Settings::ENGINE_PATH.'data/DataStreamFactory.php');
require_once(Settings::ENGINE_PATH.'data/DayDataController.php');

//Формируем и открываем поток к хранилищу данных с помощью фабрики объектов на основании информации из настроек
$dataStream = DataStreamFactory::create();
$dataStream->open();

//Формируем контроллер данных и получаем данные о днях из хранилища данных
$dayDataController = new DayDataController();
$dayDataController->setDayDataFromArray($dataStream->getDayData());

//Вызываем логику формирования интерфейса и выводим
require_once(Settings::TEMPLATES_FOLDER_PATH.'index.php');