<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>

<!-- Auswahl Urlaub -->

<?php
echo "Wähle deine Urlaubsliste</br>\n";

echo "<form name='f' action='/PackingApp/packing_list.php' method='post'>\n";
echo "<input name='aktion' type='hidden'>\n";
echo "<input name='id' type='hidden'>\n\n";

echo "<select name='ul_name'>\n";
echo "<option value='' disabled selected hidden>bitte den Urlaub wählen</option>\n";
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$query= "SELECT * FROM urlaub ORDER BY ul_id";
$stmt = $conn->query($query) or die(mysqli_error());

while ($dsatz = $stmt->fetch_assoc())
{
  $ul_id    = $dsatz['ul_id'];
  $ul_name  = $dsatz['ul_name'];
  echo "<option name ='$ul_id'>$ul_name</option>\n";
}
echo "</select>\n";
echo "<td><button type='button' class='btn_upd'><a href='javascript:send(11,0);'>";
echo "<i class='fa fa-arrow-right'></i></a></button></td><br>\n";
?>
