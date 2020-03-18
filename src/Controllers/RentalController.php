<?php
namespace Main\Controllers;

use Main\Models\Model;

class RentalController {
  public function startRental($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\AddCarView.twig")->render($emptyMap);
  }

  
}