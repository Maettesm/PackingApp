<!-- Insert new Gegenstand -->

<?php
echo "<table>\n";
echo "<tr>";
echo "<td><input placeholder='Gegenstand' type='text' size='25' name='gs_name[0]'></td>\n";
echo "<td><select id='gs' required name='insert_ka_name[0]'>\n";
echo "<option value='' disabled selected hidden>Kategorie</option>\n";

// get all categories ans choose
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$res = $conn->query("SELECT * FROM kategorie ORDER BY ka_id");

while ($dsatz = $res->fetch_assoc())
    {
        $ka_id = $dsatz["ka_id"];
        $ka_name = $dsatz["ka_name"];
        echo "<option name='$ka_name' value='$ka_name'>$ka_name</option>\n";
    }
echo "</select></td>\n";

// Safe new Gegenstand
echo "<td><button type='button' id='gs' class='btn_save'><a href='javascript:send(0,0);'>";
echo "<i class='fa fa-plus'></i></a></button></td>\n";
echo "</table>\n";
?>
