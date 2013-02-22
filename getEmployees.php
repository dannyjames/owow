<?php
   session_start();
    
    header('Content-Type: application/javascript');
    
    $con = mysql_connect('localhost:8889', 'root', 'root');
    if(!$con){
       die('Could not connect: ' . mysql_error($con));
    }
    
    mysql_select_db('analytics', $con);
    if(!$con){
       die('Could not connect: ' . mysql_error($con));
    }
      error_log($_SESSION['E_id']);
      error_log($_SESSION['B_id']);
      error_log($_SESSION['type']);
        
    if($_GET['query'] == "getEmployeeName") {
      error_log("We are getting the employee name");
      $select = "SELECT employee_name FROM employee_details WHERE employee_details.E_id = " . $_SESSION['E_id'];
      error_log($select = "SELECT employee_name FROM employee_details WHERE employee_details.E_id = " . $_SESSION['E_id']);
    }
    else if($_GET['query'] == "getScore") {
      error_log("we are getting score");
      $select = "SELECT wows FROM Interaction_Details, Audio_file WHERE Audio_file.E_id = " . $_SESSION['E_id']; 
      error_log($select = "SELECT wows FROM Interaction_Details, Audio_file WHERE Audio_file.E_id = " . $_SESSION['E_id']); 
    }
    else if($_GET['query'] == "getWows") {
      error_log("We are getting Wows");
      $select = "SELECT employee_name, SUM(wows), employee_details.B_id FROM employee_details, Interaction_Details LEFT JOIN Audio_file ON employee_details.B_id = Audio_file.B_id and Audio_file.A_id = Interaction_Details.A_id group by Audio_file.E_id order by SUM(wows) DESC";
    }
    else if($_GET['query'] =="getCurrency"){
      $select = "SELECT rulescurrency, valuecurrency FROM Currency WHERE Currency.B_id = " . $_SESSION['B_id'];
    }
    else if($_GET['query'] == "getContest"){
      $select = "SELECT contestgoal, contestvalue, contestend FROM Contests WHERE Contests.B_id = " . $_SESSION['B_id'];
    }
    else if($_GET['query'] == "getRewards"){
      $select = "SELECT imagepath, item, value FROM Rewards WHERE Rewards.B_id = " . $_SESSION['B_id'];
    }
    else if($_GET['query'] == "getFitness"){
         $select = "SELECT distinct(categories) FROM Routine, Workout WHERE Routine.W_id = Workout.W_id AND Routine.B_id = " . $_SESSION['B_id'];
    }
    $result = mysql_query($select, $con);
    
    if(!$result){
        error_log(mysql_error($con));
        die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));   
    }
    error_log('session id: ' . $_SESSION['B_id']);
   
   $data_array = array();
   while($row = mysql_fetch_assoc($result)) {
     //if($_SESSION['B_id'] == $row['B_id'] || $_SESSION['type'] == 'vp') {   
        
        if($_GET['query'] == "getFitness") {
            $select2 = "SELECT exercise, images FROM Routine, Workout WHERE Workout.categories = '" . $row['categories'] . "' AND Routine.W_id = Workout.W_id AND Routine.B_id = " . $_SESSION['B_id'];
            $result2 = mysql_query($select2, $con);
            
            if(!$result2){
               error_log(mysql_error($con));
               die('Error: ' . mysql_errno($con) . ':' . mysql_error($con)); 
            }
            $data_array[] = $row;
            $data_array[count($data_array)-1]['exercises'] = array();
            while($row2 = mysql_fetch_assoc($result2)) {
              $data_array[count($data_array)-1]['exercises'][] = $row2;
            }
        } else {
            $data_array[] = $row;
        }

     //}
   }
   
   header('Content-type: application/json');
   echo json_encode($data_array);
?>