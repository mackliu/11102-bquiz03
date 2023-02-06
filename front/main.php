<style>
 #poster{
  width: 420px;
  height:400px;
  position: relative;
 } 

 .pos{
  width:210px;
  height:280px;
  /* background-color: white; */
  margin-left: 105px;  /*讓海報維持在中間 */
  position: absolute;
  text-align: center;
  display: none;
 }

 .pos img{
    width: 100%;
    height: 260px;
 }
.controls{
  width: 420px;
  height:110px;
/*   background-color: lightblue; */
  margin: 10px auto 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  position:absolute;
  bottom:0;
}

.left,.right{
  border-top:20px solid transparent;
  border-bottom:20px solid transparent;
}
.left{
  border-right:20px solid blue;
}
.right{
  border-left:20px solid blue;
}

.btns{
  width:320px;
  /* background:green; */
  height:100px;
  display: flex;
  overflow: hidden;  /*讓超過四個元件寬度的其他內容隱蔵 */
}

.btn{
  width:80px;
  font-size:12px;
  text-align: center;
  flex-shrink: 0;   /*讓子元素維持自己的寬度 */
  box-sizing: border-box;  /*讓元件總寬度不受padding影嚮 */
  padding:3px;
  position:relative;
}

.btn img{
  width:100%;
  height:80px;

}

</style>

<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="poster">
          <div class="lists">
            <?php
              $posters=$Trailer->all(['sh'=>1]);
              foreach($posters as $poster){
            ?>
            <div class='pos'>
              <img src="./upload/<?=$poster['img'];?>" alt="">
              <div><?=$poster['name'];?></div>
            </div>
            <?php
                }
            ?>
          </div>
          <div class="controls">
            <div class='left'></div>
            <div class='btns'>
            <?php
              foreach($posters as $poster){
            ?>
              <div class="btn">
                <img src="./upload/<?=$poster['img'];?>" alt="">
                <div><?=$poster['name'];?></div>
              </div>
            <?php
              }
            ?>
            </div>
            <div class='right'></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(".pos").eq(0).show();
       
      let btns=$(".btn").length;
      let p=0;
      $(".right").on("click",function(){
          
        if((p+1)<=btns-4)
          p=p+1;
          $(".btn").css({right:80*p});
      })
      $(".left").on("click",function(){
          
        if((p-1)>=0)
          p=p-1;
          $(".btn").css({right:80*p});
      })

    </script>

    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <div style="display:flex;flex-wrap:wrap">
          <?php
            $today=date("Y-m-d");
            $ondate=date("Y-m-d",strtotime("-2 days"));
            //$rows=$Movie->all(['sh'=>1]," && `ondate` >= '$ondate' && `ondate` <= '$today' order by `rank`");
            
            //$all=q("select count(*) as 'total' from `movie` where `sh`=1 && `ondate` between '$ondate' AND '$today'")[0]['total'];
            $all=$Movie->count(" where `sh`=1 && `ondate` between '$ondate' AND '$today'");
            $div=4;
            $pages=ceil($all/$div);
            $now=$_GET['p']??1;
            $start=($now-1)*$div;
            $rows=$Movie->all(['sh'=>1]," && `ondate` between '$ondate' AND '$today' order by `rank` limit $start,$div");
            
            foreach($rows as $row){
          ?>
            <div style="width:46%;margin:0.5%;border:1px solid white;border-radius:5px;padding:5px">
                <div>片名:<?=$row['name'];?></div>
                <div style="display:flex">
                    <div>
                        <img src="./upload/<?=$row['poster'];?>" 
                           style="width:60px;height:80px" 
                         onclick="location.href='?do=intro&id=<?=$row['id'];?>'">
                    </div>
                    <div style="font-size:14px;">
                      <p>分級:<img src='./icon/03C0<?=$row['level'];?>.png'></p>
                      <p>上映日期:<?=$row['ondate'];?></p>
                    </div>
                </div>
                <div>
                  <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
                  <button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
                </div>
            </div>
          <?php  } ?>

        </div>
        <div class="ct">
          <?php

            for($i=1;$i<=$pages;$i++){
              $size=($i==$now)?'20px':'16px';
              echo "<a href='index.php?p=$i' style='font-size:$size'> ";
              echo $i;
              echo " </a>";
            }

          
          ?>
        </div>
      </div>
    </div>