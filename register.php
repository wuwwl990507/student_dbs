<?php include("head_01.php"); ?>
		<form class="sui-form form-horizontal sui-validate" action="register-save.php" method="post">
			<div class="control-group">
			    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
			    <div class="controls">
			    	<input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="email" data-rules="required|minlength=2|maxlength=30">
			    </div>
			</div>
			<div class="control-group">
			    <label for="userm " class="control-label .input-fat">用户名：</label>
			    <div class="controls">
			    	<input type="text" id="userm" placeholder="请输入用户名" class="input-fat input-large" name="userm" data-rules="required|minlength=2|maxlength=10">
			    </div>
			</div>
			<div class="control-group">
			    <label for="password" class="control-label">密码：</label>
			    <div class="controls">
			    	<input type="password" id="password" placeholder="请输入密码" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12">
			    </div>
			</div>
			<div class="control-group">
			    <label for="word" class="control-label">重复密码：</label>
			    <div class="controls">
			    	<input type="password" id="word" placeholder="请输入重复密码" class="input-fat input-large" name="word"data-rules="required|minlength=2|maxlength=12">
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
				<label for="question" class="control-label">密码提示问题：</label>
				<div class="controls">
					<select id="question" name="question">
						<option value="你的小学在哪上学">你的小学在哪上学</option>
						<option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
						<option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="answer " class="control-label .input-fat">密码答案：</label>
				<div class="controls">
					<input type="text" id="answer" placeholder="请输入密码答案" class="input-fat input-large" name="answer" data-rules="required|minlength=2|maxlength=15">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="sui-btn btn-primary" id="refer">提交</button>
				</div>
			</div>
		</form>
<?php include("foot_02.php") ?>
<script>
	var code_btn = document.getElementById('code_btn');	
	var refer = document.getElementById('refer');
	var verify = document.getElementById('verify');
	refer.onclick = function() {	
		var neirong = verify.value.toUpperCase();
		if(neirong == code_btn.value.toUpperCase()) {
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