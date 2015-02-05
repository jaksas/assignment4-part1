<?php

function testInput() {
	foreach ($_GET as $key => $value) {
		if ($value == NULL) {
			echo "Missing parameter $key";
			return false; 
		}
		
		if (strval( intval( $value)) != $value) {
			echo "$key must be an integer"; 
			return false;
		}
	}
	
	if ($_GET['min-multiplicand'] > $_GET['max-multiplicand']) {
		echo "Minimum multiplicand larger than maximum"; 
		return false; 
	}
	
	if ($_GET['min-multiplier'] > $_GET['max-multiplier']) {
		echo "Minimum multiplier larger than maximum"; 
		return false; 
	}	
	
	return true; 
}
	
function makeTable () {
	$num_cols = (int)$_GET['max-multiplier'] - (int)$_GET['min-multiplier'] + 1; 
	$num_rows = (int)$_GET['max-multiplicand'] - (int)$_GET['min-multiplicand'] + 1;
	
	echo "<table border='solid thin'>";
	echo "<thead>";
	echo "<tr>";
	echo "<td></td>";
	for($i = 0; $i < $num_cols; $i++) {
		echo "<th>".($i + (int)$_GET['min-multiplier'])."</th>"; 
	}
	echo "</tr>";
	
	for($i = 0; $i < $num_rows; $i++) {
		echo "<tr>";
		echo "<th>".($i + (int)$_GET['min-multiplicand'])."</th>";
		
		for($j = 0; $j < $num_cols; $j++) {
			echo "<td>".
			($i + (int)$_GET['min-multiplicand']) * ($j + (int)$_GET['min-multiplier']).
			"</td>";
		}
		echo "</tr>"; 
	}
	
	echo "</thead>";		
	echo "</table>";
}

if(testInput()) {
	makeTable(); 
};
?>