<?php
$controllers = array(
  'pages' => ['home', 'error', ],
  'posts' => ['index', 'showPost'],
  'persons' => ['index', 'showPerson', 'formView', 'insert', 'errorPerson', 'editPerson'],
);



if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'pages';
  $action = 'error';
}


include_once('controllers/' . $controller . '_controller.php');

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();



?>