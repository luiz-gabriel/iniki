<?php namespace Controllers;
  class ContatoController{

    private $view;

    public function execute()
    {
      $this->view->render();
      ContatoController::mail();
    }

    public function __construct()
    {
      $this->view = new \Views\ContatoView('contato');

		}


    public static function mail(){
      if(isset($_POST['acao']) && !empty($_POST['name']) && !empty($_POST['assunto']) && !empty($_POST['email']) && !empty($_POST['menssagem'])){

        $name = \html_entity_decode($_POST['name']);
        $assunto = \html_entity_decode($_POST['assunto']);
        $email = \html_entity_decode($_POST['email']);
        $mensagem = \html_entity_decode($_POST['menssagem']);

				$send = new \Models\ContatoModel;
        $verify = $send->sendEmail($name, $assunto, $email, $mensagem);
        $verify === true ? true : false;

        if ($verify === true) {
        $render = \Views\ContatoView::render_link('Sua mensagem foi enviada com sucesso');
          die();
        }else{
        $render = \Views\ContatoView::render_link('Tivemos um problema ao enviar sua mensagem, mas entre em contato direto pelo email contato@iniki.xyz');
        die();
        }

    }
  }



}
