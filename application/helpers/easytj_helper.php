<?php
					//----获得一个$length长度的随机数------
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
?>