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
    <link href="./css/first.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Russo+One|Monofett|Monoton|Chewy|Courgette|Gruppo|Oswald' rel='stylesheet' type='text/css'>
    
    <script type="text/javascript" src="js/manageemployees.js"></script>


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


    <!-- Begin Google Charts -->


    <!-- End Google Charts -->


  </head>

<body class="optimize" data-spy="scroll" data-target=".bs-docs-sidebar">

   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
         <div class="container">
            <div>
               <ul class="nav">
                  <li class="active">
                     <a href="./owow-index.html">oWOW</a>
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
<div class="onboard-container"> 
   <div class="row-fluid">
      <div class="welcomeholder" id="onboard">
         <h3 class="welcome">Hello <span><?php echo $_SESSION['employee_name']; ?></span>!</h3>
      </div>
   </div>
   <div class="row-fluid">
      <div class="span5 offset4">
         <p class="steps">Step 1: Add Employees<span id="newemployee"></span></p>
      </div>
   </div>
   <div class="span5 addbranch">
      <form class="form-horizontal formcenter" action="firstemployees.php" method="post">
         <div class="control-group">
            <label class="control-label" for="employeeName">Employee Full Name: (separate with comma)</label>
            <div class="controls">
               <input type="text" id="employee_name" class="forminputs" name="employee_name" placeholder="First, Last">
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="choosePosition" id="employee_position" name="eposition">Choose Job Type:</label>
            <div class="controls">
               <select id="choosePosition" class="forminputs" name="position">
               <?php
                  if($_SESSION['type'] == 'e') {
                     die("No Access");
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
                     $select = "SELECT job, Jobs.id, Branch.B_id FROM Branch, Jobs WHERE Jobs.B_id = Branch.B_id";
                     $result = mysql_query($select, $con);
                        if(!$result){
                           die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                        }
                     while($row = mysql_fetch_assoc($result)){
                        if($_SESSION['type'] == 'vp' || ($_SESSION['type'] == 'm' && $_SESSION['B_id'] == $row['B_id'])) {
                           echo "<option value = '$row[id]'>";
                           echo $row['job'];
                           echo  "</option>";
                        }
                     }
               ?>
               </select>
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="email">Employee Email:</label>
            <div class="controls">
               <input type="text" id="employee_email" class="forminputs" name="employee_email" placeholder="Employee Email">
               <input class="hidden" type="text" id="mbranch" name="mbranch" value="<?php echo $_SESSION['B_id']; ?>" >
            </div>
         </div>
         <div class="form-action">
            <button type="button" class="btn btn-primary addbutton" onclick="populateEmployee()">Add</button>
         </div>
      </form>
   </div>
   <div class="row-fluid">
      <div class="span3 offset6">
         <a href="./ugame.php"><button type="button" class="btn btn-primary nextbutton">Done</button></a>
      </div>
   </div>
</div>   
</body>
</html>