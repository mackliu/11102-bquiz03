<?php
include_once "base.php";

$row1=$Trailer->find($_POST['id1']);
$row2=$Trailer->find($_POST['id2']);

$tmp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$tmp;

$Trailer->save($row1);
$Trailer->save($row2);

