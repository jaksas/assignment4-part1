<?php
$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
$filePath = implode('/', $filePath); 
$content1 = "http://".$_SERVER['HTTP_HOST'].$filePath."/content1.php";

echo 'Click ';
echo "<a href={$login}>here</a>";
echo ' to return to content1.php.'; 

?>