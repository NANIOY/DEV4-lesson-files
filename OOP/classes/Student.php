<?php 
    class Student {
        private string $firstname; // private makes it only accessible within the class
        private string $lastname;
    
        public function setFirstname($pFirstname) { // public makes it accessible from outside the class
            if (!empty($pFirstname)) {
                $this ->firstname = $pFirstname;
            } else {
                throw new Exception("Firstname can't be empty"); // not echo because we want to catch the exception in index.php
            }     
        }

        public function getFirstname() {
            return $this ->firstname;
        }

        public function setLastname($pLastname) {
            if (!empty($pLastname)) {
                $this ->lastname = $pLastname;
            } else {
                throw new Exception("Lastname can't be empty");
            }
        }

        public function getLastname() {
            return $this ->lastname;
        }

        public function save () {
            // PDO connection
            $conn = new PDO('mysql:host=localhost;dbname=studentcards', 'root', '');

            // prepare query (INSERT) / bind
            $statement = $conn->prepare("INSERT INTO users (firstname, lastname) VALUES (:firstname, :lastname)"); // :firstname and :lastname are placeholders to prevent SQL injection
            $statement->bindValue(":firstname", $this->firstname);
            $statement->bindValue(":lastname", $this->lastname);

            // execute and return
            return $statement->execute();
        }

        public static function getAll() {
            $conn = new PDO('mysql:host=localhost;dbname=studentcards', 'root', '');
            $statement = $conn->prepare("SELECT * FROM users");
            $statement->execute();
            $arrResult = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $arrResult;
        }
     }