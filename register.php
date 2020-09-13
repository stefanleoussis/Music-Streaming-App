<!-- IMPORTANT Note: 
if a function in a php class is static: you use :: to call it Ex.Constants::$firstNameCharacters and does not need to be to initalized

if a function is just public then you would use Variable->function(); Ex.$account->getError(); This needs to be initalized in order to use the function like $account = new Account();
-->

<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($con); // $con is to connecto to the databse. We use the $con from the config.php file and insert it in the Account.php file


  include("includes/handlers/register-handler.php"); // This is a link to the register-hanlder file that sanitizes our form Submission (think to thymeleaf fragments
  // this is basically inserting the code from the register handler file), The path starts from where the register.php file is located
  include("includes/handlers/login-handler.php");

  // Function is used to check if a input in a form has been submitted before and if so it will fill that input text box with the previous submission's answer
  function getInputValue($name) { // Parameter $name == input name
      if(isset($_POST[$name])) {
          echo $_POST[$name];
      }
  }
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
             <?php echo $account->getError(Constants::$usernameCharacters); ?> <!-- Calling the getError Function in Account.php (files are linked through the includes(...); -->
             <label for="username">Username</label>  <!-- The for shoud equal the input id. This is so we can simply click the label and its field box will light up -->
            <input id="username" name="username" type="text" placeholder="e.g. Bart Simpson" value="<?php getInputValue('username') ?>" required> <!-- call getInputValue function to see if we can fill this textbox with a previous submission -->
           </p> 

           <p>
             <?php echo $account->getError(Constants::$firstNameCharacters); ?> <!-- Constants::$firstNameCharacters calls the value from the variable $firstNameCharacters in the Constants class. -->
             <label for="firstName">First Name</label>  
            <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName') ?>" required>
           </p>  

           <p>
             <?php echo $account->getError(Constants::$lastNameCharacters); ?>
             <label for="lastName">Last Name</label>  
            <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('lastName') ?>" required>
           </p> 

           <p>
             <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
             <?php echo $account->getError(Constants::$emailInvalid); ?>
             <label for="email">Email</label>  
            <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
           </p> 
        
           <p>
            <label for="email2">Confirm Email</label>
           <input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
           </p> 
           
           <p>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
            <?php echo $account->getError(Constants::$passwordCharacters); ?>

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