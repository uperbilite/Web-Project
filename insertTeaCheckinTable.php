<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>insert</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="4useri Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Alice' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easydropdown.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <link rel="stylesheet" href="css/swipebox.css">
    <!------ Light Box ------>
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!------ Eng Light Box ------>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!-- cookie -->
    <script type="text/javascript" src="js/cookie.js"></script>
    <!-- cookie -->
    <!--未登陆时显示登陆 登陆时显示用户-->
    <script type="text/javascript" src="js/loadCourse.js"></script>
</head>
<body>
<!-- header -->
<div class="banner">
    <div class="header">
        <div class="container">
            <div class="head-bann">
                <div class="logo">
                    <a href="index.html"><img src="images/logo2.png" class="img-responsive" alt="" /></a>
                </div>
                <div class="head-part">
                    <ul id="logAndReg">
                        <li><a href="signin.html">登录</a></li> /
                        <li><a href="register.html">注册</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul  id="userMsg">
                        <li><a href="teaSpace.html" id="curAccountTea"></a>
                            <a href="stuSpace.html" id="curAccountStu"></a>
                        </li>/
                        <li><a href="index.html" onclick="logout()">注销</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!-- start h_menu4 -->
            <div class="h_menu4">
                <a class="toggleMenu" href="">Menu</a>
                <ul class="nav">
                    <li class="active"><a href="index.html">主页</a></li>
                    <li><a href="course.html" class="root" >所有课程</a>
                        <ul class="drdw">
                            <li><a href="computer.html" >计算机</a></li>
                            <li><a href="foreign.html">外语</a></li>
                            <li><a href="science.html">理学</a></li>
                            <li><a href="engineering.html">工学</a></li>
                        </ul>
                    </li>
                    <li id="spaceToSignin"><a href="signin.html">个人空间</a></li>
                    <li id="spaceToTea"><a href="teaSpace.html">个人空间</a></li>
                    <li id="spaceToStu"><a href="stuSpace.html">个人空间</a></li>
                </ul>
                <script type="text/javascript" src="js/nav.js"></script>
            </div>
            <!-- end h_menu4 -->
        </div>
    </div>
</div>
<div class="banner-info1">
    <div class="banner-col">
    </div>
    <div class="container">

    </div>
</div>
<div class="products-section" align="center">
    <div class="container">
        <div class="portfolio foreign mix_all  wow bounceIn" data-wow-delay="0.4s" data-cat="foreign" style="display: inline-block; opacity: 1;">
            <div class="portfolio-wrapper grid_box">
                <a id="curCourse" class="swipebox" title="Image Title">
                    <span class="zoom-icon"></span> </a>
            </div>
        </div>
        <ul id="filters" class="clearfix">
            <li><a href="teaCourseware.php"><span>课件</span></a></li>
            <li><a href="teaWork.php"><span>作业</span></a></li>
            <li><a href="teaCheckinTable.php"><span>出勤</span></a></li>
        </ul>
    </div>
</div>
<!-- header -->
<h1 align="center" style="font-family: 楷体">新增签到记录</h1>
<div class="insert">
<form action="" method="post" name="inf" style="font-family: 楷体">
    <p align="center" style="margin: 10px">账号<input type="text" name="uid"></p>
    <p align="center" style="margin: 10px">姓名<input type="text" name="username"></p>
    <p align="center" style="margin: 10px">班级<input type="text" name="class"></p>
    <p align="center" style="margin:10px">时间<input type="text" name="time"></p>
    <p align="center" class="file-upload" style="margin: 10px"><input type="submit" name="insub" value="提交"></p>
</form>
</div>
<?php
$link = mysqli_connect('localhost', 'root', 'root', 'mydb');
if (!$link) {
    exit('数据库连接失败');
}
if (!empty($_POST["insub"])) {
    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $class = $_POST['class'];
    $course = $_COOKIE['curCourse'];
    $time = $_POST['time'];
    // 同一uid只能插入一次
    mysqli_query($link, "insert into checkin (uid,username,class,course,time) values ('$uid','$username','$class','$course','$time')");
    //header('location:teaCheckinTable.php');
}
?>
<!-- footer -->
<div class="footer">
    <div class="footer-bottom">
        <div class="footer-nav">
            <ul>
                <li><a href="index.html">主页</a></li> \
                <li><a href="course.html">所有课程</a></li> \
                <li><a href="Space.html">个人空间</a></li> \
                <div class="clearfix"> </div>
            </ul>
        </div>
        <p>Copyright &copy; 2022.Company name All rights reserved.
            <a target="_blank" href="#">
                我们的团队</a></p>
    </div>
</div>
</div>
<!-- footer -->
</body>
</html>