<?php


namespace Core\Base;


use Core\Router;

abstract class Controller
{
  public $routes;

  /**
   * Controller constructor.
   */
  public function __construct($routers)
  {
    $this->routes = $routers;
  }
}