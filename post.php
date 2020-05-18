<?php

$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". $6LdEMyMUAAAAAKeHekw4PmD0oJfziEP7LSFxWL8J."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
$googleobj = json_decode($response);
$verified = $googleobj->success;

if ($verified === true){
  //do stuff
}
