<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

include('simple_html_dom.php');	
include('json_format.php');	

$url = "http://www.ishadowsocks.com"; //URL
// get DOM from URL or file
$html = file_get_html($url);

$rows = $resultArray = array() ;

foreach($html->find('section#free div.container div.row div.col-lg-4') as $e){
    $row = array();
	 
	$content = $e->children(0)->plaintext;  //server ip 
	$row['server'] = ltrim(strstr(trim($content), ':'),':');
	
	$content = $e->children(1)->plaintext; //server port
	$row['server_port'] = ltrim(strstr(trim($content), ':'),':');

	$content = $e->children(2)->plaintext;  //password
	$row['password'] = ltrim(strstr(trim($content), ':'),':');

	$content = $e->children(3)->plaintext; //method
	$row['method'] = ltrim(strstr(trim($content), ':'),':');

	$row['remarks'] = $row['server'];  //mark

 	$rows[] = $row ;
}
//print_r($rows) ;
$single=array() ;
$find = str_replace('.php', '', basename(__FILE__));
foreach ($rows as $key => $row) {
	if(strpos($row['remarks'],$find)!==false){
		$single = $row ;
	}
}
$single['local_port']=1080 ;
$single['local_address'] = '0.0.0.0' ;
$single['timeout'] = 300 ;
//print_r($single) ;
header('content-type:application/json;charset=utf8');
echo jsonFormat($single);


