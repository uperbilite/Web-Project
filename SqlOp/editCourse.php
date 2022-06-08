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
//$sql="UPDATE students SET  courses = '3,4,5,6' WHERE  uid = '13860156600'";
$sql="DELETE FROM checkin WHERE uid='14322'";
$result = $mysqli->query($sql);