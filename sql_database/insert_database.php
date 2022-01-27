<?php
require_once('../sql/config.php');
require_once('../function/functions.php');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$insertDatabase = $conn->prepare("CREATE DATABASE IF NOT EXISTS urlaubsplanung");
$insertDatabase->execute();
$conn->close();

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
if ($conn = true)
{
  echo "Insert Database Succeed<br>";


//Insert Table URLAUB //

  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `urlaub`
                  ( ul_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    ul_name varchar (55) UNIQUE NOT NULL)");
  install_database($insertTable);


//Insert Table KATEGORIE //

  $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `kategorie`
                  ( ka_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    ka_name varchar (55) UNIQUE DEFAULT NULL)");
  install_database($insertTable);


//Insert Table PERSONEN //

  $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `personen`
                  ( ps_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    ps_vorname varchar (40)  NOT NULL,
                    ps_nachname varchar (40) NOT NULL)");
  install_database($insertTable);

  $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `personen`
                  ( ps_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    ps_vorname varchar (40)  NOT NULL,
                    ps_nachname varchar (40) NOT NULL)");
  install_database($insertTable);




//Insert Table GEGENSTAND //

  $insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `gegenstand`
              ( gs_id int(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                gs_name varchar (40) UNIQUE NOT NULL,
                ka_name varchar (55) NOT NULL
                 )");
  install_database($insertTable);


//Insert Table GEGENSTAND //

$insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `packliste`
                ( ps_is int (4) NOT NULL,
                  ka_name varchar (55) NOT NULL,
                  gs_id int (4) NOT NULL,
                  ul_name varchar (55) NOT NULL)");
install_database($insertTable);

//Add Constraint to personen

$addconstraint = $conn->prepare("ALTER TABLE urlaubsplanung.personen
                                  DROP CONSTRAINT IF EXISTS uq_personen");


$rc = $addconstraint->execute();
$addconstraint = $conn->prepare("ALTER TABLE urlaubsplanung.personen
                                  ADD CONSTRAINT uq_personen
                                  UNIQUE (ps_vorname,ps_nachname)");
$rc = $addconstraint->execute();

  if (false===$rc)
  {
  die("add Constraint failed: " . htmlspecialchars($conn->error));
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
}

?>
