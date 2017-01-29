<title>Sign up</title>
<link rel="stylesheet" href="style/styles.css">
<?php
	include 'header.php';
	include 'functions.php';
    include 'includes/dbh.php';
?>
<div class="signup">
    <style type="text/css">
    table {
        margin: 8px;
    }
    </style>
<?php	
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if (strpos($url, 'error=empty1') !==false) {
		echo "Forgot FirstName";
	}
	if (strpos($url, 'error=empty2') !==false) {
		echo "Forgot LastName";
	}
	if (strpos($url, 'error=empty3') !==false) {
		echo "Forgot UserName";
	}
	if (strpos($url, 'error=empty4') !==false) {
		echo "Forgot Password";
	}
	if (strpos($url, 'error=empty5') !==false) {
		echo "Passwords did not match!";
	}
	if (strpos($url, 'error=username') !==false) {
		echo "Username already in use!";
	}

	if (isset($_SESSION['id'])) {
 		echo "You are already logged in";
 	} else {
	echo "<form action='includes/signupcheck.inc.php' method='POST'><br>
		<input type='text' name='first' placeholder='First name'><br>
		<input type='text' name='last' placeholder='Last name'><br>
		<input type='email' name='email' placeholder='email'><br>
		<input type='text' name='uid' placeholder='username'><br>
		<input type='password' name='pwd' placeholder='password'><br>
		<input type='password' name='repwd' placeholder='RE:password'><br>
		<button type='submit'>SIGN UP</button><br>
	</form>";
	}
?>
</div>	

</body>
</html>