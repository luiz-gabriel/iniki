<?php 
	namespace Controllers;		

	class DenunciarlinkController
	{

		private $link;
		private $reason;
		private $view;

		public function __construct()
		{
      	$this->view = new \Views\MainView('denunciar-link', ['title' => 'Denunciar Link']); 
   	}

	   public function execute()
	   {
	   	$this->view->render();  
	   	$denunce = isset($_POST['action']) AND !empty($_POST['link']) AND !empty($_POST['reason'])? $this->mainControllerComplaint() : null;  
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
			
			$this->link = $filterLink; 
	   }

	   public function setReason($obj)
	   {
		   // $dirtyReason = filter_var($obj, FILTER_SANITIZE_SPECIAL_CHARS);
			$filterReason = strip_tags($obj);
			
			$this->reason = $filterReason; 
	   }

	   public function mainControllerComplaint()
	   {
	   	$this->setLink($_POST['link']);

	   	$this->setReason($_POST['reason']);

	   	$validate = $this->validateLink($this->link);
	   	
	   	if($validate == true){
	   		$cadComplaint = new \Models\ComplaintModel();
	   		$return = $cadComplaint->registerComplaint($this->link, $this->reason);

	   		if($return == true){
	   			$this->view->renderBlock('result',['content' => "<p>Você denunciou o link $this->link.</p>"]);
	   		}else{
	   			$this->view->renderBlock('result',['content' => "<p>Tivemos um problema ao registrar a denuncia.</p>"]);
	   		}
	   	}else{ 
	   		$this->view->renderBlock('link',['content' => "<p>Verifireque se o link é valido. Ex: https://knil.xyz/5d7e</p>"]);
			}
	   }
	}
