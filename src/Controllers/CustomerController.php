<?php
namespace Main\Controllers;

use Main\Models\Model;

class CustomerController {
  private $editPersonNumber;

  public function addCustomer($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\AddCustomerView.twig")->render($emptyMap);
  }

  public function customerAdded($twig) 
  {
    $model = new Model();
    $model->db_add_customer(
      $_POST["add-person-number"],
      $_POST["add-name"],
      $_POST["add-address"],
      $_POST["add-postal-address"],
      $_POST["add-phone-number"]
    );
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
    $model = new Model();
    $exists = $model->db_exists_customer($_POST["remove-person-number"]);
    if(!$exists==1)
    {
      return '<h1>Customer Does Not Exsits!</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }
    
    $model->db_remove_customer($_POST["remove-person-number"]);
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
    $model = new Model();
    $exists = $model->db_exists_customer($_POST["edit-person-number"]);
    if(!$exists==1)
    {
      return '<h1>Customer Does Not Exsits!</h1>
              <form method="post" action="/">
              <input type="submit" value="Main Menu">
              </form>';
    }else{
    $list = $model->db_return_for_edit_customer($_POST["edit-person-number"]);
    $customerInfo = $list[0];

    $emptyMap = ["personArray" => $customerInfo ];
    return $twig->loadTemplate("CustomerHTML\EditingCustomerView.twig")->render($emptyMap);
    }
    
  }

  public function customerEdited($twig) 
  {
    $model = new Model();
    $model->db_edit_customer(
      $_POST["custId"],
      $_POST["edit-name"],
      $_POST["edit-address"],
      $_POST["edit-postal-address"],
      $_POST["edit-phone-number"]
    );

    $emptyMap = [];
    return $twig->loadTemplate("CustomerHTML\CustomerEditedView.twig")->render($emptyMap);
  }

  public function listCustomers($twig) 
  {
    $model = new Model();
    $list = $model->db_list_customers();

    $emptyMap = ["list" => $list];
    return $twig->loadTemplate("CustomerHTML\ListCustomersView.twig")->render($emptyMap);
  }
}