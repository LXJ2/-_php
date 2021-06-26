<?php
header('content-type:text/html;charset=utf-8');
//初始化相关变量
$fileInfo=$_FILES["myFile"];
$maxSize=10485760;//10M,10*1024*1024
$allowExt=array('jpeg','jpg','png','tif');
$path="uploads";
//引入前面封装了的上传函数fun_upload.php
include_once 'fun_upload.php';
uploadFile($fileInfo, $path, $allowExt, $maxSize);