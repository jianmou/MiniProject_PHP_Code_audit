**Writeup**

整体逻辑：
    
    初始变量被赋值为string，所以打开就是输出"is_numeric(a) and is_numeric(b) error ！"，根据题目同时出现is_numeric()和and判断，引用暗羽表姐的博客截图来绕过第二个is_numeric() 判断，绕过 。

考点：
    
    只是知道这是绕过的一种方式，但是为什么会出现这种情况呢，本来以为只要第一个判断为真就不会判断后面的条件正确还是不正确 ，以为问题出现在is_numeric，但是问题好像出现在and上面，根据PHP的优先级来看 赋值运算= 优先级大于 and 。
    举一个例子：
    ![Alt text](../Base_Img/web4/.png)
    算是PHP的一种特性吧：
    ![Alt text](../Base_Img/web4/5.png)

测试代码：
    
    <?php 
    $test = true and false;
    var_dump($test);
    
    $test2 = true && false;
    var_dump($test2);
    ?>
    
Writeup：
    
    初始变量被赋值为string，所以打开就是输出"is_numeric(a) and is_numeric(b) error ！"，根据题目同时出现is_numeric()和and判断（图一）
    ![Alt text](../Base_Img/web4/1.png)
    由于使用了and，出现了PHP解析优先级的问题，绕过。
    ![Alt text](../Base_Img/web4/2.png)
    ![Alt text](../Base_Img/web4/3.png)

参考链接：

    由PHP小tip引发的思考（PHP优先级）：https://www.t00ls.net/viewthread.php?from=notice&tid=42223
    CTF 之 PHP 黑魔法总结 ：http://www.zjicmisa.org/index.php/archives/112/
    运算符优先级：http://php.net/manual/zh/language.operators.precedence.php