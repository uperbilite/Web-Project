<!DOCTYPE html>
<html>
<head>
    <title>AttendanceQuery</title>
    <meta charset="UTF-8">
</head>
<body>
<h1 align="center">学生信息</h1>
<form action="" method="post" name="index">
    <p align="center"><input type="button" value="新增" name="input" onclick="location.href='insert.php'"></p>
    <p align="center"><input type="text" name="sel"><input type="submit" value="搜索" name="selsub"></p>
    <div align="center">
    <table border="1" height="25" width="600">
        <tr>
            <th width="180px">用户名</th>
            <th width="180px">姓名</th>
            <th width="180px">密码</th>
            <th width="180px">班级</th>
            <th width="180px">地址</th>
            <th width="180px">课程</th>
            <th width="100px">操作</th>
        </tr>
        <?php
        $link = mysqli_connect('localhost', 'root', 'root', 'mydb');
        if (!$link) {
            exit ('数据库连接失败');
        }
        if (empty($_POST["selsub"])) {
            $res = mysqli_query($link, "select * from students order by uid");
        } else {
            $sel = $_POST["sel"];
            $res = mysqli_query($link, "select * from students where uid like '%$sel%' or username like '%$sel%' or password like '%$sel%' or class like '%$sel%' or address like '%$sel%';");
        }
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr align="center">';
            echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>
                  <td>
                  <input type='submit' name='upsub$row[0]' value='修改' />
                  <input type='submit' name='delsub$row[0]' value='删除' />
                  </td>";
            echo '</tr>';
            if (!empty($_POST["upsub$row[0]"])) {
                echo '<tr align="center">';
                echo "<td><input type='text' name='uid' value='$row[0]'></td>
                      <td><input type='text' name='username' value='$row[1]'></td>
                      <td><input type='text' name='password' value='$row[2]'></td>
                      <td><input type='text' name='class' value='$row[3]'></td>
                      <td><input type='text' name='address' value='$row[4]'></td>
                      <td><input type='text' name='courses' value='$row[5]'></td>
                      <td><input type='submit' value='确认修改' name='upsubs$row[0]'></td>";
                echo '</tr>';
            }
            if (!empty($_POST["upsubs$row[0]"])) {
                $uid = $_POST['uid'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $class = $_POST['class'];
                $address = $_POST['address'];
                $courses = $_POST['courses'];
                mysqli_query($link, "UPDATE students SET uid='$uid',username='$username',password='$password',class='$class',address='$address',courses='$courses' WHERE uid=$row[0];");
                header('location:#');
            }
            if (!empty($_POST["delsub$row[0]"])) {
                mysqli_query($link, "delete from students where uid=$row[0]");
                header('location:#');
            }
        }
        ?>
    </table>
    </div>
</form>
</body>
</html>
