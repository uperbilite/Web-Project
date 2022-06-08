<?php

$host = "localhost";
$uesr = "root";
$password = "root";
$db = "mydb";



// 创建连接
$conn = new mysqli($host, $uesr, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE mydb";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . $conn->error;
}
