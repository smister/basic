-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 26 日 22:32
-- 服务器版本: 5.5.34
-- PHP 版本: 5.4.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yincart-basic`
--

-- --------------------------------------------------------

--
-- 表的结构 `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Item ID',
  `outer_id` varchar(45) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL COMMENT 'Category ID',
  `title` varchar(255) NOT NULL COMMENT '名称',
  `stock` int(10) unsigned NOT NULL DEFAULT '1000' COMMENT '库存',
  `min_number` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '最少订货量',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `currency` varchar(20) NOT NULL COMMENT '币种',
  `props` longtext COMMENT '商品属性 格式：pid:vid;pid:vid',
  `props_name` longtext COMMENT '商品属性名称。标识着props内容里面的pid和vid所对应的名称。格式为：pid1:vid1:pid_name1:vid_name1;pid2:vid2:pid_name2:vid_name2……(注：属性名称中的冒号":"被转换为："#cln#"; 分号";"被转换为："#scln#" )',
  `skus` longtext COMMENT 'Sku列表。fields中只设置sku可以返回Sku结构体中所有字段，如果设置为sku.sku_id、sku.props、sku.stock等形式就只会返回相应的字段',
  `desc` longtext NOT NULL COMMENT '描述',
  `location_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Location ID',
  `shipping_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '运费',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `is_promote` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否促销',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热销',
  `is_best` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否精品',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `wish_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `create_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '更新时间',
  `language` varchar(45) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `fk_item_category1_idx` (`category_id`),
  KEY `fk_item_location1_idx` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `item`
--

INSERT INTO `item` (`item_id`, `outer_id`, `category_id`, `title`, `stock`, `min_number`, `price`, `currency`, `props`, `props_name`, `skus`, `desc`, `location_id`, `shipping_fee`, `is_show`, `is_promote`, `is_new`, `is_hot`, `is_best`, `click_count`, `wish_count`, `create_time`, `update_time`, `language`) VALUES
(1, NULL, 110, 'asfsdfdsaf', 1000, 1, '45.00', '$', '{"3:\\u54c1\\u724c:0:1":["3:0;\\u54c1\\u724c:ugg"]}', NULL, '{"4:\\u5c3a\\u5bf8:0:1":["4:27;\\u5c3a\\u5bf8:M","4:28;\\u5c3a\\u5bf8:L","4:29;\\u5c3a\\u5bf8:XL"],"5:\\u989c\\u8272:0:1":["5:31;\\u989c\\u8272:\\u7ea2\\u8272","5:32;\\u989c\\u8272:\\u9ec4\\u8272","5:33;\\u989c\\u8272:\\u7eff\\u8272"]}', 'afdssssssssssssssssssssssssssssssssssssssssssssssssssssss', 1, '0.00', 0, 0, 0, 0, 0, 0, 0, 1388067930, 1388067930, 'zh_cn');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
