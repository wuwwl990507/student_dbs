<?php 
	$names = $_POST['name'];
	$password = $_POST['password'];
	$question = $_POST['question'];
	$answer= $_POST["answer"];
	if( $kid == "null"){
		$kid = $_POST["kid"];
		$sql = "update user set name='{$names}',password='{$password}',question='{$question}',answer='{$answer}' where id = '{$kid}'";
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "user-list.php";
	}
	include("conn.php");
	// 执行SQL语句
	$result = mysqli_query($conn,$sql1);
	// 输出数据
	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		// Refresh:暂停时间
		header("Refresh:1;url={$url}");
	} else {
		echo $str2.mysqli_error($conn);
	}
	// 关闭数据库
	mysqli_close($conn);
 ?>