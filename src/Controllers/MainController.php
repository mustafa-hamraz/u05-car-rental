<?php
namespace Main\Controllers;

use Main\Models\Model;

class MainController {
  public function mainMenu($twig) 
  {
    $emptyMap = [];
    return $twig->loadTemplate("MainMenuView.twig")->render($emptyMap);
  }
}