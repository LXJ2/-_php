<?php
function routeData(){
  $route = array(
   array(    
    'id' => 2,
    'pid' => 0,
    'path' => '/layout/user',
    'name' => 'User',
    'title' => '个人信息'
  ),
  array(    
    'id' => 3,
    'pid' => 2,
    'path' => 'userInfo',
    'name' => 'UserInfo',
    'link' => '/layout/user/userInfo',
    'title' => '我的信息'
  ),
  array(    
    'id' => 4,
    'pid' => 2,
    'path' => 'edit_userInfo',
    'name' => 'EditUserInfo',
    'link' => '/layout/user/edit_userInfo',
    'title' => '完善个人信息'
  ),

  array(    
    'id' => 5,
    'pid' => 2,
    'path' => 'edit_password',
    'name' => 'EditPassword',
    'link' => '/layout/user/edit_password',
    'title' => '修改密码'
  ),
  
  array(    
    'id' => 6,
    'pid' => 0,
    'path' => '/myFile',
    'name' => 'MyFile',
    'title' => '我的稿件'
  ),
  array(    
    'id' => 7,
    'pid' => 6,
    'path' => 'add_file',
    'name' => 'AddFile',
    'link' => '/myFile/add_file',
    'title' => '我要投稿'
  ),
  array(    
    'id' => 8,
    'pid' => 6,
    'path' => 'notice_file',
    'name' => 'NoticeFile',
    'link' => '/myFile/notice_file',
    'title' => '稿件通知'
  ),
  array(    
    'id' => 9,
    'pid' => 0,
    'path' => '/file',
    'name' => 'File',
    'title' => '我要审稿'
  ),
  array(    
    'id' => 10,
    'pid' => 9,
    'path' => 'edit_file',
    'name' => 'EditFile',
    'link' => '/file/edit_file',
    'title' => '查看待审稿件'
  ),
  array(    
    'id' => 11,
    'pid' => 9,
    'path' => 'read_file',
    'name' => 'ReadFile',
    'link' => '/file/read_file',
    'title' => '审稿记录'
  ),
  array(    
    'id' => 12,
    'pid' => 0,
    'path' => '/authorEdit',
    'name' => 'AuthorEdit',
    'title' => '作者管理'
  ),
  array(    
    'id' => 13,
    'pid' => 0,
    'path' => '/fileEdit',
    'name' => 'FileEdit',
    'title' => '稿件管理'
  ),
  array(    
    'id' => 14,
    'pid' => 0,
    'path' => '/editorEdit',
    'name' => 'EditorEdit',
    'title' => '审稿人管理'
  ),
 );
  return $route;
}
  
  
