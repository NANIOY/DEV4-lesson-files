<?php 
    include_once(__DIR__ . DIRECTORY_SEPARATOR . "../interfaces/iBooking.php");
    abstract class Vehicle {
        protected string $brand;

        /**
         * Get the value of brand
         */
        public function getBrand(): string
        {
                return $this->brand;
        }

        /**
         * Set the value of brand
         */
        public function setBrand(string $brand): self
        {
                $this->brand = $brand;

                return $this;
        }

        public function book () {
            echo 'Booking:' . $this->brand . '<br>';
        }

        public function __toString() {
            return 'Brand:' . $this->brand;
        }

        public function cancel () {
            // SQL query to cancel the booking
        }

        public static function getAll() {
            // SQL query to get all vehicles
        }
    }