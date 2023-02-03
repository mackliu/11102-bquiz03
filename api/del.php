<?php include_once "base.php";


$db=${$_POST['table']};

$db->del($_POST['id']);

//${$_POST['table']}->del($_POST['id']);
