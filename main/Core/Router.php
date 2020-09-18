<?php


namespace Core;


class Router
{
  private static $routes = [];
  private static $route = [];


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
      if (preg_match("#{$pattern}#", $uri, $matches)) {
//        return print_r($matches);

//        self::$route['uri'] = $matches[0];
        $parts = explode('::', $route[0]);
        self::$route['Controller'] = $parts[0];
        self::$route['action'] = $parts[1];
        array_shift($matches);
        if (count($matches) > 0) {
          self::$route['parameters'] = $matches;
        }
        return true;
      }
    }
    return false;
  }

  private static function createController()
  {

    $controller = self::$route['Controller'];
    $action = self::$route['action'];
    $vars = self::$route['parameters'];
//    d($vars);exit;
    $controllerPath = 'Controllers\\';
    $className = $controllerPath . $controller . 'Controller';
    if (!class_exists($className)) {
      throw new \Exception("Контроллера $className  не существует");
    }
    $controllerObj = new $className();
    if (!method_exists($controllerObj, $action . 'Action')) {
      throw new \Exception("Такого метода $action  не существует");
    }
    call_user_func([$controllerObj, $action . 'Action']);

//    echo '<pre>';
//    echo '</pre>';

  }
}