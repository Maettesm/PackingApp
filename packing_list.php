<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<div class="container-lists">
  <div class="col-1">
    <?php include_once path .'/function/choose_urlaub.php';?>
  </div>
  <div class="col-2">
    <?php include_once path .'/function/item_qty.php';?>
  </div>
  <div class="col-3">
    <?php include_once path .'/function/output_packing_list.php';?>
  </div>

</div>
