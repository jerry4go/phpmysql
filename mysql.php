<?php
//  1. 数据库配置（mysql 属于淘汰的，5.5以后就废弃了）
$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'test', 
    'db_user' => 'root', 
    'db_pwd'  => 'root', 
    );
	
// 创建连接	
$mysql_conn = @mysql_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);

// 判断连接是否正确
if (!$mysql_conn) {
    die("could not connect to the database:\n" . mysql_error());
}

// 设置编码
mysql_query("set names 'utf8'");
// 选择数据库
$select_db = mysql_select_db($mysql_conf['db']);
// 判断数据库是否能打开
if (!$select_db) {
    die("could not connect to the db:\n" .  mysql_error());
}
// 配置执行的SQL语句
$sql = "select * from user;";
// 执行SQL语句
$res = mysql_query($sql);
// 判断查询是否报错
if (!$res) {
    die("could get the res:\n" . mysql_error());
}
// 循环打印结果
while ($row = mysql_fetch_assoc($res)) {
    print_r($row);
}
// 关闭数据库连接
mysql_close($mysql_conn);
?>