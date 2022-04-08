<html>
  <h2>DETAIL INFO OF <?=$persons['FullName']?></h2>

<?php foreach ($persons as $key=>$value) { ?>
  <p><?=$key?>: <?=$value?><br>


<?php }?>

<a href="index.php?controller=pages&action=home&id=<?=$persons['ID']?>">SET CV</a>
<a href="index.php?controller=projects&action=addProject&id=<?=$persons['ID']?>">ADD PROJECT</a>
<a href="index.php?controller=persons&action=index">PERSON INDEX</a>
<p> this is a test for gitignore file</p>
</hmtl>