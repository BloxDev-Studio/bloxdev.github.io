<!doctype html>
<html>
<head>
	<title>Login - BloxDev</title>
	<link rel="shortcut icon" href="favicon.ico">
	<script src="scripts/main_js.js"></script>
	<script src="scripts/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
</head>
<body bgcolor="#222222">

<?php
require_once 'users/init.php';
if (!securePage($_SERVER['PHP_SELF'])){die();}

if($user->isLoggedIn()){
	header('Location: /index.php');
}
$dest=$_GET["dest"];
if ($dest != NULL && $dest != ""){
	$desturl="?dest=".$dest;
}
	$loginwith = "";
	$password = "";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $loginwith = test_input($_POST["loginwith"]);
		$password = test_input($_POST["password"]);
	}

	if ($loginwith!="" && $password!="") {
		//Log user in
		$remember = (Input::get('login-remember') === 'on') ? true : false;
		$user = new User();
		$login = $user->loginEmail($loginwith, $password, $remember);
		if ($login) {
			if($dest != NULL && $dest != ""){
				header('Location: /'.$dest);
			}else{
				header('Location: /profile.php');
			}

				// -danz they did this by making a get with the ?dest at end of url but im lazy :P
				// # if user was attempting to get to a page before login, go there
				// $dest = sanitizedDest('dest');
				// if (!empty($dest)) {
				// 	header("Location: $dest");
				// 		// Redirect::to($dest);
				// } elseif (file_exists($abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php')) {
				//
				// 		# if site has custom login script, use it
				// 		# Note that the custom_login_script.php normally contains a Redirect::to() call
				// 		require_once $abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php';
				// } else {
				// 		if (($dest = Config::get('homepage')) ||
				// 						($dest = '/profile.php')) {
				// 				#echo "DEBUG: dest=$dest<br />\n";
				// 				#die;
				// 				header("Location: $dest");
				// 				// Redirect::to($dest);
				// 		}
				// }
		} else {
				$error_message .= 'Log in failed. Please check your username and password and try again.';
		}
	} else {
	    // $ran=FALSE;
	}
?>

	<section>
		<div id="loginbox" style="width: 400px; height: 343px; margin: 100px auto 100px auto; min-height: 300px; background: white; border-radius: 2px; padding; 10px;">
			<center>
				<a href="index.php"><img src="bdi.png" alt="bloxdev logo" style="position: relative; width: 65px; top: 10px"></img></a>
				<p style="position: relative; font-size: 200%; top: -30px; font-family: Verdana; text-shadow: 1px 1px 3px black;"><b><span style="color:#FAAF42">B</span><span style="color:#191919">lox</span><span style="color:#FAAF42">D</span><span style="color:#191919">ev</span></b></p>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].$desturl);?>" method="post" accept-charset="utf-8">
						<input type="text" name="loginwith" value="" style="height: 25px; width: 200px; position: relative; top: -15px" placeholder="Email or ROBLOX Username" autofocus="autofocus" autocomplete="off" required="required">
						<input type="password" name="password" value="" style="height: 25px; width: 200px; margin-top: 5px; position: relative; top: -15px" maxlength="100" placeholder="BloxDev Password" required="required"><br>
						<input	put type="submit" name="submit" id="submit" value="Log in" style="position: relative; top: -15px; font-family: Verdana; font-size: 17px"><br>
						<input type="checkbox" name="login-remember" style="width: 10px; margin-top: 10px; position: relative; top: -10px"><label for="login-remember" style="position: relative; top: -10px">Keep me logged in</label><br>
						<a href="forgot_password" class="buttonsmall" id="buttonsmallid" style="color: #2980b9">Forgot Password</a><span class="text-spacer"></span><a href="signup.php" class="buttonsmall" id="buttonsmallid" style="color: #2980b9">Sign up</a>
					</form>
			</center>
		</div>
	</section>
</body>
</html>
