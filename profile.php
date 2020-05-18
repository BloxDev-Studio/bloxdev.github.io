<?php
require_once('users/init.php');
$db = DB::getInstance();
  if($user->isLoggedIn() && $user->data()->rbxid != NULL && !$_GET["id"] /*&& $_GET["id"] != ""*/){
    $u=$user->data();
  }elseif($_GET["id"] && $db->findById($_GET["id"],'users')->first()->rbxid != NULL){
    $u=$db->findById($_GET["id"],'users')->first();
  }elseif(!$user->isLoggedIn() && !$_GET["id"]){
    header('Location: /login.php');
  }
?>
<!doctype html>
<html>
<head>
	<title><?php if($u){echo $u->username." - ";} ?>BloxDev</title>
	<link rel="shortcut icon" href="favicon.ico">
	<script src="scripts/main_js.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main_css.css">
</head>
<body bgcolor="#222222">
	<?php require_once('includes/header.php'); ?>
	<?php require_once('includes/nav.php'); ?>
	<section>
    <?php if($u){ ?>
      <?php
        $headshot = file_get_contents("https://www.roblox.com/headshot-thumbnail/json?userId=".$u->rbxid."&width=180&height=180");
        $headshot = json_decode($headshot,true);
        $r = file_get_contents("https://www.roblox.com/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=".$u->rbxid."&groupid=1159104");
      ?>
      <!-- <p style="position:absolute;left:0px;width:100%;top: 15px;color: white;font-size: 3vw;background-color: gray;">test</p> -->
      <div style="position: absolute;background-color: white;width: 100%;height: 80px;top: 90px; padding: 15px;z-index:-1;"></div>
      <div style="position: absolute;background-color: white;width: 20%;height: 600px;top: 90px; padding: 15px;margin-right: auto">
        <img id="current-user" style="position: relative;left: 0px;width: 40%;height: initial;" src="<?php echo $headshot["Url"]; ?>"></img>
        <div style="right: -10px;top: 0px;width: 60%;position: absolute;">
          <p class="verd" style="position: relative;font-size: 30px;font-weight: 400;margin-bottom:0px;"><?php echo $u->username; ?></p>
          <p class="verd" style="font-size: 1vw;"><span style="color: #FAAF42;">Rank: </span><?php echo $r; ?></p>
        </div>
      </div>
      <!-- <div style="background-color: white;width: 20%;height: 600px;left: 5%;padding: 15px;margin-left: auto;margin-right: auto;margin-top: 125px;">

      </div> -->
    <?php }else{ ?>
      <?php require_once('includes/404.php'); ?>
    <?php } ?>
	</section>
	<?php require_once('includes/footer.php'); ?>
</body>
</html>
