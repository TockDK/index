<?php
function getsongs($conn){
	$sql = "SELECT * FROM music";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()){
	echo "<div class='song-list'>";
		echo $row['sname']." ";
		echo $row['salbum']." ";
		echo $row['sartist']."<br>";
	echo "</div>";
	}
}
