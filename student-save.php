<?php 
	$xuehao = $_POST["xuehao"];
	$banhao = $_POST["banhao"];
	$compellation = $_POST["compellation"];
	$gender = $_POST["sSex"];
	$birth = $_POST["birth"];
	$phone = $_POST["phone"];
	$id = empty($_REQUEST['id'])?"null":$_REQUEST['id'];
	// 如果是录入页面提交,那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "student-input.php";
		$sql1 = "insert into student(班号,学号,姓名,性别,出生日期,电话) value('{$banhao}','{$xuehao}','{$compellation}',{$gender},'{$birth}','{$phone}')";
		echo $sql1;
	} else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "student-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update student set 学号='{$xuehao}',班号='{$banhao}',姓名='{$compellation}',性别='{$gender}',出生日期='{$birth}',电话='{$phone}' where id='{$id}'";
	} else {
		die("请选择操作方法");  // die() 输出提示语并终止下面的代码执行
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