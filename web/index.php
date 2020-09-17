<?php
use Core\App;
require "../config/bootstrap.php";
$app = new App();
d($app::$app->getProps());