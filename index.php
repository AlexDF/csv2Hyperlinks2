<?php
  /*
  ini_set('display_startup_erros',1);
  ini_set('display_errors',1);
  error_reporting(-1);*/

  /*include 'classes/Csv.class.php';
  include 'classes/Print.class.php';
  include 'classes/Html.class.php';*/

  function my_autoloader($class) {
    $filepath = 'classes/' . str_replace("\\", "/", $class) . '.class.php';
    include $filepath;
  }

  spl_autoload_register('my_autoloader');

  \HtmlController\Html::render($_GET['page_type']);

?>