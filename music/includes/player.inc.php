<link rel="stylesheet" href="style/style.css">
<?php
function getsongs($conn){
	$sql = "SELECT * FROM music";
	$result = $conn->query($sql);
    echo "<table border='1'><tr><th>Song</th><th>album</th><th>Artist</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["sname"]."</td><td>".$row["salbum"]."</td><td>".$row["sartist"]."</td></tr>";
    }
    echo "</table>";
}
