<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<?php
echo "<form name='f' action='/PackingApp/site-main.php' method='post'>";
echo "<input name='aktion' type='hidden'>";
echo "<input name='id' type='hidden'>";
?>

<div class="container-lists">
  <div class="col-1">
    <?php include_once path . '/function/insert_person.php';?>
    <?php include_once path . '/function/list_person.php';?>
  </div>
  <div class="col-2">
    <?php include_once path . '/function/insert_urlaub.php';?>
    <?php include_once path . '/function/list_urlaub.php';?>
  </div>
  <div class="col-3">
    Hallo
  </div>
</div>
