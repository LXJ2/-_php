<?php
    // header('Content-Type: text/html;charset=utf-8');
    // header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    // header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    // header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    // header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
	include 'function.php';

	if(empty($_POST['phone'])){
		return_json(1,'请输入手机号');
	}
	if(empty($_POST['password'])){
		return_json(1,'请输入密码');
	}
	if($_POST['position']){
		$user = find('author','*','status=1 AND phone='.$_POST['phone']);
	}else{
		$user = find('editor','*','status=1 AND phone='.$_POST['phone']);
	}
	
	if(empty($user)){
		return_json(1,'该用户不存在，请注册');
	}
	if($user['password'] != sha1($_POST['password'])){
		return_json(1,'密码错误');
	}
	return_json(200,$user);