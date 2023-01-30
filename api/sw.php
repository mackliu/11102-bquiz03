<?php
include_once "base.php";

//$db=new DB($_POST['table']);

$db=${$_POST['table']};

$row1=$db->find($_POST['id1']);
$row2=$db->find($_POST['id2']);

$tmp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$tmp;

$db->save($row1);
$db->save($row2);

