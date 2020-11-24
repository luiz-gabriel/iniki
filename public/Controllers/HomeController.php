<?php  
	namespace Controllers;

	class HomeController
	{

	private $cleanLink;
	private $view;

	public function __construct()
	{
      $this->view = new \Views\MainView('home', ['title' => 'Encurtador de link personalizado']);
   }

	public function execute()
	{
		$this->view->render();
		$verifyForm = isset($_POST['action']) && !empty($_POST['link']) ? $this->mainLinkController() : null;
	}

	public function setLink($obj)
	{
		$dirtyLink = filter_var($obj, FILTER_SANITIZE_URL);
		$filterLink = htmlentities($dirtyLink);
		
		$this->cleanLink = $filterLink;
	}

	public function GenerateSmallRandomUrl()
	{
		$smallRandomUrl = substr(uniqid(), 8);

		return $smallRandomUrl;
	}

	public function validateUrl($url)
	{
		$validateUrl = preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]{312})*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$url);
		
		return $validateUrl;
	}

	public function mainLinkController()
	{
		$this->setLink($_POST['link']);

		$validate = $this->validateUrl($this->cleanLink);

		if($validate == true){

			$smallLink = $this->GenerateSmallRandomUrl();

			$cadBd = new \Models\HomeModel;

			$return = $cadBd->registerUrl($this->cleanLink, $smallLink);

			if($return === true)
			{
				$this->view->renderBlock('link', ['content' => "<p>Seu link encurtado é https://knil.xyz/$smallLink</p>"]);
			}else{
				$this->view->renderBlock('link', ['content' => "<p>Pedimos desculpas, não conseguimos cadastrar o link.</p>"]);
			}
			
		}
		else{
			$this->view->renderBlock('link', ['content' => '<p>Verifique se seu link é valido. E que tenha o tamanho maximo de 312 caracteres. Ex: https://exemplo.com.br/exemplo</p>']);
		}
		
	}
	
	}
