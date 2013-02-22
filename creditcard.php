<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Owow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The ultimate work game">
    <meta name="keywords" content="employee, work, game, fun, ultimate,">


    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/employeeleaderboard.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Russo+One|Monofett|Monoton|Chewy|Courgette|Gruppo|Oswald' rel='stylesheet' type='text/css'>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script> 
    
    <script src="assets/js/jquery.js"></script>


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" charset="utf-8" src="cordova-2.3.0rc2.js"></script>
    <script type="text/javascript" charset="utf-8">
        
        // Wait for Cordova to load
        //
        document.addEventListener("deviceready", onDeviceReady, false);
        
        // Audio player
        //
        var my_media = null;
        var mediaTimer = null;
        
        // Play audio
        //
        function playAudio(src) {
            // Create Media object from src
            my_media = new Media(src, onSuccess, onError);
            
            // Play audio
            my_media.play();
            
            // Update my_media position every second
            if (mediaTimer == null) {
                mediaTimer = setInterval(function() {
                 // get my_media position
                 my_media.getCurrentPosition(
                    // success callback
                    function(position) {
                       if (position > -1) {
                           setAudioPosition((position) + " sec");
                        }
                    },
                    // error callback
                    function(e) {
                        console.log("Error getting pos=" + e);
                        setAudioPosition("Error: " + e);
                     }
                  );
                 }, 1000);
            }
        }
        function recordAudio() {
            var my_media = new Media("test.wav");
            my_media.startRecord();
            var recTime = 0;
            var recInterval = setInterval(
                function() {
                    recTime = recTime + 1;
                    setAudioPosition(recTime + " sec");
                    if (recTime >= 10) {
                        clearInterval(recInterval);
                        my_media.stopRecord();
                        my_media.play();
                        uploadFile("Documents://test.wav");
                    }
                }, 1000);
        }
        
        function uploadFile(filename) {
            var options = new FileUploadOptions();
            options.fileName="test.wav";
            options.mimeType="audio/wav";
            
            var params = {};
            params.value1 = "test";
            params.value2 = "param";
            
            options.params = params;
            
            var ft = new FileTransfer();
            ft.upload("test.wav", encodeURI("http://oowow.me/test/upload.php"), win, fail, options);
        }
        
        function win(r) {
            console.log("Code = " + r.responseCode);
            console.log("Response = " + r.response);
            console.log("Sent = " + r.bytesSent);
        }
        
        function fail(error) {
            switch(error.code) {
                /*
                case FileError.NOT_FOUND_ERR: alert("Not found error"); break;
                case FileError.SECURITY_ERR: alert("Security error"); break;
                case FileError.ABORT_ERR: alert("Abort error"); break;
                case FileError.NOT_READABLE_ERR: alert("Not readable error"); break;
                case FileError.ENCODING_ERR: alert("Encoding error"); break;
                case FileError.NO_MODIFICATION_ALLOWED_ERR: alert("No modification allowed error"); break;
                case FileError.INVALID_STATE_ERR: alert("invalid state error"); break;
                case FileError.SYNTAX_ERR: alert("syntax error"); break;
                case FileError.INVALID_MODIFICATION_ERR: alert("invalid modification error"); break;
                case FileError.QUOTA_EXCEEDED_ERR: alert("quota exceeded error"); break;
                case FileError.TYPE_MISMATCH_ERR: alert("type mismatch error"); break;
                case FileError.PATH_EXISTS_ERR: alert("Not readable error"); break;
                 */
                case FileTransferError.FILE_NOT_FOUND_ERR: alert("File not found"); break;
                case FileTransferError.INVALID_URL_ERR: alert("Invalid url error"); break;
                case FileTransferError.CONNECTION_ERR: alert("Connection error"); break;
                default: alert("unknown error");
            }
            alert("An error has occurred: Code = " + error.code);
            console.log("upload error source " + error.source);
            console.log("upload error target " + error.target);
        }

        
        function onDeviceReady() {
            recordAudio();
        }
        
        // Pause audio
        // 
        function pauseAudio() {
            if (my_media) {
                my_media.pause();
            }
        }
        
        // Stop audio
        // 
        function stopAudio() {
            if (my_media) {
                my_media.stop();
            }
            clearInterval(mediaTimer);
            mediaTimer = null;
        }
        
        // onSuccess Callback
        //
        function onSuccess() {
            console.log("playAudio():Audio Success");
        }
        
        // onError Callback 
        //
        function onError(error) {
            alert('code: '    + error.code    + '\n' + 
                  'message: ' + error.message + '\n');
        }
        
        // Set audio position
        // 
        function setAudioPosition(position) {
            document.getElementById('audio_position').innerHTML = position;
        }
        
        </script>

  </head>

