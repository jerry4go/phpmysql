<?php
// 1. 数据库配置（PDO配置方式）
$mysql_conf = array(
    'host'    => '127.0.0.1:3306', 
    'db'      => 'test', 
    'db_user' => 'root', 
    'db_pwd'  => 'joshua317', 
    );
	
// 2. 新建PDO对象
$pdo = new PDO("mysql:host=" . $mysql_conf['host'] . ";dbname=" . $mysql_conf['db'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
// 3. 设置数据库连接编码
$pdo->exec("set names 'utf8'");
// 4. 配置SQL语句
$sql = "select * from user where name = ?";
// 5. 执行SQL语句
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, 'joshua', PDO::PARAM_STR);
$rs = $stmt->execute();
// 6. 判断结果是否有异常，如果没有，打印出结果
if ($rs) {
    // PDO::FETCH_ASSOC 关联数组形式
    // PDO::FETCH_NUM 数字索引数组形式
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row);
    }
}
//7. 关闭连接
$pdo = null;
?>