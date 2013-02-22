<?php
//Class to connect to mysql server
class connectToMySQL{
	
	//Properties
	protected $server = "localhost:8889";
	protected $user = "root";
	protected $psswd = "root";
	protected $db = "analytics";
	
	//Function connect
	function startConnection(){
		$con = mysql_connect($this->server, $this->user, $this->psswd);
		if(!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		if($con){
			mysql_select_db($this->db, $con);
		}
		
		return $con;
	}
}

//Class to insert attributes to the mysql database
class insertData{
	
	//Properties
	protected $start_time;
	protected $end_time;
	protected $data_flag;
	protected $tbl;
	
	
	//Constructor
	function __construct($tbl, $start_time, $end_time, $data_flag){
		$this->tbl = $tbl;
		$this->start_time = $start_time;
		$this->end_time = $end_time;
		$this->data_flag = $data_flag;
	
	}
	
	//Insert Data
	function insertDataToDb(){
		//Initiate query array
		$Query = array();
		$Query[] = "`START_TIME` = '".$this->start_time."'";
		$Query[] = "`END_TIME` = '".$this->end_time."'";
		$Query[] = "`DATA_FLAG` = '".$this->data_flag."'";
		
		
		
		if(!empty($Query)){
			$queryString = implode(", ", $Query);
			$insertString = "INSERT INTO ".$this->tbl." SET $queryString;";
			echo "\n".$insertString."\n";
			$insertQuery = mysql_query("$insertString");
			
			if(!$insertQuery){
				$error = mysql_error();
				echo "\n".$error."\n";
			}
		}
		//Clear variables
		$Query = null;
		
	}
	
}

//Class to insert attributes to the mysql database
class insertInteractionData{
	
	//Properties
	protected $time_block;
	protected $no_of_interactions;
	protected $tbl;
	
	
	//Constructor
	function __construct($tbl, $time_block, $no_of_interactions){
		$this->tbl = $tbl;
		$this->time_block = $time_block;
		$this->no_of_interactions = $no_of_interactions;
	
	}
	
	//Insert Data
	function insert_speech_data(){
		//Initiate query array
		$Query = array();
		$Query[] = "`TIME_BLOCK` = '".$this->time_block."'";
		$Query[] = "`NO_OF_INTERACTIONS` = '".$this->no_of_interactions."'";
		
		
		
		if(!empty($Query)){
			$queryString = implode(", ", $Query);
			$insertString = "INSERT INTO ".$this->tbl." SET $queryString;";
			echo "\n".$insertString."\n";
			$insertQuery = mysql_query("$insertString");
			
			if(!$insertQuery){
				$error = mysql_error();
				echo "\n".$error."\n";
			}
		}
		//Clear variables
		$Query = null;
		
	}
	
}
?>
