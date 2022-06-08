<?php
$host = "localhost";
$uesr = "root";
$password = "root";
$db = "mydb";

$uid = $_POST["uid"];
$course = $_POST["course"];
$time = date("Y/m/d H:i:s",time());

$mysqli = new mysqli($host, $uesr, $password, $db);
if ($mysqli->connect_error) {
    die("数据库连接失败:" . $mysqli->connect_error);
    exit(0);
}
else {
    $username = $mysqli->query("select username from students where uid = '$uid'");
    $row = $username->fetch_assoc();
    $username = $row["username"];
    $class = $mysqli->query("select class from students where uid = '$uid'");
    $row = $class->fetch_assoc();
    $class = $row["class"];
    $res = $mysqli->query("insert into checkin (uid,username,class,course,time) values ('$uid','$username','$class','$course','$time')");
    if ($res) {
        echo '1';
    }
    else {
        echo '-1';
    }
}
$mysqli->close();
?>