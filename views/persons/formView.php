<html>
  <table>
    <form 
    name="addEmployee" 
    method="post" 
    action="index.php?controller=persons&action=formView">
        <tr>
          <td>
            <label class="fill-in">Full Name: </label>
          </td>
          <td>
            <input 
            type="text" 
            name="FullName" 
            value="<?= isset($data['FullName']) ? $data['FullName'] : ''; ?>"/>
          </td>
          <td>
            <?= $data['name_err']; ?>
          </td>
        </tr> 
        <tr>
          <td>
            <label class="fill-in">Job: </label>
          </td>
          <td>
            <input 
            type="text"
            name="JobApply"
            value="<?= isset($data['JobApply']) ? $data['JobApply'] : ''; ?>">
          </td>
          <td>
            <?= isset($data['job_err']) ? $data['job_err'] : ''; ?>
          </td>
        </tr>        
        <tr>
          <td>
            <label class="fill-in">Phone: </label>
          </td>
          <td>
            <input
            type="number"
            name="Phone"
            value="<?= isset($data['Phone']) ? $data['Phone'] : ''; ?>">
          </td>
          <td>
            <?= isset($data['phone_err']) ? $data['phone_err'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>
            <label
            class="fill-in">Mail: </label>        
          </td>
          <td>
            <input
            type="Mail"
            name="Mail"
            value="<?= isset($data['Mail']) ? $data['Mail'] : ''; ?>">
          </td>
          <td>
            <?= isset($data['mail_err']) ? $data['mail_err'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>
            <label class="fill-in">Date of birth: </label>
          </td>
          <td>
            <input
            type="date"
            name="DOB"
            value="<?= isset($data['DOB']) ? $data['DOB'] : ''; ?>">
          </td>
          <td>
            <?= isset($data['DOB_err']) ? $data['DOB_err'] : ''; ?>
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
                  <?= (isset($_POST['Gender'])&&($_POST['Gender']=="male")) ? 'checked' : ""?>>
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
                  <?= (isset($_POST['Gender'])&&($_POST['Gender']=="female")) ? 'checked' : ""?>>
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
                  <?= (isset($_POST['Gender'])&&($_POST['Gender']=="helicopter")) ? 'checked' : ""?>>
                </td>
              </tr>
            </table>
          </td>
          <td>
            <?= isset($data['gender_err']) ? $data['gender_err'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit_action" value="Submit">
</td>
        </tr>
      </form>
  </table>

</html>