<?php 
include("head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
		<!--左菜单  -->
		<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
		  </div>
		</div>
		<div class="xuanran">
			
		</div>
<?php include("foot.php"); ?>
<!-- <script>
$(function(){
	$.ajax({
		url:"apiN.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"news"
		},
		beforeSend:function(XMLHttpRequest){
			$(".xuanran").html("正在查询,请稍后...");
		},
		success:function(data,textStatus){
			console.log(data);
			if( data.code == 200){
				attr(data);
			}

		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			console.log("失败原因:" + errorThrown );
		}
	});
});
function attr(data){
	for(var i = 0;i < data.data.length; i++){
		var $a="<a href=''><img src='"+data[i].图片+" alt=''/></a>";
		var $b = "<h3>"+data.data[i].发布时间+"</h3>";
		var $c = "<h3>"+data.data[i].标题+"</h3>";
		var $d = "<h3>"+data.data[i].肩题+"</h3>";
		var $e = "<p>"+data.data[i].内容+"</p>";
		var $box = "<div id='box'>"+$a+$b+$c+$d+$e+"</div>";
		$(".xuanran").append( $box );
	}
	
}
</script> -->
<script>
	$(function(){
		$.ajax({
			url	: "apiN.php",
			type : "POST",
			dataType : "json",
			data:{
				"action":"news",
			},
			beforeSend:function(XMLHttpRequest){
				// 发送前调用此函数.一般在此编写检测代码或者loading
				$(".xuanran").html("<tr><td>正在查询,请稍后...</td></tr>");
			},
			
			success	: function(data,textStatus){
				// 请求成功后调用此函数
				// $("#studentlist :first-child").remove();
				
				// console.log(data.data);
				if (data.code==200) {
					att(data);
					
				}
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				// 请求失败后调用此函数
				console.log("错误的原因:"+errorThrown);
			}
		});
	})
	function att(data){
		console.log();
		for (var i = 0; i < data.data.length; i++) {
			var $a="<div class='title'><h2>"+data.data[i]["标题"]+"</h2></div>";
			var $b="<a href='news.php?kid="+ data.data[i]["id"] +"'><img class='pic' src="+data.data[i]["图片"] +" width='300' height='300'></a>";
			var $c="<div class='time'><span>发布时间</span>:"+data.data[i]["发布时间"]+"</div>";
			var $d="<div class='cont'><span>内容:</span>"+data.data[i]["内容"]+"</div>";
			var $e="<div class='bbb'>"+ $b+$a+$c+$d +"</div>"
			$(".xuanran").append($e);
		}
	}
</script>
<style>
	.xuanran{
		width:1100px;
		height:300px;
		/*background-color:red;*/
		float:right;
	}
	.bbb{
		width:500px;
		height:300px;
		float:left;
	}
</style>