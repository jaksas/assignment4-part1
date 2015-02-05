<?php
session_start();

//Create root filepath for redirecting users
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath); 

//URLs for redirecting users 
$login = "http://".$_SERVER['HTTP_HOST'].$filePath."/login.php"; 
$content1 = "http://".$_SERVER['HTTP_HOST'].$filePath."/content1.php";

/*Direct user to login page if there is no username set*/
if(($_SESSION['username']) === null) {
	header("Location: {$login}");
}

//Display link to content1.php 
echo "Click to visit ";
echo "<a href={$content1}>content1</a>"; 
?>