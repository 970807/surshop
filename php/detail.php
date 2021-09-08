<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type:application/json; charset=utf-8');
  $id = $_GET['id'];
  $baseURL = 'http://surshop.ggh0807.cn/images/detail';
  date_default_timezone_set("PRC");
  // 顶部轮播图  依次输入每个类别的图片数
  function getTopImages() {
    $args = func_get_args();
    $res = array();
    for($i=0;$i<count($args);$i++) {
      $arr = array();
      for($j=0;$j<$args[$i];$j++) {
        $arr[$j] = $GLOBALS['baseURL'].'/'.$GLOBALS['id'].'/category'.($i+1).'/'.str_pad($j+1,2,0,STR_PAD_LEFT).'.webp';
      }
      array_push($res, $arr);
    }
    return $res;
  }
  // 商品介绍
  function getGoodsIntroduction($count, $format='.webp') {
    for($i=0;$i<$count;$i++) {
      $arr[$i] = $GLOBALS['baseURL'].'/'.$GLOBALS['id'].'/goodsIntroduction/'.str_pad($i+1,2,0,STR_PAD_LEFT).$format;
    }
    return $arr;
  }

  // 推荐（参数为每个price  图片默认从01.jpg开始，有参数个数张图片）
  // $totalRecommend：可推荐的总数
  function getDressRecommend($startId=120, $endId=139) {
    $randArr = array(); // 用来记录产生的随机数，避免重复
    $goodsArr = array();
    $currentId = $GLOBALS['id'];
    for($i=0;$i<9;$i++) {
      do {
        $randNum = mt_rand($startId, $endId); // 生成随机数
      }while(in_array($randNum, $randArr) || $randNum == $currentId);
      array_push($randArr, $randNum);
      $info = getGoodsFromId($randNum);
      array_push($goodsArr, $info);
    }
    return $goodsArr;
  }
  function getDigitRecommend($startId=215, $endId=224) {
    $count = $endId - $startId + 1;
    $goodsArr = array();
    $res = array();
    for($i=0; $i<$count; $i++) {
      $info = getGoodsFromId($startId + $i);
      if($GLOBALS['id'] != ($startId + $i)) {
        array_push($goodsArr, $info);
      }
    }
    for($j=0; $j<9; $j++) {
      $randNum = mt_rand(1, 2);
      if($randNum == 1) {
        array_push($res, array_shift($goodsArr));
      } else {
        array_push($res, array_pop($goodsArr));
      }
    }
    return $res;
  }
  function getFoodRecommend() {
    // 所有可能的id
    $foods = array(300, 301, 302, 303, 304, 305, 306, 307, 308, 309);
    $res = array();
    $currentId = $GLOBALS['id'];
    $key = array_search($currentId, $foods);
    if($key !== false) {
      array_splice($foods, $key, 1);
    }
    for($i=0; $i<count($foods); $i++) {
      $info = getGoodsFromId($foods[$i]);
      array_push($res, $info);
    }
    return $res;
  }
  function getGoodsFromId($id) {
    if($id >= 120 && $id <= 139) {
      // 女装推荐
      $img = $GLOBALS['baseURL'].'/default/dressRecommend/'.$id.'.webp';
    }
    if($id >= 215 && $id <= 224) {
      // 数码推荐
      $img = $GLOBALS['baseURL'].'/default/digitRecommend/'.$id.'.webp';
    }
    if($id >= 300 && $id <= 309) {
      // 零食推荐
      $img = $GLOBALS['baseURL'].'/default/foodRecommend/'.$id.'.webp';
    }
    switch($id) {
      case 120:
        $price = '¥55.00';
        break;
      case 121:
        $price = '¥56.00';
        break;
      case 122:
        $price = '¥39.00';
        break;
      case 123:
        $price = '¥45.00';
        break;
      case 124:
        $price = '¥56.00';
        break;
      case 125:
        $price = '¥39.00';
        break;
      case 126:
        $price = '¥67.00';
        break;
      case 127:
        $price = '¥38.00';
        break;
      case 128:
        $price = '¥35.60';
        break;
      case 129:
        $price = '¥44.40';
        break;
      case 130:
        $price = '¥45.00';
        break;
      case 131:
        $price = '¥39.00';
        break;
      case 132:
        $price = '¥38.00';
        break;
      case 133:
        $price = '¥45.00';
        break;
      case 134:
        $price = '¥55.99';
        break;
      case 135:
        $price = '¥66.00';
        break;
      case 136:
        $price = '¥65.00';
        break;
      case 137:
        $price = '¥39.80';
        break;
      case 138:
        $price = '¥52.00';
        break;
      case 139:
        $price = '¥68.00';
        break;
      case 215:
        $price = '¥11599.00';
        break;
      case 216:
        $price = '¥9660.00';
        break;
      case 217:
        $price = '¥4999.00';
        break;
      case 218:
        $price = '¥4388.00';
        break;
      case 219:
        $price = '¥1999.00';
        break;
      case 220:
        $price = '¥1949.00';
        break;
      case 221:
        $price = '¥6999.00';
        break;
      case 222:
        $price = '¥3499.00';
        break;
      case 223:
        $price = '¥399.00';
        break;
      case 224:
        $price = '¥2299.00';
        break;
      case 300:
        $price = '¥11.80';
        break;
      case 301:
        $price = '¥39.90';
        break;
      case 302:
        $price = '¥18.90';
        break;
      case 303:
        $price = '¥19.90';
        break;
      case 304:
        $price = '¥34.90';
        break;
      case 305:
        $price = '¥15.90';
        break;
      case 306:
        $price = '¥37.90';
        break;
      case 307:
        $price = '¥19.90';
        break;
      case 308:
        $price = '¥36.90';
        break;
      case 309:
        $price = '¥25.90';
        break;
    }
    return array('id' => $id, 'img' => $img, 'price' => $price);
  }

  // 默认用户头像
  function getDefaultUserImg() {
    return $GLOBALS['baseURL'].'/default/cmt/default_profile_image.png';
  }

  // 用户头像
  function getUserImg($fileName) {
    return $GLOBALS['baseURL'].'/'.$GLOBALS['id'].'/cmt/'.$fileName;
  }

  // 店铺头像
  function getShopImg($fileName='shop_logo.jpg') {
    return $GLOBALS['baseURL'].'/'.$GLOBALS['id'].'/shopInfo/'.$fileName;
  }

  // 设置时间 $day：返回$day天之前的日期
  function getBeforeDate($day) {
    $d = date('Y-m-d', strtotime('-'.$day.' day'));
    return $d;
  }


  // id：100
  $id100 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('2020夏季新款宽松黄色小清系短袖T恤女半袖翻领Polo衫韩版学生K86681 黄色 S'), 'price' => array('newPrice' => '78.00'), 'choosedInfo' => array('choosedStyle' => array('黄色，S，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退款', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '96%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***k', 'star' => 5, 'cmtDate' => getBeforeDate(26), 'cmtCnt' => '面料材质很满意 舒适程度：满意 上身效果：满意 款式风格：满意 吸汗效果：满意'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '139626ggf', 'star' => 5, 'cmtDate' => getBeforeDate(49), 'cmtCnt' => '这家小店衣服款式和质量都挺不错的，尺码标准，发货速度也很快，上身效果👍'))), 'shopInfo' => array('shopLogo' => getShopImg(), 'shopName' => '库恩玛维官方旗舰店', 'fans' => '14万', 'allGoods' => '1332', 'evaluation' => array('score' => '9.03', 'level' => '中'), 'express' => array('score' => '9.61', 'level' => '高'), 'afterService' => array('score' => '9.22', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(15), 'test' => getDressRecommend());

  // id：101
  $id101 = array('topImages' => getTopImages(5, 5), 'currentCategory' => 0, 'title' => array('岚烨2020夏季新款字母印花短袖t恤女学生宽松韩版潮ins网红半袖体恤上衣服 灰色 均码', '岚烨2020夏季新款字母印花短袖t恤女学生宽松韩版潮ins网红半袖体恤上衣服 黑色 均码'), 'price' => array('newPrice' => '56.00', 'oldPrice' => '¥68.00'), 'choosedInfo' => array('choosedStyle' => array('灰色，均码，1个', '黑色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款8元，在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退款', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '40+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'j***e', 'star' => 5, 'cmtDate' => getBeforeDate(12), 'cmtCnt' => '衣服是纯棉的，穿着很舒服，款式好，没有色差，袖子也宽松，颜色也好看'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '516*****99187', 'star' => 5, 'cmtDate' => getBeforeDate(57), 'cmtCnt' => '黑色真的太百搭了，简约的同时也超级酷！随意搭个休闲裤也可以炸街的那种，衣服面料也很舒适柔软'))), 'shopInfo' => array('shopLogo' => getShopImg(), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '5003', 'evaluation' => array('score' => '9.15', 'level' => '中'), 'express' => array('score' => '9.23', 'level' => '高'), 'afterService' => array('score' => '9.11', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(30));

  // id：102
  $id102 = array('topImages' => getTopImages(6, 6, 6), 'currentCategory' => 1, 'title' => array('【商场同款】MECITY女装春季时尚休闲可盐可甜商务T恤多色清爽短袖 亮白色 155/80A', '【商场同款】MECITY女装春季时尚休闲可盐可甜商务T恤多色清爽短袖 新桂木绿 155/80A', '【商场同款】MECITY女装春季时尚休闲可盐可甜商务T恤多色清爽短袖 水泥灰 155/80A'), 'price' => array('newPrice' => '89.00'), 'choosedInfo' => array('choosedStyle' => array('亮白色，155/80A，1个', '新桂木绿，155/80A，1个', '水泥灰，155/80A，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后')), 'commentInfo' => array('cmtCount' => '30+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '泽***9', 'star' => 5, 'cmtDate' => getBeforeDate(70), 'cmtCnt' => '这件衣服的颜色和图片一样，完全没有色差，我的照片可能嗯，颜色有点偏淡，但是它实际的颜色跟模特身上的颜色是一样的，而且是纯棉的，非常的舒服，也比较的透气，是比较厚的那种材质，感觉质量比较好，而且不易变形，弹性比较好，是一件非常好的产品，夏天穿起来感觉非常的清爽舒适，但是买的另外一件衬衫质量就没有这么好了'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '134133cmc', 'star' => 5, 'cmtDate' => getBeforeDate(131), 'cmtCnt' => '舒适程度：很舒适，没有色差，比较满意。'))), 'shopInfo' => array('shopLogo' => getShopImg(), 'shopName' => 'ME&CITY女装旗舰店', 'fans' => '34万', 'allGoods' => '1936', 'evaluation' => array('score' => '9.20', 'level' => '高'), 'express' => array('score' => '9.22', 'level' => '高'), 'afterService' => array('score' => '9.08', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(25));

  // id：103
  $id103 = array('topImages' => getTopImages(2, 1, 1, 1), 'currentCategory' => 1, 'title' => array('衣领飘飘短袖字母t恤女装春夏装宽松白色纯色棉上衣大码衣服体恤衫 深蓝色 M宽松(105-120斤)', '衣领飘飘短袖字母t恤女装春夏装宽松白色纯色棉上衣大码衣服体恤衫 黑色 M宽松(105-120斤)', '衣领飘飘短袖字母t恤女装春夏装宽松白色纯色棉上衣大码衣服体恤衫 白色 M宽松(105-120斤)', '衣领飘飘短袖字母t恤女装春夏装宽松白色纯色棉上衣大码衣服体恤衫 灰色 M宽松(105-120斤)'), 'price' => array('newPrice' => '79.00', 'oldPrice' => '¥96.00'), 'choosedInfo' => array('choosedStyle' => array('深蓝色，M宽松(105-120斤)，1个', '黑色，M宽松(105-120斤)，1个', '白色，M宽松(105-120斤)，1个', '灰色，M宽松(105-120斤)，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货', '货到付款')), 'commentInfo' => array('cmtCount' => '30+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '186660vma', 'star' => 5, 'cmtDate' => getBeforeDate(63), 'cmtCnt' => '老用户了，非常喜欢这家的衣服，主要是布料很柔软，穿着非常舒服，款式也很好看！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '152381jab', 'star' => 5, 'cmtDate' => getBeforeDate(110), 'cmtCnt' => '衣服质量不错，纯棉的，大小合适，穿着舒适'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '衣领飘飘官方旗舰店', 'fans' => '5.5万', 'allGoods' => '1816', 'evaluation' => array('score' => '9.00', 'level' => '中'), 'express' => array('score' => '9.81', 'level' => '高'), 'afterService' => array('score' => '9.27', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(20));

  // id：104
  $id104 = array('topImages' => getTopImages(1, 1, 3), 'currentCategory' => 0, 'title' => array('古黛妃 2020韩版学生百搭时尚春夏季新款宽松休闲慵懒舒适大码圆领短袖T恤女 浅橙色 XL', '古黛妃 2020韩版学生百搭时尚春夏季新款宽松休闲慵懒舒适大码圆领短袖T恤女 白色 XL', '古黛妃 2020韩版学生百搭时尚春夏季新款宽松休闲慵懒舒适大码圆领短袖T恤女 蓝色 XL'), 'price' => array('newPrice' => '45.00', 'oldPrice' => '¥56.00'), 'choosedInfo' => array('choosedStyle' => array('浅橙色，XL，1个', '白色，XL，1个', '蓝色，XL，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '30+', 'evalRate' => '90%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '陈8023卞', 'star' => 5, 'cmtDate' => getBeforeDate(8), 'cmtCnt' => '穿着很舒服，反季买衣服最便宜实惠了！面料很好！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***K', 'star' => 3, 'cmtDate' => getBeforeDate(60), 'cmtCnt' => '衣服上的图案是防水的，很明显与其他地方不同，有点重重的；此衣服是棉料的，整体还行，但是穿了一天以后很明显就感觉想要起球了，这个衣服我不知道，但别的白体恤洗几次就变黄了，等我再穿几天观察观察，衣服只能说还可以吧'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '古黛妃官方旗舰店', 'fans' => '3.1万', 'allGoods' => '7205', 'evaluation' => array('score' => '8.73', 'level' => '低'), 'express' => array('score' => '9.58', 'level' => '高'), 'afterService' => array('score' => '9.08', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(28));

  // id：105
  $id105 = array('topImages' => getTopImages(6, 6, 6), 'currentCategory' => 2, 'title' => array('茵曼 2020夏新款女款短袖T恤蝴蝶结可爱甜美修身学生少女上衣 烟灰蓝 M', '茵曼 2020夏新款女款短袖T恤蝴蝶结可爱甜美修身学生少女上衣 粉红色 M', '茵曼 2020夏新款女款短袖T恤蝴蝶结可爱甜美修身学生少女上衣 春芽绿 M'), 'price' => array('newPrice' => '119.00', 'oldPrice' => '¥399.00'), 'choosedInfo' => array('choosedStyle' => array('烟灰蓝，M，1个', '粉红色，M，1个', '春芽绿，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '店铺单笔订单不满99元，收运费10元 ', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('comments' => array()), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '唯品会旗舰店', 'fans' => '220万', 'allGoods' => '7520', 'evaluation' => array('score' => '8.92', 'level' => '中'), 'express' => array('score' => '8.56', 'level' => '低'), 'afterService' => array('score' => '9.04', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(31));

  // id：106
  $id106 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('秋水伊人连衣裙2020夏季新款女装兔斯基联名刺绣亮片网纱连衣裙 粉红 S'), 'price' => array('newPrice' => '489.00', 'oldPrice' => '¥1198.00'), 'choosedInfo' => array('choosedStyle' => array('粉红，S，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '店铺单笔订单不满69元,货到付款运费8元,在线支付运费8元 ', 'services' => array('商家发货&售后', '7天无理由退货', '特权保障', '货到付款')), 'commentInfo' => array('cmtCount' => '80+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '138400tua', 'star' => 5, 'cmtDate' => getBeforeDate(22), 'cmtCnt' => '细节做工：做工很精细 面料质感：面料柔软'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '晓晓早安', 'star' => 5, 'cmtDate' => getBeforeDate(46), 'cmtCnt' => '非常好，性价比很高，以后还来买'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '秋水伊人旗舰店', 'fans' => '86万', 'allGoods' => '1738', 'evaluation' => array('score' => '9.08', 'level' => '中'), 'express' => array('score' => '9.49', 'level' => '高'), 'afterService' => array('score' => '9.13', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(18));

  // id：107
  $id107 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('哥弟女装2020秋季新款卫衣拼接条纹衬衫翻领露肩连衣裙A500058 藏蓝 L(4码)'), 'price' => array('newPrice' => '680.00'), 'choosedInfo' => array('choosedStyle' => array('藏蓝，L(4码)，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '20+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'c***3', 'star' => 5, 'cmtDate' => getBeforeDate(210), 'cmtCnt' => '宽松版的，款式很漂亮'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '哥弟官方旗舰店', 'fans' => '71万', 'allGoods' => '3748', 'evaluation' => array('score' => '9.35', 'level' => '高'), 'express' => array('score' => '9.89', 'level' => '高'), 'afterService' => array('score' => '8.86', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(9));

  // id：108
  $id108 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('秋水伊人连衣裙2020夏季新款女装兔斯基联名刺绣亮片网纱连衣裙 粉红 S'), 'price' => array('newPrice' => '95.00'), 'choosedInfo' => array('choosedStyle' => array('浅紫，L，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '30+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '138347opf', 'star' => 5, 'cmtDate' => getBeforeDate(36), 'cmtCnt' => '很喜欢，非常漂亮，穿着舒服'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '晓晓早安', 'star' => 5, 'cmtDate' => getBeforeDate(38), 'cmtCnt' => '衣服款式很时尚，长度到膝盖，实物跟图片颜色一样，只不过我拍的图片会有色差，感谢快递小哥。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '唐狮官方旗舰店', 'fans' => '64万', 'allGoods' => '2081', 'evaluation' => array('score' => '8.96', 'level' => '中'), 'express' => array('score' => '9.30', 'level' => '高'), 'afterService' => array('score' => '9.10', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(15));

  // id：109
  $id109 = array('topImages' => getTopImages(5, 5), 'currentCategory' => 1, 'title' => array('岚烨2020夏季新品中长款工装短袖衬衫女学生宽松百搭港味复古衬衣中袖上衣 橘色 均码', '岚烨2020夏季新品中长款工装短袖衬衫女学生宽松百搭港味复古衬衣中袖上衣 杏色 均码'), 'price' => array('newPrice' => '63.00', 'oldPrice' => '¥73.00'), 'choosedInfo' => array('choosedStyle' => array('橘色，均码，1个', '杏色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费 ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '7', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '会修炼的土狗', 'star' => 5, 'cmtDate' => getBeforeDate(47), 'cmtCnt' => '发货很快，版型不错，特别显瘦，性价比超高，很满意'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '5025', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.21', 'level' => '高'), 'afterService' => array('score' => '9.13', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(21));

  // id：110
  $id110 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('若宸连衣裙雪纺2020新款韩版性感裙子沙滩裙格子气质收腰显瘦不规则仙女裙长裙 图片色 S'), 'price' => array('newPrice' => '168.00', 'oldPrice' => '¥230.00'), 'choosedInfo' => array('choosedStyle' => array('图片色，S，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '预约送货', '部分收货', '自提')), 'commentInfo' => array('cmtCount' => '300+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***X', 'star' => 5, 'cmtDate' => getBeforeDate(14), 'cmtCnt' => '套装收到了，棉麻的料子很舒服，夏天穿凉快。款式。很好看，上身也不错，颜色和图片上一样，没有色差，穿起来。挺舒服的。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***N', 'star' => 5, 'cmtDate' => getBeforeDate(17), 'cmtCnt' => '衣服很不错，很时尚。设计的也很好看，裤子是松紧的，穿起来合适，款式风格都漂亮，上身效果也很好，面料是棉麻的。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '克里夫兰服饰专营店', 'fans' => '3.0万', 'allGoods' => '61', 'evaluation' => array('score' => '9.35', 'level' => '高'), 'express' => array('score' => '9.67', 'level' => '高'), 'afterService' => array('score' => '9.08', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(20));

  // id：111
  $id111 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('与欣新品高中初中生少女生裙子夏天白色连衣裙女仙气质少女感学生甜美小清新中长款裙子仙女仙森系 白色 均码'), 'price' => array('newPrice' => '96.90', 'oldPrice' => '¥128.00'), 'choosedInfo' => array('choosedStyle' => array('白色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***z', 'star' => 5, 'cmtDate' => getBeforeDate(18), 'cmtCnt' => '面料质感：料子很好 夏天穿很合适 也不会透 上身效果：简约大方超显气质的啊啊 很好看'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***f', 'star' => 5, 'cmtDate' => getBeforeDate(20), 'cmtCnt' => '嘎嘎嘎面料很舒服呀长度正好很喜欢有点小透穿一个美背特别好看自己搭配了一个小包包有喜欢的抓紧下单！！！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '与欣旗舰店', 'fans' => '2772', 'allGoods' => '7421', 'evaluation' => array('score' => '9.01', 'level' => '中'), 'express' => array('score' => '9.29', 'level' => '高'), 'afterService' => array('score' => '9.04', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(14));

  // id：112
  $id112 = array('topImages' => getTopImages(4, 2), 'currentCategory' => 0, 'title' => array('以影连衣裙学生初中高中生少女裙子女学生夏季新款文艺小清新荷叶边显瘦娃娃领蝴蝶结短袖中长裙 绿色 M', '以影连衣裙学生初中高中生少女裙子女学生夏季新款文艺小清新荷叶边显瘦娃娃领蝴蝶结短袖中长裙 杏色 M'), 'price' => array('newPrice' => '109.00'), 'choosedInfo' => array('choosedStyle' => array('绿色，M，1个', '杏色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险')), 'commentInfo' => array('cmtCount' => '80+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'wuxiongyan123', 'star' => 5, 'cmtDate' => getBeforeDate(1), 'cmtCnt' => '衣服面料舒适，穿着感觉很时尚，颜色好看，做工精细。挺满意的。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***x', 'star' => 5, 'cmtDate' => getBeforeDate(30), 'cmtCnt' => '非常好，发货也很快，收到马上上身试了一下，很合身，这个颜色在夏天穿也很清爽，很喜欢，嘻嘻。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '以影旗舰店', 'fans' => '453', 'allGoods' => '1021', 'evaluation' => array('score' => '9.20', 'level' => '高'), 'express' => array('score' => '9.16', 'level' => '高'), 'afterService' => array('score' => '8.57', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(31));

  // id：113
  $id113 = array('topImages' => getTopImages(4, 5, 1), 'currentCategory' => 1, 'title' => array('佐丹曼【时尚款】2020新款显瘦连衣裙夏复古格子网纱仙女裙中长款女学生韩版闺蜜裙 卡其色 关注店铺优先发货 M 建议90~100斤', '佐丹曼【时尚款】2020新款显瘦连衣裙夏复古格子网纱仙女裙中长款女学生韩版闺蜜裙 灰色 关注店铺优先发货 M 建议90~100斤', '佐丹曼【时尚款】2020新款显瘦连衣裙夏复古格子网纱仙女裙中长款女学生韩版闺蜜裙 粉红色 关注店铺优先发货 M 建议90~100斤'), 'price' => array('newPrice' => '118.00'), 'choosedInfo' => array('choosedStyle' => array('卡其色，M 建议90~100斤，1个', '灰色，M 建议90~100斤，1个', '粉红色，M 建议90~100斤，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款')), 'commentInfo' => array('cmtCount' => '3', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***v', 'star' => 5, 'cmtDate' => getBeforeDate(20), 'cmtCnt' => '给闺蜜买的  闺蜜说很喜欢  我也很开心'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '鹏露服饰专营店', 'fans' => '4.7万', 'allGoods' => '7520', 'evaluation' => array('score' => '8.00', 'level' => '低'), 'express' => array('score' => '8.37', 'level' => '低'), 'afterService' => array('score' => '8.72', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(19));

  // id：114
  $id114 = array('topImages' => getTopImages(7, 2), 'currentCategory' => 1, 'title' => array('连衣裙春夏季2020新款韩版polo领高腰长袖女学生宽松显瘦中长款a字裙子 黑色 S【60斤-90斤】', '连衣裙春夏季2020新款韩版polo领高腰长袖女学生宽松显瘦中长款a字裙子 白色 S【60斤-90斤】'), 'price' => array('newPrice' => '168.00', 'oldPrice' => '¥196.00'), 'choosedInfo' => array('choosedStyle' => array('黑色，S【60斤-90斤】，1个', '白色，S【60斤-90斤】，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款')), 'commentInfo' => array('cmtCount' => '8', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***3', 'star' => 5, 'cmtDate' => getBeforeDate(5), 'cmtCnt' => '物美价廉,物有所值,品质高端,超好,超快,值得信赖!比我想象的还要好啊,买家服务也超好,赞,下次还您家购物!'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'j***7', 'star' => 5, 'cmtDate' => getBeforeDate(56), 'cmtCnt' => '细节做工：挺好的面料，不容易皱'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '贵兰姿服饰旗舰店', 'fans' => '658', 'allGoods' => '813', 'evaluation' => array('score' => '9.31', 'level' => '高'), 'express' => array('score' => '9.21', 'level' => '高'), 'afterService' => array('score' => '8.92', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(19));

  // id：115
  $id115 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('婧瑜夏天显瘦长裙女裙子夏季白色连衣裙2020新款气质森系学生超仙显瘦 白色 L'), 'price' => array('newPrice' => '189.00', 'oldPrice' => '¥256.00'), 'choosedInfo' => array('choosedStyle' => array('白色，L，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '90%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'tuxiaobao', 'star' => 5, 'cmtDate' => getBeforeDate(61), 'cmtCnt' => '舒适程度：上半身体恤款，面料很舒服。
  适合小女生穿，仙仙的感觉。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***T', 'star' => 5, 'cmtDate' => getBeforeDate(76), 'cmtCnt' => '面料材质：很舒服 其他特色：内衬，比我想象的长一点'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '婧瑜女装旗舰店', 'fans' => '9125', 'allGoods' => '224', 'evaluation' => array('score' => '9.16', 'level' => '高'), 'express' => array('score' => '9.27', 'level' => '高'), 'afterService' => array('score' => '9.19', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(21));

  // id：116
  $id116 = array('topImages' => getTopImages(7, 2), 'currentCategory' => 1, 'title' => array('2020夏季新款韩版法式小众复古娃娃裙宽松显瘦小清新连衣裙女学生 豆绿色 M', '2020夏季新款韩版法式小众复古娃娃裙宽松显瘦小清新连衣裙女学生 砖红色 M'), 'price' => array('newPrice' => '53.50'), 'choosedInfo' => array('choosedStyle' => array('豆绿色，M，1个', '砖红色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费 ', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '94%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '上官紫月嗷呜', 'star' => 5, 'cmtDate' => getBeforeDate(36), 'cmtCnt' => '面料质感：摸起来很舒服
  时尚程度：挺好看的 款式风格：风格也很好 上身效果：上身效果很舒服 细节做工：细节也还行，有些线没缝匀称 适穿场合：一般日常就能穿'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '拯救世界的孩砸', 'star' => 5, 'cmtDate' => getBeforeDate(37), 'cmtCnt' => '小裙子太棒啦，质量还很好，喜欢的集美们赶紧入手。这个衣服的物超所值呐。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.jpg'), 'shopName' => '南瑾大码女装专营店', 'fans' => '2359', 'allGoods' => '7520', 'evaluation' => array('score' => '8.25', 'level' => '低'), 'express' => array('score' => '8.56', 'level' => '低'), 'afterService' => array('score' => '8.90', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(16));

  // id：117
  $id117 = array('topImages' => getTopImages(7), 'currentCategory' => 0, 'title' => array('法式小众连衣裙收腰长款短袖女学生长裙韩版2019夏天新款裙子森系 绿色【配腰带】 均码'), 'price' => array('newPrice' => '59.00'), 'choosedInfo' => array('choosedStyle' => array('绿色【配腰带】，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费 ', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '300+', 'evalRate' => '89%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '雨季后我溯溪_', 'star' => 5, 'cmtDate' => getBeforeDate(66), 'cmtCnt' => '舒适程度：非常舒服 厚薄程度：厚度恰当'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***0', 'star' => 5, 'cmtDate' => getBeforeDate(98), 'cmtCnt' => '纯棉布料很舒服客服服务很好快递速度也很快'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '楠笙服装专营店', 'fans' => '1387', 'allGoods' => '8325', 'evaluation' => array('score' => '8.17', 'level' => '低'), 'express' => array('score' => '8.61', 'level' => '低'), 'afterService' => array('score' => '8.88', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(18));

  // id：118
  $id118 = array('topImages' => getTopImages(3, 3), 'currentCategory' => 0, 'title' => array('迪炫莉连衣裙学生夏天学院风高中生少女初中生女生裙子夏季韩版中长款女孩中学生宽松显瘦热天背带裙衣服套装 藏青色吊带裙+短袖T恤一套 均码', '迪炫莉连衣裙学生夏天学院风高中生少女初中生女生裙子夏季韩版中长款女孩中学生宽松显瘦热天背带裙衣服套装 粉色吊带裙+短袖T恤一套 均码'), 'price' => array('newPrice' => '109.00'), 'choosedInfo' => array('choosedStyle' => array('藏青色吊带裙+短袖T恤一套，均码，1个', '粉色吊带裙+短袖T恤一套，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费 ', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '20+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '指尖妖娆童', 'star' => 5, 'cmtDate' => getBeforeDate(13), 'cmtCnt' => '裙子收到了，质量很好，面料摸着很舒服，穿着很合身，上身效果很好，满意'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '去西班牙斗猴', 'star' => 5, 'cmtDate' => getBeforeDate(13), 'cmtCnt' => '裙子收到了。质量挺好的。颜色 样子都是我喜欢的。穿上很舒服。尺码也合适。很满意'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '迪炫莉旗舰店', 'fans' => '2225', 'allGoods' => '5379', 'evaluation' => array('score' => '8.85', 'level' => '低'), 'express' => array('score' => '9.15', 'level' => '高'), 'afterService' => array('score' => '9.15', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(25));

  // id：119
  $id119 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('Lagogo拉谷谷2020夏季新款短袖圆领镂空亮丝印花粉红色甜美字母T恤女JATT314A05 粉红色(H8) 160/M/38'), 'price' => array('newPrice' => '123.00', 'oldPrice' => '¥199.00'), 'choosedInfo' => array('choosedStyle' => array('粉红色(H8)，160/M/38，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费 ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '20+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'x***9', 'star' => 5, 'cmtDate' => getBeforeDate(7), 'cmtCnt' => '机洗晾干，不变形不掉色。面料薄舒服，尤其blingbling银线太喜欢了。肩部设计独特，颜色也喜欢。老少都适合穿。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***7', 'star' => 5, 'cmtDate' => getBeforeDate(8), 'cmtCnt' => '活动力度大，是正品，非常满意，老粉丝了'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => 'lagogo官方旗舰店', 'fans' => '33万', 'allGoods' => '1791', 'evaluation' => array('score' => '9.10', 'level' => '中'), 'express' => array('score' => '9.23', 'level' => '高'), 'afterService' => array('score' => '9.36', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(19));

  // id：120
  $id120 = array('topImages' => getTopImages(4, 4), 'currentCategory' => 0, 'title' => array('岚烨怪味少女短袖T恤女夏季ins韩版宽松纯色百搭小清新半袖打底衫上衣 墨绿 均码', '岚烨怪味少女短袖T恤女夏季ins韩版宽松纯色百搭小清新半袖打底衫上衣 白色 均码'), 'price' => array('newPrice' => '55.00', 'oldPrice' => '¥68.00'), 'choosedInfo' => array('choosedStyle' => array('墨绿，均码，1个', '白色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费  ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '瑞190020', 'star' => 5, 'cmtDate' => getBeforeDate(41), 'cmtCnt' => '面料材质：很舒服啊，表面绒绒的 上身效果：均码宽松效果 舒适程度：舒服'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***p', 'star' => 5, 'cmtDate' => getBeforeDate(94), 'cmtCnt' => '面料材质：柔软 上身效果：颜色很正 舒适程度：亲肤 吸汗效果：可以 款式风格：休闲 其他特色：还可以，还没出穿，柔软，是那种吸水材质。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '4988', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(24));

  // id：121
  $id121 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('岚烨ins网红短袖T恤女夏季韩版小清新宽松百搭创意趣味文艺学生半袖上衣潮 蓝色 均码'), 'price' => array('newPrice' => '56.00', 'oldPrice' => '¥66.00'), 'choosedInfo' => array('choosedStyle' => array('蓝色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费  ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '60+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'cyEEftfIRacq', 'star' => 5, 'cmtDate' => getBeforeDate(41), 'cmtCnt' => '真的今天刚收到，真的真的真的很喜欢，颜色啥的都好看，质量摸起来也还不错，很舒服的感觉，建议购买，颜色比这个照片要暗一些，颜色没话说，好看，比这个我发的图片要暗一些'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '甜***5', 'star' => 5, 'cmtDate' => getBeforeDate(94), 'cmtCnt' => '面料材质：摸起来滑滑的，非常舒适，也比较凉凉的那种哈哈 上身效果：很宽松，看起来很显瘦，也比较显白 舒适程度：因为超级宽松，所以很舒适(๑•॒̀ ູ॒•́๑)啦啦啦 吸汗效果：啊倒是没出多少汗，所以不太知道呢 款式风格：超级好看，真的一眼就看中了ヾ(´∀｀。ヾ)'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '4988', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(12));

  // id：122
  $id122 = array('topImages' => getTopImages(6, 4), 'currentCategory' => 1, 'title' => array('岚烨橘色印花纯棉短袖女学生夏季新款宽松T恤圆领套头半袖T恤上衣潮 白色 均码', '岚烨橘色印花纯棉短袖女学生夏季新款宽松T恤圆领套头半袖T恤上衣潮 粉红色 均码'), 'price' => array('newPrice' => '39.00', 'oldPrice' => '¥49.00'), 'choosedInfo' => array('choosedStyle' => array('白色，均码，1个', '粉红色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费  ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '20+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'Y***J', 'star' => 5, 'cmtDate' => getBeforeDate(41), 'cmtCnt' => '衣服颜色很正，款式新颖时尚，商家服务态度不满意！会继续买他们家宝贝'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***h', 'star' => 5, 'cmtDate' => getBeforeDate(94), 'cmtCnt' => '衣服收到了，感觉很宽松，摸起来也很舒服'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '4988', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(29));

  // id：123
  $id123 = array('topImages' => getTopImages(5, 5), 'currentCategory' => 0, 'title' => array('岚烨怪味复古印花T恤女夏季新品森系可爱学生短袖打底衫圆领上衣潮 浅粉色 均码', '岚烨怪味复古印花T恤女夏季新品森系可爱学生短袖打底衫圆领上衣潮 浅蓝色 均码'), 'price' => array('newPrice' => '45.00', 'oldPrice' => '¥58.00'), 'choosedInfo' => array('choosedStyle' => array('浅粉色，均码，1个', '浅蓝色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费  ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '30+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***3', 'star' => 5, 'cmtDate' => getBeforeDate(5), 'cmtCnt' => '衣服早就到了一直没顾上写评。京东物流没得说每次都很快。东西挺好的个人很满意，衣服比较厚实不会透应该也不会出现松弛变形的情况。已经下过水了不掉色。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'vParFOyUtWwY', 'star' => 5, 'cmtDate' => getBeforeDate(36), 'cmtCnt' => '减龄款，超级喜欢质量超好，穿起来凉快舒服。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '4988', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(19));

  // id：124
  $id124 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('岚烨夏季小清新抹茶绿色短袖T恤女生韩版宽松洋气森系超火cec牛油果上衣ins潮 绿色 均码'), 'price' => array('newPrice' => '56.00', 'oldPrice' => '¥66.00'), 'choosedInfo' => array('choosedStyle' => array('绿色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费  ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '800+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***5', 'star' => 5, 'cmtDate' => getBeforeDate(17), 'cmtCnt' => '面料材质：纯棉，特别好 上身效果：百搭 款式风格：宽松 舒适程度：穿上很舒服'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '萤火虫旻', 'star' => 5, 'cmtDate' => getBeforeDate(40), 'cmtCnt' => '今年最流行的牛油果色，很衬皮肤，搭配这黑白波点裙，夏天必备啊！布料柔软透气，连多余的线头都没有看到，是薄款的 颜色很夏天 上身显白 感觉青春有活力 牛油果色今年很流行啦 在实体店也入了牛油果色的衣服买回来穿上个人觉得还不错吧，布料还可以'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '4988', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(10));

  // id：125
  $id125 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('I\'M ONE 2020夏新款女士t恤人像女装短袖T恤女荷叶袖打底衫上衣女 落叶黄 S'), 'price' => array('newPrice' => '39.00', 'oldPrice' => '¥379.00'), 'choosedInfo' => array('choosedStyle' => array('落叶黄，S，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '店铺单笔订单不满99元，收运费10元', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '10+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***2', 'star' => 5, 'cmtDate' => getBeforeDate(1), 'cmtCnt' => '衣服很好，色差不大，女儿还蛮喜欢的'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '贪睡的洋娃娃', 'star' => 5, 'cmtDate' => getBeforeDate(32), 'cmtCnt' => '面料材质：舒服 上身效果：好'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '唯品会旗舰店', 'fans' => '220万', 'allGoods' => '7520', 'evaluation' => array('score' => '8.92', 'level' => '中'), 'express' => array('score' => '8.57', 'level' => '低'), 'afterService' => array('score' => '9.04', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(14));

  // id：126
  $id126 = array('topImages' => getTopImages(4, 4), 'currentCategory' => 1, 'title' => array('岚烨短袖显瘦格子衬衫女复古文艺夏装新款polo领宽松韩版衬衣 卡其色衬衣 均码', '岚烨短袖显瘦格子衬衫女复古文艺夏装新款polo领宽松韩版衬衣 蓝色衬衣 均码'), 'price' => array('newPrice' => '67.00', 'oldPrice' => '¥86.00'), 'choosedInfo' => array('choosedStyle' => array('卡其色衬衣，均码，1个', '蓝色衬衣，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费 ', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '70+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***V', 'star' => 5, 'cmtDate' => getBeforeDate(8), 'cmtCnt' => '薄厚程度：这种天穿在身上很好啊，款式也很好看'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '小龙鱼麻麻', 'star' => 5, 'cmtDate' => getBeforeDate(17), 'cmtCnt' => '衣服质感还是不错的，做工也很精细，没有粗糙感，穿上很有范'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '4996', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(18));

  // id：127
  $id127 = array('topImages' => getTopImages(1, 2, 2), 'currentCategory' => 2, 'title' => array('风采兔 2020新款夏季欧版美式涂鸦短袖t恤女ins潮宽松韩版港风女装上衣服 绿色 L', '风采兔 2020新款夏季欧版美式涂鸦短袖t恤女ins潮宽松韩版港风女装上衣服 白色 L', '风采兔 2020新款夏季欧版美式涂鸦短袖t恤女ins潮宽松韩版港风女装上衣服 蓝色 L'), 'price' => array('newPrice' => '38.00', 'oldPrice' => '¥48.00'), 'choosedInfo' => array('choosedStyle' => array('绿色，L，1个', '白色，L，1个', '蓝色，L，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费5元,在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '70+', 'evalRate' => '89%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '182735pss', 'star' => 5, 'cmtDate' => getBeforeDate(30), 'cmtCnt' => '版型好看还没色差布料也好太爱了'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***4', 'star' => 5, 'cmtDate' => getBeforeDate(17), 'cmtCnt' => '舒适程度：很宽松'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.jpg'), 'shopName' => '风采兔官方旗舰店', 'fans' => '7.4万', 'allGoods' => '2850', 'evaluation' => array('score' => '8.52', 'level' => '低'), 'express' => array('score' => '8.87', 'level' => '低'), 'afterService' => array('score' => '8.99', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(14));

  // id：128
  $id128 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('原宿港风polo衫小清新衬衫女夏可爱短袖韩范宽松学生衬衣2020新款 杏色 M'), 'price' => array('newPrice' => '35.60'), 'choosedInfo' => array('choosedStyle' => array('杏色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付运费5元', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '600+', 'evalRate' => '86%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***6', 'star' => 5, 'cmtDate' => getBeforeDate(6), 'cmtCnt' => '面料材质：好 舒适程度：好 薄厚程度：适中吧，不太透 颜色图案：好看，一毛一样 其他特色：整体来说呢，挺不错的，穿着也很舒服。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '啾咪一一', 'star' => 5, 'cmtDate' => getBeforeDate(17), 'cmtCnt' => '衣服超好看的哦，也很百搭，布料是那种凉凉的，穿起来很舒服！爱了爱了！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '全盛服饰专营店', 'fans' => '1652', 'allGoods' => '7520', 'evaluation' => array('score' => '8.08', 'level' => '低'), 'express' => array('score' => '8.51', 'level' => '低'), 'afterService' => array('score' => '8.89', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(15));

  // id：129
  $id129 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('原宿风印花短袖衬衫女夏季新款宽松复古文艺衬衣上衣 杏色 均码'), 'price' => array('newPrice' => '44.40'), 'choosedInfo' => array('choosedStyle' => array('杏色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付运费5元', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '60+', 'evalRate' => '78%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***8', 'star' => 5, 'cmtDate' => getBeforeDate(29), 'cmtCnt' => '买给妈妈的，挺合身的，感觉还可以吧'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'leng暖_自知', 'star' => 5, 'cmtDate' => getBeforeDate(66), 'cmtCnt' => '还不错，穿着很舒适。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '全盛服饰专营店', 'fans' => '1652', 'allGoods' => '7520', 'evaluation' => array('score' => '8.08', 'level' => '低'), 'express' => array('score' => '8.51', 'level' => '低'), 'afterService' => array('score' => '8.89', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(10));

  // id：130
  $id130 = array('topImages' => getTopImages(2, 4), 'currentCategory' => 1, 'title' => array('两件套时尚洋气套装女夏装2020新款韩版学生短袖T恤宽松马甲背心两件套 黄色马甲 M', '两件套时尚洋气套装女夏装2020新款韩版学生短袖T恤宽松马甲背心两件套 绿色马甲 M'), 'price' => array('newPrice' => '39.00'), 'choosedInfo' => array('choosedStyle' => array('长袖t恤+黄色马甲，M，1个', '长袖t恤+绿色马甲，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '400+', 'evalRate' => '90%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***G', 'star' => 5, 'cmtDate' => getBeforeDate(32), 'cmtCnt' => '颜色很好看，穿起来很舒服'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***T', 'star' => 5, 'cmtDate' => getBeforeDate(51), 'cmtCnt' => '上身效果：颜色挺好看 舒适程度：柔软舒适 款式风格：新颖'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '楠笙服装专营店', 'fans' => '1394', 'allGoods' => '7520', 'evaluation' => array('score' => '8.17', 'level' => '低'), 'express' => array('score' => '8.61', 'level' => '低'), 'afterService' => array('score' => '8.88', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(16));

  // id：131
  $id131 = array('topImages' => getTopImages(3, 1, 1), 'currentCategory' => 1, 'title' => array('简约polo领短袖t恤女日系早春宽松韩版ins潮chic慵懒风上衣服 灰色 XL', '简约polo领短袖t恤女日系早春宽松韩版ins潮chic慵懒风上衣服 黑色 XL', '娇诗茹港风简约polo领短袖t恤女日系早春宽松韩版ins潮chic慵懒风上衣服 白色 XL'), 'price' => array('newPrice' => '39.00'), 'choosedInfo' => array('choosedStyle' => array('灰色，XL，1个', '黑色，XL，1个', '白色，XL，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '300+', 'evalRate' => '89%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '杂食猫粮', 'star' => 5, 'cmtDate' => getBeforeDate(90), 'cmtCnt' => '舒适程度：不错，软软的感觉，舒适 上身效果：非常棒，我买的灰色，显白，宽松不失气质，非常棒.'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***f', 'star' => 5, 'cmtDate' => getBeforeDate(95), 'cmtCnt' => '很好，客服态度也很好，百搭款的，喜欢'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '明德梦旗舰店', 'fans' => '7500', 'allGoods' => '7520', 'evaluation' => array('score' => '8.05', 'level' => '低'), 'express' => array('score' => '8.67', 'level' => '低'), 'afterService' => array('score' => '8.34', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(15));

  // id：132
  $id132 = array('topImages' => getTopImages(2, 3), 'currentCategory' => 1, 'title' => array('风采兔 翻领polo衫日系少女感宽松韩版2020短袖t恤女ins潮百搭慵懒风上衣 蓝色 M', '风采兔 翻领polo衫日系少女感宽松韩版2020短袖t恤女ins潮百搭慵懒风上衣 杏色 M'), 'price' => array('newPrice' => '38.00', 'oldPrice' => '¥48.00'), 'choosedInfo' => array('choosedStyle' => array('蓝色，M，1个', '杏色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费5元,在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '10+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '清***萱', 'star' => 5, 'cmtDate' => getBeforeDate(70), 'cmtCnt' => '衣服很宽松，穿起来也合身，比较舒服，喜欢的小伙伴可以购买'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '156*****953', 'star' => 5, 'cmtDate' => getBeforeDate(98), 'cmtCnt' => '第一次买回来有问题，解决了，又重拍第二次，还行'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.jpg'), 'shopName' => '风采兔官方旗舰店', 'fans' => '7.4万', 'allGoods' => '2850', 'evaluation' => array('score' => '8.52', 'level' => '低'), 'express' => array('score' => '8.87', 'level' => '低'), 'afterService' => array('score' => '8.99', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(20));

  // id：133
  $id133 = array('topImages' => getTopImages(3, 2), 'currentCategory' => 0, 'title' => array('火莲娜 2020夏季新款日系polo衫ins短袖t恤女宽松韩版chic慵懒风bf百搭早春mschf上 黑色衣拼接白色袖 M', '火莲娜 2020夏季新款日系polo衫ins短袖t恤女宽松韩版chic慵懒风bf百搭早春mschf上 白色衣拼接黑色袖 M'), 'price' => array('newPrice' => '45.00'), 'choosedInfo' => array('choosedStyle' => array('黑色衣拼接白色袖，M，1个', '白色衣拼接黑色袖，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '95%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***6', 'star' => 5, 'cmtDate' => getBeforeDate(40), 'cmtCnt' => '学院风真的超级好看！面料薄而不透，适合夏天穿！挺值得！！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***u', 'star' => 5, 'cmtDate' => getBeforeDate(42), 'cmtCnt' => '衣服已经收到，很奈斯！上身效果不错呦！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '柳慕倾服饰专营店', 'fans' => '1661', 'allGoods' => '1244', 'evaluation' => array('score' => '8.66', 'level' => '低'), 'express' => array('score' => '9.45', 'level' => '高'), 'afterService' => array('score' => '8.81', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(12));

  // id：134
  $id134 = array('topImages' => getTopImages(1, 1, 2, 1), 'currentCategory' => 3, 'title' => array('夏韩版ins洋气宽松百搭polo衫短袖T恤半袖网红同款衣服女学生上衣 桔红色 均码', '夏韩版ins洋气宽松百搭polo衫短袖T恤半袖网红同款衣服女学生上衣 白色 均码', '夏韩版ins洋气宽松百搭polo衫短袖T恤半袖网红同款衣服女学生上衣 浅绿色 均码', '夏韩版ins洋气宽松百搭polo衫短袖T恤半袖网红同款衣服女学生上衣 黑色 均码'), 'price' => array('newPrice' => '55.99'), 'choosedInfo' => array('choosedStyle' => array('桔红色，均码，1个', '白色，均码，1个', '浅绿色，均码，1个', '黑色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '送运费险', '闪电退款', '极速审核')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '91%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'j***e', 'star' => 5, 'cmtDate' => getBeforeDate(32), 'cmtCnt' => '上身效果：非常的好看呢，质量也很棒，良心商家啊'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '徐***心', 'star' => 5, 'cmtDate' => getBeforeDate(67), 'cmtCnt' => '好看，出门旅游超级棒'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '潮圣服饰专营店', 'fans' => '1.8万', 'allGoods' => '7520', 'evaluation' => array('score' => '8.24', 'level' => '低'), 'express' => array('score' => '9.03', 'level' => '中'), 'afterService' => array('score' => '8.88', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(28));

  // id：135
  $id135 = array('topImages' => getTopImages(3, 3), 'currentCategory' => 1, 'title' => array('翻领T恤女宽松韩版学生高中生少女初中生女生短袖夏天衣服原宿风复古港风夏季半截袖热天POLO衫上衣 蓝色 均码', '翻领T恤女宽松韩版学生高中生少女初中生女生短袖夏天衣服原宿风复古港风夏季半截袖热天POLO衫上衣 绿色 均码'), 'price' => array('newPrice' => '66.00'), 'choosedInfo' => array('choosedStyle' => array('蓝色，均码，1个', '绿色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '88%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '痴狂所爱', 'star' => 5, 'cmtDate' => getBeforeDate(7), 'cmtCnt' => '上衣服收到了，快递很快，颜色也是妹妹最爱的！希望能让更多的人买到满意的衣服！加油！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***g', 'star' => 5, 'cmtDate' => getBeforeDate(53), 'cmtCnt' => '舒适程度：很舒服，孩子也非常喜欢！不掉颜色'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '迪炫莉旗舰店', 'fans' => '2256', 'allGoods' => '5158', 'evaluation' => array('score' => '8.85', 'level' => '低'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.16', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(13));

  // id：136
  $id136 = array('topImages' => getTopImages(4, 5), 'currentCategory' => 0, 'title' => array('岚烨刺绣polo衫少女上衣夏2020年新款韩版小清新条纹短袖T恤女学生宽松可爱 黄色 均码', '岚烨刺绣polo衫少女上衣夏2020年新款韩版小清新条纹短袖T恤女学生宽松可爱 蓝色 均码'), 'price' => array('newPrice' => '65.00', 'oldPrice' => '¥68.00'), 'choosedInfo' => array('choosedStyle' => array('黄色，均码，1个', '蓝色，均码，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '货到付款运费8元,在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '24H发货', '闪电退款', '极速审核', '货到付款')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***c', 'star' => 5, 'cmtDate' => getBeforeDate(60), 'cmtCnt' => '上身效果：很显瘦 款式风格：挺喜欢的，同学们也说很好看，这次购物非常满意'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***g', 'star' => 5, 'cmtDate' => getBeforeDate(65), 'cmtCnt' => '舒适程度：很舒服，孩子也非常喜欢！不掉颜色 面料材质：纯棉T恤！ 上身效果：宽松！ 舒适程度：宽松不热。 吸汗效果：纯棉吸汗没得说 款式风格：常减龄 ，配个短裤。很好看'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '岚烨旗舰店', 'fans' => '8.4万', 'allGoods' => '5012', 'evaluation' => array('score' => '9.14', 'level' => '中'), 'express' => array('score' => '9.19', 'level' => '高'), 'afterService' => array('score' => '9.12', 'level' => '中')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(14));

  // id：137
  $id137 = array('topImages' => getTopImages(3, 2), 'currentCategory' => 0, 'title' => array('火莲娜 2020夏季新款欧货短款小心机ins短袖t恤女小清新杏色潮宽松韩版bf泫雅mschf上衣服 杏色 M', '火莲娜 2020夏季新款欧货短款小心机ins短袖t恤女小清新杏色潮宽松韩版bf泫雅mschf上衣服 灰色 M'), 'price' => array('newPrice' => '39.80'), 'choosedInfo' => array('choosedStyle' => array('杏色，M，1个', '灰色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '86%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '151626lhx', 'star' => 5, 'cmtDate' => getBeforeDate(28), 'cmtCnt' => '不得不说  真的是太太太好看啦  集美们冲鸭! 对 微胖的妹子也很友好  真的太喜欢这件衣服啦  给我买它  而且还这平价!!!'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***c', 'star' => 5, 'cmtDate' => getBeforeDate(53), 'cmtCnt' => '上身效果：非常好，舒适程度：很舒适 面料材质：很柔和，上身很好'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '柳慕倾服饰专营店', 'fans' => '1661', 'allGoods' => '1244', 'evaluation' => array('score' => '8.66', 'level' => '低'), 'express' => array('score' => '9.45', 'level' => '高'), 'afterService' => array('score' => '8.81', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(13));

  // id：138
  $id138 = array('topImages' => getTopImages(1, 3), 'currentCategory' => 0, 'title' => array('乍否仔 夏天短袖T恤少女夏装2020年新款初中高中学生韩版宽松Polo衫百搭上衣服 白色 M', '乍否仔 夏天短袖T恤少女夏装2020年新款初中高中学生韩版宽松Polo衫百搭上衣服 蓝色 M'), 'price' => array('newPrice' => '52.00'), 'choosedInfo' => array('choosedStyle' => array('白色，M，1件', '蓝色，M，1件'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '90%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '凌霄非墨', 'star' => 5, 'cmtDate' => getBeforeDate(46), 'cmtCnt' => '面料材质：舒服 上身效果：很合适 款式风格：喜欢的风格'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '158698pwpk', 'star' => 5, 'cmtDate' => getBeforeDate(81), 'cmtCnt' => '上身效果好，款式我很喜欢'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '乍否仔旗舰店', 'fans' => '1492', 'allGoods' => '7520', 'evaluation' => array('score' => '8.73', 'level' => '低'), 'express' => array('score' => '9.35', 'level' => '高'), 'afterService' => array('score' => '9.20', 'level' => '高')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(14));

  // id：139
  $id139 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('女生上衣夏季短袖初中生体血体桖半袖半截袖T恤高中学生新款夏天港风宽松韩版 灰色 M'), 'price' => array('newPrice' => '68.00'), 'choosedInfo' => array('choosedStyle' => array('灰色，M，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '60+', 'evalRate' => '77%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '霸气囡囡', 'star' => 5, 'cmtDate' => getBeforeDate(34), 'cmtCnt' => '太好看了，超级喜欢，很百搭哦！真的很建议大家买，不用犹豫那么多 舒适程度：很舒适 上身效果：淑女可爱清新'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '赖赖虫1216', 'star' => 5, 'cmtDate' => getBeforeDate(41), 'cmtCnt' => '还是在网上自己选的这款衣衣，他比较喜欢这个风格的衣服和鞋帽。嗯，实物收到以后穿着试了一下，嗯，穿上比较舒服。嗯，质量也挺不错的。配短裤裙子，嗯长裤。效果都还好。卖家是第三方发货，发货速度也挺快的，三天就收到了。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '安卡达旗舰店', 'fans' => '1512', 'allGoods' => '7520', 'evaluation' => array('score' => '8.37', 'level' => '低'), 'express' => array('score' => '8.00', 'level' => '低'), 'afterService' => array('score' => '8.31', 'level' => '低')),'guessRecommend' => getDressRecommend(), 'goodsIntroduction' => getGoodsIntroduction(10));

  // id：200
  $id200 = array('topImages' => getTopImages(9), 'currentCategory' => 0, 'title' => array('荣耀MagicBook 14 2020新款 14英寸全面屏轻薄笔记本电脑（R5 4500U 16G 512G 7nm 多屏协同） 冰河银'), 'price' => array('newPrice' => '3799.00', 'oldPrice' => '¥3999.00'), 'choosedInfo' => array('choosedStyle' => array('14英寸，【2020新款】R5 16 512 银，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '2.31kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '预约送货', '部分收货', '自提')), 'commentInfo' => array('cmtCount' => '14万+', 'evalRate' => '94%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '177132abw', 'star' => 5, 'cmtDate' => getBeforeDate(41), 'cmtCnt' => '金属外壳，视觉效果还有手感都相当好。。A面十分简洁，仅有honor的字样，整体非常协调而且时尚,在屏幕的设计上采用了超窄边框，左右边框的宽度仅有5.2mm屏占比达到了81%,并且带有过滤蓝光护眼模式，看上去屏幕视野大，也更加适合长时间办公使用,支持180°平铺,整机尺寸方面，机身厚度最厚处仅为15.8mm，轻至1.45kg(实测)，这对于一个14英寸金属机身的笔记本来说，已经算是非常轻薄的了，笔记本的电源适配器也采用了瘦身设计，白色的外观，双向Type-C接口，全部重量也仅为1.65kg，随身携带出门能够满足各种移动场景的使用,带有3级可调背光的全尺寸键盘，1.3mm的键程，手感也不错，F10功能键还设置了内置的“电脑管家”一启动按键，随时都能检测电脑硬件的状态以及更新硬件驱动，而“电脑管家”还可以与你的荣耀手机相连接，可以备份互传数据，还能实现手机离开电脑一定距离、时间之后自动锁屏，保护个人隐私,荣耀MagicBook还带有电源、指纹二合一的按键，在登录系统时无需繁琐输入密码，而且指纹解锁的速度也很快，这也是'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***A', 'star' => 5, 'cmtDate' => getBeforeDate(45), 'cmtCnt' => '大小很和我意，单手托，想知道相对大小可以和后面的单人座椅靠背对比一下; 按照提示安装系统容易操作; 机子很漂亮，很时尚。运行速度很快，不卡顿，也散热不错。过一段时间再来追评。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '荣耀自营旗舰店', 'fans' => '3241万', 'allGoods' => '658'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.jpg'));

  // id：201
  $id201 = array('topImages' => getTopImages(9), 'currentCategory' => 0, 'title' => array('橙影智能摄影机运动相机 口袋云台vlog相机 三轴云台防抖 智能追踪 一键成片'), 'price' => array('newPrice' => '2599.00'), 'choosedInfo' => array('choosedStyle' => array('玄晶黑，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.71kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '预约送货', '部分收货', '自提')), 'commentInfo' => array('cmtCount' => '1700+', 'evalRate' => '97%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '_空白键_', 'star' => 5, 'cmtDate' => getBeforeDate(14), 'cmtCnt' => '快递迅捷，包装完好！已经用了十来天了，总体而言性价比算是超高了！产品首先是做工和外观，很优质了，包括送的支架和三角架，都很棒！主要说一下云台，功能和质量都能经得住考验的，防抖效果很好，画质也优秀，操作简单方便人性化，尤其最大的亮点是万向键和广角镜头，绝对的强者！实打实的评价，实名的，照片和视频为实物拍摄，视频是2k60帧原画没加任何滤镜，见问问里有人说人都看不清这种情况很让人费解，不知道是不是人的问题呵呵....总体好评，就是希望能多出配件，比如镜头钢化膜等！也欢迎网友交流，收获共享等！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'z***桔', 'star' => 5, 'cmtDate' => getBeforeDate(75), 'cmtCnt' => '好多年没有入手这么震惊的产品了！！！橙影小到可以放到手掌里，说他小却有极大的屏幕，相比之前买的微型摄影机实时预览效果简直好了太多。。。当然买他最终要的更在于它的防抖功能也是无可挑剔，到手后立马拍摄了端户外跑步短视频，防抖效果棒棒的！！！另外他的一键成片功能也太强大了，竟然根据我的视频长短自动生成片子，每次都不同，只是有多大的模板库，爱了，爱了。已经种草给我的朋友们啦啦啦啦啦~~~~~~~~~~'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '橙影（Morange）自营旗舰店', 'fans' => '11万', 'allGoods' => '5'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(11, '.jpg'));

  // id：202
  $id202 = array('topImages' => getTopImages(8), 'currentCategory' => 0, 'title' => array('大眼橙H1 小黄人 投影仪 投影机家用 投影仪便携 投影电视（1080P高清 遮挡息屏）'), 'price' => array('newPrice' => '2599.00'), 'choosedInfo' => array('choosedStyle' => array('H1小黄人【护眼便携 环球联名】，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '2.6kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '免举证退换货', '预约送货')), 'commentInfo' => array('cmtCount' => '1400+', 'evalRate' => '98%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '负距离0826', 'star' => 5, 'cmtDate' => getBeforeDate(46), 'cmtCnt' => '外形外观：萌萌的非常可爱，拿到手上很有feel，一眼就爱上了
  投影亮度：一般我都喜欢拉上窗帘，不拉窗帘的话肯定会有影响，，两千多的东西要什么自行车啊！
  投影色彩：色彩非常棒，比较细腻，看1080p还是非常清晰的，动画也没有拖影现象，不错！
  音质音效：音效出乎想象了，这么小的东东竟然还动次打次的，可以可以！
  操作难易：操作简单，支持侧投这个功能非常nice，手动调校梯形校正，哪里不正调哪里！
  其他特色：语音功能很好，好像连接小京鱼APP还能当做智能音箱，慢慢研究吧。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '史***实', 'star' => 5, 'cmtDate' => getBeforeDate(62), 'cmtCnt' => '之前买了天猫魔屏最贵的那款U1，活动价3399，买回来调试了一整天，问题超级多，华为手机连不上，画质不清晰、画面卡的厉害，找售后也无法解决，一气之下就退了，后来无意中看到京东这款小黄人定制款，立马被它萌萌的外观吸引了，想着买回来试试，物流特别给力第二天就收到了，满心欢喜的试用，真的太超乎我的想象了，实物超级好看，定制款的礼盒，拎着就可以走，小黄人质感很好，小巧轻便，还送了底座，就连遥控器也是萌萌的，机器操作超级简单，苹果华为手机和iPad通通没有问题，画质清晰色彩艳丽，白天在家里看也非常OK，真的太太太喜欢了，期待早点收到小黄人的衣服😎第一次买东西写这么多评价，真心推荐这款👻'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '大眼橙投影自营旗舰店', 'fans' => '106万', 'allGoods' => '17'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(8, '.jpg'));

  // id：203
  $id203 = array('topImages' => getTopImages(7), 'currentCategory' => 0, 'title' => array('格力（GREE）3匹 I享 变频冷暖 自洁 智能 圆柱客厅空调立式柜机 KFR-72LW/(72580)FNhAa-A3（WiFi）线下同款'), 'price' => array('newPrice' => '6999.00'), 'choosedInfo' => array('choosedStyle' => array('3匹，♥三级变频♥线下同款I享，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '不计重量', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '预约送货', '货到付款')), 'commentInfo' => array('cmtCount' => '1.9万+', 'evalRate' => '98%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'aaaccee', 'star' => 5, 'cmtDate' => getBeforeDate(23), 'cmtCnt' => '外形外观：格力空调设计的外观都非常漂亮，线条清晰，棱角分明，圆润圆润
  冷暖效果：制冷效果很好，客厅开完以后五分钟就能制冷了，很快，特别是开超强模式
  静音效果：空调开启的声音不大，特别是打开睡眠模式以后，基本上没有什么声音开最大风的时候，声音都比风扇的声音小
  节能省电：感觉不是很觉得，因为这款是三级能耗的，听说平均一个星期要多六毛钱
  产品特色：格力空调设计非常有特色，看起来就觉得很清爽，线条棱角圆润分明清晰
  送货安装：送货和安装速度很快，老板上完很专业，就是产品外包装太多，泡沫和纸箱了，够环保'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '138275nfn', 'star' => 5, 'cmtDate' => getBeforeDate(31), 'cmtCnt' => '外形外观：包装外形结实，圆筒柜式机美观大方。
  冷暖效果：制冷效果很好，散热快速。
  静音效果：主机声音较小，比较温和。
  节能省电：节能相比其它机要好。
  产品特色：产品雪白赐透。
  送货安装：送货迅速及时，服务到家。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '格力自营旗舰店', 'fans' => '1307万', 'allGoods' => '102'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.jpg'));

  // id：204
  $id204 = array('topImages' => getTopImages(3), 'currentCategory' => 0, 'title' => array('索尼（SONY）ZV-1 Vlog数码相机 手柄电池套装（ZV1） 4K视频/美肤拍摄/强悍对焦'), 'price' => array('newPrice' => '5999.00'), 'choosedInfo' => array('choosedStyle' => array('【新品推荐】ZV-1，Vlog套装，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '1kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '部分收货')), 'commentInfo' => array('cmtCount' => '1400+', 'evalRate' => '89%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '清***2', 'star' => 5, 'cmtDate' => getBeforeDate(43), 'cmtCnt' => '索尼ZV-1外形时尚简洁，手感扎实，一台便于携带的vlog数码相机，蓝牙连接手柄实用，视频拍摄效果好，可拍摄4K视频，1.8大光圈很给力，对焦速度快，自带美颜效果，侧翻屏设计很方便，还赠送了存储卡和单肩包，非常满意。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'echo530msw', 'star' => 5, 'cmtDate' => getBeforeDate(46), 'cmtCnt' => '轻便程度：非常轻，携带方便
  反应速度：对焦优秀
  测试拍了一下视频和照片，被诟病的焦段问题对我来说还好，毕竟不自拍。slog和cine模式都很好用，色调后期更好调整了，出门拍摄vlog也能动静小一些了，解放肩膀终于可以不用扛微单和定焦镜头了。视频和后四图都是zv1拍摄，总体效果还是满意的。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => 'SONY自营官方旗舰店', 'fans' => '366万', 'allGoods' => '602'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.jpg'));

  // id：205
  $id205 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('科沃斯 Ecovacs 地宝T8 Power扫地机器人激光导航规划全自动扫拖擦拖地机智能家用吸尘器DLX11-22'), 'price' => array('newPrice' => '3399.00'), 'choosedInfo' => array('choosedStyle' => array('T8 Power新品震动擦地，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '6.7kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '包邮')), 'commentInfo' => array('cmtCount' => '1.9万+', 'evalRate' => '98%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 's***1', 'star' => 5, 'cmtDate' => getBeforeDate(13), 'cmtCnt' => '仿佛家里又多了一个勤劳的家庭成员，外形很简洁时尚，比想象中大一点。声音开的强效吸力也还可以接受，吸力不错，早晚清扫一次，地板就能保持干净。新增的震动擦地功能，使擦地效果更好。出水量分三档，梅雨天不至于地面太潮湿。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '周***0', 'star' => 5, 'cmtDate' => getBeforeDate(18), 'cmtCnt' => '白色面黑色底，样子非常时尚可爱。今天第一次用，试用扫地功能，灰尘都吸干净了，地毯丶门槛都能轻松的越过，扫地毯时机器工作的声音比较响，平地上声音和顺，也不响。非常好！喜欢    还送了小京鱼音响'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.gif'), 'shopName' => '科沃斯自营旗舰店', 'fans' => '398万', 'allGoods' => '56'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.webp'));

  // id：206
  $id206 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('乐得（ledetech） 手机支架桌面ipad平板电脑架子学生IEnglish在线学习辅导204D 黑色'), 'price' => array('newPrice' => '89.00'), 'choosedInfo' => array('choosedStyle' => array('黑色，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '211限时达', '送运费险', '极速审核会', '30天保价')), 'commentInfo' => array('cmtCount' => '3.6万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '布丁', 'star' => 5, 'cmtDate' => getBeforeDate(83), 'cmtCnt' => '支架很好用。特别有分量拿在手里沉甸甸的，包装很结实，在原有的包装盒外面又加了一个外盒。收到就拿出来给孩子用了，横屏，竖屏都可以的。特别方面，适合孩子的高度，再也不不用低着头看了。就是杆有点短了。长的可能会更好用。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '于思涵妈妈', 'star' => 5, 'cmtDate' => getBeforeDate(106), 'cmtCnt' => '用了好久了，才想起来评价！这款支架做工非常好，还有自带的隐藏小螺丝刀，使用很方便！比较适合IPAD，手机的哈要是想平放录点啥有点挡镜头！不过这毕竟是个支架的功能，是自己要求太高而已！总之百分之百满意，孩子上课用，我开会用都很方便'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '乐得官方旗舰店', 'fans' => '7.1万', 'allGoods' => '71'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.webp'));

  // id：207
  $id207 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('腾讯黑鲨游戏手机3 Pro 8GB+256GB 幻影黑 升降游戏按键 65W极速闪充 骁龙865 2K+分辨率 10.7亿色 双模5G'), 'price' => array('newPrice' => '4699.00'), 'choosedInfo' => array('choosedStyle' => array('幻影黑，8GB+256GB，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '可配送港澳台及海外')), 'commentInfo' => array('cmtCount' => '1.3万+', 'evalRate' => '94%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '叶逝秋', 'star' => 5, 'cmtDate' => getBeforeDate(77), 'cmtCnt' => '外形外观：帅。。太奈斯了。。一直也想要一个7+的大屏幕手机打游戏。。就是黑鲨3Pro没错了。。
  屏幕音效：不太懂 反正 2K大屏  舒服。。90帧玩儿吃鸡真的爽，流畅的一比。。手比较大 操作起来也方便很多。
  拍照效果：不看重这个  感觉还行吧。。略，削弱一些降价就更爽了。
  运行速度：快 飞快。。之前的note8基本退休成休闲机了，
  打游戏专用。。
  待机时间：很长。大容量。。充电也飞快。。。
  其他特色：
  游戏模式值得一提，游戏空间对应了黑鲨在游戏手机方面下的功夫，可以说是非常贴近玩家心理了。
  专注于游戏，专心到游戏。。
  自带的黑鲨时刻录屏让自己回顾精彩操作哈哈哈哈；
  语音助手无感；
  侧肩按键不错，很喜欢用；
  压感在日常使用上用处也比较多，游戏上暂时还不怎么习惯，对于游戏提升也很大；
  双wifi稳定提速更安逸；
  第一次使用miui系列，整体体验还可以，希望继续优化提升。。'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '昵沫沫', 'star' => 5, 'cmtDate' => getBeforeDate(100), 'cmtCnt' => '外形外观：外观设计很不错，后面的灯光效果很好，打游戏特别棒
  屏幕音效：屏幕画质很好，双扬声器立体声也很棒
  待机时间：电池容量很大，掉电也很慢，充电速度不是一般的快
  运行速度：12G的运存不是摆设 ，运行大型游戏很流畅
  其他特色：自己买了一个磁吸充电线，很棒'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '黑鲨自营官方旗舰店', 'fans' => '580万', 'allGoods' => '74'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(9, '.jpg'));

  // id：208
  $id208 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('德业（Deye）除湿机/抽湿机 除湿量12升/天 静音38分贝 家用静音吸湿器地下室干衣净化 DYD-E12A3'), 'price' => array('newPrice' => '599.00', 'oldPrice' => '¥799.00'), 'choosedInfo' => array('choosedStyle' => array('超10万评价爆款，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '12.14kg', 'services' => array('商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '部分收货', '自提')), 'commentInfo' => array('cmtCount' => '16万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'i***r', 'star' => 5, 'cmtDate' => getBeforeDate(0), 'cmtCnt' => '除湿效果：非常明显，武汉五月一天一满桶水；
  水箱容量：较大；
  工作音量：不大，对比多款产品评价视频，这个算小的
  虽然没有负离子功能，但是除湿效果很明显，噪音小，提手扎实方便很满意。
  操作难易：很简单，显示屏一目了然；
  其他特色：提手很扎实趁手，做工不错。'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '頑***一', 'star' => 5, 'cmtDate' => getBeforeDate(33), 'cmtCnt' => '身处四川盆地，湿气特别的重，尤其是夏天，梅雨季节就更不用说了，被子都是湿润的。朋友给我说，让我买一个除湿机，隔三差五的可以抽一下，有效果的。然后我就在网上各种牌子的都看了一下，比较了一圈，最后买了这款德业除湿机。收到后，根据使用手册提示，让机器静止了2个多小时，让后开机使用，效果不错，第一次用，运行了6个小时，抽了差不多一箱水，真的是不用不知道，一用吓一跳，没想到房间的湿度那么大！隔了一天，又用了6小时，又抽了一箱水，湿气这么重，难怪身体会不舒服。这款抽湿机真的不错，工作音量小，除湿效果好，性价比很高，推荐大家购买！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '德业自营旗舰店', 'fans' => '64万', 'allGoods' => '15'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.webp'));

  // id：209
  $id209 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('添可(TINECO)无线智能洗地机芙万家用吸尘拖地一体清洗清洁机器【科沃斯集团出品】'), 'price' => array('newPrice' => '3590.00', 'oldPrice' => '¥3899.00'), 'choosedInfo' => array('choosedStyle' => array('【洗地机NO.1】FLOOR ONE，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '不计重量', 'services' => array('厂商发货配送', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '5500+', 'evalRate' => '98%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '吉珥儿', 'star' => 5, 'cmtDate' => getBeforeDate(35), 'cmtCnt' => '种草这款拖地机很久了，刚好邻居宝妈分享使用感受，趁活动赶紧入手一台。简直太好用了，吸拖一次完成，地面非常干净，以前擦完地，孩子玩完脚底板都是灰色的，现在脚底板基本白白的。自清洁功能也非常赞，不用自己洗滚轮，滤网也是可以水洗的，最重要是功能强大，又一次竟然把孩子的玻璃球也吸进去了。噪音比一般的吸尘器小太多了，唯一一点是目前还不能伸到高脚的床，或者沙发底下，稍有遗憾。但整体使用感受五星，家里的机器人已经被闲置了，真心推荐，真的太好用了。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '哦***嘿', 'star' => 5, 'cmtDate' => getBeforeDate(47), 'cmtCnt' => '包装的特别严实吸力强劲，而且毫不费力，它会自动向前拖着你走，很省力啊，而且清洁的很干净，语音提示也不用担心不会操作，充电很快，太满意了。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.gif'), 'shopName' => '添可自营旗舰店', 'fans' => '10万', 'allGoods' => '19'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(8, '.webp'));

  // id：210
  $id210 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('华帝（VATTI）i11135 烟灶套装 侧吸式抽油烟机升级4.5KW燃气灶具套装 21大吸力自动清洗(天然气)'), 'price' => array('newPrice' => '3299.00'), 'choosedInfo' => array('choosedStyle' => array('油烟机4.5KW天然气灶具套装，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '不计重量', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '30-30-180', '安心服务', '预约送货')), 'commentInfo' => array('cmtCount' => '1.5万+', 'evalRate' => '97%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '思达高', 'star' => 5, 'cmtDate' => getBeforeDate(65), 'cmtCnt' => '抽油烟很快抽风很狠，有烟抽得很干净。没有买错，智能挥手也很灵敏。很方便实用。家里父母一教就会。颜值很高。声音还好能接受不算很大。华帝信得过，之前老家也是用这个牌子。换房了又买一个。'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '你哭我就揍你爹', 'star' => 5, 'cmtDate' => getBeforeDate(93), 'cmtCnt' => '外形外观：全黑色，跟厨房的整体白色搭起来，完美的黑白配，不要太漂亮哈哈。尤其是带个时钟，实在太方便了。为了不让它粘油烟，便于今后清洁，表面我贴了层保鲜膜。
  排烟效果：排烟没得说，风力强劲，非常厉害，试了下，爆炒模式下，油烟瞬间吸走。
  静音效果：声音还不错，不会特别吵。关机时排烟档板闭合时，到一半还会暂停同时发出滴滴的提示音后才会继续关闭，很人性化。
  噪音程度：声音还行，能接受
  清洗难度：家里装修，刚买的新的，这个还不好评价，但它有自动清洁功能，而且自动清洁时还会自动锁定防止误操作，这点也很智能。
  物流速度：物流非常的快，双11买的。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '华帝自营旗舰店', 'fans' => '147万', 'allGoods' => '433'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(8, '.webp'));

  // id：211
  $id211 = array('topImages' => getTopImages(7), 'currentCategory' => 0, 'title' => array('欧井（Eurgeen）除湿机/抽湿机 除湿量50升/天 适用150平方米 别墅地下室家用工业净化吸湿器OJ-550EP'), 'price' => array('newPrice' => '2089.00', 'oldPrice' => '¥2399.00'), 'choosedInfo' => array('choosedStyle' => array('全屋型除湿 快速高效，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '28.4kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '安心服务', '30-30-180')), 'commentInfo' => array('cmtCount' => '3.3万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '平***3', 'star' => 5, 'cmtDate' => getBeforeDate(25), 'cmtCnt' => '除湿机外观造型大气上档次，配有轮子可以推着走，非常方便，家里靠海所以买了50L的这一款，昨天试用一下，开机操作都很简单，数值显示和设置都很容易操作，工作音量不是很大，可以接受。抽湿能力非常强大，一下子就可以从水箱中看到抽的水气，水箱容量大，还可以从后面接配好的管子排水，非常满意，值得购买！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***2', 'star' => 5, 'cmtDate' => getBeforeDate(39), 'cmtCnt' => '除湿器外观好看，高大上。50升的机器下面有滑轮，移动起来很方便轻巧，不是太重。除湿效果很好，放在一楼30分钟，湿度下降很快，一下子到73。面板操作简单，方便。水箱容量很大。机器声音不太响。非常好，值得拥有。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '欧井自营旗舰店', 'fans' => '53万', 'allGoods' => '15'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.webp'));

  // id：212
  $id212 = array('topImages' => getTopImages(7), 'currentCategory' => 0, 'title' => array('飞利浦 65英寸 4K全面屏 HDR 独立音腔 APP智能语音 2级能效 京品家电 网络液晶电视65PUF7294/T3'), 'price' => array('newPrice' => '2699.00'), 'choosedInfo' => array('choosedStyle' => array('65英寸 全面屏【爆款】，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '不计重量', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '送货入户', '配送延迟补贴', '预约送货')), 'commentInfo' => array('cmtCount' => '3.9万+', 'evalRate' => '98%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '135996rfp', 'star' => 5, 'cmtDate' => getBeforeDate(45), 'cmtCnt' => '五一期间、精挑细选之后买了这款电视、简约时尚、开机后色彩艳丽、运行流畅速度快、音郊也很好。我买了55寸新品、活动赠音箱语音操作简单、小孩特喜欢、内存也大4K清晰度高、服务好安装师傅态度好、大品牌值得信赖。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***0', 'star' => 5, 'cmtDate' => getBeforeDate(79), 'cmtCnt' => '外形外观：全屏膜，大气
  运行速度：快
  屏幕音效：屏幕清晰、音质好
  尺寸大小：65吋正好
  安装同步：安装及时，服务态度非常好
  功能效果：功能强大，效果理想'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.gif'), 'shopName' => '飞利浦电视自营旗舰店', 'fans' => '559万', 'allGoods' => '57'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.jpg'));

  // id：213
  $id213 = array('topImages' => getTopImages(4), 'currentCategory' => 0, 'title' => array('华为 HUAWEI P30 Pro 超感光徕卡四摄10倍混合变焦麒麟980芯片屏内指纹 8GB+128GB亮黑色预售版'), 'price' => array('newPrice' => '3488.00'), 'choosedInfo' => array('choosedStyle' => array('亮黑色，8GB+128GB，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.53kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '预约送货', '部分收货', '自提')), 'commentInfo' => array('cmtCount' => '18万+', 'evalRate' => '97%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '难***8', 'star' => 5, 'cmtDate' => getBeforeDate(28), 'cmtCnt' => '屏幕是曲面屏幕，京东之家直播间，看着很有画面感，手感也好，大小合适，不宽但是不小，功能也好，运行快，玩游戏不卡盾，画面清晰，像素很好！总之非常满意！摄像方面，该手机搭载了4个摄像头，满足摄影发烧友的任何需求；搭载麒麟980处理器，标配8GB运行内存。麒麟980芯片不仅性能、能效双幅提升，双核NPU更让AI算力飙升，支持更多超乎想象的AI应用场景；续航方面，华为P30 Pro内置4200mAh的大容量电池，为长续航提供了最重要的保证。支持无线快充和反向充电，有线充电配备40W快充，足有目前主流快充技术的两倍有多；之前一直用的苹果手机，除了拍照，我想说说其他的点，第一是我以前都不敢尝试其他牌子的手机，是怕其他手机会卡顿，不流畅。很多身边朋友说不会的你可以尝试一下，现在用了几天，真的想说真香啊，根本不会存在卡。第二是电池真大啊，曲屏给你带来的立体感只有你体验了才知道有多么的爽。'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '摇***事', 'star' => 5, 'cmtDate' => getBeforeDate(71), 'cmtCnt' => '外形外观：手机很大，我很喜欢屏幕，很顺滑，色彩也很漂亮。
  屏幕音效：耳机音效很好
  拍照效果：最后两张是用新手机拍的原图
  运行速度：反应很快
  待机时间：一天玩几小时的话需要一天充一次，充电器是真的快，一会就充满了
  其他特色：很适合女生使用，在主题商店买的字体和铃声很喜欢，自己设置的主题也很可爱，总之很喜欢，用着心情也好了。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '华为自营官方旗舰店', 'fans' => '3929万', 'allGoods' => '783'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(2, '.webp'));

  // id：214
  $id214 = array('topImages' => getTopImages(4), 'currentCategory' => 0, 'title' => array('魔蛋 （magicforce） 数字小键盘 数字键盘 迷你键盘 有线键盘 防窥键盘 密码数字键盘'), 'price' => array('newPrice' => '34.90'), 'choosedInfo' => array('choosedStyle' => array('有线版【防偷窥】，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.205kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '自提')), 'commentInfo' => array('cmtCount' => '2200+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'c***s', 'star' => 5, 'cmtDate' => getBeforeDate(21), 'cmtCnt' => '发货很快、第一天买第二天就到、送货到家、真是太方便了！价格还是比较实惠的，轻巧方便，输密码的时候也是很方便的，整体来说的时候是不错的，这个键盘的话整体是舒适耐用，希望喜欢这款的朋友不要错过，性价比真的挺不错的，强烈推荐。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '137642jvb', 'star' => 5, 'cmtDate' => getBeforeDate(43), 'cmtCnt' => '有防窥功能的键盘，使用更安全放心！！按键很舒适，不错推荐！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '魔蛋自营旗舰店', 'fans' => '2.2万', 'allGoods' => '25'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.jpg'));

  // id：215
  $id215 = array('topImages' => getTopImages(4), 'currentCategory' => 0, 'title' => array('未来人类 Terrans Force X511 15.6英寸笔记本(i7-10750H 32G 512G PCIe SSD+1T HDD RTX 2060)'), 'price' => array('newPrice' => '11599.00'), 'choosedInfo' => array('choosedStyle' => array('[10系i7标压]10750H，32G 512G PCIe+1T RTX 2060，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '4.6kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '预约送货', '部分收货', '可配送港澳台')), 'commentInfo' => array('cmtCount' => '50+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'wngfchl', 'star' => 5, 'cmtDate' => getBeforeDate(33), 'cmtCnt' => '包装保护：很棒，多层包装，防震海绵
  外形外观：很有科技感，A年硕大的logo，溜得很，键盘跑马灯炫酷
  画面品质：1080P的屏幕，LG生产，显示效果很细腻
  跑分评测：娱乐大师跑分46W多，还算可以
  运行速度：杠杠的，基本不卡顿
  游戏效果：CSGO训练赛200帧左右，其他游戏未测试
  其他: 目前遇到的问题，有线网卡适配器默认本地连接2不知道什么情况，好像显卡混合模式风扇一直转啊转的，'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => 'Super丶神話', 'star' => 5, 'cmtDate' => getBeforeDate(44), 'cmtCnt' => '包装保护：双重包装，泡沫支架，不担心电脑到手后有损坏
  运行速度：运行速度超快，游戏效果好，无卡顿
  跑分评测：鲁大师52万评分，检测安全正常
  外形外观：外观精美，炫彩键盘，大气图标
  客服态度：态度很好，很难心，帮助我解决一些问题。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '未来人类游戏本自营旗舰店', 'fans' => '4.0万', 'allGoods' => '19'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.webp'));

  // id：216
  $id216 = array('topImages' => getTopImages(4), 'currentCategory' => 0, 'title' => array('佳明（GARMIN）智能手表 Fenix6X Pro户外GPS心率血氧游泳骑行登山跑步智能运动太阳能充电手表'), 'price' => array('newPrice' => '9660.00'), 'choosedInfo' => array('choosedStyle' => array('Fenix 6X Pro太阳能版钛合金，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '不计重量', 'services' => array('厂商发货配送', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'chinal653', 'star' => 5, 'cmtDate' => getBeforeDate(61), 'cmtCnt' => '续航能力：再用用看
  舒适程度：舒服
  准确性：准的很
  做工质量：精致耐看
  操作难易：容易上手
  外形外观：很酷'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '习惯性看美女', 'star' => 5, 'cmtDate' => getBeforeDate(74), 'cmtCnt' => '主要功能：功能强大，表面很大。看起来很个性。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.gif'), 'shopName' => '佳明（GARMIN）智能自营旗舰店', 'fans' => '14万', 'allGoods' => '89'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.jpg'));

  // id：217
  $id217 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('索尼（SONY）Alpha 6100 APS-C画幅微单数码相机 标准镜头套装 Vlog自拍视频 白色(A6100L/ILCE-6100L)'), 'price' => array('newPrice' => '4999.00'), 'choosedInfo' => array('choosedStyle' => array('白色，标准标准（1650镜头），1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.74kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '部分收货')), 'commentInfo' => array('cmtCount' => '2900+', 'evalRate' => '92%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'H***7', 'star' => 5, 'cmtDate' => getBeforeDate(46), 'cmtCnt' => '拿到手的那一瞬大爱了，白色一直是想买的，本来看黑色也不错，但是还是挑了黑色。物流很快速，第二天就到了。迫不及待开箱，颜值在线。初步试验了一下，成像很不错，很多功能要再研究，期待有了这部6100以后多出游多拍照'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'ooGOALoo', 'star' => 5, 'cmtDate' => getBeforeDate(54), 'cmtCnt' => '产品包装：包装完好，但是有点感觉包装有点单薄，这种精密的产品最好再严实点最好
  外形外观：非常好看，颜值很高
  成像效果：拍摄效果很好，特意试了试夜间效果，感光效果也很好，相比手机夜间成像效果非常
  反应速度：很快，索尼没得说
  便携性能：微单嘛，很轻便才300多克，也很小巧，携带起来比单反方便
  其他特色：传手机啊等操作都很nice，性价比非常高'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => 'SONY自营官方旗舰店', 'fans' => '366万', 'allGoods' => '602'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.jpg'));

  // id：218
  $id218 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('步步高家教机S5 4G+128G 11英寸  AI智慧眼 安全护眼 学习机学生平板电脑 英语点读机早教机 小学初中高中'), 'price' => array('newPrice' => '4388.00'), 'choosedInfo' => array('choosedStyle' => array('【S5 128G+百科全书】，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '1.065kg', 'services' => array('99元免基础运费', '商家发货&售后', '15天无理由退货', '211限时达', '预约送货', '部分收货')), 'commentInfo' => array('cmtCount' => '5.5万+', 'evalRate' => '97%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '5***u', 'star' => 5, 'cmtDate' => getBeforeDate(14), 'cmtCnt' => '步步高的老用户了，教学资源很丰富，之前的H8一直在手，运行速度跟不上了。一直在看步步高的产品，特别是这一款S5，融合语音智能，说到也能做到，不错，智慧眼是很大的亮点，有问必答。这款产品薄（机身轻薄）、大（屏幕大）、精（做工细）、深（从幼儿到高中学科都有），孩子很是喜欢。运行速度很快，相当流畅。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '150754ust', 'star' => 5, 'cmtDate' => getBeforeDate(37), 'cmtCnt' => '这个家教机开箱真的惊艳到我了，绿色显得很大气，护眼功能很强大，有近距离提醒，屏幕非常清晰，刚刚搜了几道题，都是原题，可以直接放入错题本里。大致翻了一下，教学视频都是免费的。其他功能再慢慢了解。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.gif'), 'shopName' => '步步高电教自营旗舰店', 'fans' => '82万', 'allGoods' => '21'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.webp'));

  // id：219
  $id219 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('小米平衡车 定制版Ninebot 九号平衡车 智能电动体感车（白）'), 'price' => array('newPrice' => '1999.00'), 'choosedInfo' => array('choosedStyle' => array('【小米平衡车】标准版 白色，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '15.9kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '自提')), 'commentInfo' => array('cmtCount' => '25万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'ls8210', 'star' => 5, 'cmtDate' => getBeforeDate(12), 'cmtCnt' => '步步高的老用户了，教学资源很丰富，之前的H8一直在手，运行速度跟不上了。一直在看步步高的产品，特别是这一款S5，融合语音智能，说到也能做到，不错，智慧眼是很大的亮点，有问必答。这款产品薄（机身轻薄）、大（屏幕大）、精（做工细）、深（从幼儿到高中学科都有），孩子很是喜欢。运行速度很快，相当流畅。1、快递十分给力，我是快中午才拍下的。下午快五点就送到家了，我还在下班的路上，就老婆自己在家，因为拿不动，快递小哥给送到家门口。好评！
  2、回家后拆箱，包装完整一点磕碰都没有。外表没有被拆过的痕迹。感觉不错哦。
  3、组装比较简单，一共就六个螺丝就可以上路了。还有些小配件没有安装，轮胎气压也正常，不用补气。随包装带了一条充气转接口不过还没用呢，看起来质量还可以。
  4、按照说明书开机下载app注册按照软件提示一步步操作就可以了。随机赠送了一份意外险，填写信息领取生效即可。
  5、骑行，我一次也没有玩过。尝试了五分钟多就完全达到上路水平。也许是上手能力还凑合吧！不过视频里是我快五岁的儿子。他也能骑哦！
  6、价格，现在看来是便宜了点。希望双十一能够保值吧！
  7、最后质量问题就得时间来考验了。现在用起来没什么问题。用一段时间后我再追评吧！'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => 'l***5', 'star' => 5, 'cmtDate' => getBeforeDate(33), 'cmtCnt' => '前几天儿子玩儿了下邻居的小米，爱不释手，不舍得回家，老父亲得知后怒下订单满足孩子对快乐童年的向往。包装是很明显的小米风格，紧实精致，各个部位做工一流，app里的新手模式很好的辅助玩家适应这个新奇的小玩意儿，还附赠了意外保险，玩的时候更让玩家安心。还买了个性车贴，等到货就去打造一款独一无二的平衡车。很满意，孩子很喜欢。哈哈哈，突然间又想买卡丁车套件了怎么办！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.gif'), 'shopName' => '小米自营旗舰店', 'fans' => '3522万', 'allGoods' => '1142'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.jpg'));

  // id：220
  $id220 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('小米（MI） 滑板车成人米家电动滑板自行车可折叠男女代驾通用两轮电动平衡车踏板车代步车 米家电动滑板车-白色'), 'price' => array('newPrice' => '1949.00'), 'choosedInfo' => array('choosedStyle' => array('米家电动滑板车-白色，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货', '闪电退款', '极速审核', '预约送货', '自提')), 'commentInfo' => array('cmtCount' => '600+', 'evalRate' => '90%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'D执念太深', 'star' => 5, 'cmtDate' => getBeforeDate(52), 'cmtCnt' => '灵敏度：不错，很灵敏
  稳定性：没有摇摇晃晃的
  安装难易：安装简单
  做工质量：质量非常好
  外形外观：好看，很漂亮，我喜欢
  其他特色：重'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '135703waw', 'star' => 5, 'cmtDate' => getBeforeDate(103), 'cmtCnt' => '灵敏度：👌
  安装难易：简单
  外形外观：比我想象的好看，高颜值
  做工质量：全车磨砂面
  其他特色：灯很亮'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '小米爆米花专卖店', 'fans' => '33万', 'allGoods' => '646'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.webp'));

  // id：221
  $id221 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('臻迪（PowerVision）小海鳐水下无人机 4K镜头水下拍摄水下巡检潜水娱乐海钓机器人水下探险 大师版'), 'price' => array('newPrice' => '6999.00'), 'choosedInfo' => array('choosedStyle' => array('大师版，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '12.3kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '自提')), 'commentInfo' => array('cmtCount' => '100+', 'evalRate' => '95%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***w', 'star' => 5, 'cmtDate' => getBeforeDate(22), 'cmtCnt' => '本人海钓爱好者，钓鱼十来年，第一次听说有这么个小玩意儿，毫不犹豫就下手了，本人主要说3点，第一他可以拴住鱼饵到达指定位置再落饵，提高钓鱼效率，第二他可以用声呐探鱼，准群发现鱼的深度和位置，甚至大小也能实时传输回来，第三可以拍摄鱼咬钩的全过程，这一点完全颠覆了我钓鱼的世界观，怎么说呢，大大增加了我这样老同志的钓鱼乐趣吧，感觉挺好玩的，有条件的钓友们可以入手，非常拉风'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***3', 'star' => 5, 'cmtDate' => getBeforeDate(53), 'cmtCnt' => '拆开看了一下   高大尚的感觉   还配备了一个拉杆包   便于外出   挑了很久买了这款   很不错的选择'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '臻迪自营官方旗舰店', 'fans' => '1050', 'allGoods' => '8'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.webp'));

  // id：222
  $id222 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('大疆（DJI） DJI 大疆 机甲大师 RoboMaster S1 专业教育机器人 智能可编程 RoboMaster 机甲大师 标配'), 'price' => array('newPrice' => '3499.00'), 'choosedInfo' => array('choosedStyle' => array('RoboMaster 机甲大师 标配，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '在线支付免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '200+', 'evalRate' => '100%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '151909pvt', 'star' => 5, 'cmtDate' => getBeforeDate(37), 'cmtCnt' => '发货速度很快，很愉快的一次购物，儿子很喜欢，我也能玩，让儿子能在玩耍的过程中接触编程，提高他的罗技思维能力'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'c***m', 'star' => 5, 'cmtDate' => getBeforeDate(63), 'cmtCnt' => '因为一些难以言表的意外，机甲大师辗转几次终于送到，非常感谢客服多次耐心协调，店家非常令人满意和感动的态度，展现了大公司的胸怀和客户至上的经营理念。货物做工非常精细，希望给孩子带来快乐的假期和工程师的启蒙。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '大疆大智无疆专卖店', 'fans' => '5.2万', 'allGoods' => '319'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.webp'));

  // id：223
  $id223 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('SUNNIQ 智能摄像眼镜1080P微型录音录像拍照会议户外运动高清可换近视镜片高清直播无线监控 工作版 标配无内存'), 'price' => array('newPrice' => '399.00'), 'choosedInfo' => array('choosedStyle' => array('工作版，标配无内存，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'postage' => '免运费', 'services' => array('商家发货&售后', '7天无理由退货')), 'commentInfo' => array('cmtCount' => '300+', 'evalRate' => '89%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '梧桐宇1978', 'star' => 5, 'cmtDate' => getBeforeDate(14), 'cmtCnt' => '镜头真的不易被发现，除非别人用过此产品，图像质量还可以，感觉像315晚会专案组用的。除非坐着拍摄，走路带着图像会比较抖动，真有当侦探的感觉，觉得挺好玩的，商家服务也很周到，值得购买'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'y***2', 'star' => 5, 'cmtDate' => getBeforeDate(51), 'cmtCnt' => '正常的框架，外观也很酷，佩戴也很舒适，操作也很方便，基本很适合于快速上手，按键也很灵敏，拍摄效果也很不错，1080P基本能够达到，录音也比较灵敏，效果也不错，性价比比较高，做工中规中矩，份量很轻，是一款不错的多功能眼镜。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => 'SUNNIQ数码旗舰店', 'fans' => '8308万', 'allGoods' => '248'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.webp'));

  // id：224
  $id224 = array('topImages' => getTopImages(7), 'currentCategory' => 0, 'title' => array('爱奇艺 奇遇2S 4k VR一体机  VR眼镜 体感游戏机 智能3D头盔 3DOF体感手柄标准版'), 'price' => array('newPrice' => '2299.00', 'oldPrice' => '¥2499.00'), 'choosedInfo' => array('choosedStyle' => array('标准版，奇遇2S，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '1.465kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '预约送货')), 'commentInfo' => array('cmtCount' => '10万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '真王老吉', 'star' => 5, 'cmtDate' => getBeforeDate(72), 'cmtCnt' => '以前用过手机加头盔的产品，感觉不好，一直都在关注一体机，应为我是爱奇艺超级会员，就一直关注这个产品，快一年了，经过长时间对比才入手，除了不送卡，其他都送了，收到货心情很激动，因为我看了一下差评，心情还有一些忐忑，到家打开大包装的时候详细检查了所有东西，包装结实完美，封条，封膜完好，装主机的纸盒好大，打开后感觉就是礼盒，就用这个存放也行，把一体机拿手里，分量超乎想象，主机竟然没有我想象的重，带头上就像戴帽子，重量和电池很好的平衡，赶紧把镜片保护膜撕了开机，第一次被震撼到了，很友好的虚拟空间引导设置和使用，效果超乎想象，孩子比我着急，看了恐龙世界和恐龙博物馆，恐龙世界太吓人，小孩不能长时间看，主要还是我看，看了3D的阿凡达，我感觉比影院好，在灿烂的星空下欣赏大屏幕电影，还是4K的好，游戏还没有装，主要是担心影响孩子，正在琢磨，游戏免费的太少，对我没有影响，我主要就是看电影，无论多好的东西都有点要改进的地方，能把电池做成可跟换的就非常完美了，可以加备用电池，推荐购买，科技改变生活。以后再追评。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '象爷0623', 'star' => 5, 'cmtDate' => getBeforeDate(103), 'cmtCnt' => '观影效果：很清晰啊，到时可以看好多全景和3d片子，网络自带种子多。
  舒适度：可以调节很方便用上正适合
  操作难易：录入爱奇艺账号麻烦些，可以不太会用设备，其它都很简单
  做工质量：材质过硬，没问题能用住
  外形外观：白色很漂亮，还有保护垫带上舒服
  其他特色：可以链接PC，玩游戏又多了设备'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '爱奇艺VR自营旗舰店', 'fans' => '110万', 'allGoods' => '17'),'guessRecommend' => getDigitRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.jpg'));

  // id：300
  $id300 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('三只松鼠休闲零食膨化小吃方便面干脆面串烧味小贱拉面丸子85g/袋'), 'price' => array('newPrice' => '12.90'), 'choosedInfo' => array('choosedStyle' => array('小贱拉面丸子85g/袋，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.09kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '211万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => '137186yyj', 'star' => 5, 'cmtDate' => getBeforeDate(39), 'cmtCnt' => '味道很棒，买了5包，刚到家就吃了4包，只剩这一包了，味道微辣，吃起来特别棒，嘎嘣脆，包装过来的时候用的大箱子，不用担心路上会不会压碎，其实不喜欢开挂，比如说打游戏开挂的人，老是让我没有游戏体验，但是大家都开挂就没事了，谁知道原来京东还有外挂，京 贝占 评 亻介 官 知道吗？这个未新○弓纵哠，等于是个购物外挂，不同于优惠，是直接买完fan现！而且非常简单，不用费脑筋想文字，直接复制粘贴，一点难度都没有。这个价格买到这个非常值，希望下次还能遇见这样的活动，下次一定再多买几包！特别棒～还可以，挺好吃的，就是太辣了，因为我是广东人，不吃辣椒，很容易上火，不能吃多，物美价廉，偶尔吃一下可以，不敢经常吃，当零食吃，味道还不错，挺香脆的，京东发货还挺快的，卖家服务很好，包装也很好，没有压碎，吃起来脆脆的，稍味有点辣味，食品大小很合适，一口一个，同时携带也是很方便的，不怎么占地方，份量还算比较足，适合休闲时光亨受，特别是看电影或者电视时吃，京东购物质量有保证，京东物流速度杠杠滴！下次有活动再来吧！好评，全五分'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '蓝色的禾禾', 'star' => 5, 'cmtDate' => getBeforeDate(47), 'cmtCnt' => '味道微辣，吃起来特别棒，嘎嘣脆，包装过来的时候用的大箱子，不用担心路上会不会压碎，但是大家都开挂就没事了，这个价格买到这个非常值，希望下次还能遇见这样的活动，下次一定再多买几包！特别棒～还可以，挺好吃的，就是太辣了，因为我是广东人，不吃辣椒，很容易上火，不能吃多，物美价廉，偶尔吃一下可以，不敢经常吃'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '三只松鼠自营旗舰店', 'fans' => '2603万', 'allGoods' => '336'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.jpg'));

  // id：301
  $id301 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('三只松鼠每日坚果开心果 进口加州坚果炒货每日坚果零食地方特产100g/袋'), 'price' => array('newPrice' => '39.90'), 'choosedInfo' => array('choosedStyle' => array('开心果100g，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.12kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '558万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '874922389', 'star' => 5, 'cmtDate' => getBeforeDate(128), 'cmtCnt' => '一次买了很多，有开心果，碧根果，巴旦木，腰果，海苔脆，花生，Q肠，蜀香牛肉，草莓干等，都还不错，果子比较大，味道也可以，有的是独立包装，方便又防潮。女儿很喜欢开心果和腰果，三袋开心果都吃完了。活动期间买的，还算实惠。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => 'z***r', 'star' => 5, 'cmtDate' => getBeforeDate(130), 'cmtCnt' => '搞活动买的，挺实惠，可多次开封的设计，密封性好，不容易受潮，开心果谈黄色的外壳，露出绿色的果肉，颗颗饱满，能很容易的就剥开了，非常好吃，又香又脆，大小均匀，都有裂口，好剥又好吃，开心果个头一样大，很自然开心果的味道，结合京东券买的，值得购买，下次有活动还会来买。京东物流就是快，物美价廉。点赞！'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '三只松鼠自营旗舰店', 'fans' => '2603万', 'allGoods' => '336'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.webp'));

  // id：302
  $id302 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('琥珀 小米锅巴800g（混合口味25gX32袋）办公室休闲零食大礼包老式怀旧膨化食品粗粮锅巴'), 'price' => array('newPrice' => '18.90'), 'choosedInfo' => array('choosedStyle' => array('混合口味800g，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.84kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '59万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'c***口', 'star' => 5, 'cmtDate' => getBeforeDate(47), 'cmtCnt' => '牛肉味儿的！嘎嘣嘎嘣脆的，实属是 美味，下午茶，嘴馋的小零食，经济实惠！小包装，更得劲儿的！方便分享。方便保存！很喜欢的！超级爱吃的，同事都很喜欢！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '众***一', 'star' => 5, 'cmtDate' => getBeforeDate(95), 'cmtCnt' => '目前吃了海苔味的 特别美味 独立包装 方便卫生 价格还算便宜 京东盒子包装 没有被砸碎 👍🏻'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '琥珀自营旗舰店', 'fans' => '1.2万', 'allGoods' => '7'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.jpg'));

  // id：303
  $id303 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('Orion 好丽友 休闲零食 薯片 非油炸 薯愿三连罐312g/组（104g*3薯片）'), 'price' => array('newPrice' => '18.80'), 'choosedInfo' => array('choosedStyle' => array('三连罐104g*3，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.415kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '部分收货', '自提')), 'commentInfo' => array('cmtCount' => '142万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '同***国', 'star' => 5, 'cmtDate' => getBeforeDate(75), 'cmtCnt' => '吃起来咔嚓咔嚓的，棒极了，价格不贵，东西好吃，首选好丽友的薯愿。三种口味，都很喜欢。经常在京东上买这款手机，口感很香脆，一点儿也不油腻，非油炸的从健康考虑，更适合当零食，买的三种口味，每种口味的，感觉都不错，很好吃，独立的小包装更便于存放和携带，既可做在家的零食也可出去玩时携带，家人都很爱吃这种薯片咸香鲜，口感很好，软绵细腻，就连不爱吃零食的老公，都说好吃，一口接着一口，根本停不下来，一不小心吃了一包！'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '焦***_', 'star' => 5, 'cmtDate' => getBeforeDate(202), 'cmtCnt' => '好丽友的薯片，算是老牌子，里面非常经典的一款了，他是属于非油炸零反式脂肪的薯片，味道很香脆，很好吃，这次买的是三联包，有番茄味，牛排味牛，还有香烤原味的，马上天气好了，带着帐篷，带着零食一起去野餐啦，性价比非常高'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '好丽友自营旗舰店', 'fans' => '88万', 'allGoods' => '109'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.jpg'));

  // id：304
  $id304 = array('topImages' => getTopImages(4), 'currentCategory' => 0, 'title' => array('良品铺子高端零食 手撕面包棒 糕点面包营养早餐即食小吃750g'), 'price' => array('newPrice' => '39.90'), 'choosedInfo' => array('choosedStyle' => array('手撕面包棒750g，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '1kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '307万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'B***9', 'star' => 5, 'cmtDate' => getBeforeDate(134), 'cmtCnt' => '出不去在家抗疫情，只能买点东西吃吃了。一箱750g，共有18个。面包拉丝有韧劲，口感蓬松、绵软；外表金黄色，有夹心，层次分明；有一股浓郁的麦香味，甜而不齁，恰到好处；独立小包装，便于随身携带；棍状造型，易于手持，大小也很合适。还有其他一堆，赞'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '以辰扬蕊', 'star' => 5, 'cmtDate' => getBeforeDate(255), 'cmtCnt' => '最近干粮都快吃完了，赶快买点，这个面包不错，味道还可以，当早餐来吃，松松软软的，口感细腻，打开包装就一股香甜的味道，用的独立包装，非常干净卫生，吃起来也很方便，日期也很新鲜，价格很优惠，很便宜。而且京东快递很快'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '良品铺子自营旗舰店', 'fans' => '1418万', 'allGoods' => '788'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.webp'));

  // id：305
  $id305 = array('topImages' => getTopImages(5), 'currentCategory' => 0, 'title' => array('甘源牌 休闲零食 青豌豆 蒜香味青豆 坚果炒货特产小吃零食豌豆粒 285g/袋'), 'price' => array('newPrice' => '15.90'), 'choosedInfo' => array('choosedStyle' => array('蒜香味285g，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.32kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '部分收货')), 'commentInfo' => array('cmtCount' => '89万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'f***9', 'star' => 5, 'cmtDate' => getBeforeDate(21), 'cmtCnt' => '口感：甘源原味青豌豆。味道非常舒服。淡淡的清香味。
  产品包装：甘源原味青豌豆。整个一个大包装500克，里面分了很多个小包装。吃起来很方便，又干净。
  分量：甘源原味青豌豆。大包整个500克。分的一个小包，很方便使用。
  另外，快递很给力的。很快就送到了，谢谢！'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '152206zaey', 'star' => 5, 'cmtDate' => getBeforeDate(55), 'cmtCnt' => '甘源牌零食，大品牌值得信奈，补补营养，味道很好，非常好吃。大人小孩都爱吃，包装也很完美，非常大气。我个人非常喜欢原味，不咸不淡味道刚刚好，非常适合我的口味，整体来说非常好吃，非常脆，口感非常好。赶着活动买非常划算，一大包，独立一小包一小包，每次一小包一小包吃，吃起来非常方便，很用心的包装设计，吃完还会再来光顾。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '甘源自营旗舰店', 'fans' => '31万', 'allGoods' => '102'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.jpg'));

  // id：306
  $id306 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('三只松鼠香烤鱿鱼丝 休闲零食即食海鲜特产鱿鱼条88g/袋'), 'price' => array('newPrice' => '37.90'), 'choosedInfo' => array('choosedStyle' => array('1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.104kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '157万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => 'Tao_tao--', 'star' => 5, 'cmtDate' => getBeforeDate(75), 'cmtCnt' => '首先惊艳外观让我震惊，忍不住更*有食欲买了一大堆，满3**减2**真的太划算了，感觉不错，小袋包装,很方便。口感好极了，味道独特，口感超好，超级推荐!猪肉脯真的是超乎意料好吃，而且量多特别实惠，味道没的说，份量足，甜度刚刚好，多吃几个也不腻.越吃越上瘾。独立包装，香辣劲爽，甜度刚刚好，新鲜，口感不错!猪肉铺好好吃越嚼越香。口感很好，吃完还会继续买。'), array('profilePhoto' => getDefaultUserImg(), 'userName' => '132321ulem', 'star' => 5, 'cmtDate' => getBeforeDate(182), 'cmtCnt' => '三只松鼠的服务好，物流杠杠的，搞活动时买的，买零食一直选三只松鼠，价格很实惠，零食包装很干净，携带方便，吃起来也方便，味道也不错，日期也新鲜，味道正宗，看电视，旅游，等必备食品，值得购买。经常吃三只松鼠这个牌子的东西，这次买的也是不错的，很好吃，真的不错，而且还有活动。价格也便宜，一回买点。吃完在买，估计吃不了几天就的在买了，不过这样很好，能多吃点。还会买的。真的很好吃。小袋包装,很方便。三只松鼠的品牌值得信赖，比超市卖的便宜并且也新鲜，所以一直都在他家买，质量有保证，每次的日期都是很新鲜的，很实惠包装得很好，很精致，质量上乘，味道很正，吃起来非常酥，独立小包装，携带也很方便，家人都说好吃，而且在家看电视，想什么时候吃就什么时候吃，真的很方便，闲暇时间的必备零食，口感细腻香甜，酥酥的吃起来，回味不觉，真的很不错，吃了就停不下来的感觉。挺好吃的 脆脆的 吃起来很香孩子吃着放心！宝贝很喜欢，物美价廉，独立包装，卫生方便，五星推荐。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '三只松鼠自营旗舰店', 'fans' => '2606万', 'allGoods' => '336'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(6, '.webp'));

  // id：307
  $id307 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('三只松鼠薄脆饼干小方块308g/盒 酥脆原味薄饼早餐代餐膨化食品休闲零食小吃儿童原味糕点'), 'price' => array('newPrice' => '19.90', 'oldPrice' => '¥28.90'), 'choosedInfo' => array('choosedStyle' => array('原味，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.4kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '预约送货', '部分收货')), 'commentInfo' => array('cmtCount' => '57万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '150647qfb', 'star' => 5, 'cmtDate' => getBeforeDate(5), 'cmtCnt' => '买了有一段时间了，现在才来评论，京东送货到家很满意，喜欢吃三只松鼠的东西，之前买的海苔味的很好吃，这次准备还买海苔味的，可是买错了，一下买了两盒原味的，不过也不错，也一样好吃，独立包装，小孩子吃不完也没事，不怕不脆了，吃完还会再买的。'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => 'j***4', 'star' => 5, 'cmtDate' => getBeforeDate(93), 'cmtCnt' => '好东西应该大家一起分享，真的好吃😋好吃，是韧性饼干，口感很好，脆脆的同时很有嚼劲，味道是奶酪土豆味很，咸口不腻但是很舒服。也很大份，一盒好多小袋很好吃而且很斤吃，满意满意，在多吃和宝宝两人能吃好多天，宝宝也爱吃'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '三只松鼠自营旗舰店', 'fans' => '2606万', 'allGoods' => '336'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.jpg'));

  // id：308
  $id308 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('三只松鼠猪肉脯自然片 肉干肉脯休闲零食特产小吃靖江风味150g/袋'), 'price' => array('newPrice' => '36.90', 'oldPrice' => '¥49.90'), 'choosedInfo' => array('choosedStyle' => array('猪肉脯自然片150g，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.165kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '256万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '康***人', 'star' => 5, 'cmtDate' => getBeforeDate(20), 'cmtCnt' => '猪肉脯很好吃，是独立包装的，平时当零食吃，非常满足香香的肉片也不是很硬，挺好吃的，独立包装适合出门的时候带出去吃。山有山兮木有枝，心悦君（京 贝占 评 亻介 官）兮君不知~为啥心悦~呢？还不是这个WE新~弓ZHONG号，天天都请我喝冰镇红牛，现在这个天，喝点冰凉凉的实在是太爽了，至于怎么请的？买过JD的商品，没评价就可以来寻君一叙，给个好评就能换取一夏清凉~然后快递非常快，物流第二天就到了，真是没得说，特别棒！这个猪肉铺很香、很干、小袋子独立包装，带孩子出门很方便。味道不错，也不辣，一次吃好几小袋，停不下来。推荐购买吧，算是不错的小零食。吃完回购。送件很快，牛肉干看起来让我垂涎欲滴，吃起来津津有味、回味无穷、色味俱全、其味无穷。让我食不厌精，脍不厌细，闻起来很香，吃起来更香。牛肉干的大小刚刚好，一口一个。吃一片感觉很香，吃两片感觉不腻，吃三片还想吃。就这样两大包都被我干完了。'), array('profilePhoto' => getUserImg('02.jpg'), 'userName' => '奔***朵', 'star' => 5, 'cmtDate' => getBeforeDate(99), 'cmtCnt' => '很抱歉这么久才来评价 第一次在三只松鼠家买猪肉脯 这个猪肉脯真的是出乎意料的好吃 爆厚适中 软硬适中 而且量特别多 很实惠 味道挺纯正的 分量足 甜度适中 个人觉得搭配白粥真的很好吃 越吃越上瘾 也很新鲜 口感不错 真的是越嚼越香 吃完还会再来买的'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '三只松鼠自营旗舰店', 'fans' => '2606万', 'allGoods' => '336'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(7, '.jpg'));

  // id：309
  $id309 = array('topImages' => getTopImages(6), 'currentCategory' => 0, 'title' => array('三只松鼠鸭脖 休闲零食 鸭肉干肉脯 卤味零食小吃 鸭脖子甜辣味154g'), 'price' => array('newPrice' => '25.90'), 'choosedInfo' => array('choosedStyle' => array('鸭脖甜辣味154g/袋，1个'), 'addr' => '北京朝阳区三环至四环之间', 'goodsInfo' => '现货', 'weight' => '0.185kg', 'services' => array('99元免基础运费', '商家发货&售后', '7天无理由退货', '211限时达', '上门换新', '破损包退换')), 'commentInfo' => array('cmtCount' => '256万+', 'evalRate' => '99%', 'comments' => array(array('profilePhoto' => getDefaultUserImg(), 'userName' => 'j***o', 'star' => 5, 'cmtDate' => getBeforeDate(33), 'cmtCnt' => '鸭脖味道很好吃，甜中带辣，吃了还想吃，回味无穷，京东物流真的快隔天就收到了，快递员服务态度也非常满意，每个都独立包装，吃起来很方便，到了立马被同事分光了，吃完还会再来买的，评价可以拿京豆？对啊，那是‘评价官’，评价可以拿零钱？是的，那是‘京 贝占 评 亻介 官’！赶快打开手里的v伟，锌S0一下这个~宫~众ha0，评价兑换零钱吧！收到了，非常时期物流到货很快，隔天就能送到，鸭脖味道很好吃，甜中带点辣味道，好吃，吃了还想吃，在去买没货了，真空独立小包装，很卫生方便，满意满意，喜欢吃的不行，过段时间再来看看，有货的话会再来买。零食非常不错，大品牌，包装非常高大上档次，大大的一盒整整21包，有鸭脖，鸭舌，鸭锁骨，鸭菌，鸭翅，味道香辣微甜，肉质鲜美柔韧有嚼劲，真的是非常好吃的小零食，这段时间宅在家里，可以一次吃个够了。很好吃的。大袋里有都是独立包装，吃时候好方便，独立包装干净卫生方便携带。口感很好，分量很足，营养的配方?物流也给力，很满意的一次购物，好评！'), array('profilePhoto' => getUserImg('01.jpg'), 'userName' => '喝醉酒的扑棱蛾子', 'star' => 5, 'cmtDate' => getBeforeDate(78), 'cmtCnt' => '买的烧烤味的鸭脖，东西不错，好吃，晚上一边看电视，一边吃，烧烤味的稍微有点辣味道还不错，是时候该认真对待自己手中的福利了，那就是购物评价的福利~打开为伈，so一下这个攻终，浩（*****）立马就可以评价换钱哦，首2追1，福利多多~现金奖励~亲测有效！每个鸭脖都是独立包装，干净卫生，吃起来特别方便，三只松鼠的零食选择多，可以找到不同的口味，真的是特别好吃，馋嘴诱人的美味，越嚼越带劲，大家一起分享，一如既往的好吃，都是真空独立包装，干净卫生，保质期也更久。周黑鸭应该是最具武汉特色的特产了吧，送朋友必备。甜辣味没有特别辣，大部分地区都能够接受。强推鸭脖子，鸭锁骨和豆干，都是非常好吃的。'))), 'shopInfo' => array('shopLogo' => getShopImg('shop_logo.webp'), 'shopName' => '三只松鼠自营旗舰店', 'fans' => '2606万', 'allGoods' => '336'),'guessRecommend' => getFoodRecommend(), 'goodsIntroduction' => getGoodsIntroduction(5, '.jpg'));

  switch($id) {
    case 100:
      $arr = $id100;
      break;
    case 101:
      $arr = $id101;
      break;
    case 102:
      $arr = $id102;
      break;
    case 103:
      $arr = $id103;
      break;
    case 104:
      $arr = $id104;
      break;
    case 105:
      $arr = $id105;
      break;
    case 106:
      $arr = $id106;
      break;
    case 107:
      $arr = $id107;
      break;
    case 108:
      $arr = $id108;
      break;
    case 109:
      $arr = $id109;
      break;
    case 110:
      $arr = $id110;
      break;
    case 111:
      $arr = $id111;
      break;
    case 112:
      $arr = $id112;
      break;
    case 113:
      $arr = $id113;
      break;
    case 114:
      $arr = $id114;
      break;
    case 115:
      $arr = $id115;
      break;
    case 116:
      $arr = $id116;
      break;
    case 117:
      $arr = $id117;
      break;
    case 118:
      $arr = $id118;
      break;
    case 119:
      $arr = $id119;
      break;
    case 120:
      $arr = $id120;
      break;
    case 121:
      $arr = $id121;
      break;
    case 122:
      $arr = $id122;
      break;
    case 123:
      $arr = $id123;
      break;
    case 124:
      $arr = $id124;
      break;
    case 125:
      $arr = $id125;
      break;
    case 126:
      $arr = $id126;
      break;
    case 127:
      $arr = $id127;
      break;
    case 128:
      $arr = $id128;
      break;
    case 129:
      $arr = $id129;
      break;
    case 130:
      $arr = $id130;
      break;
    case 131:
      $arr = $id131;
      break;
    case 132:
      $arr = $id132;
      break;
    case 133:
      $arr = $id133;
      break;
    case 134:
      $arr = $id134;
      break;
    case 135:
      $arr = $id135;
      break;
    case 136:
      $arr = $id136;
      break;
    case 137:
      $arr = $id137;
      break;
    case 138:
      $arr = $id138;
      break;
    case 139:
      $arr = $id139;
      break;
    case 200:
      $arr = $id200;
      break;
    case 201:
      $arr = $id201;
      break;
    case 202:
      $arr = $id202;
      break;
    case 203:
      $arr = $id203;
      break;
    case 204:
      $arr = $id204;
      break;
    case 205:
      $arr = $id205;
      break;
    case 206:
      $arr = $id206;
      break;
    case 207:
      $arr = $id207;
      break;
    case 208:
      $arr = $id208;
      break;
    case 209:
      $arr = $id209;
      break;
    case 210:
      $arr = $id210;
      break;
    case 211:
      $arr = $id211;
      break;
    case 212:
      $arr = $id212;
      break;
    case 213:
      $arr = $id213;
      break;
    case 214:
      $arr = $id214;
      break;
    case 215:
      $arr = $id215;
      break;
    case 216:
      $arr = $id216;
      break;
    case 217:
      $arr = $id217;
      break;
    case 218:
      $arr = $id218;
      break;
    case 219:
      $arr = $id219;
      break;
    case 220:
      $arr = $id220;
      break;
    case 221:
      $arr = $id221;
      break;
    case 222:
      $arr = $id222;
      break;
    case 223:
      $arr = $id223;
      break;
    case 224:
      $arr = $id224;
      break;
    case 300:
      $arr = $id300;
      break;
    case 301:
      $arr = $id301;
      break;
    case 302:
      $arr = $id302;
      break;
    case 303:
      $arr = $id303;
      break;
    case 304:
      $arr = $id304;
      break;
    case 305:
      $arr = $id305;
      break;
    case 306:
      $arr = $id306;
      break;
    case 307:
      $arr = $id307;
      break;
    case 308:
      $arr = $id308;
      break;
    case 309:
      $arr = $id309;
      break;
  }
  exit(json_encode($arr));
?>