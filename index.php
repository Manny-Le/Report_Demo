<?php
require_once('connect.php');
require_once('models/session.php');
session_start();

  if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (isset($_GET['id'])) {
    }
  } else {
    $action = 'index';
  }
} else {
  $controller = 'pages';
  $action = 'home';
  $_GET['id'] = 1;
}


//if (Session::checkSession('loggedIn') == false && $controller != 'authentication') {
//  // $controller= 'authentication';
//  // $action = 'login';
//  header('location:index.php?controller=authentication&action=index');

//}

echo "<pre>";
var_dump($_SERVER);
echo "</pre>";


require_once('routes.php');
// require_once __DIR__.'./vendor/autoload.php';

// use app\core\Application;

// $app = new Application(dirname(__DIR__));

// $app->router->get('/', function(){
//   return 'home';
// });

// $app->router->get('/contact', 'contact');
 
// $app->run();
?>