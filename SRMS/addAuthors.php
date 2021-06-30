<?php
include 'utils/function.php';

$arr = array(
		'name' => isset($_POST['name']) ? $_POST['name'] : '',
		'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
		'password' => isset($_POST['password']) ? sha1($_POST['password']) : '',
        'level' => isset($_POST['level']) ? $_POST['level'] : '',
		'workplace' => isset($_POST['workplace']) ? $_POST['workplace'] : '',
		'education' => isset($_POST['education']) ? $_POST['education'] : '',
		'email' => isset($_POST['email']) ? $_POST['email'] : '',
		'direction' => isset($_POST['direction']) ? $_POST['direction'] : '',
		'create_time' => time(),
		
	);
	$add = insert('author',$arr);
	if($add){
		return_json(200,'添加成功！');
	}else{
		return_json(1,'添加失败');
	}