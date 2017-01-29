<?php
	include 'header.php';
	include 'functions.php';
	include 'includes/dbh.php';
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
					Song name: <input type='text' name='sname'><br>
					Artist: <input type='text' name='artist'><br>
					Album: <input type='text' name='album'><br>
					Song mp3: <input type='file' name='sfile'><br>
					Album cover: <input type='file' name='salbum'><br>
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