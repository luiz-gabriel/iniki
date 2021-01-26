<?php 
	namespace Models;

	class CostumLinkModel extends DataBaseModel
	{
	   private $pdo;

		public function __construct()
		{
			$this->pdo = DataBaseModel::getInstance();
		}

		public function registerCostumLink($cleanUrl, $customLink)
		{
			try{
				$sql = $this->pdo->prepare("INSERT INTO `links` (link, small_link, `status`) VALUES (:url,:smallUrl,:status)");
				
				$sql->bindValue(':url', $cleanUrl, \PDO::PARAM_STR);
				$sql->bindValue(':smallUrl', $customLink, \PDO::PARAM_STR);
				$sql->bindValue(':status', 0, \PDO::PARAM_INT);
				
				$result = $sql->execute();

				$return = $sql == true ? true : false;

				return $return;
			}catch(\Exception $e){
				return false;
			}
		}

		public function checkIfLinkExists($smallUrl)
		{
			try{
				$sql = $this->pdo->prepare("SELECT * FROM `links` WHERE small_link=:url ");
				$sql->bindValue(':url', $smallUrl, \PDO::PARAM_STR);
				$return = $sql->execute();

				if($sql->rowcount() == true){
	            return true;
	        }else{
	            return false;
	        }
				// var_dump($result);
			}catch(\Exception $e){
				return null;
			}		}

	}
	