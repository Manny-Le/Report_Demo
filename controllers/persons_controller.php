<?php
require_once('controllers/base_controller.php');
require_once('models/person.php');

class PersonsController extends BaseController
{
  function __construct() {
  $this->folder = 'persons';
  }

  public function index() {
    $persons = Person::getAllPerson();
    $this->render('index', ['persons' => $persons]);
  }

  public function showPerson() {
    $persons = Person::findByID($_GET['id']);
    
    $this->render('show',['persons'=> $persons]);
  }

  public function editPerson(){
    $persons = Person::findByID($_GET['id']);
    
    $this->render('edit',['data' => $persons]);
  }

  public function error() {
    $this->render('error');
  }

  

  public function formView() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      echo $_POST['Gender'];
      $data = [
        'FullName' => trim($_POST['FullName']),
        'JobApply' =>  trim($_POST['JobApply']),
        'Gender' => trim($_POST['Gender']),
        'Phone' => trim($_POST['Phone']),
        'Mail' => trim($_POST['Mail']),
        'DOB' => $_POST['DOB'],
        'name_err' => '',
        'job_err' => '',
        'gender_err' => '',
        'phone_err' => '',
        'mail_err' => '',
        'DOB_err' => '',
      ];

      //Check input valid & send message back to form
      $data['name_err'] = (empty($data['FullName'])) ? 'Please enter full name.' : '';
      $data['job_err'] = (empty($data['JobApply'])) ? 'Please enter job.' : '';
      $data['gender_err'] = (empty($data['Gender'])) ? 'Please choose gender.' : '';
      $data['phone_err'] = (empty($data['Phone'])) ? 'Please enter phone.' : '';
      $data['mail_err'] = (empty($data['Mail'])) ? 'Please enter email.' : '';
      $data['mail_err'] = (!$this->mailValidate($data['Mail'])) ? 'Please enter correct email.' : '';
      $data['DOB_err'] = (empty($data['DOB'])) ? 'Please enter date.' : '';

      //Check input clear error
      if (empty($data['name_err']) && empty($data['job_err']) && empty($data['gender_err']) && empty($data['phone_err']) && empty($data['mail_err']) && empty($data['DOB_err'])) {
        if (Person::insertPerson($data)) {
         $this->render('insert',$data);
        }

        else {
          $this->render('errorPerson');
        }
        
      }else {    
    
      $this->render('formView',$data);
      }
    } else {

      //Init data 1st time access formView
        $data = [
          'FullName' => '',
        'JobApply' =>  '',
        'Gender' => '',
        'Phone' => '',
        'Mail' => '',
        'DOB' => '',
        'name_err' => '',
        'job_err' => '',
        'gender_err' => '',
        'phone_err' => '',
        'mail_err' => '',
        'DOB_err' => '',
        ];

        $this->render('formView',$data);
    }
  }

  public function mailValidate($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}









}
?>