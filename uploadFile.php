<?php

//$uploaddir = "web课设/courseware/";//设置文件保存目录 注意包含/
$uploaddir = "D:/project/web课设/courseware/";

//生成随机文件名函数
include_once "php/connection.php";
function random($length)
{
    $hash = 'CR-';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double)microtime() * 1000000);
    for($i = 0; $i < $length; $i++)
    {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}

//生成目标文件的文件名
    $name =null;
    $filename=explode(".",$_FILES['courseware']['name']);
    do{
        $filename[0]=random(10); //设置随机数长度
        $name=implode(".",$filename);
        $uploadfile = $uploaddir.$name;

    }
    while(file_exists($uploadfile));

    $tmp = $_FILES['courseware']['tmp_name'];


    if (move_uploaded_file($tmp,$uploadfile))     //uploadfile 为修改后路径
    {
        if(is_uploaded_file($_FILES['courseware']['tmp_name']))
        {
            echo "上传失败!";
        }
        else
        {
            //成功传入数据库
            $courseName =  $_COOKIE['curCourse'];
            $courseWareName = $_FILES['courseware']['name'];
            $sql = "insert into courseware(courseName,courseWareName,address)values('$courseName','$courseWareName','$name')";

            $result = $mysqli->query($sql);
            if ($result) {
                echo "<script>alert('上传成功!')</script>";
            } else {
                echo "上传失败!";
            }
        }
    }

if($_COOKIE['TorS']==0)
    echo '<script>window.location="teaCourseware.php"</script>';
else
    echo '<script>window.location="teaCourseware.php"</script>';
?>

