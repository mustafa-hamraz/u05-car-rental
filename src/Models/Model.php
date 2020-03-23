<?php
namespace Main\Models;

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

    $connection = new \PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    if(!$connection) die;
    return $connection;
  }
 





  /***************************** Customer ******************************/

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
  }

  //Function that checks if a customer exists in the databse and return 0 for false and 1 for true.
  public function db_exists_customer($personNumber)
  {
    $conn = $this->login();
    $sql = 'SELECT EXISTS(SELECT * FROM customers WHERE person_number="'.$personNumber.'");';
    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetch();
    return $answer[0];
  }

  public function db_return_for_edit_customer($personNumber)
  {
    $conn = $this->login();
    $sql = 'SELECT * FROM customers WHERE person_number="'.$personNumber.'";';
    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetchAll();
    return $answer;
  }

  //Function that find a customer with help of person_number and allows user to chage the name, address and etc.
  public function db_edit_customer($personNumber, $newName, $newAddress, $newPostalAddress, $newPhoneNumber)
  {
    $conn = $this->login();
    $sql = 'UPDATE customers 
              SET name="'.$newName.'", address="'.$newAddress.'", postal_address="'.$newPostalAddress.'", phone_number="'.$newPhoneNumber.'"
            WHERE person_number = "'.$personNumber.'";';
    $conn->exec($sql);
  }

  public function db_list_customers()
  {
    $conn = $this->login();
    $sql = 'SELECT * FROM customers;';

    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetchAll();
    return $answer;
  }











  /***************************** Car ******************************/
  //Function that insert a car in the database
  public function db_add_car($registrationNumber, $make, $color, $year, $price)
  {
    $conn = $this->login();
    $sql ='INSERT INTO cars (registration_number, make, color, year, price)
    VALUES("'.$registrationNumber.'", "'.$make.'", "'.$color.'", "'.$year.'", "'.$price.'");';
    $conn->exec($sql);
  } 

  //Function that delete a car from database based on registration number.
  public function db_remove_car($registrationNumber)
  {
    $conn = $this->login();
    $sql ='DELETE FROM cars WHERE registration_number = "'.$registrationNumber.'";';
    $conn->exec($sql);
  }

  //Function that checks if a car exists in the car table based on registration number.
  public function db_exists_car($registrationNumber)
  {
    $conn = $this->login();
    $sql = 'SELECT EXISTS(SELECT * FROM cars WHERE registration_number="'.$registrationNumber.'");';
    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetch();
    return $answer[0];
  }

  //Function that edit all information about a car based on the registration number which is primary key.
  public function db_edit_car($newRegistrationNumber, $newMake, $newColor, $newYear, $newPrice)
  {
    $conn = $this->login();
    $sql = 'UPDATE cars 
              SET make="'.$newMake.'", color="'.$newColor.'", year="'.$newYear.'", price="'.$newPrice.'"
            WHERE registration_number = "'.$newRegistrationNumber.'";';
    $conn->exec($sql);
  }

  //Function that gets all the data from car table and return as map.
  public function db_list_cars()
  {
    $conn = $this->login();
    $sql = 'SELECT * FROM cars;';

    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetchAll();
    return $answer;
  }








  /***************************** Rental ******************************/
  
  //Function that require a person number and registration number and starts rental and also adds the current date/time.
  public function db_start_rental($personNumber,$registrationNumber)
  {
    $startTime = date("Y/m/d h:i");
    $conn = $this->login();
    $sql ='INSERT INTO rental (person_number, registration_number, rental_start_time)
    VALUES("'.$personNumber.'", "'.$registrationNumber.'", "'.$startTime.'");';
    $conn->exec($sql);
  } 

  //Function that gets all the data from rental table and return as map ($answer).
  public function db_list_rental()
  {
    $conn = $this->login();
    $sql = 'SELECT * FROM rental;';

    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetchAll();
    return $answer;
  }

  //Function that end rental based on registration number. Delete the data from rental tabel. Insert the end rental to hisroy.
  public function db_end_rental($registrationNumber)
  {
    $conn = $this->login();
    $sql = 'SELECT * FROM rental WHERE registration_number="'.$registrationNumber.'";';
    $statement = $conn->prepare($sql);
    $result = $statement->execute();
    $answer = $statement->fetch();
    $personNumber = $answer['person_number'];
    $rentalStartTime = $answer['rental_start_time'];
    $rentalEndTime = date("Y/m/d h:i");

    $delete_sql ='DELETE FROM rental WHERE registration_number = "'.$registrationNumber.'";';
    $conn->exec($delete_sql);

    $history_sql = 'INSERT INTO history (person_number, registration_number, rental_start_time, rental_end_time)
    VALUES  ("'. $personNumber .'", "'. $registrationNumber .'", "'. $rentalStartTime .'", "'. $rentalEndTime .'");';
    $conn->exec($history_sql);
  }


}