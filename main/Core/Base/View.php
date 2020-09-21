<?php


namespace Core\Base;


class View
{
  /**
   * @var array
   */
  public $data = [];
  /**
   * @var false|mixed|string
   */
  public $layout;

  /**
   * View constructor.
   */
  public function __construct($data, $layout, $view)
  {
    $this->data['Controller'] = $data['Controller'];
    $this->data['View'] = $view;
    if ($layout === false) {
      $this->layout = false;
    }
    $this->layout = $layout ?: DEF;

  }


  /**
   * @param $attributes
   * @throws \Exception
   */
  public function render($attributes)
  {
    ob_start();
    $viewFile = APP . 'Views/' . $this->data['Controller'] . DIRECTORY_SEPARATOR . $this->data['View'] . '.php';
    if (!is_file($viewFile)) {
      throw new \Exception("Такого вида {$viewFile} не существует");
    }
    if ($attributes) {
      extract($attributes);
    }
    require_once $viewFile;
    $content = ob_get_contents();
    ob_end_clean();

    $layoutFile = LAYTPATH . $this->layout . '.php';
    if (!is_file($layoutFile)) {
      throw new \Exception("Такого шаблона {$layoutFile} не существует");
    }
    require_once $layoutFile;
  }
}