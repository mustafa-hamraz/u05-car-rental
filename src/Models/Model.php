<?php
//namespace Main\Models;

class Model 
{
  /*
    * Function for connecting to the database.
    * If you your database username and password is not the same you only need to change here.
  */private function login()
  {
    $servername = "localhost";
    $dbName = "rental";
    $username = "homestead";
    $password = "secret";
    $connection = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    if(!$connection) die;
    return $connection;
  }
 
  //Function for adding customer to the database.
  public function db_add_customer($personNumber, $name, $address, $postalAddress, $phoneNumber)
  {
    $conn = $this->login();

    $sql ='INSERT INTO customers (person_number, name, address, postal_address, phone_number)
    VALUES("'.$personNumber.'", "'.$name.'", "'.$address.'", "'.$postalAddress.'", "'.$phoneNumber.'");';

    $conn->exec($sql);
  } 

  //Function for deleteing customer and it requires a persion_number.
  public function db_remove_customer($personNumber)
  {
    $conn = $this->login();

    $sql ='DELETE FROM customers WHERE person_number = "'.$personNumber.'";';

    $conn->exec($sql);
    echo "delet suss";
  } 

  //Function that controls if a customer exists in the databse and return 0 for false ant 1 for true.
  public function db_customer_exists($personNumber)
  {
    $conn = $this->login();
    $sql = 'SELECT EXISTS(SELECT * FROM customers WHERE person_number="'.$personNumber.'");';
    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetch();
    return $answer[0];
  }
}