<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Gegestände anlegen</title>
    <link rel="stylesheet" type="text/css" href="/01_MM/CSS/style.css">
    <h1>Packliste</h1>
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
<?php

    $conn = new mysqli("$servername", "$username", "$password", "$database");

    if (isset($_POST["aktion"]))

    {

        //  Gegenstand Einfügen  //

        if ($_POST["aktion"] == "0")

            {
            $query  =   "INSERT INTO gegenstand
                        (gs_name, ka_name)
                        VALUES (?, ?)";
            $type   =   "ss";
            $params = array($_POST['gs_name'][0], $_POST['insert_ka_name'][0]);
            print_r($params);
            print_r($_POST['insert_ka_name']);
            insertData($query, $type, $params);
            }


        // Kategorie Einfügen //

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
            $query  =  "UPDATE gegenstand
                        SET gs_name=?, ka_name=?
                        WHERE gs_id = $id";
            $type   =   "ss";
            $params = array($_POST["gs_name"][$id], $_POST["update_ka_name"][$id]);
            updateData($query, $type, $params);

        }

        // Kategorie Update //

        else if ($_POST["aktion"] == "3")

        {

            $id     =   $_POST["id"];
            $query  =  "UPDATE kategorie
                        SET ka_name=?
                        WHERE ka_id = $id";
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
<form name="f" action="urlaubsplanung.php" method="post">
<input name="aktion" type="hidden">
<input name="id" type="hidden">
<div class="grid-container">
<div class="grid-item1">

<?php
include '02_Urlaubsplanung_safe/insert_gegenstand.inc.php';
?>
</div>
<div class="grid-item2">
<?php
include '02_Urlaubsplanung_safe/insert_kategorie.inc.php';
?>
</div>
<div>
</body>
</html>
