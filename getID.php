<?php

include "parse_classes.php";

//Parameters from the HTTP_GET
$graph_type = $_GET['graph_type'];
$requested_store = $_GET['store'];
$requested_employee = $_GET['employee'];

//Conneect to mysql
$connectSQL = new connectToMySQL();
$startConnection = $connectSQL->startConnection();

function send() {
  global $graph_type, $arr, $requested_store, $requested_employee;

  $ic_data = array();
  $c = 0;
  $data_array = array();

  if (!empty($requested_employee))
    $key = 'query_with_employee';
  else if (!empty($requested_store))
    $key = 'query_with_store';
  else
    $key = 'query_simple';

  $query = $arr[$graph_type][$key];
  $final_query = mysql_query($query);
  
  error_log($query);
  if(!$final_query) {
       error_log($query);
       error_log($key);
       error_log($graph_type);
       error_log(mysql_error());
       die('Could not connect: ' . mysql_error());
  }
  $num_rows = mysql_num_rows($final_query);
  if(!$num_rows) {
        error_log(mysql_error());
        die('Could not connect: ' . mysql_error());
  }
  
  if($num_rows > 0){
    while($result = mysql_fetch_assoc($final_query)){
      $data_array[] = $result;
    }
  }
  echo json_encode($data_array);
}

$arr = array(
  'interactions_count' => array(
    'query_simple' => "
      SELECT HOUR(`start`) AS ic_hour, (SELECT COUNT(*) FROM `Interaction_Details` WHERE HOUR(start) = ic_hour) AS no_of_interactions
      FROM Interaction_Details GROUP BY ic_hour ORDER BY `ic_hour` ASC",

    'query_with_store' => "
      SELECT HOUR('start') AS ic_hour, (SELECT COUNT(*) FROM `Interaction_Details`, employee_details WHERE
      employee_details.E_id = Interaction_Details.E_id AND employee_details.B_id = '$requested_store' AND HOUR(start) = ic_hour)
      AS no_of_interactions
      FROM Interaction_Details, employee_details WHERE employee_details.E_id = Interaction_Details.E_id
      AND employee_details.B_id = '$requested_store' GROUP BY ic_hour ORDER BY `ic_hour` ASC",

    'query_with_employee' => "
      SELECT HOUR(start) AS ic_hour, COUNT(HOUR(start)) AS no_of_interactions 
      FROM Interaction_Details WHERE E_id = '$requested_employee' GROUP BY 
      HOUR(start), E_id ORDER BY ic_hour ASC",
  ),
  'interactions_employee' => array(
    'query_simple' => "SELECT COUNT(*) AS No_of_interactions,  Interaction_Details.E_id, employee_name  FROM Interaction_Details,employee_details WHERE 
    Interaction_Details.E_id = employee_details.E_id GROUP BY E_id DESC LIMIT 10",

    'query_with_store' => "SELECT COUNT(*) AS No_of_interactions, Interaction_Details.E_id, employee_name  FROM Interaction_Details, employee_details WHERE
    employee_details.E_id = Interaction_Details.E_id AND employee_details.B_id = '$requested_store'
    GROUP BY E_id ORDER BY No_of_interactions DESC LIMIT 10",

    'query_with_employee' => "SELECT COUNT(*) AS No_of_interactions, Interaction_Details.E_id, employee_name  FROM Interaction_Details, employee_details WHERE
    employee_details.E_id = Interaction_Details.E_id AND employee_details.B_id = '$requested_store'
    GROUP BY E_id ORDER BY No_of_interactions DESC LIMIT 10",
  ),
  'length_of_interactions' => array(
    'query_simple' => "
      SELECT HOUR(start) AS ic_hour,ROUND(AVG(`length`),0) AS `avg_length_minutes`  FROM `Interaction_Details` GROUP BY ic_hour",

    'query_with_store' => "
      SELECT HOUR(start) AS ic_hour, ROUND(AVG(`length`),0) AS `avg_length_minutes` FROM `Interaction_Details`,
      employee_details WHERE  employee_details.E_id = Interaction_Details.E_id AND employee_details.B_id = '$requested_store'
      GROUP BY ic_hour ORDER BY ic_hour ASC",

    'query_with_employee' => "
      SELECT HOUR(start) AS ic_hour,ROUND(AVG(`length`),0) AS `avg_length_minutes`  FROM 
      `Interaction_Details` WHERE E_id = '$requested_employee' GROUP BY ic_hour, E_id",
  ),
  'contests_won' => array(
    'query_simple' => "SELECT employee_id, COUNT(`employee_id`) AS `TOTAL_WINS` FROM contest_winner GROUP BY employee_id
    ORDER BY TOTAL_WINS DESC LIMIT 10",

    'query_with_store' => "SELECT contest_winner.employee_id, COUNT(contest_winner.employee_id) AS TOTAL_WINS FROM contest_winner, employee_details
    WHERE employee_details.E_id = contest_winner.employee_id AND employee_details.B_id = '$requested_store' GROUP BY contest_winner.employee_id ORDER BY TOTAL_WINS DESC LIMIT 10",

    'query_with_employee' => "SELECT employee_id, COUNT(employee_id) AS TOTAL_WINS FROM contest_winner
    WHERE employee_id = '$requested_employee' GROUP BY employee_id ORDER BY TOTAL_WINS DESC LIMIT 10",

  ),
  'trending' => array(
    'query_simple' => "SELECT DAYOFMONTH(start) as day_month, (SELECT ROUND(AVG(length),0) FROM Interaction_Details WHERE DAYOFMONTH(start) = day_month)
    AS AVG_INTERACTION_LENGTH, (SELECT COUNT(start) FROM Interaction_Details WHERE DAYOFMONTH(start) = day_month)
    AS AVG_INTERACTION_COUNT FROM Interaction_Details GROUP BY day_month",

    'query_with_store' => "SELECT DAYOFMONTH(start) as day_month, (SELECT ROUND(AVG(length),0) FROM Interaction_Details WHERE DAYOFMONTH(start) = day_month)
    AS AVG_INTERACTION_LENGTH, (SELECT COUNT(start) FROM Interaction_Details WHERE DAYOFMONTH(start) = day_month)
    AS AVG_INTERACTION_COUNT FROM Interaction_Details, employee_details WHERE  employee_details.E_id = Interaction_Details.E_id AND employee_details.B_id = '$requested_store' GROUP BY day_month",
    
    'query_with_employee' => "SELECT DAYOFMONTH(start) as day_month, (SELECT ROUND(AVG(length),0) FROM Interaction_Details WHERE DAYOFMONTH(start) = day_month)
    AS AVG_INTERACTION_LENGTH, (SELECT COUNT(start) FROM Interaction_Details WHERE DAYOFMONTH(start) = day_month)
    AS AVG_INTERACTION_COUNT FROM Interaction_Details, employee_details WHERE  employee_details.E_id = '$requested_employee' GROUP BY day_month",
    
  ),

);

send();
?>
