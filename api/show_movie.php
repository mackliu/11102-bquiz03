<?php include_once "base.php";

$movie=$Movie->find($_POST['id']);

/* if($movie['sh']==1){
    $movie['sh']=0;
}else{
    $movie['sh']=1;
} */

//$movie['sh']=($movie['sh']==1)?0:1;
$movie['sh']=($movie['sh']+1)%2;

$Movie->save($movie);


?>