<?php
require_once('controllers/base_controller.php');
require_once('models/project.php');
require_once('models/person.php');

class ProjectsController extends BaseController
{

  public function __construct() {
    $this->folder = 'projects';
    }

  public function index() {

    $projects = Project::getAllProject();
    $this->render('index',['projects' => $projects]);
  }

  public function showProject() {

    $project = Project::findProjectByID($_GET['id']);
   
    $this->render('show',['project'=> $project]);
  }

  public function addProject() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'proName' =>  trim($_POST['proName']),
        'proStart' => trim($_POST['proStart']),
        'proEnd' => trim($_POST['proEnd']),
        'ID' => trim($_GET['id']),
      ];
      $error = [
        'proName_err' => '',
        'start_err' => '',
        'end_err' => '',
        'perID_err' => '',
      ];

      //Check input empty, valid & send message back to form
      $error['proName_err'] = (empty($data['proName'])) ? 'Please enter project
      s name.' : '';
      $error['start_err'] = (empty($data['proStart'])) ? 'Please enter project start time.' : '';
      $error['end_err'] = (empty($data['proEnd'])) ? 'Please enter project end time.' : '';
      if (empty($data['ID'])) {
        $error['perID_err'] = 'Please enter person ID.';
      // } else if (null==(Person::findPerByID($data['ID']))) {
        
      //   $error['perID_err'] = 'Person ID does not exist.';
      };

      //Check input clear error
      if (empty($error['proName_err']) && empty($error['start_err']) && empty($error['end_err'])) {
        if (Project::insertPro($data)) {
          echo 'inserted';

         $this->index();
        }

        else {
          
          echo "falie to execute";
        }
        
      }else {
      $this->render('add',['project'=>$data,'error'=>$error]);
      }
    } else {

      //Init data 1st time access addPerson
        $data = [
        'proID' => '',
        'proName' =>  '',
        'proStart' => '',
        'proEnd' => '',
        'ID' => $_GET['id'],
        ];

        $error = [
          'proName_err' => '',
          'start_err' => '',
          'end_err' => '',
          'perID_err' => '',
        ];
        $this->render('add',['project'=>$data]);
    }
  }

  
  public function deleteProject() {

    if (Project::delProjectByProID($_GET['id'])) {

      $this->index();
    } else {
      echo "fail to del";
      $this->render('errorPerson');
    }
  }

  public function confirmDelete() {
    
    $project = Project::findProjectByID($_GET['id']);
    foreach ($project as $key=>$value) {
      $data[$key] = $project->$key;
    }

    $this->render('deleteConfirm',['project'=>$data]);
  }

  
}
?>