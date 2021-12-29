<?php
require_once('sql/config.php') ;

    echo "<table>\n";
            echo "<tr>\n";
            echo "<th>Kategorie hinzufügen</th>\n";
            echo "</tr>\n";
            echo "<tr>\n";
            echo "<td><input name='ka_name' size='25'></td>";
            echo "<td><button style='button'><a href='javascript:send(1,0);'>Speichern</a></button></td>\n";
            echo "</tr>\n";

    $res = $conn->query("SELECT * FROM kategorie ORDER BY ka_id ASC");

        while ($dsatz = $res->fetch_assoc())
        {
            $ka_id= $dsatz['ka_id'];
            $kat = $dsatz["ka_name"];
            echo "<tr>\n";
            echo "<td>";
            echo "<input size='25' name='update_ka_name[$ka_id]' value='$kat'>";
            echo "</td>\n";
            echo "<td>";
            echo "<button style='button'><a href='javascript:send(3,$ka_id);'>Ändern</a></button>\n";
            echo "</td>\n";
            echo "<td>";
            echo "<button style='button' class='btn_del'><a href='javascript:send(5,$ka_id);'><i class='fa fa-trash'></i></a></button>\n";
            echo "</td></tr>\n";
        }
echo "</table>";
?>
