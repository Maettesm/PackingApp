<table>
    <tr>
        <th>Kategorie hinzufügen</th>
    </tr>
    <tr>
        <td><input name='ka_name' size='25'><a href='javascript:send(1,0);'> Speichern</a></input></td>
    </tr>

        <?php
        $conn = new mysqli("$servername", "$username", "$password", "$database");
        $res = $conn->query("SELECT * FROM kategorie");

        while ($dsatz = $res->fetch_assoc()) {
            $ka_id= $dsatz['ka_id'];
            $kat = $dsatz["ka_name"];
            echo "<tr><td><input size='25' name='update_ka_name' value='$kat'></td>";
            echo "<td><a href='javascript:send(3,$ka_id);'> Speichern</a></td></tr>";
        }
        ?>
</table>
