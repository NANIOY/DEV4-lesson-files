<?php
    interface iBooking {
        public function book();
        public function cancel();
        public static function getAll();
    }   