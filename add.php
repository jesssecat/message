<?php 
	header("Content-type: text/html; charset=utf-8"); 
	date_default_timezone_set("Asia/Shanghai"); //日期函数
	$act=$_REQUEST['act'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$addres=$_POST['addres'];
	$phone=$_POST['phone'];
	$photo=$_POST['photo'];
	//$time=date("Y-m-d h:i:sa");   //和上面的日期函数对应，sa可以看出是上午还是下午
	$time=time();//返回的是秒数，uninx时间
	$ip=$_SERVER['REMOTE_ADDR']; //得到客户端的ip地址
	//echo $username."|".$password."|".$addres."|".$phone."|".$photo."|".$time."|".$ip;
	//$logs=$username."|".$password."|".$addres."|".$phone."|".$photo."|".$time."|".$ip;
	//每个字符串添加|是为了以后分出数组来
	//创建关联数组
	//$arr[]=compact("username","password","addres","phone","photo","time","ip");
	if ($act=="addMes") {
		//完成留言的发布
		//如果文件不存在，就不读取文件
		$filename="log.txt";
		//if(file_exists($filename))检测文件是否存在
		//如果存在返回为真
		//否则为假
		if(file_exists($filename)){
			//首先将log的内容取出来
			$str=file_get_contents($filename);
			$logs=unserialize($str);
		}
		$logs[]=compact("username","password","addres","phone","photo","time","ip");
		$logs=serialize($logs);
		// print_r($array);
		// echo "<hr/>";
		// print_r($arr);
		// exit;
	//将数组序列化之后写到文件中serialize($VALUE):将指定值进行序列化，返回序列化之后的字符串
	//$logs=serialize($logs);
			if(file_put_contents($filename, $logs)){
				echo "留言成功";
				 echo "<meta http-equiv='refresh' content='1;url=index.php'>";
			}else{
				echo "留言失败";
			}
	}
 ?>