<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<!-- Person hinzufügen -->

<?php
  echo "<table>\n";
  echo "<tr><th>Vorname</th><th>Nachname</th><th></th></tr>\n";
  echo "<tr>";
  echo "<td><input type='text' name='ps_vorname' style='width:130px'></td>";
  echo "<td><input name='ps_nachname' style='width:130px'></td>";
  echo "<td><button type='button' class='btn_save'><a href='javascript:send(9,0);'>";
  echo "<i class='fa fa-plus'></i></a></button></td>\n";
  echo "</tr>\n";
  echo "</table>";
 ?>
