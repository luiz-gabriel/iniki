<?php  
	
	class App
	{
		private $url;

		public function setUrl()
		{

			$dirtyUrl = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Home';

			$filterUrl = strip_tags($dirtyUrl);


			$this->url = str_replace('-', '', $filterUrl);
		}

		public function Execute()
		{
			$newUrl = ucfirst($this->url);
			$newUrl.="Controller";

			$verifyFile = $this->CheckIfFileExists($newUrl);

			if($verifyFile === true)
			{
				$className = 'Controllers\\'.$newUrl;
				$controler = new $className;
				$controler->execute();
			}else
			{
				echo 'Erro';
			}
		}

		public function CheckIfFileExists($fileName) : Bool
		{
			$check = file_exists('Controllers/'.$fileName.'.php') == true ? true : false;

			return $check;
		}

	}

?>
