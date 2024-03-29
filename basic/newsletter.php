<?php 
    $feedback = "The IMD Convoy App is coming to a classroom near you soon.";

    // if submit
    if(!empty($_POST)) {
        // get email
        $email = $_POST['email'];

        // save to files
        $file = fopen('subscribers.txt', 'a+');
        fwrite($file, $email . "\n");
        fclose($file);
        
        // read number of emails + print feedback
        $emails = file('subscribers.txt');
        $feedback = "Woaaah, there are now " . count($emails) . " people waiting for the app!";        
    }
    
?><!DOCTYPE html>
<html>
<head>
    <title>Launching soon!</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <style>

        body{padding: 0;margin: 0;}
        h1{	font-family: 'Roboto Condensed', 'Helvetica Neue', 'Helvetica', sans-serif;font-size: 42px;margin-top: 0; line-height: 1.1em;}
        p{ font-family: Georgia, "Times New roman", serif; color:#999999; font-size: 17px; font-style: italic; }
        #container{	background-color: #f1f1f1;padding: 60px 25%;}
        input[type=text]{ color: #999999; padding: 10px; width: 200px; }
        input[type=submit]{ background-color: #e92619; color: #fff; border: none; font-size: 18px;padding: 8px 10px; position: relative; top: 2px; }
        form{margin-top: 40px;}

    </style>
</head>

<body>
<div id="container">
    <h1><?php echo $feedback; ?></h1>
    <p>Sign up here to be one of the first to know when the app arrives.</p>
    <div class="feedback"><!-- here comes feedback --></div>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Enter your email to get notified">
        <input type="submit" value="Send" />
    </form>

</div>
</body>
</html>