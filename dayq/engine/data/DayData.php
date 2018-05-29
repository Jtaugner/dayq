<?php

/*
	Класс представляет и хранит данные о конкретном дне:
		1. Дата в формате день.месяц.год (28.05.2018)
		2. Сама оценка (от 0 до 9)
		3. Комментарий о дне
		
*/
class DayData {
	private $date = '01.01.1970';
	private $rating = '0';
	private $comment = 'error';
	
	public function __construct($date, $rating, $comment){
		$this->date = $date;
		$this->rating = $rating;
		$this->comment = $comment;
	}
	
	public function getDate(){
		return $this->date;
	}
	
	public function getRating(){
		return $this->rating;
	}
	
	public function getComment(){
		return $this->comment;
	}
}