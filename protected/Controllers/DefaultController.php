<?php


namespace Controllers;


use Core\Base\Controller;

class DefaultController extends Controller
{
  public function indexAction()
  {
      $this->render('index', ['name' => 'Yakov', 'female' => 'Gulyuta']);
  }
}