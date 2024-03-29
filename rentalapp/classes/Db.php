<?php 
// SINGLETON PATTERN is used to create only one instance of a class and provide so it doesn't create multiple instances of the same class.
    abstract class Db {
        private static $db;

        public static function getInstance() {
            if(self::$db == null) {
                self::$db = new PDO('mysql:host=localhost;dbname=rental', 'root', '');
                echo "🍕";
                return self::$db;
            } else {
                echo "🍔";
                return self::$db;
            }
        }
    }