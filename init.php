<?php 


include_once "./api/base.php";

for($i=1;$i<10;$i++){
    $data=[];
    $data['name']="預告片".$i;
    $data['img']="03A0".$i.".jpg";
    $data['sh']=1;
    $data['rank']=$i;
    $data['ani']=rand(1,3);
    $Trailer->save($data);
}

$date=['2023-02-01','2023-02-02','2023-02-03','2023-02-04','2023-02-05'];

for($i=1;$i<10;$i++){
    $data=[];
    $data['name']="院線片".$i;
    $data['length']=rand(90,120);
    $data['level']=rand(1,4);
    $data['ondate']=$date[rand(0,4)];
    $data['publish']="發行商".$i;
    $data['director']="導演".$i;
    $data['intro']="院線片 $i 劇情介紹,院線片 $i 劇情介紹,院線片 $i 劇情介紹,院線片 $i 劇情介紹,院線片 $i 劇情介紹";
    $data['trailer']="03B0".$i."v.mp4";
    $data['poster']="03B0".$i.".png";
    $data['sh']=1;
    $data['rank']=$i;
    $Movie->save($data);
}
