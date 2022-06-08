<!DOCTYPE html>
<html>
<head>
    <title>AttendanceQuery</title>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="4useri Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Alice' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                <li><a href="database.php"><span>出勤</span></a></li>
            </ul>
        </div>
    </div>
    <!-- header -->
</head>
<body>
<h1 align="center" style="font-family: 楷体;">签到记录</h1>

<form action="" method="post" name="index">
    <p align="center" class="addNew">
        <input type="button" value="新增" name="input" onclick="location.href='insertTeaCheckinTable.php'">
    </p>

    <div class="bar3">
        <div>
            <p align="center">
                <input type="text" name="sel"  placeholder="请输入您要搜索的内容...">
                <button type="submit" value="搜索" name="selsub"></button>
            </p>
        </div>
    </div>

    <div align="center" class="download-table">
    <table id="showCourseware" border="1" height="25" width="800px">
        <tr align="center">
            <td width="180px">用户名</td>
            <td width="180px">姓名</td>
            <td width="150px">班级</td>
            <td idth="180px">签到时间</td>
        </tr>
        <?php
        $course = $_COOKIE['curCourse'];
        $link = mysqli_connect('localhost', 'root', 'root', 'mydb');
        if (!$link) {
            exit ('数据库连接失败');
        }
        if (empty($_POST["selsub"])) { // 不搜索默认显示所有记录
            $res = mysqli_query($link, "select uid,username,class,time from checkin where course = $course order by time");
        } else {
            $sel = $_POST["sel"]; // 模糊搜索，只要有关键词匹配即选中，关键词为用户名、姓名和班级
            $res = mysqli_query($link, "select uid,username,class,time from checkin where (uid like '%$sel%' or username like '%$sel%' or class like '%$sel%') and course = $course;");
        }
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr align="center">';
            echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>";
            echo '</tr>';
        }
        ?>
    </table>
    </div>
</form>
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
