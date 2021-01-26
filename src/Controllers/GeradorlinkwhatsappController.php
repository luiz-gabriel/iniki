<?php namespace Controllers;

  class GeradorlinkwhatsappController{

    private $view;

    public function __construct(){
      $this->view = new \Views\GeradorlinkwhatsappView('whats');
    }

    public function execute(){
      $this->view->render();
    }
  }