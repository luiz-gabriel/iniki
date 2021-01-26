<?php namespace Controllers;

  class EncurtadordelinkpersonalizadoController{

    private $view;

    public function __construct(){
      $this->view = new \Views\EncurtadordelinkpersonalizadoView('personalizado');
    }

    public function execute(){
      $this->view->render();
      EncurtadordelinkpersonalizadoController::shortenPersonaliteUrl();
    }

    public function shortenPersonaliteUrl(){
      if(isset($_POST['acao']) && !empty($_POST['url']) && !empty($_POST['link']) ){
        $url = $_POST['url'];
        $hash = $_POST['link'];

        $filterUrl = strip_tags($url, "_");

        $cleanUrl = htmlspecialchars_decode($filterUrl, FILTER_SANITIZE_STRING);

        $filterHash = strip_tags($hash, FILTER_SANITIZE_SPECIAL_CHARS);

        $cleanHash = htmlspecialchars_decode($filterHash, FILTER_SANITIZE_STRING);

        $verify = new \Models\EncurtadordelinkpersonalizadoModel;

        $search = $verify->verifyUrl($cleanHash);

        if($search == true)
        {
          \Views\EncurtadordelinkpersonalizadoView::render_text('Este link já existe');
          die();
        }else{
          $cad = new \Models\EncurtadordelinkpersonalizadoModel;

          if (!empty($cleanUrl) && !empty($cleanHash)) {
            $register = $cad->registerUrl($cleanUrl, $cleanHash);
            if ($register === true)
            {
              \Views\EncurtadordelinkpersonalizadoView::render_text("Seu link é knil.xyz/$hash");
              die();
            }else{
              \Views\EncurtadordelinkpersonalizadoView::render_text("Desculpe mas não foi possivel cadastrar o link");
              die();
            }

          }else{
            \Views\EncurtadordelinkpersonalizadoView::render_text('Preencha os campos corretamente');
            die();
          }
          
        }

      }else if(isset($_POST['acao']) && empty($_POST['url']) && empty($_POST['link']))
      {
        \Views\EncurtadordelinkpersonalizadoView::render_text("Preencha os campos de maneira correta!");
        die();
      }
    }
  }
