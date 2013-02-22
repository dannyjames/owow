function deleteId(id) {

  var params = "id=" + id + "&action=delete";
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "newcontest.php?" + params);
  xhr.send();
  
  var toDelete = document.getElementById("row" + id);
  toDelete.parentNode.removeChild(toDelete);
}

function populateContest() {
   var goal = document.getElementById("contestgoal").value;
   var value = document.getElementById("contestvalue").value;
   var branch = document.getElementById("contestbranch").value;
   var start = document.getElementById("conteststart").value;
   var end = document.getElementById("contestend").value;
   
   var xmlhttp = new XMLHttpRequest();
   var params = "contestgoal=" + goal + "&contestvalue=" + value + "&contestbranch=" + branch + "&conteststart=" + start + "&contestend=" + end;
   xmlhttp.open("GET", "newcontest.php?"+params, true);

   xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("newcontest").innerHTML = "New Contest";
      
         var tr = document.createElement("tr");
         var goalEl = document.createElement("td");
         var valueEl = document.createElement("td");
         var endEl = document.createElement("td");
         var deleteEl = document.createElement("td");
         goalEl.innerHTML = goal;
         valueEl.innerHTML = value;
         endEl.innerHTML = end;
         deleteEl.innerHTML = 'delete';
         tr.appendChild(goalEl);
         tr.appendChild(valueEl);
         tr.appendChild(endEl);
         tr.appendChild(deleteEl);
         var tableEl = document.getElementById("current-contests").getElementsByTagName('tbody')[0];
         tableEl.appendChild(tr);
      }

   }
          
   xmlhttp.send();
}

$("tr").hover(function() {
   $(this).addClass("hover"); 
}, function() {
   $(this).removeClass("hover");
});
