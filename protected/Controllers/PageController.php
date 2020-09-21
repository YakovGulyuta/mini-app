<?php


namespace Controllers;


use Core\Base\Controller;

class PageController extends Controller
{

  public function listAction()
  {

    $this->render('index', []);
  }

  public function viewAction($id)
  {
    print_r($id);
    $this->render('view', []);
  }

  public function aliasAction()
  {
    $this->render('alias', []);
  }

  public function randAction($alias, $id)
  {
    print_r($id);
    print_r($alias);
    $this->render('rand', []);
  }
}