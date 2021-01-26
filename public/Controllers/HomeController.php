<?php  
	namespace Controllers;

	class HomeController
	{

	private $cleanLink;
	private $view;

	public function __construct()
	{
	  $storage = isset($_COOKIE['link']) ? unserialize($_COOKIE['link']) : null;
      $this->view = new \Views\MainView('home', ['title' => 'Encurtador de link personalizado','storage' => $storage]);
    }

	public function execute()
	{
		$this->view->render();
		$verifyForm = isset($_POST['action']) && !empty($_POST['link']) ? $this->main() : null;
	}

	protected function main()
	{
		$this->setLink($_POST['link']);

		$validate = $this->validateUrl($this->cleanLink);

		if($validate == true){

			$smallLink = $this->GenerateSmallRandomUrl();

			$cadBd = new \Models\HomeModel;

			$return = $cadBd->registerUrl($this->cleanLink, $smallLink);

			if($return === true)
			{
				$this->cache($this->cleanLink,$smallLink);
				$this->view->renderBlock('link', ['content' => "<p>Seu link encurtado é https://knil.xyz/$smallLink</p>"]);
				
			}else{
				$this->view->renderBlock('link', ['content' => "<p>Pedimos desculpas, não conseguimos cadastrar o link.</p>"]);
			}
			
		}
		else{
			$this->view->renderBlock('link', ['content' => '<p>Verifique se seu link é valido. E que tenha o tamanho maximo de 312 caracteres. Ex: https://exemplo.com.br/exemplo</p>']);
		}
	}

	protected function setLink($obj)
	{
		$dirtyLink = filter_var($obj, FILTER_SANITIZE_URL);
		$filterLink = htmlentities($dirtyLink);
		
		$this->cleanLink = $filterLink;
	}

	protected function GenerateSmallRandomUrl()
	{
		$smallRandomUrl = substr(uniqid(), 8);

		return $smallRandomUrl;
	}

	protected function validateUrl($url)
	{
		$validateUrl = preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]{312})*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$url);
		
		return $validateUrl;
	}

	protected function cache($link, $smallLink)
	{
		$cookie = !isset($_COOKIE['link']) ? $this->createCache($link,$smallLink) : $this->updateCache($link,$smallLink);
	}

	protected function createCache(String $link,$smallLink)
	{	
		$infos = serialize([['link' => "$link",'smallLink' => "https://knil.xyz/$smallLink"]]);
		setcookie('link',$infos, time()+90000000);
		
	}

	protected function updateCache(String $link, String $smallLink)
	{
		$cookie = unserialize($_COOKIE['link']);
		
		$key = array_key_last($cookie)+1;

		$cookie[$key] = ['link' => "$link",'smallLink' => "https://knil.xyz/$smallLink"];
		$info = serialize($cookie);
		setcookie('link',$info, time()+90000000);
	}

}
