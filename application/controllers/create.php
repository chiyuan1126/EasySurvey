<?php
class Create extends CI_Controller {
/*function create(){
	$this->load->database();
}*/
function index()
{
  $this->load->view('create_message');
}
//yc test
function yctest($id=0,$name=0)
{
  //$getda=$this->uri->segment(3);//uri直接获取第几段  /create/yctest/XXXX
  //echo $getda;
  echo $id;//直接获取 function yctest($id=0,$name=0)
  echo $name;
}
//生成随机串
function getRandStr($length) 
{   $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randString = ''; 
	$len = strlen($str)-1;
	for($i = 0;$i < $length;$i ++)
	{ $num = mt_rand(0, $len); 
	$randString .= $str[$num];
	} 
	return $randString ;  
}
/*
|
|createtj() yc 2014-8-6
|获取post中的基本信息tjname、
|
*/
		function createtj()//创建统计存入数据库
		{
			$this->load->database();
			  //$start=$this->input->post('email');
			  //$tjname=$this->input->post('tjname');
			  //$ddl=$this->input->post('ddl');
			$postdata=$this->input->post();
			//var_dump ($xxx);
			$tjattr[] = array();
			foreach ($postdata as $key => $value) {
				if ($key=="tjname"){
					$tbname=$value;
				}
				else if($key=="email"){
					$email=$value;
				}
				else if($key=="ddl"){
					$ddl=$value;
				}
				else{
					$tjattr[]=$value;
				}
			}
			var_dump($tjattr);			
			/*$data = array(
						'tbid' => 'test123456',
						'tbno' => '1',
						'tbname' => $tbname,
						'tclass' => '1',
						'ctime' => '2014-06-18 16:55:10'
			);
			$this->db->insert('tjtb', $data); 
			*/
		}
}
