<?php
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath); 
$login = "http://".$_SERVER['HTTP_HOST'].$filePath."/login.php"; 
$content2 = "http://".$_SERVER['HTTP_HOST'].$filePath."/content2.php"; 

if(!isset ($_POST['username']) && $_SESSION['username'] == null) {
	header("Location: {$login}");
}

if($_POST['username'] === '') {
	echo 'A username must be entered. Click ';
	echo "<a href={$login}>here</a>";
}

//else(

?>