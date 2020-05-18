<!doctype html>
<html>
<head>
	<title>Signup - BloxDev</title>
	<link rel="shortcut icon" href="favicon.ico">
	<script src="scripts/main_js.js"></script>
	<script src="scripts/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body bgcolor="#222222">

<!-- start -->
<?php
require_once 'users/init.php';
if (!securePage($_SERVER['PHP_SELF'])){die();}

if($user->isLoggedIn()){
	header('Location: /index.php');
}

	// define variables and set to empty values
	$email = "";
	$password = "";
	$password_confirm = "";

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $email = test_input($_POST["email"]);
		$password = test_input($_POST["password"]);
		$password_confirm = test_input($_POST["password_confirm"]);
	}

	if ($email!="" && $password!="" && $password_confirm!="") {
		$db = DB::getInstance();
		$settingsQ = $db->query("SELECT * FROM settings");
		$settings = $settingsQ->first();

		$goodEmail=FALSE;
		$passconfirm=FALSE;
		$notbot=FALSE;

		$vericode = rand(100000,999999);

		// //recaptcha
		$response = $_POST["g-recaptcha-response"];
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => '6LdEMyMUAAAAAKeHekw4PmD0oJfziEP7LSFxWL8J',
			'response' => $_POST["g-recaptcha-response"]
		);
		$options = array(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify);
		if ($captcha_success->success==false) {
			$notbot=FALSE;
		} else if ($captcha_success->success==true) {
			$notbot=TRUE;
		}

		// Validate email + see if its in use
		$checkemail = $db::getInstance()->get('users',array('email','=',"$email"));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false && !$checkemail->count()) {
				$goodEmail=TRUE;
		} else {
				$goodEmail=FALSE;
		}

		//if pw and cpw are same
		if ($password==$password_confirm && strlen($password)>5) {
				$passconfirm=TRUE;
		} else {
				$passconfirm=FALSE;
		}

		//final stretch
		if ($passconfirm && $goodEmail && $notbot){

			//add user to the database
			$user = new User();
			$join_date = date("Y-m-d H:i:s");
			try {
				// echo "Trying to create user";
				$user->create(array(
					'email' => $email,
					'password' =>
					password_hash(Input::get('password'), PASSWORD_BCRYPT, array('cost' => 12)),
					'permissions' => 1,
					'account_owner' => 1,
					'stripe_cust_id' => '',
					'join_date' => $join_date,
					'email_verified' => 1,
					'active' => 1,
					'vericode' => $vericode,
				));
			} catch (Exception $e) {
				die($e->getMessage());
			}
			Redirect::to($us_url_root.'results/signupcompleted.php');

		}
	} else {
	   // $ran=FALSE;
	}
?>

<!-- view -->
	<section>
		<div id="signupbox" style="width: 400px; height: 635px; margin: 100px auto 100px auto; min-height: 300px; background: white; border-radius: 2px; padding; 10px;">
			<center>
				<a href="index.php"><img src="bdi.png" alt="bloxdev logo" style="position: relative; width: 65px; top: 10px"></img></a>
				<p style="position: relative; font-size: 200%; top: -30px; font-family: Verdana; text-shadow: 1px 1px 3px black;"><b><span style="color:#FAAF42">B</span><span style="color:#191919">lox</span><span style="color:#FAAF42">D</span><span style="color:#191919">ev</span></b></p>
				<p style="position: relative; font-size: 34px; top: -30px; font-family: Verdana">Sign Up</p>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" accept-charset="utf-8">
					<input type="email" name="email" value="" maxlength="100" style="height: 25px; width: 200px; position: relative; top: -45px" placeholder="Email" autofocus="autofocus" autocomplete="off" required="required">
					<input type="password" name="password" value="" style="height: 25px; width: 200px; margin-top: 9px; position: relative; top: -45px" maxlength="100" placeholder="Password" required="required">
					<input type="password" name="password_confirm" value="" style="height: 25px; width: 200px; margin-top: 9px; position: relative; top: -45px" maxlength="100" placeholder="Confirm" required="required"><br>
					<div style="position: relative; top: -15px" class="g-recaptcha" data-sitekey="6LdEMyMUAAAAAEgnFkIjF2qhEXJFIlqIgS_jFHkc"></div>
					<input	put type="submit" name="susubmit" id="susubmit" value="Sign up" style="position: relative; top: 20px; font-family: Verdana; font-size: 17px;"><br>
					<a href="login.php" class="subuttonsmall" id="subuttonsmallid" style="color: #2980b9">Log In</a>
				</form>
				<p class="verd" style="position: relative; bottom: -60px; font-size: 15px">By signing up, you agree to our Terms of Service and Privacy Policy; TBA</p>
				<p class="verd" style="position: relative; bottom: -50px; font-size: 13px; text-decoration: underline;">DO NOT USE ROBLOX PASSWORD ANYWHERE ON SITE</p>
			</center>
		</div>
	</section>



</body>
</html>
