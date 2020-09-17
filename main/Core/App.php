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
  }

  private function setParams()
  {
    $props = require_once CONF . 'config.php';
    if (isset($props)) {
      foreach ($props as $k => $v) {
        $this::$app->setProps($k, $v);
      }
    }
  }
}