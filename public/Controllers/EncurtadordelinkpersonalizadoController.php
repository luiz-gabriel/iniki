<?php
	namespace Controllers;

	class EncurtadordelinkpersonalizadoController
	{
		private $cleanLink;
		private $costumLink;
		private $view;

		public function __construct()
		{
		$storage = isset($_COOKIE['links-personalizado']) ? unserialize($_COOKIE['links-personalizado']) : null;
      	$this->view = new \Views\MainView('personalizado', ['title' => 'Encurtador de link personalizado','storage' => $storage]);
   	}

		public function execute()
		{
			$this->view->render();
			$verifyForm = isset($_POST['action']) && !empty($_POST['link'])? $this->main() : null;
		}

		protected function setLink(String $obj)
		{
			$dirtyLink = filter_var($obj, FILTER_SANITIZE_URL);
			$filterLink = htmlentities($dirtyLink);
			
			$this->cleanLink = $filterLink;
		}

		protected function setCostumLink(String $obj)
		{
			$dirtyCostumLink = filter_var($obj, FILTER_SANITIZE_URL);
			$filterCostumLink = htmlentities($dirtyCostumLink);
			
			$this->costumLink = $filterCostumLink;
		}

		protected function validateUrl()
		{
			$validateUrl = preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]{312})*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$this->cleanLink);
			
			return $validateUrl;
		}

		protected function main()
		{
			
			$this->setLink($_POST['link']);
			$this->setCostumLink($_POST['custom_link']);

			$checkLinkExists = $this->checkLinkExists();
			
			$validateLink = $this->validateUrl();
			
			if($validateLink == true ){
				
				if($checkLinkExists === false)
				{
					$registerLink = new \Models\CostumLinkModel;
					$registerLink->registerCostumLink($this->cleanLink, $this->costumLink);
					$this->cache($this->cleanLink,$this->costumLink);
					$this->view->renderBlock('result', ['content' => "<p>Seu link personalizado é $this->costumLink</p>"]);

				}else if(is_null($checkLinkExists)){
					$this->view->renderBlock('result', ['content' => "<p>Desculpe, o servidor está fora do ar.</p>"]);
				}else{
					$this->view->renderBlock('costumLink', ['content' => '<p>Esse link personalizado já existe.</p>']);
				}

			}else{
				$this->view->renderBlock('link', ['content' => '<p>Pedimos desculpas. O servidor está fora do ar.</p>']);
			}

		}

		protected function checkLinkExists()
		{
			$verify = new \Models\CostumLinkModel;
			$result = $verify->checkIfLinkExists($this->costumLink);
			
			return $result;
		}

		protected function cache($link, $smallLink)
		{
			$cookie = !isset($_COOKIE['link-personalizado']) ? $this->createCache($link,$smallLink) : $this->updateCache($link,$smallLink);
		}

		protected function createCache(String $link,$costumLink)
		{	
			$infos = serialize([['link' => "$link",'costumLink' => "https://knil.xyz/$costumLink"]]);
			setcookie('links-personalizado',$infos, time()+90000000);
			
		}

		protected function updateCache(String $link, String $costumLink)
		{
			$cookie = unserialize($_COOKIE['links-personalizado']);
			
			$key = array_key_last($cookie)+1;

			$cookie[$key] = ['link' => "$link",'costumLink' => "https://knil.xyz/$costumLink"];
			$info = serialize($cookie);
			setcookie('links-personalizado',$info, time()+90000000);
		}

	}
