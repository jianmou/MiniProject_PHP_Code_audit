**Writeup**

整体逻辑：
    
    Get方式接受a参数，下面的两个条件理论上只能符合一个，但是由于用了==比较，导致可以用.绕过。

考点：
    
    接收参数$a存在，并且$a==0可用.绕过引发的思考
    因为.开头 php会把他当做字符串，字符串在弱类型转化的时候 以非数字开头的字符都转化为0，所以导致绕过。

测试代码：
    
    测试代码如下：
    ![Alt text](../Base_Img/web6/1.png)
    ![Alt text](../Base_Img/web6/2.png)
    ![Alt text](../Base_Img/web6/3.png)
    PS:这里只是用.举一个例子，其他非数字的也都可以绕过。
    但是如果把==换成===就不可以被绕过：
    ![Alt text](../Base_Img/web6/4.png)
    ![Alt text](../Base_Img/web6/5.png)

Writeup：
    
    根据上面的方式得到一个字符串：ZmxhZ3tUaGlTX2FfVnVsTkN0Rl9mbGFnfQ==
    base64解密后得到flag

参考链接：
    
    PHP弱类型带来的安全问题.pdf
