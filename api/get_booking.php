<?php  include_once "base.php";


$bookings=[];

?>

<style>
#block{
    width:540px;
    height:370px;
    background-image: url(./icon/03D04.png);
    box-sizing: border-box;
    padding-top:18px;
}

#block,.null-seat,.booking-seat{
    background-position: center;
    background-repeat: no-repeat;
}

.seats{
    width:316px;
    height:340px;
    display:flex;
    flex-wrap:wrap;
    margin:auto;
}

.seats > div{
    width:20%;
    height:calc( 340px / 4);
    position: relative;
}

.seats input[type='checkbox']{
    position:absolute;
    right:5px;
    bottom:5px;
}
.null-seat{
    background-image: url('./icon/03D02.png');
}

.booking-seat{
    background-image: url('./icon/03D03.png');
}
</style>

<div id="block">
    <div class="seats">
        <?php
            for($i=0;$i<20;$i++){
                if(in_array($i,$bookings)){

                    echo "<div class='booking-seat'>";
                }else{
                    echo "<div class='null-seat'>";

                }
                    echo "<div>";
                    echo   (floor($i/5)+1) . "排". ($i%5 +1 ) ."號";
                    echo "</div>";
                if(!in_array($i,$bookings)){
                    echo "<input class='chk' type='checkbox' value='$i'>";
                }
                echo "</div>";
            }
        ?>
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


<script>

let seats=[];

$(".chk").on("change",function(){

    if($(this).prop('checked')){
        //劃位
        
        if(seats.length>=4){
            alert("最多只能購買四張票");
            $(this).prop('checked',false)

        }else{
            seats.push($(this).val())
        }

    }else{
        //取消劃位
        seats.splice(seats.indexOf($(this).val()),1)
    }
    ///console.log(seats)

})



</script>