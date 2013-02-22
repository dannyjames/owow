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
                     <a href="./owow-index.html">Owow</a>
                  </li>
                  <li class="">
                     <a href="./dashboard.php">Dashboard</a>
                  </li>
                  <li class="">
                     <a href="./createrules.php">Currency Center</a>
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
      $type = $_SESSION['type'];
      error_log($_SESSION['type']); 
      $B_id = $_SESSION['B_id'];
      error_log($_SESSION['B_id']); 
      $E_id = $_SESSION['E_id'];
      error_log($_SESSION['E_id']);
   ?>
   <div class="row-fluid">
      <div class="welcomeholder" id="onboard">
         <h3 class="welcome">Hello <span><?php echo $_SESSION['employee_name']; ?></span>!</h3>
      </div>
   </div>
   <div class="row-fluid">
      <div class="span5 offset4">
         <p class="steps">Step 2: Understand The Game</p>
      </div>
   </div>
   <div class="row-fluid">
      <div class="span8 offset3" id="pushdown-1">
         <p class="create-rules">1. Employees earn digital currency for completing key tasks all centered around making customers say OWOW.</br></p>
         <p class="create-rules">Create general game rules and corresponding value on dashboard above or <a href="currencycenter.php">here</a></p>
      </div>
      <div class="span8 offset2" id="pushright-1">
         <p class="create-contests">2. Employees can earn larger amounts of digital currency by winning contests.</br></p>
         <p class="create-contests">You can create contests here and corresponding value above or <a href="contests.php">here</a></p>
      </div>
      <div class="span8 offset2" id="pushright-2">
         <p class="rewards-store">3. Create a Rewards center where employee can spend their digital currency.</br></p>
         <p class="rewards-store">Upload Rewards. Decide how much digital currency required for each reward on dashboard above or <a href="rewardscenter.php">here</a></p>
      </div>
   </div>
   <div class="row-fluid">
      <div class="span2 offset3">
         <a href="./currencycenter.php"><button class="btn btn-primary" id="rules-understand">Done</button></a>
      </div>
   </div>
</div>   
</body>
</html>