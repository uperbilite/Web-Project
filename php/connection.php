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