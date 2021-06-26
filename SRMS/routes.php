<?php
include 'utils/route.php';
include 'utils/user.php';
include 'utils/function.php';
$routes = routeData();
$users = userData();
$uid = $_GET['position'];


if($uid){
$authRouterInfo = [];
foreach ($users as $key => $user) {	
	if($user['id'] == $uid){
        $userInfo = $user;
        foreach ($userInfo['auth'] as $key => $rid) {
        	foreach ($routes as $key => $route) {
        	if($route['id'] == $rid){
                 array_push($authRouterInfo, $route);
        	}
        }
        }
	}
}
}
return_json(200,$authRouterInfo);



    // $users = [];
    // $authRouterinfo = [];
    // $userInfo = array_filter($users , function($u) {
    //     return $u->id == uid;
    // })[0];

    // $userInfo->auth = array_map(function($rid) {
    //     foreach ($routers as $key => $router) {
    //         if ($router->id == rid) {
    //             $authRouterinfo[] = $router;
    //         }
    //     }
    // } , $userInfo->auth);

