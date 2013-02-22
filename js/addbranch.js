
function populateBranch() {
  var location = document.getElementById("branchLocation").value;
  var name = document.getElementById("branchName").value;
  var position = document.getElementById("positionList").value;
    
  var xmlhttp = new XMLHttpRequest();
  var params = "branchLocation=" + location + "&branchName=" + name + "&positionList=" + position;
  xmlhttp.open("GET", "branch.php?"+params,true);
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("addbranch").innerHTML = "Added Branch";
      }
  }
  xmlhttp.send();
}