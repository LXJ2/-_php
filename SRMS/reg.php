<?php
	include 'utils/function.php';
	if(empty($_POST['phone'])){
		return_json(1,'手机号不能为空');
	}
	if(empty($_POST['password'])){
		return_json(2,'密码不能为空');
	}
	$phone = find('author','*','phone='.$_POST['phone']);
	if($phone){
		return_json(3,'手机号已存在');
	}
	$arr = array(
		'name' => isset($_POST['name']) ? $_POST['name'] : $_POST['phone',
		'phone' => $_POST['phone'],
		'password' => sha1($_POST['password']),
        'level' => isset($_POST['level']) ? $_POST['level'] : '',
		'workplace' => isset($_POST['workplace']) ? $_POST['workplace'] : '',
		'education' => isset($_POST['education']) ? $_POST['education'] : '',
		'email' => isset($_POST['email']) ? $_POST['email'] : '',
		'direction' => isset($_POST['direction']) ? $_POST['direction'] : '',
		'creat_time' => time(),
		
	);
	$add = insert('author',$arr);
	return_json(200,'注册成功');
