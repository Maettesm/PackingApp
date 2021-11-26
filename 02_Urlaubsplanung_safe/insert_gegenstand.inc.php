<?php
include '../sql/sql.php';
?>
<table>
    <tr>
        <th>Gegenstand</th>
        <th>Kategorie</th>
    </tr>
    <tr>
        <td><input type="text" size="25" name="gs_name[0]"></td>
        <td><?php
        echo "<select name='ka_id'>\n";
        $conn = new mysqli("$servername", "$username", "$password", "$database");
        $res = $conn->query("SELECT * FROM kategorie");
        while ($dsatz = $res->fetch_assoc())
        {
            $ka_id = $dsatz["ka_id"];
            $ka_name = $dsatz["ka_name"];
            echo "<option name='$ka_id' value='$ka_id'>$ka_name</option>\n";
        }
        echo "</select>\</td>";
        ?>

        <td><a href='javascript:send(0,0);'>Speichern</a></td></tr>
        <?php

        $conn = new mysqli("$servername", "$username", "$password", "$database");
        $query= 'SELECT gegenstand.gs_name, kategorie.ka_name, kategorie.ka_id
                    FROM gegenstand
                    INNER JOIN kategorie ON gegenstand.ka_id = kategorie.ka_id
                    ORDER BY kategorie.ka_id';

        $gegenstaende = $conn->query($query) or die(mysqli_error());
        while ($dsatz = $gegenstaende->fetch_assoc())
        {
            if (false===$dsatz)
            {
                die('fetch_assoc failed:' .htmlspecialchars($gegenstaende->error));
            }
            $gegenstand = $dsatz['gs_name'];
            $kategorie = $dsatz['ka_name'];
            $ka_id     = $dsatz['ka_id'];

                        echo "<tr>\n <td>$gegenstand</td>\n <td><select name='ka_upd'>\n";
                                $conn = new mysqli("$servername", "$username", "$password", "$database");
                                $res = $conn->query("SELECT * FROM kategorie");
                                while ($dsatz = $res->fetch_assoc())
                                {
                                    $ka_id2 = $dsatz["ka_id"];
                                    $ka_name2 = $dsatz["ka_name"];
                                    $selected = $ka_name2==$kategorie;
                                    echo "<option name='$ka_id2' value='$ka_id2'>$ka_name2</option>\n";
                                }
                                    echo "<option name='$ka_id2' value='$ka_id' selected ='selected'>$kategorie</option>\n";
                                    echo "</select>\n </td>\n </tr>\n";
        }
    ?>
</table>
<table>

</table>
