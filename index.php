<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style/style.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<title>Meine Packliste</title>
<script type="text/javascript">
function send(aktion,id)
{
document.f.aktion.value = aktion;
document.f.id.value = id;
document.f.submit();
}
</script>
<?php
require_once('sql/config.php') ;
require_once('function/functions.php');
?>
</head>
<body>
<?php
require_once('function/form.php') ;
?>
<div class="row">
<div class="col-1">
<?php

?>
</div>
<div class="col-2">
<?php
require_once('function/insert_gegenstand.php');
require_once('function/edit_gegenstand.inc.php');
?>
</div>
<div class="col-3">
</div>
</div>
</form>
</body>
</html>
