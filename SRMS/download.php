<?php
//获取传递过来的路径信息
$filename=$_GET['filename'];
//判断是否有值，没有则不执行下面的php语句
if($filename){
	header("Content-Disposition:attachment;filename=download_$filename");
	//Content-disposition 是 MIME 协议的扩展，MIME 协议指示 MIME 用户代理如何显示附加的文件。
	//格式：content-disposition = "Content-Disposition" ":" disposition-type *( ";" disposition-parm　
	//Content-Disposition为属性名
    //disposition-type是以什么方式下载，如attachment为以附件方式下载
     //disposition-parm为默认保存时的文件名 
	readfile($filename);
	exit;
}
?>