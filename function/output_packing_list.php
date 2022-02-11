<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
include_once path . '/function/function_loop_kategorie.php';

?>

<?php
// function gs_qty($ps_id, $kategorie, $urlaub, $gs_id, $qty, $gs_name)
// {
//   $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
//   $query= "SELECT gegenstand.gs_name, packliste.qty, gegenstand.gs_id FROM packliste
//           INNER JOIN gegenstand ON gegenstand.gs_id = packliste.gs_id
//           INNER JOIN kategorie  ON gegenstand.ka_name = kategorie.ka_name
//           WHERE packliste.ps_id = '$ps_id' AND kategorie.ka_name= '$kategorie' AND packliste.ul_name = '$urlaub'
//           ORDER BY kategorie.ka_id, gegenstand.gs_id";
//   $stmt = $conn->query($query) or die(mysqli_error($conn));
//
//   while ($dsatz = $stmt->fetch_assoc())
//   {
//
//     echo "<tr><td>$gs_id $gs_name</td><td> $qty </td><td> $ps_id </td><td> $urlaub </td></tr>\n";
//   }
 // }


?>

<?php
if (isset($_POST['ul_name']))

{
  $urlaub = $_POST['ul_name'];
  echo "<h3>$urlaub</h3><br>\n";

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  $query= "SELECT DISTINCT packliste.ps_id, personen.ps_nachname, personen.ps_vorname FROM packliste
          INNER JOIN personen   ON personen.ps_id = packliste.ps_id
          WHERE packliste.ul_name = '$urlaub'
          ORDER BY personen.ps_id";

  $stmt = $conn->query($query) or die(mysqli_error($conn));

  while ($dsatz = $stmt->fetch_assoc())

  {
    $nachname   = $dsatz['ps_nachname'];
    $vorname    = $dsatz['ps_vorname'];
    $ps_id      = $dsatz['ps_id'];

    echo "<h3>$vorname $nachname</h3><br>\n";
    echo "<table>\n";
    ka_loop($ps_id);
    echo "</table>";
    echo "<br>";
  }
}

 ?>
