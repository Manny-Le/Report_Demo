<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP INTERACT WITH DTB</title>
</head>
<body>

 

  <?php

require('./connectionHandler.php');

    $conn = mysqli_connect("localhost", "root", "root","cv_test");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error);
    }

  echo "<br>";

//Validate data server-side
$error = array();
$data = array();
// echo $POST('submit_action');
if (!empty($_POST['submit_action'])) {
  
  $data['FullName'] = isset($_POST['FullName']) ? $_POST['FullName'] : '';
  $data['JobApply'] = isset($_POST['JobApply']) ? $_POST['JobApply'] : '';
  $data['Phone'] = isset($_POST['Phone']) ? $_POST['Phone'] : '';
  $data['Gender'] = isset($_POST['Gender']) ? (string)$_POST['Gender'] : '';
  $data['Mail'] = isset($_POST['Mail']) ? $_POST['Mail'] : '';
  $data['DOB'] = isset($_POST['DOB']) ? $_POST['DOB'] : '';
  
  if (empty($data['FullName'])) {
    $error['FullName'] = 'Field can not be empty';
  }

  if (empty($data['JobApply'])) {
    $error['JobApply'] = 'Field can not be empty';
  }

  if (empty($data['Phone'])) {
    $error['Phone'] = 'Field can not be empty';
  }

  if (empty($data['Gender'])) {
    $error['Gender'] = 'Field can not be empty';
  }

  if (empty($data['Mail'])) {
    $error['Mail'] = 'Field can not be empty';
  }

  else if (!mailValidate($data['Mail'])) {
    $error['Mail'] = 'Please enter correctly Mail address';
  }

  if (empty($data['DOB'])) {
    $error['DOB'] = 'Field can not be empty';
  }
  echo"<br>";


  if (!$error){
    echo 'Data posted';
    
$queryIns = queryInsert($conn, $data, "persons");
if (!mysqli_query($conn, $queryIns)) {
  printf("%d Row inserted.\n", mysqli_affected_rows($con));
}

    
// WRITE TO DB (DONE)
// $stmt = $conn->prepare("INSERT INTO persons (FullName, Gender,Mail,DOB) VALUES (?,?,?,?)");
// $data['DOB'] = date ('Y-m-d');
// $stmt->bind_param("ssss", $data['FullName'], $data['Gender'],$data['Mail'],$data['DOB']);
// $stmt->execute();
    // $queryInsert = "INSERT INTO persons (FullName) VALUES ('" . $data['FullName'] . "')";
//     if ($conn->query($queryInsert) === TRUE) {
//       echo "Record inserted successfully";
//     } else {
//       echo "Error: " . $queryInsert . "<br>" . $conn->error;
// }
}

else{
  echo 'Fail to post data';
}

}
echo "<br>";S


$obj = new \stdClass;
$obj -> $row1['FullName'] = "Manny";
$obj -> JobApply ="FrontEnd Dev";

echo $obj->FullName;

// $querySelect = "SELECT * FROM persons";
// if ($tbData = $conn->query($querySelect)) {
//   while ($obj = mysqli_fetch_all($tbData)) {
//     echo $obj ->FullName. " " .  $obj -> JobApply . "<br>";
//     echo "working";
//   }
// }


  //CLOSE CONNECTION
  mysqli_close($conn);
?>
   
   <!-- Display a form to fill in for dtb -->
   <form name="addEmployee" method="post" action="index.php">
    <label class="fill-in">Full Name: </label>    
    <input type="text" name="FullName" value="<?php echo isset($data['FullName']) ? $data['FullName'] : ''; ?>"/>
    <?php echo isset($error['FullName']) ? $error['FullName'] : ''; ?><br>
    <label class="fill-in">Job: </label>     
    <input type="text" name="JobApply" value="<?php echo isset($data['JobApply']) ? $data['JobApply'] : ''; ?>">
    <?php echo isset($error['JobApply']) ? $error['JobApply'] : ''; ?><br>
    <label>Gender: </label>
    <label for="male"> Male</label>               <input type="radio" class="fill-in" name="Gender" value="male">
    <label for="female"> Female</label>
    <input type="radio" class="fill-in" name="Gender" value="female">
    <label for="female"> Helicopter</label>
    <input type="radio" class="fill-in" name="Gender" value="helicopter">
    <?php echo isset($error['Gender']) ? $error['Gender'] : ''; ?><br>
    <label class="fill-in">Phone: </label>
    <input type="number" name="Phone" value="<?php echo isset($data['Phone']) ? $data['Phone'] : ''; ?>">
    <?php echo isset($error['Phone']) ? $error['Phone'] : ''; ?><br>
    <label class="fill-in">Mail: </label>        <input type="Mail" name="Mail" value="<?php echo isset($data['Mail']) ? $data['Mail'] : ''; ?>">
    <?php echo isset($error['Mail']) ? $error['Mail'] : ''; ?><br>
    <label class="fill-in">Date of birth: </label><input type="date" name="DOB" value="<?php echo isset($data['DOB']) ? $data['DOB'] : ''; ?>">
    <?php echo isset($error['DOB']) ? $error['DOB'] : ''; ?><br>
    <input type="submit" name="submit_action" value="Submit"><br>
  </form>




</html>