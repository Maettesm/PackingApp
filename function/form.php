<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . '/includes/header.php';
?>
<?php


include_once $path . "/sql_database/config.php";

  if (isset($_POST["aktion"]))

  {

//  Gegenstand Einfügen  // = 0

    if ($_POST["aktion"] == "0")
    {
      if (isset ($_POST['ka_name'][0]))
      {
      $query  =   "INSERT INTO gegenstand
                   (gs_name, ka_name)
                   VALUES (?, ?)";
      $type   =   "ss";
      $params = array($_POST['gs_name'][0], $_POST['ka_name'][0]);
      insertData($query, $type, $params);
      }
      else
      {
        echo "Bitte Kategorie auswählen";
      }
    }

// Kategorie einfügen // = 1

    else if ($_POST["aktion"] == "1")

    {
      if (isset ($_POST['ka_name'][0]))
      {
      $query  =  'INSERT INTO kategorie
                  (ka_name)
                  VALUES (?)';
      $type   =   's';
      $params = array($_POST['ka_name'][0]);
      insertData($query, $type, $params);
    } else {
      echo "Problem";
    }


    }


// Urlaub Einfügen // = 10

    else if ($_POST["aktion"] == "10")

    {
    $query  ="INSERT INTO urlaub
              (ul_name)
              VALUES (?)";
    $type   = "s";
    $params = array($_POST['ul_name']);
    if ($_POST['ul_name'] == "")
    {
      echo "Bitte Urlaub ausfüllen";
    } else
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
    if ($_POST['ps_vorname'] == "" OR $_POST['ps_nachname'] == "" )
      {
        echo "Bitte >Vor- und Nachmane angeben";
      } else
      {
        insertData($query, $type, $params);
      }
    }

// Gegenstand Update // = 2

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

// Gegestand löschen // = 4

    else if ($_POST["aktion"]=== "4")

    {
    $id = $_POST['id'];
    $query = "DELETE FROM gegenstand WHERE gs_id = $id";
    delete_data($query);
    }

// Kategorie löschen // = 5

    else if ($_POST["aktion"]=== "5")

    {
    $id = $_POST['id'];
    $query = "DELETE FROM kategorie WHERE ka_id = $id";
    delete_data($query);
    }

//  Menge Einfügen  // = 7

    else if ($_POST["aktion"] == "7")

    {

      if (isset($_POST['qty']))

      $ul_id = $_POST['ul_name'];
      $gs_id_ps = $_POST['gs_id_ps'];
      $qty = $_POST['qty'];


      foreach ($gs_id_ps as $gs_id => $ps_array)

        {

          foreach ($ps_array as $ps => $ps_id)

          {

            $query    = "INSERT INTO packliste
                          (ps_id, gs_id, ul_name, qty)
                          VALUES (?,?,?,?)";
            $type     = "iisi";
            $params   = array($ps_id, $gs_id, $ul_id ,$qty);
            insertData($query, $type, $params);
          }
        }
      }

//  Urlaub auswählen

  elseif ($_POST["aktion"]=='11')

  {

  if (isset($_POST['ul_id']))

    {
      $ul_id = $_POST['ul_id'];
    }
  }
}
?>
