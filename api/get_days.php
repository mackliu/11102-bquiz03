<?php

include_once "base.php";

$movie=$Movie->find($_GET['id']);
$ondate=$movie['ondate'];
$today=strtotime(date("Y-m-d"));

$duration=3 - (( $today - strtotime($ondate))/(60*60*24));
//echo $duration;
for($i=0;$i<$duration;$i++){    

    $date=date("Y-m-d",strtotime("+$i days"));
    echo "<option value='$date'>$date</option>";
}

?>
