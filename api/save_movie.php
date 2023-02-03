<?php
include_once "base.php";


if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../upload/".$_FILES['trailer']['name']);
    $_POST['trailer']=$_FILES['trailer']['name'];
}
if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../upload/".$_FILES['poster']['name']);
    $_POST['poster']=$_FILES['poster']['name'];
}


$_POST['ondate']=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

unset($_POST['year'],$_POST['month'],$_POST['day']);

//如果是編輯資料,則不要去動rank及id的欄位;
if(!isset($_POST['id'])){
    $_POST['sh']=1;
    $_POST['rank']=$Movie->max("rank")+1;
}

$Movie->save($_POST);


to("../back.php?do=movie");