<?php
echo "<form name='f' action='/PackingApp/index.php' method='post'>";
echo "<input name='aktion' type='hidden'>";
echo "<input name='id' type='hidden'>";

  require_once('sql/config.php') ;

  if (isset($_POST["aktion"]))

  {

    //  Gegenstand Einfügen  //

    if ($_POST["aktion"] == "0")

    if (isset ($_POST['insert_ka_name'][0])) {
      // code...


    {
    $query  =   "INSERT INTO gegenstand (gs_name, ka_name) VALUES (?, ?)";
    $type   =   "ss";
    $params = array($_POST['gs_name'][0], $_POST['insert_ka_name'][0]);
    insertData($query, $type, $params);
    }
  } else {
    echo "Bitte Kategorie auswählen";
  }

    // Kategorie einfügen //

    else if ($_POST["aktion"] == "1")

    {
    $query  =  'INSERT INTO kategorie
                (ka_name)
                VALUES (?)';
    $type   =   's';
    $params = array($_POST['ka_name']);
    insertData($query, $type, $params);
    }

    // Gegenstand Update //

    else if ($_POST["aktion"] == "2")

    {
    $id     =   $_POST["id"];
    $query  =  "UPDATE gegenstand SET gs_name=?, ka_name=? WHERE gs_id = $id";
    $type   =   "ss";
    $params = array($_POST["gs_name"][$id], $_POST["update_ka_name"][$id]);
    updateData($query, $type, $params);
    }

    // Kategorie Update //

    else if ($_POST["aktion"] == "3")

    {
    $id     =   $_POST["id"];
    $query  =  "UPDATE kategorie SET ka_name=? WHERE ka_id = $id";
    $type   =   "s";
    $params = array($_POST["update_ka_name"][$id]);
    updateData($query, $type, $params);
    }

    // Gegestand löschen //

    else if ($_POST["aktion"]=== "4")

    {
    $id = $_POST['id'];
    $query = "DELETE FROM gegenstand WHERE gs_id = $id";
    delete_data($query);
    }

    // Kategorie löschen //

    else if ($_POST["aktion"]=== "5")

    {
    $id = $_POST['id'];
    $query = "DELETE FROM kategorie WHERE ka_id = $id";
    delete_data($query);
    }

  }
?>
