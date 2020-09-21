<?php


namespace Core\Base;


class View
{
  public  $data = [];
  public  $layout;
  /**
   * View constructor.
   */
  public function __construct($data)
  {
    $this->data['Controller'] = $data['Controller'];
    $this->data['View'] = $data['action'];
    $this->layout = 'default';

  }

  public function getView()
  {
    require_once LAYTPATH . DEF;

  }

  public function render()
  {

  }
}