<?php
include 'sql/sql.php';

echo "<table>\n";
echo "<tr>\n";
echo "<th>Gegenstand</th>";
echo "<th>Kategorie</th>";
echo "</tr>\n\n";


// Insert new Gegenstand
echo "<tr>";
echo "<td><input type='text' size='25' name='gs_name[0]'></td>\n";
echo "<td><select type='text' name='insert_ka_name[0]'>\n";

// get all categories ans choose
$conn = new mysqli("$servername", "$username", "$password", "$database");
$res = $conn->query("SELECT * FROM kategorie ORDER BY ka_id");

while ($dsatz = $res->fetch_assoc())
    {
        $ka_id = $dsatz["ka_id"];
        $ka_name = $dsatz["ka_name"];
        echo "<option name='$ka_name' value='$ka_name'>$ka_name</option>\n";
    }
echo "</select></td>\n";

// Safe new Gegenstand
echo "<td><button type='button'><a href='javascript:send(0,0);'>Speichern</a></button></td></tr>\n\n";





// List all Gegenstand and Kategorien
$conn = new mysqli("$servername", "$username", "$password", "$database");
$query= 'SELECT gegenstand.ka_name, gegenstand.gs_name, gegenstand.gs_id, kategorie.ka_id FROM gegenstand, kategorie
        WHERE gegenstand.ka_name = kategorie.ka_name
        ORDER BY ka_id, ka_name, gs_name';

$gegenstaende = $conn->query($query) or die(mysqli_error());
while ($dsatz = $gegenstaende->fetch_assoc())
  {
    if (false===$dsatz)
    {
        die('fetch_assoc failed:' .htmlspecialchars($gegenstaende->error));
    }
      $gs_id   = $dsatz['gs_id'];
      $gs_name = $dsatz['gs_name'];
      $ka_name = $dsatz['ka_name'];

    echo "<tr>\n";
    echo "<td><input type='text' value='$gs_name' size='25' name='gs_name[$gs_id]'></td>\n";
    echo "<td><select name='update_ka_name[$gs_id]'>\n";
    list_data();
    echo "</select>\n";
    //echo "<td><input type='text' value='$ka_name' name='update_ka_name[$gs_id]'></td>\n";
    echo "<td><button type='button'><a href='javascript:send(2,$gs_id);'>Ändern</a></button></td>\n\n";
    echo "<td><button type='button' class='btn_del'><a href='javascript:send(4,$gs_id);'><i class='fa fa-trash'></i></a></td></button>\n</tr>\n\n";
  }
  echo "</table>";
?>
