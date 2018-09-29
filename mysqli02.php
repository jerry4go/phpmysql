<?php
	//1. 连接数据库
	$link = mysqli_connect('localhost','root','123456');
	//2. 判断错误
	if(mysqli_connect_errno($link)>0){
		echo mysqli_connect_error($link);exit;
	}
	//3. 选择数据库
	mysqli_select_db($link,'testdb');
	//4. 选择字符集
	mysqli_set_charset($link,'utf8');
	//5. 准备SQL语句
	$sql = "SELECT id,name,sex,age,city FROM info";
	//6. 发送SQL语句
	$result = mysqli_query($link,$sql);
	//7. 处理结果集
	if($result && mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			var_dump($row);
		}
	}
	//8. 关闭数据库
	mysqli_close($link);
?>