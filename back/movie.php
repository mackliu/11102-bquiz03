<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>

<div style="height:450px;overflow:auto;" id="MovieList">

</div>
<script>


getAllMovies();

function getAllMovies(){
    $.get("./api/movie_list.php",(list)=>{
        $("#MovieList").html(list)
    })
}

</script>