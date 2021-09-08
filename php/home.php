<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type:application/json; charset=utf-8');
  $type = $_GET['type'];
  $baseURL = 'http://surshop.ggh0807.cn/images/home';
  function getImgURL($category, $page, $id, $type='.jpg') {
    return $GLOBALS['baseURL'].'/'.$category.'/'.$page.'/'.$id.$type;
  }

  if($type == 'banners') { // 轮播图
    $arr = array(
    array('img' => $baseURL.'/banners/01.jpg', 'link' => 'https://h5.m.jd.com/active/yard-channel/index.html?themeId=35111&babelChannel=12539622&innerLink=%5B%7B%22matId%22%3A%22100012975836%22%7D%5D&themeStyle=0&__jda=76161171.1042522929.1595489410.1597373530.1597373797.99'),
    array('img' => $baseURL.'/banners/02.jpg', 'link' => 'https://pro.m.jd.com/mall/active/3MyEJtbM1S9QcWdR9seyyAgJitMB/index.html'),
    array('img' => $baseURL.'/banners/03.jpg', 'link' => 'https://pro.m.jd.com/mall/active/3735hpEdyuXn9NbSkfEDhc4MnYJ8/index.html'),
    array('img' => $baseURL.'/banners/04.jpg', 'link' => 'https://pro.m.jd.com/mall/active/4WSvmqrSxtABYgYCPsXhSzEdWLzp/index.html'));
    exit(json_encode($arr));
    return;
  }

  if($type == 'recommends') { // 每日逛
    $arr = array(
    array('heading' => '免息星球', 'statement' => '免息购', 'img' => $baseURL.'/recommends/01.jpg', 'link' => 'https://jddx.jd.com/m/jddnew/btyingxiao/sfstore/index.html', 'headingColor' => '#FF2A2A,#F139D2'),
    array('heading' => '每日特价', 'statement' => '9块9疯抢', 'img' => $baseURL.'/recommends/02.jpg', 'link' => 'https://wqs.jd.com/portal/wx/seckill_m/specialprice.shtml?st=1','headingColor' => '#FE8537,#F02B2B'),
    array('heading' => '品牌闪购', 'statement' => '汇大牌好价', 'img' => $baseURL.'/recommends/03.jpg', 'link' => 'https://wqs.jd.com/portal/wx/seckill_m/brand.shtml', 'headingColor' => '#FF765C,#FF23B3'),
    array('heading' => '惊喜直播', 'statement' => '好货立刻买', 'img' => $baseURL.'/recommends/04.jpg', 'link' => 'https://wqs.jd.com/live/list/index.shtml', 'headingColor' => '#FF2A00,#FF00AF'),
    array('heading' => '排行榜', 'statement' => '热销推荐', 'img' => $baseURL.'/recommends/05.jpg', 'link' => 'https://wqs.jd.com/wxsq_project/portal/top-list/hot.html', 'headingColor' => '#D400FF,#FF320A'),
    array('heading' => '拍拍好物', 'statement' => 'iphone 5折起', 'img' => $baseURL.'/recommends/06.jpg', 'link' => 'https://pro.m.jd.com/mall/active/LHGZv1DrGkva1jNpUkKFuNFN6oo/index.html', 'headingColor' => '#00C2AB,#3E94FF'),
    array('heading' => '新品首发', 'statement' => '惊喜小魔方', 'img' => $baseURL.'/recommends/07.jpg', 'link' => 'https://news.m.jd.com/', 'headingColor' => '#FF765C,#FF23B3'),
    array('heading' => '发现好货', 'statement' => '教你买买买', 'img' => $baseURL.'/recommends/08.jpg', 'link' => 'https://m.jd.com/webportal/channel/find_quality_goods', 'headingColor' => '#2AD396,#85BB1F')

    );
    exit(json_encode($arr));
    return;
  }

  if($type == 'exhibits') {
    $arr = array(
      array('img' => $baseURL.'/exhibits/01.webp', 'title' => '智能生活', 'link' => 'https://prodev.m.jd.com/mall/active/348u9rD4baSPsud8UgCePWxM2GF7/index.html'),
      array('img' => $baseURL.'/exhibits/02.webp', 'title' => '运动户外', 'link' => 'https://prodev.m.jd.com/mall/active/4Lw1CiAhC2WjEvjebXekULAcM8Ft/index.html'),
      array('img' => $baseURL.'/exhibits/03.webp', 'title' => '家电周年庆', 'link' => 'https://pro.m.jd.com/mall/active/4BonccBkFBPS1QaKtpFxo1KQsh8R/index.html'),
      array('img' => $baseURL.'/exhibits/04.webp', 'title' => '酸奶超单', 'link' => 'https://pro.m.jd.com/mall/active/CZaa8uXzhG44FGRneS7EfUDnGW9/index.html'),
      array('img' => $baseURL.'/exhibits/05.webp', 'title' => '国际奢品', 'link' => 'https://pro.m.jd.com/mall/active/2Qpje1Ai65U7rRVAJNheUiXN5gzx/index.html'),
      array('img' => $baseURL.'/exhibits/06.webp', 'title' => '同城小时达', 'link' => 'https://pro.m.jd.com/mall/active/4KHhXG94XsVjXDv38BGHVBN8TACE/index.html'),
      array('img' => $baseURL.'/exhibits/07.webp', 'title' => '智能星生活', 'link' => 'https://pro.m.jd.com/mall/active/2Ludamd5UsNknzHpxNsFFmVi5x4X/index.html'),
      array('img' => $baseURL.'/exhibits/08.webp', 'title' => '自营图书', 'link' => 'https://pro.m.jd.com/mall/active/46Vsus7SpKRgDbyAUitFHeBJnthu/index.html'),
    );
    exit(json_encode($arr));
    return;
  }

  $page = $_GET['page'];
  if($type == 'dress') {
    if($page == 1) {
      $arr = array('dress' =>
        array('page' => 1, 'list' => array(
          array('id' => 100, 'img' => getImgURL('dress', 'page1', 100), 'title' => '2020夏季新款宽松黄色小清系短袖T恤女半袖翻领Polo衫韩版学生K86681 黄色 S', 'price' => '￥78.00'),
          array('id' => 101, 'img' => getImgURL('dress', 'page1', 101), 'title' => '岚烨2020夏季新款字母印花短袖t恤女学生宽松韩版潮ins网红半袖体恤上衣服 灰色 均码',  'price' => '￥56.00'),
          array('id' => 102, 'img' => getImgURL('dress', 'page1', 102), 'title' => '【商场同款】MECITY女装春季时尚休闲可盐可甜商务T恤多色清爽短袖 新桂木绿 155/80A', 'price' => '￥89.00'),
          array('id' => 103, 'img' => getImgURL('dress', 'page1', 103), 'title' => '衣领飘飘短袖字母t恤女装春夏装宽松白色纯色棉上衣大码衣服体恤衫 黑色 M宽松(105-120斤)', 'price' => '￥79.00'),
          array('id' => 104, 'img' => getImgURL('dress', 'page1', 104), 'title' => '古黛妃 2020韩版学生百搭时尚春夏季新款宽松休闲慵懒舒适大码圆领短袖T恤女 浅橙色 XL',  'price' => '￥45.00'),
          array('id' => 105, 'img' => getImgURL('dress', 'page1', 105), 'title' => '茵曼 2020夏新款女款短袖T恤蝴蝶结可爱甜美修身学生少女上衣 春芽绿 M', 'price' => '￥119.00'),
          array('id' => 106, 'img' => getImgURL('dress', 'page1', 106), 'title' => '秋水伊人连衣裙2020夏季新款女装兔斯基联名刺绣亮片网纱连衣裙 粉红 S', 'price' => '￥489.00'),
          array('id' => 107, 'img' => getImgURL('dress', 'page1', 107), 'title' => '哥弟女装2020春夏新款卫衣拼接条纹衬衫翻领露肩连衣裙A500058 藏蓝 L(4码)', 'price' => '￥680.00'),
          array('id' => 108, 'img' => getImgURL('dress', 'page1', 108), 'title' => '唐狮2020夏新款连衣裙    女连衣裙 浅紫 L', 'price' => '￥95.00'),
          array('id' => 109, 'img' => getImgURL('dress', 'page1', 109), 'title' => '茵岚烨2020夏季新品中长款工装短袖衬衫女学生宽松百搭港味复古衬衣中袖上衣 杏色 均码', 'price' => '￥63.00')
        ), 'nextPage' => true)
      );
    } else if($page == 2) {
      $arr = array('dress' =>
        array('page' => 2, 'list' => array(
          array('id' => 110, 'img' => getImgURL('dress', 'page2', 110), 'title' => '若宸夏装棉麻女装2020新款韩版短袖连衣裙夏雪纺衫性感蕾丝裙子沙滩裙休闲两件套时尚套装女 桔色 S', 'price' => '￥198.00'),
          array('id' => 111, 'img' => getImgURL('dress', 'page2', 111), 'title' => '与欣新品高中初中生少女生裙子夏天白色连衣裙女仙气质少女感学生甜美小清新中长款裙子仙女仙森系 白色 均码', 'price' => '￥96.90'),
          array('id' => 112, 'img' => getImgURL('dress', 'page2', 112), 'title' => '以影连衣裙学生初中高中生少女裙子女学生夏季新款文艺小清新荷叶边显瘦娃娃领蝴蝶结短袖中长裙 绿色 M', 'price' => '￥109.00'),
          array('id' => 113, 'img' => getImgURL('dress', 'page2', 113), 'title' => '佐丹曼【时尚款】2020新款显瘦连衣裙夏复古格子网纱仙女裙中长款女学生韩版闺蜜裙 灰色 关注店铺优先发货 M 建议90~100斤', 'price' => '￥118.00'),
          array('id' => 114, 'img' =>getImgURL('dress', 'page2', 114), 'title' => '连衣裙春夏季2020新款韩版polo领高腰长袖女学生宽松显瘦中长款a字裙子 白色 S【60斤-90斤】', 'price' => '￥168.00'),
          array('id' => 115, 'img' => getImgURL('dress', 'page2', 115), 'title' => '婧瑜夏天显瘦长裙女裙子夏季白色连衣裙2020新款气质森系学生超仙显瘦 白色 L  ', 'price' => '￥189.00'),
          array('id' => 116, 'img' => getImgURL('dress', 'page2', 116), 'title' => '2020夏季新款韩版法式小众复古娃娃裙宽松显瘦小清新连衣裙女学生 砖红色 M  ', 'price' => '￥53.50'),
          array('id' => 117, 'img' => getImgURL('dress', 'page2', 117), 'title' => '法式小众连衣裙收腰长款短袖女学生长裙韩版2019夏天新款裙子森系 绿色【配腰带】 均码  ',  'price' => '￥59.00'),
          array('id' => 118, 'img' => getImgURL('dress', 'page2', 118), 'title' => '迪炫莉连衣裙学生夏天学院风高中生少女初中生女生裙子夏季韩版中长款女孩中学生宽松显瘦热天背带裙衣服套装 藏青色吊带裙+短袖T恤一套 均码', 'price' => '￥109.00'),
          array('id' => 119, 'img' => getImgURL('dress', 'page2', 119), 'title' => 'Lagogo拉谷谷2020夏季新款短袖圆领镂空亮丝印花粉红色甜美字母T恤女JATT314A05 粉红色(H8) 160/M/38', 'price' => '￥123.00')
        ), 'nextPage' => false)
      );
    }
  } else if ($type == 'digit') {
    if($page == 1) {
      $arr = array('digit' => array('page' => 1, 'list' => array(
        array('id' => 200, 'img' => getImgURL('digit', 'page1', 200), 'title' => '华为荣耀全面屏轻薄本', 'price' => '￥3999.00'),
        array('id' => 201, 'img' => getImgURL('digit', 'page1', 201), 'title' => '橙影智能摄影机', 'price' => '￥2899.00'),
        array('id' => 202, 'img' => getImgURL('digit', 'page1', 202), 'title' => '大眼橙投影仪', 'price' => '￥2699.00'),
        array('id' => 203, 'img' => getImgURL('digit', 'page1', 203), 'title' => '格力3匹智能圆柱空调', 'price' => '￥6299.00'),
        array('id' => 204, 'img' => getImgURL('digit', 'page1', 204), 'title' => '索尼数码相机', 'price' => '￥5999.00'),
        array('id' => 205, 'img' => getImgURL('digit', 'page1', 205), 'title' => '科沃斯扫地机器人', 'price' => '￥2799.00'),
        array('id' => 206, 'img' => getImgURL('digit', 'page1', 206), 'title' => '乐得手机支架', 'price' => '￥89.00'),
        array('id' => 207, 'img' => getImgURL('digit', 'page1', 207), 'title' => '腾讯黑鲨游戏手机3 Pro 幻影黑 8G 256G', 'price' => '￥4699.00'),
        array('id' => 208, 'img' => getImgURL('digit', 'page1', 208), 'title' => '德业（Deye）除湿机/抽湿机 除湿量12升/天 静音38分贝 家用静音吸湿器地下室干衣净化 DYD-E12A3', 'price' => '￥599.00'),
        array('id' => 209, 'img' => getImgURL('digit', 'page1', 209), 'title' => '添可(TINECO)无线智能洗地机芙万家用吸尘拖地一体清洗清洁机器【科沃斯集团出品】', 'price' => '￥3290.00')
      ), 'nextPage' => true)
      );
    } else if($page == 2) {
      $arr = array('digit' => array('page' => 2, 'list' => array(
        array('id' => 210, 'img' => getImgURL('digit', 'page2', 210), 'title' => '华帝（VATTI）i11135 烟灶套装 侧吸式抽油烟机升级4.5KW燃气灶具套装 21大吸力自动清洗(天然气)', 'price' => '￥3299.00'),
        array('id' => 211, 'img' => getImgURL('digit', 'page2', 211), 'title' => '欧井（Eurgeen）除湿机/抽湿机 除湿量50升/天 适用150平方米 别墅地下室家用工业净化吸湿器OJ-550EP', 'price' => '￥2089.00'),
        array('id' => 212, 'img' => getImgURL('digit', 'page2', 212), 'title' => '飞利浦 65英寸 4K全面屏 HDR 独立音腔 APP智能语音 2级能效 京品家电 网络液晶电视65PUF7294/T3', 'price' => '￥2699.00'),
        array('id' => 213, 'img' => getImgURL('digit', 'page2', 213), 'title' => '华为 HUAWEI P30 Pro 超感光徕卡四摄10倍混合变焦麒麟980芯片屏内指纹 8GB+128GB亮黑色预售版', 'price' => '￥3488.00'),
        array('id' => 214, 'img' => getImgURL('digit', 'page2', 214), 'title' => '魔蛋（magicforce） 数字小键盘 数字键盘 迷你键盘 有线键盘 防窥键盘 密码数字键盘', 'price' => '￥34.90'),
        array('id' => 215, 'img' => getImgURL('digit', 'page2', 215), 'title' => '未来人类 Terrans Force X511 15.6英寸笔记本(i7-10750H 32G 512G PCIe SSD+1T HDD RTX 2060)', 'price' => '￥11599.00'),
        array('id' => 216, 'img' => getImgURL('digit', 'page2', 216), 'title' => '佳明（GARMIN）智能手表 Fenix6X Pro户外GPS心率血氧游泳骑行登山跑步智能运动太阳能充电手表', 'price' => '￥9660.00'),
        array('id' => 217, 'img' => getImgURL('digit', 'page2', 217), 'title' => '索尼（SONY）Alpha 6100 APS-C画幅微单数码相机 标准镜头套装 Vlog自拍视频 白色(A6100L/ILCE-6100L)', 'price' => '￥4999.00'),
        array('id' => 218, 'img' => getImgURL('digit', 'page2', 218), 'title' => '步步高家教机S5 4G+128G 11英寸  AI智慧眼 安全护眼 学习机学生平板电脑 英语点读机早教机 小学初中高中', 'price' => '￥4388.00'),
        array('id' => 219, 'img' => getImgURL('digit', 'page2', 219), 'title' => '小米平衡车 定制版Ninebot 九号平衡车 智能电动体感车（白）', 'price' => '￥1999.00')
      ), 'nextPage' => false)
      );
    }
  } else if ($type == 'food') {
    if($page == 1) {
      $arr = array('food' => array('page' => '1', 'list' => array(array('id' => 300, 'img' => getImgURL('food', 'page1', 300, '.webp'), 'title' => '三只松鼠休闲零食膨化小吃方便面干脆面串烧味小贱拉面丸子85g袋', 'price' => '￥11.80'),
      array('id' => 301, 'img' => getImgURL('food', 'page1', 301, '.webp'), 'title' => '三只松鼠每日坚果开心果 进口加州坚果炒货每日坚果零食地方特产100g袋', 'price' => '￥39.90'),
      array('id' => 302, 'img' => getImgURL('food', 'page1', 302, '.webp'), 'title' => '琥珀 小米锅巴800g（混合口味25gX32袋）办公室休闲零食大礼包老式怀旧膨化食品粗粮锅巴', 'price' => '￥18.90'),
      array('id' => 303, 'img' => getImgURL('food', 'page1', 303, '.webp'), 'title' => 'Orion 好丽友 休闲零食 薯片 非油炸 薯愿三连罐312g组（104g*3薯片）（新老包装随机发货）', 'price' => '￥19.90'),
      array('id' => 304, 'img' => getImgURL('food', 'page1', 304, '.webp'), 'title' => '良品铺子高端零食 手撕面包棒 糕点面包营养早餐即食小吃750g', 'price' => '￥34.90'),
      array('id' => 305, 'img' => getImgURL('food', 'page1', 305, '.webp'), 'title' => '甘源牌 休闲零食 青豌豆 蒜香味青豆 坚果炒货特产小吃零食豌豆粒 285g袋', 'price' => '￥15.90'),
      array('id' => 306, 'img' => getImgURL('food', 'page1', 306, '.webp'), 'title' => '三只松鼠香烤鱿鱼丝 休闲零食即食海鲜特产鱿鱼条88g袋', 'price' => '￥37.90'),
      array('id' => 307, 'img' => getImgURL('food', 'page1', 307, '.webp'), 'title' => '三只松鼠薄脆饼干小方块308g/盒 酥脆原味薄饼早餐代餐膨化食品休闲零食小吃儿童原味糕点', 'price' => '￥19.90'),
      array('id' => 308, 'img' => getImgURL('food', 'page1', 308, '.webp'), 'title' => '三只松鼠猪肉脯自然片 肉干肉脯休闲零食特产小吃靖江风味150g袋', 'price' => '￥36.90'),
      array('id' => 309, 'img' => getImgURL('food', 'page1', 309, '.webp'), 'title' => '三只松鼠鸭脖 休闲零食 鸭肉干肉脯 卤味零食小吃 鸭脖子甜辣味154g', 'price' => '￥25.90')
    
    ), 'nextPage' => false));
    }
  }
  exit(json_encode($arr));
?>


