<?php
require_once('connect.php');

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (isset($_GET['id'])) {
      $param = $_GET['id'];
    }
    
  } else {
    $action = 'index';
  }
} else {
  $controller = 'pages';
  $action = 'home';
}
require_once('routes.php');

?>