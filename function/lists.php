<?php
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
  echo "<div class='col-$i'>";
  echo "<table>\n";
  lists($ka_name);
  echo "</table>\n";
  echo "</div>\n";
  $i++;
  if ($i == 5) {
    $i = 2;
  }
}
echo "<td><button type='button' class='btn_save'><a href='javascript:send(5,0);'>";
echo "<i class='fa fa-plus'></i></a></button></td>\n";
 ?>
