<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <form method="post"  action="test.php">
            <select name="test">
                <option value="erste">Erste</option>
                <option value="zweite">Zweite</option>
                <option value="dritte">Dritte</option>
            </select>
            <input type="submit" value="Submit">
    </body>
</html>
<?php
   $option = isset($_POST['test']) ? $_POST['test'] : false;
   if ($option) {
      echo htmlentities($_POST['test'], ENT_QUOTES, "UTF-8");
   } else {
     echo "task option is required";
     exit;
   }
?>
