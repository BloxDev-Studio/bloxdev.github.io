<?php
require_once '../users/init.php';
$db = DB::getInstance();
?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $postdata = file_get_contents('php://input');
  $postdata = json_decode($postdata);
  if ($postdata[0]=="connect"){
    $selected = $db->query("SELECT * FROM users WHERE veriname = ? AND rbxvericode = ?",[$postdata[2],$postdata[1]]);
    if ($selected->count()){
      $u = $selected->first();
      $fields=array('username'=>$postdata[2], 'rbxid'=>$postdata[3], 'veriname'=>NULL, 'rbxvericode'=>NULL);
      $db->update('users',$u->id,$fields);
      $copies = $db->get('users',['veriname','=',$postdata[2]]);
      if ($copies->count()){
        for ($x = 1; $x <= $copies->count(); $x++){
          $fields=array('veriname'=>NULL, 'rbxvericode'=>NULL);
          $db->update('users',$copies->results()[$x-1]->id,$fields);
        }
      } ?>
      ["good"]
    <?php }else{ ?>
      ["false"]
  <?php } }else{ ?>
    ["failed"]
<?php }
 }elseif ($_SERVER["REQUEST_METHOD"] == "GET"){
  $veriname = $_GET['curuser'];
  $checkveriname = $db::getInstance()->get('users',array('veriname','=',"$veriname"));
  if ($checkveriname->count()) { ?>
      ["true","connect"]
  <?php } else { ?>
      ["false"]
  <?php }
 } ?>
