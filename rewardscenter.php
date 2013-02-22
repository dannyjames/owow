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
    <link href="../js/google-code-prettify/prettify.css" rel="stylesheet">
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
                <a href="./index.html">oWOW</a>
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
                        die('No access');
                     }
                     $type = $_SESSION['type'];
                     error_log($_SESSION['type']); 
                     $B_id = $_SESSION['B_id'];
                     error_log($_SESSION['B_id']); 
                     $E_id = $_SESSION['E_id'];
                     error_log($_SESSION['E_id']); 
                     
                     $con = mysql_connect('localhost:8889', 'root', 'root');
                        if(!$con){
                           die('Could not connect: ' . mysql_error($con));
                        }
                        mysql_select_db('analytics', $con);
                        if(!$con){
                           die('Could not connect: ' . mysql_error($con));
                        }
                        $select = "SELECT location, B_id FROM Branch;";
                        $result = mysql_query($select, $con);
                        
                        if(!$result){
                           die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                        }
    
                        while( $row = mysql_fetch_assoc($result)) {
                           if($_SESSION['type'] == 'vp' || ($_SESSION['type'] == 'm' && $_SESSION['B_id'] == $row['B_id'])) {
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
            <h3 class="welcome">Hello <span><?php echo $_SESSION['employee_name']; ?></span>!</h3>
            <div class="analytics-container">
               <p class="currency-title">Create Rewards<span id="newreward"></span></p>
               <form class="form-horizontal" id="form1" enctype="multipart/form-data" action="rewards.php" method="post">
                     <input class="span3" type="text" id="item" name="item" placeholder="Item Description">
                     <input class="span1" type="text" id="value" name="value" placeholder="Value">
                     <input type="hidden" name="rewardbranchid" id="rbranch" value="<?php echo $_SESSION['B_id'];?>" >
                  <div class="imagebreak">
                     <label class="span2" id="imagelabel" for="fileToUpload">Select Image for Reward:</label>
                     <input class="span3" type="file" name="fileToUpload" id="fileToUpload" />
                  </div>
                  <div>
                     <input type="button" class="btn btn-primary" id="rewardbutton" onclick="uploadFile()" value="Add"/>
                  </div>
               </form>
               
               <p class="currency-title">Current Rewards</p>
               <table class="table" id="table-rewards">
                  <thead>
                     <tr>
                        <th class="cr-table header">Item Description</th>
                        <th class="cr-table header">Value</th>
                        <th class="cr-table header">Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $con = mysql_connect('localhost:8889', 'root', 'root');
                           if(!$con){
                              die('Could not connect: ' . mysql_error($con));
                           }
                           mysql_select_db('analytics', $con);
                           if(!$con){
                              die('Could not connect: ' . mysql_error($con));
                           }
                           $select = "SELECT item, value, id, B_id FROM Rewards";
                           $result = mysql_query($select, $con);
                           
                           if(!$result){
                              die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                           }
                           while($row = mysql_fetch_assoc($result)){
                              if($_SESSION['type'] == 'vp' || ($_SESSION['type'] == 'm' && $_SESSION['B_id'] == $row['B_id'])) {
                                echo "<tr id='row" . $row['id'] . "'>";
                                echo "<td class='tablebody'>" . $row['item'] . "</td>";
                                echo "<td class='tablebody'>" . $row['value'] . "</td>";
                                echo "<td class='delete tablebody'><button onclick='deleteId(" . $row['id']  . ")'>delete</button></td>";
                                echo "</tr>";
                              }
                           }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
   </div>
    
    <script type="text/javascript" src="js/reward.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
    
</body>
</html>