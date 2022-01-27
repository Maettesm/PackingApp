<?php include_once 'includes/header.php'; ?>
<?php
echo "Wähle deine Urlaubsliste</br>";
echo "<form action='lists.php'>";
echo "<select name='ul_id' id='ul' class='urlaub'>";

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$query= "SELECT * FROM urlaub ORDER BY ul_id";
$stmt = $conn->query($query) or die(mysqli_error());

while ($dsatz = $stmt->fetch_assoc())
{
  $ul_id    = $dsatz['ul_id'];
  $ul_name  = $dsatz['ul_name'];
  echo "<option value='$ul_id'>$ul_name</option>";
}
echo "</select>";
echo "<input type='submit' name='urlaub'></button>";
echo "</form>";

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
  lists($ka_name);
  echo "</table>\n";
  echo "</div>\n";
  $i++;
  if ($i == 5) {
    $i = 2;
  }
}
?>
