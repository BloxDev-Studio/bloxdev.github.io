<!doctype html>
<html>
<head>
	<title>Verify - BloxDev</title>
	<link rel="shortcut icon" href="favicon.ico">
	<script src="scripts/main_js.js"></script>
	<script src="scripts/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
</head>
<body bgcolor="#222222">
	<?php require_once('users/init.php'); ?>
	<?php require_once('includes/header.php'); ?>
	<?php require_once('includes/nav.php'); ?>

	<?php
	require_once 'users/helpers/helpers.php';
	if (!securePage($_SERVER['PHP_SELF'])){die();}
	$db = DB::getInstance();
	if (!$user->isLoggedIn()){header('Location: http://bloxdev.com');}
		$veriname = "";
		$code = ";";

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  $veriname = test_input($_POST["name"]);
		}

		function generateRandomString($length = 10) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
		}

		if ($veriname!=""){
			$verinamecheck = $db::getInstance()->get('users',array('username','=',"$veriname"));
			if (strlen($veriname)>2 && strlen($veriname)<21 && !$verinamecheck->count()){
				$code=generateRandomString();
				$fields=array('veriname'=>$veriname,'rbxvericode'=>$code);
				$db->update('users',$user->data()->id,$fields);
			}else{
				$veriname = "";
				$code = "";
			}
		}
	?>

	<section>
		<center>
			<div style="background-color: white; position: relative; width: 75%; height: 500px; top: 100px">
				<?php if ($veriname == ""){ ?>
					<h1 class="verd" style="text-decoration: underline">Connect a ROBLOX account</h1>
					<h2 class="verd">Enter your ROBLOX username and join the verification game to confirm</h2>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="text" name="name" placeholder="ROBLOX username"><br>
						<input type="submit" name="submit">
					</form>
				<?php }elseif($code!=NULL){ ?>
					<h1 class="verd" style="text-decoration: underline">Join the verify game</h1>
					<h2 class="verd">Enter the code below in the game</h2>
					<a href="https://www.roblox.com/games/854868051/Verify" target="_blank" class="verd" style="color: #2980b9">Verify game</a>
					<p id="thecode"><?php echo $code; ?></p>
				<?php } ?>
			</div>
		</center>
	</section>

	<?php require_once('includes/footer.php'); ?>
</body>
</html>
