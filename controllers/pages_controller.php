<?php
require_once('controllers/base_controller.php');
require_once('models/person.php');
require_once('models/project.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $person = Person::findPerByID($_GET['id']);
    $project = Project::getAllProjectbyPersonID($_GET['id']);

    $this->render('home',['person' => $person, 'project' => $project]);
  }

  public function error()
  {
    $this->render('error');
  }

  public function changeHome() {
    

    $this->home();

  }
}

?>