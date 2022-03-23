<?php 
//error_reporting(0);

$host="localhost";	
$user_name="root";
$password="";
$database="aaronb68_dropshipaja";	
$resultsPerPage=8;
$prefix = "";


try{
	$db_con = new PDO("mysql:host={$host};dbname={$database}",$user_name,$password);
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo $e->getMessage();
}
