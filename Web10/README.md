**Writeup**

整体逻辑：文件上传的一点思路【web思路】


考点：
    
    这是当时高校安全运维赛的一道题目，一直没有时间来整理，前段时间刚好又看到了这个源代码，给大家提供一些CTF中的思路，源代码如下
    ![Alt text](../Base_Img/web10/1.png)

测试代码：

Writeup：
    
    梳理一遍逻辑： 
    默认role为guest，auth为false，如果获取不到cookie里面的role值就将guest的值序列化后在base64编码后放到cookie中并输出"Sorry. You have no permissions."，如果获取到cookie里面的值就将值反序列化后用base64解码如果为admin则开始获取post提交的filename参数和data参数的值，如果data参数中带有[<>?]就输出'No No No!'，如果输入的是一个数组，就是先拼接这个数组，然后匹配里面是否存在[<>?]，如果存在，就可以得到正确的flag了。
    ![Alt text](../Base_Img/web10/2.png)
    ![Alt text](../Base_Img/web10/3.png)
    ![Alt text](../Base_Img/web10/4.png)
    ![Alt text](../Base_Img/web10/5.png)
    这里主要关心的是逻辑，使用数组的时候既可以满足源代码的一切条件~ 刚开始没看到代码的时候还以为是file_put_content函数呢0.0.

参考链接：

    Pwnhub 第一次线下沙龙竞赛Web题解析：https://www.leavesongs.com/PENETRATION/pwnhub-first-shalon-ctf-web-writeup.html