<?php
include_once "base.php";

$rows=$Movie->all(" order by `rank`");
foreach($rows as $key => $row){
    $prev=($key==0)?$row['id']:$rows[$key-1]['id'];
    $next=($key==(count($rows)-1))?$row['id']:$rows[$key+1]['id'];
?>

<div style="display:flex;width:90%;margin:2px auto;padding:2px;position:relative" id="movie-<?=$row['id'];?>">
    <div style="width:15%">
        <img src="./upload/<?=$row['poster'];?>" style="width:80px">
    </div>
    <div style="width:15%">
        分級:<img src="./icon/03C0<?=$row['level'];?>.png">
    </div>
    <div style="width:70%">
        <div style="display:flex;justify-content:space-between">
            <div>片名:<?=$row['name'];?></div>
            <div>片長:<?=$row['length'];?></div>
            <div>上映時期:<?=$row['ondate'];?></div>
        </div>
        <div>
            <button onclick="showMovie(<?=$row['id'];?>)"><?=($row['sh']==1)?'顯示':'隱藏';?></button>
            <button onclick="swMovie('Movie','up',<?=$row['id'];?>,<?=$prev;?>)" data-up="<?=$row['id'];?>-<?=$prev;?>">往上</button>
            <button onclick="swMovie('Movie','down',<?=$row['id'];?>,<?=$next;?>)" data-down="<?=$row['id'];?>-<?=$next;?>">往下</button>
            <button onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button>
            <button onclick="del('Movie',<?=$row['id'];?>)">刪除電影</button>
        </div>
        <div>
            劇情介紹:<?=$row['intro'];?>
        </div>
    </div>
</div>
<?php
}
?>


<script>
    function swMovie(table,type,id1,id2){

$.post("./api/sw.php",{table,id1,id2},()=>{
        let height=$(`#movie-${id1}`).outerHeight();
     switch(type){
        case 'up':
            $(`#movie-${id1}`).animate({top:-1*height},3000)
            $(`#movie-${id2}`).animate({top:height},3000)
        break;
        case 'down':
            $(`#movie-${id1}`).animate({top:height},3000)
            $(`#movie-${id2}`).animate({top:-1*height},3000)
        break;
     }


    //getAllMovies();
    //location.reload();
})

}
</script>