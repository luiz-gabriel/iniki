<?php
  namespace Models;

  class MonitorarlinkModel extends DataBaseModel{
    private $pdo;

    public function __construct()
    {
          $this->pdo = DataBaseModel::getInstance();
    }

    public function Verifylink($url){
      $url = $url;

      $sql = $this->pdo->prepare("SELECT count(*) FROM `clicks` WHERE click='$url'");
      $sql->execute();
      
      $return = $sql->fetch();

      return $return;
    }
  }
