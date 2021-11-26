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
        include '../02_Urlaubsplanung_safe/sql.php';
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
                    $gegenstand = $conn->prepare("INSERT INTO gegenstand
                                                (gs_name, ka_id)
                                                VALUES (?, ?)");
                        if (false===$gegenstand)
                        {
                            die('prepare() failed:' .htmlspecialchars($conn->error));
                        }
                    $rc = $gegenstand->bind_param("si", $_POST["gs_name"][0], $_POST["ka_id"]);
                        if (false===$rc)
                        {
                            die('bind_param() failed:' .htmlspecialchars($conn->error));
                        }
                    $rc = $gegenstand->execute();
                        if (false===$rc)
                        {
                            die('execute() failed:' .htmlspecialchars($conn->error));
                        }
                    $gegenstand->close();
                    $conn->close();
                }

                // Kategorie Einfügen //

                if ($_POST["aktion"] == "1")
                {
                    $kategorie = $conn->prepare("INSERT INTO kategorie
                                                (ka_name) VALUES (?)");
                        if (false===$kategorie)
                        {
                            die('prepare() failed:' .htmlspecialchars($conn->error));
                        }
                    $rc = $kategorie->bind_param("s", $_POST["new_kat"]);
                        if (false===$rc)
                        {
                            die('bind_param() failed:' .htmlspecialchars($conn->error));
                        }
                    $rc = $kategorie->execute();
                        if (false===$rc)
                        {
                            die('execute() failed:' .htmlspecialchars($conn->error));
                        }
                    $kategorie->close();
                    $conn->close();
                }
            }


        ?>
    <form name="f" action="urlaubsplanung.php" method="post">
    <input name="aktion" type="hidden">
    <input name="id" type="hidden">
    <div class="grid-container">
        <div class="grid-item1">
            <?php
            include '../02_Urlaubsplanung_safe/insert_gegenstand.inc.php';
             ?>
        </div>
        <div class="grid-item2">
            <?php
            include '../02_Urlaubsplanung_safe/insert_kategorie.inc.php';
             ?>
        </div>
    <div>
    </body>
</html>
