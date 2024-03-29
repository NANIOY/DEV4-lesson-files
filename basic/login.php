<?php
	function canLogin($pEmail, $pPassword) {
		$conn = new mysqli("localhost", "root", "", "netflix");
		$email = $conn->real_escape_string($pEmail);
		$query = "SELECT password FROM users WHERE email = '$email'";
		$result = $conn->query($query);
		$user = $result->fetch_assoc();
		if (password_verify($pPassword, $user['password'])) {
			return true;
		} else {
			return false;
		}
	}

	if(!empty($_POST)) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		if(canLogin($email, $password)) {
			/*
			$salt = "g4f561dbfg4b89sb9dq1f8ù=$:";
			$cookieValue = $email . "," . md5($email . $salt);
			
			setcookie("loggedIn", $cookieValue, time() + 60 * 60 * 24 * 30, "/"); // cookie for 30 days
			header("Location: index.php"); // redirect to index.php
			*/

			session_start(); // session is on the server, cookie is on the client
			$_SESSION['loggedin'] = true;
			header('Location: index.php');
		}
		else {
			$error = true;
		}
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
				<h2 form__title>Sign In</h2>

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
					<input type="submit" value="Sign in" class="btn btn--primary">	
					<input type="checkbox" id="rememberMe"><label for="rememberMe" class="label__inline">Remember me</label>
				</div>
			</form>
		</div>
	</div>
</body>
</html>