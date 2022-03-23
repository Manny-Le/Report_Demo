<?php
require_once('controllers/base_controller.php');
require_once('models/person.php');
require_once('controllers/projects_controller.php');

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
    $persons = Person::findPerByID($_GET['id']);
    // $project = Project::getAllProjectbyPersonID($_GET['id']);

    $this->render('show',['persons'=> $persons]);
  }

  public function editPerson()
  {
    $person = Person::findPerByID($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'FullName' => trim($_POST['FullName']),
        'JobApply' =>  trim($_POST['JobApply']),
        'Gender' => trim($_POST['Gender']),
        'Phone' => trim($_POST['Phone']),
        'Mail' => trim($_POST['Mail']),
        'DOB' => $_POST['DOB'],
        'ID' => $_GET['id'],
      ];

      $error = [
        'name_err' => '',
        'job_err' => '',
        'gender_err' => '',
        'phone_err' => '',
        'mail_err' => '',
        'DOB_err' => '',
        'empty_err' =>''
      ];
      
      
      //Check if all input value is empty warning nothing change
      if (empty($data['FullName'])
          && empty($data['JobApply'])
          && ($data['Gender'] == $person->Gender)
          && empty($data['Phone'])
          && empty($data['Mail'])
          && empty($data['DOB'])) {
            $error['empty_err'] = 'Please enter field for change.';

            foreach ($data as $key=>$value) {
              $data[$key] = $person->$key;
            }
            

            $this->render('edit',['data' => $data,'error'=>$error]);
      }
      //If 1 field is enter
      else {
        foreach ($data as $key=>$value) {
          $data[$key] = (empty($data[$key])) ? $person->$key : $data[$key];
        }

        $data['ID'] = $person->ID;

        if (Person::updatePerson($data)) {
          $this->render('edit',$data);
        }

        else {
          $this->render('errorPerson');
        }
      }
    } else
    {
      

      foreach ($person as  $key=>$value) {
        $data[$key] = $person->$key;
    }

    

    $this->render('edit',['data' => $data,'error'=>$error]);
    }
  }


  public function error() {
    $this->render('error');
  }

  

  public function addPerson() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'FullName' => trim($_POST['FullName']),
        'JobApply' =>  trim($_POST['JobApply']),
        'Gender' => trim($_POST['Gender']),
        'Phone' => trim($_POST['Phone']),
        'Mail' => trim($_POST['Mail']),
        'DOB' => $_POST['DOB'],
      ];
      $error = [
        'name_err' => '',
        'job_err' => '',
        'gender_err' => '',
        'phone_err' => '',
        'mail_err' => '',
        'DOB_err' => '',
      ];

      //Check input empty & send message back to form
      $error['name_err'] = (empty($data['FullName'])) ? 'Please enter full name.' : '';
      $error['job_err'] = (empty($data['JobApply'])) ? 'Please enter job.' : '';
      $error['gender_err'] = (empty($data['Gender'])) ? 'Please choose gender.' : '';
      $error['phone_err'] = (empty($data['Phone'])) ? 'Please enter phone.' : '';
      $error['mail_err'] = (empty($data['Mail'])) ? 'Please enter email.' : '';
      $error['mail_err'] = (!$this->mailValidate($data['Mail'])) ? 'Please enter correct email.' : '';
      $error['DOB_err'] = (empty($data['DOB'])) ? 'Please enter date.' : '';

      //Check input clear error
      if (empty($error['name_err']) && empty($error['job_err']) && empty($error['gender_err']) && empty($error['phone_err']) && empty($error['mail_err']) && empty($error['DOB_err'])) {
        if (Person::insertPerson($data)) {
         $this->render('insert',$data);
        }

        else {
          $this->render('errorPerson');
        }
        
      }else {    
    
      $this->render('add',['data'=>$data,'error'=>$error]);
      }
    } else {

      //Init data 1st time access addPerson
        $data = [
        'FullName' => '',
        'JobApply' =>  '',
        'Gender' => '',
        'Phone' => '',
        'Mail' => '',
        'DOB' => '',
        
        ];

        $error = [
          'name_err' => '',
          'job_err' => '',
          'gender_err' => '',
          'phone_err' => '',
          'mail_err' => '',
          'DOB_err' => '',
        ];

        $this->render('add',['data'=>$data]);
    }
  }

  public function mailValidate($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
  }

  public function deletePerson() {
    if (Person::delPerson($_GET['id'])) {
      $this->index();
    } else {

      $this->render('errorPerson');
    }
  }

  public function confirmDelete() {
    $person = Person::findPerByID($_GET['id']);
    Project::delProject($_GET['id']);
    foreach ($person as $key=>$value) {
      $data[$key] = $person->$key;
    }
    $this->render('deleteConfirm',['persons'=>$data]);
  }
}




?>