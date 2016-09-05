<?php

// 辅助测试输出函数
function dd($s)
{
	echo '<pre>';
	print_r($s);
	die;
}


//获取当前登录IP地址
function get_ip(){
       if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
           $ip = getenv("HTTP_CLIENT_IP");
       else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
           $ip = getenv("HTTP_X_FORWARDED_FOR");
       else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
           $ip = getenv("REMOTE_ADDR");
       else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
           $ip = $_SERVER['REMOTE_ADDR'];
       else
           $ip = "unknown";
           
       $tmp = explode(',', $ip);
       if (count($tmp)>1){
           $ip = $tmp[0];
       }
       $len = strlen($ip);
       if ($len>15){
           $ip = substr($ip,0,15);
       }
       return $ip;
    }