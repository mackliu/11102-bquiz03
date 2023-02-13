function sw(table,id1,id2){

    $.post("./api/sw.php",{table,id1,id2},()=>{
        location.reload();
    })

}


function del(table,id,msg){

    let chk;

    if(typeof(msg)!='undefined'){
        chk=confirm(msg);
    }else{
        chk=confirm("是否確定要刪除?");
    }


    if(chk){
        $.post('./api/del.php',{table,id},()=>{
            location.reload();
        })
    }
}

function  showMovie(id){

    $.post("./api/show_movie.php",{id},()=>{
        location.reload();
    })
}