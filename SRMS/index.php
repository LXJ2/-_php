<?php
    header("Content-type: text/html; charset=utf-8");
    require_once("addFile.php"); 
    $fileinfo = $_FILES['myfile'];
    $allowEXT = array('jpg','png','jpeg','gif');//文件格式
    $maxfile = 2097152; //2M   //文件多大
    $ext = pathinfo($fileinfo['name'],PATHINFO_EXTENSION);//获取文件类型
    $file = $fileinfo['error']; //存放错误信息
    echo $file;
    $size = $fileinfo['size'];
    files($file,$ext,$allowEXT,$maxfile,$size);
?>
