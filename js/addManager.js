function addManager(){
  var name = document.getElementById("manager_name").value;
  var email = document.getElementById("manager_email").value;
  var positionSel = document.getElementById("branch");
  var position = positionSel.options[positionSel.selectedIndex].value;
  
  var xmlhttp = new XMLHttpRequest();
  var params = "manager_name=" + name + "&manager_email=" + email + "&mbranch=" + position;
  xmlhttp.open("GET", "managerform.php?"+params,true);
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("newmanager").innerHTML = "Added Manager";
      }
  }
  xmlhttp.send();
}
