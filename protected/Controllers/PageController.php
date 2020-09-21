<?php


namespace Controllers;


use Core\Base\Controller;

class PageController extends Controller
{
  public function listAction()
  {
    echo '<pre>';
    print_r($this->routes);
    echo '</pre>';
    echo __METHOD__;
    $this->render('index');
  }

  public function viewAction()
  {
    echo '<pre>';
    print_r($this->routes);
    echo '</pre>';
    echo __METHOD__;
    $this->render('view');
  }

  public function aliasAction()
  {
    echo '<pre>';
    print_r($this->routes);
    echo '</pre>';
    echo __METHOD__;
    $this->render('alias');
  }

  public function randAction()
  {
    echo '<pre>';
    print_r($this->routes);
    echo '</pre>';
    echo __METHOD__;
    $this->render('rand');
  }
}