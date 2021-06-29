<?php
/**
 * PDO操作函数库
 */
/**
 * 数据库连接
 * @param $db
 * @return PDO
 */
function connect()
{
    $db = array(
        'charset' => 'utf8',
        'port' => 3306,
        'type' => 'mysql',
        'host' => '127.0.0.1',
        'user' => 'root',
        'pass' => 'root',
        'name' => 'srms_cn'
    );
    $dsn = "{$db['type']}:host={$db['host']}; dbname={$db['name']}; charset={$db['charset']}; port={$db['port']}";//数据源
    try {
        //实例化PDO类,创建PDO对象
        $pdo = new PDO($dsn,$db['user'],$db['pass']);
    } catch (PDOException $e) {
        die('数据库错误:'.$e->getMessage());
    }

    return $pdo;
}
/**
 * 查询多条记录
 * @param $db
 * @param $table
 * @param $fields
 * @param string $where
 * @return array
 */
function select($table,$fields, $where='', $order='',$limit='') {
    //连接pdo
    $pdo = connect();
    //创建SQL语句
    $sql = 'SELECT ';
    if (is_array($fields)) {
        foreach ($fields as $field) {
            $sql .= $field.', ';
        }
    } else {
        $sql .= $fields;
    }
    $sql = rtrim(trim($sql),',');
    $sql .= '  FROM '.$table;
    //查询条件
    if(!empty($where)){
        $sql .= ' WHERE '.$where;
    }
    //排序条件
    if(!empty($order)) {
        $sql .= ' order by '.$order;
    }
    //分页条件
    if(!empty($limit)) {
        $sql .= ' limit '.$limit;
    }
    $sql .= ';';
    //创建PDO预处理对象
    $stmt = $pdo->prepare($sql);
    //执行查询操作
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //返回一个二维数组
            return $stmt->fetchAll();
        }
    } else {
        return false;
    }
}
/**
 * 查询单条记录
 * @param $db
 * @param $table
 * @param $fields
 * @param string $where
 * @return array
 */
function find($table,$fields,$where='') {
    //连接pdo
    $pdo = connect();
    //创建SQL语句
    $sql = 'SELECT ';
    if (is_array($fields)) {
        foreach ($fields as $field) {
            $sql .= $field.', ';
        }
    } else {
        $sql .= $fields;
    }
    $sql = rtrim(trim($sql),',');
    $sql .= ' FROM '.$table;
    //查询条件
    if(!empty($where)){
        $sql .= ' WHERE '.$where;
    }
    $sql .= ' LIMIT 1;';
    //创建PDO预处理对象
    $stmt = $pdo->prepare($sql);
    //执行查询操作
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        }
    } else {
        return false;
    }
}
/**
 * 新增数据
 * @param $db
 * @param $table
 * @param $data
 * @return bool
 */
function insert($table,$data=[]){
    //连接pdo
    $pdo = connect();
    //创建SQL语句
    $sql = "INSERT INTO {$table} SET ";
    //组装插入语句
    if(is_array($data)){
        foreach ($data as $k=>$v) {
            $sql .= $k.'="'.$v.'", ';
        }
    }else{
        return false;
    }
    //去掉尾部逗号,并添加分号结束
    $sql = rtrim(trim($sql),',').';';
    //创建PDO预处理对象
    $stmt = $pdo->prepare($sql);
    //执行新增操作
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            return true;
        }
    } else {
        return false;
    }
}
/**
 * 更新数据
 * @param $db
 * @param $table
 * @param $data
 * @return bool
 */ 
function update($table,$data=[], $where='') {
    //连接pdo
    $pdo = connect();
    //创建SQL语句
    $sql = "UPDATE {$table} SET ";
    //组装修改语句
    if(is_array($data)){
        foreach ($data as $k=>$v) {
            $sql .= $k.'="'.$v.'", ';
        }
    }
    //去掉尾部逗号,并添加分号结束
    $sql = rtrim(trim($sql),',');
    //查询条件
    if(!empty($where)){
        $sql .= ' WHERE '.$where;
    }
    //创建PDO预处理对象
    $stmt = $pdo->prepare($sql);
    //执行新增操作
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            return true;
        }
    } else {
        return false;
    }
}
/**
 * 删除记录
 * @param $db
 * @param $table
 * @param string $where
 * @return bool
 */
