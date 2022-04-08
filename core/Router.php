<?php
// $controllers = array(
//   'pages' => ['home', 'error', ],
//   'persons' => ['index', 'showPerson', 
//                 'addPerson', 'insert', 
//                 'errorPerson', 'editPerson',
//                 'confirmDelete','deletePerson'],
//   'projects' => ['insert','index','showProject','addProject','confirmDelete','deleteProject'],
//   'authentication' => ['index','login','logout'],
// );

// if (!array_key_exists($controller, $controllers) 
//       || !in_array($action, $controllers[$controller])) {
//   $controller = 'pages';
//   $action = 'error';
// }


// include_once('controllers/' . $controller . '_controller.php');

// $klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
// $controller = new $klass;
// // $controller->$action();
// call_user_func_array([$controller,$action],[$id]);
namespace app\core;
use app\core\Request;

class Router 
{
  private array $routes = [];
  private Request $request;

  public function __construct(Request $request){
    $this->request = $request;
  }

  public function get(string $path,$callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    $callback = $this->$routes[$method][$path] ?? false;
    if ($callback === false) {
      echo "Action not found";
      exit;
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }
    echo call_user_func($callback);
  }

  public function renderView($view)
  {
    include_once Application::$ROOT_DIR ."./views/$view.php";
  }
}

?>