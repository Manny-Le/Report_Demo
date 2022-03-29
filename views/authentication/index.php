<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="assets/style.css" rel="stylesheet"/>
  <link href="assets/queries.css" rel="stylesheet"/>
  <title>Administration</title>
</head>
  <body class="login-page">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">PERSONAL PROJECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="login-h1-centering">
      <p class="h1 display-4">WELCOME TO ADMINISTRATOR PAGE</p>
    </div>
    <form 
    class="login-form form-control-lg needs-validation"
    action="index.php?controller=authentication&action=login"
    method="post">
      <div class="row mb-3">
        <label
          for="inputEmail3 validationCustom01" 
          class="col-sm-2 col-form-label">
          USER NAME
      </label>
        <div class="col-sm-10">
          <input
          type="text" 
          class="form-control" 
          id="validationCustomUsername"
          name="user_name"
          required>
          <?php if (isset($error['u_error'])) { ?>            
          <div class="invalid-feedback">
            <?=$error['u_error']; } else { ?>
          <div class="valid-feedback"></div>
          <?php }?>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">
          PASSWORD</label>
        <div class="col-sm-10">
          <input 
          type="password" 
          class="form-control" 
          id="inputPassword3"
          name="password"
          required>
        </div>
      </div>
      <button 
        type="submit" 
        class="btn btn-primary">
        Sign in
      </button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>