<?php include("head.php"); ?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生录入</p>
			<table class="sui-table table-bordered">
				<thead>
				<tr>
					<th>id</th>
					<th>学号</th>
					<th>班号</th>
					<th>照片</th>
					<th>姓名</th>
					<th>出生日期</th>
					<th>性别</th>
					<th>电话</th>
					<th>设置</th>
				</tr>
			</thead>
			<tbody id="studentlist"></tbody>
			
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

<?php include("foot.php"); ?>

<script>
$(function(){
    $.ajax({
      url:"apiS.php",
      type:"POST",
      data:{
        "action":"student"
      },
      dataType:"json",
      beforeSend:function(XMLHttpRequest){
        $("#studentlist").html("正在查询请稍后.......");
      },
      success:function(data,textStatus){
        console.log(data);
        if (data.code="200") {
            $("#studentlist").empty();
              for (var i = 0; i < data.data.length; i++) {
                    $trs=$("<tr></tr>");
                    $a1=$("<td><a class='sui-btn btn-small btn-warning' href='student-update.php?kid="+data.data[i].id+"'>修改</a>   <a class='sui-btn btn-small btn-danger' href='student-del.php?kid="+data.data[i].id+"'>删除</a></td>");
                    for(var j in data.data[i]){
                          $tds=$("<td></td>");
                      if (j=="性别"){
                         if (data.data[i].性别==0) {
                              $tds.html("女");
                         }else{
                              $tds.html("男");
                         }
                      }else{
                        $tds.html(data.data[i][j]);

                      }
                      $trs.append($tds);
                      $trs.append($a1);
                    }
                    $("#studentlist").append($trs);
              }
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
        }
      },
      error:function(XMLHttpRequest,textstatus,errorThrown){
        console.log("失败原因".errorThrown)
      }
    });
    return false;
  });
function getPage(pageNum){
  $.ajax({
    url:"apiS.php",
    type:"POST",
    dataType:"json",
    data:{
      "action":"student",
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
</script>
<!-- <script type="text/html" id="templatel">
  {{each arr val idx}}
    <tr>
      <td>{{val.id}}</td>
      <td>{{val.学号}}</td>
      <td>{{val.班号}}</td>
      <td>{{val.姓名}}</td>
      <td>{{val.性别}}</td>
      <td>{{val.出生日期}}</td>
      <td>{{val.电话}}</td>
    </tr>
  {{/each}}
</script>
<script>
  $(function(){
    $.ajax({
      url:"api.php",
      type:"POST",
      data:{
        "action":"student"
      },
      dataType:"json",
      beforeSend:function(XMLHttpRequest){
        $("#studentlist").html("正在查询请稍后.......");
      },
      success:function(data,textStatus){
        if (data.code="200") {
          // var arr = data.data
          var htm= template('template1',{"arr":data.data});
          $("#studentlist").html(htm);
        }
      },
      error:function(XMLHttpRequest,textstatus,errorThrown){
        console.log("失败原因".errorThrown)
      }
    })
    return false;
  })

</script> -->
