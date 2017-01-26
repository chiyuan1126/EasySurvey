<!DOCTYPE html>
<html lang="zh-CN">

<head>
<?php $this->load->helper('url'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url("css/landing-page.css");?>" rel="stylesheet">
 <link href="<?php echo base_url("css/grayscale.css");?>" rel="stylesheet">
	<link href="<?php echo base_url("css/bootstrap-datetimepicker.min.css");?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url("font-awesome-4.1.0/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">
    <!--<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style> 
.input-group
{
margin-top:3px;
margin-bottom:3px;
}
.model-bgcol 
{ 
background-color:#428bca;
}
.custinput
{ 
	display: block;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 4px
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
function checkAllBoxName(){
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

	//校验表单是否存在空值
	if($("#email").val().length==0){
		alert("请输入用于接收提取码的邮箱帐号");
		return;
	}
	if($("#tjname").val().length==0){
		alert("请输入表名");
		return;
	}
	if($("#ddl").val().length==0){
		alert("请输入统计截止时间");
		return;
	}
	for(count=1;count<=textNumber;count++){
		if($("#Subject"+count).val().length==0){
			alert("请填入表项"+count+"的名称");
			return;
		}
		if($("#SType"+count).val()=="0") {
			alert("请选择表项"+count+"的数据类型");
			return;
		}
	}
	
  if (confirm("确认提交？")) {
     $("#myForm").submit();
  }
}
function changeCode(){  
         $("#verify_code").attr("src","<?php echo site_url("tongji/vcode")?>"+"?r="+Math.random());
    }  
</script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">Easy</span> 统计
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#myModal" data-toggle="modal">Create</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#resultModal" data-toggle="modal">Result</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url("tongji/contact") ?>" target="_blank">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Easy统计</h1>
                        <h3>一种新的、快捷的、简便的统计方式</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-align-left fa-fw"></i> <span class="network-name">开始统计</span></a>
							</li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#resultModal"><i class="fa fa-search fa-fw"></i> <span class="network-name">结果查询</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url("tongji/gethtu") ?>" class="btn btn-default btn-lg" target="_blank"><i class="fa fa-question-circle fa-fw"></i> <span class="network-name">使用说明</span></a>
                            </li>
                        </ul>
                    </div>
			
                </div>

            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">传统的方式：<br>by Computer</h2>
                    <p class="lead">同参与或发起网上调查类似，通过电脑来新建统计、填写他人发起的统计以及查询您的统计结果</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url("img/dog.png")?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">现代的方式<br>by Pad</h2>
                    <p class="lead">当然，我们也支持您在平板电脑完成上述操作</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url("img/ipad.png")?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">快捷的方式<br>By Phone</h2>
                    <p class="lead">更重要的是，通过您随身携带的手机，在任意时候，您都可以方便地创建、分发或者是参与他人的统计.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url("img/phones.png")?> " alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>开始一次新的统计体验吧!</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-align-left fa-fw"></i> <span class="network-name">开始统计</span></a>
                        </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#resultModal"><i class="fa fa-search fa-fw"></i> <span class="network-name">结果查询</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-question-circle fa-fw"></i> <span class="network-name">使用说明</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
								<!--yc add-->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel" >新建统计</h4>
      </div>
      <div class="modal-body">
       <!--yc-->
	   <form role="form" name="form1" id="myForm" class="form-horizontal" action="<?php echo site_url("tongji/createtj") ?>" method="post">
						<fieldset>
							<legend><h4>统计表--基本信息</h4></legend>
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
									<label for="IDCard" class="col-sm-3 control-label">备注说明</label>
									<div class="col-sm-8">	
										<textarea class="form-control col-sm-6" id="remark" name="remark" placeholder="备注说明" value=''></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">统计截止时间</label>
									<!--<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="ddl" name="ddl" placeholder="统计截止时间" value=''>
									</div>-->
									<!--yc add 8-27-->
									<div class="col-sm-8">
									<div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
										<input class="form-control" size="16" id="ddl" name="ddl" type="text" value="" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
									</div>
									</div>
									<!--end-->
								</div>
								<legend><h4>统计表--统计内容</h4></legend>
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
							<div class="form-group">
									<label for="Subject" class="col-sm-3 control-label">验证码</label>
											<div class="col-sm-8">	
												<input type="text" class="col-sm-4 custinput" id="vcode" name="vcode" placeholder="验证码" value=''>
													<img src="<?php echo site_url("tongji/vcode") ?>" class="col-sm-3" id="verify_code" />
													<a href="javascript:changeCode();" >看不清,换一张</a>
												
											</div>										
							</div>			 
				<!--<img src="<?php //echo site_url("tongji/vcode") ?>" alt="验证码" id="verify_code" style="float:left;" />-->
				<!---->
		  
							</fieldset>	
							
	   <!--yc---->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="checkAllBoxName()">创建统计</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<!--model--->
<!-- Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">结果查询</h4>
      </div>
      <div class="modal-body">
	   <form role="form" name="form1" id="myForm" class="form-horizontal" action="<?php echo site_url("tongji/showtjdata") ?>" method="post">
	   <div class="form-group">
        <label for="IDCard" class="col-sm-3 control-label">结果提取码</label>
									<div class="col-sm-8">	
										<input type="text" class="form-control col-sm-6" id="tjget" name="tjget" placeholder="请输入提取码" value=''>
									</div>
									</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary" >查询</button>
      </div>
	  </form>
    </div>
  </div>
</div>	
<!--modal end-->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<ul class="list-inline">
                        <li>
                            <a href="#home">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>-->
					
                    <p class="copyright text-muted small">如有建议或者需要更专业完善的服务，请联系yuanchi_0099@163.com </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url("js/jquery-1.11.0.js");?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>
<!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url("js/grayscale.js");?>"></script>
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
	</script>
</body>

</html>
