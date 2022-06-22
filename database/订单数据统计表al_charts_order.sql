DROP TABLE IF EXISTS  `al_charts_order`;
CREATE TABLE `al_charts_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_code` varchar(100) NOT NULL DEFAULT 0 COMMENT '服务编号',
  `current_status` char(50) NOT NULL DEFAULT '' COMMENT '订单状态',
  `num` int NOT NULL DEFAULT 0 COMMENT '统计数量',
  `date` int NOT NULL COMMENT '日期',
  `date_format` varchar(20) NOT NULL COMMENT '格式化时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单数据统计表';
