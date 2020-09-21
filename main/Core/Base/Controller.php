<?php


namespace Core\Base;


use Core\Router;

abstract class Controller
{
  /**
   * @var array
   */
  public $routes = [];
  /**
   * @var
   */
  public $layout;
  /**
   * @var
   */
  public $get;

  /**
   * Controller constructor.
   */
  public function __construct($routers, $vars)
  {
    $this->routes = $routers;
    $this->get = $vars;

  }

  /**
   * @param $view
   * @param array $attributes
   * @throws \Exception
   */
  public function render($view, array $attributes = [])
  {

    (new View($this->routes, $this->layout, $view))->render($attributes);

  }


}