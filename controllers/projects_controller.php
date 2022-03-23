<?php
require_once('controllers/base_controller.php');
require_once('models/project.php');

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
}
?>