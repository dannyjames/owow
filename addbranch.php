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
    
    <script type="text/javascript" src="./js/addbranch.js"></script>


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
   <?php
      if($_SESSION['type'] == 'e') {
         die('No Access');
      }
                     
      $type = $_SESSION['type'];
      error_log($_SESSION['type']); 
      $B_id = $_SESSION['B_id'];
      error_log($_SESSION['B_id']); 
      $E_id = $_SESSION['E_id'];
      error_log($_SESSION['E_id']);
    ?>
   <div class="row-fluid">
      <div class="welcomeholder" id="onboard">
         <h3 class="welcome">Hello <span id="welcome_name"><?php echo $_SESSION['employee_name']; ?></span>!</h3>
      </div>
   </div>
   <div class="row-fluid">
      <div class="span5 offset4">
         <p class="steps">Step 1: Add Branches<span id="addbranch"></span></p>
      </div>
   </div>
   <div class="span5 addbranch">
      <form class="form-horizontal formcenter" action="branch.php" method="post">
         <div class="control-group">
            <label class="control-label" for="inputBranch">Branch location:</label>
            <div class="controls">
               <input type="text" class="forminputs" id="branchLocation" name="branchLocation" placeholder="Location">
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="branchName">Branch name:</label>
            <div class="controls">
               <input type="text" class="forminputs" id="branchName" name="branchName" placeholder="Nickname or ID #">
            </div>
         </div>
         <div class="control-group">
            <label class="control-label" for="listJobs">List customer facing: job positions</br> (separate with comma)</label>
            <div class="controls">
               <input type="text" class="forminputs" id="positionList" name="positionList" placeholder="Ex trainer,front desk,manager">
            </div>
         </div>
         <div class="form-action">
            <button type="button" class="btn btn-primary addbutton" onclick="populateBranch()">Add</button>
         </div>
      </form>
   </div>
   <div class="row-fluid">
      <div class="span3 offset6">
         <a href="./addmanager.php"><button type="button" class="btn btn-primary nextbutton">Next</button></a>
      </div>
   </div>
</div>   
</body>
</html>
   
      





</body>
</html>