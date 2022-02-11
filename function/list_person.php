<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<!-- Auflistung Personen -->

<?php
  echo "<br>";
  echo "<table>";
  echo "<tr><th>Vorname</th><th>Nachname</th></tr>";
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  $query= 'SELECT * FROM personen';
  $stmt = $conn->query($query) or die(mysqli_error());
  while ($dsatz = $stmt->fetch_assoc())
  {
    $vorname = $dsatz['ps_vorname'];
    $nachname= $dsatz['ps_nachname'];
    echo "<tr size='25'><td style='width:130px;'>$vorname</td><td>$nachname</td></tr>";
  }
  echo "</table>";
 ?>
