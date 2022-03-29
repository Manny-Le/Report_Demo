<?php
require_once('controllers/base_controller.php');
require_once('models/authentication.php');


class AuthenticationController extends BaseController
{
  public function __construct()
  {
    $this->folder = 'authentication';
  }

  public function index() {
    $this->render('index');
  }

  public function dashboard() {
    if(Session::checkSession()) {
      $this->render('dashboard');
    }

    else {
      $this->render('index');
    }
  }

  public function login() {
    if(Session::checkSession()) {
      $this->render('dashboard');
    }

    else {
    
    $error = [
      'u_error' =>'',
      'p_error' =>''
    ];

    $data = [
      'user_name' =>'',
      'password' =>'',
      'id' => '',
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = ['user_name'=> trim($_POST['user_name']),
      'password' => trim($_POST['password'])];

      
      $count = Authentication::check_user($data['user_name']);


      if($count == 0) {
        $error['u_error'] = 'User name/email does not exist';
      }

      else if (Authentication::getPassword($data['user_name'],$data['password']) == false)
      {
        $error['p_error'] = 'Incorrect password';
      }

      else {
        Session::init();
        Session::set('user_name', $data['user_name']);
        Session::set('id', $data['id']);
        Session::set('authenticated', true);

        $this->render('dashboard');
      }
      $this->render('index',['data'=>$data,'error'=>$error]);
    }

      
  }
  }


  public function logout(){
    Session::init();
    Session::destroy();
    $this->render('index');
  }
}
?>