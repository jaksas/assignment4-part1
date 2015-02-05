<?php

/*FUNCTION: testInput()
Parameters: None
Return: Bool (true if input is valid)
Pre-conditions: multtable.php has received a get request
Post-conditions: If the values in the get request can create a valid 
	multiplication table, true is returned; otherwise an error message 
	is displayed.
Description: In order to return true, must receive four correctly 
	labeled key-value pairs. All values must not be null and must be 
	integers, and minimum values mustbe less than or equal to maximum 
	values. 
*/
function testInput() {
	
	$mults = array('min-multiplicand', 'max-multiplicand', 
			'min-multiplier', 'max-multiplier'); 
				
	//Test that each parameter exists and is correctly labelled 
	foreach ($mults as $key) {
		if(!isset($_GET[$key])) {
			echo "Following parameters required: 'min-multiplicand', 
				'max-multiplicand', 'min-multiplier', 'max-multiplier'"; 
			return false;	
		}
	}
		
	foreach ($_GET as $key => $value) {
		//Test to see if each parameter key has a value 
		if ($value == NULL) {
			echo "Missing parameter $key";
			return false; 
		}
		
		//Test to see if each parameter key is an integer
		if (strval( intval( $value)) != $value) {
			echo "$key must be an integer"; 
			return false;
		}
	}
	
	//Test that minimum values are not larger than maximum values
	if ($_GET['min-multiplicand'] > $_GET['max-multiplicand']) {
		echo "Minimum multiplicand larger than maximum"; 
		return false; 
	}
	
	if ($_GET['min-multiplier'] > $_GET['max-multiplier']) {
		echo "Minimum multiplier larger than maximum"; 
		return false; 
	}	
	
	//If we make it here, input is validated 
	return true; 
}
	
/*FUNCTION: makeTable()
Parameters: None
Return: None
Pre-conditions: multtable.php has received a get request and the input
	has been validated 
Post-conditions: An HTML multiplication table is displayed to the client
Description: Uses the min-max multiplier and multiplicand values in the	
	$_GET array to create the multiplication table 
*/	
function makeTable () {
	//Calculate number of rows and columns 
	$num_cols = (int)$_GET['max-multiplier'] - (int)$_GET['min-multiplier'] + 1; 
	$num_rows = (int)$_GET['max-multiplicand'] - (int)$_GET['min-multiplicand'] + 1;
	
	//Begin table and the first empty cell 
	echo "<table border='solid thin'>
		<tr>
		<td></td>";
	
	//Create the top row (header values for the multipliers) 
	for($i = 0; $i < $num_cols; $i++) {
		echo "<th>".($i + (int)$_GET['min-multiplier'])."</th>"; 
	}
	echo "</tr>";
	
	/*Outer for loop ticks off the rows and enters the header values 
	for the multiplicands*/
	for($i = 0; $i < $num_rows; $i++) {
		//New row 
		echo "<tr>";
		
		//Row header is the multiplicand 
		echo "<th>".($i + (int)$_GET['min-multiplicand'])."</th>";
		
		//Inner for loop enters the products in each row
		for($j = 0; $j < $num_cols; $j++) {
			echo "<td>".
			($i + (int)$_GET['min-multiplicand']) * ($j + (int)$_GET['min-multiplier']).
			"</td>";
		}
		
		//End row 
		echo "</tr>"; 
	}
	
	//End table 
	echo "</table>";
}

if(testInput()) {
	makeTable(); 
}
?>