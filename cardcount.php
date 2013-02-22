<?php
   session_start();
   
   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   if(isset($_GET['json']) && strlen($_GET['json']) > 0) {

      $jsonData = json_decode($_GET['json'], true);
      error_log($jsonData);
      foreach ($jsonData as $value) {
          $update = "UPDATE Audio_file SET processed = 1 WHERE A_id = " . $value['A_id'];
          
          if (!mysql_query($update, $con)) {
             error_log($update);
             error_log(mysql_error());
             die('Error: ' . mysql_error());
          }

          $sql = "INSERT INTO Interaction_Details (A_id, length, Interactions) VALUES ($value[A_id], $value[length], 1);";
          if (!mysql_query($sql, $con)) {
             error_log($sql);
             error_log(mysql_error());
             die('Error: ' . mysql_error());
          }
      }
   }
            
   $select = "SELECT A_id, file_path FROM Audio_file WHERE processed != 1 LIMIT 1";
   $result = mysql_query($select, $con);
   if(!$result){
      error_log($select);
      die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
   }
   
   while($row = mysql_fetch_assoc($result)) {
      echo json_encode($row);
   }
?>