<?php namespace Controllers;

  class MonitorarlinkController
  {

    private $view;

    public function __construct(){
      $this->view = new \Views\MonitorarlinkView('monitorar');
    }

    public function execute()
    {
      $this->view->render();
      MonitorarlinkController::Monitoring();
    }

    public function Monitoring()
    {
      if (isset($_POST['acao']) && !empty($_POST['link'])) {
        $url = $_POST['link'];

        $filterUrl = \html_entity_decode($url);

        $verify = new \Models\MonitorarlinkModel;
        $monitoring = $verify->Verifylink($filterUrl);

        if ($monitoring == true) 
        {
          $render = \Views\HomeView::render_link("Você tem $monitoring[0] clicks");
        }else{
          $render = \Views\HomeView::render_link("Não encontramos seu link na nossa base");
        }
        
      }
    }
  }
