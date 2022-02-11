<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
include_once path . '/function/function_loop_gegenstand.php';
?>

<?php
function ka_loop($ps_id)

{
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  $query= "SELECT DISTINCT gegenstand.ka_name FROM gegenstand
          INNER JOIN packliste ON packliste.gs_id = gegenstand.gs_id
          INNER JOIN kategorie ON kategorie.ka_name = gegenstand.ka_name
          WHERE packliste.ps_id = '$ps_id'
          ORDER BY kategorie.ka_id ";
  $stmt = $conn->query($query) or die(mysqli_error($conn));

  while ($dsatz = $stmt->fetch_assoc())
  {
    $ka_name = $dsatz['ka_name'];
    echo "<tr><th>$ka_name</th></tr>";
    gs_loop($ps_id, $ka_name);
  }
}
?>
