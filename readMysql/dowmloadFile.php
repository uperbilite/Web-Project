<?php
include_once 'connection.php';

$courseName =  $_COOKIE['curCourse'];
$sql = "select courseWareName ,address from courseware where courseName ='$courseName' ";
$result = $mysqli->query($sql);

$data = $result->fetch_all();    //信息存入数组
echo  json_encode($data);