<?php
  namespace Main\Models;
  
  class Model {
      private $personArray;
      
      public function __construct() {
        $adam = ["name" => "Adam Bertilsson", "address" => "Åvägen 1", "phone" => "12345"];
        $bertil = ["name" => "Bertil Ceasarsson", "address" => "Åvägen 2", "phone" => "23456"];
        $ceasar = ["name" => "Ceasar Davidsson", "address" => "Åvägen 3", "phone" => "34567"];
        $this->personArray = [$adam, $bertil, $ceasar];
      }
      
      public function getAll() {
        return $this->personArray;
      }
      
      public function getIndex($index) {
        if ($index < count($this->personArray)) {
          return $this->personArray[$index];
        }
        else {
          return null;
        }
      }
      
      public function getInterval($startIndex, $lastIndex) {
        if (($startIndex >= 0) && ($lastIndex < count($this->personArray))) {
          return $this->personArray;
        }
        else {
          return null;
        }
      }

      /*public function getInterval($startIndex, $lastIndex) {
        if (($startIndex >= 0) && ($lastIndex < count($this->personArray))) {
          $result = [];

          for ($index = $startIndex; $index <= $lastIndex; ++$index) {
             $result[] = $this->personArray[$index];
          }

          return $result;
        }
        else {
          return null;
        }
      }*/
  }