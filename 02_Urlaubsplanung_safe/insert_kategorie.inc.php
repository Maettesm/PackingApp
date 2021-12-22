<?php
    echo "<table>\n";
            echo "<tr>\n";
            echo "<th>Kategorie hinzufügen</th>\n";
            echo "</tr>\n";
            echo "<tr>\n";
            echo "<td><input name='ka_name' size='25'></td><td><a href='javascript:send(1,0);'>Speichern</a></td>\n";
            echo "</tr>\n";

    $conn = new mysqli("$servername", "$username", "$password", "$database");
    $res = $conn->query("SELECT * FROM kategorie");

        while ($dsatz = $res->fetch_assoc()) {
            $ka_id= $dsatz['ka_id'];
            $kat = $dsatz["ka_name"];
            echo "<tr>\n";
            echo "<td>";
            echo "<input size='25' name='update_ka_name[$ka_id]' value='$kat'>";
            echo "</td>\n";
            echo "<td>";
            echo " <a href='javascript:send(3,$ka_id);'>Ändern</a>\n";
            echo "</td>\n";
            echo "<td>";
            echo " <a href='javascript:send(5,$ka_id);'>Löschen</a>\n";
            echo "</tr>\n";
        }

echo "</table>";
?>
