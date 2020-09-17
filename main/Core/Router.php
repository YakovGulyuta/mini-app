<?php


namespace Core;




class Router
{
  private static $routes = [];
  private static $route;


  public static function run()
  {
    self::setRoutes();
    if (!self::matchRoute()) {
      throw new \Exception('Такого адреса не существует');
    }
    self::createController();
  }

  /**
   * @return array
   */
  public static function getRoutes(): array
  {
    return self::$routes;
  }

  /**
   * @return mixed
   */
  public static function getRoute()
  {
    return self::$route;
  }

  private static function setRoutes(): void
  {
    $routes = require CONF . 'routes.php';
    self::$routes = $routes;
  }

  private static function matchRoute(): bool
  {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri, '/');
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#{$pattern}#", $uri, )) {
        self::$route = $route;
        return true;
      }
    }
    return false;
  }

  private static function createController()
  {
    $controllerPath = ROOT . 'protected/controller/';
    print_r(self::$route) ;
  }
}