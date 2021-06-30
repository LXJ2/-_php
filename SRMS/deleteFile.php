<?php
include 'utils/function.php';
if($_POST['create_time']){
	$del = delete('file','create_time='.$_POST['create_time']);
}
if($del){
	return_json(200,'删除成功');
}else{
	return_json(1,'删除失败');
}


?>