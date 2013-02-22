angular.module('app', [], function($routeProvider, $locationProvider) {
  console.log('app');
  //$locationProvider.html5Mode(true);

  $routeProvider
    .when('/', {
      templateUrl: 'partials/list.html',
      controller: ListCtrl
    })
    .when('/area/:area', {
      templateUrl: 'partials/area.html',
      controller: SublistCtrl
    })
    .when('/routine/:routine', {
      templateUrl: 'partials/routine.html',
      controller: DetailCtrl
    })
  ;
});

if (screen.width > 900)
  angular.bootstrap(document.body, ['app']);
document.addEventListener('deviceready', function() {
  console.log('deviceready');
  angular.bootstrap(document.body, ['app']);
}, false);

function ListCtrl($scope, $http) {
  $scope.add = function() {
    $scope.areas.push({ area: '', routines: [''] });
    $scope.open = true;
  };
  $scope.submit = function() {
    $scope.areas[$scope.areas.length - 1].area = this.text;
    $scope.open = false;
  };
  $scope.delete = function(obj) {
    var areas = $scope.areas;
    for (var i = 0, l = areas.length; i < l; i++) {
      if (areas[i] === obj)
        areas.splice(i, 1);
    }
  };
  $scope.doSend = function() {
      var composer = new EmailComposer();
    composer.showEmailComposer(
      'subject', 'body', ['to@you.com'], [], [], false, []);
  };
}

function SublistCtrl($scope, $routeParams, $rootScope) {
  var area = $routeParams.area;
  $rootScope.backArea = area;
  var areas = $scope.areas;
  for (var i = 0, l = areas.length; i < l; i++) {
    if (areas[i].area === area) break;
  }
  $scope.area = area;
  $scope.routines = areas[i].routines;
  $scope.add = function() {
    $scope.routines.push('');
    $scope.open = true;
  };
  $scope.submit = function() {
    $scope.routines[$scope.routines.length - 1] = this.text;
    $scope.open = false;
  };
  $scope.delete = function(routine) {
    var routines = $scope.routines;
    for (var i = 0, l = routines.length; i < l; i++) {
      if (routines[i] === routine)
        routines.splice(i, 1);
    }
  };
}

function DetailCtrl($scope, $routeParams, $rootScope) {
  var routine = $routeParams.routine;
  $scope.routine = routine;

  function $(css) {
    return document.body.querySelector(css);
  }

  canvas = $('canvas');
  var docEl = document.documentElement;
  canvas.width = docEl.clientWidth;
  canvas.height = docEl.clientHeight - 1 - $('.navbar').clientHeight - $('textarea').clientHeight;
  var img = new Image();
  img.onload = function() {
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
  };
  img.src = 'img/squats_front.png';
  ctx = canvas.getContext('2d');
  $canvas = angular.element(canvas);
  $canvas.bind('mousedown touchstart', start);
  $canvas.bind('mousemove touchmove', move);
  $canvas.bind('mouseup touchend', end);

  $scope.save = function() {
    $scope.send[routine] = {};
    $scope.send[routine].text = $scope.text;
    $scope.send[routine].data = canvas.toDataURL();
  };

  function win(data) {
    console.log('win', data);
    //ctx.drawImage(data, 0, 0);
  }
  function fail(msg) {
    console.log('fail', msg);
  }
  $scope.photo = function() {
    navigator.camera.getPicture(win, fail);
  };
}

function Ctrl($scope, $http) {
  console.log('Ctrl');
  $scope.send = {};
  $http({ method: 'GET', url: 'data.json' })
    .success(function(data, status, headers, config) {
      $scope.areas = data;
    })
    ;
}
