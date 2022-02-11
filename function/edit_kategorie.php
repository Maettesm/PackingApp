<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<!-- Kategorie beareiten -->

<?php
echo "<table>\n";
echo "<tr>\n";
echo "<th>Kategorien bearbeiten</th>\n";
echo "</tr>\n";
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$res = $conn->query("SELECT * FROM kategorie ORDER BY ka_id ASC");
  while ($dsatz = $res->fetch_assoc())
  {
    $ka_id= $dsatz['ka_id'];
    $kat = $dsatz["ka_name"];
    echo "<tr>\n";
    echo "<td>";
    echo "<input size='25' name='ka_name[$ka_id]' value='$kat'>";
    echo "</td>\n";
    echo "<td><button type='button' class='btn_upd'><a href='javascript:send(3,$ka_id);'>";
    echo "<i class='fa fa-arrow-right'></i></a></button>";
    echo "</td>\n";
    echo "<td>";
    echo "<button type='button' class='btn_del'><a href='javascript:send(5,$ka_id);'><i class='fa fa-trash'></i></a></button>\n";
    echo "</td></tr>\n";
  }
echo "</table>\n";
echo "<br>";
?>
