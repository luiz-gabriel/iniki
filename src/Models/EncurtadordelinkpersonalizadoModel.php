<?php

namespace Models;

class EncurtadordelinkpersonalizadoModel extends DataBaseModel
{

    private $pdo;
    private $sql;

    public function __construct()
    {
          $this->pdo = DataBaseModel::getInstance();
    }

    public function verifyUrl($hash)
    {
        $hash = $hash;

        $this->sql = $this->pdo->prepare("SELECT * FROM `links` WHERE small_link=?");
        $this->sql->execute(array($hash));

        if($this->sql->rowcount() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function registerUrl($url,$hash)
    {
      $status = 0;
      $this->sql = $this->pdo->prepare("INSERT INTO `links` (link, small_link, status) VALUES (?,?,?)");
      $this->sql->execute(array($url, $hash, $status));

      $reponse = $this->sql == true ? true : false;
      return $reponse;
    }
}
