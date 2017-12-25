<?php 
	header("Content-type: text/html; charset=utf-8"); 
	$str=$_SERVER["QUERY_STRING"];
	$str=substr($str,8);
	     //截取传过来的字符串，输出id
	$str=intval($str);
	$filename="log.txt";   //得到文件
	$logs=file_get_contents($filename);  //获取文件里面的内容
	$logs=unserialize($logs);
	//$logs=$logs[$str];

	unset($logs[$str]);  //将这个数组设置为空
	$arrs=serialize($logs);
	//开始写入文件
	if(file_put_contents($filename, $arrs)){
				echo "删除成功";
				 echo "<meta http-equiv='refresh' content='1;url=list.php'>";
			}else{
				echo "删除失败";
			}
 ?>