<?php
//初始化相关变量
$fileInfo=$_FILES["myfile"];
echo($fileInfo);
$maxSize=110485760;//10M,10*1024*1024
$allowExt=array('jpeg', 'jpg', 'peg', 'gif','doc','pdf','docx', 'zip', 'rar', 'txt');
$path="./files";
//引入前面封装了的上传函数fun_upload.php
include_once 'utils/fun_upload.php';
uploadFile($fileInfo, $path, $allowExt, $maxSize);