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
      $deleterow = "DELETE FROM Rewards WHERE id = " . $_GET["id"];

      if(!mysql_query($deleterow, $con)){
          error_log($deleterow);
          error_log(mysql_error());
          die('Error: ' . mysql_error());
      }
      
   } 
   else {
       $imagepath;
       if ($_FILES["file"]["error"] > 0){
          echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
       } 
       else {
          echo "Upload: " . $_FILES["file"]["name"] . "<br />";
          echo "Type: " . $_FILES["file"]["type"] . "<br />";
          echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
          echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    
          $imagepath = "/var/www/img/" . $_FILES["file"]["name"];
          move_uploaded_file($_FILES["file"]["tmp_name"], $imagepath);
       }
    
       $sql="INSERT INTO Rewards (item, value, B_id, imagepath)
          VALUES('$_GET[item]','$_GET[value]','$_GET[rbranch]','$imagepath')";
       if (!mysql_query($sql,$con)){
          error_log(mysql_error());
          die('Error: ' . mysql_error());
       }
       print "New Contest";
   }
       
?>