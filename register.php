<?php

  include("includes/classes/Account.php");
  $account = new Account();


  include("includes/handlers/register-handler.php"); // This is a link to the register-hanlder file that sanitizes our form Submission (think to thymeleaf fragments
  // this is basically inserting the code from the register handler file), The path starts from where the register.php file is located
  include("includes/handlers/login-handler.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Slotify</title>
</head>
<body>

    <div id="inputContainer">

        <!-- Login Form -->
        <form id="loginForm" action="register.php" method="POST" >
            <h2>Login to your account</h2>
            <p>
             <label for="loginUsername">Username</label>  <!-- The for shoud equal the input id. This is so we can simply click the label and its field box will light up -->
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Bart Simpson" required> <!-- name attribute is used to retrieve the input values later -->

            
           </p> <!-- Used to make the inputs appear on seperate lines -->
           
           <p>
            <label for="loginPassword">Password</label>
           <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password"required>

        
           </p> 
        <button type="submit" name="loginButton">LOG IN</button>
       
        </form>

        <!-- Register Form -->
        <form id="registerForm" action="register.php" method="POST" >

            <h2>Create your free account</h2>

            <p>
             <label for="username">Username</label>  <!-- The for shoud equal the input id. This is so we can simply click the label and its field box will light up -->
            <input id="username" name="username" type="text" placeholder="e.g. Bart Simpson" required>
           </p> 

           <p>
             <label for="firstName">First Name</label>  
            <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" required>
           </p>  

           <p>
             <label for="lastName">Last Name</label>  
            <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" required>
           </p> 

           <p>
             <label for="email">Email</label>  
            <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" required>
           </p> 
        
           <p>
            <label for="email2">Confirm Email</label>
           <input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" required>
           </p> 
           
           <p>
            <label for="password">Password</label>
           <input id="password" name="password" type="password" placeholder="Your Password" required>
           </p> 

           <p>
            <label for="password2">Confirm Password</label>
           <input id="password2" name="password2" type="password" placeholder="Your Password" required>
           </p> 

        <button type="submit" name="registerButton">SIGN UP</button>
       
        </form>
    </div>


</body>
</html>