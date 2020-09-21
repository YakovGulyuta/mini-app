<?php


namespace Core\Base;


use Core\Router;

abstract class Controller
{
  public $routes = [];

  /**
   * Controller constructor.
   */
  public function __construct($routers)
  {
    $this->routes = $routers;
  }

  public function render($view, array $attributes = [])
  {
    extract($this->routes['GET']);
//    echo '<br>' . $id;
//    echo '<br>' . $alias;
    (new View($this->routes))->getView();
//    echo '<br>' . 'Вид: ' . $view;
  }
}