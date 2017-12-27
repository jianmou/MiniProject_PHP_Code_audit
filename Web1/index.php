<?php
/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 9:54
 */
    header("Content-Type: text/html;charset=utf-8");
    $page=$_GET['page'];
    if (isset($_GET['page'])){
        include("$page");  //include 语句包含并运行指定文件。
    }
    else{
        echo 'page!!!!';
    }

    /*flag在Y29uZmln.php中，请使用本地文件包含方式获得flag*/

?>
