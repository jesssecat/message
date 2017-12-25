<?php 
	header("Content-type: text/html; charset=utf-8"); 
	$act=$_REQUEST['act'];
	echo $act;
	$str=$_SERVER["QUERY_STRING"]; //获取到地址
	$str=substr($str,12);
	     //截取传过来的字符串，输出id
	$str=intval($str);				//字符串转换成整数型
	//获取数组的键值
	$username=$_POST['username'];
	$password=$_POST['password'];
	$addres=$_POST['addres'];
	$phone=$_POST['phone'];
	$photo=$_POST['photo'];
	//$time=date("Y-m-d h:i:sa");   //和上面的日期函数对应，sa可以看出是上午还是下午
	$time=time();//返回的是秒数，uninx时间
	$ip=$_SERVER['REMOTE_ADDR']; //得到客户端的ip地址
	$logs1[$str]=compact("username","password","addres","phone","photo","time","ip");
	//$arr=serialize($logs);
	//接受到新的数据并且组合起来传入数组
	//print_r($arr);echo "<HR/>";
	/******************/
	//开始读取文件
	/******************/
	$filename="log.txt";   //得到文件
	$logs=file_get_contents($filename);  //获取文件里面的内容
	$logs=unserialize($logs);
	//print_r($logs);
	// foreach ($arr as $key=>$value) {
	// 	$arr[$key]['time'] = str_replace("-", "", $value['time']);
	// }
	// var_dump($logs[$str]);
	// echo "<hr/>";
	// var_dump($logs1);
	// echo "<hr/>";
	$arrs=(array_replace($logs,$logs1));
	$arrs=serialize($arrs);
	
	//开始写入文件
	if(file_put_contents($filename, $arrs)){
				echo "修改成功";
				 echo "<meta http-equiv='refresh' content='1;url=index.php'>";
			}else{
				echo "修改失败";
			}


 ?>