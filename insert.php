<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1 align="center">新增学生记录</h1>
<form action="" method="post" name="inf">
    <p align="center">用户名<input type="text" name="uid"></p>
    <p align="center">姓名<input type="text" name="username"></p>
    <p align="center">密码<input type="text" name="password"></p>
    <p align="center">班级<input type="text" name="class"></p>
    <p align="center">地址<input type="text" name="address"></p>
    <p align="center">课程<input type="text" name="courses"></p>
    <p align="center"><input type="submit" name="insub" value="提交"></p>
</form>
<?php
$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
if (!$link) {
    exit('数据库连接失败');
}
if (!empty($_POST["insub"])) {
    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $class = $_POST['class'];
    $address = $_POST['address'];
    $courses = $_POST['courses'];
    mysqli_query($link, "insert into students (uid,username,password,class,address,courses) values ('$uid','$username','$password','$class','$address','$courses')");
    header('location:database.php');
}
?>
</body>
</html>