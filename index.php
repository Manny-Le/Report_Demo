<?php
require_once('connect.php');

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if (isset($_GET['id'])) {
    }
    
  } else {
    $action = 'index';
    
  $_GET['id'] = 1;
  }
} else {
  $controller = 'pages';
  $action = 'home';
  $_GET['id'] = 1;
}
require_once('routes.php');

?>