<?php
  include 'sql/sql.php';
  $conn = new mysqli("$servername", "$username", "$password", "$database");

  if (isset($_POST["aktion"]))

  {

    //  Gegenstand Einfügen  //

    if ($_POST["aktion"] == "0")

    {
    $query  =   "INSERT INTO gegenstand (gs_name, ka_name) VALUES (?, ?)";
    $type   =   "ss";
    $params = array($_POST['gs_name'][0], $_POST['insert_ka_name'][0]);
    print_r($params);
    print_r($_POST['insert_ka_name']);
    insertData($query, $type, $params);
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
