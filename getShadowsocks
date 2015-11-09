<?php
	
$url = "http://www.ishadowsocks.com"; //URL

$content = @file_get_contents($url) ;
//echo $content;
$start_pos = stripos($content,'<!-- Free Shadowsocks Section -->') ;
//var_dump($start_pos);
$end_pos = stripos( $content,'<!-- Provider list Section -->') ;
//var_dump($end_pos) ;

$substr = substr($content, $start_pos,$end_pos-$start_pos) ;

$tmp_str = strip_tags($substr);

$tmp_arr = explode(':', str_replace(' ', '',$tmp_str));
//
unset($tmp_arr[0]) ;
unset($tmp_arr[5]) ;
unset($tmp_arr[10]) ;
unset($tmp_arr[15]) ;


$all_arr = array_chunk(array_values($tmp_arr),4 );
//print_r($all_arr) ;
$result_arr = array() ;
foreach ($all_arr as $all_key=>$arr_value) {

	list($server_addr,$server_port,$password,$method) = $arr_value ;	
	
	$server_addr = trim(preg_replace('/([\x80-\xff][A|B|C]*)/i','',$server_addr)) ;
	$server_port = trim(substr(preg_replace('/([\x80-\xff][A|B|C]*)/i','',$server_port),0,-1)) ;
	$password = trim(preg_replace('/([\x80-\xff][A|B|C]*)/i','',$password)) ;
	$method = trim(preg_replace('/([\x80-\xff][A|B|C]*)/i','',$method)) ;

	$result_arr[$all_key]['server'] = $server_addr;
	$result_arr[$all_key]['server_port'] = (int)$server_port ;
	$result_arr[$all_key]['password'] = $password ;
	$result_arr[$all_key]['method'] = $method ;
}

print_r($result_arr);
file_put_contents('/etc/shadowsocks.json', json_encode($result_arr)) ;
