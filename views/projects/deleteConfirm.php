<html>
  <h1>ARE YOU SURE TO DELETE Project?</H1>
  <ul>
    <?php foreach ($project as $key=>$value) { ?>
      <li><?=$key?>: <?=$value?></li>
    <?php } ?>

  </ul>
  
  <a href="index.php?controller=projects&action=deleteProject&id=<?=$project['proID']?>">DELETE</a>

</html>