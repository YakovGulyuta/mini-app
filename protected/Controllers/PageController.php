<?php


namespace Controllers;


use Core\Base\Controller;

class PageController extends Controller
{
  public function listAction()
  {
    print_r($this->routes);
    echo __METHOD__;
  }

  public function viewAction()
  {
    echo '<pre>';
    print_r($this->routes);
    echo '</pre>';
    echo __METHOD__;
  }

  public function aliasAction()
  {
    echo __METHOD__;
  }

  public function randAction()
  {
    echo __METHOD__;
  }
}