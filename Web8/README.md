**Writeup**

整体逻辑：
    
    GET方式获得的变量导入到当前的符号表中. 然后判断$attempt与$从$filename处理后得到的变量，两个变量的内容是否相等，如果相等输出flag。

考点：extract变量覆盖
    
    变量覆盖指的是用我们自定义的参数值替换程序原有的变量值。经常引发变量覆盖漏洞的函数有：extract(),parse_str()和import_request_variables()。

测试代码：
    
    $test = 1;
    var_dump($test);
    
    $b = array('test' => 'hahahaha');
    extract($b);
    var_dump($test);
    
    结果如下：
    ![Alt text](../Base_Img/web8/1.png)

Writeup：
    
    源代码【下图】： 
    ![Alt text](../Base_Img/web8/2.png)
    在第五行, 运用了extract()函数, 将GET方式获得的变量导入到当前的符号表中. 然后判断$attempt与$从$filename处理后得到的变量，两个变量的内容是否相等. $combination变量储存的是flag.txt的内容. 但是我们并不能查看test.txt, 所以并不知道该怎么去设置$attempt的值. 但是, 由于extract()函数的不足之处, 导致这段代码存在一个变量覆盖漏洞. 只要我们这样构造url【图二】 
    ![Alt text](../Base_Img/web8/3.png)
    那么, 我们可以发现, $attempt变量和$combination变量的内容都会被设置成空字符串. 这样, $attempt===$combination的判断就成立了, 我们就能成功地拿到flag.txt的内容.
    
参考链接：
    
    PHP extract() 函数：http://www.w3school.com.cn/php/func_array_extract.asp
    extract()函数导致的变量覆盖漏洞：http://blog.sina.com.cn/s/blog_15db60e8e0102wndj.html
    
    