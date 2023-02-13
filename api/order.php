<?php include_once "base.php";

$max_id=$Order->max('id')+1;

$_POST['num']=date("Ymd") . sprintf("%04d",$max_id);

sort($_POST['seats']);

$_POST['seats']=serialize($_POST['seats']);

$Order->save($_POST);
//dd($_POST);
?>