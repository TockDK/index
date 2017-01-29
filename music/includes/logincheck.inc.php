<?php

include 'dbh.php';
include '../header.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE uid='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];
$hash = password_verify($pwd, $hash_pwd);

//ipaddress
function getrealip()
{
 if (isset($_SERVER)){
if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
if(strpos($ip,",")){
$exp_ip = explode(",",$ip);
$ip = $exp_ip[0];
}
}else if(isset($_SERVER["HTTP_CLIENT_IP"])){
$ip = $_SERVER["HTTP_CLIENT_IP"];
}else{
$ip = $_SERVER["REMOTE_ADDR"];
}
}else{
if(getenv('HTTP_X_FORWARDED_FOR')){
$ip = getenv('HTTP_X_FORWARDED_FOR');
if(strpos($ip,",")){
$exp_ip=explode(",",$ip);
$ip = $exp_ip[0];
}
}else if(getenv('HTTP_CLIENT_IP')){
$ip = getenv('HTTP_CLIENT_IP');
}else {
$ip = getenv('REMOTE_ADDR');
}
}
return $ip; 
}


$MyipAddress = getrealip();
echo $MyipAddress; // IP:  58.97.178.57


if ($hash == 0) {
		header("Location: ../index.php?error=empty");
		exit();
} else {
	$sqlip = "SELECT uid FROM ip WHERE uid='$uid'";
	$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$hash_pwd'";
	$result = mysqli_query($conn, $sql);
	$sqlip = "INSERT INTO ip (uid, ip) 
	VALUES ('$uid','$MyipAddress')";
	$resultip = mysqli_query($conn, $sqlip);
	if (!$row = mysqli_fetch_assoc($result)) {
		echo "Your username or password is incorrect!";
	} else {
		$_SESSION['id'] = $row['id'];
	}

	header("Location: ../index.php");

	}