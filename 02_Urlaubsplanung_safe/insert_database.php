<?php
include '../02_Urlaubsplanung_safe/sql.php';

$conn = new mysqli("$servername", "$username", "$password", "");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$insertDatabase = $conn->prepare("CREATE DATABASE urlaubsplanung");
$insertDatabase->execute();
$conn->close();

$conn = new mysqli("$servername", "$username", "$password", "$database");
if ($conn = true)
    {
        echo "Insert Database Succeed<br>";

        $conn = new mysqli("$servername", "$username", "$password", "$database");

        //Insert Table KATEGORIE
        $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `kategorie`
                        ( ka_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                          ka_name varchar (55) DEFAULT NULL)");
        $insertTable->execute();

        //Insert Table PERSONEN
        $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `personen`
                        ( ps_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                          ps_name varchar (40) DEFAULT NULL)");
        $insertTable->execute();

        //Insert Table GEGENSTAND
        $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `gegenstand`
                        ( gs_id int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                          gs_name varchar(40) NOT NULL,
                          ka_id int NOT NULL
                         )");
        $insertTable->execute();

        // Build Contsraints
        $insertTable = $conn->prepare("ALTER TABLE gegenstand
                                        ADD CONSTRAINT fk_kategorie
                                        FOREIGN KEY (ka_id) REFERENCES kategorie(ka_id)");
        $insertTable->execute();
    }
    else
    {
        echo "Insert Database Fail";
    }

if ($insertTable=true)
    {
        echo "Inserting Table Successfull<br>";
    }
else
    {
    echo "Error inserting Table<br>";
    }
$conn->close();

?>
