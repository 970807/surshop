<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type:application/json; charset=utf-8');
  $data = file_get_contents("php://input");
  $data = json_decode($data, true);
  $type = $data['type'];
  $userName = $data['userName'];
  $password = $data['password'];
  $baseURL = 'http://surshop.ggh0807.cn/images/profile';
  function randomkeys($length) { // 产生随机用户名
    $returnStr='';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
    for($i = 0; $i < $length; $i ++) {
        $returnStr .= $pattern {mt_rand ( 0, 61 )}; //生成php随机数
    }
    return $returnStr;
  }

  function getAvatar() { // 返回图片的地址
    $count = 2; // 服务器上头像的个数
    $res; 
    $randNum = mt_rand(1, $count); // 生成随机数
    switch($randNum) {
      case 1:
        $res = $GLOBALS['baseURL'].'/avatar_01.svg';
        break;
      case 2:
        $res = $GLOBALS['baseURL'].'/avatar_02.svg';
        break;
    }
    return $res;
  }
  function getVipRank() { // 返回vip等级
    return mt_rand(0, 4);
  }
  $isValid = false;
  if($type == 'login') {
    if($userName == '' || $password == '') {
      $isValid = false;
      $arr = array('isValid' => $isValid);
      exit(json_encode($arr));
      return;
    } else {
      $isValid = true;
    }
  }

  if($type == 'onestep') {
    $isValid = true;
    $userName = randomkeys(6);
  }
  $avatar = getAvatar();
  $arr = array('isValid' => $isValid, 'userName' => $userName, 'avatar' => $avatar, 'vipRank' => getVipRank());
  exit(json_encode($arr));
?>