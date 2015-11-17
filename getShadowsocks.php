<?php
include('simple_html_dom.php');	

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
$resultArray['configs'] = $rows ;
$resultArray['strategy'] = 'com.shadowsocks.strategy.ha' ;
$resultArray['index'] = -1 ;
$resultArray['global'] = false ;
$resultArray['enabled'] = true ;
$resultArray['shareOverLan'] = true ;
$resultArray['isDefault'] = false ;
$resultArray['localPort'] = 1080 ;
	$resultArray['pacUrl'] = null ;
$resultArray['useOnlinePac'] = false ;
$resultArray['availabilityStatistics'] = false ;
//echo json_encode($resultArray);
file_put_contents('gui-config.json', json_encode($resultArray)) ;
