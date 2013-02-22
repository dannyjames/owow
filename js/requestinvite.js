function populateInvite() {
  var name = document.getElementById("inputName").value;
  var company = document.getElementById("companyName").value;
  var email = document.getElementById("inputEmail").value;
  var phone = document.getElementById("inputPhone").value;
  var employees = document.getElementById("inputEmployees").value;
  var locations = document.getElementById("inputLocations").value;

  
  var xmlhttp = new XMLHttpRequest();
  var params = "inputName=" + name + "&companyName=" + company + "&inputEmail=" + email + "&inputPhone=" + phone + "&inputEmployees=" + employees + "&inputLocations=" + locations;
  xmlhttp.open("GET", "invite.php?"+params,true);
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("request_enter").innerHTML = "Thank you";
      }
   }
  xmlhttp.send();
}

