<!DOCTYPE HTML>
<html>
	<head>
	<?php $this->load->helper('url'); ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
		<title>Easy统计-使用指南</title>
		<!--<link rel="stylesheet" href="css/demo.css">
		<link rel="stylesheet" href="css/timeliner.css">
		<link rel="stylesheet" href="css/timeliner_styling.css">-->
		 <link href="<?php echo base_url("css/demo.css");?>" rel="stylesheet">
		  <link href="<?php echo base_url("css/timeliner.css");?>" rel="stylesheet">
		   <link href="<?php echo base_url("css/timeliner_styling.css");?>" rel="stylesheet">
		       <link href="<?php echo base_url("css/landing-page.css");?>" rel="stylesheet">
		   
		<script src="<?php echo base_url("js/jquery-1.11.0.js");?>"></script>
		<script src="<?php echo base_url("js/jquery.timeliner.min.js");?>"></script>
		<script>
			$(document).ready(function(){

				// EXAMPLE 1:
				$('#example1').timeliner();


			});

			// Callback function examples:
			function start_callback(id){
				if(id=='example1'){
					$('#callback_log').html('Timeliner "'+id+'" started');
				}
			}
			function newslide_callback(id, slide){
				if(id=='example1'){
					$('#callback_log').html('Timeliner "'+id+'" changed to slide '+slide);
				}
			}
			function end_callback(id){
				if(id=='example1'){
					$('#callback_log').html('Timeliner "'+id+'" ended');
				}
			}
			function paused_callback(id, slide){
				if(id=='example1'){
					$('#callback_log').html('Timeliner "'+id+'" paused at slide '+slide);
				}
			}
			function resumed_callback(id, slide){
				if(id=='example1'){
					$('#callback_log').html('Timeliner "'+id+'" resumed at slide '+slide);
				}
			}
			function click_callback(id, slide){
				if(id=='example1'){
					$('#callback_log').html('Clicked on slide '+slide+' of Timeliner "'+id+'"');
				}
			}
		</script>
		<style>
		.bs-docs-home 
{ 
background-color: #dfdfdf; 
background-image: url(<?php echo base_url("img/intro-bg.jpg")?>); 
} ;
.titlecss{
margin: 0;
text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
font-size: 5em;
}
		</style>
	</head>
	<body class="bs-docs-home">
		<div id="content">
		  <div style="margin-top:50px;">
			<h1><font color="#FFFFFF">Easy统计-使用指南</font></h1>
			<noscript>
				<div id="noscript"></div>
			</noscript>
			<div>
<div style="margin-top:60px;">
			<ul id="example1" class="timeliner">
				<li title="创建统计功能" style="background:url(<?php echo base_url("img/s0.png")?>)" lang="5"></li>
				<li title="输入统计信息" lang="5" style="background:url(<?php echo base_url("img/s1.png")?>)"></li>
				<li title="创建成功" style="background:url(<?php echo base_url("img/s2.png")?>)" lang="5"></li>
				<li title="参与统计页面" lang="5" style="background:url(<?php echo base_url("img/s3.png")?>)"></li>
				<li title="结果查询功能" style="background:url(<?php echo base_url("img/s4.png")?>)" lang="5"></li>
				<li title="结果查询页面" style="background:url(<?php echo base_url("img/s5.png")?>)" lang="5"></li>
				<li title="导出的Excel" style="background:url(<?php echo base_url("img/s6.png")?>)" lang="5"></li>
			</ul>
			
			<br>
</div>
		</div>
	</body>
</html>