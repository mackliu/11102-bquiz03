<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>

<div style="height:450px;overflow:auto;" id="MovieList">

</div>
<script>


getAllMovies()

let movies

function getAllMovies(){
    $.get("./api/movie_list.php",(list)=>{
        movies = JSON.parse(list)
        renderList()
    })
}
function swMovie(table,type,id1,id2){
    $.post("./api/sw.php",{table,id1,id2},()=>{
        let mv1Index=findMovie(id1)
        let mv2Index=findMovie(id2)
        
        let tmp=movies[mv1Index].rank
            movies[mv1Index].rank=movies[mv2Index].rank
            movies[mv2Index].rank=tmp
            movies.sort(function(a,b){return a.rank-b.rank;});
            $("#MovieList").html("")
            renderList() 
        
    })
}
function findMovie(id){
    return movies.findIndex(movie=>movie.id==id);
}
function renderList(){
    movies.forEach((movie,idx)=>{
        let prev=(idx==0)?movie.id:movies[idx-1].id;
        let next=(idx==movies.length-1)?movie.id:movies[idx+1].id;
        let show=movie.sh==1?'顯示':'隱藏';
        let item=`<div style="display:flex;width:90%;margin:2px auto;padding:2px;position:relative" id="movie-${movie.id}">
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
        //console.log(item)
        $("#MovieList").append(item)
    })
}

</script>