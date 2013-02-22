<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   if($_GET['action'] == 'delete') {
      $deleterow = "DELETE FROM employee_details WHERE E_id = " . $_GET["E_id"];
      
      if(!mysql_query($deleterow, $con)){
          error_log($deleterow);
          error_log(mysql_error());
          die('Error: ' . mysql_error());
      }
   }
   
   else{
      $addemployee="INSERT INTO employee_details(employee_name, job_id, Email, Type, B_id)
      VALUES('$_GET[ename]','$_GET[eposition]','$_GET[email]','e','$_GET[mbranch]')";
      if(!mysql_query($addemployee, $con)){
            die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
      }
      echo "1 Employee Added";
   }
         
?>