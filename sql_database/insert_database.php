<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
include_once path . "/function/functions.php";
?>

<?php
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,"");
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
                    ka_name varchar (55) UNIQUE NOT NULL)");
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


//Insert Table Packliste //

$insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `packliste`
                ( ps_id int (4) NOT NULL,
                  gs_id int (4) NOT NULL,
                  ul_name varchar (55) NOT NULL,
                  qty int (6) NOT NULL)");
install_database($insertTable);


//Insert Teilnehmer //


$insertTable = $conn->prepare("CREATE TABLE IF NOT EXISTS `teilnehmer`
                ( ul_id int(4) NOT NULL,
                  ul_name varchar (55) NOT NULL,
                  ps_id int(4) NOT NULL)");
install_database($insertTable);

//Add Constraint to personen

$addconstraint_personen = $conn->prepare("ALTER TABLE urlaubsplanung.personen
                                  DROP CONSTRAINT IF EXISTS uq_personen");


$rc = $addconstraint_personen->execute();

$addconstraint_personen = $conn->prepare("ALTER TABLE urlaubsplanung.personen
                                  ADD CONSTRAINT uq_personen
                                  UNIQUE (ps_vorname,ps_nachname)");
$rc = $addconstraint_personen->execute();

//Add Constraint to packliste

$addconstraint_packliste = $conn->prepare("ALTER TABLE urlaubsplanung.packliste
                                  DROP CONSTRAINT IF EXISTS uq_packliste");


$rc = $addconstraint_packliste->execute();
$addconstraint_packliste = $conn->prepare("ALTER TABLE urlaubsplanung.packliste
                                  ADD CONSTRAINT uq_packliste
                                  UNIQUE (ps_id,gs_id, ul_name, qty)");
$rc = $addconstraint_packliste->execute();

//Add Constraint to teilnehmer

$addconstraint_packliste = $conn->prepare("ALTER TABLE urlaubsplanung.teilnehmer
                                  DROP CONSTRAINT IF EXISTS uq_teilnehmer");


$rc = $addconstraint_packliste->execute();
$addconstraint_packliste = $conn->prepare("ALTER TABLE urlaubsplanung.teilnehmer
                                  ADD CONSTRAINT uq_teilnehmer
                                  UNIQUE (ps_id,ul_id)");
$rc = $addconstraint_packliste->execute();

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
