<?php
namespace Main\Controllers;

use Main\Models\Model;

class CarController {
  public function addCar($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\AddCarView.twig")->render($emptyMap);
  }

  public function carAdded($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\CarAddedView.twig")->render($emptyMap);
  }

  public function removeCar($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\RemoveCarView.twig")->render($emptyMap);
  }

  public function carRemoved($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\CarRemovedView.twig")->render($emptyMap);
  }

  public function editCar($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\EditCarView.twig")->render($emptyMap);
  }

  public function carEditing($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\EditingCarView.twig")->render($emptyMap);
  }

  public function carEdited($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\CarEditedView.twig")->render($emptyMap);
  }

  public function listCars($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\ListCarsView.twig")->render($emptyMap);
  }
}