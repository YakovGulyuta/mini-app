<?php


namespace Core;


class Router
{
  /**
   * @var array
   */
  private static $routes = [];
  /**
   * @var array
   */
  private static $route = [];


  /**
   * @throws \Exception
   */
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

  /**
   *
   */
  private static function setRoutes(): void
  {
    $routes = require CONF . 'routes.php';
    self::$routes = $routes;
  }

  /**
   * @return bool
   */
  private static function matchRoute(): bool
  {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri, '/');
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#{$pattern}#", $uri, $matches)) {
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

  /**
   * @throws \Exception
   */
  private static function createController(): void
  {

    $controller = self::$route['Controller'];
    $action = self::$route['action'];
    $vars = self::$route['parameters'];
    $controllerPath = 'Controllers\\';
    $className = $controllerPath . $controller . 'Controller';
    if (!class_exists($className)) {
      throw new \Exception("Контроллера $className  не существует");
    }
    $controllerObj = new $className(self::$route);
    if (!method_exists($controllerObj, $action . 'Action')) {
      throw new \Exception("Такого метода $action  не существует");
    }
    call_user_func([$controllerObj, $action . 'Action']);

  }
}