<h3>預告片清單</h3>


<hr>
<h3>新增預告片海報</h3>
<form action="./api/add_trailer.php" method="post" enctype="multipart/form-data">

<table>
    <tr>
        <td>預告片海報: <input type="file" name="img" id=""></td>
        <td>預告片片名: <input type="text" name="name" id=""></td>
    </tr>
</table>
<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>

</form>