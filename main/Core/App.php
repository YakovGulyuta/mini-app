<?php


namespace Core;


class App
{
  /**
   * @var Registry
   */
  public static $app;


  /**
   * App constructor.
   */
  public function __construct()
  {
    session_start();
    $this::$app = Registry::getInstance();
    $this->setParams();
    Router::run();
  }

  private function setParams()
  {
    $props = require_once CONF . 'parameters.php';
    if (isset($props)) {
      foreach ($props as $k => $v) {
        $this::$app->setProps($k, $v);
      }
    }
  }
}