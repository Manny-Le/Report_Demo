<html>

  <h2>PEOPLE LISTING</h2>
  <table>
  <?php foreach ($persons as $person) { ?>
    <tr>
      <td>
        <a 
        href="index.php?controller=persons&action=showPerson&id=<?=$person->ID?>">
        <?=$person->FullName?>
        </a>
      </td>
      <td>
        <a 
        href="index.php?controller=persons&action=editPerson&id=<?=$person->ID?>"> EDIT 
        </a>
      </td>

      <td>
        <a 
        href="index.php?controller=persons&action=confirmDelete&id=<?=$person->ID?>"> DELETE
        </a>
      </td>
  </tr>
 <?php } ?>

  </table>
<a href="index.php?controller=persons&action=addPerson">ADD NEW</a>
<a href="index.php?controller=pages&action=home">HOME</a>
 
  </html>