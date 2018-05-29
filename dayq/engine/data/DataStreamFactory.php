<?php

require_once (Settings::ENGINE_PATH.'data/DataStream.php');
require_once (Settings::ENGINE_PATH.'database/DatabaseStream.php');

class DataStreamFactory {
    public static function create(){
        switch(Settings::DATA_STORAGE_TYPE){
            case Settings::DATA_STORAGE_TYPE_DATABASE:
                return new DatabaseStream;
        }
    }
}