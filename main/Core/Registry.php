<?php


namespace Core;


/**
 * Class Registry
 * @package Core
 */
class Registry
{
  use TSingletone;


  /**
   * @var array
   */
  private static $props = [];


  /**
   * @param $name
   * @return mixed
   */
  public function getProp($name): string
  {
    return self::$props[$name];
  }

  /**
   * @return array
   */
  public function getProps(): array
  {
    return self::$props;
  }

  /**
   * @param $props
   * @param $name
   */
  public function setProps($props, $name): void
  {
    self::$props[$props] = $name;
  }


}