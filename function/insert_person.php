<!-- Person hinzufügen -->
<?php
  echo "<table>\n";
  echo "<tr><th>Vorname</th><th>Nachname</th><th></th></tr>\n";
  echo "<tr>";
  echo "<td><input type='text' name='ps_vorname' size='25'></td>";
  echo "<td><input name='ps_nachname'></td>";
  echo "<td><button type='button' class='anders'><a href='javascript:send(9,0);'>";
  echo "<i class='fa fa-plus'></i></a></button></td>\n";
  echo "</tr>\n";
  echo "</table>";
 ?>
