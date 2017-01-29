<title>Profile</title>
<?php
	include 'header.php';
	include 'functions.php';
	include 'dbh.php';
	include 'includes/comments.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
</head>
<body>
			<?php
				if (isset($_SESSION['id'])) {
				echo "<form action='includes/upload.php' method='POST' enctype='multipart/form-data'>
					<input type='file' name='file'>
					<button type='submit' name='submit'>UPLOAD</button>
					</form>";
 				} else {
					echo "Not logged in!";
				}
			?>
<?php 
 ?>
</body>
</html>