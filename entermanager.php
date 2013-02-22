<?php
   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   $sql="INSERT INTO employee_details (employee_name, Position, email, B_id )
   VALUES('$_GET[manager_name]','$_GET[manager]','$_GET[manager_email]','$_GET[B_id]')";
         if (!mysql_query($sql,$con)){
                  error_log(mysql_error());
                  die('Error: ' . mysql_error());
         }
         error_log("we are here");
         print "1 Manager Added";
?>