<?php
    header("Content-type: text/html; charset=utf-8");
    session_start();
    if(isset($_SESSION['username'])){
        header("Location:index.php");
    }
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $host = "localhost"; //MySQL服务器地址
        $user = "root"; //用户名
        $pwd = "qwe123!@#"; // 密码
        $dbName = "insertsql"; //数据库名
        $connID = mysql_connect($host, $user,$pwd);
        mysql_select_db($dbName,$connID);
        if(strpos($username,"'") == FALSE && substr($username,0,1)!="'"){
            $sql = "select passwd from user where username='".$username."'";
            $ret = mysql_query($sql,$connID);
            $res = mysql_fetch_array($ret);
            if($res['passwd'] == $passwd){
                $_SESSION['username'] = $username;
                header("Location:index.php");
            }
            else{
                echo "帐号或密码错误";
            }
            mysql_close($connID);
        }
        else{
            echo "用户名不合法";
        }
    }
?>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <form action="login.php" method="post" name="info">
        帐号:<br>
        <input type="text" name="username">
        <br>
        密码:<br>
        <input type="password" name="passwd">
        <br><br>
        <input type="submit" value="登录">
    </form>
    <a href="regist.php">注册</a>
</html>
