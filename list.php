<?php 
	header("Content-type: text/html; charset=utf-8"); 
	date_default_timezone_set("Asia/Shanghai"); //日期函数
	$filename="log.txt";   //得到文件
	$logs=file_get_contents($filename);  //获取文件里面的内容
	//echo "文件的字符串是:".$logs;

		//$logs=explode("|", $logs);
	//explode是按照|符号来拆分字符串，变成一个数组
	//implode是连接字符串
	//print_r($logs);
	//反序列化一个数组
	$logs=unserialize($logs);
	print_r($logs);
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="css/css.css">
 	<title>留言列表</title>
 </head>
 <body>
 	<h1>留言列表</h1>
 	<table width="100%">
		<tr><th>用户名</th><th>密码</th><th>手机号</th><th>住址</th><th>头像</th><th>注册时间</th><th>操作</th></tr>
		<tr>
		
		<?php 
			if($logs){
			foreach ($logs as $key =>  $val) {
		 ?>
		<th><?php echo $val['username']; ?></th><th><?php echo $val['password']; ?></th><th><?php echo $val['phone']; ?></th><th><?php echo $val['addres']; ?></th><th><img src="img/<?php echo $val['photo']; ?>" alt=""></th><th><?php echo date("Y-m-d H:i:s",$val['time']);?></th><th><a href="del.php?act=del/<?php echo $key; ?>">删除</a> | <a href="update.php?act=update/<?php echo $key; ?>">修改</a></th></tr>
		<?php 
			}
		}else{
			echo "没有记录";
		}
		 ?>
		
	
 	</table>
 	<a href="list.php"><input type="submit" value="列表"></a>
 	<a href="text.php"><input type="submit" value="测试"></a>
 	<a href="index.php"><input type="submit" value="首页"></a>
 	<a href="update.php"><input type="submit" value="修改"></a>
 </body>
 </html> 