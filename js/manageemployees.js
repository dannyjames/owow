function deleteId(E_id) {

  var params = "E_id=" + E_id + "&action=delete";
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "manageemployees.php?" + params);
  xhr.send();
  
  var toDelete = document.getElementById("row" + E_id);
  toDelete.parentNode.removeChild(toDelete);
}


function populateData() {
  var name = document.getElementById("employee-name").value;
  var positionSel = document.getElementById("employee-position");
  var position = positionSel.options[positionSel.selectedIndex].value;
  var email = document.getElementById("email").value;
  var branch = document.getElementById("mbranch").value;
  
  var xmlhttp = new XMLHttpRequest();
  var params = "ename=" + name + "&eposition=" + position + "&email=" + email + "&mbranch=" + branch;
  xmlhttp.open("GET", "manageemployees.php?"+params,true);
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("added").innerHTML = "Added employee";
         var tr = document.createElement("tr");
         var nameEl = document.createElement("td");
         var positionEl = document.createElement("td");
         var emailEl = document.createElement("td");
         var deleteEl = document.createElement("td");
         
         var deleteButton = document.createElement("button");
         deleteButton.innerHTML = "delete";
         //todo get employee id from backend
         deleteButton.setAttribute("onclick", "deleteId()");
         deleteEl.appendChild(deleteButton);
         
         nameEl.innerHTML = name;
         positionEl.innerHTML = positionSel.options[positionSel.selectedIndex].innerHTML;
         emailEl.innerHTML = email;
         tr.appendChild(nameEl);
         tr.appendChild(positionEl);
         tr.appendChild(emailEl);
         tr.appendChild(deleteEl);
         
         var tableEl = document.getElementById("employee-table").getElementsByTagName('tbody')[0];
         tableEl.appendChild(tr);
      }
  }
  xmlhttp.send();
}

function populateEmployee() {
  var name = document.getElementById("employee_name").value;
  var position = document.getElementById("choosePosition").value;
  var email = document.getElementById("employee_email").value;
  var branch = document.getElementById("mbranch").value;

  var xmlhttp = new XMLHttpRequest();
  var params = "employee_name=" + name + "&position=" + position + "&employee_email=" + email + "&branch=" + branch;
  xmlhttp.open("GET", "firstemployees.php?"+params,true);
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("newemployee").innerHTML = "Added Employee";
      }
  }
  xmlhttp.send();
}


function getQueryParams(qs) {
    qs = qs.split("+").join(" ");

    var params = {}, tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])]
            = decodeURIComponent(tokens[2]);
    }

    return params;
}

$("tr").hover(function() {
   $(this).addClass("hover"); 
}, function() {
   $(this).removeClass("hover");
});


