<?php
    include_once(__DIR__ . '/Vehicle.php');
    class Car extends Vehicle {
        private int $passengers;

        /**
         * Get the value of passengers
         */
        public function getPassengers(): int
        {
                return $this->passengers;
        }

        /**
         * Set the value of passengers
         */
        public function setPassengers(int $passengers): self
        {
            if($passengers < 1) {
                throw new Exception('A car must have at least 1 passenger');
            }
            $this->passengers = $passengers;

            return $this;
        }

        public function book () {
            $result = parent::book();
            $result .= " Passengers:" . $this->passengers;
            return $result;
        }
    }