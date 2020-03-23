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
    $model = new Model();
    $carexists = $model->db_exists_car($_POST["rental-reg-number"]);
    $customerEsists = $model->db_exists_customer($_POST["rental-person-number"]);
    
    if(!$customerEsists == 1 &&  !$carexists == 1){
      return '<h1>Invalid Info</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }

    $model->db_start_rental(
      $_POST["rental-person-number"],
      $_POST["rental-reg-number"]
    );
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
    $model = new Model();
    $rentalExists = $model->db_exists_rental($_POST["end-rental-reg-number"]);
    if(!$rentalExists == 1){
      return '<h1>Error! Invalid Registration Number</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }

    $model->db_end_rental($_POST["end-rental-reg-number"]);
    $emptyMap = [];
    return $twig->loadTemplate("RentalHTML\RentalEndedView.twig")->render($emptyMap);
  }

  public function listRental($twig) 
  {
    $model = new Model();
    $list = $model->db_list_rental();

    $emptyMap = ["list" => $list];
    return $twig->loadTemplate("RentalHTML\ListRentalView.twig")->render($emptyMap);
  }
  
  public function history($twig) 
  {
    $model = new Model();
    $list = $model->db_list_history();

    $emptyMap = ["list" => $list];
    return $twig->loadTemplate("RentalHTML\HistoryView.twig")->render($emptyMap);
  }
}