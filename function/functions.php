<?php
// FUNKTION INSERT DATA

  function insertData($query, $type, $params)
  {
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  $stmt = $conn->prepare($query);
    if (false===$stmt)
    {
      die('prepare() failed:' .htmlspecialchars($conn->error));
    }
  $rc = $stmt->bind_param($type, ...$params);
    if (false===$rc)
    {
      die('bind_param() failed:' .htmlspecialchars($conn->error));
    }
  $rc = $stmt->execute();
    if (false===$rc)
    {
      die('execute() failed:' .htmlspecialchars($conn->error));
    }
  $stmt->close();
  $conn->close();
  }


// FUNKTION UPDATE DATA

  function updateData($query, $type, $params)

    {
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    $stmt = $conn->prepare($query);
      if (false===$stmt)
      {
        die('prepare() failed:' .htmlspecialchars($conn->error));
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    $stmt = $conn->prepare($query);
    if (false===$stmt)
    {
        die('prepare() failed:' .htmlspecialchars($conn->error));
    }

    $rc = $stmt->execute();
    if (false===$rc)
    {
        die('execute() failed:' .htmlspecialchars($conn->error));
    }

    $stmt->close();
              }
        $rc = $stmt->bind_param($type, ...$params);
            if (false===$rc)
            {
                die('bind_param() failed:' .htmlspecialchars($conn->error));
            }
        $rc = $stmt->execute();
            if (false===$rc)
            {
                die('execute() failed:' .htmlspecialchars($conn->error));
            }
        $stmt->close();
        $conn->close();
        }


// FUNKTION LIST DATA

    function list_data()

    {
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        global $ka_name;
        echo "<option name='$ka_name' selected>$ka_name</option>\n";
        $query  = "SELECT * FROM kategorie
                    ORDER BY ka_id";
        $stmt = $conn->query($query) or die(mysqli_error());
        while ($dsatz = $stmt->fetch_assoc())
            {
                if (false===$dsatz)
                {
                    die('fetch_assoc failed:' .htmlspecialchars($gegenstaende->error));
                }
                $ka_id  = $dsatz['ka_id'];
                $ka_name= $dsatz['ka_name'];

                echo "<option name='$ka_name'>$ka_name</option>\n";
            }
        $stmt->close();
        $conn->close();
    }


// FUNKTION DELETE DATA //

  function delete_data($query)

  {
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    $stmt = $conn->prepare($query);
    if (false===$stmt)
    {
        die('prepare() failed:' .htmlspecialchars($conn->error));
    }

    $rc = $stmt->execute();
    if (false===$rc)
    {
        die('execute() failed:' .htmlspecialchars($conn->error));
    }

    $stmt->close();
    $conn->close();
  }


// Funktion KATEGORIE LISTEN

  function lists($ka_name, $ul_id)
  {

// Table Name nach Kategorie //

    echo "<tr><th style='width:150px'>$ka_name</th><th></th>\n";
    echo "";
// Table Erweiterung nach Personen //
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    $query = "SELECT * FROM personen ORDER BY ps_id";
    $stmt = $conn->query($query) or die(mysqli_error());
    while ($dsatz = $stmt->fetch_assoc())
    {
      $vorname = $dsatz['ps_vorname'];
      $nachname= $dsatz['ps_nachname'];
      $vorname = mb_substr($vorname,0,2);
      $nachname= mb_substr($nachname,0,2);



      echo "<th>$vorname$nachname</th>\n";
    }
    echo "<th></th></tr>\n";


// Liste Gegenstände pro Kategorie und Mengenfeld

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    $query = "SELECT gs_name, gs_id, ka_name
              FROM gegenstand
              WHERE ka_name = '$ka_name'
              ORDER BY gs_name";
    $stmt = $conn->query($query) or die(mysqli_error());
    while ($dsatz = $stmt->fetch_assoc())
    {
      $ka_name  = $dsatz['ka_name'];
      $gs_name  = $dsatz['gs_name'];
      $gs_id    = $dsatz['gs_id'];

      $query1 = "SELECT * FROM personen ORDER BY ps_id";
      $stmt1 = $conn->query($query1) or die(mysqli_error());
      while ($dsatz1 = $stmt1->fetch_assoc())
      {
      $ps_id = $dsatz1['ps_id'];}

      echo "<tr>";
      echo "<td style='width:150px' >$gs_name</td>\n";
      echo "<td><input type='number' name='qty[$gs_id]' ></td>\n";

// Checkboxes für Personen und Save-Button//

      $query2 = "SELECT * FROM personen ORDER BY ps_id";
      $stmt2 = $conn->query($query2) or die(mysqli_error());
      while ($dsatz2 = $stmt2->fetch_assoc())
        {
        $ps_id = $dsatz2['ps_id'];
        echo "<td><input type='checkbox' name='gs_id_ps[$gs_id][]' value='$ps_id'></td>\n";
        }

      echo "<td><button type='button' class='btn_save'><a href='javascript:send(7,0);'><i class='fa fa-plus'></i></a></button>\n</td>";
      echo "</tr>\n";
    }
    $conn->close();
  }

// FUNKTION INSTALL DATABSE //

function install_database($insertTable){
  $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  if (false===$insertTable)
  {
  die("prepare Create Table kategorie failed:". htmlspecialchars($conn->error));
  }
  $rc = $insertTable->execute();

  if (false===$rc)
  {
  die("execute Create Table kategorie failed:". htmlspecialchars($conn->error));
  }
}
?>
