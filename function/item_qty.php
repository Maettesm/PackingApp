<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<?php
if (isset($_POST['ul_id'])){
echo "<h3>Wer packt Was für den " . $_POST['ul_id'] . "</h3><br>"; }
?>

<!-- Zuordnung Menge Person Gegenstand -->

<?php
include_once path .'/function/insert_gegenstand.php';
if (isset($_POST['ul_name']))
{

  $ul_id = $_POST['ul_name'];
  echo "<input name='ul_name' value='$ul_id' type='hidden'>";
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  $query = "SELECT DISTINCT gegenstand.ka_name, kategorie.ka_name, kategorie.ka_id
            FROM gegenstand, kategorie
            WHERE gegenstand.ka_name = kategorie.ka_name
            ORDER BY ka_id";
  $stmt = $conn->query($query) or die(mysqli_error());
  $i = 2;
  while ($dsatz = $stmt->fetch_assoc())
  {
  $ka_name = $dsatz['ka_name'];
  echo "<div class='col-$i'>\n";
  echo "<table>\n";
  lists($ka_name, $ul_id);
  echo "</table>\n";
  echo "</div>\n";
  $i++;
  if ($i == 3)
    {
      $i = 1;
    }
  }
}
?>
