<title>Player</title>
<link rel="stylesheet" href="style/style.css">
<?php
	include 'header.php';
	include 'functions.php';
	include 'includes/dbh.php';
	include 'includes/player.inc.php';

	getsongs($conn);
?>
</body>
</html>
