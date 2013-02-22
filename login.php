<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   $myusername=$_POST['myusername']; 
   $mypassword=$_POST['mypassword']; 
    
   $myusername = stripslashes($myusername);
   $mypassword = stripslashes($mypassword);
   $myusername = mysql_real_escape_string($myusername);
   $mypassword = mysql_real_escape_string($mypassword);
   $sql="SELECT * FROM Members WHERE username='$myusername' and password='$mypassword'";
   $result=mysql_query($sql);
   
   $count=mysql_num_rows($result);
   
   if($count==1){
      session_start();
      //session_regenerate_id(true);

      while($row = mysql_fetch_array($result)) {

         $sql2 = "SELECT type, B_id, employee_name from employee_details where E_id = " . $row['E_id'];
         
         $result2 = mysql_query($sql2);
         
         while($row2 = mysql_fetch_array($result2)) {

            $_SESSION['type'] = $row2['type'];
            $_SESSION['B_id'] = $row2['B_id'];
            $_SESSION['E_id'] = $row['E_id'];
            $_SESSION['employee_name'] = $row2['employee_name'];
            error_log($_SESSION['employee_name']);            
            if ($row2['type'] == 'm') {
               header("location:addemployees.php");
               error_log($_SESSION['type'] . " " . $_SESSION['B_id'] . " " . $_SESSION['E_id']);
               //header("location:addemployees.php?id=" . $row['E_id']);
            } else if ($row2['type'] == 'vp') {
               header("location:addbranch.php");
            } else {
		echo('success');
               //header("location:/mobileapp/app.html");
            }
         }
      }
      
   }
   else {
      echo "Wrong Username or Password";
   }

?>
