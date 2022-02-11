<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<!-- Kategorie hinzufügen -->

<?php
echo "<table>\n";
echo "<tr>\n";
echo "<th>Kategorie hinzufügen</th>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td><input size='25' type='text' name='ka_name[0]'></td>";
echo "<td><button type='button' class='btn_save'><a href='javascript:send(1,0);'>\n";
echo "<i class='fa fa-plus'></i></a></button></td>\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "<br>";
?>
