<?php
    class Account {

        private $errorArray;
        // Function is called as soon as Account is created
        public function __construct() {
            $this->errorArray = array();
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) { // We call register from outside the class and this function accessess the private functions

        // Call Validation Functions (Make sure inputs meet requirements)
            $this->validateUsername($un); // kinda like this.name in java
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

        }
        // Validate Functions
        private function validateUsername($un) { // Checking to see if user inputs meet our constraints (ex. username must contain one uppercase letter)
            // "string length"
            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, "Your username must be between 5 and 25 characters");
                return;
            }

            // TODO: check if username exists
        }

        private function validateFirstName($fn) {
            
        }

        private function validateLastName($ln) {
            
        }
        private function validateEmails($em, $em2) {
            
        }
        private function validatePasswords($pw, $pw2) {
            
        }


    }



?>