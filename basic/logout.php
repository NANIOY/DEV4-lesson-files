<?php

// setcookie('loggedIn', '', time() - 3600);

session_start(); // first start the session
session_destroy(); // then destroy it
header('Location: login.php');