<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Meine Packliste</title>
    <script type="text/javascript">
    function send(aktion,id)
    {
    document.f.aktion.value = aktion;
    document.f.id.value = id;
    document.f.submit();
    }
    </script>
    <?php
    include 'sql/sql.php';
    include '02_Urlaubsplanung_safe/functions.php'
    ?>
    </head>
  <body>
<div class="row">
  <div class="col-1">
    <?php
    $dir    = dirname(__dir__) . '/00_packing-organizer/02_Urlaubsplanung_safe' ;
    $files  = scandir($dir);


    $anz    = count($files);
    for ($i=2; $i < $anz; $i++) {
        echo "<a href='../00_packing-organizer/02_Urlaubsplanung_safe/$files[$i]'>$files[$i]</a><br>";
    }
    ?>
  </div>
<div class='col-main'>
  <?php
    echo "<table>\n";
    echo "<tr>\n";
    echo "<th>Gegenstand</th>";
    echo "<th>Kategorie</th>";
    echo "</tr>\n\n";


    // Insert new Gegenstand
    echo "<tr>";
    echo "<td><input type='text' size='25' name='gs_name[0]'></td>\n";
    echo "<td><select type='text' name='insert_ka_name[0]'>\n";

    // get all categories ans choose
    $conn = new mysqli("$servername", "$username", "$password", "$database");
    $res = $conn->query("SELECT * FROM kategorie ORDER BY ka_id");

    while ($dsatz = $res->fetch_assoc())
      {
      $ka_id = $dsatz["ka_id"];
      $ka_name = $dsatz["ka_name"];
      echo "<option name='$ka_name' value='$ka_name'>$ka_name</option>\n";
      }
  echo "</select></td>\n";

    // Safe new Gegenstand
    echo "<td><button type='button'><a href='javascript:send(0,0);'>Speichern</a></button></td></tr>\n\n";
    echo "</table>";
   ?>
</div>
<div class="col-3">
</div>
</div>
<form name="f" action="index.php" method="post">
<input name="aktion" type="hidden">
<input name="id" type="hidden">
</body>
</html>
