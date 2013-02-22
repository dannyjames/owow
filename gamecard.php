<?php session_start() ?>
<!DOCTYPE html>
<html ng-app>
<head>
  <title>Scorecard</title>
  <script src="js/angular.js"></script>
  <script src="js/scorecard.js"></script>

  <link href="css/gamecard.css" rel="stylesheet">
</head>
<body ng-controller="Ctrl">
<div id="newAudio">
   Audio Clip</br> To count an interaction press "Start Conversation".  When Interaction is over press "End Interaction".</br>
   To edit an interaction click on box.
</div>
  <?php
       /*$con = mysql_connect('localhost:8889', 'root', 'root');
         if(!$con){
            die('Could not connect: ' . mysql_error($con));
         }
         mysql_select_db('analytics', $con);
            if(!$con){
               die('Could not connect: ' . mysql_error($con));
            }
         $select = "SELECT I_id, file_path FROM Audio_file WHERE processed != 1 LIMIT 1 ";
         $result = mysql_query($select, $con);
         if(!$result){
            die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
         }
         
         while($row = mysql_fetch_assoc($result)) {
            echo "<input type='hidden' id='I_id' value='$row[I_id]'></input>";
            echo "<audio controls id='audioSource' src='$row[file_path]'>";
            echo  "</audio>";
         } */
   ?>
   
<input type='hidden' id='A_id' value=''></input>
<audio controls id='audioSource' src=''></audio>
<div class="startstop">
   <button ng-click="startConversation()" id="startStop">Start Conversation</button>
   <!--<button ng-click="stopConversation()">Stop Conversation</button>-->
</div>
<div class="time-container">
   <ul ng-repeat="row in rows">
      <li ng-click="row.edit = true" class="start_box" id="start_box">
         <span ng-hide="row.edit">{{ row.start }} / {{ row.end }} / {{ row.length }}</span>
            <form ng-submit="row.edit = false" ng-show="row.edit">
               <input type="text" ng-model="row.start"> 
               <input type="text" ng-model="row.end">
               <button>Save</button>
            </form>
         </li>
   </ul>
   <button ng-click="next()">Next</button>

</body>
<script>
      window.onload = function() { next(); };
</script>

</html>