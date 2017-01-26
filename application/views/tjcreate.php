<!DOCTYPE HTML>
<html>
<head>
	<title>Easy统计-新建统计</title>
	<meta http-equiv="Content-Type"content="text/html; chatset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

<!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="signin.css" rel="stylesheet">
<script type="text/javascript" src="/bootstrap/js/jquery-2.0.2.min.js"></script>
-->
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000498734'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1000498734%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
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
function checkBoxName(num){
	for(count=1;count<=textNumber;count++){
		if(count==num){
		}
		else{
			if($("#txt"+textNumber).val()==$("#txt"+count).val()){
				alert("属性名重复"+count);
			}
		}
	}
}
function checkAllBoxName(){
	for(count=1;count<=textNumber;count++){
		if($("#txt"+count).val().length==0){
			alert("存在空表项名");
			return;
		}
		if($("#type"+count).val()=="-1") {
			alert("请选择表项"+count+"的数据类型");
			return;
		}
	}
	for(count=1;count<=textNumber;count++){
		for(count1=1;count1<=textNumber;count1++){
			if(count1==count){
			}
			else{
				if($("#txt"+count).val()==$("#txt"+count1).val()){
					alert("存在重复的表项名");
					return;
				}
			}
		}
	}
	$("#myForm").submit();
}
//-->
</script>
<!--
<style type="text/css">
label {display:block;}
</style>-->
</head>
<body>
	<div class="container">
		<div class="header" style="margin:30px;">
			<h2 class="text-center">新建统计</h2>
		</div>
		<div class="row">
			<form id="myForm" class="form-horizontal" method="post" action="tjdata.php" role="form"/>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">接收邮箱</label>
					<div class="col-sm-7">	
						<input type="text" class="form-control" placeholder="请输入结果提取码接收邮箱" name="email" id="email" required autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-sm-3 control-label">统计表名</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" placeholder="请输入表名" name="title" id="title" required autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="datetimepicker" class="col-sm-3 control-label">截止时间</label>
					<div class="col-sm-7">	
						<input type="text" value=""  placeholder="统计截止时间" id="datetimepicker" class="form-control"/>
					</div>
				</div>
				
<?php
include('dowith.php');
$tbid=getRandStr(10);
echo "<input type='text' name='stuid' style='display:none;' value=$tbid>";
$tbno=getRandStr(10);
echo "<input type='text' name='tbno' style='display:none;' value=$tbno>";
?>
				<label class="col-sm-3 control-label">统计内容</label>
				<div class="form-group col-sm-7">
					<table class="table">
						<tr id="attr1">
							<td><input type="text" class="form-control col-sm-6" name="txt1" id="txt1" placeholder="表项#1" required></td>
							<td><select class="form-control col-sm-1" name="type1" id="type1" required>
									<option value="-1">数据类型</option>
									<option value="text">文本</option>
									<option value="number">数字</option>
									<option value="time">时间</option>
								</select>
							</td>
						</tr>
						<tr id="Actions">
							<td><input class="btn" type="button" value="增加栏位" onClick="addTextBox()" /></td>
							<td><input class="btn" type="button" value="删除栏位" onClick="removeTextBox()" /></td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-primary btn-block" type="button" onclick="checkAllBoxName()" value="创建统计" /></td>
						</tr>
					</table>
				</div>
	
</form>
</div>
</div>
</body>
<script type="text/javascript">
$('#datetimepicker').datetimepicker({
	lang:'ch',
	timepicker:false,
	format:'Y/m/d',
	formatDate:'Y/m/d',
});	
</script>
</html>
