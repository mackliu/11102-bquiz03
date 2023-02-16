<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>

<div style="height:450px;overflow:auto;" id="MovieList">

</div>

<script>

let source;

function regDragEvent(){


let instance;
let nowDrag;
let gap;
let direction;
let move=0;
let dragId;
let swId;
$(".movie-item").on({
    'dragstart':(e)=>{
        instance=$(e.target).clone();
        nowDrag=e.target;
        let pos=$(nowDrag).offset();
        let width=$(nowDrag).outerWidth();
        gap={top:e.pageY-pos.top,left:e.pageX-pos.left};

        $(instance).css({visibility:'hidden'}).attr("id",'instance')
        $(nowDrag).css({position:'absolute',width:width,border:'1px solid #ccc','box-shadow':"3px 3px 5px #ccc",'z-index':99});
        $(nowDrag).before(instance);
        $('#MovieList').append(nowDrag)
        $(nowDrag).offset(pos)
        move=e.pageY

    },
    'drag':function(e){
        if(e.pageY-move>0){
            direction='down'
        }else if(e.pageY-move<0){
            direction='up'
        }
        move=e.pageY
        $(nowDrag).offset({top:e.pageY-gap.top,left:e.pageX-gap.left})
        
        $(nowDrag).hide();
        let el=document.elementFromPoint(e.pageX,e.pageY)
        if($(el).hasClass('movie-item') || $(el).parent().hasClass('movie-item')){
            if($(el).attr('id')===undefined){
                el=$(el).parents('.movie-item')
            }
            let edge=(direction=='down')?e.pageY+gap.top:$(nowDrag).offset().top;
            let pos,height;
                pos=$(el).offset();
                height=$(el).outerHeight();
            
            let middle=pos.top+Math.floor(height/2)
    
           if(direction == 'down' && edge>middle){
                $(el).after(instance)
            }else if(direction =='up' && edge<middle){
               $(el).before(instance)
           }
        }
        $(nowDrag).show()
    },
    'dragenter':(e)=>{
        e.preventDefault();

    },
    'dragover':(e)=>{

        e.preventDefault();
    },
    'dragend':(e)=>{

    },
    'drop':(e)=>{
        
        $(nowDrag).css({position:'relative',width:'90%',border:0,'box-shadow':'unset',top:'unset',left:'unset','z-index':'unset'});
        $(instance).before(nowDrag)
        $(instance).remove()
    }
})
}


getAllMovies()

let movies

/**
 * 設定一個全域變數movies用來存放所有電影的原始資料
 * 使用getAllMovies()取得電影資料後，把電影資料指定給變數movies
 */
function getAllMovies(){
    $.get("./api/movie_list.php",(list)=>{
        movies = JSON.parse(list)

        //執行renderList()將movies中的資料以html的方式呈現在列表區
        renderList()
    })
}

//變更排序
function swMovie(table,type,id1,id2){

    //先將資料傳到後端去更新資料的排序內容
    $.post("./api/sw.php",{table,id1,id2},()=>{

        //找到movies資料集中對應要變更排序的兩筆資料的索引值(在陣列中的位置)
        let mv1Index=movies.findIndex(movie=>movie.id==id1)
        let mv2Index=movies.findIndex(movie=>movie.id==id2)
        
        //交換兩個筆資料的rank值
        let tmp=movies[mv1Index].rank
            movies[mv1Index].rank=movies[mv2Index].rank
            movies[mv2Index].rank=tmp

            //根據rank值重新排序movies的所有資料
            movies.sort(function(a,b){return a.rank-b.rank;});
        
        //執行資料交換的動畫
        exchange(type,id1,id2)
        
    })
}

//執行移動動畫的函式
function exchange(type,id1,id2){
    let height=$(`#movie-${id1}`).outerHeight()
    switch(type){
        case 'up':
            $(`#movie-${id1}`).animate({top:-1*height},1000,()=>{
                //動畫執行完畢時，需要將列表區中的資料更新
                //因此先把列表區中的資料清空,再執行renderList()來重建內容
                $("#MovieList").html("")
                renderList() 
            });
            $(`#movie-${id2}`).animate({top:height},1000);
        break;
        case 'down':
            $(`#movie-${id1}`).animate({top:height},1000,()=>{
                $("#MovieList").html("")
                renderList() 
            });
            $(`#movie-${id2}`).animate({top:-1*height},1000);

        break;
    }
}

/**
 * 根據全域變數movies來繪製電影資料
 */
function renderList(){

    //使用迴圈來逐筆處理資料
    movies.forEach((movie,idx)=>{

        //計算上一筆和下一筆的id
        let prev=(idx==0)?movie.id:movies[idx-1].id;
        let next=(idx==movies.length-1)?movie.id:movies[idx+1].id;

        //判斷顯示隱藏的字串
        let show=movie.sh==1?'顯示':'隱藏';

        //宣告item 變數為一個電影的html模板，把相關的資料放入指定的位置中
        let item=`<div style="display:flex;width:90%;margin:0 2px auto;padding:2px;position:relative;background:white" id="movie-${movie.id}" 
                 class="movie-item"   draggable="true"" >
    <div style="width:15%">
        <img src="./upload/${movie.poster}" style="width:80px">
    </div>
    <div style="width:15%">
        分級:<img src="./icon/03C0${movie.level}.png">
    </div>
    <div style="width:70%">
        <div style="display:flex;justify-content:space-between">
            <div>片名:${movie.name}</div>
            <div>片長:${movie.length}</div>
            <div>上映時期:${movie.ondate}</div>
        </div>
        <div>
            <button onclick="showMovie(${movie.id})">${show}</button>
            <button onclick="swMovie('Movie','up',${movie.id},${prev})" data-up="${movie.id}-${prev}">往上</button>
            <button onclick="swMovie('Movie','down',${movie.id},${next})" data-down="${movie.id}-${next}">往下</button>
            <button onclick="location.href='?do=edit_movie&id=${movie.id}'">編輯電影</button>
            <button onclick="del('Movie',${movie.id})">刪除電影</button>
        </div>
        <div>
            劇情介紹:${movie.intro}
        </div>
    </div>
</div>`;
        //使用append的方式把電影資料逐筆放到MovieList中
        $("#MovieList").append(item)
    })

    regDragEvent();
}

</script>