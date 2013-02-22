
function deleteId(id) {

  var params = "id=" + id + "&action=delete";
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "currency.php?" + params);
  xhr.send();
  
  var toDelete = document.getElementById("row" + id);
  toDelete.parentNode.removeChild(toDelete);
}

function populateCurrency() {
  var currency = document.getElementById("rcurrency").value;
  var value = document.getElementById("vcurrency").value;
  var branch = document.getElementById("cbranch").value;
  console.log(document.getElementById("cbranch").value);    
  var xmlhttp = new XMLHttpRequest();
  var params = "rcurrency=" + currency + "&vcurrency=" + value + "&cbranch=" + branch;
  xmlhttp.open("GET", "currency.php?"+params,true);
  xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
         document.getElementById("newrule").innerHTML = "Added Rule";
         
         var tr = document.createElement("tr");
         var currencyEl = document.createElement("td");
         var valueEl = document.createElement("td");
         var deleteEl = document.createElement("td");
         currencyEl.innerHTML = currency;
         valueEl.innerHTML = value;
         deleteEl.innerHTML = 'delete';
         tr.appendChild(currencyEl);
         tr.appendChild(valueEl);
         tr.appendChild(deleteEl);
         var tableEl = document.getElementById("currency-table").getElementsByTagName('tbody')[0];
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
