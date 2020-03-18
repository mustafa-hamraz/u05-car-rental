<?php
namespace Main\Controllers;

use Main\Models\Model;

class CustomerController {
  public function addCustomer($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\AddCustomerView.twig")->render($emptyMap);
  }

  public function customerAdded($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\CustomerAddedView.twig")->render($emptyMap);
  }

  public function removeCustomer($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\RemoveCustomerView.twig")->render($emptyMap);
  }

  public function customerRemoved($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\CustomerRemovedView.twig")->render($emptyMap);
  }

  public function editCustomer($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\EditCustomerView.twig")->render($emptyMap);
  }

  public function editingCustomer($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\EditingCustomerView.twig")->render($emptyMap);
  }

  public function customerEdited($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\CustomerEditedView.twig")->render($emptyMap);
  }

  public function listCustomers($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\ListCustomersView.twig")->render($emptyMap);
  }
  /*public function listIndex($twig, $firstIndex, $lastIndex) {
    $model = new Model();
    $subPersonArray = $model->getInterval($firstIndex, $lastIndex);
    $map = ["subPersonArray" => $subPersonArray, "firstIndex" => $firstIndex, "lastIndex" => $lastIndex];
    $htmlCode = $twig->loadTemplate("ListIndexView.twig")->render($map);
    return $htmlCode;
  }*/
}