<?php 
	namespace Controllers;

	class MonitorarlinkController
	{
		private $view;
		private $cleanLink;

		public function __construct()
		{
      	$this->view = new \Views\MainView('monitorar', ['title' => 'Monitorar Link']);
   	}
	   
	   public function execute()
	   {
	    	$this->view->render();
	    	$start = isset($_POST['action']) AND !empty($_POST['url']) ? $this->mainMonitorController() : null; 
	   }

	   public function validateLink($url)
	   {
		   $validateUrl = preg_match('/^(http|https):\\/\\/(knil.xyz\\/*)/' ,$url);
			
			return $validateUrl;
	   }

	   public function setLink($obj)
		{
			$dirtyLink = filter_var($obj, FILTER_SANITIZE_URL);
			$filterLink = htmlentities($dirtyLink);
			$link = explode('/', $filterLink);

			$this->cleanLink = isset($link[3]) ? $link[3] : '';
		}

	   public function mainMonitorController()
	   {
	   	$this->setLink($_POST['url']);
	   	$validateLink = $this->validateLink($this->cleanLink);
	   	
	   	if($validateLink == true)
	   	{
	   		$searchLink = new \Models\TrackModel;
	   		$result = $searchLink->trackLink($this->cleanLink);

	   		if(is_int($result))
	   		{
	   			$this->view->renderBlock('result', ['content' => "Você tem $result clicks."]);
	   		}else if($result === false)
	   		{
	   			$this->view->renderBlock('result', ['content' => "Não conseguimos verificar o link na base da dados."]);
	   		}

	   	}else
	   	{
	   		$this->view->renderBlock('link', ['content' => "Verifique se o link está correto. Ex: https://knil.xyz/d54fr"]);
	   	}
	   }


	}
