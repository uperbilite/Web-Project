<?php
    $host = "localhost";
    $uesr = "root";
    $password = "root";
    $db ="mydb";
    $uid = $_POST['telnumber'];
    $passwd = $_POST['passwd'];

    //$selectTeacher = $_POST['t'];
    //$selectStudents = $_POST['s'];
    $select=$_POST['TorS'];
    $mysqli = new mysqli($host,$uesr,$password,$db);  //实例化mysql对象
    if ($mysqli->connect_error) {
        die("数据库连接失败:" . $mysqli->connect_error);
        exit(0);
    } else {
        if ($uid == '') {  //用户名不能为空
            echo '<script>alert("请输入用户名");history.go(-1);</script>';
            exit(0);
        }
        if ($passwd== '') { //密码不能为空
            echo '<script>alert("请输入密码");history.go(-1);</script>';
        }
        if ($select== '') { //教师或学生不能为空
            echo '<script>alert("请选择教师或学生");history.go(-1);</script>';
        }
    }
    if($select=="0"){
        $sql = "select uid,password from teachers where uid = '$uid' and password = '$passwd'";  //查询表里的用户名和密码是否与注册时输入的用户密码一样
    }else{
        $sql = "select uid,password from students where uid = '$uid' and password = '$passwd'";  //查询表里的用户名和密码是否与注册时输入的用户密码一样
    }


    $result = $mysqli->query($sql);
    $number = mysqli_num_rows($result);
    if ($number) {
        setcookie('telnumber',$uid);
        setcookie('TorS',$select);
        echo '<script>
                alert("登入成功");
                history.go(-1);
            </script>';
        echo '<script>window.location="index.html"</script>';
        //进入新页面
    } else {
        echo '<script type="text/javascript" src="js/cookie.js"></script>';
        echo '<script>
                alert("用户名或密码错误!");
                history.go(-1);
                logout();
              </script>';
    }
?>