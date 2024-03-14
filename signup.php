<?php
	/*if($conn->connect_error) {
		echo "oops";
	} else {
		echo "connected";
	}*/ // check if connected to database

	if(!empty($_POST)) {
		
		$email = $_POST["email"];
		$options = [
			'cost' => 15,
		];
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT, $options); // PASSWORD_DEFAULT uses bcrypt
		// $salt = "jnlqbjiskllff=51561f8484b7s4gfb7f4b8f7b487qfµf7d8µf^^fùf$";
		// $password = md5($_POST["password"] . $salt);
		
		$conn = new mysqli("localhost", "root", "", "netflix"); // only use root for local testing, not for online
		$query = "INSERT INTO users (email, password) VALUES ('" . $email ."' , '" . $password . "')";
		$result = $conn->query($query);
		session_start();
		$_SESSION['loggedin'] = true;
		header("Location: index.php");
	}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMDFlix</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="netflixLogin">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign Up</h2>

				<?php if(isset($error)): ?>
				<div class="form__error">
					<p>
						Sorry, we can't log you in with that email address and password. Can you try again?
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<label for="Email">Email</label>
					<input type="text" name="email">
				</div>
				<div class="form__field">
					<label for="Password">Password</label>
					<input type="password" name="password">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign up" class="btn btn--primary">	
				</div>
			</form>
		</div>
	</div>
</body>
</html>