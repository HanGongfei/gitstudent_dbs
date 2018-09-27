<?php include("head.php");?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<form id="form1" action="stchaxun-list.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="sName" class="control-label">姓名：</label>
			    <div class="controls">
			    <!-- 添加一个input -->
			    <input type="hidden" name="cxks" value="update">
			      <input type="text" id="xming" name="xming" class="input-large input-fat"   placeholder="输入姓名" data-rules="required">
			    </div>
			  </div>
	  		  <div class="control-group">
			    <label for="sNumber" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xhao" name="xhao" class="input-large input-fat" placeholder="输入学号">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
}
<?php include("foot.php"); ?>