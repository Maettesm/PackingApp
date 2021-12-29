<?php
echo "<table>\n";
echo "<tr>";
echo "<th>Gegenstand</th>";
echo "<th>Kategorie</th>";
echo "</tr>\n";

// List all Gegenstand and Kategorien ÄNDERN und LÖSCHEN
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
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
    echo "</select></td>\n";
    echo "<td><button type='button'><a href='javascript:send(2,$gs_id);'>Ändern</a></button></td>\n";
    echo "<td><button type='button' class='btn_del'><a href='javascript:send(4,$gs_id);'>";
    echo "<i class='fa fa-trash'></i></a></button></td>\n</tr>\n\n";
  }
    echo "</table>\n";
