<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>oWOW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-responsive.css" rel="stylesheet">
    <link href="./css/docs.css" rel="stylesheet">
    <link href="./js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="./css/managerial.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Russo+One|Monofett|Monoton|Chewy|Courgette|Gruppo|Oswald' rel='stylesheet' type='text/css'>
    <link href="./css/currencycenter.css" rel="stylesheet">
    

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
    
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>

<body class="optimize" data-spy="scroll" data-target=".bs-docs-sidebar">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <div>
            <ul class="nav">
               <li class="active">
                <a href="./index.html">OWOW</a>
               </li>
               <li class="">
                  <a href="./dashboard.php">Dashboard</a>
               </li>
               <li class="">
                  <a href="./currencycenter.php">Currency Center</a>
               </li>
               <li class="">
                  <a href="./rewardscenter.php">Rewards Center</a>
               </li>
               <li class="">
                  <a href="./manage.php">Manage Employees</a>
               </li>
               <li class="">
                  <a href="./productcenter.php">Product Center</a>
               </li>
            </ul>
            <ul class="nav" id="signout">
               <li class="">
                  <a href="logout.php">Sign Out</a>
               </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

   <div class="container">  
      <div class="row">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav store-list">
               <li class="divider"></li>
               <?php
                     if($_SESSION['type'] == 'e') {
                        die('No Access');
                     }
                     
                     $con = mysql_connect('localhost:8889', 'root', 'root');
                        if(!$con){
                           die('Could not connect: ' . mysql_error($con));
                        }
                        mysql_select_db('analytics', $con);
                        if(!$con){
                           die('Could not connect: ' .mysql_error($con));
                        }
                        $select = "SELECT location, B_id FROM Branch;";
                        $result = mysql_query($select, $con);
                        
                        if(!$result){
                           die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                        }
   
                        while( $row = mysql_fetch_assoc($result)) {
                           if($_SESSION['type'] == 'vp' || ($_SESSION['type'] == 'm' && $_SESSION['B_id'] == $row['B_id'])){
                              echo "<div class='dropdown'>";
                              echo "<li class='analytics_list'>"; 
                              echo "<a class='dropdown-toggle' . data-toggle='dropdown' href='$row[B_id]'>" . $row['location'] . "</a>";
                              echo "<ul class='hide unstyled'>";

                              $select2 = "SELECT employee_name, type FROM employee_details WHERE employee_details.B_id = " . $row['B_id'];
                              $result2 = mysql_query($select2, $con);
                              
                              if(!$result2){ 
                                 error_log(mysql_error($con));
                                 die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                              }
                              
                              while($inner_row = mysql_fetch_assoc($result2)) {
                                 if(strcasecmp($inner_row['type'],'e') == 0) {
                                    error_log($inner_row['employee_name']);
                                     echo "<li class='employeename'>" . $inner_row['employee_name'] . "</li>";
                                 }
                              }
                              echo "</ul>";
                              echo "</li>";
                              echo "</div>";
                              echo "<li class='divider'></li>";
                           }
                        }
               ?>                 
            </ul>
          </div>
        </div>
         <div class="span10">
            <div class="navbar">
               <div class="navbar-inner">
                  <ul class="nav">
                     <li class=""><a href="./currencycenter.php" class="alerts_nav">Create Rules</a></li>
                     <li class=""><a href="./contests.php" class="alerts_nav">Create Contests</a></li>
                  </ul>
               </div>
            </div>
               <h3 class="welcome">Hello <span><?php echo $_SESSION['employee_name']; ?></span>!</h3>
            <div class="analytics-container">
            <div class="row">
               <p class="currency-title">Create Contest<span id="newcontest"></span></p>
            </div>
            <form class="form-inline" action="newcontest.php" method="post">
               <div class="row-fluid" id="goal-lineone">
                  <input class="span6" id="contestgoal" type="text" name="cgoal" placeholder="Enter Contest Goal"/>
                  <input class="span1" id="contestvalue" type="text" name="cvalue" placeholder="Value" />
                  <input type="hidden" id="contestbranch" name="contestbranch" value="<?php echo $_SESSION['B_id']; ?>" />
                  </br>
               </div>
               <div class="row-fluid" id="start-contest">
                  <input class="span1" type="text" name="cstart" id="conteststart" placeholder="Start">
                     <select class="span1">
                        <option>7am</option>
                        <option>8am</option>
                        <option>9am</option>
                        <option>10am</option>
                        <option>11am</option>
                        <option>12pm</option>
                        <option>1pm</option>
                        <option>2pm</option>
                        <option>3pm</option>
                        <option>4pm</option>
                        <option>5pm</option>
                        <option>6pm</option>
                        <option>7pm</option>
                        <option>8pm</option>
                        <option>9pm</option>
                        <option>10pm</option>
                        <option>11pm</option>
                     </select>
                     </br>
               </div>
               <div class="row-fluid">
                  <input class="span1" type="text" name="cend" id="contestend" placeholder="End">
                     <select class="span1">
                        <option>7am</option>
                        <option>8am</option>
                        <option>9am</option>
                        <option>10am</option>
                        <option>11am</option>
                        <option>12pm</option>
                        <option>1pm</option>
                        <option>2pm</option>
                        <option>3pm</option>
                        <option>4pm</option>
                        <option>5pm</option>
                        <option>6pm</option>
                        <option>7pm</option>
                        <option>8pm</option>
                        <option>9pm</option>
                        <option>10pm</option>
                        <option>11pm</option>
                     </select>  
                     <div class="form-action">
                        <button type="button" class="btn btn-primary" id="contestbutton" onclick="populateContest()">Add</button>
                     </div>
               </div>
            </form>
      
            <div class="row-fluid">
               <p class="currency-title">Live Contests</p>
            </div>
            <table class="table" id="current-contests">
               <thead>
                  <tr>
                     <th class="cr-table header">Description</th>
                     <th class="cr-table header">Value</th>
                     <th class="cr-table header">End Date</th>
                     <th class="cr-table header">Delete</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $con = mysql_connect('localhost:8889','root','root');
                        if(!$con){
                           error_log(mysql_error($con));
                           die('Could not connect: ' . mysql_error($con));
                        }
                        mysql_select_db('analytics', $con);
                        if(!$con) {
                           die('Could not connect: ' . mysql_error($con));
                        }
                        $select = "SELECT contestgoal, contestvalue, conteststart, contestend, id, B_id FROM Contests";
                        $result = mysql_query($select, $con);
                        
                           if(!$result){
                           error_log(mysql_error($con));
                           die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                        }
                        
                        while ($row = mysql_fetch_assoc($result)) {
                           if($_SESSION['type'] == 'vp' || ($_SESSION['type'] == 'm' && $_SESSION['B_id'] == $row['B_id'])){
                              echo "<tr id='row". $row['id'] . "'>";
                              echo "<td class='tablebody'>" . $row['contestgoal'] . "</td>";
                              echo "<td class='tablebody'>" . $row['contestvalue'] . "</td>";
                              echo "<td class='tablebody'>" . $row['contestend'] . "</td>";
                              echo "<td class='delete tablebody'><button onclick='deleteId(" . $row['id'] . ")'>delete</button></td>";
                              echo "</tr>";
                           }
                        }
                  ?>
               </tbody>
            </table>
            <div class="row">
               <p class="currency-title">Previous Contests</p>
            </div>
            <table class="table" id="pastcontest-table">
               <thead>
                  <tr>
                     <th class="cr-table header">Description</th>
                     <th class="cr-table header">Value</th>
                     <th class="cr-table header">Winner</th>
                     <th class="cr-table header">Delete</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $con = mysql_connect('localhost:8889','root','root');
                        if(!$con){
                           error_log(mysql_error($con));
                           die('Could not connect: ' . mysql_error($con));
                        }
                        mysql_select_db('analytics', $con);
                        if(!$con) {
                           die('Could not connect: ' . mysql_error($con));
                        }
                        $select2 = "SELECT contestgoal, contestvalue, employee_name, id FROM employee_details, contest_winner, Contests
                        WHERE employee_details.E_id = contest_winner.employee_id and Contests.id = contest_winner.contest_id;";
                        $result2 = mysql_query($select2, $con);
                        
                        if(!$result2){
                           error_log(mysql_error($con));
                           die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                        }
                        echo "<tr id='row" .$row['id'] . "'>";
                        while($row = mysql_fetch_assoc($result2)){
                           echo "<tr id='row". $row['id'] . "'>";
                           echo "<td class='tablebody'>" . $row['contestgoal'] . "</td>";
                           echo "<td class='tablebody'>" . $row['contestvalue'] . "</td>";
                           echo "<td class='tablebody'>" . $row['employee_name'] . "</td>";
                           echo "<td class='delete tablebody'><button onclick='deleteId(" . $row['id'] . ")'>delete</button></td>";
                        }
                        echo "</tr>";

                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
    
    <script type="text/javascript" src="js/newcontest.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
</body>
</html>