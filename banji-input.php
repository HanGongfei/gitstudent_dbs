<?php include("head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
				<!--左菜单  -->
				<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级信息录入</p>
			<form id="form1" action="banji-save.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="kcName" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="banhao" name="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" id="banzhang" name="banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" id="jiaoshi" name="jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" id="banzhuren" name="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banjikouhao" class="control-label">班级口号：</label>
			    <div class="controls">
			      <input type="text" id="banjikouhao" name="banjikouhao" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=20">
			    </div>
			  </div>				  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
<script>
		//第一种方法
		//document.cookie= " uname=dengbin;expires = Thu, 22 Aug 2018 00:00 GMT";
		//第二种方法
		var days= 30 ;
		var dayTime = 30*24*60*60*1000;//转换为毫秒
		var exp = new Date();
		exp.setTime(exp.getTime() + daysTime);//设置为30天后
		document.cookie = "unmae=dengbin;expires"+exp.toGMTString();
		console.log(document.cookie); 	
		var str= doument.cookie;
		console.log( str.split(";"));
		console.log( str.split(";")[0]);
		console.log( str.split(";")[0].split("="));
		console.log( str.split(";")[0].split("=")[1]);
		//用正则表达式
		function get

</script>
<?php include("foot.php"); ?>