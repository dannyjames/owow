<?php

   $con = mysql_connect('localhost:8889', 'root', 'root');
   error_log("test");
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   if($_GET["action"] == "delete") {
      $deleterow = "DELETE FROM Contests WHERE id = " . $_GET["id"];

      if(!mysql_query($deleterow, $con)){
          error_log($deleterow);
          error_log(mysql_error());
          die('Error: ' . mysql_error());
      }
   }
   
   else{
       $sql="INSERT INTO Contests (contestgoal, contestvalue, B_id, conteststart, contestend)
       VALUES('$_GET[contestgoal]','$_GET[contestvalue]','$_GET[contestbranch]','$_GET[conteststart]','$_GET[contestend]')";
             if (!mysql_query($sql,$con)){
                die('Error: ' . mysql_error());
             }
             print "New Contest";
   }
?>