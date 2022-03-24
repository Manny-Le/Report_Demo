<html>
  <table>
  <?php foreach ($projects as $project) {?>
    <tr>
      <td>
        <?=$project->proID?>
      </td>
      <td>
        <a 
        href="index.php?controller=projects&action=showProject&id=<?=$project->proID?>">
        <?=$project->proName?>
        </a>
      </td>
      <td>
        <a 
        href="index.php?controller=persons&action=editPerson&id=<?=$project->ID?>"> EDIT 
        </a>
      </td>

      <td>
        <a
        href="index.php?controller=projects&action=confirmDelete&id=<?=$project->proID?>"> DELETE
        </a>
      </td>
  </tr>
 <?php } ?>
  </table>
  <a href="index.php?controller=projects&action=addProject">ADD NEW</a>
  <a href="index.php?controller=pages&action=home">HOME</a>
</html>