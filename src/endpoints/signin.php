<?php
require('sheets.php');
require('datafuncs.php');

// start tracking time on signin
if (isset($_REQUEST['password'])) {
  $userData = getUserData($_REQUEST['password']);
  $lastTime = userData[3];
  $totalTime = userData[4];
  $currentTime = time();
  $sessionTime = $currentTime - $lastTime;
  if($userData[2] == "FALSE"){
    $values = [
      ["TRUE", $currentTime, $totalTime]
    ];
    $range = ("C" . getUserRow($_REQUEST['password'])) . (":E" . getUserRow($_REQUEST['password']));
    changeData($values, $range);
    echo $userData[0];
  } else if($userData[2] == "TRUE"){
    $values = [
      ["FALSE", $currentTime, $sessionTime]
    ];
    $range = ("C" . getUserRow($_REQUEST['password'])) . (":E" . getUserRow($_REQUEST['password']));
    echo json_encode($userData);
    changeData($values, $range);
    echo $userData[0];
  }
}

?>
