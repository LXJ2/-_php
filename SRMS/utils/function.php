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