<?php
  namespace Main\Core;
  
  use Main\Controllers\CustomerController;
  //use Main\Controllers\CarController;
  //use Main\Controllers\RentalController;
  use Main\Controllers\MainController;  
  
  class Router {
    public function route($request, $twig) {
        $path = $request->getPath();
        $form = $request->getForm();

        //echo "path: $path<br>";
        switch ($path) {
          case "/AddCustomer":
            $controller = new CustomerController();
            $htmlCode = $controller->addCustomer($twig);
            return $htmlCode;
            break;

          case "/CustomerAdded":
          $controller = new CustomerController();
            $htmlCode = $controller->CustomerAdded($twig);
            return $htmlCode;
            break;

          case "/":
          $controller = new MainController();
          return $controller->mainMenu($twig);
        }


         /*($path == "/listAll") {
          $controller = new ListController();
          $htmlCode = $controller->listAll($twig);
          return $htmlCode;
        }
        else if ($path == "/inputIndex") {
          $controller = new InputController();
          return $controller->inputIndex($twig);
        }
        else if ($path == "/listIndex") {
          $controller = new ListController();
          $firstIndex = $form["firstIndex"];
          $lastIndex = $form["lastIndex"];
          return $controller->listIndex($twig, $firstIndex, $lastIndex);
        }
        else if ($path == "/") {
          $controller = new MainController();
          return $controller->mainMenu($twig);
        }
        else {
          return "Router Error!";
        }*/
    }
  }
