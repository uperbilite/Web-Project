<?php
        $host = "localhost";
        $uesr = "root";
        $password = "root";
        $db ="mydb";

        $uid = $_POST['telnumber'];
        $passwd = $_POST['passwd'];
        $username = $_POST['username'];
        $confirm = $_POST['confirm']; //获取确认密码文本框内容
        $address = $_POST['address'];
        $class = $_POST['class'];
        $select=$_POST['TorS'];


        if ($uid == '') {  //判断用户，密码两项输入值是否为空
            echo '<script>alert("请输入用户名!");history.go(-1);</script>'; //php内alert弹窗返回上一页面
            exit(0);
        }
        if ($passwd == '') {
            echo '<script>alert("请输入密码!");history.go(-1);</script>';
            exit(0);
        }
        if ($passwd != $confirm) { //判断密码和确认密码是否一致
            echo '<script>alert("密码不一致!");history.go(-1);</script>';
            exit(0);
        }

        if ($passwd == $confirm) {
            $mysqli = new mysqli($host,$uesr,$password,$db);  //实例化mysql对象
            if ($mysqli->connect_error) {
                die("数据库连接失败:" . $mysqli->connect_error);
                exit(0);
            }else {
                if($select=="0"){
                    $sq = "select uid from teachers where uid = $uid "; //查老师
                }else{
                    $sq = "select uid from students where uid = $uid "; //查询表里的用户名和密码是否与注册时输入的用户密码一样
                }
                //如果在表中 则注册失败


                $res = $mysqli->query($sq);
                $number = mysqli_num_rows($res);
                if ($number) {

                    echo '<script>alert("用户名已存在!");history.go(-1);</script>';

                } else {
                    if($select=="0"){
                        $sql = "insert into teachers(uid,username,password,class,address)values('$uid','$username','$passwd','$class','$address')";
                    }else{
                        $sql = "insert into students(uid,username,password,class,address)values('$uid','$username','$passwd','$class','$address')";
                    }
                    //插入匹配到的用户名，密码，确认密码的值
                    $result = $mysqli->query($sql);


                    if ($result) {
                        echo "<script>alert('注册成功!')</script>";
                        echo '<script>window.location="../signin.html"</script>';
                    } else {
                        echo "注册出错!";
                    }
                }
            }
        }

        mysqli_close($mysqli);  //关闭数据库连接


?>