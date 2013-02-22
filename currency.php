<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   if($_GET["action"] == "delete") {
      $deleterow = "DELETE FROM Currency WHERE id = " . $_GET["id"];

      if(!mysql_query($deleterow, $con)){
          error_log($deleterow);
          error_log(mysql_error());
          die('Error: ' . mysql_error());
      }
   }
      
   else {
      $sql="INSERT INTO Currency (rulescurrency, valuecurrency, B_id)
      VALUES('$_GET[rcurrency]','$_GET[vcurrency]','$_GET[cbranch]')";
         if (!mysql_query($sql,$con)){
                  error_log(mysql_error());
                  die('Error: ' . mysql_error());
         }
         error_log("we are here");
         print "1 Currency Rule Added";
   }
?>