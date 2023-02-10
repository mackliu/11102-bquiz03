<?php

include_once "base.php";

$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));
$movies=$Movie->all(['sh'=>1]," && `ondate` between '$ondate' AND '$today'");
foreach($movies as $movie){
    echo "<option value='{$movie['id']}'>{$movie['name']}</option>";
}
?>
