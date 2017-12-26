<?php
    header("Content-type: text/html; charset=utf-8");
    session_start();
    if(isset($_SESSION['username'])){
        $host = "localhost"; //MySQL服务器地址
        $user = "root"; //用户名
        $pwd = "qwe123!@#"; // 密码
        $dbName = "insertsql"; //数据库名
        $connID = mysql_connect($host, $user,$pwd);
        mysql_select_db($dbName,$connID);
        $sql = "select tel,note from user where username='".$_SESSION['username']."'";
        $ret = mysql_query($sql,$connID);
        $res = mysql_fetch_array($ret);
        echo "电话：".$res['tel']."</br>描述：".$res['note']."</br>";
    }
    else{
        header("Location:login.php");
    }
?>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <a href="logout.php">注销</a>
</html>
