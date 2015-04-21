<?php
    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = 'mysql85183989!';
    $dbname = 'thirty_eight';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname);
    $sql = "SELECT * FROM `picture_collection`;";
    $collection_result = mysql_query($sql) or die('MySQL query error');
    $collections = array();
	while($r = mysql_fetch_assoc($collection_result)) {
    	array_push($collections, $r);
	}
	
	for ($i = 0; $i < sizeof($collections); $i++) {
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
    	mysql_query("SET NAMES 'utf8'");
    	mysql_select_db($dbname);
		$sql = "SELECT * FROM `picture` WHERE `collection_id` = ".$collections[$i]['collection_id'].";";
    	$video_result = mysql_query($sql) or die('MySQL query error');
    	
    	$videos = array();
    	while($r = mysql_fetch_assoc($video_result)) {
    		array_push($videos, $r);
		}
	
		$collections[$i]['pictures'] = $videos;
	}
	
	$response = array();
	$response['picture_collections'] = $collections;
	print json_encode($response);
?>