<?php include("head.php") ?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">班级修改信息</p>
				<table class="sui-table table-primary">
					<thead>
						<tr>
							<th>班号</th>
							<th>班长</th>
							<th>教室</th>
							<th>班主任</th>
							<th>班级口号</th>
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
			<td>{{val.班号}}</td>
			<td>{{val.班长}}</td>
			<td>{{val.教室}}</td>
			<td>{{val.班主任}}</td>
			<td>{{val.班级口号}}</td>
			<td><a href="banji-update.php?kid={{val.班号}}" class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;<a href="banji-del.php?kid={{val.班号}}" class='sui-btn btn-small btn-danger'>删除</a></td>
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
				"action":"banji"
			},
			beforeSend : function(XMLHttpRequest){
				$("#studentlist").html("<tr><td>正在查询,请稍后...</td></tr>")
			},
			success: function(data,textStatus){
				var arr = data.data;
				var html = template('template1',{"arr":arr});
				//利用模板生成html
				$("tbody").html(html);

				// var str = "";
				// if(data.code == 200){
				// 	for(var i=0;i<data.data.length;i++){
				// 		console.log(data.data[i]);
				// 		str += "<tr><td>" + data.data[i].班号 + "</td><td>" + data.data[i].班长 + "</td><td>" + data.data[i].教室 + "</td><td>" + data.data[i].班主任 + "</td><td>" + data.data[i].班级口号 + "</td><td><a href='banji-update.php?kid={$row['id']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;<a href='banji-del.php?kid={$row['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
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