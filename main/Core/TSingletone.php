<?php


namespace Core;


/**
 * Trait TSingletone
 * @package Core
 */
trait TSingletone
{
  /**
   * @var
   */
  private static $instance;


  /**
   * TSingletone constructor.
   */
  private function __construct()
  {

  }

  private function __clone()
  {

  }

  private function __wakeup()
  {

  }

  /**
   * @return static
   */
  public static function getInstance(): self
  {
    return self::$instance ?? (self::$instance = new self());
  }
}