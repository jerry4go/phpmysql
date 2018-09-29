<?php
// 1. 数据库配置参数 （mysqli 写法）
$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'test', 
    'db_user' => 'root', 
    'db_pwd'  => 'joshua317', 
    );

// 2. 新建数据库连接对象	
$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);

// 3. 判断是否连接异常
if ($mysqli->connect_errno) {
    die("could not connect to the database:\n" . $mysqli->connect_error);
}
// 4. 设置编码
$mysqli->query("set names 'utf8';");
// 5. 选择数据库
$select_db = $mysqli->select_db($mysql_conf['db']);
// 6. 判断数据库打开是否异常
if (!$select_db) {
    die("could not connect to the db:\n" .  $mysqli->error);
}$sql = "select uid from user where name = 'joshua';";
// 7. 查询数据库
$res = $mysqli->query($sql);
// 8. 判断SQL语句是否执行有异常
if (!$res) {
    die("sql error:\n" . $mysqli->error);
}
// 9. 循环输出结果
 while ($row = $res->fetch_assoc()) {
        var_dump($row);
    }
// 10.清空结果，释放内存
$res->free();
// 11. 关闭连接
$mysqli->close();
?>