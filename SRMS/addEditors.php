<?php
include 'utils/function.php';
$arr = array(
		'name' => isset($_POST['name']) ? $_POST['name'] : '',
		'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
        'level' => isset($_POST['level']) ? $_POST['level'] : '',
		'education' => isset($_POST['education']) ? $_POST['education'] : '',
		'workplace' => isset($_POST['workplace']) ? $_POST['workplace'] : '',
		'email' => isset($_POST['email']) ? $_POST['email'] : '',
		'direction' => isset($_POST['direction']) ? $_POST['direction'] : '',
        'password' => isset($_POST['password']) ? sha1($_POST['password']) : '',
        'social_position' => isset($_POST['social_position']) ? $_POST['social_position'] : '',
        'bank_card' => isset($_POST['bank_card']) ? $_POST['bank_card'] : '',
		'create_time' => time(),
);
	$add = insert('editor',$arr);
	//var_dump($add);
	if($add){
		return_json(200,'添加成功！');
	}else{
		return_json(1,'添加失败');
	}
	