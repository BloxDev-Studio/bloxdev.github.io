<!doctype html>
<html>
<head>
	<title>BloxBlog - BloxDev</title>
	<link rel="shortcut icon" href="favicon.ico">
	<script src="scripts/main_js.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
</head>
<body onload="readyBlog()" onresize="readyBlog()" bgcolor="#222222">
	<div id="pageSize"></div>
	<?php require_once('users/init.php'); ?>
	<?php require_once('includes/header.php'); ?>
	<?php require_once('includes/nav.php'); ?>

	<div class="article semiBlack" id="welcome.art">
		<a href="blog_page_clone.php"><h2 class="verd artTitle">Welcome to BloxDev!</h2></a>
		<img src="test_pic.png" class="squareImg">
		<p class="artPrev verd">Click this one, it is a link to the test blog post. I need to make it as a test layout for all the future ones</p>
	</div>

	<div class="article semiBlack" id="secondTest">
		<a href="blog_page_clone.php"><h2 class="verd artTitle">This is 2nd test</h2></a>
		<img src="test_pic.png" class="squareImg">
		<p class="artPrev verd">yep, this is to test inserting a second page. let's hope it works!</p>
	</div>

	<div class="article semiBlack" id="2.art">
		<h2 class="verd artTitle">Our 2nd Article</h2>
	</div>

	<div class="article semiBlack" id="new_game.art">
		<h2 class="verd artTitle">Our New Game</h2>
	</div>

	<div class="article semiBlack" id="byMr.art">
		<h2 class="verd artTitle">A Project by Mr1Vgy</h2>
	</div>

	<div class="article semiBlack" id="aidan.art">
		<h2 class="verd artTitle">A Project by Mr1Vgy</h2>
	</div>

	<div class="article semiBlack" id="dan.art">
		<h2 class="verd artTitle">A Project by Mr1Vgy</h2>
	</div>

	<div class="article semiBlack" id="third.art">
		<h2 class="verd artTitle">A Project by Mr1Vgy</h2>
	</div>
	<?php require_once('includes/footer.php'); ?>
</body>
</html>
