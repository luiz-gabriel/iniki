<?php 
	namespace Models;

	class ComplaintModel extends DataBaseModel
	{
		private $pdo;

		public function __construct()
		{
			$this->pdo = DataBaseModel::getInstance();
		}

		public function registerComplaint($link,$reason)
		{
			try{
				$sql = $this->pdo->prepare("INSERT INTO `links_denuciados` (link_malicioso,motivo) VALUES (:link,:reason)");
				
				$sql->bindValue(':link', $link, \PDO::PARAM_STR);
				$sql->bindValue(':reason', $reason, \PDO::PARAM_STR);

				$result = $sql->execute();
				return $result;
			}catch(\Exception $e){
				return false;
			}
		}
	}
