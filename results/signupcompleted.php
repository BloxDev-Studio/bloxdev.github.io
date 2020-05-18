<!doctype html>
<html>
<head>
	<title>Signup Completed - BloxDev</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<script src="/scripts/main_js.js"></script>
	<script src="/scripts/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/main_css.css">
</head>
<body bgcolor="#222222">
	<?php require_once('../users/init.php'); ?>
	<?php
		if($user->isLoggedIn()){
			header('Location: /index.php');
		}
	?>
	<?php require_once('../includes/header.php'); ?>
	<?php require_once('../includes/nav.php'); ?>
	<section>
		<center>
			<div style="background-color: white; position: relative; width: 75%; height: 500px; top: 100px">
				<h1 class="verd" style="text-decoration: underline">Signup Completed!</h1>
				<h2 class="verd">Your account has been created, login and finish your account <br>by connecting your ROBLOX account</h2>
				<a href="../login.php" style="position: relative; top: 20px; font-family: Verdana; font-size: 35px; width: 300px; margin-top: 10px; height: 30px; background-color: #FAAF42; border-radius: 3px; border: none; padding: 10px">Login</a>
			</div>
		</center>
	</section>
	<?php require_once('../includes/footer.php'); ?>
</body>
</html>
