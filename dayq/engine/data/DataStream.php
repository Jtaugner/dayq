<?php

/*
 * Интерфейс представляет логику общения класса DayDataController с источником информации.
 * Интерфейс имплементируется представителсьом источника информации (например, DatabaseStream) и
 * реализует методы для получения и загрузки новых данных, например DayData или PlanData
 */
interface DataStream {
    //Возвращает: array DayData
    public function getDayData();

    //Возвращает true при успехе и false при ошибке
    public function addDayData(DayData $dayData);
}