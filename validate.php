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

//check for mail format abc@abc.abc
function mailValidate($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}


//check if input is date: yyyy-mm-dd
function dateValidate($date, $format = 'Y-m-d'){
  $dt = DateTime::createFromFormat($format, $date);
  return $dt && $dt->format($format) === $date;
}



?>
</body>
</html>