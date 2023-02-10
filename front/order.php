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
            <select name="" id="day"></select>
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

$("#movie").on("change",function(){
    getDays($("#movie").val());
})


function getMovies(){
    let params={}
    location.href.split("?")[1].split("&").forEach(item => { params[item.split("=")[0]]=item.split("=")[1] })

    $.get("./api/get_movies.php",(movies)=>{
        $("#movie").html(movies)
        if(params.id){
            $(`#movie option[value="${params.id}"]`).attr("selected",true)
        }

        getDays($("#movie").val());

    })
}

function getDays(id){

    $.get("./api/get_days.php",{id},(days)=>{
        $("#day").html(days);
    })
}

</script>