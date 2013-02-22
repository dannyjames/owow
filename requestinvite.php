<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   $sql="INSERT INTO request_info (RI_name, RI_company, RI_email, RI_phone, RI_employeenumber, RI_locationnumber)
   VALUES('$_GET[branchLocation]','$_GET[inputName]','$_GET[companyName]','$_GET[inputEmail)','$_GET[inputPhone]',
   '$_GET[inputEmployees]','$_GET[inputLocations]')";
         if (!mysql_query($sql,$con)){
                  die('Error: ' . mysql_error());
         }
         print "Thank you for interest!";
?>
   