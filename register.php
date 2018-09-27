	<?php include("01_head.php"); ?>
			<form class="sui-form form-horizontal sui-validate" action="register-save.php" method="post" id="form1">

				  <div class="control-group">
				    <label for="inputEmail " class="control-label .input-fat">邮箱：</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" placeholder="请输入邮箱" class="input-fat input-large" name="mali" data-rules="required|minlength=2|maxlength=30">
				     <!--  <span id=""></span> -->
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
				      <input type="password" id="password" placeholder="请输入密码	" class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12">
				    </div>
				  </div>

				  <div class="control-group">
				    <label for="word" class="control-label">重复密码：</label>
				    <div class="controls">
				      <input type="password" id="word" placeholder="请输入重复密码	" class="input-fat input-large" name="word"data-rules="required|minlength=2|maxlength=12">
				    </div>
				  </div>
				<div class="control-group">
				    <label for="yzm" class="control-label">验证码：</label>
				    <div class="controls">
				      <input type="input" id="yzm" placeholder="请输入重复密码	" class="input-fat input-large" name="yzm" data-rules="required|minlength=4|maxlength=4">
				    </div>
				    
				  </div>
				  <input type="text" id="code_btn" >
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
				      <button type="submit" class="sui-btn btn-primary" id="cha">提交</button>
				    </div>
				  </div>
				</form>
<?php include("02_foot.php") ?>
<script>
$("bytton[type = submit]").on("click",function(){
	$.ajax({
		url : "register-save-ajax.php",
		type:"POST",
		data:$("#form1").serialize(),
		success:function(data,textStatus){
			//请求成功后调用此函数
			console.log(data);
			if( data.code == 200){
				$(".pp").slideDown(2000,function(){
					window.location.href = "login.php";
				});
			}
			if( data.code == 20001){
				//提示密码错误
			}
			if( data.code == 20004){
				//提示邮箱填写错误
			}
		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log("失败原因:" + errorThrown);
		}
	});
	return false;
});
</script>
<script>
	
var code_btn=document.getElementById('code_btn');
	getCodeFn();
	code_btn.onclick=getCodeFn;
function getCodeFn(){
	var strArry=["0","1","2","3","4","5","6","7","8","9","a","b",'c','d','e','f','h','i','g','k','l','m','m','o','p','q','r','s','t','u','v','w','x','y','z',"A","B",'C','D','E','F','G','I','G','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var code_str="",num;
	for (var i = 0; i <4; i++) {
		num=parseInt(Math.random()*strArry.length);
		code_str+=strArry[num];
		
	}
	code_btn.value=code_str;

}	
	var cha=document.getElementById('cha');
	var yzm=document.getElementById('yzm');
	
	cha.onclick=function(){	
	var neirong=yzm.value.toUpperCase();
	var password=document.getElementById('password').value;
	var word=document.getElementById('word').value;	
		// var yzm_in=yzm.Value;
		if(neirong==code_btn.value.toUpperCase()){
			alert("验证通过");
		}else if(yzm.value.length==0){
			alert("请输入验证码");
		}else{
			alert("验证有误");
			$("form").attr("action","register.php");
			history.go(0); 
		}
		if (password==word){
			alert("密码一致通过");
		}else{
			alert("密码不一致");
			$("form").attr("action","register.php");
			history.go(0);
		}
	}
</script>
<script>
var inputEmail=document.getElementById("inputEmail"); 
var tips=document.getElementById("tips");
 inputEmail.onblur = function(){
      //第一步:判断是否有xmlhttprequest对象
        if(window.XMLHttpRequest){
             var xhr = new XMLHttpRequest();
        }else{
             var xhr = new ActiveObject("Msxml2.XMLHTTP");
        }
        console.log(xhr);
        //2,调用这个状态改变方法
        xhr.onreadystatechange = function(){
        	console.log(xhr.responseText);
             if(xhr.readyState == 4){
                  console.log(xhr.responseText);
                  if(xhr.status == 200){
                    console.log(xhr.responseText);
                    if(xhr.responseText == "on"){
                       alert("已经注册");
                    }else{
                       alert("还可以注册");
                    }
                  }
             }
        }
        //3,
        xhr.open("get","register-save.php?emali="+inputEmail.value,true);
        xhr.send(null);
}
</script>
