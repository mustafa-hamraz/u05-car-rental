<?php
namespace Main\Controllers;

use Main\Models\Model;

class CustomerController {
  public function addCustomer($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("AddCustomerView.twig")->render($emptyMap);
  }

  public function listIndex($twig, $firstIndex, $lastIndex) {
    $model = new Model();
    $personArray = $model->getInterval($firstIndex, $lastIndex);
    $map = ["personArray" => $personArray, "firstIndex" => $firstIndex, "lastIndex" => $lastIndex];
    $htmlCode = $twig->loadTemplate("ListIndexView.twig")->render($map);
    return $htmlCode;
  }

  /*public function listIndex($twig, $firstIndex, $lastIndex) {
    $model = new Model();
    $subPersonArray = $model->getInterval($firstIndex, $lastIndex);
    $map = ["subPersonArray" => $subPersonArray, "firstIndex" => $firstIndex, "lastIndex" => $lastIndex];
    $htmlCode = $twig->loadTemplate("ListIndexView.twig")->render($map);
    return $htmlCode;
  }*/
}