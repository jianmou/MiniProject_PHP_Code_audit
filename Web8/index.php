<?php
/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 10:22
 */

    $filename = 'flag08395e0fda9cae71.txt';
    $flag = 'flag08395e0fda9cae71.txt';

    extract($_GET);  //extract() 函数从数组中将变量导入到当前的符号表。该函数使用数组键名作为变量名，使用数组键值作为变量值。

    if (isset($attempt)){
        $combination = trim(file_get_contents($filename));  //trim() 函数移除字符串两侧的空白字符或其他预定义字符。/
        var_dump($filename);
        var_dump($combination);

        if ($attempt===$combination){
            echo "<p>How did you know the secret combinnation was" . "$combination !?</p>";
            $next = file_get_contents($flag);
            echo $next;
        }else {
            echo "Incorrect! The secret combiantion is not $attempt";
        }
    }
?>