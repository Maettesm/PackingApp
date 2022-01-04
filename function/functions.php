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
      die('Bitte Kategorie wählen! execute() failed:' .htmlspecialchars($conn->error));
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

  function lists($ka_name)
  {
    echo "<tr><th style='width:150px'>$ka_name</th><th></th></tr>\n";

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
    $query = "SELECT gs_name, gs_id, ka_name
              FROM gegenstand
              WHERE ka_name = '$ka_name'
              ORDER BY gs_name";
    $stmt = $conn->query($query) or die(mysqli_error());
    while ($dsatz = $stmt->fetch_assoc())
    {
    $gs_name = $dsatz['gs_name'];
    $gs_id    = $dsatz['gs_id'];

    echo "<tr><td style='width:150px'>$gs_name</td><td><input name='qty[$gs_id]' size='5' type='number'></td><td><input type='checkbox'></td></tr>\n";
    }
  }
?>
