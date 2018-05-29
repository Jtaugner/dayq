<?php

/*
	Класс DatabaseController знает как работать с базой данных, держит соединение, предоставляет методы для подготовленного запроса и выборки данных
*/
class DatabaseController{
	private $connection;
	private $PDOStatement;
	
	public function __construct(){
	}
	
	
	public function connect(){
		$this->connection = new PDO(Settings::DATABASE_TYPE.':host='.Settings::DATABASE_HOST.';dbname='.Settings::DATABASE_DATABASE.';charset=utf8', 
								Settings::DATABASE_USER, Settings::DATABASE_PASSWORD);
        $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    }
	
	public function preparedQuery($sql, $preparedData){
		$this->PDOStatement = $this->connection->prepare($sql);
		return $this->PDOStatement = $this->PDOStatement->execute($preparedData);
	}
	
	public function query($sql){
		$this->PDOStatement = $this->connection->query($sql);
	}
	
	public function fetchAll(){
		$this->PDOStatement->setFetchMode(PDO::FETCH_OBJ);
		return $this->PDOStatement->fetchAll();
	}
	
	
}