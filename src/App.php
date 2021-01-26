<?php

	class App
	{

		protected $url;

		public function setUrl()
		{
			$dirtyUrl = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Home';
	    	$filterUrl = filter_var($dirtyUrl, FILTER_SANITIZE_URL);

	    	$this->url = strip_tags($filterUrl);
		}

		public function execute(){
			$newUrl = ucfirst($this->url);
			$newUrl.="Controller";
			
			if(file_exists('Controllers/'.$newUrl.'.php'))
			{
				$className = 'Controllers\\'.$newUrl;
				$controler = new $className;
				$controler->execute();
			}else{
				include('Views/Pages/404.php');
				die();
			}
		}
	}

?>
