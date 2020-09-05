
<?php
// Sanitize Functions
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

// Validate Functions
function validateUsername($un) { // Checking to see if user inputs meet our constraints (ex. username must contain one uppercase letter)

}

function validateFirstName($fn) {
    
}

function validateLastName($ln) {
    
}
function validateEmails($em, $em2) {
    
}
function validatePasswords($pw, $pw2) {
    
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
  
  // Call Validation Functions (Make sure inputs meet requirements)
    validate($username);
    validate($firstname);
    validate($lastname);
    validate($email, $email2);
    validate($password, $password2);

}
?> <!-- Memory Note: php tags don't have to be at the top. You could put them anywhere -->
