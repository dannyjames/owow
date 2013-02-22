function populateData() {
   var name = document.getElementById("employeeName").value;
   var branch = document.getElementById("branch").value;
   var email = document.getElementById("email").value;
   
   var xmlhttp = new XMLHttpRequest();
   var params = "email=" + email + "&name=" + name + "&branch=" + branch;
   xmlhttp.open("GET", "mail.php?"+params,true);
   xmlhttp.onreadystatechange = function() {
       if (xmlhttp.readyState==4 && xmlhttp.status==200) {
          document.getElementById("added").innerHTML = "Added employee";
       }
   }
   xmlhttp.send();
}