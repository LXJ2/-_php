<?php
    // header('Content-Type: text/html;charset=utf-8');
    // header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    // header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    // header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    // header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
	include 'utils/function.php';

	if(empty($_POST['phone'])){
		return_json(1,'请输入手机号');
	}
	if(empty($_POST['password'])){
		return_json(1,'请输入密码');
	}
	if($_POST['position'] == 1){
		$user = find('author','*','phone='.$_POST['phone']);
         $ary = array(
           'status' => 1,
	      );
        update('author',$ary,'phone='.$_POST['phone']);
	}else if ($_POST['position'] ==2){
		$user = find('editor','*','phone='.$_POST['phone']);
        $ary = array(
           'status' => 1,
	      );
        update('editor',$ary,'phone='.$_POST['phone']);
	} else {
		$user = find('administrator','*','phone='.$_POST['phone']);
		$ary = array(
           'status' => 1,
	      );
        update('administrator',$ary,'phone='.$_POST['phone']);
	}
	
	if(empty($user)){
		return_json($_POST['position'],'该用户不存在，请注册');
	}
	if($user['password'] != sha1($_POST['password'])){
		return_json(1,'密码错误');
	}

	return_json(200,$user);