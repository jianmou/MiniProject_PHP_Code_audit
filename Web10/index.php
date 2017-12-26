<?php
/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 10:36
 */
    $role = "guest";
    $flag = "flag{test_flag}";
    $auth = false;

    if(isset($_COOKIE["role"])){
        $role = unserialize(base64_decode($_COOKIE["role"]));
        // base64_decode 解码用MIME base64编码的数据
        // unserialize 从已存储的表示中创建 PHP 的值
        if($role === "admin"){
            $auth = true;
        }
        else{
            $auth = false;
        }
    }
    else{
        $role = base64_encode(serialize($role));
        setcookie('role',$role);
    }

    if($auth){
        var_dump($_POST['filename']);

        if(isset($_POST['filename'])){
            $filename = $_POST['filename'];
            $data = $_POST['data'];
            if(preg_match('[<>?]', $data)) {  //执行匹配正则表达式
                die('No No No!');
            }
            else {
                $s = implode($data);  //implode() 函数返回由数组元素组合成的字符串。
                if(!preg_match('[<>?]', $s)){
                    $flag="None.";
                }
                $rand = rand(1,10000000);
                $tmp="./uploads/".md5(time() + $rand).$filename;
                file_put_contents($tmp, $flag);  //将一个字符串写入文件
                echo "your file is in " . $tmp;
            }
        }
        else{
            echo "Hello admin, now you can upload something you are easy to forget.";
            echo "<br />there are the source.<br />";
            echo '<textarea rows="10" cols="100">';
            // htmlspecialchars 把预定义的字符 "<" （小于）和 ">" （大于）转换为 HTML 实体：
            echo htmlspecialchars(str_replace($flag,'flag{???}',file_get_contents(__FILE__)));
            //  file_get_contents() 函数把整个文件读入一个字符串中。
            echo '</textarea>';
        }
    }
    else{
        echo "Sorry. You have no permissions.";
    }
?>
