<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<?php
echo "<form name='f' action='/PackingApp/index.php' method='post'>\n";
echo "<input name='aktion' type='hidden'>\n";
echo "<input name='id' type='hidden'>\n\n";
?>

<div class="container-lists">
  <div class="col-1">
    <?php include_once path .'/function/insert_kategorie.php'; ?>
    <?php include_once path .'/function/edit_kategorie.php'; ?>
  </div>

  <div class="col-2">
    <?php include_once path .'/function/insert_gegenstand.php';?>
    <?php include_once path .'/function/edit_gegenstand.php';  ?>
  </div>

  <div class="col-3">
    Hallo
  </div>
</div>

</body>
</html>
