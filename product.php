<?php
   $con = mysql_connect('localhost:8889', 'root', 'root');
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }
   error_log("here");
   mysql_select_db('analytics', $con);
   if(!$con){
      die('Could not connect: ' . mysql_error($con));
   }

   if($_GET["action"] == "delete") {
      $deleterow = "DELETE FROM Routine WHERE id = " . $_GET["id"];

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
    
          $imagepath = "/var/www/test/upload/" . $_FILES["file"]["name"];
          move_uploaded_file($_FILES["file"]["tmp_name"], $imagepath);
       }
       
       $sql ="INSERT INTO Routine (W_id, exercise, B_id, images)
         VALUES('$_GET[category]','$_GET[routine]','$_GET[fbranch]','$imagepath')";
       if(!mysql_query($sql,$con)){
         error_log(mysql_error());
         die('Error: ' . mysql_error());
      }
      print "New Routine";
         
   }
       
?>