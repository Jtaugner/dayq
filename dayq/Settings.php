<?php

class Settings {

	//Тип хранимых данных
	public const DATA_STORAGE_TYPE = 'database';
	
	// База данных
	public const DATABASE_TYPE = 'mysql';
	public const DATABASE_HOST = 'localhost';
	public const DATABASE_DATABASE = 'dayq';
	public const DATABASE_USER = 'root';
	public const DATABASE_PASSWORD = '1998gardeNa';
	
	// ### ПРЕДОПРЕДЕЛЁННЫЕ КОНСТАНТЫ

    //Хранилища данных
	public const DATA_STORAGE_TYPE_DATABASE = 'database';
    public const ROOT_PATH = __DIR__.'/';
    public const ENGINE_PATH = self::ROOT_PATH .'engine/';
    public const TEMPLATES_FOLDER_PATH = self::ROOT_PATH.'templates/';
}