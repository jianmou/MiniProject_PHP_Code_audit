<?php
/**
 * Created by PhpStorm.
 * User: ZTS
 * Date: 2017/12/15
 * Time: 10:33
 */

    header("Content-type: text/html; charset=utf-8");
    //上传解压路径
    $uploadpath = "/tmp/";
    //判断文件类型
    if(isset($_FILES["file"]["name"])) {
        $fType = strtolower(substr($_FILES["file"]["name"], strlen($_FILES["file"]["name"]) - 3));
        $textType = $fType;
        if ($textType != "txt") {
            echo '不正确的文件类型,只支持txt格式文件';
        } else {
            echo '上传成功' . $textType . '文件。';
            // 如果是zip格式的，放到$uploadpath里面
            if ($textType == "txt") {
                move_uploaded_file($_FILES["file"]["tmp_name"], $uploadpath . $_FILES["file"]["name"]);
                //move_uploaded_file() 函数将上传的文件移动到新位置。若成功，则返回 true，否则返回 false。
                $content = exec('tail -n 1 '. $uploadpath . $_FILES["file"]["name"]);
                echo '文本最后一行内容为：'.$content;
            }
        }
    }
    ?>

<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file" />
    <br />
    <input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>
