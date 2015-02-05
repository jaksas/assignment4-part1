<?php

session_start();

//Create root filepath for redirecting users
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath); 

//URLS for redirecting users
$login = "http://".$_SERVER['HTTP_HOST'].$filePath."/login.php"; 
$logout = "http://".$_SERVER['HTTP_HOST'].$filePath."/login.php?logout=true"; 
$content2 = "http://".$_SERVER['HTTP_HOST'].$filePath."/content2.php"; 

/*Direct user to login page if this visit is not a post from 
login.php and there is no username already set*/
if(!isset ($_POST['username']) && $_SESSION['username'] === null) {
	header("Location: {$login}");
}

/*Direct user back to login page with a messaeg to choose a username
if the post from login contains the empty string as the username*/
if(isset ($_POST['username']) && $_POST['username'] === '') {
	
	echo 'A username must be entered. Click ';
	echo "<a href={$login}>here</a>";
	echo " to return to the login screen."; 
}

/*This block handles both cases of valid new logins and return visits*/
else {

	/*If a valid name has been posted and no user name already exists 
	in session storage, start visit count at 1 and store username (check if
	a user name exists in session storage to prevent destroying the visit
	count on page refresh after a post, which will repost*/ 
	if(isset($_POST['username']) && !isset($_SESSION['username'])) { 
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['num_visits'] = 1;
	}
	
	//Revisiting user - not through a post. Increment visit count.
	else {
		$_SESSION['num_visits'] += 1;
	}
	
	//Display name and visit count to user 
	echo "Hello {$_SESSION['username']} you have visited this page 
		{$_SESSION['num_visits']} times before. Click ";
	echo "<a href={$logout}>here</a> to logout.<br><br>"; 
	
	//Display link to content2.php
	echo "Click to visit ";
	echo "<a href={$content2}>content2</a>"; 
}
?>