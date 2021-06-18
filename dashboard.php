<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("college.php");
// PHP code to establish connection
// with the localserver
// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'staff';

// Server is localhost with
// port number 3308
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM college";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Donor's Detail</title>
        <link rel="stylesheet" type="text/css" href="css.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
            * {
  box-sizing: border-box;
}

body {
  font-family: "Lato", sans-serif;
  color: #202020;
}

table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
  overflow: hidden;
}
table td, table th {
  border-top: 1px solid #ECF0F1;
  padding: 10px;
}
table td {
  border-left: 1px solid #ECF0F1;
  border-right: 1px solid #ECF0F1;
}
table th {
  background-color: #4ECDC4;
}
table tr:nth-of-type(even) td {
  background-color: #d9f4f2;
}
table .total th {
  background-color: white;
}
table .total td {
  text-align: right;
  font-weight: 700;
}

.mobile-header {
  display: none;
}

@media only screen and (max-width: 760px) {
  p {
    display: block;
    font-weight: bold;
  }

  table tr td:not(:first-child), table tr th:not(:first-child), table tr td:not(.total-val) {
    display: none;
  }
  table tr:nth-of-type(even) td:first-child {
    background-color: #d9f4f2;
  }
  table tr:nth-of-type(odd) td:first-child {
    background-color: white;
  }
  table tr:nth-of-type(even) td:not(:first-child) {
    background-color: white;
  }
  table tr th:first-child {
    width: 100%;
    display: block;
  }
  table tr th:not(:first-child) {
    width: 40%;
    transition: transform 0.4s ease-out;
    transform: translateY(-9999px);
    position: relative;
    z-index: -1;
  }
  table tr td:not(:first-child) {
    transition: transform 0.4s ease-out;
    transform: translateY(-9999px);
    width: 60%;
    position: relative;
    z-index: -1;
  }
  table tr td:first-child {
    display: block;
    cursor: pointer;
  }
  table tr.total th {
    width: 25%;
    display: inline-block;
  }
  table tr td.total-val {
    display: inline-block;
    transform: translateY(0);
    width: 75%;
  }
}
@media only screen and (max-width: 300px) {
  table tr th:not(:first-child) {
    width: 50%;
    font-size: 14px;
  }
  table tr td:not(:first-child) {
    width: 50%;
    font-size: 14px;
  }
}
            h1 {
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}


/* demo styles */
body {
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: "Roboto", sans-serif;
}
section {
  margin: 50px;
}

/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #f50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}

/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
::-webkit-scrollbar-thumb {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
		
* {
  font-family: 'Roboto', sans-serif;
}
body {
  background-color: white;
  overflow: auto;
  margin:0; 
  box-sizing: border-box;
  color: black;
}
.n{
    color: white;
}
main { width: 100%; }

#table {
  margin: auto;
  position: relative;
}
	</style>
        
</head>

<body>
    <div class="page-wrapper">
 <div class="nav-wrapper">
  <div class="grad-bar"></div>
  <nav class="navbar">
      <img id="logo" src="data:image/jpeg;base64,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" alt="Company Logo">
    <div class="menu-toggle" id="mobile-menu">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </div>
    <ul class="nav no-search">
        <li class="nav-item" style="float: right;"><a href="logout.php">LOGOUT <i class="fa fa-sign-out"></i></a></li>
    </ul>
  </nav>
 </div>
        </div>
    <p style="font-size:30px; color: white; margin-left: 18px; float: left;">Welcome, <?php echo $_SESSION['username']; ?>!</p><br><br><br><br>
     <div class="form">
        
         <h1 style="margin-right:150px;">DONATION'S</h1>
		<!-- TABLE CONSTRUCTION-->
		<table id="table" cellpadding="0" cellspacing="0" border="0">
                    <div class="tbl-header">
                        <thead>
                            <tr>
                                <th>ID</th>
				<th>NAME</th>
				<th>ADDRESS</th>
				<th>MOBILE.NO</th>
				<th>ITEMS</th>
                                <th>QUANTITY</th>
                                <th>DATE</th>
                                <th>COMPLETED</th>
                        </tr>
                    </thead>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
                                <td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['first_name'];?></td>
				<td><?php echo $rows['address'];?></td>
				<td><?php echo $rows['phone'];?></td>
				<td><?php echo $rows['td'];?></td>
                                <td><?php echo $rows['quantity'];?></td>
                                <td><?php echo $rows['create_datetime'];?></td>
                                <td><a style="text-decoration:none;" href="delete.php?id=<?php echo $rows['id']; ?>">Delete</a></td>
			</tr>
			<?php
				}
			?>
    	</table>
                <hr class="n">
                <script>
            $(window).on('resize', function() {
    
        if ($(this).width() < 760) {
           $('tr td:first-child').click(function(){

              $(this).siblings().css({'display': 'inline-block'});

              var $this = $(this);
              setTimeout(function(){
              $this.siblings().css('transform', 'translateY(0)'); 
             },0);

              $('tr td:first-child').not($(this)).siblings().css({'display': 'none', 'transform': 'translateY(-9999px)'});
          });  
        } else if ($(this).width() > 760) {
            //unbind click : name is not clickable when screen is > 700px
            $( "tr td:first-child").unbind( "click" );
            //remove with jquery added styles
            $('tr td:first-child').siblings().css({'display': '', 'transform': ''});
        }
    
}).resize();</script>
    </div>
   
</body>
</html>
  