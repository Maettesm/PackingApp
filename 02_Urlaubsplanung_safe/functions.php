<?php
    // FUNKTION INSERT DATA
    function insertData($query, $type, $params)

        {
        include 'sql/sql.php';
        $conn = new mysqli("$servername", "$username", "$password", "$database");
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
        include 'sql/sql.php';
        $conn = new mysqli("$servername", "$username", "$password", "$database");
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

    // FUNKTION LIST DATA

    function list_data()

    {
    include 'sql/sql.php';
    global $ka_name;
    echo "<option name='$ka_name' selected>$ka_name</option>\n";
    $conn = new mysqli("$servername", "$username", "$password", "$database");
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
    }
?>
