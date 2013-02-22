<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
      
   $jobs = explode(",", $_GET['positionList']);
   
   $sql="INSERT INTO Branch (location, name) 
         VALUES('$_GET[branchLocation]','$_GET[branchName]')";
   
   if (!mysql_query($sql, $con)) {
      error_log(mysql_error());
      die('Error: ' . mysql_error());
   }         
         
   $sql="SELECT LAST_INSERT_ID() as lastId";
   $result = mysql_query($sql,$con);

   if (!$result) {
      error_log(mysql_error());
      die('Error: ' . mysql_error());
   }
   
   while($row = mysql_fetch_assoc($result)){
      $lastId = $row['lastId'];
   }
   error_log($lastId);
   
   foreach($jobs as $job) {
      $sql="INSERT INTO Jobs (B_id, job)
         VALUES('$lastId','$job')";
         
      if (!mysql_query($sql,$con)) {
         error_log(mysql_error());
         die('Error: ' . mysql_error());
      }
      
      print "1 branch added";
   }
   
?>
   