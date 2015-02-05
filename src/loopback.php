<?php

/*CLASS: JSON_Output
Description: A JSON representation of a request received by 
loopback.php*/
class JSON_Output {	
	
	//Stores the request method (GET or POST) 
	public $Type;
	//Stores the array of parameters (NULL if no parameters)
	public $parameters; 
	
	//Constructor sets properties as desired 
	public function __construct() {
		$this->Type = $_SERVER['REQUEST_METHOD']; 
		if($_REQUEST != []) {
			$this->parameters = $_REQUEST;
		}
		else {
			$this->parameters = null;
		}
	}
	
	/*Respond method sends the JSON representation back to the 
	requesting client*/
	function respond() {
		print_r(JSON_encode($this));
	}
}

$J = new JSON_Output();
$J->respond(); 
	
?>