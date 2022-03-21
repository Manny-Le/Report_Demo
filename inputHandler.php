<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    require ('./validate.php');


    function singleQuoteString ($string) {
      return "'".$string."'";
      }
//Create escape mySql identifier for array
function escapeIdentifierArray($conn,$array) {
  $returnArray = [];
    foreach ($array as $keys => $values) {
    if (dateValidate($values)){
      $values = date ('Y-m-d');
    }
    $keys = mysqli_real_escape_string($conn,$keys);
    $values = mysqli_real_escape_string($conn,$values);
    $returnArray[$keys] = $values;
  }

  return $returnArray;
  }

function queryInsert($conn, $array, $table){
  $escapeArray = escapeIdentifierArray($conn,$array);
  $column = implode(",",array_keys($escapeArray));
  foreach ($escapeArray as $key => $value){
    $escapeArray[$key]= singleQuoteString($value);
  }
  $row = implode(",", array_values($escapeArray));
  $query = "INSERT INTO $table ($column) VALUES ($row)";

  return $query;
}

// query retrieve data and print from dtb
  function retrieveTable ($table, $obj){
  $obj = new \emp;
  $querySelect = "SELECT * FROM $table";
  $result = $conn->query($querySelect);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["ID"] . "<br>". "Name: " . $row["FullName"]. "<br>" . "JobApply: " . $row["JobApplyApply"]. "<br>". "Phone No: "  . $row["Phone"]. "<br>". "Mail: "  . $row["Mail"]. "<br>". "Date of Birth: "  . $row["DOB"]. "<br>";
  }
  }
}
// function prepared_insert($conn, $table, $data) {
//   $keys = array_keys($data);
//   $keys = array_map('escape_mysql_identifier', $keys);
//   $fields = implode(",", $keys);
//   $table = escape_mysql_identifier($table);
//   $placeholders = str_repeat('?,', count($keys) - 1) . '?';
//   $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
//   prepared_query($conn, $sql, array_values($data));
// }

// function handleInsert ($table,$array,$conn) {

//   $stmt = $conn->prepare("INSERT INTO $table (FullName, JobApply, Gender,Phone, Mail,DOB) VALUES (?,?,?,?,?,?)");
//   $array['DOB'] = date ('Y-m-d');
//   $stmt->bind_param("ssssss", $array['fullName'],array['job'], $array['gender'], $arrat['email'],$array['email'],$data['DOB']);
//   $stmt->execute();
// }

  ?>
</body>
</html>