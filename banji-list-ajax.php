
<?php include "head.php" ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include "leftmenu.php" ?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">班级修改</p>
			<table class="sui-table table-bordered">
			  <thead>
			    <tr>
			      <th>班号</th>
			      <th>班长</th>
			      <th>教室</th>
			      <th>班主任</th>
			      <th>班级口号</th>
			      <th>设置</th>
			    </tr>
			  </thead>
			  <tbody id="studentlist">
<?php
/*	if( mysqli_num_rows($result)>0 ){
		$i = 1;		
		while( $row = mysqli_fetch_assoc($result) ){
			echo "<tr>";
			echo "<td>{$i}</td>";
			echo "<td>{$row['学号']}</td>";
			echo "<td>{$row['姓名']}</td>";
			echo "<td>{$row['性别']}</td>";	
			echo "<td>{$row['出生日期']}</td>";
			echo "<td>{$row['电话']}</td>";
			echo "<td><a class='sui-btn btn-samll btn-warning' href='student-update.php?sid={$row['学号']}'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='student-del.php?sid={$row['学号']}'>删除</a></td>";
			echo "<tr>";
			$i++;
		}

	}else{
		echo "<tr><td>暂无学生记录</td></tr>";
	}*/
?>
			  </tbody>				

			</table>
<div class="test sui-pagination pagination-large">
  <ul>
    <li class="prev disabled"><a href="#">«上一页</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class="dotted"><span>...</span></li>
    <li class="next"><a href="#">下一页»</a></li>
  </ul>
  <div><span>共10页&nbsp;</span><span>
      到
      <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
      页</span></div>
</div>
		  </div>
		</div>		
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script>
$(function(){
	$.ajax({
		url:"apiB.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"class1"
		},
		beforeSend:function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>");
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				//渲染分页条
				$('.test').pagination({
				    pageSize:6,//每页显示条数
				    itemsCount:data.count,//获取记录总条数
				    styleClass: ['pagination-large'],
				    displayPage:6,
				    showCtrl: true,
				    onSelect: function (num) {
				    	console.log( num );
				        getPage(num);
				    }        
				});
				//渲染第一页数据
				renderList(data.data);
			}			
		},
		error: function(XMLHttpRequest,textStatus,errorThrown){
			console.log( "失败原因：" + errorThrown );
		}
	});
});

function getPage(pageNum){
	$.ajax({
		url:"apiB.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"class1",
			"pageNum":pageNum,
			"pageSize":6
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				renderList(data.data);
			}
		}	
	})
}

function renderList(datalist){
	var str = "";
	for (var i = 0; i < datalist.length; i++) {
		console.log(datalist[i].教室);
		// console.log( data.data[i] );
		str += "<tr><td>"+ datalist[i].班号+"</td><td>"+ datalist[i].班长+"</td><td>"+ datalist[i].教室+"</td><td>"+ datalist[i].班主任+"</td><td>"+datalist[i].班级口号+"</td><td><a class='sui-btn btn-samll btn-warning' href='banji-update.php?kid="+datalist[i].班号+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='banji-del.php?kid="+datalist[i].班号+"'>删除</a></td></tr>";
		// var $a="<td>"+datalist[i].班号+"</td>";
		// var $b = "<td>"+datalist[i].班长+"</td>";
		// var $c = "<td>"+datalist[i].教室+"</td>";
		// var $d = "<td>"+datalist[i].班主任+"</td>";
		// var $e = "<td>"+datalist[i].班级口号+"</td>";
		// var $f = "<td>"+datalist[i].设置+"</td>";
		// str +="<tr>"+ $a+$b+$c+$d+$e+$f+"</tr>";
	}
	$("#studentlist").html( str );	
}
</script>