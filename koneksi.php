<?php
// session_start();
// $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $uri_segments = explode('/', $uri_path);
// if ($uri_segments[2] != 'login.php' && $uri_segments[2] != 'administrator') {
// 	if (!isset($_SESSION['email_member'])) {
// 		echo "<script>alert('Please Login !');
// 		window.location = 'https://dropshipaja.com/login.php';</script>";
// 		exit;
// }
// }

//error_reporting(0);
$host = "localhost";
$user_name = "root";
$password = "";
$database = "aaronb68_dropshipaja";
$resultsPerPage = 8;
$prefix = "";


try {
	$db_con = new PDO("mysql:host={$host};dbname={$database}", $user_name, $password);
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}

if (isset($_SESSION['token_member'])) {
	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	$url = $_SERVER["REQUEST_URI"];

	$stmt3 = $db_con->prepare("SELECT pic_create_token FROM tb_member WHERE email_member = :email");
	$stmt3->bindParam(":email", $_SESSION['email_member']);
	$stmt3->execute();
	$row = $stmt3->fetch(PDO::FETCH_ASSOC);
	$pic_create_token = $row['pic_create_token'];

	$stmt4 = $db_con->prepare("SELECT * FROM log_access_token_reseller WHERE datetime_access = :date AND email_access = :email AND url = :url");
	$stmt4->bindParam(":date", $date);
	$stmt4->bindParam(":email", $_SESSION['email_member']);
	$stmt4->bindParam(":url", $url);
	$stmt4->execute();
	if ($stmt4->rowCount() == 0) {
		$stmt5 = $db_con->prepare("INSERT INTO log_access_token_reseller (datetime_access, email_access, url, pic_create_token) VALUES (:date, :email, :url, :pic_create_token)");
		$stmt5->bindParam(":date", $date);
		$stmt5->bindParam(":email", $_SESSION['email_member']);
		$stmt5->bindParam(":url", $url);
		$stmt5->bindParam(":pic_create_token", $pic_create_token);
		$stmt5->execute();
	}
}