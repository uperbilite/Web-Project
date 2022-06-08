<!DOCTYPE html>
<html>
<head>
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
            <li id="checkin"><a><span>签到</span></a></li>
            <script>
                let xmlHttp = new XMLHttpRequest();
                document.getElementById("checkin").addEventListener("click", listener);
                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                        let response = xmlHttp.responseText;
                        if (response == 1) {
                            alert("签到成功");
                        }
                        else {
                            alert("签到失败");
                        }
                    }
                }
                function listener() {
                    let url = "php/checkin.php";
                    let param = "uid=" + getCookie("telnumber") + "&course=" + getCookie("curCourse");
                    xmlHttp.open("POST", url, true);
                    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xmlHttp.send(param);
                }
            </script>
            <li><a href="stuCourseware.php"><span>课件</span></a></li>
            <li><a href="stuWork.php"><span>作业</span></a></li>
            <li><a href="stuCheckinTable.php"><span>出勤</span></a></li>
        </ul>
    </div>
</div>
<!-- header -->
<h1 align="center">签到记录</h1>
<form action="" method="post" name="index">
    <div align="center" class="download-table">
    <table align="center" border="1" height="25" width="600px">
        <tr>
            <td width="180px">签到时间</td>
        </tr>
        <?php
        $uid = $_COOKIE['telnumber'];
        $course = $_COOKIE['curCourse'];
        $link = mysqli_connect('localhost', 'root', 'root', 'mydb');
        if (!$link) {
            exit ('数据库连接失败');
        }
        $res = mysqli_query($link, "select time from checkin where uid = $uid and course = $course  order by time");
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr align="center">';
            echo "<td>$row[0]</td>";
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
                <li><a href="stuSpace.html">个人空间</a></li> \
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
