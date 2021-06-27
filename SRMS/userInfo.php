<?php
include 'utils/function.php';


if($_GET['position'] == 1){
		$user = find('author','*','create_time='.$_GET['create_time']);
	}else if ($_GET['position'] ==2){
		$user = find('editor','*','create_time='.$_GET['create_time']);
	} else {
		$user = find('administrator','*','create_time='.$_GET['create_time']);
	}

return_json(200,$user);


?>