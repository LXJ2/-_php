<?php
include 'utils/function.php';	
//初始化相关变量
if($_FILES["myfile"]){
$fileInfo=$_FILES["myfile"];
$filename=$fileInfo["name"];
//print_r($tmp_name);
$maxSize=110485760;//10M,10*1024*1024
$allowExt=array('jpeg', 'jpg', 'peg', 'gif','doc','pdf','docx', 'zip', 'rar', 'txt','wps');
$path="./files";
$fileInfo = uploadFile($fileInfo, $path, $allowExt, $maxSize);

$adre = 'http://www.srms.cn:90'.substr($fileInfo[1], 1);
$arr = array(
	'file_id' => isset($_POST['file_id']) ? $_POST['file_id'] : '',
 	'name' => $filename,
 	'author_num' => isset($_POST['author_num']) ? $_POST['author_num'] : '',
 	'author_main' => isset($_POST['author_main']) ? $_POST['specialty_num'] : '',
 	'specialty_num' => isset($_POST['specialty_num']) ? $_POST['specialty_num'] : '',
 	'keywords' => isset($_POST['keywords']) ? $_POST['keywords'] : '',
 	'ch_abstract' => isset($_POST['ch_abstract']) ? $_POST['ch_abstract'] : '',
 	'en_abstract' => isset($_POST['en_abstract']) ? $_POST['en_abstract'] : '',
 	'fund_project' => isset($_POST['fund_project']) ? $_POST['fund_project'] : '',
 	'create_time' => time(),
 	'file_address' => $adre,
 	'status' => 0,
 	'pass_num' => 0,
 );
//echo $arr;
  $add = insert('file',$arr);
  if($add){
  	$token = $arr['create_time'];
  	$resp = array(
  		'tip' => $fileInfo[0],
  		'token' => $token,
  	);
  	return_json(200,$resp);
  } else{
     return_json(1,$add);
  }
  //echo $adre;
  
}

if($_POST['create_time']){
	$filename = $_POST['name'];
	$file = find('file','*','create_time='.$_POST['create_time']);
	$num = $_POST['specialty_num'].$_POST['create_time'].$file['id'];
	$arr = array(
	'file_id' => $num,
 	'name' => isset($_POST['name']) ? $_POST['name'] : $file['name'],
 	'author_num' => isset($_POST['author_num']) ? $_POST['author_num'] : $file['author_num'],
 	'author_main' => isset($_POST['author_main']) ? $_POST['specialty_num'] : $file['specialty_num'],
 	'specialty_num' => isset($_POST['specialty_num']) ? $_POST['specialty_num'] : $file['specialty_num'],
 	'keywords' => isset($_POST['keywords']) ? $_POST['keywords'] : $file['keywords'],
 	'ch_abstract' => isset($_POST['ch_abstract']) ? $_POST['ch_abstract'] : $file['ch_abstract'],
 	'en_abstract' => isset($_POST['en_abstract']) ? $_POST['en_abstract'] : $file['en_abstract'],
 	'fund_project' => isset($_POST['fund_project']) ? $_POST['fund_project'] : $file['fund_project'],
 );
	$up = update('file',$arr,'create_time='.$_POST['create_time']);
	$fileData = find('file','*','create_time='.$_POST['create_time']);
	if($up){
		return_json(200, $fileData);
	}else {
		return_json(1,'提交失败');
	}
	
}

 //echo $add;
 //echo $filepath;
 //echo json_encode($a);
 

