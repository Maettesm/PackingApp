<?php
echo "<form name='f' action='/PackingApp/index.php' method='post'>";
echo "<input name='aktion' type='hidden'>";
echo "<input name='id' type='hidden'>";

include_once $path . "/sql_database/config.php";

  if (isset($_POST["aktion"]))

  {

    //  Gegenstand Einfügen  //

    if ($_POST["aktion"] == "0")
    {
      if (isset ($_POST['insert_ka_name'][0]))
      {
      $query  =   "INSERT INTO gegenstand
                   (gs_name, ka_name)
                   VALUES (?, ?)";
      $type   =   "ss";
      $params = array($_POST['gs_name'][0], $_POST['insert_ka_name'][0]);
      insertData($query, $type, $params);
      }
      else
      {
        echo "Bitte Kategorie auswählen";
      }
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


    // Urlaub Einfügen

    else if ($_POST["aktion"] == "10")

    {
    $query  ="INSERT INTO urlaub
              (ul_name)
              VALUES (?)";
    $type   = "s";
    $params = array($_POST['ul_name']);
    insertData($query, $type, $params);
    }

    // Person Einfügen

    else if ($_POST["aktion"] == "9")

    {
    $query  ="INSERT INTO personen
              (ps_vorname, ps_nachname)
              VALUES (?, ?)";
    $type   = "ss";
    $params = array($_POST['ps_vorname'], $_POST['ps_nachname']);
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

    //  Menge Einfügen  //

    else if ($_POST["aktion"] == "7")
    {
      if (isset($_POST['ps']))
      {
        $ps = $_POST['ps'];
        print_r($ps);
      }
      if (isset($_POST['qty']))
      {
        $ka_name  = $_POST['ka_name'];
        $gs_id    = $_POST['id'];
        $qty      = $_POST['qty'][$gs_id];
        print_r($qty);

      }

    $id = $_POST['id'];
    print_r($id);

    $query  = "INSERT INTO Packliste
                VALUES (? , ?, ?)";
    $type   = "ii";



    }
  }
?>
