<?php
require_once('connect.php');
require_once('models/session.php');
session_start();


// if (Session::checkSession('loggedIn') == false) {
//   $controller = 'authentication';
//   $action = 'index';
// } else {
  
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


if (Session::checkSession('loggedIn') == false && $controller != 'authentication') {
  // $controller= 'authentication';
  // $action = 'login';
  header('location:index.php?controller=authentication&action=index');
  
}

require_once('routes.php');

?>