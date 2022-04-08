<DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Demo PHP MVC</title>
  </head>
  <body>
  <div class="nav-box">

<h3>PERSONAL PROJECT</h3>

  <ul class="nav-list">
  <li><a 
  class="nav-link"
  href="index.php?controller=pages&action=home&id=1">HOME</a></li>

  <li><a
  class="nav-link"
  href="index.php?controller=persons&action=index">PERSONEL</a></li>

  <li><a
  class="nav-link"
  href="index.php?controller=projects&action=index">PROJECT</a></li>

  <li><a
  class="nav-link"
  href="index.php?controller=authentication&action=logout">LOG OUT</a></li>
</ul>
</div>
    <?= @$content ?>
  </body>
</html>
