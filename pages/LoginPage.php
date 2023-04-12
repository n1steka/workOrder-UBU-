<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form action="../service/adminLogin.php" method="post">
		<h2>Admin Login</h2>
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
		</div>
		<?php if (isset($_GET['error'])); {
		} ?>
		<div class="alert" role="alert">
		</div>
		<button type="submit">Login</button>
	</form>
</body>

</html>










<style>
	form {
		width: 300px;
		margin: 50px auto;
		padding: 20px;
		background-color: #f2f2f2;
		border-radius: 5px;
	}

	h2 {
		text-align: center;
	}

	.form-group {
		margin-bottom: 10px;
	}

	label {
		display: block;
		font-weight: bold;
	}

	input[type="text"],
	input[type="password"],
	select {
		width: 100%;
		padding: 5px;
		border-radius: 3px;
		border: 1px solid #ccc;
	}

	button[type="submit"] {
		display: block;
		margin: 10px auto 0;
		padding: 5px 10px;
		background-color: #4CAF50;
		color: #fff;
		border: none;
		border-radius: 3px;
		cursor: pointer;
	}

	button[type="submit"]:hover {
		background-color: #3e8e41;
	}

	.alert {
		color: red;
	}
</style>