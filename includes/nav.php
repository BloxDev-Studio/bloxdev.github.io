<nav id="notouch">
	<?php
		require_once $abs_us_root.$us_url_root.'users/helpers/helpers.php';
		require_once $abs_us_root.$us_url_root.'users/includes/user_spice_ver.php';
		if (!securePage($_SERVER['PHP_SELF'])){die();}
	?>
	<div id="topbar" class="semiBlack">
		<p id="bloxdevlogoname"><b><span style="color:#FAAF42">B</span><span style="color:#191919">lox</span><span style="color:#FAAF42">D</span><span style="color:#191919">ev</span></b></p>
		<a class="topverd newButton" id="home" href="/index.php" style="color: #191919">Home</a>
		<a class="topverd newButton" id="games" href="/games_page.php" style="color: #191919">Games</a>
		<a class="topverd newButton" id="blog" href="/blog_page.php" style="color: #191919">Blog</a>
		<a href="https://www.roblox.com/My/Groups.aspx?gid=1159104" target="_blank"><img src="/bdi.png" alt="bloxdev logo" id="littlelogo"></img></a>
		<div id="navuser" class="navuserc">
			<?php if($user->isLoggedIn()){?>
				<?php if($user->data()->rbxid != NULL){;?>
					<?php
						$headshot = file_get_contents("https://www.roblox.com/headshot-thumbnail/json?userId=".$user->data()->rbxid."&width=180&height=180");
						$headshot = json_decode($headshot,true);
					?>
					<img id="current-user" src="<?php echo $headshot["Url"]; ?>"></img>
					<a id='username' href='/profile.php' class='verd' style="color: #191919"><?php echo $user->data()->username;?></a>
				<?php }else{?>
					<img id="current-user" src='/images/extras/default-user-image.png'></img>
					<div id="verify-button" onclick="location.href='/verify.php';" style="cursor: pointer;">Verify ROBLOX account</div>
					<script> document.getElementById("navdrop").style.top = "0px" </script>
				<?php } ?>
				<div id="navdrop" class="navdropc" style="top: 0px">
					<div id=navchoose style="cursor: pointer;"><a class="verd" style="position: relative;"><img src='/images/extras/cog.png' style="width: 25px"></img><b>Settings</b></a><p style="position: absolute; right: 25px; top: -10px"><b>|</b></p></div>
					<div id=navchoose onclick="location.href='/users/logout.php';" style="cursor: pointer;"><a class="verd" style="position: relative;"><img src='/images/extras/cog.png' style="width: 25px"></img><b>Logout</b></a><p style="position: absolute; right: 25px; top: -5px"><b>|</b></p></div>
				</div>
			<?php }else{?>
				<a href='/login.php'><div id="login-button" class="verd" style="text-align: center">Log In</div></a>
				<a href='/signup.php'><div id="signup-button" class="verd" style="text-align: center; vertical-align: middle;">Signup</div></a>
			<?php } ?>
		</div>
	</div>
</nav>
