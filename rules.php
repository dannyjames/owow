<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>OOwow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The ultimate work game">
    <meta name="keywords" content="employee, work, game, fun, ultimate,">


    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="css/employeeleaderboard.css" rel="stylesheet">
    <link href="css/rules.css" rel="stylesheet">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script> 
    
    <script src="assets/js/jquery.js"></script>


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  </head>

<body class="optimize" data-spy="scroll" data-target=".bs-docs-sidebar">


    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="topappbar">
          <div>
            <ul class="nav">
              <li class="">
                <a href="./creditcard.php">Credit</a>
              </li>
              <li class="">  
                <a href="./feedback.php">Currency</a>
              </li>
              <li class="">
                <a href="./rules.php">Rewards</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
   
   <div class="app-container">
      <div class="row-fluid">
         <div class="span12" id="title">
            <p class="currency_rules">Rewards Store</p>
         </div>
      </div>
      <div class="row-fluid">
         <div class="center">
            <?php
                $con = mysql_connect('localhost:8889', 'root', 'root');
                if(!$con){
                   die('Could not connect: ' . mysql_error($con));
                }

                mysql_select_db('analytics', $con);
                if(!$con){
                   die('Could not connect: ' . mysql_error($con));
                }
                $select = "SELECT imagepath, item, value FROM Rewards";
                $result = mysql_query($select, $con);
                
                if(!$result){
                   die('Error: ' . mysql_errno($con) . ':' . mysql_error($con));
                }
                
                while ($row = mysql_fetch_assoc($result)) {
                   echo "<div class ='img-reward'>";
                   echo "<img src = " . substr($row['imagepath'], 9) . ">";
                   echo "<span class='wow-description'> <span class="wows">W</span> " . $row['item'] . '=' . $row['value'] . "</span>";
                   echo "</div>";
               }
            ?>
            </div>
         </div>
      </div>
   </div>

</body>
</html>