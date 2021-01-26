<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);

/* Habilita a exibição de erros */
ini_set("display_errors", 1);

$autoload = function($class){
  include(str_replace('\\', '/',$class.'.php'));
};

spl_autoload_register($autoload);

$app = new App();
$app->setUrl();
$app->execute();
