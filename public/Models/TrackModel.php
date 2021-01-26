<?php 
	namespace Models;

	
	class TrackModel extends DataBaseModel
	{
	   private $pdo;

	   public function __construct()
	   {
			$this->pdo = DataBaseModel::getInstance();
	   }

	   public function trackLink($link)
	   {
	   	try{
	   		$sql = $this->pdo->prepare("SELECT * FROM `clicks` WHERE click = :link ");
	   		$sql->bindValue(':link', $link, \PDO::PARAM_STR);
	   		$sql->execute();
	   		$return = $sql->rowCount();

	   		return $return;
	   	}catch(\Exception $e){
	   		return false;
	   	}
	   	
	   }
	}
