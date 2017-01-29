<title>Change password</title>
<link rel="stylesheet" type="text/css" href="style/forumstyle.css">
<?php
	include 'dbh.php';
	include '../header.php';

$uid = $_SESSION['id'];
$oldpwd = $_POST['oldpwd'];
$newpwd = $_POST['newpwd'];
$nnewpwd = $_POST['nnewpwd'];

$sql = "SELECT * FROM user WHERE uid='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hash_pwd = $row['pwd'];

	$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$hash_pwd'";
	$result = mysqli_query($conn, $sql);
	if (!$row = mysqli_fetch_assoc($result)) {
		echo "Your old password is incorrect!";
	}
	if ($newpwd !== $nnewpwd) {
		echo "New password doesn't match";
	} 
	else {
		$sql = "INSERT INTO user (pwd) VALUES ('$newpwd')";
	}

//header("Location: ../index.php");

