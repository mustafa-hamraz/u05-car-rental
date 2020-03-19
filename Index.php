<?php
  use Main\Core\Router;
  use Main\Core\Request;

  //use Main\Models\Model;

  require_once "src/Models/Model.php";
  $model = new Model();

  echo $model->db_customer_exists("199604054495");
  
  require_once __DIR__ . "/vendor/autoload.php";
  $loader = new Twig_Loader_Filesystem(__DIR__ . "/src/Views");
  $twig = new Twig_Environment($loader);
  
  $request = new Request();
  $router = new Router();
  $htmlCode = $router->route($request, $twig);
  echo $htmlCode;
