<?php namespace Controllers;

  class HomeController{

    private $view;

    public function __construct(){
      $this->view = new \Views\HomeView('home');
    }

    public function execute(){
      $this->view->render();
      HomeController::shortenRadomUrl();
    }

    public function shortenRadomUrl(){
      
      if(isset($_POST['acao']) && !empty($_POST['url']) ){
        $url = $_POST['url'];


        $filterUrl = strip_tags($url, FILTER_SANITIZE_SPECIAL_CHARS);

        $cleanUrl = html_entity_decode($filterUrl, FILTER_SANITIZE_STRING);
        $hash = substr(uniqid(), 8);
        $register = new \Models\HomeModel;

        $ultimoId = $register->registerUrl($cleanUrl,$hash);
        
        $render = \Views\HomeView::render_link("Seu link é knil.xyz/$hash");
      }else if(isset($_POST['acao']) && empty($_POST['url']))
      {
        $render = \Views\HomeView::render_link('Preencha o campo!');
        die();
      }
    }
}