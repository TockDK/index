<?php
session_start();
include '../includes/dbh.php';


$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

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
//random confirmcode
function generateRandomString($length = 28) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$MyipAddress = getrealip();
echo $MyipAddress; // IP:  58.97.178.57

//Signup
if (empty($first)){
	header("Location: ../signup.php?error=empty1");
	exit();
}
if (empty($last)){
	header("Location: ../signup.php?error=empty2");
	exit();
}
if (empty($uid)){
	header("Location: ../signup.php?error=empty3");
	exit();
}
if (empty($pwd)){
	header("Location: ../signup.php?error=empty4");
	exit();
}
if ($pwd !== $repwd){
	header("Location: ../signup.php?error=empty5");
	exit();
}
else{
	$sql = "SELECT uid FROM user WHERE uid='$uid'";
	$result = mysqli_query($conn, $sql);
	$uidcheck = mysqli_num_rows($result);
		if ($uidcheck > 0) {
		header("Location: ../signup.php?error=username");
		exit();
		} else {
			$econfirmcode = generateRandomString();
			$encpass = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO user (first, last, email, uid, pwd, ip, econfirm) 
			VALUES ('$first','$last','$email','$uid','$encpass','$MyipAddress','$econfirmcode')";
			$result = mysqli_query($conn, $sql);
			header("Location: ../index.php");
			/*
			$message =
			"
			Confirm your email
			Click the link below to verity your account
			localhost/emailconfirm.php"

			mail($email,"Site confirm email",$message,"From: haslund2402@hotmail.com");

			echo "Registration complete! Please confirm email!";
			*/
		}
}
