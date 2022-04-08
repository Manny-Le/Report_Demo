<?php
$controllers = array(
  'pages' => ['home', 'error', ],
  'persons' => ['index', 'showPerson', 
                'addPerson', 'insert', 
                'errorPerson', 'editPerson',
                'confirmDelete','deletePerson'],
  'projects' => ['insert','index','showProject','addProject','confirmDelete','deleteProject'],
  'authentication' => ['index','login','logout'],
);

if (!array_key_exists($controller, $controllers) 
      || !in_array($action, $controllers[$controller])) {
  $controller = 'pages';
  $action = 'error';
}


include_once('controllers/' . $controller . '_controller.php');

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
// $controller->$action();
call_user_func_array([$controller,$action],[$id]);

// class Router {
//   protected $routes = [];
//   protected $params = [];
//   protected $method = [];
// }

?>