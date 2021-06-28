<?php
    function files($file,$ext,$allowEXT,$maxfile,$size){
            //判断错误号
            if($file > 0){
                switch ($file){
                    case 1: $msg=  "上传文件超过了php 配置文件中 upload_max_filesize 的值";break;
                    case 2: $msg=  "上传文件超过max_file_size 大小";break;
                    case 3: $msg=  "文件部分被上传";break;
                    case 4: $msg=  "没有选择上传文件";break;
                    case 6: $msg=  "没有找到临时目录";break;
                    case 7: 
                    case 8: $msg=  "系统错误";break;
                }
                exit($msg);
            }
            //检测文件上传的类型
            if(!in_array($ext, $allowEXT)){
                exit('非法文件类型');
            }

            //检测上传文件的大小
            if($fileinfo['size']>$maxfile){
                exit('文件过大');
            }

            //检测是否是http post方式提交的
            if(!is_uploaded_file($fileinfo['$tmp_name'])){
                exit("文件不是以POST方式提交");
            }
            
    }
?>