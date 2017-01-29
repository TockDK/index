<?php
    session_start();
	include 'functions.php';
    include 'includes/dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/styles.css">


<header>
<style>
/* Style The Dropdown Button */

.dropbtn {
    background-color: #222222;
    color: white;
    font-size: 16px;
    border: 10px;
    cursor: pointer;
    margin-top: 10px;
    margin-left: 6px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    margin-top: -10px;
    width: 60px;
    height: 40px;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-left: -20px;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 10px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #444444}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #222222;
}
</style>
	<nav>
		<ul>
			<li><a href="index.php">HOME</a></li>
			<?php
				if (isset($_SESSION['id'])) {
				echo "<li><a href='player.php'>PLAYER</a></li>
                    <li><a href='upload.php'>UPLOAD</a></li>";
				echo "<div class='dropdown'>
  						<button class='dropbtn'>MORE</button>
  						<div class='dropdown-content'>
    					<a href='profile.php'>PROFILE</a>
                        <a href='changepwd.php'>CHANGE PASSWORD</a>
  		  				<a href='includes/logout.inc.php'>LOGOUT</a>

 		  				</div>
						</div>";
 				} else {
					echo "<form action='includes/logincheck.inc.php' method='POST'>
						<input type='text' name='uid' placeholder='username'>
						<input type='password' name='pwd' placeholder='password'>
						<button type='submit'>Login</button>
					</form>
                    <li><a href='signup.php'>SIGNUP</a></li>";
				}
			?>
		</ul>
	</nav>
</header>
</head>
<body>