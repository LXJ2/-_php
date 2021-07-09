<?php
include 'utils/function.php';

if($_POST['create_time']){
	$fileData = find('file','*','create_time='.$_POST['create_time']);
	if($fileData['pass_num'] >= 1){
		$num = $fileData['pass_num'] + 1;
		$ary = array(
		'pass_num' => $num,
        'status' => 1,
	 );
		$up = update('file',$ary,'create_time='.$_POST['create_time']);
	}else{
	    $num = $fileData['pass_num'] + 1;
	    $arr = array(
            'pass_num' => $num,
	    );
	    $up = update('file',$arr,'create_time='.$_POST['create_time']);	
    }
    if($up){
		return_json(200,'审核成功');
	}else{
		return_json(1,'审核失败');
	}
	}


?>