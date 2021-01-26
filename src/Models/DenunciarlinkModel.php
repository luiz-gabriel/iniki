<?php
namespace Models;

class DenunciarlinkModel extends DataBaseModel
{

    private $pdo;
    private $sql;

    public function __construct()
    {
      $this->pdo = DataBaseModel::getInstance();
    }

   public function denunciarUrl($cleanUrl, $cleanMotivo)
   {
      $url = $cleanUrl;
      $motivo = $cleanMotivo;

      $this->sql = $this->pdo->prepare("INSERT INTO `links_denuciados` (link_malicioso, motivo) VALUES (?,?)");
      $this->sql->execute(array($url, $motivo));

      return true;
   }
}
?>
