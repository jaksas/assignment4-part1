<?php
	
class JSON_Output {	
	
	public $Type;
	public $parameters; 
	
	public function __construct() {
		$this->Type = $_SERVER['REQUEST_METHOD']; 
		if($_REQUEST != []) {
			$this->parameters = $_REQUEST;
		}
		else {
			$this->parameters = null;
		}
	}
	
	function respond() {
		print_r(JSON_encode($this));
	}
}

$J = new JSON_Output();
$J->respond(); 
	
?>