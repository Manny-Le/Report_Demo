<html>
  <h1>ADD NEW PROJECT PAGE</h1>
  <table>
    <form 
    name="addProject" 
    method="post" 
    action="index.php?controller=projects&action=addProject">
        <tr>
          <td>
            <label class="fill-in">Person ID: </label>
          </td>
          <td>
            <input 
            type="number"
            name="ID" 
            value="<?= isset($project['ID']) ? $project['ID'] : ''; ?>"/>
          </td>
          <td>
            <?= $error['perID_err']; ?>
          </td>
        </tr> 
        <tr>
          <td>
            <label class="fill-in">Project name: </label>
          </td>
          <td>
            <input 
            type="text"
            name="proName"
            value="<?= isset($project['proName']) ? $project['proName'] : ''; ?>">
          </td>
          <td>
            <?= isset($error['proName_err']) ? $error['proName_err'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>
            <label class="fill-in">Project start: </label>
          </td>
          <td>
            <input
            type="date"
            name="proStart"
            value="<?= isset($project['proStart']) ? $project['proStart'] : ''; ?>">
          </td>
          <td>
            <?= isset($error['start_err']) ? $error['start_err'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>
            <label
            class="fill-in">Project end: </label>        
          </td>
          <td>
            <input
            type="date"
            name="proEnd"
            value="<?= isset($project['proEnd']) ? $project['proEnd'] : ''; ?>">
          </td>
          <td>
            <?= isset($error['end_err']) ? $error['end_err'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit_action" value="Submit">
          </td>
        </tr>
      </form>
  </table>
  <a href="/Report_Demo/index.php?controller=projects&action=index">INDEX PAGE</a>
 
 </html>
</html>