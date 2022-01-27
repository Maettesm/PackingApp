<?php include_once 'includes/header.php'; ?>
<div class="container-lists" >
<div class="col-1">
<?php include_once path .'/function/insert_gegenstand.php'; ?>
<?php include_once path .'/function/insert_kategorie.php'; ?>
<?php include_once path .'/function/insert_person.php'; ?>
<?php include_once path .'/function/insert_urlaub.php'; ?>
<?php include_once path .'/function/edit_gegenstand.php'; ?>
</div>
<?php include_once path .'/function/packing_list.php'; ?>
<?php print_r(path); ?>
</div>
</form>
</body>
</html>
