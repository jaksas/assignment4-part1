<?php
session_start();

/*Handles return to login from content1 - logout removes
the username from session storage and destroys the session*/
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
	$_SESSION = []; 
	session_destroy();
}
	
/*Prevents user from navigating back to content1 via post (except
through immediate refresh or navigation arrows after posting). Instead,
redirect to content1, where user most logout before a new session is
initiated. Login page is only for the initial login, not revisits*/	
if (isset($_SESSION['username'])) {
	//Set root file path
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath); 
	
	//URL to content1.php
	$content1 = "http://".$_SERVER['HTTP_HOST'].$filePath."/content1.php";
	
	//Redirect
	header("Location: {$content1}");
}
?>

<form action="content1.php" method="post">
	<p>USER NAME: <input type="text" name="username"/></p>
	<p><input value="Login" type="submit" /></p>
</form>
