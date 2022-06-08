<?php
$host = "localhost";
$uesr = "root";
$password = "root";
$db = "mydb";

$mysqli = new mysqli($host, $uesr, $password, $db);  //实例化mysql对象
if ($mysqli->connect_error) {
    die("数据库连接失败:" . $mysqli->connect_error);
    exit(0);
}

$curUid = $_COOKIE['telnumber'];
$select=$_COOKIE['TorS'];
//$sql = "select * from students where uid ='$curUid'";  //查询表里的用户名和密码是否与注册时输入的用户密码一样
if($select=="0"){
    $sql = "select * from teachers where uid ='$curUid'";
}
else {
    $sql = "select * from students where uid ='$curUid'";
}
$result = $mysqli->query($sql);

$data = $result->fetch_all();    //信息存入数组

echo  json_encode( $data[0][5]);
//foreach ($data as $i){
//
//    echo $i[0] ." " . $i[1] ." ".$i[4] ."<br>";
//}