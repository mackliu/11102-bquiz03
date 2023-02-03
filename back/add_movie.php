<h3 class="ct">新增院線片</h3>

<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
<div style="width:90%;margin:auto">
    <div style="display:flex">
        <div>影片資料</div>
        <div style="width:90%">
            <table>
                <tr>
                    <td>片名：</td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td>分級：</td>
                    <td>
                        <select name="level" id="">
                            <option value="1">普遍級</option>
                            <option value="2">輔導級</option>
                            <option value="3">保護級</option>
                            <option value="4">限制級</option>
                        </select>(請選擇分級)
                    </td>
                </tr>
                <tr>
                    <td>片長：</td>
                    <td><input type="number" name="length" id=""></td>
                </tr>
                <tr>
                    <td>上映日期：</td>
                    <td>
                        <select name="year" id="">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                        </select>年
                        <select name="month" id="">
                            <?php
                                for($i=1;$i<=12;$i++){
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>月
                        <select name="day" id="">
                        <?php
                                for($i=1;$i<=31;$i++){
                                    echo "<option value='$i'>$i</option>";
                                }
                            ?>
                        </select>日
                    </td>
                </tr>
                <tr>
                    <td>發行商：</td>
                    <td><input type="text" name="publish" id=""></td>
                </tr>
                <tr>
                    <td>導演：</td>
                    <td><input type="text" name="director" id=""></td>
                </tr>
                <tr>
                    <td>預告影片：</td>
                    <td><input type="file" name="trailer" id=""></td>
                </tr>
                <tr>
                    <td>電影海報：</td>
                    <td><input type="file" name="poster" id=""></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display:flex">
        <div>劇情簡介</div>
        <div style="width:90%">
            <textarea name="intro" id="" style="width:95%;height:3rem"></textarea>
        </div>
    </div>
    <div class='ct'>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</div>
</form>