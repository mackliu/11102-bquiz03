<h3 class="ct">線上訂票</h3>

<table style="width:50%;margin:auto">
    <tr>
        <td>電影:</td>
        <td>
            <select name="" id="movie"></select>
        </td>
    </tr>
    <tr>
        <td>日期:</td>
        <td>
            <select name="" id=""></select>
        </td>
    </tr>
    <tr>
        <td>場次:</td>
        <td>
            <select name="" id=""></select>
        </td>
    </tr>
</table>
<div class="ct">
<button>確定</button>
<button>重置</button>
</div>
<script>


getMovies();

function getMovies(){
    $.get("./api/get_movies.php",(movies)=>{
        $("#movie").html(movies)

    })
}


</script>