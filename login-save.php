<?php 
	session_start();
	include("conn.php");
	// 邮箱
	$email = empty($_POST['email']) ? "null":strtolower($_POST['email']);
	// 密码
	$password = empty($_POST['password']) ? "null":$_POST['password'];
	$sql="select email,name,password,question,answer from user where email = '{$email}' and password='{$password}'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) >= 1) {
		// 创建一个session,建为usname,值为$email
		$_SESSION['usname'] = $email;
		echo "<p class='hint'>登录成功</p><script>document.cookie='usname={$email}';</script>";
		header("Refresh:2;url=index.php");
	}else{
		echo "<p class='hint'>登录失败</p>".mysqli_error($conn);
		header("Refresh:2;url=login.php");
	}
	mysqli_close($conn);
	include ("p.style.php");
 ?>
<style>
	.hint{
		width: 500px;
		height: 100px;
		background-color: #f34f4fd6;
		margin: 10px auto;
		text-align: center;
		line-height: 100px;
		border-radius: 10px 10px 10px 10px;
		font-size: 35px;
		display: none;
		color: color;
	}
</style>