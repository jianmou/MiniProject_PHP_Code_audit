<?php
/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 9:59
 */

    $password=$_GET['password'];

    var_dump($password);
    var_dump(strcmp('cab56ab0de5376d2a0c73307ea011da4',$password));

    if(strcmp('cab56ab0de5376d2a0c73307ea011da4',$password)){  //二进制安全字符串比较
        echo 'password is false ! ! ! ! !';
    }else{
        echo 'flag is here!!<br>';
        echo 'flag{vUlnCtF_This_iS_a_FlAg}';
    }

?>


