<?php
   $con = mysql_connect('localhost:8889', 'root', 'root');
   error_log("test1");
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   $sql="INSERT INTO employee_details (employee_name, type, Email, B_id)
   VALUES('$_GET[manager_name]','m','$_GET[manager_email]','$_GET[mbranch]')";
         if (!mysql_query($sql,$con)){
                  error_log(mysql_error());
                  die('Error: ' . mysql_error());
         }
         error_log("we are here");
         print "1 Manager Added";
   
?>