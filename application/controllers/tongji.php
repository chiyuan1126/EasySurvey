<?php
	class Tongji extends CI_Controller {
		function index()
		{
		  $this->load->view('create_message');
		}
		function vcode() {
			$this->load->helper('vfcode');
			$this->load->helper('easytj');
			//show();
			$vcode=getRandStr(4);
			ImageCode($vcode, 60);
			$this->load->library('session');
			$this->session->set_userdata('vcode', $vcode);
			//$yzm_session = $this->session->userdata('verify_code');
			//echo $yzm_session;
		}
		function vcodeconf()
		{
			$this->load->library('session');
			$cccy=$this->session->userdata('vcode');
			echo $cccy;
		}
		function geterror()
		{
			$this->load->view('error_message');
		}
		function gethtu()
		{
			$this->load->view('htu_message');
		}
		function getsuccess()
		{
			$this->load->view('success_message');
		}
		function contact()
		{
			$this->load->view('contact_message');
		}
		/*
		|
		| createtj() 新建统计  yc 2014-8-6
		| $this->input->post('email');获取结果接收邮箱	存在$email中  
		| $this->input->post('tjname');获取统计表名		存在$tjname中  
		| $this->input->post('ddl');获取统计截至时间	存在$ddl中  
		| $this->input->post('SubjectX');获取统计属性	存在$tjattr[]数组中  
		*/
		function createtj()
		{
			$address=$this->input->post('tjname');
			if($address){
			
			
			$postdata=$this->input->post();

			foreach ($postdata as $key => $value) {
				if ($key=="tjname"){
					$tjname=$value;
				}
				else if($key=="email"){
					$email=$value;
				}
				else if($key=="ddl"){
					$ddl=$value;
				}
				else if($key=="remark"){
					$remark = $value;
				}
				else{
					$tjattr[$key]=$value;
				}
			}
			foreach ($tjattr as $key => $value) {
				if (strstr($key,"Subject")){
					$tjkey[]=$value;
				}
				else if(strstr($key,"SType")){
					$tjkeyattr[]=$value;
				}
			}
			$this->load->helper('easytj');//装载easytj_helper中的公用方法
			$tjid=getRandStr(10);
			$tjgetid=getRandStr(10);
			$this->load->database();
			echo "<br>";//
			foreach ($tjkey as $key => $value){
				/*echo $tjkey[$key];
				echo "---";
				echo $tjkeyattr[$key];
				echo "<br>";*/
				$tjkeydata=array(
							'tjid' => $tjid,
							'tjkey' => $tjkey[$key],
							'keytype' => $tjkeyattr[$key]
				);
				$this->db->insert('tj_key', $tjkeydata); 
			}
			
						
			$data = array(
						'tjid' => $tjid,
						'tjgetid' => $tjgetid,
						'tjname' => $tjname,
						'tjtime' => date('Y-m-d H:i:s',time()),
						'tjddl' => $ddl,
						'email' => $email,
						'remark' => $remark
			);
			$this->db->insert('tj_sheet', $data); 
			$data['tjget']=$tjgetid;
			$data['tjurl']="tongji/starttj/".$tjid;
			$data['tjname']=$tjname;	//统计表名
			$this->load->view('tjinfo_message',$data);
			$this->load->helper('url');
			$tjscurl="tongji/starttj/".$tjid;
			$emaildata="您的生成的统计链接是".site_url("$tjscurl").";\n您的提取码是".$tjgetid."。\n您可以到http://www.easytj.com 查看或者下载统计结果~\n欢迎您下次使用！";
            //ycadd-2015-1-11 to forbide the mail being rejected
            $ycaddtitle="【Easy统计】".$email." 您的统计 --".$data['tjtime'];
            //---发送邮件
	// 		$mail = new SaeMail();
	// 		$options = array(
 //                'from' => 'easytjofficial@163.com',
 //                'to' => $email,
 //                'smtp_host' => 'smtp.163.com',          //SMTP服务器
 //                'smtp_port' => '25',                    //SMTP服务器端口
 //                'smtp_username' => 'easytjofficial@163.com',   //邮箱帐号
 //                'smtp_password' => 'easytongji',           //邮箱密码
 //                'subject' => $ycaddtitle,
 //                'content' => $emaildata,
 //                'content_type' => 'TEXT',
 //                'charset' => 'utf8',
 //                'tls' => false
 //            );
 //            $mail->setOpt($options);
 //            $ret = $mail->send();
 // //发送失败时输出错误码和错误信息
 //            if ($ret === false)
 //                var_dump($mail->errno(), $mail->errmsg());
 //            else
 //                echo '' ;
            $this->load->library('email');            //加载CI的email类  
          
        //以下设置Email参数  
        $config['protocol'] = 'smtp';  
        $config['smtp_host'] = 'smtp.163.com';  
        $config['smtp_user'] = 'easytjofficial@163.com';  
        $config['smtp_pass'] = 'easytongji';  
        $config['smtp_port'] = '25';  
        $config['charset'] = 'utf-8';  
        $config['wordwrap'] = TRUE;  
        $config['mailtype'] = 'html';  
        $this->email->initialize($config);              
          
        //以下设置Email内容  
        $this->email->from('easytjofficial@163.com', 'easytj');  
        $this->email->to($email);  
        $this->email->subject($ycaddtitle);  
        $this->email->message( $emaildata);  
        $this->email->send();
        //$this->email->attach('application\controllers\1.jpeg');           //相对于index.php的路径  
  
            //echo '<hr><hr>';
			//---
			//echo $email;
			}
		}
		
		/*
		|
		| starttj() 开始统计  yc 2014-8-6
		| $tjid 分发表号 通过分割链接获得
		|
		*/
		function starttj($tjid=""){
			//echo $tjid;
			$this->load->database();
			//$this->db->select('tjkey','keytype');
			$this->db->where('tjid', $tjid);
			$list = $this->db->get('tj_key')->result_array();
			if ($list == null){
				$this->load->view('error_message');
				//$this->load->view('start_message',$data);统计不存在页面
				
			}
			else{
				$this->db->where('tjid', $tjid);
				$tjinfo = $this->db->get('tj_sheet')->row();
				$data['list']=$list;
				//var_dump($list);
				$data['tjinfo']=$tjinfo;
				$this->load->view('start_message',$data);
			}
		}
		/**
		|
		|storetj() 用户数据存数据库
		|
		|		
		**/
		function storetj(){
			$this->load->database();
			$tjdata=$this->input->post();
			$tjid=$this->input->post('tjid');
			//var_dump($tjdata);//
			foreach ($tjdata as $key => $value) {
				if ($key=="tjid"){
					$tjid=$value;
				}
				else if($key=="vcode"){
					
				}
				else{
					$tjvaluedata=array(
								'tjid' => $tjid,
								'tjvalue' => $value
					);
					$this->db->insert('tj_value', $tjvaluedata); 
				}
			}
			$this->load->view('success_message');
		}
		/*
		|
		| showtjdata() 显示统计结果  yc 2014-8-6
		| $tjgetid 查询表号
		|
		*/
		 function showtjdata(){
			$data['pageinfo']="您所要查询的统计不存在，请核实您的提取码";
			$tjgetid=$this->input->post('tjget');
			@session_start();
			@$_SESSION["tjgetid"];
			if($tjgetid != null || $tjgetid != "")
			{
				 @$_SESSION['tjgetid']=$tjgetid;
			}
			if($tjgetid == null || $tjgetid == "")
			{
				@$tjgetid=$_SESSION['tjgetid'];
			}
			$this->load->database();
			//查询tj_sheet表获得表号
			$this->db->where('tjgetid', $tjgetid);
			$tjinfo = $this->db->get('tj_sheet')->row();
			//if ($tjinfo == null ||($this->input->post()==FALSE)){
		    if ($tjinfo == null){
				$this->load->view('error_message',$data);
			}
			else {
				$data['tjgetid']=$tjgetid;
			$data['tjname']=$tjinfo->tjname;
			//查询tj_key表 获得标题栏、列数存在 $data
			$this->db->where('tjid', $tjinfo->tjid);
			$querykey = $this->db->get('tj_key');
			$listkey=$querykey->result_array();
			$data['numrow']=$querykey->num_rows();//numrow是数据列数
				$keynum=$data['numrow'];
			$data['listkey']=$listkey;
			//查询tj_value表 
			
			$this->load->helper('url');
			$config['base_url'] = site_url('tongji/showtjdata');
			$this->db->where('tjid', $tjinfo->tjid);
			$res = $this->db->get('tj_value');
			$this->load->helper('url');
			$this->load->library('pagination');
			$perpageNum=15;//每页15条记录
			$page_size=$perpageNum*$keynum;
			$config['total_rows'] = count($res->result());
			$config['per_page'] = $page_size;
			$config['first_link'] = '首页';
			$config['last_link'] = '尾页';
			$config['prev_link'] = '上一页';
			$config['next_link'] = '下一页';
			
			$config['prev_tag_open'] = '<div class="btn btn-default">';
			$config['prev_tag_close'] = '</div>';
			$config['next_tag_open'] = '<div class="btn btn-default">';
			$config['next_tag_close'] = '</div>';
			$config['num_tag_open'] = '<div class="btn btn-default">';
			$config['num_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<div class="btn btn-default" style="font-style:">';
			$config['cur_tag_close'] = '</div>';

			$this->pagination->initialize($config);
			
			$offset=intval($this->uri->segment(3));
			
			
			//$this->db->where('tjid', $tjinfo->tjid)->limit($offset,$page_size);
			//$query = $this->db->get('tj_value');
			$sql="select distinct * from tj_value where tjid ='$tjinfo->tjid' limit $offset,$page_size";
			$query = $this->db->query($sql);
			$listvalue=$query->result_array();
				//$valuenum=$query->num_rows();
				//$data['totalnum']=$valuenum/$keynum;			
			$data['listvalue']=$listvalue;
			$data['totalnum']=count($res->result())/$keynum;
			
			$data['links']= $this->pagination->create_links();
			$this->load->view('show_message',$data);
			}
		}
		function download($tjgetid=""){
			$this->load->database();
			//查询tj_sheet表获得表号
			$this->db->where('tjgetid', $tjgetid);
			$data['tjgetid']=$tjgetid;
			$tjinfo = $this->db->get('tj_sheet')->row();
				//查询tj_key表 获得标题栏、列数存在 $data
			$this->db->where('tjid', $tjinfo->tjid);
			$querykey = $this->db->get('tj_key');
			$listkey=$querykey->result_array();
				//查询tj_value表 
			$this->db->where('tjid', $tjinfo->tjid);
			$query = $this->db->get('tj_value');
			$listvalue=$query->result_array();			
			
			$i=0;
			foreach($listkey as $key=>$value){
				$xlsdata[0][$i]=$value['tjkey'];
				$i ++;
			}
			$x=1;
			$y=0;
			foreach($listvalue as $key=>$value)
			{
				$xlsdata[$x][$y]=$value['tjvalue'];
				$y ++;
				if($y==$i){
					$y=0;
					$x ++;
				}
				
			}
			//var_dump($xlsdata);		
			$this->load->library('Excel_XML');
			$xls = new Excel_XML('UTF-8', false, 'xcb Test Sheet');
			$xls->addArray($xlsdata);
			$xls->generateXML('easytj');
		}

	}
?>
