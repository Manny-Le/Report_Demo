<html>
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
  </tr>
 <?php } ?>

  </table>

  <?= '</table> <hr /> <input type="submit" name="submit_action" value="Add new">'; ?>