<!DOCTYPE html> 
<html lang="zh-CN"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content=""> 
<meta name="author" content=""> 

<title>统计页面</title> 
<?php $this->load->helper('url'); ?>
<!--<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
    <link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">
	<link href="<?php echo base_url("css/bootstrap-datetimepicker.min.css");?>" rel="stylesheet">
<script src="<?php echo base_url("js/jquery-1.11.0.js");?>"></script>
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]--> 
<!--[if lt IE 9]> 
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
           <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> 
       <![endif]--> 

<style> 
.bs-docs-home 
{ 
background-color: #dfdfdf; 
background-image: url(<?php echo base_url("img/bg_noise.jpg") ?>); 
} 

.input-group
{
margin-top:3px;
margin-bottom:3px;
}
.tans-bg
{ 
background-color: rgba(255, 255, 255, 0.9);  
} 
.custinput
{ 
	display: inline-block;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 4px;
	float: left;
}
.custa
{ 
	display: inline-block;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	background-image: none;
	border-radius: 4px;
}
</style> 
</head> 

<body class="bs-docs-home">
    <div class="container theme-showcase">
        <h1 style=" line-height:2em;"> </h1><br />
      
        <div class="row">
            <div class="col-sm-3"></div>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="panel panel-primary tans-bg">
					<div class="panel-heading">
						<h2 class="panel-title"><strong><?php echo $tjinfo->tjname ?></strong></h2>
					</div>
					<div class="panel-body">
						<div class="alert alert-danger alert-dismissable" style="display:<?php if($tjinfo->remark==null) echo'none';?>;">
							<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
							<strong>注意!</strong>
							<?php echo htmlspecialchars($tjinfo->remark) ?>
						</div>
				  
						<form role="form" id="myForm" name="myForm" class="form-horizontal" action="<?php echo site_url("tongji/storetj") ?>" method="post">
						<fieldset>
							<legend><h4>统计截止日期---<?php echo $tjinfo->tjddl ?></h4></legend>
							
							<?php $x=0;?>
							<input style='display:none;' type="text" class="form-control" id="tjid" name="tjid" value="<?php echo $tjinfo->tjid ?>">
							<?php foreach($list as $key=>$value):?>
									<div class="form-group">
										<label for="IDCard" class="col-sm-3 control-label"><?php echo $value['tjkey']?></label>
										<div class="col-sm-8">	
										<?php if ($value['keytype']==2)
											{
												echo "<input type=\"text\" class=\"form-control col-sm-6\" id=\"txt".$x."\" name=\"txt".$x."\" placeholder=\"\" value=\"\" pattern='/^(\d+)\.(\d+)$/' onBlur='checkNums(this)'>";
											}
											else if ($value['keytype']==3)
											{
												echo "<div class=\"input-group date form_date col-md-12\" data-date=\"\" data-date-format=\"yyyy-mm-dd\" data-link-field=\"dtp_input1\" data-link-format=\"yyyy-mm-dd\">
													<input class=\"form-control\" size=\"16\" id=\"txt".$x."\" name=\"txt".$x."\" type=\"text\" value=\"\" readonly>
													<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-remove\"></span></span>
													<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-th\"></span></span>									
												</div>";
											}
											else if ($value['keytype']==4)
											{
												echo "
												<input style='display:none;' type=\"text\" class=\"form-control\" id=\"txt".$x."\" name=\"txt".$x."\" value=''>
							                      <div class=\"input-group-btn\">
							                        <input type=\"button\" class=\"btn btn-default btn-block dropdown-toggle\" data-toggle=\"dropdown\" id=\"XSubject1".$x."\" name=\"XSubject1".$x."\" value='选择评分▼'>
							                        <ul class=\"dropdown-menu pull-right\">
							                          <li><a href=\"#\" onClick=\"$('#XSubject1".$x."').val('1分');$('#txt".$x."').val('1');return false;\">1分</a></li>
							                           <li><a href=\"#\" onClick=\"$('#XSubject1".$x."').val('2分');$('#txt".$x."').val('2');return false;\">2分</a></li>
							                            <li><a href=\"#\" onClick=\"$('#XSubject1".$x."').val('3分');$('#txt".$x."').val('3');return false;\">3分</a></li>
							                            <li><a href=\"#\" onClick=\"$('#XSubject1".$x."').val('4分');$('#txt".$x."').val('4');return false;\">4分</a></li>
							                            <li><a href=\"#\" onClick=\"$('#XSubject1".$x."').val('5分');$('#txt".$x."').val('5');return false;\">5分</a></li>
							                        </ul>
							                      </div>";
											}
											else {
												echo "<input type=\"text\" class=\"form-control col-sm-6\" id=\"txt".$x."\" name=\"txt".$x."\" placeholder=\"\" value=\"\">";
											}
										?>
											
										
										</div>
									</div>
									<?php $x ++;?>
							<?php endforeach;?>
							<div class="form-group">
									<label for="Subject" class="col-sm-3 control-label">验证码</label>
											<div class="col-sm-8">	
												<input type="text" class="col-sm-4 custinput" id="vcode" name="vcode" placeholder="验证码" value=''>
												<div class="col-sm-4" style="display:inline-block;min-width:228px;">
													<img src="<?php echo site_url("tongji/vcode") ?>" style="height: 34px;display: inline-block;" id="verify_code" />
													<a href="javascript:changeCode();" class="custa">看不清,换一张</a>
												</div>
												
											</div>										
							</div>	
									
						
					</div>
					<!--1-->
					<div class="panel-footer">
						<button class="btn btn-primary col-md-offset-7" type="button" onclick="checkAllBoxName()">提交表格</button>
						<button class="btn btn-default " type="reset">清空输入</button>
					</div>	</fieldset>		
