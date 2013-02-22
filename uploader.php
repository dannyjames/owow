<?php session_start(); ?>
<?php
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "/var/www/test/upload/" . $_FILES["file"]["name"]);
        echo "Stored in: " . "/var/www/test/upload/" . $_FILES["file"]["name"];
        
        $con = mysql_connect('localhost:8889', 'root', 'root');
        if(!$con){
           die('Could not connect: ' . mysql_error($con));
        }

        mysql_select_db('analytics', $con);
        if(!$con){
           die('Could not connect: ' . mysql_error($con));
        }

        if(isset($_SESSION['B_id']) || isset($_SESSION['E_id'])) {        
            $sql = "INSERT INTO Audio_file (B_id, E_id, start, file_path) 
            VALUES (" . $_SESSION['B_id'] . ", " . $_SESSION['E_id'] . ", NOW(), '/test/upload/" . $_FILES["file"]["name"] . "')";
    
            if(!mysql_query($sql,$con)){
                  error_log($sql);
                  error_log(mysql_error());
                  die('Error: ' . mysql_error());
            }
        }
    }
?>