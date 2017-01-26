<!DOCTYPE html> 
<html lang="zh-CN"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content=""> 
<meta name="author" content=""> 

<title>新建统计页-Easy统计</title> 

<!--<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css">

<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]--> 
<!--[if lt IE 9]> 
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
           <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> 
       <![endif]--> 

<style> 
.bs-docs-home 
{ 
background-color: #0B0434; 
background-image: url(http://localhost/CI/img/intro-bg.jpg); 
} 

.input-group
{
margin-top:3px;
margin-bottom:3px;
}

</style> 
<script type="text/javascript">

var textNumber = 1;
function addTextBox() {
  // Increment the textbox number
  textNumber++;
  // Create the textbox
  var inGroup = document.createElement("div");
  var sub = document.createElement("input");
  var hidsub = document.createElement("input");
  var grpBtn = document.createElement("div");
  var xsub = document.createElement("input");
  var ul = document.createElement("ul");
  var li1 = document.createElement("li");
  var li2 = document.createElement("li");
  var li3 = document.createElement("li");
  inGroup.setAttribute("class","input-group");
  inGroup.setAttribute("id","fields"+textNumber);
  
  sub.setAttribute("id","Subject"+textNumber);
  sub.setAttribute("type","text");
  sub.setAttribute("class","form-control");
  sub.setAttribute("name","Subject"+textNumber);
  sub.setAttribute("placeholder","属性#"+textNumber);

  hidsub.setAttribute("id","SType"+textNumber);
  hidsub.setAttribute("type","text");
  hidsub.setAttribute("class","form-control");
  hidsub.setAttribute("name","SType"+textNumber);
  hidsub.setAttribute("style","display:none;");
  hidsub.setAttribute("value","0");
  
  grpBtn.setAttribute("class","input-group-btn");
  xsub.setAttribute("id","XSubject"+textNumber);
  xsub.setAttribute("type","button");
  xsub.setAttribute("class","btn btn-default dropdown-toggle");
  xsub.setAttribute("data-toggle","dropdown");
  xsub.setAttribute("name","XSubject"+textNumber);
  xsub.setAttribute("value","数据类型▼");

  ul.setAttribute("class","dropdown-menu pull-right");
  li1.innerHTML = "<a href='#' onClick=\"$(\'#XSubject"+textNumber+"\').val(\'文本类型\');$(\'#SType"+textNumber+"\').val(\'1\');return false;\">文本类型</a>";
  li2.innerHTML = "<a href='#' onClick=\"$(\'#XSubject"+textNumber+"\').val(\'数字类型\');$(\'#SType"+textNumber+"\').val(\'2\');return false;\">数字类型</a>";
  li3.innerHTML = "<a href='#' onClick=\"$(\'#XSubject"+textNumber+"\').val(\'日期类型\');$(\'#SType"+textNumber+"\').val(\'3\');return false;\">日期类型</a>";

  ul.appendChild(li1);
  ul.appendChild(li2);
  ul.appendChild(li3);
  grpBtn.appendChild(xsub);
  grpBtn.appendChild(ul);
  inGroup.appendChild(sub);
  inGroup.appendChild(hidsub);
  inGroup.appendChild(grpBtn);

  var pElement = document.getElementById("fields");
  pElement.appendChild(inGroup);
  //var afterElement = document.getElementById("fields"+(textNumber-1));
  //var pElement = afterElement.parentNode;
  //pElement.insertAfter(inGroup,afterElement);
  return false;
}
function removeTextBox() {
  var form = document.getElementById("fields"+textNumber).parentNode;
  if (textNumber > 1) { // If there's more than one text box
    // Remove the last one added
    form.removeChild(document.getElementById("fields"+textNumber));
    textNumber--;
  }
}
</script>
</head> 

<body class="bs-docs-home">
    <div class="container theme-showcase">
        <h1 style=" line-height:2em;"> </h1><br />
      
        <div class="row">
            <div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title"><strong>新建统计</strong></h2>
					</div>
					<div class="panel-body">
						<!--<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>注意!</strong> 为了给更多人提供便捷，统计数据会在截止日期后5天以内删除
						</div>-->
				  
						<form role="form" name="form1" class="form-horizontal" action="tongji/createtj" method="post">
						<fieldset>
							<legend><h4>统计表---基本信息</h4></legend>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">结果接收邮箱</label>
									<div class="col-sm-8">	
										<input type="email" class="form-control col-sm-6" id="email" name="email" placeholder="E-mail地址" value='' required  >
									</div>
								</div>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">统计表名</label>
									<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="tjname" name="tjname" placeholder="统计表名" value=''>
									</div>
								</div>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">统计截止时间</label>
									<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="ddl" name="ddl" placeholder="统计截止时间" value=''>
									</div>
								</div>
								<legend><h4>统计表---统计内容</h4></legend>
								<div class="form-group">
									<label for="Subject" class="col-sm-3 control-label">统计表项</label>
									<div class="col-sm-8" id="fields">
										<div class="input-group" id="fields1">
										
											<input type="text" class="form-control" id="Subject1" name="Subject1" placeholder="属性#1" value=''>
											<input style='display:none;' type="text" class="form-control" id="SType1" name="SType1" value='0'>
											<div class="input-group-btn">
												<input type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="XSubject1" name="XSubject1" value='数据类型▼'>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" onClick="$('#XSubject1').val('文本类型');$('#SType1').val('1');return false;">文本类型</a></li>
													<li><a href="#" onClick="$('#XSubject1').val('数字类型');$('#SType1').val('2');return false;">数字类型</a></li>
													<li><a href="#" onClick="$('#XSubject1').val('日期类型');$('#SType1').val('3');return false;">日期类型</a></li>
												</ul>
											</div>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3"></div>
									<div class="col-sm-8">
									<input class="btn btn-primary" type="button" value="增加栏位" onClick="addTextBox()" />
									<input class="btn btn-success" type="button" value="删除栏位" onClick="removeTextBox()" />
									</div>
								</div>
							</fieldset>				
						
					</div>
					<!--1-->
					<div class="panel-footer">
						<button class="btn btn-primary col-md-offset-7" type="submit">创建统计</button>
						<button class="btn btn-primary btn-danger ">返回首页</button>
					</div>	
</form>					
				</div>
			</div>
        </div>
        
        <div class="col-sm-3"></div>
      </div>
    </div> 
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> 
<script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script> 
</body> 
</html>
