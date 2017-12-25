<?php 
	header("Content-type: text/html; charset=utf-8"); 
	$str=$_SERVER["QUERY_STRING"];  //获取传过来的地址，输出act=update/7
	$str=substr($str,11);           //截取传过来的字符串，输出id
	$str=intval($str);				//字符串转换成整数型
	$filename="log.txt";   //得到文件
	$logs=file_get_contents($filename);  //获取文件里面的内容
	$logs=unserialize($logs);
	$arr=$logs[$str];
	print_r($logs[$str]);
	echo("<HR/>");
 ?>
	
  <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="css/css.css">
 	<title>留言板修改页面</title>
 </head>
 <body>
 	<form action="updates.php?act=updates/<?php echo $str; ?>" method="post">
		<table>
			<tr><th>用户名</th><th><input type="text" name="username" value="<?php echo $arr['username']; ?>"></th></tr>
			<tr><th>密码</th><th><input type="password" name="password" value="<?php echo $arr['password']; ?>"></th></tr>
			<tr><th>住址</th><th><input type="text" name="addres" value="<?php echo $arr['addres']; ?>"></th></tr>
			<tr><th>手机号</th><th><input type="text" name="phone" value="<?php echo $arr['phone']; ?>"></th></tr>
			<tr><th>原来头像</th><th><img src="img/<?php echo $arr['photo']; ?>" alt=""></th></tr>
			<tr><th>更改头像</th><th>
					<input type="radio" name="photo"  value="1.jpg" 
						<?php if( $arr['photo']=="1.jpg"){ echo "checked";} ?>><img src="img/1.jpg" alt="">
					<input type="radio" name="photo" value="2.jpg"
						<?php if( $arr['photo']=="2.jpg"){ echo "checked";} ?>><img src="img/2.jpg" alt="">
					<input type="radio" name="photo" value="3.jpg"
						<?php if( $arr['photo']=="3.jpg"){ echo "checked";} ?>><img src="img/3.jpg" alt="">
					<input type="radio" name="photo" value="4.jpg"
						<?php if( $arr['photo']=="4.jpg"){ echo "checked";} ?>><img src="img/4.jpg" alt=""></th></tr>
			<tr><th><input type="submit" value="保存"></th><th></th></tr>
		</table>
 	</form>
 	<a href="list.php"><input type="submit" value="列表"></a>
 	<a href="text.php"><input type="submit" value="测试"></a>
 	<a href="index.php"><input type="submit" value="首页"></a>
 	<a href="update.php"><input type="submit" value="修改"></a>
 </body>
 </html>