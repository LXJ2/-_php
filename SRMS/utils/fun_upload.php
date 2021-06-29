<?php
//定义一个uploadFile函数
function uploadFile($fileInfo,$path,$allowExt,$maxSize){
//取出$_FILES中的数据
$filename=$fileInfo["name"];
$tmp_name=$fileInfo["tmp_name"];
$size=$fileInfo["size"];
$error=$fileInfo["error"];
$type=$fileInfo["type"];
//取出文件路径中文件的类型的部分
$ext=pathinfo($filename,PATHINFO_EXTENSION);
//确定是否存在存放图片的文件夹，没有则新建一个
if (!file_exists($path)) {  //当目录不存在，就创建目录
  mkdir($path,0777,true);//创建目录
  chmod($path, 0777);//改变文件模式,所有人都有执行权限、写权限、度权限
}
//得到唯一的文件名！防止因为文件名相同而产生覆盖
$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;

//目标存放文件地址
$destination=$path."/".$uniName;
echo $destination;
//当文件上传成功，存入临时文件夹，服务器端开始判断
if ($error==0) {
  if ($size>$maxSize) {
    exit("上传文件过大！");
  }
  if (!in_array($ext, $allowExt)) {
    exit("非法文件类型");
  }
  if (!is_uploaded_file($tmp_name)) {
    exit("上传方式有误，请使用post方式");
  }
  //判断是否为真实图片（防止伪装成图片的病毒一类的
  // if (!getimagesize($tmp_name)) {//getimagesize真实返回数组，否则返回false
  //   exit("不是真正的图片类型");
  // }

  if (@move_uploaded_file($tmp_name, $destination)) {//@错误抑制符，不让用户看到警告
    echo "文件".$filename."上传成功!";
  }else{
    echo "文件".$filename."上传失败!";
  }
}else{
  switch ($error){
    case 1:
      echo "超过了上传文件的最大值，请上传20M以下文件";
      break;
    case 2:
      echo "上传文件过多，请一次上传20个及以下文件！";
      break;
    case 3:
      echo "文件并未完全上传，请再次尝试！";
      break;
    case 4:
      echo "未选择上传文件！";
      break;
    case 7:
      echo "没有临时文件夹";
      break;
  }
}
  return $destination;
}

// *
//  * @param $filePath //下载文件的路径
//  * @param int $readBuffer //分段下载 每次下载的字节数 默认1024bytes
//  * @param array $allowExt //允许下载的文件类型
//  * @return void
 
// function downloadFile($filePath, $readBuffer = 1024, $allowExt = ['jpeg', 'jpg', 'peg', 'gif', 'zip', 'rar', 'txt'])
// {
    //检测下载文件是否存在 并且可读
    // if (!is_file($filePath) && !is_readable($filePath)) {is
    //     return false;
    // }
    // //检测文件类型是否允许下载
    // $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    // if (!in_array($ext, $allowExt)) {
    //     return false;
    // }
    // //设置头信息
    // //声明浏览器输出的是字节流
    // header('Content-Type: application/octet-stream');
    // //声明
    // header('Accept-Ranges:bytes');浏览器返回大小是按字节进行计算
    // //告诉浏览器文件的总大小
    // $fileSize = filesize($filePath);//坑 filesize 如果超过2G 低版本php会返回负数
    // header('Content-Length:' . $fileSize); //注意是'Content-Length:' 非Accept-Length
    // //声明下载文件的名称
    // header('Content-Disposition:attachment;filename=' . basename($filePath));//声明作为附件处理和下载后文件的名称
    // //获取文件内容
    // $handle = fopen($filePath, 'rb');//二进制文件用‘rb’模式读取
    // while (!feof($handle) ) { //循环到文件末尾 规定每次读取（向浏览器输出为$readBuffer设置的字节数）
    //     echo fread($handle, $readBuffer);
    // }
    // fclose($handle);//关闭文件句柄
    // exit;
    // }