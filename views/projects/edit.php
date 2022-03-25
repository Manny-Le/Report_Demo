<html>
  <h2>EDIT</h2>
  <table>
    <form 
    name="editEmployee" 
    method="post" 
    action="index.php?controller=projects&action=editProject&id=<?=$data['proID']?>">
        <tr>
          <td>
            <label class="fill-in">Project Name: </label>
          </td>
          <td>
            <?= $data['proName'];?>
          </td>
          <td>
            <input 
            type="text" 
            name="proName">
          </td>
          <td>
          </td>
        </tr> 
        <tr>
          <td>
            <label class="fill-in">Start time: </label>
          </td>
          <td>
            <?= $data['proStart']?>
          </td>
          <td>
            <input 
            type="date"
            name="proStart">
          </td>
          <td>
          </td>
        </tr>
        <tr>
          <td>
            <label class="fill-in">Phone: </label>
          </td>
          <td>
            <?= $data['Phone']?>
          </td>
          <td>
            <input
            type="number"
            name="Phone">
          </td>
          <td>
          </td>
        </tr>
        <tr>
          <td>
            <label class="fill-in">End time: </label>
          </td>
          <td>
            <?= $data['proEnd']?>
          </td>
          <td>
            <input
            type="date"
            name="proEnd"">
          </td>
          <td>
          </td>
        </tr>
            </table>
          </td>
          <td>
            <input type="submit" name="submit_action" value="EDIT">
          </td>
        </tr>
      </form>   
  </table>
  <p><?= $error['empty_err']; ?></p>
  <a href="index.php?controller=projects&action=index">INDEX</a>
</html>