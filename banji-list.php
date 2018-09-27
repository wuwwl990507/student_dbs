<?php include("head.php") ?>
<?php
	include("conn.php");
	// 执行SQL语句
	$sql = "select 班号,班长,教室,班主任,班级口号 from banji";
	$result = mysqli_query($conn,$sql);
	// 关闭数据库
	mysqli_close($conn);
?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">班级修改信息</p>
				<table class="sui-table table-primary">
					<tr>
						<th>班号</th>
						<th>班长</th>
						<th>教室</th>
						<th>班主任</th>
						<th>班级口号</th>
						<th>操作</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>{$row['班号']}</td>
									<td>{$row['班长']}</td>
									<td>{$row['教室']}</td>
									<td>{$row['班主任']}</td>
									<td>{$row['班级口号']}</td>
									<td>
										<a href='banji-update.php?kid={$row['班号']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
										<a href='banji-del.php?kid={$row['班号']}' class='sui-btn btn-small btn-danger'>删除</a>
									</td>
								</tr>";
							}
						} else {
							echo "没有记录";
						}
					?>
				</table>
			</div>
		</div>
<?php include("foot.php"); ?>