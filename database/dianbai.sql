/*
Navicat MySQL Data Transfer

Source Server         : 虚拟机
Source Server Version : 50730
Source Host           : 192.168.0.222:3306
Source Database       : dianbai

Target Server Type    : MYSQL
Target Server Version : 50730
File Encoding         : 65001

Date: 2021-10-13 19:15:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for al_item
-- ----------------------------
DROP TABLE IF EXISTS `al_item`;
CREATE TABLE `al_item` (
  `item_id` varchar(32) NOT NULL COMMENT '工程项目ID',
  `item_name` varchar(255) DEFAULT NULL COMMENT '工程项目名称',
  `pid` varchar(32) DEFAULT NULL,
  `path` text,
  `item_no` varchar(255) DEFAULT NULL COMMENT '工程项目编号',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '1-已删除  0-正常',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_item
-- ----------------------------
INSERT INTO `al_item` VALUES ('07cd75036c2befa5c6ace01d015899b8', '项目B', 'dfd5ab2311c681104a134e791f3ed341', '/00000/dfd5ab2311c681104a134e791f3ed341/', '002', '1634035336', '1634089872', '0');
INSERT INTO `al_item` VALUES ('d571d031cfc90d08c82a20aa73932a8b', '项目C', '07cd75036c2befa5c6ace01d015899b8', '/00000/dfd5ab2311c681104a134e791f3ed341/07cd75036c2befa5c6ace01d015899b8/', '003', '1634035923', '1634089878', '0');
INSERT INTO `al_item` VALUES ('dfd5ab2311c681104a134e791f3ed341', '项目A', '00000', '/00000/', '001', '1634034921', '1634034921', '0');

-- ----------------------------
-- Table structure for al_mod
-- ----------------------------
DROP TABLE IF EXISTS `al_mod`;
CREATE TABLE `al_mod` (
  `mod_id` varchar(32) NOT NULL COMMENT '模块ID',
  `mod_name` varchar(255) DEFAULT NULL COMMENT '模块名称',
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '0-正常  1-已删除',
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_mod
-- ----------------------------
INSERT INTO `al_mod` VALUES ('4353a2eb2784d4a73b4521e20eb4de96', '证件类型', '0');
INSERT INTO `al_mod` VALUES ('98e1f5f172312a193c6cd73bfee70d74', '开户银行', '0');

-- ----------------------------
-- Table structure for al_mod_attr
-- ----------------------------
DROP TABLE IF EXISTS `al_mod_attr`;
CREATE TABLE `al_mod_attr` (
  `attr_id` varchar(32) NOT NULL,
  `mod_id` varchar(32) DEFAULT NULL,
  `mod_name` varchar(255) DEFAULT NULL,
  `attr_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1-正常 0-禁用',
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '0-正常 1-已删除',
  PRIMARY KEY (`attr_id`),
  KEY `FK_Reference_1` (`mod_id`),
  CONSTRAINT `FK_Reference_1` FOREIGN KEY (`mod_id`) REFERENCES `al_mod` (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_mod_attr
-- ----------------------------
INSERT INTO `al_mod_attr` VALUES ('01d999bc6b6269d6662237354308c32c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '道亨银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('021b9c5b2e3003bf98aa69493cd0fbaf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '雅安农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('025927455822d23efc2c3a798f6eb7a5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '甘肃农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0267567e41fb0ced7b8c832cae726161', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '杭州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('026ad32396b173c6539ef5e469a314ce', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '蒙特利尔银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('026ff369d76e4bc4e2ca7a6a0a6e6f77', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '花旗银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('02889e4e3999bd5afd55899f6e33caa2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '武鸣漓江村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0340336811e3587e4a2ccb8ec21b9e4b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏宿豫东吴村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0372da1b9b7d2f49dd206e6fb40a1853', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '德累斯顿银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('037a615d4c49e0b48cda172245dbebad', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川富顺农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('042e4470361b00bbdb47552f12d2e39d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江义乌联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0495ff6dd827c11f607cdc4bb543da21', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '澳新银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('04a97c2460e08681cc1a97bef1643ede', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '天津滨海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('04f2099df5e369a5d4d8403d07ad86c6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '东莞银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('052532abc804c918c9acca67278f19cc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江温岭联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('05713ff732b43d4c450654c77747ed62', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '深圳前海微众银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0622dcc62f8445b9f2278b47f992d84c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '意大利联合圣保罗银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('062fc41aaa913b62de8916509235a021', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川宜宾金江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('069346b8a4f9f409f7a66896f19ac2a6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '鱼峰信合村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('06a025435f39586ad8615c882ed2ac48', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆市武隆融兴村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('071e603892fa7b822d9d1b1fe518762c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荷兰商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('079bda146ab71ff2feee35b67fd21d3c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京顺义银座村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('07f0d69f87d1c3f8f6d52e5c617f412f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '新疆银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('088abaf256bf82f2875c4cd7f96258b8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '建东银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('08b248ff1a85fd925c9d7b26043aaf77', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江仙居富民村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('08f8d5ee3e8a92c0300121c5388cc155', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏海安农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('09444f8fa318df8f48a1de2579914ff7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆北碚稠州村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('09a0890ca282156823af810d323e3229', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广州从化柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('09a8d8bbbc08e1846b2b1b3bf524d394', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0a0967bed7ff468974eabf8bb959965f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '香港上海汇丰银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0a312856bd8c0fd771dd50e196610e4b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '福建福鼎恒兴村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0b6c05df43c1d4276a9ddb13a15b475e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泰安银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0bbc8e245e11c72e3cb12777d21bd766', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '鄞州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0c3476a35c299c0d070da6bb070d9dbb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '西藏堆龙民泰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0c47b1a4ca27fa8b500f96f7c598bdb0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东顺德农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0cd05ffde13f4e8e20edfbed17963d4b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '汕头市潮阳农村信用合作联社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0d89fb72801ec3341cd6f141265e8e11', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '扬中恒丰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0daf31e0e46216bbde7d7e2041d585df', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '抚顺银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0e4fe7d9337d79cb3553879de2d2b28e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖北三峡农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0e5932b0769876ae8012c748b9bacd52', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏涟水太商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0e7fed6db2dceb1cd47d3edac012c75b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荷兰银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0ef26055f62bfd0f0109e9d98781a709', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东揭阳农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0efa1ff4423e0f153fafca26479ff319', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '黄石农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0f616f415c0386a0579260297b0a45b8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏靖江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('0f7f8b767b240753dc14177e50506ea7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '其他商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1054291c7bbaa17ae14f6d24e15d5e63', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泰华农民银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('10938bbf96b1716726e5262fc0ac31e3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '徽商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('115a181a9b3dd097079a16499cea795c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆巴南浦发村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1247a32287f46d67667355fb6ddfea21', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '沧州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('12a9ea9dab1d760471b370831c061063', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泸县元通村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('133d94228dafca548064d98598297d3e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '德意志银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('13639a5ed453086850c4f9aa3828f977', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏赣榆通商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('13833d633b646390f1276f93390ff79e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江嘉善联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1477f19ed1bfc0a9ee99377ebe9ae614', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏金湖民泰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('14b91e3044fd00f0f2f144f416b31bd4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '经人民银行批准的其他银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1556cc9033582fe10a94d1431a1f91ae', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江缙云联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1586f6cd8095827f8e61cca590c220e1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '永亨银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('159f338240a746915efa07fc69852b70', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海商业银行有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('15c7fab2da26716740ee8e23e365d185', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '渤海银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('15fa763838d7d6357740e61af43479e2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '凉山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('16338e10a7a66a7bf9a33e9e7056569f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '新疆维吾尔自治区农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('16ab21ba5bd6634b9b9edaf99a6632b5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '成都银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('16ab729275095d86f87ce339e964be9b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '恒生银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('16c5e361342d4dd93b5413bc394899e8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏兴化农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('17696a1fb4597fb30c64f481e964c40e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川万源农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('18183abe5927c309aca8e8027de8e868', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华侨银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1836f703c1ed2fcff01f32db3ea7737b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川邻水农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('19708f5f34879a03cc14e9991801fb7c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西兴业柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1991e9d307636da304cef22400aa290b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '张家港农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1a68efb243bdbf00e95b49ad092433b9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1a8eeb4d0d43deeb5ab04d6929b1a231', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '昆仑银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1aacb9087d1fca639193dba8ac72bc55', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆南川石银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1b67f99624a2a60e53f73a77ae8cd4cd', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '福建省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1bae073a23104d0552ce95684acf7792', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '云浮市云城区农村信用合作联社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1bcb589acf699291301abd58a25a40c9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '俄罗斯外贸银行公开股份公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1c7e91ad063e9253b15e35a03f0ceba4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '平果国民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1cac626d6eeb33ab58d34780b2f2c3f1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '十堰农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1cf2cc746219bc60680572bc779baa4a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '佛山农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1daa7840af3bb593b3239885aaecdfa2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '青岛国际银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1e2b900cfeb3953d076eb7f2827bfcaa', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1e5eea1bd3ee0751c75288bf8c99ad61', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '河北省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1ff46b5429a604ba5559132a27f0dc09', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '大同银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('1fff8f9e0b639fae7c2843c9805d7eec', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏赣榆农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2057c98eaf4b58307b74b700b70dd21d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '惠州农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('20c30d8068653425e5a016a532befcab', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '扬州高邮兴福村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('213cd609d931f78f0541d413420588ad', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '库尔勒银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('21b5101b64455352a1471907bb835876', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏邗江民泰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('22ed888ae4877a02309bab7b8adb302e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '青岛银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('238fc15309b49a150111dea0ad8fb6c7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北川羌族自治县富民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('247d5237064cecf63127d80c5e0dec4e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '厦门国际银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('25b82d1d92ff619418d28c5f37f2dd0b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆渝北银座村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('25dee442111b52c487b47196f057e4d1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏大丰江南村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('25f497534856ae25f2e86e8d595069fa', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏邳州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2675a42a0be24668d9ee0e08c4e689a0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '韩亚银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('267e534b4972dfdbffef20a87cb9ee6e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川名山锦城村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('26fef3b041decb319ea2d7d0fbdbddfe', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '长宁中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('27546556c03150e2d5c6d81ab7ae52fb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国农业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('27ad7e4b8d7f1436fb8dcb978116dd72', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川渠县农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('27e5e242a34d4dbd6fb424e49ac7489f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '苏州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2805a8a60466001af76dcc950cfeba18', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '鄂州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('281a3811a290395bf5d8ae2bf41d5db7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川合江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('289e6c085e37dd911d5f655155cde8bf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东台山农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('28ed9da3f92eb73a196a3c3a449bfbe0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '渣打银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('296c82c9d4a4f25c50341544879fdf1c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川梓潼农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2b7011936d63c4282d37f70c8061c492', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2b7e7dc4b8de674e4ddb97fd2ab32d26', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '济宁银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2b9b27713155cd584f7c7e1fbb10ce19', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '意大利裕信银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2bb1858e9462cbb67cbbc66f842cbd37', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '潮州农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2be6f0ecdffd7f90040a808f1767b043', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '天津银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2c1329c36a8d7eceb38d50cd3b1da223', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江德清湖商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2c89455d811744174e2f27c7fbeb81b0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2d2e8c759b7f0029f2ffb35124812fa4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京房山沪农商村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2d571a4264ff4bffb5c9f215e08fdfa2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '莱商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2e7d1ac7a8aef2b151a283b3564e0fdf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '内蒙古自治区农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2f77527cf183030c1aa675021b7de2af', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏仪征农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('2f7e459e6d4800f3cef1f194c0abf7b8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏连云港东方农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('303496c05b19b6c41725764874110162', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '南京银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3066c57ce512840e4869ec75d27daa80', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '珠海华润银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('31113cf8143dc4259bfab7b6a8ec2fde', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '随州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3115b0df40f2e1bc172f8e1f71554d26', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江西省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('31989d4119fa6514e2fb937ecfa8718b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宁波国际银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('31c4196765345c4b843dc4ab2e4b7704', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏沛县汉源村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('31e1613eb041a2ac48f42086edbda535', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '嘉兴银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('31ebebe37866c390d5b9e6d54c8ad27b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华南商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('324a0ae35bfeebdafbdc59e5657f5b45', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '自贡银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('32539bfd2baf898a876d018d3f944b45', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '双流诚民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('33180b86a85cf62bc063af79606cc181', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '榆林榆阳民生村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('33403bdce4b7f6c48ee98d5f834fe8fd', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '达州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('337ae50237a381a0c08d9ed7786a8116', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '自贡农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('338ec5abca1471443bd01eaba1b224e6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '德州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3390c96745675d98786abaade47c56a2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川犍为农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('33cd46af4400240b6e6b6920c6fb8669', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '山西省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('33f4b45dfdddcb7ecc1460b28c6670bf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '东莞农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('33f81d10cda6adb3e07c46ca346e9b2c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏灌云农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('349fb398edbcb0f4bdc2e93c9ed98888', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '唐山银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('34ef369b8ed5bdbadc586097d283aa45', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海华瑞银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('34fb5a4d62a4a6f237067641843eb66d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏如东融兴村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3534414cc5e61b8be396568cf95b1acc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '襄阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('360b831705e541c68a85a8a9d6e355e5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江长兴联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('36778b266fb2c4dc73755f40f6b5224c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏句容农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('36e786627d4c4df3bc84bf179e369fa0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '桂林银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('372cfb59206c6b892b32a3f13d3e0d04', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川南部农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('378d73e3303b4ee32bad76d3a620f461', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '珠海农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('37a080776add79f8f7cc6e33bc0de101', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中原银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('37da51346d6db2863d2153efeb766601', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '福建海峡银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('38d084165692836ed71e798561773ae0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '阳泉市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('38e6ca699fb2fb012352498863b82023', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '犍为中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('38f24b69b1db121ea87401ae27bc73f3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荆门东宝惠民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3937d7658c92d4ca1e26867b313cf4f5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏盱眙珠江村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('394352e4c32cb40e7032a2d080c36274', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '齐商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3a1b7ac975e67714a65aab8775ec4b6d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '贵阳农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3a4d4ce44ce2a00cf9c4fda34c79f341', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏东台农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3a9ce0e6cf996f7d0637582d1b856ce0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '绍兴银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3b66c2c22372170b74c8bfae8644e83d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3b8219827645b693dd2276d80922b576', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '比利时联合银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3b8e41e8cfa0222b66d7f43fcb2c1e45', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华一银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3baf1cd80c51f712f5cfa88ed8b94a67', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川隆昌农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3c3abe7d9bb817c30017f5beb287fa2a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏镇江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3c6e68575f6c79bdfbd48bf6f8d45719', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '自贡中成村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3cc56a1b0cfae9bbee96f7406a368684', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏泗洪东吴村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3ce60044e589cdf40c8b010b1b1dda21', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江常山联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3d2ba0b26d793226eedefa4934bc26aa', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '安徽省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3d9549c3ae06c7ff08bd063fbc7f8976', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '日联银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3e68585d54ebab8e8246030c47aea566', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏如皋农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3e7a78b671c420e64ac1244ef8b28173', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏灌云民丰村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('3ea0ab00f8e26bc7456657d6576f0864', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '山口银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4025c4c1fbef6be55ae74ebbcb2f222f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '摩根大通银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4026065bcd96d8586c1b216fc47aafed', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '南充嘉陵中成村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('402bef6b1668e08752ac06f1bbfcd2f9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏启东农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('408551cc2d1601ffba918b35580509ad', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('411c21358592f7f700bc76f864e3ea8c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '盐城滨海兴福村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('41b111c5c6c7d37e9092a74ce17e04af', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川兴文石海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('41ff478cd8154fe70152e7e6059edae8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '朝兴银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('424678db416fada726b20e090bfd40e7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '长沙银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('435fd464a0cd2d274e75868772d83796', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '晋城银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4423e133826285bda52a0c4975712404', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东华兴银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('443c0b83dee22a648bbf1197db42e0c3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '衡水银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('45e55775dad3931b82a389da6e296051', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川大竹农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('462b3e019e4de1dfdd874cdd59b73c66', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '洛阳银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('465b46f418914a2555dc13d2727dbb5b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川长宁竹海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('469693b39388b751fc8a52f21b10b5d8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('46e4525eae4a33e3cd44a15ad051dab5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湛江农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('47400d3f2c7120723d6ac5eaba31385f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏新沂汉源村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('476e75163e32d4582e5f7166a0c0d469', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆云阳恒丰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('47a69f7ea97f12bc6bdc0278d7ad9af3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '应城融兴村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('48117dd5b64d7c3a82028afa05ef7bb4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '瑞典银行有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('48599d1043c8b9c01b777f2d8e166b16', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京怀柔融兴村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('48ac53fd720ae71b6884ce486fbad64b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '睢宁中银富登村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('48b506371642ebe6bbb61f058fd0caa8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '廖创兴银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('49ed519f2287ccfc797703ea19124d8b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '苏州吴中珠江村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('49ef24b9f8074dd4eddd3ce4364ec0d8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西陆川柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('49fd8d707b9e446b5a4c79b56ace6812', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西壮族自治区农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4a6a677b64bdfc2fa03a73b603d96ec1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '辽宁省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4a9fe181d0925bd7cf939439d8b5c4db', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏溧水农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4b131e20a6b3e71db3cb052b68560b38', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '香港地区的银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4b8298683f875e28ade2088213b398ad', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江临海湖商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4bd7c8ed20bd60718f4262fed06092af', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宜宾翠屏农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4bf2fd99279e2e48aeacc09ba2aa4d7a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '乌鲁木齐银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4bf354aeb4b09bbd9d19bc46cbb688d1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '瑞穗银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4c4d753f15420b213e7c385b195de945', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江瑞安湖商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4c6fe4a202c3ce55d1c3bfb1b4fbf23f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '稠州村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4cb23fb0995f6920ec0b804dd60be02e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京门头沟珠江村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4cc823b6b1004ecbf2b2bde3bd941734', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '东方汇理银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4d0963ac0232d786e79b9bf64b3a6bf1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '比利时富通银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4d58c423e0ac660c91a2f307ed73fe6e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泉州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4d8c8f80e5b778b8300d375201130de0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川天府银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4e06096a4a600fa45038dd32f973ee91', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4e4e422a61b9b78376b2b9b78e127743', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏江阴农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('4f2be4c96c65474b5973623a19135374', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '眉山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5005b21e6e6a1ffd0a163be0fd1e7d2c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '澳大利亚西太平洋银行有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('50732a5fab9a9072a645489bed14e624', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川叙永农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('51819c0fe5f8d46cec3ce1140b130f8c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宜宾南溪农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('518f83b7b1fe58f0590877fdbb3abcaa', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆彭水民泰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('52286444156ee6fe4d310dfad663de87', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '雅安市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('52bb8347583b8ed6ce08e45c33dcc28a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏仪征包商村镇银行有限责任公司营业部', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('536f9b590f9b9fd49452879bfd2a33f9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '内蒙古银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('53f5ad6775a80562f7d449e343be1a16', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '恩施农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('544d3d586292e86a8eea5e758ff285b4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泰京银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('54c62f4963ce347dda00f1893701e607', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '玉山商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('54d18c8f9e3b07587ec2b7a1d07dd7d6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江云和联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('54fa1176cc034dd21140ea2a92ac4e5c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '温州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('55193ec61f8bbf6f9caa29011e6af6ea', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '孝感农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('55610d25c65275515af84eb520b12de5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宁波银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('55b5febe462ac0460a35bed1a94e0b47', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '天津农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('55da858b230d4876839ac44205fb8565', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '巴中农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('55eb9b0999ec079b69e0bd0c33f03185', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '吉林省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('579665e92e445dc076d2c7005b02a792', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏宜兴农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('57b98e410d534969b52b8700356f2fc1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江平湖工银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('58056bb303f5df33886a97ad8b71c2b2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '松滋中银富登村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5831aeb6aeb3c280628183763f58fd23', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆江北恒丰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('583e81e8c48e8bba1b03826ab7297873', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆忠县稠州村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('58460a22889db2af1ccc8668e24e635f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泸州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('596ec2a817e260a9dd453e82d20e44e1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏新沂农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('59de74442f3262a5f2d9f7446277da0a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国光大银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5a1afaa0a39fe741f769e3b2fb9e21c4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '协和银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5a400184098c7e6a8f51cfbfe505fd2d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国人民银行公开市场操作室', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5b451262c4d54f36e0164893f2c74683', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川乐至农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5b64a8dffa5e8f2d4cf3fa48abefdb61', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中银香港', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5ca6a290a42a086448a04f7101f133ce', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '德国商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5cc248ff607210dd470de73001e66348', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '新韩银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5ce7c2e7b9d5bf8bafec710ada3af87c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江网商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5d049ed5bb434c6f9603edd936196a55', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏海门农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5d101c966d9b243d452b6bade3a67de8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '其他商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5d5720333245f5fd2a82dc66a8d8c4de', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '丹东银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5e6ebd2e9740a19c352b58d0e387ad39', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '国泰世华商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5e98f701027c60bd2f4c999722900175', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '枣庄银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('5ef86d489e016f04c184104a942040a9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川剑阁农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6004848fcc1bf7d47393723596058f78', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '辽阳银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('60326a97232ed10e469854936f568c7a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广元农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('606630b5ba906a947200645f7242f24f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '遂宁农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('606be7b905b9d237cc869c96d1c6ee98', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川阆中农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('60af6339d37e085a2ec0329907952cec', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '银海国民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('60c6da8412f52b0cf113854fa68dab54', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川江油华夏村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('60db35e57e3a8c85cc6088b969c61a56', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏如东农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('61ba86fa9ba4fe544ab55a6e630d6243', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '永隆银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('61bf38262a9a4f82aafe54306a323f02', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '彰化商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('627a4ed7ea3dd9f5a7f2e984bc453bc3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海－巴黎国际银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('62cf96d26aa97248508713c9978086f2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏靖江润丰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('630b51e31f729c32d32ed304e6bd314b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖北三峡农村商业银行武昌支行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('63f464b1de1bc5d749522b9b89409c8e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏南通如皋包商村镇银行股份有限公司营业部', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('64168412d477068db972ad230b15419b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏淮安光大村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('64641da79fb89a48f52d66fccf0fb835', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '星展银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('64c4230f4afabdc00696aa9275c1c67f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '锦州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('653750f3e94e564729253c5ea20d51df', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京大兴华夏村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6558f10ecef42b9a693e23ac6bc13bef', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '西藏银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6592d79f766ba0cdb44a25a51fc70928', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖北荆门掇刀包商村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('66667036f690043b996b83a0aff97f0f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '雅安雨城惠民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('66a9a8512c64e390e90e91ed20c4bd97', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江江山中银富登村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('66ba70c292158fcb7ccb08ce07151a7c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京大兴九银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('66c5730bd052ae6cf5c67e944d01e461', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆渝北银座村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6794028004d4323574a27a724435fb8e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏扬中农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('67c2c51c9d9a1622f9ebb2d895c49a7d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6854918597cc612146031da889a690ce', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆永川北银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('68660367e66cfe7819eaf2f1464e7e28', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '攀枝花农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('68f66aa66ab3982506fbb2035ecb1db4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆市沙坪坝融兴村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('699f6d816ca79dfac5d1208762b41419', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '陕西秦农农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('69c67d08e63a267b3a0e7784563b1531', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '日照银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6a40d7e8a42dc6488122017ec9100a7c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宜宾农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6abbd456242998ca10598268122f2f27', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西北流柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6b09470f3fb061d3b4db5d1d2a9d8eb9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国工商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6b30fc985ed216cdab29b204b8352726', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国银行间外汇交易中心', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6b376c179dace6823ffa825fdd6dd058', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '巴伐利亚洲银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6b3abb692a6ec59875c75efb37391d06', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '内江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6b9c63da474d819b5e038d9adddb24bb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '三菱东京日联银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6ba338ef608feb320b00fdf5a9b42599', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏沭阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6cce98af457ce3a057a46d8977fa7afe', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '台湾土地银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6d1408a71222b042640a3be9248c03d4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '韶关市区农村信用合作联社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6d142777c9df8e089b1d422cfc4210f5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '农村合作银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6d17222a04e04aa6bbfc80e120dd4bd2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '阜新银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6d6c3a8cfc73c1d3f3069d059fb57130', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖北大冶泰隆村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6d6e07953d14da7ec048a0c775ae1973', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泸州龙马潭农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6d8021a7b6965b60acfb08271ce9c327', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '瑞士信贷第一波士顿银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6db26aa5afef042fe6a876e475612967', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '无锡滨湖兴福村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6ddf1c257f39633ff8ec8796d384b5a5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '韩国外换银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6eef3b4615a346178f85d8713cfd6eb2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '成都青白江融兴村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6fad523c52bf1476b6fee8abe1b6aa08', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西博白柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('6fc984010a28ffd4fe91fd7a2b2b77fc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江西银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('702ecb2f47350a89f0fb7994f75a84d3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西柳江柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('70a9f8b692ad7f342df596e3b45c49bc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '遂宁银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7106d583992bd19ee2dc3ef51bc447c2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('711bb6adabfbf3ebacec3c0c3b1d3d49', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川威远农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('712a5fb134dfad5f5f691a29ee683d02', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '甘肃银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('715c64879a0528add74ee4d8a94de961', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖北省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('719f99dfaffbc67a8be7cf28e384fd53', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京通州中银富登村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('71aba19e36c0dbcedb776f13ba1a1843', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '邯郸银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('71e92235ade666e9eb1d8878f99e110c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '桂林国民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7297ec69e505c863f800f67c05378866', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '河北银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('729abedfaa3d7e7d888a17268e341a7f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中山农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('72c3aecddf7ac315e6c8a8c009a5e3e7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏宝应农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('731b2fefbb1fdeeb724d5f0ca86735a8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '丰业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7347079a281fba4827ebcb2240b38ff5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宜宾市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('739949fd4f07975334deb9d9817e257a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川什邡农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('73e8a279441a0642446ef573cbc32487', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '遂宁安居融兴村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('73fe7ab5b3465240d66401d3c413c5e4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中银富登村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7445c7a802e57c3cd8f65deb0f2afeba', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '法国里昂信贷银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('74632840aa95c45f37ef4ecdc254efe6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广发银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('74bfa75515356e5455c81bb8f43cff0a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏泰州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('74ed18e9087c6434ee77e5ddc27d1c2c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '友利银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('752be8a409e1aef7741f36c403200f7b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '吉林亿联银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('778aa536dfd4a943212141fd4310fdd5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏海安盐海村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('77c10938d1ca9de2c54f52fc89ccdf5f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '营口银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('781a87b90e0012fa5c58a670b98b3fd9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '哈密市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('784e8b4a71ca5ed2ecef9fca2d72d602', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川绵竹农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('78d0227938f8a31149c18f45c37100ff', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '秦皇岛银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('790fad69fced24558b83bdcb9aabc7f0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江门农村商业银行股份有限公司 ', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('79cbcc8a3aea5a690a40a1928fc2be88', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东河源农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('79f19bc9ef81995d692009ce99011ec0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川高县农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7a60ef090cfccfe33693a51865c6077d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川安州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7b1f77082d915df9b38044c2ea922dac', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川大英农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7b39787ef1f6b1df393be1cc4aa76541', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '富滇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7b3dd53a184f4ec1e281a98970ba219b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荆州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7be76913c3f1aad0ba200bc04ebfb8a2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荆门农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7bff1a97bbc27b14299f32cc54797616', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '金华银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7c448e9dc4575ad035c306eeccf5ffbe', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川屏山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7d1fdbeba67e0e9118dfdea7a5b94ac5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆南岸中银富登村镇银行有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7d7f33ecc4fcb4a19dcb028946b8724b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荷兰万贝银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7e33b5ec3aee60c9f2fca7eee7a8765d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '张家口银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7e5365b6acb07ffe265ad1349e3e2ad2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '法国巴黎银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7ec2b7086f4f022c17ae2155d429f27f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖北银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('7f47f8c971b179f09810fcfa5b742dd6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东清远农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('80040cb1ebcaac653d9e8cffee14efa2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏盐城农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('801c4e0e6b7f1f3819710848db2b1b0f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖南省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('803a9b4034e480981a88922f34fff7e5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川珙县农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8078ce57d31337ae43c6f3bfb346fec1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '珠海南通银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('80ad48138d60fb9ebde8e6c9ffc9ad0d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川古蔺农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8130ba6e4539b7f8abaad1bbbecb4743', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '临商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('814121bd43fc41c675ed87097b4baff0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '盘锦银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('814a79112e35206ccab7d20849eb3e97', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海闵行上银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('81c84b10bc998eadc7dd0fd681ac9d74', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川平武农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('825b1ff750907d95ac9bb36bc1fdda1e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '灵川深通村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('82919433b611072b83560a9ccda0d3bc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '黑龙江省农村信用社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8320e646e1691e79443ae28b40756b8a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '大连银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8329f0dc317a6e65566a23eaa9313c37', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '咸宁农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('841c66f09d04ef943d8ef677823e38a6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华美银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8527c4d464aafadaa6225dff72e634a4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏金湖农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8528611dc84dc9cb42efcaf2dd7f8ca0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国民生银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('852de59659c3cdb2076d6d27ed6328d9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '美一银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('861beb376e4f1706c4f996259c38b94f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '自贡中成村镇银行股份有限公司沿滩支行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8623be81e6ac600193a5d376804df226', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏徐州彭城农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('86415f11eb50f8ca3c688643a95c53fc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '兆丰国际商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('864498e7024d86c59ba162e164921f37', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏建湖农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('86d5fc515598cdb4de7884f8f5b3166b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '长安银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('86fc9fb5bdd16310b0b20ee18aabb9ee', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川新网银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('872ff518dfd0dd4e8f963454df8108fb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川武胜农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('87425145f9bad14cc3df02b2f3d8bef2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '台湾银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('879b84a40436d0f467e3982da8fab220', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '国民银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('87d7bed0d42c7f8e509283dfc807efa5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '甘肃省农村合作银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8848fa2e50f5904be8abc2f2b87b4d9a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国建设银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('884c6824ba855559d990fcc3630d5721', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '黄冈农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8856189cb87d667fe38a60d7a60eabb1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏常熟农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('887c43bd63f065f50b2ee5971a0e679d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆九龙坡民泰村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('890810799fffccedf190f4e65a6209a6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏大丰农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('890bd1846cbb24685a594e7a11247d0a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '深圳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8a44e63a41b60f26866d8f86198e66be', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '城市信用合作社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8a6d61ecf28679517d345c8cd78fdc2a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '梅州农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8ab9457e340121addd6f57d322c22ab7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8aca2d5af73b8099a9169d11f8ce8213', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '德国北德意志州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8aec8618d4c206f0df0bce30c0790b27', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京中关村银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8bcc1611641240c02017b2029968d933', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '苍梧深通村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8bf859f71a3acf864bbc95ae9a652ba1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '横县桂商村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8c34ce81ecc92288e5c34a5cc8fd6ef3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上林国民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8d0052f6304428c00560ef128fde37bb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '昆山鹿城村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8d068ec161a3fc30d7f7961e02500801', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江稠州商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8db2a2d3c0aa4e74678cf0ea9a0cd958', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '法国兴业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8e04edef60b9eaff51a71e8c52547628', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '首都银行及信托公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8e855ba5805c23a30ee6d68e004027d5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华夏银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8f048bd23d704de7cc452fe7e9f64b9f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '东营银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8f57872902713839f2a12b39bc34d873', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏沭阳东吴村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('8fe4a0399004e02ec8970901c771d558', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海浦东江南村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('908c7c2b79aad800717e2a2f39695cf6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '温州民商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('90cbf2b22b8fd4dc091b8b6b1c351873', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '恒丰银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9270c6c74d0469c13b3adc2ef59eee25', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '华融湘江银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('930773ca9a8924d107d06c4d076546d3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆璧山工银村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('93137e316c49b4166524af226021d490', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宜州深通村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9314c36d94b3dcf7c85784e3f858bc96', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '天津金城银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('93192cf884eebed62696d8d10168e40d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏东海张农商村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('936c41ac3fc7eb72eaf73a56cbbfb0dc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏泗阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('93a95619e60454ec2a6fbc9930fa126a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '湖南三湘银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('93c2c85000c56ceeddb196846f505a1c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '第一商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('93f30b870c96cd105c07603a4d6c79ef', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '大华银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('93fa8d5aaf2b32ea9b0ad77edeb71ce2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('94c5eb5074a22d7d3b47b7878b5daee9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏丰县民丰村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('94fa636b6159904c417762d8f41d09e8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('964c998f3c67acaac9b1f194070abe1c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '德阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('967c4b24e632cc32bd89bc4623db5de9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '集友银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('96b440a2493f6cefd66e5ed409c7b0f1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '贺州八步东盈村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('96cec28a337488fe82ecb2077f1ff37b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川峨眉山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9711cc45b319b0228f9d5b373f85a77c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '神农架农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9753854d2df914d17d93d9c2d72e9f75', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '潜江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('97e20ae70b4cddb80501a3dd9afcf7aa', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '无锡农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('981bbd0224665c02a2086992ca48ed28', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '亚洲商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('985dbe9b4a39366605bb35aafded80e7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏涟水农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9928a4cdc49c65362abc09c0a703b87c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏高邮农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('995a26033b39215f78698d02370dd77d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '汉口银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('99cdcac59bda99473c4b3520fdef7121', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '深圳福田银座村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9ab220edaed7ebe1f4db4f51fb59ed38', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏徐州淮海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9ae4821cf26fdd798a20d45cd660cb3f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏睢宁农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9b33bb6c281edc5856d45e30fba0ac72', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '海南银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9b64b8db49ba58dfd82b0732bff0e234', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '韩国产业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9ceba5cf02c9bad68030af4ce480ff02', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西融水柳银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9cec4980c482f3e2e889fbc8adc50f00', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广元市贵商村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9cf9bd4caa1ed37502e7d884c7002924', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆富民银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9d2afcce98c7659b72fb26ef47565278', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '威海市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9d9b13f5d0f02c4b359637a82298e8ac', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '武汉农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9e72c508370eabe2a181150d55823228', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '曲靖市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9eabda3019539c4882527ea85a7ad4a1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '纽约银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9f251f955264d52f7cd50dd0e5bb835c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '西德意志银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9f5889d1d5aca7163e15139953a3f75a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆铜梁浦发村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9f8c7ecc82634041ff93cc4594b6fbba', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '福建华通银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9fab463af0ca11cbf9120f5d232d22d9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '赣州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9fb3b7a72535bfa66a263158e3daaf52', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江柯桥联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('9fcd9cf37146a66e47f692dd3242cd0c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '南部县中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a06e4d220be79a11c3b25b225817a549', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏沛县农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a12913b595bdc83696df6bf4cbcf4c58', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '都江堰金都村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a15855fbbe9aa7b35e20905103ba8377', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '马来亚银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a17860892546335987c8167db2054fa4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏江都农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a1f4f3e952607dda7ca8cd84a301fd13', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川筠连农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a21e84726eeb7839587da9a9f0f00339', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西临桂农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a37355cb58f4cecfb1a989a7f0b87d68', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '石嘴山银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a3e36a523d4551f00528b5e01548b35a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '金堂汇金村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a44d3b7c6ba4fadf9399b06577961303', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东阳江农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a4e6450ff5275374f57e08bbdb779d3c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '韩国中小企业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a561e93a554a6ed64c8fd6777a7571ab', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '包商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a5ef2187982f942ac9285588b413c67c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '海南省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a67b0f45bb266ffaf86309af4857e3a8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川广汉农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a6b784e3d9c8741a194179b1c8481f30', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '瑞典北欧斯安银行有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a7b2cb07e0e1f62a8adccf08d5c727af', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '财务公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a82e68dbe943721cb9af011e0bc0bf47', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川华蓥农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('a92a47cf85365d83395256b02027ff10', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川仁寿农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('aa3f21451eefd9f3b18134d03e997f22', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '陕西临潼海丝村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('aaf21799d8d63bba9e4b73d0ab6ae3b3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '平顶山银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ab784f92fc77c522fea60f0f9895fb56', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏泗阳东吴村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('acbf2a570add4f35d782fdf0e314a636', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('accc9cd2cdb51da4daf73e6c570d16cf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆梁平澳新村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('acf38242188b8766adeaaecb9442edbf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东南海农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ad313eb684e691dfce36569638650115', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '盘谷银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ad5b6c6d2a607f7d5dce788253b05d0f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '田阳兴阳村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('adbcc090afaf531f31147c62d2cf1109', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '英国巴克莱银行有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('adc8bbd3949529ac58424f6cbe94462d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '扬州广陵中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ae081687e51ce557594f343ab588352b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '青海银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ae0f8ae09c7bd16445bdda3c181e0806', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海松江富明村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('af3268686131215d14474843c79e1463', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川苍溪农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('af5bdcd43a90ce5aef6db0998c031a2b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '什邡思源村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('af934460cdc7fb26f32ce893b67f3585', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '句容苏南村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('aff435d3aa913f06440dd5e846019327', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏滨海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b07958848ebc8dc4355cdc2d4dc6f83f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏淮安农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b0cddf536017df0fb63078fb3bbcd907', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏长江商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b10322dce18453033ff5bf2f63e7d3d6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '晋商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b1269732b6ac58156a865401efb23bbe', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '福建亚洲银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b1a2bad6db9b77d1c09aa0f0409005e4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏灌南民丰村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b1d03c66436677493f966292c10d786c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江萧山湖商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b21142ed60d4fee016a22ca5b841ea9c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '保定银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b27d12febc271d01c2f2f6d658df6a2b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川青神农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b2d1356b5d38c2076988b876c58e17dd', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川西充农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b2d6b1e096ee5d79d900ae0ec9c68239', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '建湖中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b2f3d4cf1b3b66933ef23f1648d49988', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '乐山三江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b468b93c1ac19a735486820056a17809', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '乌海银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b5657f90130439bf7ded38b7f9b6f8dc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '盛京银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b5feeea31e64ee5aedf604f3f4078aa3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川三台农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b6a95a465387eeb348482ef709fc4b64', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '山东省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b6ede45e374d9f4ed006408a314fa178', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆秀山北银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b7c7b0c185f67db36a3aaeaf8e89063d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '其他商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b8de48a7602f28f09dc7632ad53319b0', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '乐山市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('b8df14e84aaa2dd4dfcdcbf30fe2db07', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江建德湖商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ba3d05ef1a7d5203a5113d3a416e87a4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江天台民生村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ba3fc3303847cd04c5dc2fc25ba431aa', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏东海农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ba56b0e2c8b7c86a8894f4faec0c8bc8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川泸县农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bba1a2f4db41b055991778265aa53373', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '法兰西银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bbd28a65849acc2aac2aadd339b3a5b5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '汕尾农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bbd894d3a1540337931339df644073d7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川宣汉农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bc6712ca5b8b985c6719c0eebef34c4a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '日本横滨银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bc8d3cdb2733d72b7cd935a571bede68', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '齐鲁银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bcb5ba47fd2025a64631d563598ab505', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏紫金农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bce9c8e941d54152c5684cbbdb20a989', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '柳州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bddf38c94d1956d2df3e43f98a7b8ab3', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '交银兴民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bde8d11f3ce2beeda58f05d22ed169a8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东南粤银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('be5afcc257818634cf52492d7e0d7aa8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bea2068ec4e52e2ab60dc92c9f916325', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '阆中融兴村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bea4b31b834cef397f4e02b7280f701d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '邛崃国民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bedc1606dbd227546819676525e06f75', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '新都桂城村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('bf4fff81858d594c6af5a1eb96e79247', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏射阳太商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c00b2409a4e481ed4da61ea7bd947bdf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏丹阳保得村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c01a1f59a8d164b2de15c3772379262c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '瑞典商业银行公共有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c034c69105075e8374bbfbb43b15ee51', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c0ad0d91053721301c2269a271a5c6ab', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆市酉阳融兴村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c0c47f841b9d00c839e6bab1c69fc0a9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '葫芦岛银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c0f6dd163afade36b0510113b01b0368', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '邢台银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c141e582c2c31dd2bed5057d1175b8d1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏盱眙农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c178890f0909228b37fc4d1d1f714695', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '成都农商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c18337862eb110b54d114dfd9a6f1bca', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '太仓民生村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c25da708437c50420de0b7b322c54313', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '新疆汇和银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c3e9d96ce889c64f3dc8af42ae450514', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '朝阳银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c4881228407843de73c648332f9090eb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '吉林银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c4e532ec5d15c7ce4752e1d02225abf4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海浦东恒通村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c517862f715d6ade2ae39354c88ee67f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '民富村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c53f56da0de0c16332c2b443a8cfff66', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏阜宁农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c5511e57d975c0e7ebabd677eea38331', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆万州建信村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c55714c02e483b080640e322f7f88c7e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '永丰银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c5d38cbec26e464de0ca52b208a25ccb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '洪湖融兴村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c6783c56c8b7252115616df12c776b2a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆市大渡口融兴村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c679511b9e7928d9e29a1b25f45529ab', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏南通农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c79c5b1cd59517eb696d68abecaebd91', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '昆山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c79d8fc6c69aa2e4b48b01ee399512ea', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏江南农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c8198564cd206697d534eb7b0ae68169', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广安农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c84dec7c685a09a94cc0e2c611663c5d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '交通银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c9127560ce1acc19feb4f533ae245c2c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宜宾兴宜村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c97cda7f2f1e6543d07fe45acb1ccac2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '连云港东方农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('c9c2f97ad9c4b0c6231c2652ddf62485', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泸州市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ca3d20eba03ddb93bf9b8d7768a5d0cc', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '荷兰合作银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ca933cc19a8d49900324c0e881cf17a5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '合作金库商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('caa76fe3ee1dd9e3c80ffda0e8e8bd81', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '资阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('cb89c0fb44636cdf6822872c64e2aef9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上饶银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ccad00a0d39156f403715a1a437e5ca2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏民丰农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ccf8bd776c2dca1651a33d703c42268c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广西北部湾银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('cd17797732032aae8144a14e88dcf8ce', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '瑞士银行(中国)有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('cdbe32d3d2040e3e8224638011c5c579', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '澳门地区的银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ce9e94bde5bd8f45a36719d9f489105d', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川射洪农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('cec441a3aae3deb964fe386e9b516dc7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '资阳民生村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d04d202f965a54a1c5cac908924351dd', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '筠连中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d0a54dcad9709a6c3ee2dadaa8e452ad', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '海口联合农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d100cdc1d79760776b1d0ba4af3f7beb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '贵州省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d132f81bc4c780563a08f8262ed0bdf1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '武汉众邦银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d1f54a283bfb16d20ae2628808412873', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏高淳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d232f9b25be0732a2e7c0cf6440163d9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川青川农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d2484ff068f36683401de253e15b5f84', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆荣昌汇丰村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d2a7eb485b2592f0ba0e5d1841e34805', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '美国银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d2ea066d59a20d8e429b7b8e23e47a9c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆丰都汇丰村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d3b6762248dab3a7dec9b9f304c2a8f7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '本溪银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d45a05adf7a2ad03a24acd1e42328f11', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川仪陇惠民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d45d172e1076cebd589689dac62dec45', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '东亚银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d48d7190cab247d7a3dedc430533ea9f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏射阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d4e6a0834901b29ce344edcd714c82de', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '营口沿海银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d520ba9c8ec0415e557b3c69edec6ff1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东开平农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d56d2a6e2fda9034b9399454ab9bc36e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏丹阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d601e025dc9b4553879707deb1288a2a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '厦门银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d62a2f8993df7d40a78217c8b55558b6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '峨眉山中成村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d6f94f058455e4299ed4d1f023e5513b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中央国债登记结算有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d744ff8c55d14ee67f3d759e7d18f8f6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏徐州铜山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d7a850f482560ecd7e9e07827edffa45', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川大竹渝农商村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d80234a79a90a367f9a0f60bcebf3521', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宁夏黄河农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d855e6a5bbd2183f1a23f3d5db86f46f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '南洋商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d85f2dfff95f70318febd322bba8883f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏紫金农村商业银行镇江分行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d881c8afa5843746d83c6faeeea474d6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '九江银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d8c6c5dfda50ef4b561a70793500ce47', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏泰兴农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d91ac770f8750637663039643fa47a5e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '烟台银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d931734952b9db83bf4e7fc24881fb11', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '兰州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d9b573133261f09cd9b469e25de0a9b8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '南宁隆安长江村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d9bb793265ebda321a24317117d66117', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏响水农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('d9f31cfe00e1fafbc2a074e5166fccdb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '苏州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('da0b96803019634736939fdc889e1906', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川简阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('da2858333437b332ff63e39063cc2c14', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏通州华商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('da54e97b3eb114040ef4dc1797ab592f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '农科村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('daa3fddf8694de30a85408cbe2e9a66c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '大连农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('dabd220d62c1d50a2e8fccd3b5452290', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '焦作中旅银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('db266b3185809cb238404cb84e159ad4', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆三峡银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('db8f4ff91c5ddd4c376085e14f8e89b5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '贵州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('db93c5359ca56ab034812e2eeb05b6c6', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '潍坊银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('db9f4400886645ad806cc2f23e9e6392', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('dbe0d034b4c246fe0b21a8f7207cceb2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '云南省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('dbed4cb0b71c145cac5db0bed5b7132e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '防城国民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('dbf1476cf0bb30c9dd6145d4cdd8d713', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '仙桃农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('dd0c1e364018b147d2f72202906500c5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '绵阳市商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ddfcc7994180f5e7d5140ee20969a22c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('de6ce635e6c150453a5668b21b2e69cd', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '河南省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('df2593f3fa84f196047957bb664eaa2c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '郑州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('df4d14a7755e5fcae61b1bd43ed0fd26', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏泗洪农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('dfb50ecbb8b5c4242bdc9ca54d879411', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '天门农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e0421ad08f69880a5eefc5497aeb05c9', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江诸暨联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e09abc329127402f51b1a8cec27c2f25', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '日本三井住友信托银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e17c705b343b91037fdb7d97735ae163', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '三井住友银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e1a51016d8d92e706fe529ff80f7fbad', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '大新银行（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e1bfc38da3a8b30b06a9e09e5dec49a1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江乐清联合村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e1cbfca461bdc5301652e20417ae9d13', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '百色右江华润村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e2174c538a0d195932b98cf482e12360', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宁波东海银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e2997713a73a5da7cc52e5b810d7548a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '新联商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e2eaae8afdbc5ddf1116ee3e8e854c5f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏丰县农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e3d324dff40700f5d0dc3a3e4bef66ce', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中信银行国际（中国）有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e4a6d9864fe0b310b890efbf0a464c05', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中信银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e4b26a13e75c9e0c1856eac96ba1678e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川仪陇农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e4bef82171483d64a653a30fd5ebf48e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '资阳雁江农村合作银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e4c8a8563b07ac7472a3b84614432db2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广安思源农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e509990bf00be565feaa6ec488abe4f7', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江泰隆商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e50e94104debec386307c5b6247f61f1', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '彭州民生村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e56f4b6cd6b7be3bd0c7222016fee22c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '奥地利中央合作银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e65a501a150c41d4b88279be22825289', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '鞍山银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e681a922ed568a6b9754fc878549eaa8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '崇州上银村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e685f0734e41b298c08f1437db9a6d2b', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '太仓农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e6b68b457fb2f83fb8e573866648b394', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '城市商业银行资金清算中心', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e766cbdd4e202ecedb87b317965200d2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宁波通商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e7d625560cd7612517df918f547c2c76', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中国邮政储蓄银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e8224357b3791157b12222e327924cbb', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '陕西省农村信用社联合社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e86f552ac7a63bb83f818cc903ed897f', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '金山惠民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e89c4493a56b0e068513a4ae23dbade5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '法国外贸银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('e9c72ca3594399f4d2d34883945e0780', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '宁夏银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ea7b2c2d52390ad5dd4bc2965311e87e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海嘉定洪都村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('eaffad636b63d9a79d196b738eb34418', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海青浦刺桐红村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('eb6e2d21c5813192cb99fe5d6b0782fe', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京昌平包商村镇银行营业部 ', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ebadc1c834c78e3ea36660cab5f1762c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '上海浦东发展银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ec23e1213d3d93aeb4e5600ea7a368b5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '兴业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ecfe08ba73d3ce8a2e73b5f1962f476a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '泸州江阳农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('edb532e3b8933a689700fc3741ad8940', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广东鹤山农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('edce2a98c52783e6eb1285dc0fcddb96', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '葡国储蓄信贷银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ede219e57be0712874548af8e8d81a41', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆大足汇丰村镇银行有限责任公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ee059c25d95d7367b96d9fade4676938', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '鄂尔多斯银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ee4628428dd495a238a2a2cef3a83f4c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川营山农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('eec24b7c0156f1da7b6e21b33cdedc1e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '达州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ef053bbdd933f8bf9731eee9b0e7d49e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '北京延庆村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ef87d577b460c7b27b9c7f919be4f639', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏赣榆通商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('efe1cd50597f4457d5f5efa4472dbc73', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '铁岭银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('effb47f460e0a8b33e030db87506b483', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏扬州农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f0a715eccbba98594609d7ea90ff854e', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏苏宁银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f0cf33c5c1086d5d9b9ac4bf4e97d871', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '鹿寨渝农商村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f1703cf3c63c6a369fbfa203d2aab547', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江龙游义商村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f356c27b68e7035a6e7b0c6fb85c7405', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '茂名市城区农村信用合作联社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f362a37e541a468aa2cc88c2c77663ab', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江衢州衢江上银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f386d061a6f217a7ea3d24aa9f9a4161', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '晋中银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f3c67089f4b97381933dddfb39706486', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川罗江农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f46653f12946b675a9c5d2a108a3ff08', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '兴化苏南村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f4ab808f0d0ba941e23f0d9f6c344239', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '廊坊银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f52a616ac0d0cd575c1c212d9e3aa545', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '浙江民泰商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f681a71a8b01f934e01638d9ca7d4475', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '台州银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f6895a59f11f25a9fd3d93f7a16d023c', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '南充农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f6d9ff83113229c7cad17e1ad4602a41', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏姜堰农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f76080f1816e49b441101852d97f3eec', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '哈尔滨银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f79d2159e2def9fa3cad11c6c47eb174', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '龙江银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f83fd6bb99bb78300f68138ecd341939', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '招商银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f948f1adcbbf973b3cc67cd4f93d9eed', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏洪泽农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f9c06b9dd75479b49cf25456e2b92616', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '贵阳银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('f9eb7892e613842ec30822098f4abff2', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '肇庆端州农村商业银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fabeee401ce9012819b29d1f11282981', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '承德银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fadbe7f2ec679a11cd9d70f372ac70bf', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '云南红塔银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fb98308392a136a12c9d11d45b117925', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '青海省农村信用社', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fc12e4f05b1592a53f0f2eb625a8d793', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '平安银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fc26d236c0b244b193d81ac54d712783', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广元市包商贵民村镇银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fc3a660e849e0fe6b7e9fd9ac1d845a8', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '长治银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fc79f534d0db716d8eac3b64e30a82e5', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '四川江安农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fcbfc48f0df883a9de0c69203f39fe90', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '重庆江津石银村镇银行股份有限公司', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fcf0e39e3b04ebac07e11065b013c5ee', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '西安银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fd3a81a3b071654a4bcdc1f3942e05ec', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '中信百信银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fdd743bf095ab89f0688227b85a2406a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '长城华西银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('fe43541d4877d2ad426121c1737c6986', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '江苏灌南农村商业银行', '1', '0');
INSERT INTO `al_mod_attr` VALUES ('ff033412b270333f79cd9816057aef7a', '98e1f5f172312a193c6cd73bfee70d74', '开户银行', '广安恒丰村镇银行', '1', '0');

-- ----------------------------
-- Table structure for al_role
-- ----------------------------
DROP TABLE IF EXISTS `al_role`;
CREATE TABLE `al_role` (
  `role_id` varchar(32) NOT NULL COMMENT '角色ID',
  `role_name` varchar(20) DEFAULT NULL COMMENT '角色名',
  `status` tinyint(4) DEFAULT NULL COMMENT '角色状态 0-停用 1-正常 ',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '0-未删除 1-已删除',
  `auth_id` text COMMENT '权限id列表',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_role
-- ----------------------------
INSERT INTO `al_role` VALUES ('adbcfa23919c4c267610c465216045b6', '业务', '1', '1611631491', '1611631491', '0', null);
INSERT INTO `al_role` VALUES ('eaebe80c243dbd77734838189b49a70e', '管理员', '1', '1611631351', '1634113439', '0', '1,101,102,103,104,1011,1012,1021,1022,1031,1032,1041,1042,1043,1044,10111,10113,10114,10211,10213,10214,10311,10313,10314,10315,10411,10412,10413,10431,10432,10433,103151,');
INSERT INTO `al_role` VALUES ('f671e4b60b1424cf286516bfee855f9c', '客服', '1', '1611631482', '1615277552', '0', null);

-- ----------------------------
-- Table structure for al_role_auth
-- ----------------------------
DROP TABLE IF EXISTS `al_role_auth`;
CREATE TABLE `al_role_auth` (
  `auth_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `controller` char(20) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(20) NOT NULL DEFAULT '' COMMENT '方法',
  `parm` text COMMENT '参数',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '权限名称',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '菜单排序-降序',
  `is_menu` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否在列表导航中显示(0否、1是)',
  `is_parent` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否存在下级子菜单(0否、1是)',
  `is_blank` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否打开弹窗类型(0否、1是)',
  `state` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否启用(0不启用 1启用)',
  `lay_icon` varchar(50) NOT NULL DEFAULT '0' COMMENT 'layui图标类名',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103152 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of al_role_auth
-- ----------------------------
INSERT INTO `al_role_auth` VALUES ('1', '0', '', '', '', '基础设置', '1', '', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('101', '1', '', '', '', '用户管理', '0', '', '', '\0', '', 'layui-icon-user');
INSERT INTO `al_role_auth` VALUES ('102', '1', '', '', '', '角色管理', '0', '', '', '\0', '', 'layui-icon-component');
INSERT INTO `al_role_auth` VALUES ('103', '1', '', '', '', '工程项目管理', '0', '', '', '\0', '', 'layui-icon-app');
INSERT INTO `al_role_auth` VALUES ('104', '1', '', '', '', '基础模块管理', '0', '', '', '\0', '', 'layui-icon-app');
INSERT INTO `al_role_auth` VALUES ('1011', '101', 'User', 'user_list', '', '用户列表', '2', '', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('1012', '101', 'User', 'add', '', '添加用户', '1', '', '\0', '', '', '');
INSERT INTO `al_role_auth` VALUES ('1021', '102', 'Role', 'role_list', '', '角色列表', '2', '', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('1022', '102', 'Role', 'add', '', '添加角色', '1', '', '\0', '', '', '');
INSERT INTO `al_role_auth` VALUES ('1031', '103', 'Item', 'item_list', '', '工程项目列表', '2', '', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('1032', '103', 'Item', 'add', '', '添加工程项目', '1', '', '\0', '', '', '');
INSERT INTO `al_role_auth` VALUES ('1041', '104', 'Mod', 'mod_list', '', '基础模块列表', '2', '', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('1042', '104', 'Mod', 'add', '', '添加基础模块', '1', '', '\0', '', '', '');
INSERT INTO `al_role_auth` VALUES ('1043', '104', 'Mod', 'mod_attr_list', '', '模块属性列表', '2', '', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('1044', '104', 'Mod', 'add_mod_attr', '', '添加模块属性', '1', '', '\0', '', '', '');
INSERT INTO `al_role_auth` VALUES ('10111', '1011', 'User', 'user_list', '', '查看用户', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10113', '1011', 'User', 'edit', '', '修改用户', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10114', '1011', 'User', 'delete', '', '删除用户', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10211', '1021', 'Role', 'role_list', '', '查看角色', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10213', '1021', 'Role', 'edit', '', '修改角色', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10214', '1021', 'Role', 'delete', '', '删除角色', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10311', '1031', 'Item', 'item_list', '', '查看工程项目', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10313', '1031', 'Item', 'edit', '', '修改工程项目', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10314', '1031', 'Item', 'delete', '', '删除工程项目', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10315', '1031', 'Item', 'item_user', '', '人员列表', '0', '\0', '', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10411', '1041', 'Mod', 'add', '', '添加模块', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10412', '1041', 'Mod', 'edit', '', '编辑模块', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10413', '1041', 'Mod', 'delete', '', '删除模块', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10431', '1041', 'Mod', 'add_mod_attr', '', '添加模块属性', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10432', '1041', 'Mod', 'edit_mod_attr', '', '编辑模块属性', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('10433', '1041', 'Mod', 'del_mod_attr', '', '删除模块属性', '0', '\0', '\0', '\0', '', '');
INSERT INTO `al_role_auth` VALUES ('103151', '10315', 'Item', 'item_user', '', '查看工程项目', '0', '\0', '\0', '\0', '', '');

-- ----------------------------
-- Table structure for al_user
-- ----------------------------
DROP TABLE IF EXISTS `al_user`;
CREATE TABLE `al_user` (
  `user_id` varchar(32) NOT NULL,
  `username` varchar(32) DEFAULT NULL COMMENT '登陆帐号',
  `password` varchar(32) DEFAULT NULL COMMENT '登陆密码',
  `status` tinyint(4) DEFAULT NULL COMMENT '用户状态 0-待审核 1-正常 2-冻结',
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '是否删除 0-未删除 1-已删除',
  `login_ip` varchar(20) DEFAULT NULL COMMENT '登陆IP',
  `last_login_time` int(11) DEFAULT NULL COMMENT '最后登陆时间',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `real_name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `mobile` varchar(32) DEFAULT NULL COMMENT '手机号码',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_user
-- ----------------------------
INSERT INTO `al_user` VALUES ('040df5a87a323df1fdc1558fdae8524b', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '0', '192.168.0.199', '1634115203', null, '1634095074', 'aaaa', '111111111');
INSERT INTO `al_user` VALUES ('13d92690118a33e7d0d9437c536c84cd', '333333333', 'e10adc3949ba59abbe56e057f20f883e', '1', '0', null, null, '1634032819', null, '某人', '15989765084');
INSERT INTO `al_user` VALUES ('2d51ff492d6bdaa81830ab82c03a3551', '2222226666', 'e3ceb5881a0a1fdaad01296d7554868d', '1', '0', null, null, '1615284069', '1634032491', '刘', '15989765084');
INSERT INTO `al_user` VALUES ('93e9c4ed2aa4e8d1255a177764a11fcb', '555555', '5b1b68a9abf4d2cd155c81a9225fd158', '1', '0', null, null, '1615284360', null, null, null);
INSERT INTO `al_user` VALUES ('df128888b429e8ae7d2e95c15fee9ca5', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '1', '0', '192.168.1.125', '1615544621', '1612436676', '1615541499', null, null);

-- ----------------------------
-- Table structure for al_user_item
-- ----------------------------
DROP TABLE IF EXISTS `al_user_item`;
CREATE TABLE `al_user_item` (
  `user_id` varchar(32) DEFAULT NULL,
  `item_id` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_user_item
-- ----------------------------
INSERT INTO `al_user_item` VALUES ('040df5a87a323df1fdc1558fdae8524b', 'dfd5ab2311c681104a134e791f3ed341');
INSERT INTO `al_user_item` VALUES ('040df5a87a323df1fdc1558fdae8524b', '07cd75036c2befa5c6ace01d015899b8');
INSERT INTO `al_user_item` VALUES ('040df5a87a323df1fdc1558fdae8524b', 'd571d031cfc90d08c82a20aa73932a8b');

-- ----------------------------
-- Table structure for al_user_role
-- ----------------------------
DROP TABLE IF EXISTS `al_user_role`;
CREATE TABLE `al_user_role` (
  `user_id` varchar(32) DEFAULT NULL,
  `role_id` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of al_user_role
-- ----------------------------
INSERT INTO `al_user_role` VALUES ('df128888b429e8ae7d2e95c15fee9ca5', 'adbcfa23919c4c267610c465216045b6');
INSERT INTO `al_user_role` VALUES ('040df5a87a323df1fdc1558fdae8524b', 'eaebe80c243dbd77734838189b49a70e');
INSERT INTO `al_user_role` VALUES ('2d51ff492d6bdaa81830ab82c03a3551', 'adbcfa23919c4c267610c465216045b6');
INSERT INTO `al_user_role` VALUES ('93e9c4ed2aa4e8d1255a177764a11fcb', 'adbcfa23919c4c267610c465216045b6');
INSERT INTO `al_user_role` VALUES ('2d51ff492d6bdaa81830ab82c03a3551', 'eaebe80c243dbd77734838189b49a70e');
INSERT INTO `al_user_role` VALUES ('93e9c4ed2aa4e8d1255a177764a11fcb', 'eaebe80c243dbd77734838189b49a70e');
INSERT INTO `al_user_role` VALUES ('2d51ff492d6bdaa81830ab82c03a3551', 'f671e4b60b1424cf286516bfee855f9c');
INSERT INTO `al_user_role` VALUES ('93e9c4ed2aa4e8d1255a177764a11fcb', 'f671e4b60b1424cf286516bfee855f9c');
