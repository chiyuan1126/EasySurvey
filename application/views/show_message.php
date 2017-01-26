<!DOCTYPE html> 
<html lang="zh-CN"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content=""> 
<meta name="author" content=""> 

<title>Easy统计-结果查询</title> 
<?php $this->load->helper('url'); ?>
<!--<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
    <link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">

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
</style> 
<script type="text/javascript">
function downloadxls(){
	//验证码校验

} 
</script>
</head> 

<body class="bs-docs-home">
 
		<div class="container">
		<h1 style=" line-height:2em;"> </h1>
		<div class="panel panel-primary tans-bg">
		<div class="panel-heading">
						<h2 class="panel-title"><strong><?php echo $tjname; ?>（共有<?php echo $totalnum; ?>条记录）</strong></h2>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
							<thead>
							<tr>  
							<?php foreach($listkey as $key=>$value):?>
							<th><?php echo $value['tjkey']?></th>
							<?php endforeach;?>
							</tr>        
							</thead> 
							<tbody>
							<?php $cr=0;?> 		
							<tr>
							<?php foreach($listvalue as $key=>$value):?>
							<?php if(($cr%$numrow)==0){echo "</tr><tr>";} ?>
							<td><?php echo $value['tjvalue']?></td>
							<?php $cr++; ?>
							<?php endforeach;?>
							</tr>        
							
							</tbody>
							</table> 
						</div>	
				</div>	
					<div class="panel-footer">
            <div style="height:30px;text-align:right">
				<?php echo $links;?>	
			</div> 
					<div class="container">
						<button class="btn btn-primary " onclick="javascript:window.location.href='<?php echo site_url("tongji/download")."/".$tjgetid; ?>'">导出Excel</button>
				<button class="btn btn-success" onclick="javascript:window.location.href='<?php echo site_url(); ?>'">返回首页</button>
						<!--<button class="btn btn-primary btn-danger " type="reset">导出Excel</button>-->
					</div>					
			</div>
		</div> 
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url("js/jquery-1.11.0.js");?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("js/bootstrap.min.js");?>"></script>
</body> 
</html>
