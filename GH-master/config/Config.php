<?php
class Config
{
    private static $database = array(
        'hostname' => "localhost",
        'database' => "game_heaven",
        'login' => "ghadmin",
        'password' => "123"

    );
    public static function getLogin()
    {
        return self::$database['login'];
    }
    public static function getPass()
    {
        return self::$database['password'];
    }
    public static function getHost()
    {
        return self::$database['hostname'];
    }
    public static function getBase()
    {
        return self::$database['database'];
    }
}
