<?php
namespace Main\Controllers;

use Main\Models\Model;

class RentalController {
  public function startRental($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\StartRentalView.twig")->render($emptyMap);
  }

  public function rentalStarted($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\RentalStartedView.twig")->render($emptyMap);
  }

  public function endRental($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\EndRentalView.twig")->render($emptyMap);
  }

  public function rentalEnded($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\RentalEndedView.twig")->render($emptyMap);
  }

  public function listRental($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\ListRentalView.twig")->render($emptyMap);
  }
  
  public function history($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\HistoryView.twig")->render($emptyMap);
  }
}