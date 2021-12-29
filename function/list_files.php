<?php
$dir    = dirname(__dir__) . '/function' ;
$files  = scandir($dir);


$anz    = count($files);
for ($i=2; $i < $anz; $i++) {
    echo "<a href='../PackingApp/function/$files[$i]'>$files[$i]</a><br>\n";
}
?>
