<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="newcss.css" type="text/css">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $uniqueno = stripslashes($_REQUEST['uniqueno']);
        $uniqueno = mysqli_real_escape_string($conn, $uniqueno);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $phone   = stripslashes($_REQUEST['phone']);
        $phone  = mysqli_real_escape_string($conn, $phone);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, email, uniqueno, password, phone, create_datetime)
                     VALUES ('$username', '$email','$uniqueno', '" . md5($password) . "', '$phone', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo header("Location: login.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1><br>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br><br>
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required /><br><br>
        <input type="varchar" class="login-input" name="uniqueno" placeholder="NGO Unique ID" required /><br><br>
        <input type="password" class="login-input" name="password" placeholder="Password" required /><br><br>
        <input type="varchar" class="login-input" name="phone" placeholder="Phone number" required /><br><br>
        <input type="submit" name="submit" value="Register" class="login-button"><br>
        <p class="link"><a href="login.php">Click to Login</a></p><br>
    </form>
<?php
    }
?>
</body>
</html>

