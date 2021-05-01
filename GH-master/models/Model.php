<?php
require_once("config/Config.php");
abstract class Model{
    protected static $_bdd;
    private static function setBdd()
    {
        $cnx="mysql:host=".Config::getHost()."; dbname=".Config::getBase();
        try {
            self::$_bdd = new PDO($cnx,Config::getLogin(),Config::getPass());
            self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception)
        {
            die("Echec de la connection: ".$exception->getMessage());
        }
    }
    protected function getBdd()
    {
        if(self::$_bdd==null)
        {
            self::setBdd();
            return self::$_bdd;
        }

    }

    protected function getAll($table , $obj)
    {
        $req = self::$_bdd->prepare('SELECT * FROM '.$table);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $obj);
        $req->closeCursor();
    }



}

?>