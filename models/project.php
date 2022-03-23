<?php

class Project {
  public $proID;
  public $proName;
  public $proStart;
  public $proEnd;
  public $perID;
  
  public function __construct($proID, $proName, $proStart, $proEnd, $perID) {
    $this->proID = $proID;
    $this->proName = $proName;
    $this->proStart = $proStart;
    $this->proEnd = $proEnd;
    $this->perID = $perID;
  }


  public function getAllProject() {
    $list = [];
    $db = connDB::getInstance();
    $req = $db->query('SELECT * FROM project');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Project($item['proID'], $item['proName'], $item['proStart'], $item['proEnd'], $item['perID']);
    }
    return $list;
  }

  public function getAllProjectbyPersonID($personID) {

    $list = [];
    $db = connDB::getInstance();
    $stmt = $db->prepare('SELECT * FROM project JOIN persons  ON project.ID = persons.ID WHERE project.ID = :id');

    $req->execute(array('ID'=>$personID));
    $items->fetchAll();

    foreach ($tems as $item) {
      $list[] = new Project($item['proID'], $item['proName'], $item['proStart'], $item['proEnd'], $item['perID']);
    }
    return $list;
  }


  public function findProjectByID($ID)
  {

    $db = connDB::getInstance();
    $req = $db->prepare('SELECT * FROM project WHERE proID = :ID');
    $req->execute(array('ID'=> $ID));
    $item = $req->fetch();
    if (isset($item['ID'])) {
      $list =  new Project($item['proID'], $item['proName'], $item['proStart'], $item['proEnd'], $item['perID']);
    }
    
    return $list;
  }

  public function insertProByID($data){

    $db = connDB::getInstance();
    $stmt = $db->prepare('INSERT INTO project (proName, proStart, proEnd, perID) VALUES (:name, :start, :end, :perID)');
    
    $stmt->bindParam(':name', $data['proName']);
    $stmt->bindParam(':job', $data['proStart']);
    $stmt->bindParam(':gender', $data['proEnd']);
    $stmt->bindParam(':phone', $data['perID']);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
  }

  public function insertPro($data){

    $db = connDB::getInstance();
    $stmt = $db->prepare('INSERT INTO project (proName, proStart, proEnd, perID) VALUES (:name, :start, :end, :perID)');
    
    $stmt->bindParam(':name', $data['proName']);
    $stmt->bindParam(':start', $data['proStart']);
    $stmt->bindParam(':end', $data['proEnd']);
    $stmt->bindParam(':perID', $data['perID']);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
  }

  public function updatePro($data) {
    $db = connDB::getInstance();
    $stmt = $db->prepare('UPDATE project SET proName = :name,
    proStart = :start, proEnd = :end, perID = :perID');

    $stmt->bindParam(':name', $data['proName']);
    $stmt->bindParam(':start', $data['proStart']);
    $stmt->bindParam(':end', $data['proEnd']);
    $stmt->bindParam(':perID', $data['perID']);

    $stmt->bindParam(':id', $data['proID']);

    if($stmt->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function delProject($personID) {

    $db = connDB::getInstance();
    
    $stmt= $db->prepare('DELETE FROM project 
                          WHERE ID = :id');

    $stmt->bindParam(':id', $personID);
    
    return ($stmt->execute()) ? true:false;
  }


}


?>

