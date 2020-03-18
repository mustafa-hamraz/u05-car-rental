<?php
namespace Main\Core;

use Main\Controllers\CustomerController;
use Main\Controllers\CarController;
//use Main\Controllers\RentalController;
use Main\Controllers\MainController;  

class Router {
  public function route($request, $twig) {
    $path = $request->getPath();
    $form = $request->getForm();

    switch ($path) {
      case "/AddCustomer":
        $controller = new CustomerController();
        $htmlCode = $controller->addCustomer($twig);
        return $htmlCode;
        break;

      case "/CustomerAdded":
        $controller = new CustomerController();
        $htmlCode = $controller->customerAdded($twig);
        return $htmlCode;
        break;
      
      case "/RemoveCustomer":
        $controller = new CustomerController();
        $htmlCode = $controller->removeCustomer($twig);
        return $htmlCode;
        break;

      case "/CustomerRemoved":
        $controller = new CustomerController();
        $htmlCode = $controller->customerRemoved($twig);
        return $htmlCode;
        break;  

      case "/EditCustomer":
        $controller = new CustomerController();
        $htmlCode = $controller->editCustomer($twig);
        return $htmlCode;
        break; 

      case "/EditingCustomer":
        $controller = new CustomerController();
        $htmlCode = $controller->editingCustomer($twig);
        return $htmlCode;
        break; 

      case "/CustomerEdited":
        $controller = new CustomerController();
        $htmlCode = $controller->customerEdited($twig);
        return $htmlCode;
        break; 
        
      case "/ListCustomers":
        $controller = new CustomerController();
        $htmlCode = $controller->listCustomers($twig);
        return $htmlCode;
        break; 

      case "/AddCar":
        $controller = new CarController();
        $htmlCode = $controller->addCar($twig);
        return $htmlCode;
        break;

      case "/CarAdded":
        $controller = new CarController();
        $htmlCode = $controller->carAdded($twig);
        return $htmlCode;
        break;
      
      case "/RemoveCar":
        $controller = new CarController();
        $htmlCode = $controller->removeCar($twig);
        return $htmlCode;
        break;

      case "/CarRemoved":
        $controller = new CarController();
        $htmlCode = $controller->carRemoved($twig);
        return $htmlCode;
        break;  

      case "/EditCar":
        $controller = new CarController();
        $htmlCode = $controller->editCar($twig);
        return $htmlCode;
        break; 

      case "/CarEditing":
        $controller = new CarController();
        $htmlCode = $controller->carEditing($twig);
        return $htmlCode;
        break; 

      case "/CarEdited":
        $controller = new CarController();
        $htmlCode = $controller->carEdited($twig);
        return $htmlCode;
        break; 
        
      case "/ListCars":
        $controller = new CarController();
        $htmlCode = $controller->listCars($twig);
        return $htmlCode;
        break; 

      case "/StartRental":
        $controller = new RentalController();
        $htmlCode = $controller->startRental($twig);
        return $htmlCode;
        break; 

      case "/RentalStarted":
        $controller = new RentalController();
        $htmlCode = $controller->rentalStarted($twig);
        return $htmlCode;
        break; 

      case "/EndRental":
        $controller = new RentalController();
        $htmlCode = $controller->endRental($twig);
        return $htmlCode;
        break; 

      case "/RentalEnded":
        $controller = new RentalController();
        $htmlCode = $controller->rentalEnded($twig);
        return $htmlCode;
        break; 

      case "/ListRental":
        $controller = new RentalController();
        $htmlCode = $controller->listRental($twig);
        return $htmlCode;
        break; 

      case "/History":
        $controller = new RentalController();
        $htmlCode = $controller->history($twig);
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
