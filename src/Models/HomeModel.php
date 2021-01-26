<?php

namespace Models;

class HomeModel extends DataBaseModel
{

    private $pdo;

    public function __construct()
    {
          $this->pdo = DataBaseModel::getInstance();
    }

    public function registerUrl($cleanUrl, $hash)
    {
        $sql = $this->pdo->prepare("INSERT INTO `links` (link, small_link, `status`) VALUES (?,?,?)");
        $sql->execute(array($cleanUrl, $hash, '0'));
        
    }
}
