<?php 
	namespace Models;

	class HomeModel extends DataBaseModel
	{

		private $pdo;

		public function __construct()
		{
			$this->pdo = DataBaseModel::getInstance();
		}

		public function registerUrl($cleanUrl, $smallUrl) : Bool
		{
			try{
				$sql = $this->pdo->prepare("INSERT INTO `links` (link, small_link, `status`) VALUES (:url,:smallUrl,:status)");
				
				$sql->bindValue(':url', $cleanUrl, \PDO::PARAM_STR);
				$sql->bindValue(':smallUrl', $smallUrl, \PDO::PARAM_STR);
				$sql->bindValue(':status', 0, \PDO::PARAM_INT);
				
				$sql->execute();

				$return = $sql == true ? true : false;

				return $return;
			}catch(\Exception $e){
				return false;
			}
		}

	}