function delete($table,$where=''){
    //连接pdo
    $pdo = connect();
    //创建SQL语句
    $sql = "DELETE FROM {$table}  ";
    //查询条件
    if(!empty($where)){
        $sql .= ' WHERE '.$where;
    }
    //创建PDO预处理对象
    $stmt = $pdo->prepare($sql);
    //执行删除操作
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            return true;
        }
    } else {
        return false;
    }
}
/**
 * 统计数量
 * @param $pdo
 * @param $table
 * @param string $where
 * @return number
 */
function count_num($table,$where){
    //连接pdo
    $pdo = connect();
    //创建SQL语句
    $sql  = 'SELECT count(*) as count_number FROM '.$table;
    //查询条件
    if(!empty($where)){
        $sql .= ' WHERE '.$where;
    }
    //创建PDO预处理对象
    $stmt = $pdo->prepare($sql);
    //执行查询操作
    if($stmt->execute()){
        if($stmt->rowCount()>0){
            $row  = $stmt->fetch(PDO::FETCH_ASSOC);
            $rows = $row['count_number'];
            return $rows;
        }
    } else {
        return false;
    }
}
// json数据格式整理
function return_json($code,$data){
    if($code == 200){
        $array = array(
            'resultCode' => 200,
            'msg'  => 'success',
            'data' => $data
        );
    }else{
        $array = array(
            'resultCode' => $code,
            'msg'  => $data
        );
    }
    echo json_encode($array);
    exit;
}
/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
function juheCurl($url, $params = false, $ispost = 0)
{
    $httpInfo = array();
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
    curl_close($ch);
    return $response;
} 

/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */

//定义一个uploadFile函数
function uploadFile($fileInfo,$path,$allowExt,$maxSize){
//取出$_FILES中的数据
$filename=$fileInfo["name"];
$tmp_name=$fileInfo["tmp_name"];
$size=$fileInfo["size"];
$error=$fileInfo["error"];
$type=$fileInfo["type"];
//取出文件路径中文件的类型的部分
$ext=pathinfo($filename,PATHINFO_EXTENSION);
//确定是否存在存放图片的文件夹，没有则新建一个
if (!file_exists($path)) {  //当目录不存在，就创建目录
  mkdir($path,0777,true);//创建目录
  chmod($path, 0777);//改变文件模式,所有人都有执行权限、写权限、度权限
}
//得到唯一的文件名！防止因为文件名相同而产生覆盖
$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;

//目标存放文件地址
$destination=$path."/".$uniName;
//echo $destination;
//当文件上传成功，存入临时文件夹，服务器端开始判断
if ($error==0) {
  if ($size>$maxSize) {
    exit("上传文件过大！");
  }
  if (!in_array($ext, $allowExt)) {
    exit("非法文件类型");
  }
  if (!is_uploaded_file($tmp_name)) {
    exit("上传方式有误，请使用post方式");
  }
  //判断是否为真实图片（防止伪装成图片的病毒一类的
  // if (!getimagesize($tmp_name)) {//getimagesize真实返回数组，否则返回false
  //   exit("不是真正的图片类型");
  // }

  if (@move_uploaded_file($tmp_name, $destination)) {//@错误抑制符，不让用户看到警告
    $str = "文件".$filename."上传成功!";
    //echo $str;
  }else{
    $str = "文件".$filename."上传失败!";
    //echo "文件".$filename."上传失败!";
  }
}else{
  switch ($error){
    case 1:
      echo "超过了上传文件的最大值，请上传20M以下文件";
      break;
    case 2:
      echo "上传文件过多，请一次上传20个及以下文件！";
      break;
    case 3:
      echo "文件并未完全上传，请再次尝试！";
      break;
    case 4:
      echo "未选择上传文件！";
      break;
    case 7:
      echo "没有临时文件夹";
      break;
  }
}
 $arr = array($str,$destination);
  return $arr;
}