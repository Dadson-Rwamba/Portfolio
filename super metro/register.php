<html>
<head>
	<link rel="stylesheet" href="index1.css">
	<link rel="shortcut icon" href="Super-Metro-Logo.jpg" type="image/x-icon">
	<title>Register</title>
	<style>
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	margin: 0;
	font-family: Arial, sans-serif;
    height: 100vh;
	display: grid;
	place-items: center;
    width: 100%;
    background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(Super-Metro-Logo.jpg);
    background-size:cover;
    background-position: center;
}

.container {
	max-width: 500px;
	margin: 0 auto;
	padding: 50px;
	background-color: orangered;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(4, 21, 252, 0.3);
}

form {
	display: flex;
	flex-direction: column;
}

.h1 {
	flex: overline 3px;
	color: orangered;
	text-align: justify;
	margin-bottom: 1px;
}

label {
	margin-top: 20px;
	font-weight: bold;
}

input {
	padding: 10px;
	margin-top: 10px;
	border-radius: 40px;
	border: none;
	background-color: #f2f2f2;
}

.button {
	padding: 10px;
	margin-top: 30px 20px;
	border-radius: 15px;
	border: none;
	background-color: white;
	color: black;
	font-weight: bold;
	cursor: pointer;
}

.button:hover {
	background-color: #3e8e41;
	cursor:pointer;
}
	</style>
</head>
<body>
	<div class="container">
		<h2>Register</h2>
		<form method="post" action="register.php">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" name="username" required>
			</div>
            <div class="form-group">
                <label for="phonenumber">Phonenumber:</label>
                <input type="phonenumber" class="form-control" name="phonenumber" required>
            </div>
			<div class="form-group">
				<label for="password">Password:</labe<l>
				<input type="password" class="form-control" name="password" required>
			</div>
			<div class="button">
				<input type="submit" name="submit" value="Register" class="btn btn-primary">
			</div>
		</form>
		<?php
			if (isset($_POST['submit'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];

				// Connect to database
				$db = mysqli_connect('localhost', 'root', '', 'dbmetro');

				// Check if username already exists
				$query = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($db, $query);

				if (mysqli_num_rows($result) > 0) {
					echo "<div class='alert alert-danger' role='alert'>Username already exists. Please choose another one.</div>";
				} else {
					// Insert new user into database
					$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
					mysqli_query($db, $query);
					mysqli_close($db);
					header("Location: login.php");
					exit;
				}
			}
		?>
	</div>
</body>
</html>
