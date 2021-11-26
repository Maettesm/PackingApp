<table>
    <tr>
        <th>Kategorie hinzufügen</th>
    </tr>
    <tr>
        <td><input name='new_kat'><a href='javascript:send(1,0);'> Speichern</a></input></td>
    </tr>

        <?php
        $conn = new mysqli("$servername", "$username", "$password", "$database");
        $res = $conn->query("SELECT ka_name FROM kategorie");

        while ($dsatz = $res->fetch_assoc()) {
            $kat = $dsatz["ka_name"];
            echo "<tr><td>$kat<br></td></tr>";
        }
        ?>
</table>
