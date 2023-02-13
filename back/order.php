<h2 class="ct">訂單清單</h2>
<div>
    快速刪除：
</div>

<div style="display:flex;width:98%;margin:auto;justify-content:space-between">
    <div style="width:14%;background:#ccc;text-align:center">訂單編號</div>
    <div style="width:14%;background:#ccc;text-align:center">電影名稱</div>
    <div style="width:14%;background:#ccc;text-align:center">日期</div>
    <div style="width:14%;background:#ccc;text-align:center">場次時間</div>
    <div style="width:14%;background:#ccc;text-align:center">訂購數量</div>
    <div style="width:14%;background:#ccc;text-align:center">訂購位置</div>
    <div style="width:14%;background:#ccc;text-align:center">操作</div>
</div>
<div>
<?php
$orders=$Order->all(" order by num desc");

foreach($orders as $order){
?>
  <div style="display:flex;width:98%;margin:auto;justify-content:space-between">
    <div style="width:14%;text-align:center"><?=$order['num'];?></div>
    <div style="width:14%;text-align:center"><?=$order['movie'];?></div>
    <div style="width:14%;text-align:center"><?=$order['date'];?></div>
    <div style="width:14%;text-align:center"><?=$order['session'];?></div>
    <div style="width:14%;text-align:center"><?=$order['qt'];?></div>
    <div style="width:14%;text-align:center">
    <?php
        $seats=unserialize($order['seats']);
        foreach($seats as $seat){
            echo floor($seat/5)+1 . "排" . ($seat%5 +1 ) . "號";
            echo "<br>";
        }
        ;?>
    </div>
    <div style="width:14%;text-align:center">
        <button onclick="del('Order',<?=$order['id'];?>,'你確定要刪除<?=$order['date'].' '.$order['movie'].'的訂單資料嗎?';?>')">刪除</button>
    </div>
 </div>
 <hr>
<?php
}
?>


</div>