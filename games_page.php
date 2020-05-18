<!doctype html>
<html>
<head>
	<title>Games - BloxDev</title>
	<link rel="shortcut icon" href="favicon.ico">
	<script src="scripts/main_js.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
</head>
<body bgcolor="#222222">
	<?php require_once('users/init.php'); ?>
	<?php require_once('includes/header.php'); ?>
	<?php require_once('includes/nav.php'); ?>
	<section>
		<div id="slideShow">
			<div id="leftButton" class="roundButton" onclick="leftGo()"><div class="innerRB">&lt;</div></div>
			<div id="rightButton" class="roundButton" onclick="rightGo()"><div class="innerRB">&gt;</div></div>
			<img src="test_spng.jpg" id="gamePrev">
		</div>
	</section>
	<?php require_once('includes/footer.php'); ?>
</body>
</html>
