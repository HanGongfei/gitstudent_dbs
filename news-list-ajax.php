<?php 

include("conn.php");
//执行SQL语句
$sql = "select * from news";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);
 ?>
<?php include("head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
		  	<!-- 左菜单 -->
		  	<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻管理</p>
			<table class="sui-table table-bordered">
				<tr>
					<th>id</th>
					<th>标题</th>
					<th>肩题</th>
					<th>图片</th>
					<th>内容</th>
					<th>发布时间</th>
					<th>创建时间</th>
					<th>userid</th>
					<th>columnid</th>
					<th>设置</th>
				</tr>
				<tbody id="studentlist">
						
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
<?php include "foot.php"; ?>
<script>
$(function(){
  $.ajax({
    url:"apiN.php",
    type:"POST",
    dataType:"json",
    data:{
      "action":"news"
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
            displayPage:5,
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
      //请求失败后调用此函数
      console.log( "失败原因：" + errorThrown );
    }
  });
});

function getPage(pageNum){
  $.ajax({
    url:"apiN.php",
    type:"POST",
    dataType:"json",
    data:{
      "action":"news",
      "pageNum":pageNum,
      "pageSize":6
    },
    success:function(data,textStatus){
      // console.log( data );
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
		str += "<tr><td>"+ datalist[i].id+"</td><td>"+ datalist[i].标题+"</td><td>"+ datalist[i].肩题+"</td><td>"+ datalist[i].图片+"</td><td>"+datalist[i].内容+"</td><td>"+datalist[i].发布时间+"</td><td>"+datalist[i].创建时间+"</td><td>"+datalist[i].userid+"</td><td>"+datalist[i].columnid+"</td><td><a class='sui-btn btn-samll btn-warning' href='news-update.php?sID="+datalist[i].id+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='news-del.php?sID="+datalist[i].id+"'>删除</a></td></tr>";
	}
	$("#studentlist").html( str );	
}
</script>
