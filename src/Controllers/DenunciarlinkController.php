<?php namespace Controllers;

  class DenunciarlinkController
  {

    private $view;

    public function __construct(){
      $this->view = new \Views\DenunciarlinkView('denunciarlink');
    }

    public function execute(){
      $this->view->render();
      DenunciarlinkController::Denunciar();
    }

    public function Denunciar()
    {
      if (isset($_POST['action']) && !empty($_POST['url']) && !empty($_POST['motivo'])){
        $url = $_POST['url'];

        $motivo = $_POST['motivo'];

        $cleanUrl = htmlspecialchars_decode($url, FILTER_SANITIZE_STRING);

        $filterMotivo = strip_tags($motivo, FILTER_SANITIZE_SPECIAL_CHARS);

        $cleanMotivo = htmlspecialchars_decode($filterMotivo, FILTER_SANITIZE_STRING);

        $cad = new \Models\DenunciarlinkModel;

        $denun = $cad->denunciarUrl($cleanUrl,$cleanMotivo);

        if($denun === true){
          $render = \Views\HomeView::render_link("Você denunciou link $cleanUrl pelo motivo $cleanMotivo");
        }else{
          $render = \Views\HomeView::render_link("Desculpe, mas não conseguimos registrar sua denuncia.");
        }
      }
    }
  }
