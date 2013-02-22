var interactionCount = 0;
var interactionLength = 0;

rows = [];

function Ctrl($scope, $http) {
    $scope.rows = [];
    var audio = document.querySelector('audio');
    function getTime() {
     return audio.currentTime.toPrecision(2);
    }
    $scope.state = "Start";
    $scope.startConversation = function() {
        if($scope.state == "Start") {
           $scope.rows.push({
              start: getTime(),
              edit: false
              });
            interactionCount++;
            $scope.state 
            console.log(interactionCount);
            $scope.state = "Stop";
            document.getElementById("startStop").innerHTML = "Stop Conversation";
         } else {
            var row = $scope.rows[$scope.rows.length-1];
            row.A_id = document.getElementById("A_id").value;
            row.end = getTime();
            row.length = (row.end - row.start).toPrecision(2);
            rows.push(row);
            $scope.state = "Start";
            document.getElementById("startStop").innerHTML = "Start Conversation";
         }
    };
    $scope.stopConversation = function() {
        var row = $scope.rows[$scope.rows.length-1];
        row.A_id = document.getElementById("A_id").value;
        row.end = getTime();
        row.length = (row.end - row.start).toPrecision(2);
        rows.push(row);
    };
    
    $scope.next = function() {
      console.log(rows);
      var id = document.getElementById("A_id").value;
    
      var xmlhttp = new XMLHttpRequest();
      /*var params = "A_id=" + id +
                    "&Interactions=" + interactionCount +
                    "&length=0" $scope.rows.length;*/
                    
      var params = "json=" + JSON.stringify(rows);
                    
      xmlhttp.open("GET", "cardcount.php?"+params,true);
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
             console.log(xmlhttp.responseText);
             var data = JSON.parse(xmlhttp.responseText);
             document.getElementById("A_id").setAttribute('value', data['A_id']);
             document.getElementById("audioSource").setAttribute('src', data['file_path']);
             interactionCount = 0;
             interactionCount = 0;
             
             
             var nodes = document.getElementsByClassName("start_box");
             while(nodes.length > 0) {
               $scope.deleteRow(nodes[0]);
             }
             while($scope.rows.length > 0) {
                 $scope.rows.pop();             
             }
          }
      }
      xmlhttp.send();
          
    }
    
    $scope.deleteRow = function(child) {
      child.parentNode.removeChild(child);
    }
}

   next = function() {
      console.log(rows);
      var id = document.getElementById("A_id").value;
    
      var params="";
      if(id != 0) {
          params = "A_id=" + id +
                        "&Interactions=" + interactionCount +
                        "&length=0";//TODO + $scope.rows.length;
      }
      
      var xmlhttp = new XMLHttpRequest(); 
      xmlhttp.open("GET", "cardcount.php?"+params,true);
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
             console.log(xmlhttp.responseText);
             var data = JSON.parse(xmlhttp.responseText);
             document.getElementById("A_id").setAttribute('value', data['A_id']);
             document.getElementById("audioSource").setAttribute('src', data['file_path']);
             interactionCount = 0;
             interactionCount = 0;
          }
      }
      
      xmlhttp.send();
    
    }