<body class="optimize" data-spy="scroll" data-target=".bs-docs-sidebar">


    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="topappbar">
          <div>
            <ul class="nav">
              <li class="">
                <a href="./creditcard.php">Credit</a>
              </li>
              <li class="">
                <a href="./feedback.php">Currency</a>
              </li>
              <li class="">
                <a href="./rules.php">Rewards</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="credit-container" id="credit-card">
      <div class="row-fluid"> 
         <h1 id="startgame">PURSUIT of GREATNESS</h1>
      </div>
      <div class="row-fluid" id="center">
         <div class="holding-circle">
            <p class="currency">250</p>
            <p class="currency-type">WOWS</p>
         </div>
      </div>
      <div class="row-fluid">
         <div class="credit-rowleft">
            <a href="./feedback.php#rules-title"><p class="earn-currency">Earn Currency</p></a>
         </div>
         <div class="credit-rowright">
            <a href="./feedback.php#contest-title"><p class="live-contest">Live Contest</p></a>
         </div>
      </div>
      <div class="row-fluid">
         <?php
            session_start();
            
            $con = mysql_connect('localhost:8889', 'root', 'root');
                    if(!$con){
                       die('Could not connect: ' . mysql_error($con));
                    }
     
                    mysql_select_db('analytics', $con);
                    if(!$con){
                       die('Could not connect: ' . mysql_error($con));
                    }
                    $select = "SELECT employee_name FROM employee_details, Members WHERE employee_details.E_id = " . $_SESSION['E_id'];
                    $result = mysql_query($select, $con);
                    
                    if(!$result){
                        error_log(mysql_error($con));
                        die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                    }
                    while($row = mysql_fetch_array($result)){
                        echo "<a href = '#leaderboard'>" . "<p class = 'creditname'>" . $row['employee_name'] . "</p>" . "</a>";
                    }

                  
         ?>
      </div>
    </div>
    <div class="app-container">  
      <div class="row-fluid">
         <table class="table table-striped" id="leaderboard">
            <thead class="categories">
               <tr>
                  <th class="rank">Rank</th>
                  <th class="name">Name</th>
                  <th class="points">W</th>
               </tr>
            </thead>
            <tbody>
                <?php
                
                    error_log("Test");
                    $con = mysql_connect('localhost:8889', 'root', 'root');
                    if(!$con){
                       die('Could not connect: ' . mysql_error($con));
                    }
     
                    mysql_select_db('analytics', $con);
                    if(!$con){
                       die('Could not connect: ' . mysql_error($con));
                    }
                    $select = "SELECT employee_name, SUM(wows) FROM employee_details, Interaction_Details where employee_details.E_id = Interaction_Details.E_id group by Interaction_Details.E_id order by SUM(wows) DESC";
                    $result = mysql_query($select, $con);
                    
                    if(!$result){
                       error_log("We died " . mysql_error($con));
                       die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                    }
                    
                    $rowNum = 1;
                    while ($row = mysql_fetch_assoc($result)) {
                       error_log($row['employee_name'] . " " . $row['wows']);
                       echo "<tr class ='gamerow' . id='gameone'>";
                       echo "<td class='gamerank'>" . $rowNum . "</td>";
                       echo "<td class='gamename'>" . $row['employee_name'] . "</td>";
                       echo "<td class='gamepoints'>" . $row['SUM(wows)'] . "</td>";
                       echo "</tr>";
                       $rowNum++;
                   }
                ?>
            </tbody>
         </table>
      </div>
    <!--</div>
    <a href="#" class="btn large" onclick="playAudio('recorder_9.wav');">Play Audio</a>
    <a href="#" class="btn large" onclick="pauseAudio();">Pause Playing Audio</a>
    <a href="#" class="btn large" onclick="stopAudio();">Stop Playing Audio</a>
    <p id="audio_position"></p>-->
</body>
</html>
