<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Easy统计-联系我们</title>

<?php $this->load->helper('url'); ?>
<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
    <link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">
<style>
.titlecss{
	margin-top:5%;
}
.bs-docs-home 
{ 
background-color: #dfdfdf; 
background-image: url(<?php echo base_url("img/intro-bg.jpg") ?>); 
} 
.post {
position: relative;
background: #fff;
margin-bottom: 30px;
border-radius: 0;
padding: 10px 20px;
opacity: .9;
}
.post-content {
font-size: 16px;
line-height: 1.8;
padding-top: 20px;
padding-bottom: 20px;
}
@-webkit-keyframes main { 
	0% {
	    -webkit-transform: scale3d(0.1, 0.1, 1);
	    opacity: 0;
	}
	45% {
	    -webkit-transform: scale3d(1.07, 1.07, 1);
	    opacity: 1;
	}
	70% { -webkit-transform: scale3d(0.95, 0.95, 1) }
	100% { -webkit-transform: scale3d(1, 1, 1) }
}
@-moz-keyframes main { 
	0% {
	    -moz-transform: scale(0.1, 0.1);
	    opacity: 0;
	}
	45% {
	    -moz-transform: scale(1.07, 1.07);
	    opacity: 1;
	}
	70% { -moz-transform: scale(0.95, 0.95) }
	100% { -moz-transform: scale(1, 1) }
}
#main{
    animation: main .8s 1;
    animation-fill-mode: forwards;
    -webkit-animation: main .8s 1;
    -webkit-animation-fill-mode: forwards;
    -moz-animation: main .8s 1;
    -moz-animation-fill-mode: forwards;
    -o-animation: main .8s 1;
    -o-animation-fill-mode: forwards;
    -ms-animation: main .8s 1;
    -ms-animation-fill-mode: forwards;
}
</style>
</head>
<body class="bs-docs-home ">
    <div id="main" class="container" >
        <div class="col-md-offset-3 col-lg-6 titlecss post">           
			
			<!--<div class="panel-heading">
						<h2 class="panel-title"><strong>联系我们</strong></h2>
			</div>-->
			<div class="panel-body post-content">
					   <form role="form" name="form1" id="myForm" class="form-horizontal" action="<?php echo site_url("tongji/createtj") ?>" method="post">
						<fieldset>
							<legend><strong>联系我们</strong></legend>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">通讯地址:</label>
									<div class="col-sm-8">	
										<label for="IDCard" class=" control-label">江苏省南京市玄武区孝陵卫200号</label>
									</div>
								</div>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">E-mail:</label>
									<div class="col-sm-8">	
										<label for="IDCard" class=" control-label">316318973@qq.com</label>
									</div>
								</div>
								<div class="form-group">
									<label for="IDCard" class="col-sm-3 control-label">OICQ:</label>
									<div class="col-sm-8">	
										<label for="IDCard" class=" control-label">316318973</label>
									</div>
								</div>
								</fieldset>
								</form>
			</div>

			
  </div>
    </div>
</body>
</html>