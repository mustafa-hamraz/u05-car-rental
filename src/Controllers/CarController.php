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
  { $model = new Model();
    $exists = $model->db_exists_car($_POST["add-reg-number"]);
    if(!$exists==0)
    {
      return '<h1>Error! Car Already Exsits!</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }
    
    $model->db_add_car(
      $_POST["add-reg-number"],
      $_POST["add-make"],
      $_POST["add-color"],
      $_POST["add-year"],
      $_POST["add-price"]
    );
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
    $model = new Model();
    $exists = $model->db_exists_car($_POST["remove-reg-number"]);
    if(!$exists==1)
    {
      return '<h1>Car Does Not Exsits!</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }
    
    $model->db_remove_car($_POST["remove-reg-number"]);
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
    $model = new Model();
    $exists = $model->db_exists_car($_POST["edit-reg-number"]);
    if(!$exists==1)
    {
      return '<h1>Customer Does Not Exsits!</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }else{
      $list = $model->db_return_for_edit_car($_POST["edit-reg-number"]);
      $carInfo = $list[0];
  
      $emptyMap = ["carArray" => $carInfo];
      return $twig->loadTemplate("CarHTML\EditingCarView.twig")->render($emptyMap);
    }
  }

  public function carEdited($twig)
  {
    $model = new Model();
    $model->db_edit_car(
      $_POST["carId"],
      $_POST["edit-make"],
      $_POST["edit-color"],
      $_POST["edit-year"],
      $_POST["edit-price"]
    );

    $emptyMap = [];
    return $twig->loadTemplate("CarHTML\CarEditedView.twig")->render($emptyMap);
  }

  public function listCars($twig) 
  {
    $model = new Model();
    $list = $model->db_list_cars();

    $emptyMap = ["list" => $list];
    return $twig->loadTemplate("CarHTML\ListCarsView.twig")->render($emptyMap);
  }
}