<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      error_log(mysql_error($con));
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   error_log('hello');
   if(!$con){
      error_log(mysql_error($con));
      die('Could not connect: ' . mysql_error($con));
   }
   $sql="INSERT INTO employee_details(employee_name, job_id, Email, Type, B_id)
   VALUES('$_GET[employee_name]','$_GET[position]','$_GET[employee_email]','e','$_GET[branch]')";
   if(!mysql_query($sql, $con)){
         error_log(mysql_error($con));
         die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
   }
   echo "1 Employee Added";
         
?>