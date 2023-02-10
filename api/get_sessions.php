<?php include_once "base.php";

$movie=$Movie->find($_GET['id']);
$date=$_GET['date'];

$hr=date("G");


if($date===date("Y-m-d") && $hr>=14){

    $start=floor($hr/2)-5;

}else{

    $start=1;

}

for($i=$start;$i<=5;$i++){

    /**
     * 1.先找出該場次的所有訂位紀錄(電影,日期,場次)  $Order->all(['movie'=>$movie,'date'=>$date,'session'=>$session]);
     * 2.算出所有訂位紀錄的座位總數  foreach($orders as $order){ $seats+=$order['seats']}
     * 3.計算20-總數=剩餘座位  20-$seats
     */

    echo "<option value='{$Movie->session[$i]}'>";
    echo $Movie->session[$i];
    echo " 剩餘座位 20 ";  //20-已被訂走的座位數
    echo "</option>";
}