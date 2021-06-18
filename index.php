<!DOCTYPE html>
<html lang="en">

<head>
	<title>Donate</title>
        <link rel="stylesheet" type="text/css" href="maincss.css">
</head>

<body>
		<form action="insert.php" method="post">
		 <div  class="form">
    		<form id="contactform"> 
    			<p class="contact"><label for="name">Name:</label></p> 
    			<input id="name" name="first_name" placeholder="First and last name" required="" tabindex="1" type="text"> 

    			<p class="contact"><label for="email">Email:</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 

                        <p class="contact"><label for="username">Address:</label></p> 
    			<input id="username" name="address" placeholder="address" required=""  type="text">
                        
                        <p class="contact"><label for="phone">Mobile phone:</label></p> 
                        <input id="phone" name="phone" placeholder="phone number" required="" type="text">
                <p class="contact"><label for="repassword">Item:</label></p> 
    			<input type="text" id="password" name="td" required="" type="text" placeholder="eg.Clothes, Books, etc..."> 
                        <p class="contact"><label for="Quantity">Quantity:</label></p> 
    			<input id="name" name="quantity" placeholder="(minimum required 5 items)" required="" tabindex="1" type="text"> 
                        <br>
            <br><input class="buttom" name="Submit" id="submit" tabindex="5" value="DONATE" type="submit"> 	 
   </form> 
</div>	
			</form>
</body>

</html>