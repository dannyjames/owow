
   function deleteId(id) {
   
      var params = "id=" + id + "&action=delete";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "product.php?" + params);
      xhr.send();
      
      var toDelete = document.getElementById("row" + id);
      toDelete.parentNode.removeChild(toDelete);
   }

   function uploadFile() {
        var fd = new FormData();
        fd.append("file", document.getElementById('fileToUpload').files[0]);
        console.log(document.getElementById("fileToUpload").files[0]);
        var xhr = new XMLHttpRequest();
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);

        var categorySel = document.getElementById("category");
        var category = categorySel.options[categorySel.selectedIndex].value;
        var routine = document.getElementById("routine").value;
        var branch = document.getElementById("fbranch").value;

        var params = "category=" + category + "&routine=" + routine + "&fbranch=" + branch;
        xhr.open("POST", "product.php?" + params);
        xhr.onreadystatechange = function() {
            if(xhr.readyState==4 && xhr.status==200) {
               document.getElementById("newexercise").innerHTML = "New Exercise Added";

               var tr = document.createElement("tr");
               var categoryEl = document.createElement("td");
               var routineEl = document.createElement("td");
               var deleteEl = document.createElement("td");
               
               var deleteButton = document.createElement("button");
               deleteButton.innerHTML = "delete";
               deleteButton.setAttribute("onclick", "deleteId('id')");
               deleteEl.appendChild(deleteButton); 
               
               categoryEl.innerHTML = categorySel.options[categorySel.selectedIndex].innerHTML;
               routineEl.innerHTML = routine;
               tr.appendChild(categoryEl);
               tr.appendChild(routineEl);
               tr.appendChild(deleteEl);
               
               var tableEl = document.getElementById("table-exercise").getElementsByTagName('tbody')[0];
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


      function uploadFailed(evt) {
        alert("There was an error attempting to upload the file.");
      }

      function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
      }