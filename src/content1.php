<?php

$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath); 
$content1 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
$login = "http://".$_SERVER['HTTP_HOST'].$filePath."/login.php"; 
$content2 = "http://".$_SERVER['HTTP_HOST'].$filePath."/content2.php"; 

session_start();

if(!isset ($_POST['username']) && $_SESSION['username'] == null) {
	header("Location: {$login}");
}

if(isset ($_POST['username']) && $_POST['username'] === '') {
	echo 'A username must be entered. Click ';
	echo "<a href={$login}>here</a>";
	echo " to return to the login screen."; 
}

else {
	if(isset($_POST['username'])) { 
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['num_visits'] = 1;
	}

	
	else {
		$_SESSION['num_visits'] += 1;
	}
	
	echo "Hello {$_SESSION['username']} you have visited this page 
		{$_SESSION['num_visits']} times before. Click ";
	echo "<a href={$login}>here</a> to logout."; 
}
?>