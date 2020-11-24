<?php namespace Controllers;

  class GeradordesenhasController{

    private $view;

    public function __construct(){
      $this->view = new \Views\GeradordesenhasView('geradordesenhas');
    }

    public function execute(){
      $this->view->render();
    }
  }