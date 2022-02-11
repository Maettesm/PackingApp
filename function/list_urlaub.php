<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<?php
  echo "<table>";
  echo "<br>";
  echo "<tr><th>Urlaub</th></tr>";
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  $query= 'SELECT * FROM urlaub';
  $stmt = $conn->query($query) or die(mysqli_error());
  while ($dsatz = $stmt->fetch_assoc())
  {
    $ul_name = $dsatz['ul_name'];

    echo "<tr><td>$ul_name</td></tr>";
  }
  echo "</table>";
 ?>
