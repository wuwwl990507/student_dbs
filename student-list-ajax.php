<?php include("head.php") ?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">学生修改信息</p>
				<table class="sui-table table-primary">
					<thead>
						<tr>
							<th>序号</th>
							<th>学号</th>
							<th>班号</th>
							<th>姓名</th>
							<th>性别</th>
							<th>出生日期</th>
							<th>电话</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody id="studentlist"></tbody>
				</table>
			</div>
		</div>
<?php include("foot.php"); ?>
<script id="template1">
	{{each arr val idx}}
		<tr>
			<td>{{val.id}}</td>
			<td>{{val.学号}}</td>
			<td>{{val.班号}}</td>
			<td>{{val.姓名}}</td>
			<td>{{val.性别 == 1?"男":"女"}}</td>
			<td>{{val.出生日期}}</td>
			<td>{{val.电话}}</td>
			<td><a href="student-update.php?kid={{val.id}}" class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;<a href="student-del.php?kid={{val.id}}" class='sui-btn btn-small btn-danger'>删除</a></td>
		</tr>
	{{/each}}
</script>

<script>
	$(function(){
		$.ajax({
			url : "api.php",
			type : "POST",
			dataType : "json",
			data:{
				"action":"student"
			},
			beforeSend : function(XMLHttpRequest){
				$("#studentlist").html("<tr><td>正在查询,请稍后...</td></tr>")
			},
			success: function(data,textStatus){
				// console.log(data.data);
				var arr = data.data;
				var html = template('template1',{"arr":arr});
				//利用模板生成html
				$("tbody").html(html);

				// var str = "";
				// if(data.code == 200){
				// 	for(var i=0;i<data.data.length;i++){
				// 		console.log(data.data[i]);
				// 		str += "<tr><td>" + data.data[i].id + "</td><td>" + data.data[i].学号 + "</td><td>" + data.data[i].班号 + "</td><td>" + data.data[i].姓名 + "</td><td>" + data.data[i].性别 + "</td><td>" + data.data[i].出生日期 + "</td><td>" + data.data[i].电话 + "</td><td><a href='student-update.php?kid={$row['id']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;<a href='student-del.php?kid={$row['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
				// 	}
				// 	$("#studentlist").html(str);
				// }
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				console.log( "失败原因：" + errorThrown );
			}
		});
	});
</script>