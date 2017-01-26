<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Easy统计-创建成功</title>
<?php $this->load->helper('url'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/404.css") ?>">
    <link href="<?php echo base_url("css/bootstrap.min.css");?>" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>

<!--<script type="text/javascript" src="../lib/jquery.js"></script>-->
<style type="text/css">
a, p, div {
	text-shadow:none;
	text-decoration:none;
}
.hidden{display:none;}
.xlkm-share
{
    position:fixed;
    bottom:0;
    width:100%;
    height:300px;
    background-color:rgba(250,250,250,0.9);
}

.xlkm-share .cancel
{
    border-top:1px solid #888888;
    width:100%;
    height:60px;
    text-align:center;
    font-size:1.3em;
    line-height:60px;
	cursor: pointer;
}

.share-btn
{
    width:100%;
    height:240px;
    text-align:center;
}

.btn-item{
    background-size: 50px;
    background-position: center;
    width:25%;
    height:50px;
    margin:0;
    margin-top:28px;
}

.bdsharebuttonbox 
{
    height:90px;
    text-align:center;
}

.bdsharebuttonbox a
{
    background-size:contain;
    margin-left:10px;
    margin-right:10px;
    height:80px;
}

.btn-name
{
    width:100%;
    height:30px;
}

.btn-name a
{
    width:25%;
    height:100%;
    font-family:黑体;
    font-size:0.9em;
    /*display:inline-block;*/
    float:left;
    text-align:center;
	cursor:pointer;
}
.tj-main
{
	width: 80% !important;
}
.tj-main #content
{
	width:100% !important;
}
.tj-main #content h2 {font-size:2em !important;}
.tj-main #content p {font-size:1.5em !important;padding:0 5% !important;}
.tj-main #content span {font-size:1.4em !important;color:#FE2E2E;}
.tj-main #content .tj-url
{
	font-size:1.4em;
	color:#FE2E2E;
	width:100%;
	padding-left:5%;
	padding-right:5%;
}
.tj-main #content .tj-buttons
{
	margin-left:auto;
	margin-right:auto;
	text-align: center;
	width: 40%;
	margin-top: 20px;
}
.auto-lines {word-wrap: break-word;word-break: normal;}
button {margin:5px;}
</style>
</head>
<body class="bodytype">
  
  <!-- zh -->
    <div id="main" class="zh tj-main" >
    <header id="header">
      <h1>Good Job！</h1>
    </header>
    <div id="content">
      <h2><br>统计创建成功</h2>
      <p>请牢记您的统计提取码:<span><?php echo $tjget ?></span>（注：提取码已出发前往您的邮箱）<br>
      可以将以下统计链接分发给小伙伴：</p>
	  <div class="tj-url auto-lines"><?php echo site_url("$tjurl");?></div>
	  <div class="tj-buttons">
		<button type="button" class="btn btn-primary btn-block" id="share">一键分享</button>
	  </div>
<div class="xlkm-share hidden">
        <div clsss="share-btn">
            <div class="bdsharebuttonbox" data-tag="share_1">
	<a class="btn-item" data-cmd="weixin" href="#" style="background-image:url('<?php echo base_url("img/share/friend.png")?>');"></a>
	<a class="btn_item" data-cmd="tsina" style="background-image:url('<?php echo base_url("img/share/sina.png")?>');"></a>
	<a class="btn_item" data-cmd="tieba" style="background-image:url('<?php echo base_url("img/share/tieba.png")?>');"></a>
    <a class="btn_item" data-cmd="renren" style="background-image:url('<?php echo base_url("img/share/renren.png")?>');"></a>
            </div>
            <div class="btn-name">
                <a>朋友圈</a>
                <a>微博</a>
                <a>百度贴吧</a>
                <a>人人</a>
            </div>
            <div class="bdsharebuttonbox" data-tag="share_2">
	<a class="btn_item" data-cmd="sqq" style="background-image:url('../../img/share/qq.png');"></a>
    <a class="btn_item" data-cmd="douban" style="background-image:url('../../img/share/douban.png');"></a>
    <a class="btn-item" href="sms:15295588281?body=小鹿开门" style="background-image:url('../../img/share/message.png');"></a>
    <a class="btn_item" data-cmd="copy" style="background-image:url('../../img/share/copy.png');"></a>
            </div>
            <div class="btn-name">
                <a>QQ好友</a>
                <a>豆瓣</a>
                <a>短信</a>
                <a>复制网址</a>
            </div>
        </div>
        <div class="cancel">取 消</div>
    </div>
      <div class="utilities">
        <button class="btn btn-default right" href="<?php echo base_url() ?>" onClick="history.go(-1);return true;">返回首页</button>
		<button class="btn btn-success right" href="#">意见反馈</button>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>
<script>
	$("#share").click(function() {
		$(".xlkm-share").removeClass("hidden");
	});
	$(".xlkm-share .cancel").click(function(){
        $(".xlkm-share").addClass("hidden");    
    });
	$(document).ready(function(){
        $(".bdsharebuttonbox a").css({"background-size":"50px","background-position":"center","width":"25%","height":"50px","margin":"0","margin-top":"28px"})
    })
	window._bd_share_config = {
		common : {
			bdText : "Easy统计 - <?php echo $tjname?>",	
			bdDesc : 'Easy统计',	
			bdUrl : "<?php echo site_url("$tjurl");?>", 	
            bdPic : "<?php echo site_url("img/site.ico");?>",
            bdMini: 3
		},
		share : [{
            "bdSize" : 32
            //"bdCustomStyle":"style.css"
		}]//,
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>

</body>
</html>
