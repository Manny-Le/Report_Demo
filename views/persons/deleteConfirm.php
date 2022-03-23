<html>
  <h1>ARE YOU SURE TO DELETE USER?</H1>
  <ul>
    <li>Full name: <?=$persons['FullName'];?></li>
    <li>Job: <?=$persons['JobApply']?></li>
    <li>Gender: <?=$persons['Gender'];?>  </li>
    <li>Phone number: <?=$persons['Phone'];?></li>
    <li>Mail: <?=$persons['Mail'];?></li>
    <li>Date of birth: <?=$persons['DOB'];?></li>
  </ul>
  
  <a href="index.php?controller=persons&action=deletePerson&id=<?=$persons['ID']?>">DELETE</a>

</html>