<?php  include_once "base.php";



?>

<style>
#block{
    width:540px;
    height:370px;
    background-image: url(./icon/03D04.png);
    box-sizing: border-box;
    /**以下可以不用 */
    background-position: center;
    background-repeat: no-repeat;
    padding-top:18px;
}

.seats{
    width:316px;
    height:340px;
    display:flex;
    flex-wrap:wrap;
    margin:auto;
}

.seats div{
    width:20%;
    height:calc( 340px / 4);
}

</style>

<div id="block">
    <div class="seats">
        <div>1</div>
        <div>2</div>
        <div>3</div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>

    </div>
</div>


<div id="info">
    <div>您選擇的電影是：<span id='selectMovie'></span></div>
    <div>您選擇的時刻是：<span id='selectDate'></span>&nbsp;&nbsp;&nbsp;<span id='selectSession'></span></div>
    <div>您已經勾選<span id='tickets'></span>張票，最多可以購買四張票</div>
    <div class="ct">
        <button onclick="$('#orderForm,#booking').toggle();$('#booking').html('')">上一步</button>
        <button>確定</button>
    </div>
</div>