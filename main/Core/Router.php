<?php


namespace Core;


class Router
{
  private static $routes = [];
  private static $route;

//  public function __construct()
//  {
//    $this->getRoutes();
//  }

  public static function run()
  {
    self::setRoutes();
    if (self::matchRoute()) {
      d(self::$route);
    } else {
      echo 'no';
    }

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

  private static function matchRoute()
  {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri, '/');
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#{$pattern}#", $uri, $mathes)) {
        self::$route = $mathes;
        return true;
      }
    }
    return false;
  }
}