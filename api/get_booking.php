<?php  include_once "base.php";



?>


<div id="info">
    <div>您選擇的電影是：<span id='selectMovie'></span></div>
    <div>您選擇的時刻是：<span id='selectDate'></span>&nbsp;&nbsp;&nbsp;<span id='selectSession'></span></div>
    <div>您已經勾選<span id='tickets'></span>張票，最多可以購買四張票</div>
    <div class="ct">
        <button onclick="$('#orderForm,#booking').toggle();$('#booking').html('')">上一步</button>
        <button>確定</button>
    </div>
</div>