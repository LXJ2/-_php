  <?php

  function userData(){
      $user = array(
        array(
        'id' => 1,
        'name' => 'author',
        'auth' => [2,3,4,5,6,7,8]
       ),
        array(
        'id' => 2,
        'name' => 'editor',
        'auth' => [2,3,4,5,9,10,11]
      ),
      array(
        'id' => 3,
        'name' => 'admin',
        'auth' => [12,13,14]
      )
      );
      return $user;
      }
      // if($_GET['uid']){
      //   $authRouterInfo = [],
      //   $userInfo =
      // }

  

  /* authorRote:{
      个人信息:{
        1:我的信息,
        2:完善个人信息,
        3:修改密码
      },
      我的稿件:{
        1:我要投稿,
        2:稿件审核通知
      }   
    },
    editorRoute:{
      个人信息:{
        1:我的信息,
        2:完善个人信息,
        3:修改密码
      },
      我要审稿:{
        1:查看待审稿件,
        2:审稿记录
      }
    },
    adminRoute:{
      1:作者管理,
      2:稿件管理,
      3:审稿人管理   
    } */
