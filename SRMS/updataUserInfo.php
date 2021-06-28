<?php
include 'utils/function.php';
$author = array();
if($_POST['position'] == 1){
	if($_POST['name']){
		$name = array('name' => isset($_POST['name']) ? $_POST['name'] : $_POST['phone'],);
		array_push($author, $name);
	}
}
if($_POST['position'] == 1){
		$user = find('author','*','create_time='.$_POST['create_time']);
		$author = array(
		'name' => isset($_POST['name']) && (!empty($_POST['name'])) ? $_POST['name'] : $user['name'],
		'phone' => isset($_POST['phone']) && (!empty($_POST['phone']))? ($_POST['phone']) : $user['phone'],
        'level' => isset($_POST['level']) && (!empty($_POST['level'])) ? $_POST['level'] : $user['level'],
		'workplace' => isset($_POST['workplace']) && (!empty($_POST['workplace'])) ? $_POST['workplace'] : $user['workplace'],
		'education' => isset($_POST['education']) && (!empty($_POST['education'])) ? $_POST['education'] : $user['education'],
		'email' => isset($_POST['email']) && (!empty($_POST['email'])) ? $_POST['email'] : $user['email'],
		'direction' => isset($_POST['direction']) && (!empty($_POST['direction'])) ? $_POST['direction'] : $user['direction'],
	);
        update('author',$author,'create_time='.$_POST['create_time']);
        $user = find('author','*','create_time='.$_POST['create_time']);
	}else if($_POST['position'] ==2){
		$user = find('editor','*','create_time='.$_POST['create_time']);
        $editor = array(
        'name' => isset($_POST['name'])&& (!empty($_POST['name'])) ? $_POST['name'] : $user['name'],
		'phone' => isset($_POST['phone'])&& (!empty($_POST['phone'])) ? ($_POST['phone']) : $user['phone'],
        'level' => isset($_POST['level'])&& (!empty($_POST['level'])) ? $_POST['level'] : $user['level'],
		'workplace' => isset($_POST['workplace'])&& (!empty($_POST['workplace'])) ? $_POST['workplace'] : $user['workplace'],
		'education' => isset($_POST['education'])&& (!empty($_POST['education'])) ? $_POST['education'] : $user['education'],
		'email' => isset($_POST['email'])&& (!empty($_POST['email'])) ? $_POST['email'] : $user['email'],
		'direction' => isset($_POST['direction'])&& (!empty($_POST['direction'])) ? $_POST['direction'] : $user['direction'],
		'social_position' => isset($_POST['social_position'])&& (!empty($_POST['social_position'])) ? $_POST['social_position'] : $user['social_position'],
		'bank_card' => isset($_POST['bank_card'])&& (!empty($_POST['bank_card'])) ? $_POST['bank_card'] : $user['bank_card'],
        );
        update('editor',$editor,'create_time='.$_POST['create_time']);
	} else {
		$user = find('administrator','*','create_time='.$_POST['create_time']);
        update('administrator',$editor,'create_time='.$_POST['create_time']);
	}


	return_json(200,$user);
