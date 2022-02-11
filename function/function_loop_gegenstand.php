<?php
function gs_loop($ps_id, $ka_name)

{
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  $query= "SELECT DISTINCT gegenstand.gs_name, packliste.qty FROM packliste
          INNER JOIN gegenstand ON gegenstand.gs_id = packliste.gs_id
          INNER JOIN kategorie ON kategorie.ka_name = gegenstand.ka_name
          WHERE packliste.ps_id = '$ps_id' AND kategorie.ka_name = '$ka_name'
          ORDER BY kategorie.ka_id ";
  $stmt = $conn->query($query) or die(mysqli_error($conn));

  while ($dsatz = $stmt->fetch_assoc())
  {
    $gs_name = $dsatz['gs_name'];
    $qty     = $dsatz['qty'];
    echo "<tr><td>$gs_name</td><td>$qty</td></tr>";
  }
}
?>
