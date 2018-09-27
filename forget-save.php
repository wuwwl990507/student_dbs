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
<?php 
	include("conn.php");
	// 邮箱
	$mali = $_POST['mali'];
	// 密码提示
	$question = $_POST['question'];
	// 答案
	$answer = $_POST['answer'];
	// 选择有没有邮件名称一样的
	$sql = "select * from user where email='{$mali}' and question='{$question}' and answer='{$answer}'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) >= 1) {
		echo "<p class='hint'>验证通过</p>";
		$row = mysqli_fetch_assoc($result);
		header("Refresh:2;url=index.php?update='{$row['email']}'");
	}else{
		echo "<p class='hint'>验证失败</p>";
		header("Refresh:2;url=logon2.php");
	}
	mysqli_close($conn);
	include ("p.style.php");
 ?>