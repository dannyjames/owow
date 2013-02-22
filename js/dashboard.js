var URL = 'http://owow.com/getID.php?graph_type=';
function getJSON() {
  var hash = location.hash.slice(1) || '{}'
    , obj = JSON.parse(hash)
    , store    = obj.store
    , employee = obj.employee
    ;

  var s = '';
  if (store)
    s += '&store=' + store;
  if (employee)
    s += '&employee=' + employee;

  for (var key in cb) {
    $.getJSON(URL + key + s, cb[key]);
  }
}

function getHash() {
  var hash = location.hash.slice(1) || '{}';
  return JSON.parse(hash);
}

function chart(res, id, X, Y, type, options) {
  options = options || {};
  var data = new google.visualization.DataTable;
  data.addColumn('string', x);
  data.addColumn('number', y);

  var x, y;
  for (var i = 0, l = res.length; i < l; i++) {
    x = res[i][X];
    y = Number(res[i][Y]);
    data.addRows([[x, y]]);
  }

  var el = $('#' + id)[0];
  var chart = new google.visualization[type](el);
  chart.draw(data, options);
}

function listen() {
  $('.dropdown-toggle').on('click', function(e) {
    e.preventDefault();
    var $el = $(this);
    var id = $el.attr('href').match(/\d+/)[0];
    console.log('listen');
    $('.analytics_list')
      .css({ backgroundColor: '' })
      .find('.hide').hide()
      ;
    $el.next().show();
    $el.parent().css({ backgroundColor: 'white' });
    location.hash = JSON.stringify({ store: id });
    getJSON();
  });
  $('.employeename').on('click', function(e) {
    e.preventDefault();
    var $el = $(this);
    var id = $el.attr('id').match(/\d+/)[0];
    $('.selected_employee').removeClass('selected_employee');
    $el.addClass('selected_employee');

    var hash = location.hash.slice(1) || '{}'
      , obj = JSON.parse(hash)
      , store = obj.store
      ;
    location.hash = JSON.stringify({ store: store, employee: id });
    getJSON();
  });
}

var cb = {
  interactions_count: function(res) {
    chart(res, 'interactions_count', 'ic_hour', 'no_of_interactions', 'LineChart');
  },
  length_of_interactions: function(res) {
    chart(res, 'length_of_interactions', 'ic_hour', 'avg_length_minutes', 'LineChart');
  },
  interactions_employee: interactions_employee,
  contests_won: contests_won,
  trending: trending,
  eff_ratio: function(res) {
    chart(res, 'eff_ratio', 'ic_hour', 'avg_eff_ratio', 'LineChart');
  },
};

function contests_won(res) {
  var employee = getHash().employee;
  var countEmp   = null;
  var countOther = 0;
  if (employee) {
    for (var i = 0, l = res.length; i < l; i++) {
      var count = Number(res[i].TOTAL_WINS);
      if (res[i].EMPLOYEE_ID == employee)
        countEmp = count;
      else
        countOther += count;
    }
    res = [
      { EMPLOYEE_ID: employee, TOTAL_WINS: countEmp },
      { EMPLOYEE_ID: 'other', TOTAL_WINS: countOther }
    ];
  }
  var options = {
    height: 225,
    width:  500   ,
    backgroundColor: { fill: 'transparent' },
  };
  chart(res, 'contests_won', 'EMPLOYEE_ID', 'TOTAL_WINS', 'PieChart', options);
}

function interactions_employee(res) {
  var employee = getHash().employee;
  var countEmp   = null;
  var countOther = 0;
  if (employee) {
    for (var i = 0, l = res.length; i < l; i++) {
      var count = Number(res[i].No_of_interactions);
      if (res[i].employee_name == employee)
        countEmp = count;
      else
        countOther += count;
    }
    res = [
      { EMPLOYEE_ID: employee, No_of_interactions: countEmp },
      { EMPLOYEE_ID: 'other', No_of_interactions: countOther }
    ];
  }
  var options = {
    height: 225,
    width:  500,
    backgroundColor: { fill: 'transparent' },
  };
  chart(res, 'interactions_employee', 'employee_name', 'No_of_interactions', 'PieChart', options);
}

function trending(res) {
  var arr = []
    , first = res.shift()
    , then = first.AVG_INTERACTION_LENGTH
    , now = null
    ;
  arr.push([first.day_month, 0]);
  arr.push({
    day_month: first.day_month,
    delta: 0
  });
  for (var i = 0, l = res.length; i < l; i++) {
    now = res[i].AVG_INTERACTION_LENGTH;
    arr.push({
      day_month: res[i].day_month,
      delta: now - then
    });
    then = now;
  }
  chart(arr, 'trending', 'day_month', 'delta', 'LineChart');
}

function trending(res) {
  var prevLen = 0
    , prevCount = 0
    , curLen
    , curCount
    , day_month
    , item
    , arr = []
    , employee = getHash().employee
    ;

  if (employee) {
    res = res.filter(function(item, i) {
        return item.EMPLOYEE_ID === employee
    });
    console.log(res);
  }
  
  for (var i = 0, l = res.length; i < l; i++) {
    item = res[i];
    day_month = item.day_month;
    curLen    = Number(item.AVG_INTERACTION_LENGTH);
    curCount  = Number(item.AVG_INTERACTION_COUNT);
    deltaLen   = curLen - prevLen;
    deltaCount = curCount - prevCount;

    arr.push([day_month, deltaLen, deltaCount]);

    prevLen   = curLen;
    prevCount = curCount;
  }

  var options = {};
  var data = new google.visualization.DataTable;
  data.addColumn('string', 'day_month');
  data.addColumn('number', 'deltaCount');
  data.addColumn('number', 'deltaLen');

  data.addRows(arr);

  var el = $('#trending')[0];
  var chart = new google.visualization.LineChart(el);
  chart.draw(data, options);
}

google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(getJSON);

listen();
