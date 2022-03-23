<html>
  <h2>EDIT</h2>
  <table>
    <form 
    name="editEmployee" 
    method="post" 
    action="index.php?controller=persons&action=editPerson&id=<?=$data['ID']?>">
        <tr>
          <td>
            <label class="fill-in">Full Name: </label>
          </td>
          <td>
            <?= $data['FullName'];?>
          </td>
          <td>
            <input 
            type="text" 
            name="FullName">
          </td>
          <td>
          </td>
        </tr> 
        <tr>
          <td>
            <label class="fill-in">Job: </label>
          </td>
          <td>
            <?= $data['JobApply']?>
          </td>
          <td>
            <input 
            type="text"
            name="JobApply">
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
            <label
            class="fill-in">Mail: </label>        
          </td>
          <td>
            <?= $data['Mail']?>
          </td>
          <td>
            <input
            type="Mail"
            name="Mail">
          </td>
        </tr>
        <tr>
          <td>
            <label class="fill-in">Date of birth: </label>
          </td>
          <td>
            <?= $data['DOB']?>
          </td>
          <td>
            <input
            type="date"
            name="DOB"">
          </td>
          <td>
          </td>
        </tr>
        <tr>
          <td>
            <label>Gender: </label>
          </td>
          <td>
            <table>
              <tr>
                <td>
                  <label for="male"> Male</label>
                </td>
                <td>
                  <input
                  type="radio" 
                  class="fill-in"
                  name="Gender" value="male"
                  <?= (isset($data['Gender'])&&($data['Gender']=="male")) ? 'checked' : ""?>>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="female"> Female</label>
                </td>
                <td>
                  <input 
                  type="radio"
                  class="fill-in"
                  name="Gender"
                  value="female"
                  <?= (isset($data['Gender'])&&($data['Gender']=="female")) ? 'checked' : ""?>>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="female"> Helicopter</label>
                </td>
                <td>
                  <input
                  type="radio"
                  class="fill-in"
                  name="Gender"
                  value="helicopter"
                  <?= (isset($data['Gender'])&&($data['Gender']=="helicopter")) ? 'checked' : ""?>>
                </td>
              </tr>
            </table>
          </td>
          <td>
            <input type="submit" name="submit_action" value="EDIT">
          </td>
        </tr>
      </form>   
      <tr>
          
        </tr>
  </table>
  <p><?= $error['empty_err']; ?></p>

  <a href="index.php?controller=persons&action=index">INDEX</a>
</html>