</form>					
				</div>
			</div>
        </div>
        
        <div class="col-sm-3"></div>
      </div>
    </div> 
    
    <script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>
		<script src="<?php echo base_url("js/bootstrap-datetimepicker.min.js");?>"></script>
	<script src="<?php echo base_url("js/bootstrap-datetimepicker.zh-CN.js");?>"></script>
	<script type="text/javascript">
	$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
   var dataOK = true;
	function checkNums(obj) {
		var str = obj.value;
		var dot = 0;
		for (var i = 0; i < str.length; i++) {
			if (str[i] == '.')
				dot++;
			else if (str[i]>='0' && str[i]<='9');
			else {
				dataOK = false;
				alert("请输入正确的数据格式！");
				obj.focus();
				return false;
			}
		}
		if (dot > 1) {
			dataOK = false;
			alert("请输入正确的数据格式！");
			obj.focus();
			return false;
		}
		dataOK = true;
		return true;
	}

	function checkAllBoxName(){
		//数字校验
		if (dataOK == false) {
			alert("请输入正确的数据格式！");
			return;
		}
		//验证码校验
		var Vcode = $.ajax( {
			url : "<?php echo site_url("tongji/vcodeconf")?>",
			async : false
		});
		var VcodeInput = $("#vcode").val();
		var VcodeCorrect = Vcode.responseText;
		if(VcodeCorrect.toUpperCase() ==  VcodeInput.toUpperCase()){
		}
		else{
			alert("验证码错误");
			return;
		}
		var readyforsubmit = true;
		for(var i = 0;i < <?echo($x-1)?>;i ++){
			if($("#txt"+i).val().length == 0){
				readyforsubmit = false;
			}
		}
		if(readyforsubmit){
			if(confirm("确定要提交吗?"))
		    { 
		      	   $("#myForm").submit();
		    }
		}
		else{
			alert("请填入信息");
		}
	}
	function changeCode(){  
         $("#verify_code").attr("src","<?php echo site_url("tongji/vcode")?>"+"?r="+Math.random());
    }  
	</script>
</body> 
</html>