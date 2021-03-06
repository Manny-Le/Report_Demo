<?php

class Person {
  public $ID;
  public $FullName;
  public $JobApply;
  public $Gender;
  public $Phone;
  public $Mail;
  public $DOB;
  public $Addre;

  public function __construct($id, $fullName, $jobApply, $gender, $phone, $email, $dob, $add) {
    $this->ID = $id;
    $this->FullName = $fullName;
    $this->JobApply = $jobApply;
    $this->Gender = $gender;
    $this->Phone = $phone;
    $this->Mail = $email;
    $this->DOB = $dob;
    $this->Addre = $add;
  }

  public function getAllPerson() {
      $list = [];
      $db = connDB::getInstance();
      $req = $db->query('SELECT * FROM persons');

      foreach ($req->fetchAll() as $item) {
        $list[] = new Person($item['ID'], $item['FullName'], $item['JobApply'], $item['Gender'], $item['Phone'], $item['Mail'], $item['DOB'], $item['Addre']);
      }
      
      return $list;
  }

  public function findPerByID($ID)
  {

    $db = connDB::getInstance();
    $req = $db->prepare('SELECT * FROM persons WHERE ID = :ID');
    $req->execute(array('ID'=> $ID));
    $item = $req->fetch();
    if (isset($item['ID'])){
      $list =  new Person($item['ID'], $item['FullName'], $item['JobApply'], $item['Gender'], $item['Phone'], $item['Mail'], $item['DOB'], $item['Addre']);
    }
    
    return $list;
  }

  public function insertPerson($data){

    $db = connDB::getInstance();
    $stmt = $db->prepare('INSERT INTO persons (FullName, JobApply, Gender, Phone, Mail, DOB, Addre) VALUES (:name, :job, :gender, :phone, :mail, :DOB, :Addre)');
    
    $stmt->bindParam(':name', $data['FullName']);
    $stmt->bindParam(':job', $data['JobApply']);
    $stmt->bindParam(':gender', $data['Gender']);
    $stmt->bindParam(':phone', $data['Phone']);
    $stmt->bindParam(':mail', $data['Mail']);
    $stmt->bindParam(':DOB', $data['DOB']);
    $stmt->bindParam(':Addre', $data['Addre']);

    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
  }
  
  public function updatePerson($data) {
    $db = connDB::getInstance();
    $stmt = $db->prepare('UPDATE persons SET FullName = :name,
    JobApply = :job, Gender = :gender, Phone = :phone, Mail = :mail, DOB = :dob, Addre = :add WHERE id = :id');

    $stmt->bindParam(':name', $data['FullName']);
    $stmt->bindParam(':job', $data['JobApply']);
    $stmt->bindParam(':gender', $data['Gender']);
    $stmt->bindParam(':mail', $data['Mail']);
    $stmt->bindParam(':phone', $data['Phone']);
    $stmt->bindParam(':dob', $data['DOB']);
    $stmt->bindParam(':add', $data['Addre']);

    $stmt->bindParam(':id', $data['ID']);

    if($stmt->execute()){
      return true;
  } else {
      return false;
  }
}

  public function delPerson($id) {

    $db = connDB::getInstance();
    
    $stmt= $db->prepare('DELETE FROM persons 
                          WHERE ID = :id');

    $stmt->bindParam(':id', $id);
    
    return ($stmt->execute()) ? true:false;
  }



}


?>
