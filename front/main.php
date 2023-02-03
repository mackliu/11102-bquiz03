<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>


    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <div style="display:flex;flex-wrap:wrap">
          <?php
            $today=date("Y-m-d");
            $ondate=date("Y-m-d",strtotime("-2 days"));
            ///$rows=$Movie->all(['sh'=>1]," && `ondate` >= '$ondate' && `ondate` <= '$today' order by `rank`");
            $rows=$Movie->all(['sh'=>1]," && `ondate` between '$ondate' AND '$today' order by `rank`");
            
            foreach($rows as $row){
          ?>
            <div>
                <div>片名:<?=$row['name'];?></div>
                <div></div>
                <div>
                  <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
                  <button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
                </div>


            </div>

          <?php

          }
          ?>

        </div>
        <div class="ct"> </div>
      </div>
    </div>