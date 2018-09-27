<?php include("head_01.php"); ?>
		<form class="sui-form form-horizontal sui-validate" method="post" id="form1">
			<div class="control-group">
				<label for="inputEmail " class="control-label .input-fat">邮箱：</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
				</div>
			</div>
			<div class="control-group">
				<label for="password" class="control-label">密码：</label>
				<div class="controls">
					<input type="password" id="password" placeholder="请输入密码" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=4|maxlength=15">
				</div>
			</div>
			<div class="control-group">
				<label for="verify" class="control-label">验证码：</label>
				<div class="controls">
					<input type="input" id="verify" placeholder="请输入验证码" class="input-fat input-large" name="verify" data-rules="required|minlength=4|maxlength=4">
				</div>
			</div>
			<input type="text" id="code_btn" value="<?php echo rand(0,9);echo rand(0,9);echo rand(0,9);echo rand(0,9); ?>">
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="sui-btn btn-primary" id="refer">提交</button>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<a href="forget.php">忘记密码</a>
				</div>
			</div>
		</form>
		<p class="hint"></p>
<?php include("foot_02.php") ?>
<script>
	// 给提交按钮绑定事件
	$("button[type=submit]").on("click",function(){
		// 使用$.ajax()提交数据
		$.ajax({
			url : "login-save-ajax.php",
			type : "POST",
			data : $("#form1").serialize(),
			dataType: "json",
			/*beforSend:function(XMLHttpRequest){
				// 发送前调用此函数,一般在此编写检测代码或者loading
			},
			completa:function(XMLHttpRequest,textStates){
				// 请求完成后调用此函数(请求成功或失败都调用)
			},*/
			success : function(data,textStatus){
				//请求成功后调用此函数
				console.log( data );
				if( data.code == 200 ){
					$(".hint").html("登录成功").slideDown(200).animate({"color":"black"},2000,function(){
						window.location.href=("index.php");
					});
				}
				if( data.code == 20001){
					//提示密码错误
					$(".hint").html("密码错误").slideDown(200);
				}
				if( data.code == 20004){
					//提示邮箱填写错误
					$(".hint").html("邮箱填写错误").slideDown(200);
				}
				$(".hint").slideUp(400);
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				//请求失败后调用此函数
				console.log( "失败原因：" + errorThrown );
			}
		});
		return false;
	});
	var code_btn = document.getElementById('code_btn');	
	var refer = document.getElementById('refer');
	var verify = document.getElementById('verify');
	refer.onclick = function() {
		var neirong = verify.value.toUhinterCase();
		if(neirong == code_btn.value.toUhinterCase()) {
			alert("验证通过");
		} else if(verify.value.length == 0) {
			alert("请输入验证码");
		} else {
			alert("验证有误");
			$("form").attr("action","login.php");
			history.go(0);
		}
	}
</script>