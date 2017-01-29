<title>Change password</title>
<link rel="stylesheet" type="text/css" href="style/forumstyle.css">
<?php
	include 'header.php';
	include 'functions.php';
	include 'includes/dbh.php';

?>
<DIV class='changepwd'>
	<form action='includes/changepwd.inc.php' method='POST'>
	<input type='password' name='oldpwd' placeholder='Old Password'>
	<input type='password' name='newpwd' placeholder='New Password'>
	<input type='password' name='nnewpwd' placeholder='Re:New Password'>
	<button type='submit'>Login</button>
	</form>
</DIV>


</body>
</html>
