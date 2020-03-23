<?php
  use Main\Core\Router;
  use Main\Core\Request;
  
  require_once __DIR__ . "/vendor/autoload.php";
  $loader = new Twig_Loader_Filesystem(__DIR__ . "/src/Views");
  $twig = new Twig_Environment($loader);
  
  $request = new Request();
  $router = new Router();
  $htmlCode = $router->route($request, $twig);
  echo $htmlCode;

