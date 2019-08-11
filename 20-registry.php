<?php
class Registry
{
    private static $container = array();

    public static function set($key, $value)
    {   // Проверим наличие элемента в контейнере
        if(!isset(self::$container[$key]))
            self::$container[$key] = $value;
        else
            trigger_error('Variable '. $key .' already defined', E_USER_WARNING);
    }

    public static function get($key)
    {
        return self::$container[$key];
    }

}

Registry::set('name', ' Вася ');
// Попробуем переопределить элемент
Registry::set('name', ' Петя ');

function getData($key)
{// Получаем данные геттером
    return Registry::get($key);
}

echo getData('name');