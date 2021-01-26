<?php
namespace Models;

class DataBaseModel
{
    private static $pdo;

    private static $Host = '54.39.133.89';
    private static $User = 'nnljqinq_jfit ';
    private static $Password = '*m9jPVUSweBr^ve@eMGEmm3Q8VZ5!m#VALw';
    private static $DataBase = 'nnljqinq_iniki';

    private static function Connect()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new \PDO('mysql:host=' . self::$Host . ';dbname=' . self::$DataBase, self::$User, self::$Password,
                    array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            } catch (\Exception $e) {
                echo $e;
            }
        }

        return self::$pdo;
    }

    public function getInstance()
    {
        return self::Connect();
    }


}