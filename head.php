<?php session_start();
	if (empty($_SESSION['usname'])) {
		header('Refresh:0;url=login2.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生管理系统</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="css/default.css">
	<style type="text/css">
		.userinfo{
			position: absolute;
			width: 200px;
			height: 25px;
			line-height: 25px;
			bottom: 0;
			right: 0;
			font-size: 12px;
		}
		.userinfo span{color: red;}
		a{font-size: 12px;}
		.sui-container{
			width: 1320px;
			height: 700px;
			background-color: #fdf9f9;
			margin: 20px auto;
			border-radius: 10px 10px 0px 0px;
			font-size: 16px;
			font-family: "Microsoft 宋体",宋体,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;
		}
		.my-head{
			width: 1400px;
			height: 45px;
			border-bottom: 1px solid black;
			line-height: 45px;
			text-align: center;
			font-size: 18px;
			font-weight: 600;
			border-radius: 10px 10px 0px 0px;
			background-color: #4cb9fc;
			font-family: "Microsoft 宋体",宋体,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;
			color: #5f5a5a;
		}
		#bt li img{
			width: 400px;
			height: 200px;
		}
		#bt li p{width: 420px;}
		#bt li{
			float: left;
			padding-left: 80px;
			padding-top: 20px;
		}
	</style>
</head>
<body>
	<div class="sui-container">
		<div class="nav">北京网络职业学院学生管理系统V2.0
			<div class="userinfo">欢迎<span><?php echo $_SESSION['usname']; ?></span>登录&nbsp;<a href="login-out.php">退出</a></div>
		</div>