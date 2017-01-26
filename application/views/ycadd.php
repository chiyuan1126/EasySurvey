<!DOCTYPE html> 
<html lang="zh-CN"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content=""> 
<meta name="author" content=""> 

<title>测试页</title> 

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
background-color: #1B31B1; 
background-image: url(http://localhost/CI/img/intro-bg.jpg); 
} 
</style> 
<script type="text/javascript">
var textNumber = 1;
function addTextBox() {
  // Increment the textbox number
  textNumber++;
  // Create the textbox
  var tr = document.createElement("tr");
  var td1 = document.createElement("td");
  var td2 = document.createElement("td");
  var textField = document.createElement("input");
  var selectField = document.createElement("select");
  var opt1 = document.createElement("option");
  var opt2 = document.createElement("option");
  var opt3 = document.createElement("option");
  var opt4 = document.createElement("option");
  textField.setAttribute("type","text");
  textField.setAttribute("class","form-control col-sm-6");
  textField.setAttribute("name","txt"+textNumber);
  textField.setAttribute("id","txt"+textNumber);
  textField.setAttribute("placeholder","表项#"+textNumber);
  td1.appendChild(textField);

  selectField.setAttribute("class","form-control col-sm-1");
  selectField.setAttribute("id","type"+textNumber);
  selectField.setAttribute("name","type"+textNumber);
  opt1.setAttribute("value","-1");opt1.innerHTML = "数据类型";selectField.appendChild(opt1);
  opt2.setAttribute("value","text");opt2.innerHTML = "文本";selectField.appendChild(opt2);
  opt3.setAttribute("value","number");opt3.innerHTML = "数字";selectField.appendChild(opt3);
  opt4.setAttribute("value","time");opt4.innerHTML = "时间";selectField.appendChild(opt4);
  td2.appendChild(selectField);

  tr.appendChild(td1);
  tr.appendChild(td2);
  tr.setAttribute("id", "attr"+textNumber);
  var afterElement = document.getElementById("Actions");
  var form = afterElement.parentNode;
  form.insertBefore(tr,afterElement);
  return false;
}
function removeTextBox() {
  var form = document.getElementById("Actions").parentNode;
  if (textNumber > 1) { // If there's more than one text box
    // Remove the last one added
    form.removeChild(document.getElementById("attr"+textNumber));
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
							<strong>注意!</strong> 本站查询的分数来源于12333官网，详情请到官网咨询
						</div>-->
				  
						<form role="form" name="form1" class="form-horizontal">
						<fieldset>
							<legend><h4>统计表---基本信息</h4></legend>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">结果接收邮箱</label>
									<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="IDCard" name="IDCard" placeholder="E-mail地址" value=''>
									</div>
								</div>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">统计表名</label>
									<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="IDCard" name="IDCard" placeholder="统计表名" value=''>
									</div>
								</div>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">统计截止时间</label>
									<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="IDCard" name="IDCard" placeholder="统计截止时间" value=''>
									</div>
								</div>
								<legend><h4>统计表---统计内容</h4></legend>
								<div class="form-group">
									<label for="Subject" class="col-sm-3 control-label">统计表项</label>
									<div class="col-sm-8">
										<div class="input-group">
										
											<input type="text" class="form-control" id="Subject" name="Subject" placeholder="属性#1" value=''>
											<div class="input-group-btn">
												<input type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" id="XSubject" name="XSubject" value='数据类型▼'></button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#" onClick="$('#XSubject').val('文本类型');">文本类型</a></li>
													<li><a href="#" onClick="$('#XSubject').val('数字类型');">数字类型</a></li>
													<li><a href="#" onClick="$('#XSubject').val('日期类型');">日期类型</a></li>
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
						</form>
					</div>
					<!--1-->
					<div class="panel-footer">
						<button class="btn btn-primary col-md-offset-7" type="submit">创建统计</button>
						<button class="btn btn-primary btn-danger " type="submit">返回首页</button>
					</div>					
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