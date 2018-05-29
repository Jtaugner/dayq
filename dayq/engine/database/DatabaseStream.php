<?php

require_once ('DatabaseController.php');
require_once (Settings::ENGINE_PATH.'data/DayData.php');

class DatabaseStream implements DataStream {
    private $databaseController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public function open(){
        $this->databaseController->connect();
    }

    //Возвращает: array DayData
    public function getDayData(){
        //Получаем сырые данные от базы
        $this->databaseController->query('SELECT * FROM rating');
        $dayDataArray = $this->databaseController->fetchAll();

        //Преобразуем данные в объекты DayData
        foreach($dayDataArray as &$dayData){
            $dayData = new DayData($dayData->date, $dayData->rating, $dayData->comment);
        }

        return $dayDataArray;
    }

    //Возвращает true при успехе и false при ошибке
    public function addDayData(DayData $dayData){
        //Подготавливаем данные для запроса
        $preparedData = [
            'date' => $dayData->getDate(),
            'rating' => $dayData->getRating(),
            'comment' => $dayData->getComment()
        ];

        //Обновляем данные
        return $this->databaseController->preparedQuery('INSERT INTO rating VALUES(DEFAULT, 0, :date, :rating, :comment)', $preparedData);
    }
}