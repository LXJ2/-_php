<?php
include 'utils/function.php';

if($_GET['create_time']){
	$file = find('file','*','create_time='.$_GET['create_time']);
	return_json(200, $file);
}else{
	return_json(1,$file);
}