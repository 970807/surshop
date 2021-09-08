<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type:application/json; charset=utf-8');
  $baseURL = 'http://surshop.ggh0807.cn/images/category';
  function getImageURL($fileName) {
    return $GLOBALS['baseURL'].'/'.$fileName;
  }
  // 热门推荐
  $item1 = array(
    '热门分类' => array(
      array('title' => '空调', 'img' => getImageURL('100.jpg'), 'link' => 'https://https://wqsou.jd.com/search/searchn?key=%E7%A9%BA%E8%B0%83'),
      array('title' => '冰箱', 'img' => getImageURL('101.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%86%B0%E7%AE%B1'),
      array('title' => '电脑', 'img' => getImageURL('102.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E8%84%91'),
      array('title' => '手机', 'img' => getImageURL('103.png'), 'link' => 'https://so.m.jd.com/products/9987-653-655.html'),
      array('title' => '全面屏手机', 'img' => getImageURL('104.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%85%A8%E9%9D%A2%E5%B1%8F%E6%89%8B%E6%9C%BA'),
      array('title' => '游戏手机', 'img' => getImageURL('105.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%B8%B8%E6%88%8F%E6%89%8B%E6%9C%BA'),
      array('title' => '保健品', 'img' => getImageURL('106.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%BF%9D%E5%81%A5%E5%93%81'),
      array('title' => '口罩', 'img' => getImageURL('107.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%8F%A3%E7%BD%A9'),
      array('title' => '驱蚊用品', 'img' => getImageURL('108.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%A9%B1%E8%9A%8A%E7%94%A8%E5%93%81'),
      array('title' => '电磁炉', 'img' => getImageURL('109.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E7%94%B5%E7%A3%81%E7%82%89'),
      array('title' => '电热水壶', 'img' => getImageURL('110.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E7%94%B5%E7%83%AD%E6%B0%B4%E5%A3%B6'),
      array('title' => '数据线', 'img' => getImageURL('111.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%95%B0%E6%8D%AE%E7%BA%BF'),
      array('title' => '图书', 'img' => getImageURL('112.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%9B%BE%E4%B9%A6'),
      array('title' => '美妆护肤', 'img' => getImageURL('113.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%BE%8E%E5%A6%86%E6%8A%A4%E8%82%A4'),
      array('title' => '除菌液', 'img' => getImageURL('114.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E9%99%A4%E8%8F%8C%E6%B6%B2'),
      array('title' => '休闲零食', 'img' => getImageURL('115.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%BC%91%E9%97%B2%E9%9B%B6%E9%A3%9F'),
      array('title' => '充电宝', 'img' => getImageURL('116.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%85%85%E7%94%B5%E5%AE%9D'),
      array('title' => '体温计', 'img' => getImageURL('117.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E4%BD%93%E6%B8%A9%E8%AE%A1'),
      array('title' => '投影机', 'img' => getImageURL('118.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%8A%95%E5%BD%B1%E6%9C%BA'),
      array('title' => '游戏机', 'img' => getImageURL('119.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%B8%B8%E6%88%8F%E6%9C%BA')
    )
  );

  // 手机数码
  $item2 = array(
    '热门品牌' => array(
      array('title' => '小米', 'img' => getImageURL('200.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%B0%8F%E7%B1%B3'),
      array('title' => '华为', 'img' => getImageURL('201.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%8D%8E%E4%B8%BA'),
      array('title' => '荣耀', 'img' => getImageURL('202.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%8D%A3%E8%80%80'),
      array('title' => 'iPhone', 'img' => getImageURL('203.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=iPhone'),
      array('title' => 'vivo', 'img' => getImageURL('204.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=vivo'),
      array('title' => 'OPPO', 'img' => getImageURL('205.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=OPPO'),
      array('title' => '魅族', 'img' => getImageURL('206.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%AD%85%E6%97%8F'),
      array('title' => '三星', 'img' => getImageURL('207.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%B8%89%E6%98%9F'),
      array('title' => '一加', 'img' => getImageURL('208.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%B8%80%E5%8A%A0'),
      array('title' => '360手机', 'img' => getImageURL('209.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=360%E6%89%8B%E6%9C%BA'),
      array('title' => '锤子手机', 'img' => getImageURL('210.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E9%94%A4%E5%AD%90%E6%89%8B%E6%9C%BA'),
      array('title' => '努比亚', 'img' => getImageURL('211.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%8A%AA%E6%AF%94%E4%BA%9A')
    ),
    '手机配件' => array(
      array('title' => '数据线', 'img' => getImageURL('212.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%95%B0%E6%8D%AE%E7%BA%BF'),
      array('title' => '手机存储卡', 'img' => getImageURL('213.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E5%82%A8%E5%AD%98%E5%8D%A1'),
      array('title' => '充电宝', 'img' => getImageURL('214.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%85%85%E7%94%B5%E5%AE%9D'),
      array('title' => '手机贴膜', 'img' => getImageURL('215.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E8%B4%B4%E8%86%9C'),
      array('title' => '手机耳机', 'img' => getImageURL('216.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E8%80%B3%E6%9C%BA'),
      array('title' => '蓝牙耳机', 'img' => getImageURL('217.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%93%9D%E7%89%99%E8%80%B3%E6%9C%BA'),
      array('title' => '手机支架', 'img' => getImageURL('218.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E6%94%AF%E6%9E%B6'),
      array('title' => '手机饰品', 'img' => getImageURL('219.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E9%A5%B0%E5%93%81'),
      array('title' => '车载配件', 'img' => getImageURL('220.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%BD%A6%E8%BD%BD%E9%85%8D%E4%BB%B6'),
      array('title' => '充电器', 'img' => getImageURL('221.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%85%85%E7%94%B5%E5%99%A8'),
      array('title' => '手机电池', 'img' => getImageURL('222.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E7%94%B5%E6%B1%A0'),
      array('title' => '创意配件', 'img' => getImageURL('223.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%95%B0%E7%A0%81%E9%85%8D%E4%BB%B6'),
      array('title' => '拍照配件', 'img' => getImageURL('224.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%89%8B%E6%9C%BA%E6%8B%8D%E7%85%A7%E9%85%8D%E4%BB%B6')
    )
  );

  // 电脑办公
  $item3 = array(
    '热卖分类' => array(
      array('title' => '轻薄本', 'img' => getImageURL('300.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%BD%BB%E8%96%84%E6%9C%AC'),
      array('title' => '游戏本', 'img' => getImageURL('301.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B8%B8%E6%88%8F%E6%9C%AC'),
      array('title' => '机械键盘', 'img' => getImageURL('302.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%9C%BA%E6%A2%B0%E9%94%AE%E7%9B%98'),
      array('title' => '组装电脑', 'img' => getImageURL('303.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%BB%84%E8%A3%85%E7%94%B5%E8%84%91'),
      array('title' => '移动硬盘', 'img' => getImageURL('304.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%A7%BB%E5%8A%A8%E7%A1%AC%E7%9B%98'),
      array('title' => '显卡', 'img' => getImageURL('305.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%98%BE%E5%8D%A1'),
      array('title' => '游戏台式机', 'img' => getImageURL('306.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B8%B8%E6%88%8F%E5%8F%B0%E5%BC%8F%E6%9C%BA'),
      array('title' => '家用打印机', 'img' => getImageURL('307.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%AE%B6%E7%94%A8%E6%89%93%E5%8D%B0%E6%9C%BA'),
      array('title' => '吃鸡装备', 'img' => getImageURL('308.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%90%83%E9%B8%A1%E8%A3%85%E5%A4%87'),
      array('title' => '曲屏显示器', 'img' => getImageURL('309.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%9B%B2%E5%B1%8F%E6%98%BE%E7%A4%BA%E5%99%A8'),
      array('title' => '投影机', 'img' => getImageURL('310.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%8A%95%E5%BD%B1%E6%9C%BA')
    ),
    '电脑整机' => array(
      array('title' => '笔记本', 'img' => getImageURL('311.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%AC%94%E8%AE%B0%E6%9C%AC'),
      array('title' => '平板电脑', 'img' => getImageURL('312.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%B9%B3%E6%9D%BF%E7%94%B5%E8%84%91'),
      array('title' => '一体机', 'img' => getImageURL('313.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%B8%80%E4%BD%93%E6%9C%BA'),
      array('title' => '台式机', 'img' => getImageURL('314.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%8F%B0%E5%BC%8F%E6%9C%BA'),
      array('title' => '笔记本配件', 'img' => getImageURL('315.jpg'), 'link' => 'https://so.m.jd.com/products/670-671-675.html'),
      array('title' => '游戏台式机', 'img' => getImageURL('316.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B8%B8%E6%88%8F%E5%8F%B0%E5%BC%8F%E6%9C%BA'),
      array('title' => '商用台式机', 'img' => getImageURL('317.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%95%86%E7%94%A8%E5%8F%B0%E5%BC%8F%E6%9C%BA'),
      array('title' => '游戏本', 'img' => getImageURL('318.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B8%B8%E6%88%8F%E6%9C%AC'),
      array('title' => '平板电脑配件', 'img' => getImageURL('319.jpg'), 'link' => 'https://so.m.jd.com/products/670-671-5146.html'),
      array('title' => '轻薄本', 'img' => getImageURL('320.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%BD%BB%E8%96%84%E6%9C%AC'),
      array('title' => '二合一平板', 'img' => getImageURL('321.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%BA%8C%E5%90%88%E4%B8%80%E5%B9%B3%E6%9D%BF'),
      array('title' => '服务器/工作站', 'img' => getImageURL('322.jpg'), 'link' => 'https://so.m.jd.com/products/670-671-674.html')
    )
  );

  // 家用电器
  $item4 = array(
    '厨房小电' => array(
      array('title' => '电压力锅', 'img' => getImageURL('400.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E5%8E%8B%E5%8A%9B%E9%94%85'),
      array('title' => '热水壶', 'img' => getImageURL('401.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E6%B0%B4%E5%A3%B6'),
      array('title' => '电饭煲', 'img' => getImageURL('402.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E9%A5%AD%E7%85%B2'),
      array('title' => '电磁炉', 'img' => getImageURL('403.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E7%A3%81%E7%82%89'),
      array('title' => '微波炉', 'img' => getImageURL('404.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%BE%AE%E6%B3%A2%E7%82%89'),
      array('title' => '电饼铛', 'img' => getImageURL('405.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E9%A5%BC%E9%93%9B'),
      array('title' => '豆浆机', 'img' => getImageURL('406.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%B1%86%E6%B5%86%E6%9C%BA'),
      array('title' => '多用途锅', 'img' => getImageURL('407.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%A4%9A%E7%94%A8%E9%80%94%E9%94%85'),
      array('title' => '料理机', 'img' => getImageURL('408.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%96%99%E7%90%86%E6%9C%BA'),
      array('title' => '榨汁机', 'img' => getImageURL('409.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%A6%A8%E6%B1%81%E6%9C%BA%2F%E5%8E%9F%E6%B1%81%E6%9C%BA'),
      array('title' => '电烤箱', 'img' => getImageURL('410.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E7%83%A4%E7%AE%B1'),
      array('title' => '养生壶', 'img' => getImageURL('411.jpg'), 'link' => 'https://so.m.jd.com/products/737-752-12397.html'),
      array('title' => '电炖锅', 'img' => getImageURL('412.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B5%E7%82%96%E9%94%85'),
      array('title' => '电烧烤炉', 'img' => getImageURL('413.jpg'), 'link' => 'https://so.m.jd.com/products/737-752-13118.html'),
      array('title' => '面包机', 'img' => getImageURL('414.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%9D%A2%E5%8C%85%E6%9C%BA'),
      array('title' => '咖啡机', 'img' => getImageURL('415.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%92%96%E5%95%A1%E6%9C%BA'),
      array('title' => '煮蛋器', 'img' => getImageURL('416.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%85%AE%E8%9B%8B%E5%99%A8'),
      array('title' => '电热饭盒', 'img' => getImageURL('417.jpg'), 'link' => 'https://so.m.jd.com/products/737-752-12398.html'),
      array('title' => '面条机', 'img' => getImageURL('418.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%9D%A2%E6%9D%A1%E6%9C%BA'),
      array('title' => '酸奶机', 'img' => getImageURL('419.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%85%B8%E5%A5%B6%E6%9C%BA'),
      array('title' => '空气炸锅', 'img' => getImageURL('420.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%A9%BA%E6%B0%94%E7%82%B8%E9%94%85')
    )
  );

    // 美妆护肤
    $item5 = array(
      '当季主推' => array(
        array('title' => '防晒', 'img' => getImageURL('500.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%98%B2%E6%99%92'),
        array('title' => '控油', 'img' => getImageURL('501.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%8E%A7%E6%B2%B9')
      ),
      '拔草推荐' => array(
        array('title' => '明星同款面膜', 'img' => getImageURL('502.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%98%8E%E6%98%9F%E5%90%8C%E6%AC%BE%E9%9D%A2%E8%86%9C'),
        array('title' => '显白口红', 'img' => getImageURL('503.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%98%BE%E7%99%BD%E5%8F%A3%E7%BA%A2'),
        array('title' => '小美盒', 'img' => getImageURL('504.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%B0%8F%E7%BE%8E%E7%9B%92')
      ),
      '潮流速递' => array(
        array('title' => '新品速递', 'img' => getImageURL('505.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%96%B0%E5%93%81%E7%BE%8E%E5%A6%86%E6%8A%A4%E8%82%A4'),
        array('title' => '精选礼盒', 'img' => getImageURL('506.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%A4%BC%E7%9B%92%E5%A5%97%E8%A3%85%20%E7%BE%8E%E5%A6%86%E6%8A%A4%E8%82%A4'),
        array('title' => '潮流风向', 'img' => getImageURL('507.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%BE%8E%E5%A6%86%E6%BD%AE%E6%B5%81')
      ),
      '香水' => array(
        array('title' => '女士香水', 'img' => getImageURL('508.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%A5%B3%E5%A3%AB%E9%A6%99%E6%B0%B4'),
        array('title' => '男士香水', 'img' => getImageURL('509.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B7%E5%A3%AB%E9%A6%99%E6%B0%B4'),
        array('title' => '香水礼盒', 'img' => getImageURL('510.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%A6%99%E6%B0%B4%E7%A4%BC%E7%9B%92')
      ),
      '彩妆' => array(
        array('title' => '口红', 'img' => getImageURL('511.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%8F%A3%E7%BA%A2'),
        array('title' => '气垫', 'img' => getImageURL('512.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B0%94%E5%9E%AB'),
        array('title' => '美甲', 'img' => getImageURL('513.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%BE%8E%E7%94%B2'),
        array('title' => '隔离霜', 'img' => getImageURL('514.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%9A%94%E7%A6%BB'),
        array('title' => '粉底液', 'img' => getImageURL('515.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%B2%89%E5%BA%95%E6%B6%B2'),
        array('title' => '粉饼', 'img' => getImageURL('516.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%B2%89%E9%A5%BC'),
        array('title' => 'BB霜', 'img' => getImageURL('517.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=BB%E9%9C%9C'),
        array('title' => 'CC霜', 'img' => getImageURL('518.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=CC%E9%9C%9C'),
        array('title' => '蜜粉/散粉', 'img' => getImageURL('519.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E8%9C%9C%E7%B2%89%2F%E6%95%A3%E7%B2%89')
      )
    );

    // 个护清洁
    $item6 = array(
      '畅销推荐' => array(
        array('title' => '个护馆', 'img' => getImageURL('600.jpg'), 'link' => 'https://pro.m.jd.com/mall/active/NJ1kd1PJWhwvhtim73VPsD1HwY3/index.html'),
        array('title' => '清洁馆', 'img' => getImageURL('601.jpg'), 'link' => 'https://pro.m.jd.com/mall/active/2Tjm6ay1ZbZ3v7UbriTj6kHy9dn6/index.html'),
        array('title' => '进口清洁', 'img' => getImageURL('602.jpg'), 'link' => 'https://poplist.m.jd.com/fh/list.html?sub=42081'),
        array('title' => '卫生棉条', 'img' => getImageURL('603.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%8D%AB%E7%94%9F%E6%A3%89%E6%9D%A1'),
        array('title' => '湿厕纸', 'img' => getImageURL('604.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%B9%BF%E5%8E%95%E7%BA%B8'),
        array('title' => '花露水', 'img' => getImageURL('605.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E8%8A%B1%E9%9C%B2%E6%B0%B4'),
        array('title' => '驱蚊用品', 'img' => getImageURL('606.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E9%A9%B1%E8%9A%8A%E7%94%A8%E5%93%81'),
        array('title' => '本色纸', 'img' => getImageURL('607.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%9C%AC%E8%89%B2%E7%BA%B8'),
        array('title' => '免洗洗手液', 'img' => getImageURL('608.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%85%8D%E6%B4%97%E6%B4%97%E6%89%8B%E6%B6%B2')
      ),
      '明星品牌' => array(
        array('title' => '得宝', 'img' => getImageURL('609.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%BE%97%E5%AE%9D'),
        array('title' => '施华蔻', 'img' => getImageURL('610.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%96%BD%E5%8D%8E%E8%94%BB%E4%B8%93%E4%B8%9A'),
        array('title' => '舒洁', 'img' => getImageURL('611.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E8%88%92%E6%B4%81'),
        array('title' => '馥绿德雅', 'img' => getImageURL('612.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E9%A6%A5%E7%BB%BF%E5%BE%B7%E9%9B%85'),
        array('title' => '3M', 'img' => getImageURL('613.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=3M'),
        array('title' => '吕', 'img' => getImageURL('614.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%90%95'),
        array('title' => '当妮', 'img' => getImageURL('615.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%BD%93%E5%A6%AE'),
        array('title' => 'LG', 'img' => getImageURL('616.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=LG%E6%B4%97%E6%8A%A4'),
        array('title' => '橘子工坊', 'img' => getImageURL('617.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%A9%98%E5%AD%90%E5%B7%A5%E5%9D%8A'),
        array('title' => '花王', 'img' => getImageURL('618.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E8%8A%B1%E7%8E%8B'),
        array('title' => '汉高', 'img' => getImageURL('619.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%B1%89%E9%AB%98'),
        array('title' => '玛尔斯', 'img' => getImageURL('620.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E7%8E%9B%E5%B0%94%E6%96%AF')
      )
    );

    // 汽车生活
    $item7 = array(
      '热卖推荐' => array(
        array('title' => '机油', 'img' => getImageURL('700.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%9C%BA%E6%B2%B9'),
        array('title' => '汽车坐垫', 'img' => getImageURL('701.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B1%BD%E8%BD%A6%E5%9D%90%E5%9E%AB'),
        array('title' => '洗车水枪', 'img' => getImageURL('702.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%B4%97%E8%BD%A6%E6%B0%B4%E6%9E%AA'),
        array('title' => '行车记录仪', 'img' => getImageURL('703.jpg'), 'link' => 'https://so.m.jd.com/products/6728-6740-6964.html'),
        array('title' => '轮胎', 'img' => getImageURL('704.jpg'), 'link' => 'https://so.m.jd.com/products/6728-6742-9248.html'),
        array('title' => '应急救援', 'img' => getImageURL('705.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%BA%94%E6%80%A5%E6%95%91%E6%8F%B4')
      ),
      '乘用车' => array(
        array('title' => '全部车型', 'img' => getImageURL('706.png'), 'link' => 'https://prodev.m.jd.com/mall/active/7buZFEUJouLZZywhvvRWkGNSRMS/index.html'),
        array('title' => '二手车', 'img' => getImageURL('707.png'), 'link' => 'https://pro.m.jd.com/mall/active/2wVuGbLZRCGcbFoqnkcEibeTacgP/index.html'),
        array('title' => '选车攻略', 'img' => getImageURL('708.png'), 'link' => 'https://pro.m.jd.com/mall/active/eXWBZm92WmDspjo4fZnaRc2fLgN/index.html'),
        array('title' => '热销轿车', 'img' => getImageURL('709.png'), 'link' => 'https://prodev.m.jd.com/mall/active/4GE1gsN2eyFXqL6CzMDHLP1zQwxs/index.html'),
        array('title' => '热门SUV', 'img' => getImageURL('710.png'), 'link' => 'https://pro.m.jd.com/mall/active/QTKQs5WuF2f7bwTd9gEYVBN3BEe/index.html'),
        array('title' => '精选MPV', 'img' => getImageURL('711.png'), 'link' => 'https://pro.m.jd.com/mall/active/2bcpWL2srTgEvSaunzE9A917pQ3J/index.html'),
        array('title' => '豪华车', 'img' => getImageURL('712.png'), 'link' => 'https://pro.m.jd.com/mall/active/Gpbt7ZcZRrcMSMfW2BRr77udjxE/index.html'),
        array('title' => '新能源', 'img' => getImageURL('713.png'), 'link' => 'https://pro.m.jd.com/mall/active/1GtLxHVccgaCvkzy1c9ePtsjBnn/index.html'),
        array('title' => '试驾有礼', 'img' => getImageURL('714.png'), 'link' => 'https://pro.m.jd.com/mall/active/3M2eWMRKkb3roxoNC2Y2DkbGDFQy/index.html'),
        array('title' => '12万以下', 'img' => getImageURL('715.png'), 'link' => 'https://pro.m.jd.com/mall/active/Z4av3VxTebiHhpkCUj5SgzqQbtL/index.html'),
        array('title' => '12-25万', 'img' => getImageURL('716.png'), 'link' => 'https://pro.m.jd.com/mall/active/4ZXwBdXGQpJAVygGbk2jP5ge8QGW/index.html'),
        array('title' => '25万以上', 'img' => getImageURL('717.png'), 'link' => 'https://pro.m.jd.com/mall/active/2X8QnbnqSHyVQCQPVsNe84QAwxk5/index.html'),
        array('title' => '经济代步', 'img' => getImageURL('718.png'), 'link' => 'https://pro.m.jd.com/mall/active/2BDYZnakR8K3C3jBiB8R1r9Bc7pz/index.html'),
        array('title' => '舒适家用', 'img' => getImageURL('719.png'), 'link' => 'https://pro.m.jd.com/mall/active/32162DNGpYnqXSU8hvYAPnYzdRjr/index.html'),
        array('title' => '轻奢小资', 'img' => getImageURL('720.png'), 'link' => 'https://pro.m.jd.com/mall/active/2GmUaUS3iAwxFK1Qe8o1nx34PN8H/index.html')
      )
    );

    // 超市
    $item8 = array(
      '休闲零食' => array(
        array('title' => '休闲零食', 'img' => getImageURL('800.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E4%BC%91%E9%97%B2%E9%9B%B6%E9%A3%9F'),
        array('title' => '坚果炒货', 'img' => getImageURL('801.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E5%9D%9A%E6%9E%9C%E7%82%92%E8%B4%A7'),
        array('title' => '糖巧', 'img' => getImageURL('802.png'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E7%B3%96%E5%B7%A7'),
        array('title' => '饼干蛋糕', 'img' => getImageURL('803.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E9%A5%BC%E5%B9%B2'),
        array('title' => '肉干肉脯', 'img' => getImageURL('804.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E8%82%89%E5%B9%B2%E8%82%89%E8%84%AF'),
        array('title' => '蜜饯果干', 'img' => getImageURL('805.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E8%9C%9C%E9%A5%AF%E6%9E%9C%E5%B9%B2'),
        array('title' => '无糖食品', 'img' => getImageURL('806.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E6%97%A0%E7%B3%96%E9%A3%9F%E5%93%81')
      ),
      '粮油调味' => array(
        array('title' => '大米', 'img' => getImageURL('807.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E5%A4%A7%E7%B1%B3'),
        array('title' => '食用油', 'img' => getImageURL('808.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E9%A3%9F%E7%94%A8%E6%B2%B9'),
        array('title' => '方便速食', 'img' => getImageURL('809.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E6%96%B9%E4%BE%BF%E9%80%9F%E9%A3%9F'),
        array('title' => '调味品', 'img' => getImageURL('810.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E8%B0%83%E5%91%B3%E5%93%81'),
        array('title' => '南北干货', 'img' => getImageURL('811.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E5%8D%97%E5%8C%97%E5%B9%B2%E8%B4%A7'),
        array('title' => '面粉', 'img' => getImageURL('812.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E5%A4%A7%E7%B1%B3'),
        array('title' => '杂粮', 'img' => getImageURL('813.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E6%9D%82%E7%B2%AE'),
        array('title' => '烘焙原料', 'img' => getImageURL('814.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E7%83%98%E7%84%99%E5%8E%9F%E6%96%99'),
        array('title' => '有机食品', 'img' => getImageURL('815.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E6%9C%89%E6%9C%BA%E9%A3%9F%E5%93%81')
      )
    );

    // 男装
    $item9 = array(
      '热卖选购' => array(
        array('title' => '夹克', 'img' => getImageURL('900.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%A4%B9%E5%85%8B'),
        array('title' => 'T恤', 'img' => getImageURL('901.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=T%E6%81%A4'),
        array('title' => '针织衫', 'img' => getImageURL('902.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B7%E5%A3%AB%E9%92%88%E7%BB%87%E8%A1%AB'),
        array('title' => '衬衫', 'img' => getImageURL('903.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E8%A1%AC%E8%A1%AB'),
        array('title' => '卫衣', 'img' => getImageURL('904.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E5%8D%AB%E8%A1%A3'),
        array('title' => '风衣', 'img' => getImageURL('905.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E9%A3%8E%E8%A1%A3'),
        array('title' => '牛仔裤', 'img' => getImageURL('906.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%89%9B%E4%BB%94%E8%A3%A4%E7%94%B7'),
        array('title' => '休闲裤', 'img' => getImageURL('907.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%BC%91%E9%97%B2%E8%A3%A4%E7%94%B7'),
        array('title' => '自营男装', 'img' => getImageURL('908.jpg'), 'link' => 'https://pro.m.jd.com/mall/active/ybrXLAsb1LR39GTxUPS5w7KL4nG/index.html')
      ),
      '男士内搭' => array(
        array('title' => '新品T恤', 'img' => getImageURL('909.png'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%96%B0%E5%93%81T%E6%81%A4'),
        array('title' => '短袖T恤', 'img' => getImageURL('910.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E7%9F%AD%E8%A2%96T%E6%81%A4'),
        array('title' => '新品衬衫', 'img' => getImageURL('911.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%96%B0%E5%93%81%E8%A1%AC%E8%A1%AB'),
        array('title' => '短袖衬衫', 'img' => getImageURL('912.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E7%9F%AD%E8%A2%96%E8%A1%AC%E8%A1%AB'),
        array('title' => '新品卫衣', 'img' => getImageURL('913.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%96%B0%E5%93%81%E5%8D%AB%E8%A1%A3'),
        array('title' => '连帽卫衣', 'img' => getImageURL('914.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E8%BF%9E%E5%B8%BD%E5%8D%AB%E8%A1%A3'),
        array('title' => '潮牌卫衣', 'img' => getImageURL('915.jpg'), 'link' => 'https://wqsou.jd.com/search/searchn?key=%E6%BD%AE%E7%89%8C%E5%8D%AB%E8%A1%A3'),
        array('title' => '长袖T恤', 'img' => getImageURL('916.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%95%BF%E8%A2%96T%E6%81%A4%E7%94%B7'),
        array('title' => '长袖衬衫', 'img' => getImageURL('917.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%95%BF%E8%A2%96%E8%A1%AC%E8%A1%AB%E7%94%B7'),
        array('title' => '免烫衬衫', 'img' => getImageURL('918.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%85%8D%E7%83%AB%E8%A1%AC%E8%A1%AB%E7%94%B7'),
        array('title' => '针织衫', 'img' => getImageURL('919.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E9%92%88%E7%BB%87%E8%A1%AB%E7%94%B7'),
        array('title' => 'POLO衫', 'img' => getImageURL('920.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=POLO%E8%A1%AB%E7%94%B7')
      )
    );

    // 男鞋
    $item10 = array(
      '热卖分类' => array(
        array('title' => '休闲鞋', 'img' => getImageURL('1000.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%BC%91%E9%97%B2%E9%9E%8B'),
        array('title' => '皮鞋', 'img' => getImageURL('1001.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%9A%AE%E9%9E%8B'),
        array('title' => '男靴', 'img' => getImageURL('1002.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E7%94%B7%E9%9D%B4'),
        array('title' => '帆布鞋', 'img' => getImageURL('1003.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%B8%86%E5%B8%83%E9%9E%8B%E7%94%B7'),
        array('title' => '板鞋', 'img' => getImageURL('1004.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%9D%BF%E9%9E%8B%20%E7%94%B7'),
        array('title' => '自营鞋靴', 'img' => getImageURL('1005.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%87%AA%E8%90%A5%E7%94%B7%E9%9E%8B')
      ),
      '流行男鞋' => array(
        array('title' => '休闲鞋', 'img' => getImageURL('1007.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6908.html'),
        array('title' => '休闲户外鞋', 'img' => getImageURL('1008.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%BC%91%E9%97%B2%E6%88%B7%E5%A4%96%E9%9E%8B'),
        array('title' => '凉鞋', 'img' => getImageURL('1009.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6909.html'),
        array('title' => '功能鞋', 'img' => getImageURL('1010.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-9781.html'),
        array('title' => '豆豆鞋', 'img' => getImageURL('1011.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E8%B1%86%E8%B1%86%E9%9E%8B%E7%94%B7'),
        array('title' => '商务休闲鞋', 'img' => getImageURL('1012.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6907.html'),
        array('title' => '传统布鞋', 'img' => getImageURL('1013.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6910.html'),
        array('title' => '板鞋', 'img' => getImageURL('1014.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%9D%BF%E9%9E%8B%20%E7%94%B7'),
        array('title' => '正装鞋', 'img' => getImageURL('1015.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6906.html'),
        array('title' => '增高鞋', 'img' => getImageURL('1016.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-12066.html'),
        array('title' => '人字拖', 'img' => getImageURL('1017.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E6%8B%96%E9%9E%8B%20%E7%94%B7'),
        array('title' => '男靴', 'img' => getImageURL('1018.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6912.html'),
        array('title' => '乐福鞋', 'img' => getImageURL('1019.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E4%B9%90%E7%A6%8F%E9%9E%8B%E7%94%B7'),
        array('title' => '帆布鞋', 'img' => getImageURL('1020.jpg'), 'link' => 'https://so.m.jd.com/ware/search.action?keyword=%E5%B8%86%E5%B8%83%E9%9E%8B%E7%94%B7'),
        array('title' => '工装鞋', 'img' => getImageURL('1021.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-12067.html'),
        array('title' => '鞋配件', 'img' => getImageURL('1022.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-6913.html'),
        array('title' => '雨靴', 'img' => getImageURL('1023.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-9782.html'),
        array('title' => '定制鞋', 'img' => getImageURL('1024.jpg'), 'link' => 'https://so.m.jd.com/products/11729-11730-12068.html')
      )
    );

    $none = array('暂无此分类' => array());

  $res = array(
    '热门推荐' => $item1,
    '手机数码' => $item2,
    '电脑办公' => $item3,
    '家用电器' => $item4,
    '美妆护肤' => $item5,
    '个护清洁' => $item6,
    '汽车生活' => $item7,
    '超市' => $item8,
    '男装' => $item9,
    '男鞋' => $item10,
    '女装' =>  $none,
    '女鞋' =>  $none,
    '母婴童装' => $none,
    '图书音像' => $none,
    '运动户外' => $none,
    '内衣配饰' => $none,
    '食品生鲜' => $none,
    '酒水饮料' => $none,
    '家具家装' => $none,
    '家居厨具' => $none,
    '箱包手袋' => $none,
    '钟表珠宝' => $none,
    '玩具乐器' => $none,
    '医药保健' => $none,
    '宠物生活' => $none,
    '礼品鲜花' => $none,
    '衣资绿植' => $none
  );
  exit(json_encode($res));
?>