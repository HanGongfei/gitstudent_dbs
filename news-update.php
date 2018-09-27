
	
<?php
	include("conn.php");
	$result = mysqli_query($conn, "select * from new_column");
$sID = empty($_REQUEST['sID'])?"null":$_REQUEST['sID'];
echo $sID;
if ($sID == "null") {
	echo "请选择要修改的纪录";
}else{
	include("conn.php");
	$result2 = mysqli_query($conn,"select * from news where id = '{$sID}'");
	if(mysqli_num_rows( $result2 )> 0){
		$row = mysqli_fetch_assoc($result2);
	}else{
		echo "没有记录";
	}
	mysqli_close($conn);
}

?>
<?php include "head.php"; ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻修改模块</p>
			<form action="news-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
	<!--技巧：增加一个隐藏的input,用来区分是新增记录还是修改记录-->
				<input type="hidden" name="action" value="nnn">
		<!-- 增加一个隐藏的input的 保存id值 -->
		<input type="hidden" name="sID" value="<?php echo $row['id']; ?>">
			  <div class="control-group">
			    <label for="sbiaoti" class="control-label">标题:</label>
			    <div class="controls">
			      <input type="text" id="sbiaoti" name="sbiaoti" class="input-large input-fat" placeholder="输入标题"  value="<?php echo $row['标题']; ?>">
			    </div>
			  </div>				
			  <div class="control-group">
			    <label for="sjianti" class="control-label">肩题:</label>
			    <div class="controls">
			      <input  value="<?php echo $row['肩题']; ?>" type="text" id="sjianti" name="sjianti" class="input-large input-fat" placeholder="输入肩题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label">栏目:</label>
			    <div class="controls">
			      <select id="slanmu" name="slanmu"  value="<?php $row['栏目']?>">
<!-- 			      		<option value="1712B">1712B</option>
<option value="1711B">1711B</option>
<option value="1710B">1710B</option>
<option value="1709B">1709B</option> -->
<?php 
	if( mysqli_num_rows($result)>0 ){
		while ( $rww = mysqli_fetch_assoc($result) ) {
			echo "<option value='{$row['id']}'>{$rww['name']}</option>";
		}
	}else{
		echo "<option value=''>暂无栏目信息</option>";
	}
?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sName" class="control-label">作者:</label>
			    <div class="controls">
			      <input type="text" id="sName"  class="input-large input-fat" placeholder=""data-rules="required|minlength=2|maxlength=10" value="<?php echo $_SESSION['usname']; ?>">
			      <input type="hidden" id="sName" name="sName" class="input-large input-fat" placeholder="729951342@qq.com"data-rules="required|minlength=2|maxlength=10" value="<?php echo $_SESSION['usid']; ?>">
			    </div>
			  </div>

			    <div class="control-group">
			  	<label for="sdata" class="control-label">发布时间</label>
			  	<div class="controls">
			  		<input type="text" id="sdata" name="sdata" class="input-fat input-large"  placeholder="输入出生日期" data-toggle="datepicker"  value="<?php echo $row['发布时间']; ?>">
			  	</div>
			  </div>		
			  <div class="control-group">
			    <label for="szhaopian" class="control-label">照片：</label>
			    <div class="controls">
			    <img src="<?php echo $row['图片']; ?>" alt="">
			      <input type="file" name="file"  value="<?php echo $row['图片']?>" />
			    </div>
			  </div>			  
			 <div class="control-group">
              <label class="control-label">内容：</label>
              <div class="controls">
                <textarea class="input-block-level" rows="3" name="scont" id="scont"><?php echo $row['内容']?></textarea>
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
	</div>
</body>
</html>
<?php include "foot.php"; ?>