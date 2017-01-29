<?php
	include '../header.php';
	include '../functions.php';
	include '../dbh.php';
session_destroy();
header("Location: ../index.php");