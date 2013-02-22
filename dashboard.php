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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="css/managerial.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One|Russo+One|Monofett|Monoton|Chewy|Courgette|Gruppo|Oswald' rel='stylesheet' type='text/css'>
    <link href="css/currencycenter.css" rel="stylesheet">


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
                              if($_SESSION['type'] == 'vp' || ($_SESSION['type'] == 'm' && $_SESSION['B_id'] == $row['B_id'] )) {
                                 echo "<div class='dropdown'>";
                                 echo "<li class='analytics_list'>"; 
                                 echo "<a class='dropdown-toggle' data-toggle='dropdown' href='$row[B_id]'>" . $row['location'] . "</a>";
                                 echo "<ul class='hide unstyled'>";
       
                                 $select2 = "SELECT employee_name, type, E_id FROM employee_details WHERE employee_details.B_id = " . $row['B_id'];
                                 $result2 = mysql_query($select2, $con);
                                 
                                 if(!$result2){ 
                                    error_log(mysql_error($con));
                                    die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                                 }
                                 
                                 while($inner_row = mysql_fetch_assoc($result2)) {
                                    if(strcasecmp($inner_row['type'],'e') == 0) {
                                       error_log($inner_row['employee_name']);
                                        echo "<li class='employeename' id=$inner_row[E_id]>" . $inner_row['employee_name'] . "</li>";
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
               <div class="welcomeholder">
                  <h3 class="welcome">Hello <span id="welcome_name"><?php echo $_SESSION['employee_name']; ?></span>!</h3>
               </div>
               <div class="graph_left">
                  <div class="title_box"> 
                     <a href="" class="graph_title" id="number_interactions">
                        Number of Interactions
                     </a>
                  </div>
                  <div class="graph_legend">
                     <span class="badge badge-success"></span><p class="legend">Interactions</p>
                  </div>
                  <div class="chartholder" id="interactions_count">
                     <p>Placeholder</p>
                  </div>
               </div>
               <div class="graph_right">
                  <div class="title_box">
                     <a href="" class="graph_title" id="length_interactions">
                        Length of Interactions
                     </a>
                  </div>
                  <div class="graph_legend">
                     <span class="badge badge-info"></span><p class="legend">Interaction Length</p>
                  </div>
                  <div class="chartholder" id="length_of_interactions">
                     <p>Placeholder</p>
                  </div>
               </div>
               <div class="graph_left pie">
                  <div class="title_box"> 
                     <a href="" class="graph_title" id="number_interactions">
                        Interactions by Employee
                     </a>
                  </div>
                  <div class="graph_legend">
                     <p class="legend">Employee Breakdown</p>
                  </div>
                  <div class="chartholder" id="interactions_employee">
                     <p>Pie chart</p>
                  </div>
               </div>
               <div class="graph_right pie">
                  <div class="title_box">
                     <a href="" class="graph_title" id="length_interactions">
                        Contest Winners
                     </a>
                  </div>
                  <div class="graph_legend">
                     <p class="legend">Percentage of Contests Won Breakdown</p>
                  </div>
                  <div class="chartholder" id="contests_won">
                     <p>Pie Chart</p>
                  </div>
               </div>
               <div class="graph_left">
                  <div class="title_box"> 
                     <a href="" class="graph_title" id="number_interactions">
                        Trending
                     </a>
                  </div>
                  <div class="graph_legend">
                     <span class="badge badge-important"></span><p class="legend">Number of Interactions<span class="badge badge-inverse"></span><span id="interaction_length">Length of Interactions</span></p>
                  </div>
                  <div class="chartholder" id="trending">
                     <p>Placeholder</p>
                  </div>
               </div>
               <!--<div class="graph_right">
                  <div class="title_box">
                     <a href="" class="graph_title" id="length_interactions">
                        Efficiency Ratio
                     </a>
                  </div>
                  <div class="graph_legend">
                     <p class="legend">Not sure how we come up with this</p>
                  </div>
                  <div class="chartholder" id="eff_ratio">
                     <p>Placeholder</p>
                  </div>
               </div>-->
         </div>
      </div>
   </div>      
          



    

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>

    <script src="http://www.google.com/jsapi"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>
