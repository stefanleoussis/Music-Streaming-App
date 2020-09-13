<?php
    class Account {

        private $con;
        private $errorArray;

        // Function is called as soon as Account is created
        public function __construct($con) {
            $this->con = $con; // Initializing the connection to sql db variable
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) { // We call register from outside the class and this function accessess the private functions

        // Call Validation Functions (Make sure inputs meet requirements)
            $this->validateUsername($un); // kinda like this.name in java
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if(empty($this->errorArray)) { // Checking if there is anything in the errorArray

                // Insert into db if there is nothing in the errorArray
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw); // if the function was successful the function will return true

            }else {

                return false;

            } // returns a value to the caller

        }


        public function getError($error) { // Checking if an error is in the error array
            if(!in_array($error, $this->errorArray)) { // register.php uses this function by inputting a error message and checking if it matches anything we have pushed in our error array
                $error = ""; 

            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($un, $fn, $ln, $em, $pw) {

            $encryptedPw = md5($pw); // Encrypts the password into a 32 character long hash code
            $profilePic = "assets/images/profile-pics/head_emerald.png";
            $date = date("Y-m-d");

            echo "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')";
            $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')"); // If this query is successful it will return true if not it will return false
            
            return $result;
            

        }

        // Validate Functions
        private function validateUsername($un) { // Checking to see if user inputs meet our constraints (ex. username must contain one uppercase letter)
            // "string length"
            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            // TODO: check if username exists
        }

        private function validateFirstName($fn) {
            
            if(strlen($fn) > 25 || strlen($fn) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }

        private function validateLastName($ln) {
            
            if(strlen($ln) > 25 || strlen($ln) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }
        private function validateEmails($em, $em2) {
            
            if($em != $em2) {

                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) { // Makes sure the Email contains a .com or .ca 

                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }


            // TODO: Check that username hasn't already been used
        }
        private function validatePasswords($pw, $pw2) {
            
            if($pw != $pw2) {

                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return; // return will stop the function

            }

            if(preg_match('/[^A-Za-z0-9]/', $pw)) { // Passwords will not contain special characters

                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;

            }

            if(strlen($pw) > 30 || strlen($pw) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }

        }

    }



?>
