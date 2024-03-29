<?php
namespace DesignPatterns\Creational\Singleton;
$start = microtime(true);
final class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;

    /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new \mysqli("localhost", "root", "myroot", "first");
        }
        return static::$instance;
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {


    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup()
    {
    }
}


$mysqli = Singleton::getInstance();
$result = $mysqli->query("SELECT * FROM `MyGuests`");
for($i=0; $i<=10000;$i++){
    $mysqli->query("SELECT * FROM `MyGuests`");
}

echo microtime(true) - $start;