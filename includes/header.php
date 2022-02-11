<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/PackingApp';
include_once $path . "/sql_database/config.php";
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href='/PackingApp/css/style.css'>
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
include_once path . "/function/functions.php";
include_once path . "/function/form.php";
?>
</head>
<body>
<header>
<h1>Packing App</h1>
</header>
<nav>
<ul>
<li><a class="active" href="/PackingApp/index.php">APP</a></li>
<li><a class="active" href="/PackingApp/site-main.php">Start</a></li>
<li><a class="active" href="/PackingApp/packing_list.php">Packliste</a></li>
</ul>
</nav>
