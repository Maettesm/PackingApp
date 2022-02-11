<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<!-- Urlaub hinzufügen -->

<?php
  echo "<table>\n";
  echo "<tr><th>Urlaub</th><th></th></tr>\n";
  echo "<tr>";
  echo "<td><input type='text' name='ul_name' style='width:150px'></td>";
  echo "<td><button type='button' class='btn_save'><a href='javascript:send(10,0);'>";
  echo "<i class='fa fa-plus'></i></a></button></td>\n";
  echo "</tr>\n";
  echo "</table>";
 ?>
