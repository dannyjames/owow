
   function deleteId(id) {
   
      var params = "id=" + id + "&action=delete";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "rewards.php?" + params);
      xhr.send();
      
      var toDelete = document.getElementById("row" + id);
      toDelete.parentNode.removeChild(toDelete);
   }

   function uploadFile() {
        var fd = new FormData();
        fd.append("file", document.getElementById('fileToUpload').files[0]);
        console.log(document.getElementById("fileToUpload").files[0]);
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        
        var item = document.getElementById("item").value;
        var value = document.getElementById("value").value;
        var branch = document.getElementById("rbranch").value;
        
        var params = "item=" + item + "&value=" + value + "&rbranch=" + branch;
        xhr.open("POST", "rewards.php?" + params);
        xhr.onreadystatechange = function() {

            if(xhr.readyState==4 && xhr.status==200) {
               document.getElementById("newreward").innerHTML = "New Reward Added";

               var tr = document.createElement("tr");
               var itemEl = document.createElement("td");
               var valueEl = document.createElement("td");
               var deleteEl = document.createElement("td");
               itemEl.innerHTML = item;
               valueEl.innerHTML = value;
               deleteEl.innerHTML = 'delete';
               tr.appendChild(itemEl);
               tr.appendChild(valueEl);
               tr.appendChild(deleteEl);
               var tableEl = document.getElementById("table-rewards").getElementsByTagName('tbody')[0];
               tableEl.appendChild(tr);
            }
        }
        xhr.send(fd);
      }

      $("tr").hover(function() {
      $(this).addClass("hover"); 
      }, function() {
      $(this).removeClass("hover");
      });

      function uploadProgress(evt) {
        if (evt.lengthComputable) {
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
          document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
        }
        else {
          document.getElementById('progressNumber').innerHTML = 'unable to compute';
        }
      }

      function uploadComplete(evt) {
        /* This event is raised when the server send back a response */
        alert(evt.target.responseText);
      }

      function uploadFailed(evt) {
        alert("There was an error attempting to upload the file.");
      }

      function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
      }