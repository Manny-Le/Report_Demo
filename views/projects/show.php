<html>
  <h2>DETAIL INFO OF <?=$project->proName?></h2>

<?php foreach ($project as $key=>$value) { ?>
  <p><?=$key?>: <?=$value?><br>
  
<?php }?>

<a href="index.php?controller=projects&action=index"> INDEX PAGE </a>
</hmtl>