<?php
include_once "base.php";

$Order->del([$_POST['type']=>$_POST['value']]);


/* switch($_POST['type']){
    case "date":
        $Order->del(['date'=>$_POST['value']]);
        
    break;
    case "movie":
        $Order->del(['movie'=>$_POST['value']]);

    break;
} */