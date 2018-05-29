<?php

/*
	Класс предоставляет высокоуровневые методы для оперирования данными. 
	Может запрашивать данные из базы данных, формировать их в виде класса 
	DayData и выводить готовую информацию в виде HTML.
	
*/
class DayDataController {
	private $dayDataArray = [];
	
	public function __construct(){
    }

    public function addDayData(DayData $dayData){
	    $this->dayDataArray[] = $dayData;
    }

	public function setDayDataFromArray(array $dayDataArray){
        $this->dayDataArray = $dayDataArray;
    }
	
	public function echoDataAsHTML(){
		foreach($this->dayDataArray as $dayData){
			$day = $dayData->getDate();
			$rating = $dayData->getRating();
			$comment = $dayData->getComment();
			
			require(Settings::TEMPLATES_FOLDER_PATH.'data.php');
		}
	}
}