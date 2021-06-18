<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "staff");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
                $id= isset($_POST['id']);
		$first_name = $_REQUEST['first_name'];
                $email = $_REQUEST['email'];
                $address = $_REQUEST['address'];
		$phone = $_REQUEST['phone'];
		$td = $_REQUEST['td'];
		$quantity = $_REQUEST['quantity'];
                $create_datetime = date("Y-m-d H:i:s");
		
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO college VALUES ('$id','$first_name','$email',
			'$address','$phone','$td','$quantity','$create_datetime')";
		
		if(mysqli_query($conn, $sql)){
                    echo "<body style='background-color:#fffcfc; line-height: 1.6;'><p style='padding-top:50px; font-size:40px;'>THANK YOU! <span style='color:darkgreen;'> $first_name,</span></p>"
                    . "<div style='margin-left: 300px; margin-right: 300px; font-size: 20px;'<br>"
                            . "Thank you for your most generous donation! We are so fortunate to have<br> caught the attention of people like you with large warm hearts.<br><br>"
                            . "<img src='https://assets.seedprod.com/4812-8IDTHM6XtE3jkJZl.png'><br><br>"
                            . "NGO will contact you soon<br> For further details contact <span style='color:darkgreen;'>sreejasreenidhi88@gmail.com</span><br><a href='index.html' style='color:black;'>Return to home</a></body>";
                    
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>

