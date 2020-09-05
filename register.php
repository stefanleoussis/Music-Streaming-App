<!-- FLOW: User fills out form. The php if statement is triggered when submit button is pressed,
inputs are then sanitized to have valid data we can store in a database 
Handle Form Submission -> Clean Data 
-->

<?php

function sanitizeFormPassword($inputText) { // Function will allow us to have a specific sanitizer for Username inputs

  $inputText = strip_tags($inputText); // If the User inputs html tags along with their username we can strip that away. str_tags & replace are used for sanitizing
  return $inputText;
}

function sanitizeFormUsername($inputText) { // Function will allow us to have a specific sanitizer for Username inputs

  $inputText = strip_tags($inputText); // If the User inputs html tags along with their username we can strip that away. str_tags & replace are used for sanitizing
  $inputText = str_replace(" ", "", $inputText); // Replaces the first parameter with the second (Empty spaces will be replaced with an empty String(Technically discarded))
  return $inputText;
}

function sanitizeFormString($inputText) { // Function will allow us to have a general sanitizer for user inputs

  $inputText = strip_tags($inputText); // If the User inputs html tags along with their username we can strip that away  str_tags & replace are known as sanitizing
  $inputText = str_replace(" ", "", $inputText); // Replaces the first parameter with the second (Empty spaces will be replaced with an empty String(Technically discarded))
  $inputText = ucfirst(strtolower($inputText)); // This will lowercase the entire string then uppercase the first letter
  return $inputText;
}



if (isset($_POST['loginButton'])) {  // detects when the login button is pressed
 
}

if (isset($_POST['registerButton'])) {  // detects when the register button is pressed
  
  // $ == variable 
  // Call Username Sanitize Function
    $username = sanitizeFormUsername($_POST['username']); 

  // Call String Sanitize Function
    $firstName = sanitizeFormString($_POST['firstName']); 
    $lastName = sanitizeFormString($_POST['lastName']); 
    $email = sanitizeFormString($_POST['email']); 
    $email2 = sanitizeFormString($_POST['email2']); 

  // Call Password Sanitize Function
    $password = sanitizeFormPassword($_POST['password']); 
    $password2 = sanitizeFormPassword($_POST['password2']); 
  }
?> <!-- Memory Note: php tags don't have to be at the top. You could put them anywhere -->




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