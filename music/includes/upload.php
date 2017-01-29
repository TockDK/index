<?php
	include '../header.php';
	include '../includes/dbh.php';

if (isset($_POST['submit'])) {
//normal
$sname = $_POST['sname'];
$artist = $_POST['artist'];
$album = $_POST['album'];

//song
	$file = $_FILES['sfile'];

	$fileName = $_FILES['sfile']['name'];
	$fileType = $_FILES['sfile']['type'];
	$fileTmpName = $_FILES['sfile']['tmp_name'];
	$fileError = $_FILES['sfile']['error'];
	$fileSize = $_FILES['sfile']['size'];
	$fileMaxSize = 1000000000;
	echo "$fileSize";

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
//album
	$afile = $_FILES['salbum'];

	$afileName = $_FILES['salbum']['name'];
	$afileType = $_FILES['salbum']['type'];
	$afileTmpName = $_FILES['salbum']['tmp_name'];
	$afileError = $_FILES['salbum']['error'];
	$afileSize = $_FILES['salbum']['size'];
	$afileMaxSize = 1000000000;

	$afileExt = explode('.', $afileName);
	$afileActualExt = strtolower(end($afileExt));
	$aalowed = array('jpg', 'jpeg', 'png', 'pdf');

//if login
	$allowed = array('mp3');
	if (isset($_SESSION['id'])) {
	//database check
				
		if (in_array($fileActualExt, $allowed)) {
			echo $fileError;
			if ($fileError !== 0) {
				if ($fileMaxSize >= $fileSize) {
						if(in_array($afileActualExt, $aalowed)){
						//song
						$fileNameNew = uniqid('', true).'.'.$fileActualExt;
						$fileDestination = '../music/songs'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
						//album
						$afileNameNew = uniqid('', true).'.'.$afileActualExt;
						$afileDestination = '../music/album'.$afileNameNew;
						move_uploaded_file($afileTmpName, $afileDestination);
						//insert names
						$songins = '/music/'.$fileNameNew;
						$albumins = '/music/'.$afileNameNew;
						//database insert
						$sql = "INSERT INTO music (sname, sfilename, salbum, sfilealbum, sartist) 
						VALUES ('$sname','$songins','$album','$albumins','$artist')";
						$result = mysqli_query($conn, $sql);
						header("Location: ../index.php?uploadsuccess");
						echo "$sname";
						echo "$songins";
						echo "$album";
						echo "$albumins";
						echo "$artist";
				} else{
					echo"not allowed album filetype";
				}
			} else {
					echo "Your file is too big!";
			}
			
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}else
	echo "error";
}