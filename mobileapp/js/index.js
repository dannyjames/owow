angular.module('app', [], function($routeProvider, $locationProvider) {
  //$locationProvider.html5Mode(true);
  $routeProvider
    .when('/credit', {
      templateUrl: 'partials/credit.html',
      resolve: {
         delay: function() {
            getEmployeeName();    
            getWows();
         }  
      }
    })
    .when('/currency', {
      templateUrl: 'partials/currency.html',
      resolve: {
         delay: function() {
            getCurrency();
            getContest();
         }
      
      }
      
    })
    .when('/feedback', {
      templateUrl: 'partials/feedback.html'
    })
    .when('/rewards', {
      templateUrl: 'partials/rewards.html',
      resolve: {
         delay: function() {
            getRewards();
         }
      
      }
    })
    .when('/screensaver', {
      templateUrl: 'partials/screensaver.html'
    })
    .otherwise({
      redirectTo: '/credit'
    });
});

// var URL = 'http://localhost:8888/getEmployees.php?callback=?&query=';
var URL = '/getEmployees.php?query=';
function getEmployeeName() {
    $.getJSON(URL + "getEmployeeName", function(data) {
      console.log(data);      
      $.each(data, function(key, val) {
         console.log(key  + " " + val);
         console.log(val);
         document.getElementById('creditname').innerHTML = val.employee_name;
      });
    });
}

function getWows() {  
   console.log('getWows');
     
   $.getJSON(URL + "getWows", function(data) {
      var items = [];

      rowNum = 1;
      $.each(data, function(key, val) {
         items.push("<tr class = 'gamerow'>");
         items.push("<td class = 'gamerank'>" + rowNum + "</td>");
         items.push("<td class = 'gamename'>" + val['employee_name']  + "</td>");
         items.push("<td class = 'gamepoints'><span class='wows'>W</span> " + val['SUM(wows)'] + "</td>");         
         items.push("</tr>"); 
         rowNum++;
      });
      
      $('#gameon').append(items.join(''));
   });

}

function getCurrency() {
   $.getJSON(URL + "getCurrency", function(data) {
      var items = [];
      
      $.each(data, function(key, val) {
         items.push("<tr class='gamerow' id = 'id" + val['id'] + "'>");
         items.push("<td class='gamerank'>" + val['rulescurrency'] + "</td>");
         items.push("<td class='gamepoints'><span class='wows'>W</span> " + val['valuecurrency'] + "</td>");
         items.push("</tr>"); 
      });
      
      $('#currencyTable').append(items.join(''));
   });
}

function getContest() {
   $.getJSON(URL + "getContest", function(data) {
      var items = [];
      $.each(data, function(key, val) {
         items.push("<tr class='gamerow'>");
         items.push("<td class='gamerank'>" + val['contestgoal'] + "</td>");
         items.push("<td class='gamepoints'><span class='wows'>W</span> " + val['contestvalue'] + "</td>");
         items.push("<td class='gamepoints'>" + val['contestend'] + "</td>");
         items.push("</tr>"); 
      });

      $('#contestTable').append(items.join(''));
   });
}

function getRewards() {

                /**   echo "<div class ='img-reward'>";
                   echo "<img src = " . substr($row['imagepath'], 9) . ">";
                   echo "<span class='wow-description'>" . $row['item'] . '=' . $row['value'] . "</span>";
                   echo "</div>";**/
                   
   $.getJSON(URL + "getRewards", function(data) {
      var items = [];
      $.each(data, function(key, val) {
         items.push("<div class='img-reward'>");
         items.push("<img src= " + val['imagepath'].substr(9) + " class='display-size'>");
         items.push("<span class='wow-description'>" + val['item'] + " = " + val['value'] + "<span class='wows'>W</span>" + "</span>");
         items.push("</div>"); 
      });

      $('#rewardDivs').append(items.join(''));
   });
}

function Ctrl($scope, $timeout, $location) {
  function sleep() {
    $location.path('/screensaver');
    $scope.blank = true;
  }
  function wake() {
    $timeout.cancel(promise);
    promise = $timeout(sleep, DELAY);
    if ($location.path() === '/screensaver') {
      history.back();
      $scope.blank = false;
    }
  }
  var promise, DELAY = 1000 * 5;
  promise = $timeout(sleep, DELAY);
  $scope.wake = wake;
  $scope.blank = false;

  angular.element(document).bind('touchstart mousemove', wake);
}

function onDeviceReady() {
  angular.bootstrap(document.body, ['app']);
}

if (screen.width > 640)
  onDeviceReady();
else
  document.addEventListener('deviceready', onDeviceReady, false);
  
