<?php include_once "base.php";

$max_id=$Order->max('id')+1;

$_POST['num']=date("Ymd") . sprintf("%04d",$max_id);

sort($_POST['seats']);

$_POST['seats']=serialize($_POST['seats']);

$Order->save($_POST);
//dd($_POST);
?>


<h3>感謝您的訂購，您的訂單編號是:<?=$_POST['num'];?></h3>
<p>電影名稱：<?=$_POST['movie'];?></p>
<p>日期：<?=$_POST['date'];?></p>
<p>場次時間：<?=$_POST['session'];?></p>
<p>座位:<br>
<?php

$seats=unserialize($_POST['seats']);
foreach($seats as $seat){
    echo floor($seat/5)+1 . "排" . ($seat%5 +1 ) . "號";
    echo "<br>";
}

;?>
<br>
共<?=count($seats);?>張電影票
</p>

<p class="ct">
    <button onclick="location.href='index.php'">確定</button>
</p>