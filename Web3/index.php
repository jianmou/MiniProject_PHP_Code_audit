<?php
/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 10:01
 */

	$flag = 'flag{VulN_This_is_A_flag}';
	if (isset($_GET['username']) and isset($_GET['password']))
    {
        if ($_GET['username'] == $_GET['password']){
            echo '<p>You password can not be your username !</p>';
        }
        else if (sha1($_GET['username']) === sha1($_GET['password'])){  //计算字符串的 sha1 散列值
            die('Flag:'.$flag);
        }
        else{
            echo '<p>Invalid password</p>';
        }
    }
    else{
        echo '<p>Login first</p>';
    }
?>



