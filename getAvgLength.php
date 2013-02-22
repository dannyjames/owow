<?php

include "parse_classes.php";

//Conneect to mysql
$connectSQL = new connectToMySQL();
$startConnection = $connectSQL->startConnection();

$hour_array =array("8:00 AM", "9:00 AM", "10:00 AM", "11:00 AM", "12:00 NOON", "1:00 PM", "2:00 PM",
	 "3:00 PM", "4:00 PM", "5:00 PM", "6:00 PM", "7:00 PM", "8:00 PM", "9:00 PM",  "9:00 PM",  "9:00 PM", 
	 "10:00 PM");


$table = "INTERACTION_DETAILS";



$avg_length = array();
for ($i = 0; $i < count($hour_array); $i++){
	$hour_of_day = $hour_array[$i];
	//echo "\n".$hour_of_day."\n";
	$query = mysql_query("SELECT `HOUR_OF_DAY`, AVG(`LENGTH`) AS `Avg Length` FROM `$table` WHERE `HOUR_OF_DAY` = '$hour_of_day';");

	if(mysql_num_rows($query) > 0){

		while($result = mysql_fetch_assoc($query)){
			if($result['HOUR_OF_DAY'] != NULL){
						$avg_length[] = $result;

			}
		}
	}
}



echo json_encode($avg_length);

?>