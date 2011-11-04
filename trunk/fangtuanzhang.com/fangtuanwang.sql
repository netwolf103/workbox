-- phpMyAdmin SQL Dump
-- version 3.4.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2011 at 05:55 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fangtuanwang`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE IF NOT EXISTS `ask` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `team_id` int(10) unsigned NOT NULL default '0',
  `city_id` int(10) unsigned NOT NULL default '0',
  `type` enum('ask','transfer') NOT NULL default 'ask',
  `content` text,
  `comment` text,
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` varchar(16) NOT NULL,
  `code` varchar(16) default NULL,
  `partner_id` int(10) unsigned NOT NULL default '0',
  `team_id` int(10) unsigned NOT NULL default '0',
  `order_id` int(10) unsigned NOT NULL default '0',
  `credit` int(10) unsigned NOT NULL default '0',
  `consume` enum('Y','N') NOT NULL default 'N',
  `ip` varchar(16) default NULL,
  `begin_time` int(10) unsigned NOT NULL default '0',
  `end_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `admin_id` int(10) unsigned NOT NULL default '0',
  `detail` text,
  `money` double(10,2) NOT NULL default '0.00',
  `action` varchar(16) NOT NULL default 'buy',
  `state` varchar(16) NOT NULL default 'unpay',
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `zone` varchar(16) default NULL,
  `czone` varchar(32) default NULL,
  `name` varchar(32) default NULL,
  `ename` varchar(16) default NULL,
  `letter` char(1) default NULL,
  `sort_order` int(11) NOT NULL default '0',
  `display` enum('Y','N') NOT NULL default 'Y',
  `relate_data` text COMMENT '相关数据',
  `fid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_zne` (`zone`,`name`,`ename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `zone`, `czone`, `name`, `ename`, `letter`, `sort_order`, `display`, `relate_data`, `fid`) VALUES
(1, 'city', '', '西安', 'xian', 'X', 1, 'Y', NULL, 0),
(2, 'group', '1', '城东', 'chengdong', 'C', 0, 'N', NULL, 0),
(3, 'group', '1', '城西', 'chengxi', 'C', 0, 'N', NULL, 0),
(4, 'group', '1', '城南', 'chengnan', 'C', 0, 'N', NULL, 0),
(5, 'group', '1', '城北', 'chengbei', 'C', 0, 'N', NULL, 0),
(6, 'group', '', '城内', 'chengnei', 'C', 0, 'N', NULL, 0),
(7, 'group', '', '高新', 'gaoxin', 'G', 0, 'N', NULL, 0),
(8, 'group', '', '曲江', 'qujiang', 'Q', 0, 'N', NULL, 0),
(9, 'group', '', '浐灞', 'chanba', 'C', 0, 'N', NULL, 0),
(10, 'group', '', '经开', 'jingkai', 'J', 0, 'N', NULL, 0),
(11, 'group', '', '大兴新区', 'daxingxinqu', 'D', 0, 'N', NULL, 0),
(12, 'group', '', '西咸新区', 'xixian', 'X', 0, 'N', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` varchar(16) NOT NULL default '',
  `user_id` int(10) unsigned NOT NULL default '0',
  `partner_id` int(10) unsigned NOT NULL default '0',
  `team_id` int(10) unsigned NOT NULL default '0',
  `order_id` int(10) unsigned NOT NULL default '0',
  `type` enum('consume','credit') NOT NULL default 'consume',
  `credit` int(10) unsigned NOT NULL default '0',
  `secret` varchar(10) default NULL,
  `consume` enum('Y','N') NOT NULL default 'N',
  `ip` varchar(16) default NULL,
  `sms` int(10) unsigned NOT NULL default '0',
  `expire_time` int(10) unsigned NOT NULL default '0',
  `consume_time` int(10) unsigned NOT NULL default '0',
  `create_time` int(10) unsigned NOT NULL default '0',
  `sms_time` int(10) unsigned NOT NULL default '0',
  `buy_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `admin_id` int(10) unsigned NOT NULL default '0',
  `detail_id` varchar(32) default NULL,
  `detail` varchar(255) default NULL,
  `score` double(10,2) NOT NULL default '0.00',
  `action` varchar(16) NOT NULL default 'buy',
  `rname` varchar(32) default NULL COMMENT '收件人姓名',
  `rmobile` varchar(32) default NULL COMMENT '收件人手机号码',
  `rcode` char(6) default NULL COMMENT '收件人邮编',
  `raddress` varchar(128) default NULL COMMENT '收件人地址',
  `send_time` int(10) default NULL COMMENT '发快递时间',
  `create_time` int(10) unsigned NOT NULL default '0',
  `state` enum('unpay','pay') NOT NULL default 'unpay' COMMENT '发货状态',
  `remark` text,
  `op_time` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daysign`
--

CREATE TABLE IF NOT EXISTS `daysign` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` int(10) NOT NULL,
  `credit` double(10,2) default '0.00',
  `money` double(10,2) default '0.00',
  `create_time` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `city_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  `category` enum('suggest','seller') NOT NULL default 'suggest',
  `title` varchar(128) default NULL,
  `contact` varchar(255) default NULL,
  `content` text,
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flow`
--

CREATE TABLE IF NOT EXISTS `flow` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `admin_id` int(10) unsigned NOT NULL default '0',
  `detail_id` varchar(32) default NULL,
  `detail` varchar(255) default NULL,
  `direction` enum('income','expense') NOT NULL default 'income',
  `money` double(10,2) NOT NULL default '0.00',
  `action` varchar(16) NOT NULL default 'buy',
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `flow`
--

INSERT INTO `flow` (`id`, `user_id`, `admin_id`, `detail_id`, `detail`, `direction`, `money`, `action`, `create_time`) VALUES
(1, 1, 0, '5', NULL, 'expense', 0.00, 'buy', 1319474880);

-- --------------------------------------------------------

--
-- Table structure for table `friendlink`
--

CREATE TABLE IF NOT EXISTS `friendlink` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(32) default NULL,
  `url` varchar(255) default NULL,
  `logo` varchar(255) default NULL,
  `sort_order` int(11) default NULL,
  `display` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_l` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `friendlink`
--

INSERT INTO `friendlink` (`id`, `title`, `url`, `logo`, `sort_order`, `display`) VALUES
(1, '百度', 'http://www.baidu.com/', 'http://www.baidu.com/img/baidu_sylogo1.gif', 0, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(128) default NULL,
  `score` int(11) NOT NULL default '0',
  `image` varchar(128) default NULL,
  `time` int(11) NOT NULL default '0',
  `number` int(11) NOT NULL default '0',
  `per_number` int(11) NOT NULL default '1' COMMENT '允许兑换的商品数',
  `sort_order` int(11) NOT NULL default '0',
  `consume` int(11) NOT NULL default '0',
  `display` enum('Y','N') NOT NULL default 'Y',
  `enable` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE IF NOT EXISTS `invite` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `admin_id` int(10) unsigned NOT NULL default '0',
  `user_ip` varchar(16) default NULL,
  `other_user_id` int(10) unsigned NOT NULL default '0',
  `other_user_ip` varchar(16) default NULL,
  `team_id` int(10) unsigned NOT NULL default '0',
  `pay` enum('Y','N','C') NOT NULL default 'N',
  `credit` int(10) unsigned NOT NULL default '0',
  `buy_time` int(10) unsigned NOT NULL default '0',
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_uo` (`user_id`,`other_user_id`),
  UNIQUE KEY `UNQ_o` (`other_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logger_admin`
--

CREATE TABLE IF NOT EXISTS `logger_admin` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL COMMENT '用户id',
  `user_email` varchar(128) collate utf8_unicode_ci NOT NULL COMMENT '用户邮箱',
  `type` varchar(10) collate utf8_unicode_ci NOT NULL COMMENT '标识类型',
  `operation` text collate utf8_unicode_ci NOT NULL COMMENT '操作信息',
  `relate_data` text collate utf8_unicode_ci NOT NULL COMMENT '关联数据',
  `create_on` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员操作日志' AUTO_INCREMENT=30 ;

--
-- Dumping data for table `logger_admin`
--

INSERT INTO `logger_admin` (`id`, `user_id`, `user_email`, `type`, `operation`, `relate_data`, `create_on`) VALUES
(1, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:14:52'),
(2, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:21:07'),
(3, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:32:18'),
(4, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:32:31'),
(5, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:54:10'),
(6, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:54:24'),
(7, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 16:58:48'),
(8, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 17:00:24'),
(9, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 18:13:58'),
(10, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 18:14:11'),
(11, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-20 19:05:03'),
(12, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-10-25 00:32:03'),
(13, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:35:21'),
(14, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:39:56'),
(15, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:41:20'),
(16, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:44:26'),
(17, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:45:08'),
(18, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:45:49'),
(19, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:46:19'),
(20, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:46:49'),
(21, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:47:16'),
(22, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:47:42'),
(23, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:48:25'),
(24, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:51:18'),
(25, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:53:29'),
(26, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-02 23:55:55'),
(27, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-03 16:44:21'),
(28, 1, 'yfcms@qq.com', 'team', '新建team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-04 11:57:28'),
(29, 1, 'yfcms@qq.com', 'team', '编辑team项目', 'a:44:{i:0;s:5:"title";i:1;s:12:"market_price";i:2;s:10:"team_price";i:3;s:8:"end_time";i:4;s:10:"begin_time";i:5;s:11:"expire_time";i:6;s:10:"min_number";i:7;s:10:"max_number";i:8;s:7:"summary";i:9;s:6:"notice";i:10;s:10:"per_number";i:11;s:13:"permin_number";i:12;s:11:"allowrefund";i:13;s:7:"product";i:14;s:5:"image";i:15;s:6:"image1";i:16;s:6:"image2";i:17;s:3:"flv";i:18;s:10:"now_number";i:19;s:6:"detail";i:20;s:10:"userreview";i:21;s:4:"card";i:22;s:12:"systemreview";i:23;s:8:"conduser";i:24;s:7:"buyonce";i:25;s:5:"bonus";i:26;s:10:"sort_order";i:27;s:8:"delivery";i:28;s:6:"mobile";i:29;s:7:"address";i:30;s:4:"fare";i:31;s:7:"express";i:32;s:6:"credit";i:33;s:8:"farefree";i:34;s:10:"pre_number";i:35;s:7:"user_id";i:36;s:7:"city_id";i:37;s:8:"group_id";i:38;s:10:"partner_id";i:39;s:9:"team_type";i:42;s:5:"state";i:43;s:7:"condbuy";i:44;s:14:"express_relate";i:45;s:8:"city_ids";}', '2011-11-04 11:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `mailer`
--

CREATE TABLE IF NOT EXISTS `mailer` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `email` varchar(128) default NULL,
  `city_id` int(10) unsigned NOT NULL default '0',
  `secret` varchar(32) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_e` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `title` varchar(128) default NULL,
  `detail` text,
  `begin_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `pay_id` varchar(32) default NULL,
  `buy_id` int(11) NOT NULL default '0',
  `service` varchar(16) NOT NULL default 'alipay',
  `user_id` int(10) unsigned NOT NULL default '0',
  `admin_id` int(10) unsigned NOT NULL default '0',
  `team_id` int(10) unsigned NOT NULL default '0',
  `city_id` int(10) unsigned NOT NULL default '0',
  `card_id` varchar(16) default NULL,
  `state` enum('unpay','pay') NOT NULL default 'unpay',
  `allowrefund` enum('Y','N') NOT NULL default 'N',
  `rstate` enum('normal','askrefund','berefund','norefund') NOT NULL default 'normal',
  `rereason` text,
  `retime` int(11) default NULL,
  `quantity` int(10) unsigned NOT NULL default '1',
  `realname` varchar(32) default NULL,
  `mobile` varchar(128) default NULL,
  `zipcode` char(6) default NULL,
  `address` varchar(128) default NULL,
  `express` enum('Y','N') NOT NULL default 'Y',
  `express_xx` varchar(128) default NULL,
  `express_id` int(10) unsigned NOT NULL default '0',
  `express_no` varchar(32) default NULL,
  `price` double(10,2) NOT NULL default '0.00',
  `money` double(10,2) NOT NULL default '0.00',
  `origin` double(10,2) NOT NULL default '0.00',
  `credit` double(10,2) NOT NULL default '0.00',
  `card` double(10,2) NOT NULL default '0.00',
  `fare` double(10,2) NOT NULL default '0.00',
  `condbuy` varchar(128) default NULL,
  `remark` text,
  `create_time` int(10) unsigned NOT NULL default '0',
  `pay_time` int(10) unsigned NOT NULL default '0',
  `comment_content` text,
  `comment_display` enum('Y','N') NOT NULL default 'Y',
  `comment_grade` enum('good','none','bad') NOT NULL default 'good',
  `comment_wantmore` enum('Y','N') default NULL,
  `comment_time` int(11) default NULL,
  `partner_id` int(11) NOT NULL default '0',
  `sms_express` enum('Y','N') NOT NULL default 'N',
  `luky_id` int(11) NOT NULL default '0',
  `adminremark` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_p` (`pay_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `pay_id`, `buy_id`, `service`, `user_id`, `admin_id`, `team_id`, `city_id`, `card_id`, `state`, `allowrefund`, `rstate`, `rereason`, `retime`, `quantity`, `realname`, `mobile`, `zipcode`, `address`, `express`, `express_xx`, `express_id`, `express_no`, `price`, `money`, `origin`, `credit`, `card`, `fare`, `condbuy`, `remark`, `create_time`, `pay_time`, `comment_content`, `comment_display`, `comment_grade`, `comment_wantmore`, `comment_time`, `partner_id`, `sms_express`, `luky_id`, `adminremark`) VALUES
(1, 'go-1-0-dkuk', 1, 'credit', 1, 0, 5, 0, NULL, 'pay', 'N', 'normal', NULL, NULL, 0, NULL, '13468671160', NULL, NULL, 'N', NULL, 0, NULL, 4300.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '', 1319474874, 1319474880, NULL, 'Y', 'good', NULL, NULL, 0, 'N', 155067, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` varchar(16) NOT NULL,
  `value` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `username` varchar(32) default NULL,
  `password` varchar(32) default NULL,
  `title` varchar(128) default NULL,
  `group_id` int(10) unsigned NOT NULL default '0',
  `homepage` varchar(128) default NULL,
  `city_id` int(10) unsigned NOT NULL default '0',
  `bank_name` varchar(128) default NULL,
  `bank_no` varchar(128) default NULL,
  `bank_user` varchar(128) default NULL,
  `location` text NOT NULL,
  `contact` varchar(32) default NULL,
  `image` varchar(128) default NULL,
  `image1` varchar(128) default NULL,
  `image2` varchar(128) default NULL,
  `phone` varchar(18) default NULL,
  `address` varchar(128) default NULL,
  `other` text,
  `mobile` varchar(12) default NULL,
  `open` enum('Y','N') NOT NULL default 'N',
  `enable` enum('Y','N') NOT NULL default 'Y',
  `head` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  `create_time` int(10) unsigned NOT NULL default '0',
  `longlat` varchar(255) default NULL,
  `display` enum('Y','N') NOT NULL default 'Y',
  `comment_good` int(11) NOT NULL default '0',
  `comment_none` int(11) NOT NULL default '0',
  `comment_bad` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_ct` (`city_id`,`title`),
  UNIQUE KEY `UNQ_u` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `username`, `password`, `title`, `group_id`, `homepage`, `city_id`, `bank_name`, `bank_no`, `bank_user`, `location`, `contact`, `image`, `image1`, `image2`, `phone`, `address`, `other`, `mobile`, `open`, `enable`, `head`, `user_id`, `create_time`, `longlat`, `display`, `comment_good`, `comment_none`, `comment_bad`) VALUES
(1, 'cctv', '5c1f801fb3340e59870b3f282bfcd544', '中铁二十一局集团有限公司', 0, '', 1, '', '', '', '', '', NULL, NULL, NULL, '029-88888888', '陕西省西安市雁塔区', '', '', 'N', 'Y', 0, 1, 1319098032, NULL, 'N', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `id` varchar(32) NOT NULL default '',
  `vid` varchar(32) default NULL,
  `order_id` int(10) unsigned NOT NULL default '0',
  `bank` varchar(32) default NULL,
  `money` double(10,2) default NULL,
  `currency` enum('CNY','USD') NOT NULL default 'CNY',
  `service` varchar(16) NOT NULL default 'alipay',
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_o` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paycard`
--

CREATE TABLE IF NOT EXISTS `paycard` (
  `id` varchar(16) NOT NULL,
  `user_id` int(10) unsigned NOT NULL default '0',
  `value` int(10) unsigned NOT NULL default '0',
  `consume` enum('Y','N') NOT NULL default 'N',
  `recharge_time` int(10) unsigned NOT NULL default '0',
  `expire_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `referer`
--

CREATE TABLE IF NOT EXISTS `referer` (
  `id` bigint(20) unsigned NOT NULL auto_increment COMMENT 'id',
  `order_id` int(11) default NULL,
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户id',
  `referer` varchar(400) collate utf8_unicode_ci NOT NULL COMMENT '来源',
  `create_time` int(10) unsigned NOT NULL COMMENT '访问时间',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_o` (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='来源' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referer`
--

INSERT INTO `referer` (`id`, `order_id`, `user_id`, `referer`, `create_time`) VALUES
(1, 1, 1, 'http://fangtuanwang.a68.76376.com/', 1319474874);

-- --------------------------------------------------------

--
-- Table structure for table `smssubscribe`
--

CREATE TABLE IF NOT EXISTS `smssubscribe` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `mobile` varchar(18) default NULL,
  `city_id` int(10) unsigned NOT NULL default '0',
  `secret` char(6) default NULL,
  `enable` enum('Y','N') NOT NULL default 'N',
  `create_time` int(11) default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_e` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `email` varchar(128) default NULL,
  `city_id` int(10) unsigned NOT NULL default '0',
  `secret` varchar(32) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_e` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `city_id`, `secret`) VALUES
(1, 'yfcms@qq.com', 0, '4d921e1c782777b6dcd9f974aba893df'),
(2, '980973186@qq.com', 1, '481cd4ba3ab348ff779605ad01e54a3f');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `id` enum('1') NOT NULL default '1',
  `value` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `value`) VALUES
('1', 'eyJkYiI6eyJob3N0IjoiNjEuMTUyLjkzLjY4IiwidXNlciI6ImZhbmd0dWFud2FuZyIsInBhc3MiOiJmYW5ndHVhbjIwMTEiLCJuYW1lIjoiZmFuZ3R1YW53YW5nIn0sIm1lbWNhY2hlIjpudWxsLCJ3ZWJyb290IjpudWxsLCJzeXN0ZW0iOnsid3d3cHJlZml4IjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgxIiwiaW1ncHJlZml4IjoiaHR0cDpcL1wvZmFuZ3R1YW53YW5nLmE2OC43NjM3Ni5jb20iLCJjc3NwcmVmaXgiOiJodHRwOlwvXC9mYW5ndHVhbndhbmcuYTY4Ljc2Mzc2LmNvbSIsInNpdGVuYW1lIjoiXHU2MjNmXHU1NmUyXHU5NTdmIiwic2l0ZXRpdGxlIjoiXHU1NzI4XHU3ZWJmXHU1NmUyXHU2MjNmXHU3ZjUxIiwiYWJicmV2aWF0aW9uIjoiXHU2MjNmXHU1NmUyXHU5NTdmIiwiY291cG9ubmFtZSI6Ilx1NGYxOFx1NjBlMFx1NTIzOCIsImN1cnJlbmN5IjoiXHUwMGE1IiwiY3VycmVuY3luYW1lIjoiQ05ZIiwidGltZXpvbmUiOiJFdGNcL0dNVC04IiwiaW52aXRlY3JlZGl0IjoiMCIsInNpZGV0ZWFtIjoiMCIsImNvbmR1c2VyIjowLCJwYXJ0bmVyZG93biI6MCwiZ3ppcCI6MCwia2VmdXFxIjoiIiwia2VmdW1zbiI6IiIsIm1vYmlsZXVybCI6IiIsImljcCI6Ilx1OTY1NUlDUFx1NTkwNzExMDExMjI0XHU1M2Y3Iiwic3RhdGNvZGUiOiIiLCJzaW5haml3YWkiOiIiLCJ0ZW5jZW50aml3YWkiOiIiLCJnb29nbGVtYXAiOiIifSwiYnVsbGV0aW4iOm51bGwsImFsaXBheSI6bnVsbCwidGVucGF5IjpudWxsLCJzZG9wYXkiOm51bGwsImJpbGwiOm51bGwsImNoaW5hYmFuayI6bnVsbCwicGF5cGFsIjpudWxsLCJ5ZWVwYXkiOm51bGwsIm90aGVyIjpudWxsLCJvcHRpb24iOnsibmF2Y29tbWVudCI6Ik4iLCJuYXZwcmVkaWN0IjoiTiIsIm5hdnBhcnRuZXIiOiJOIiwibmF2c2Vjb25kcyI6Ik4iLCJuYXZnb29kcyI6IlkiLCJuYXZmb3J1bSI6Ik4iLCJ1c2Vjb3Vwb25zbXMiOiJOIiwiZGlzcGxheWZhaWx1cmUiOiJOIiwidGVhbWFzayI6Ik4iLCJjcmVkaXRzZWNvbmRzIjoiTiIsInNtc3N1YnNjcmliZSI6IlkiLCJ0cnNpbXBsZSI6Ik4iLCJtb25leXNhdmUiOiJOIiwidGVhbXdob2xlIjoiTiIsImVuY29kZWlkIjoiTiIsInVzZXJwcml2YWN5IjoiTiIsInVzZXJjcmVkaXQiOiJOIiwibXljb3Vwb24iOiJZIiwiY2F0ZXRlYW0iOiJZIiwiY2F0ZXBhcnRuZXIiOiJZIiwiY2l0eXBhcnRuZXIiOiJZIiwiY2F0ZXNlY29uZHMiOiJZIiwiY2F0ZWdvb2RzIjoiWSIsImVtYWlsdmVyaWZ5IjoiTiIsIm5lZWRtb2JpbGUiOiJZIiwibW9iaWxlY29kZSI6Ik4iLCJpbmRleG11bHRpIjoiWSIsImluZGV4bXVsdGltZWl0dWFuIjoiWSIsInZlcmlmeXJlZ2lzdGVyIjoiWSIsInZlcmlmeXRvcGljIjoiTiIsInZlcmlmeWZlZWRiYWNrIjoiWSJ9LCJtYWlsIjp7ImVuY29kaW5nIjoiVVRGLTgifSwic21zIjpudWxsLCJjcmVkaXQiOm51bGwsInNraW4iOnsidGVtcGxhdGUiOiJkZWZhdWx0IiwidGhlbWUiOiI1NXR1YW4ifSwiYXV0aG9yaXphdGlvbiI6bnVsbH0=');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0',
  `title` varchar(128) default NULL,
  `summary` text,
  `city_id` int(10) unsigned NOT NULL default '0',
  `city_ids` text,
  `group_id` int(10) unsigned NOT NULL default '0',
  `partner_id` int(10) unsigned NOT NULL default '0',
  `system` enum('Y','N') NOT NULL default 'Y',
  `team_price` double(10,2) NOT NULL default '0.00',
  `market_price` double(10,2) NOT NULL default '0.00',
  `product` varchar(128) default NULL,
  `condbuy` varchar(255) default NULL,
  `per_number` int(10) unsigned NOT NULL default '1',
  `permin_number` int(10) default '1',
  `min_number` int(10) unsigned NOT NULL default '1',
  `max_number` int(10) unsigned NOT NULL default '0',
  `now_number` int(10) unsigned NOT NULL default '0',
  `pre_number` int(10) unsigned NOT NULL default '0',
  `allowrefund` enum('Y','N') NOT NULL default 'N',
  `image` varchar(128) default NULL,
  `image1` varchar(128) default NULL,
  `image2` varchar(128) default NULL,
  `flv` varchar(128) default NULL,
  `mobile` varchar(16) default NULL,
  `credit` int(10) unsigned NOT NULL default '0',
  `card` int(10) unsigned NOT NULL default '0',
  `fare` int(10) unsigned NOT NULL default '0',
  `farefree` int(11) NOT NULL default '0',
  `bonus` int(11) NOT NULL default '0',
  `address` varchar(128) default NULL,
  `detail` text,
  `systemreview` text,
  `userreview` text,
  `notice` text,
  `express` text,
  `express_relate` text character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '快递数据,序列化',
  `delivery` varchar(16) NOT NULL default 'coupon',
  `state` enum('none','success','soldout','failure','refund') NOT NULL default 'none',
  `conduser` enum('Y','N') NOT NULL default 'Y',
  `buyonce` enum('Y','N') NOT NULL default 'Y',
  `team_type` varchar(20) default 'normal',
  `sort_order` int(11) NOT NULL default '0',
  `expire_time` int(10) unsigned NOT NULL default '0',
  `begin_time` int(10) unsigned NOT NULL default '0',
  `end_time` int(10) unsigned NOT NULL default '0',
  `reach_time` int(10) unsigned NOT NULL default '0',
  `close_time` int(10) unsigned NOT NULL default '0',
  `seo_title` varchar(255) default NULL,
  `seo_keyword` varchar(255) default NULL,
  `seo_description` text,
  `sub_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `user_id`, `title`, `summary`, `city_id`, `city_ids`, `group_id`, `partner_id`, `system`, `team_price`, `market_price`, `product`, `condbuy`, `per_number`, `permin_number`, `min_number`, `max_number`, `now_number`, `pre_number`, `allowrefund`, `image`, `image1`, `image2`, `flv`, `mobile`, `credit`, `card`, `fare`, `farefree`, `bonus`, `address`, `detail`, `systemreview`, `userreview`, `notice`, `express`, `express_relate`, `delivery`, `state`, `conduser`, `buyonce`, `team_type`, `sort_order`, `expire_time`, `begin_time`, `end_time`, `reach_time`, `close_time`, `seo_title`, `seo_keyword`, `seo_description`, `sub_id`) VALUES
(1, 1, '中铁•梧桐苑', '物业类别： 暂无 物业级别： 2014年 环线位置： 曲江池东侧、寒窑路北侧、新开门南路西侧 \r\n物业地址： 暂无 \r\n交通状况： 住宅 \r\n开盘时间： 20万㎡ 容积率： 暂无 标准层面积： 暂无 \r\n物业费：  开发商：      \r\n售楼地址：  \r\n项目特色：  \r\n装修状况：  所属商圈：  入住时间：  \r\n绿化率：  预售许可证：  物业公司：  \r\n售楼电话：', 0, '@0@', 2, 1, 'Y', 9800.00, 12000.00, '中铁•梧桐苑', '', 1, 1, 10, 0, 0, 0, 'N', 'team/2011/1020/13190984917541.jpg', NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '中国铁建梧桐苑位于曲江池东侧、寒窑路北侧、新开门南路西侧，西望曲江池，北望大雁塔、大唐芙蓉园，正对寒窑、远眺南山。 <br />&nbsp;&nbsp; 中国铁建梧桐苑是曲江新区首个温泉入户生态社区，项目总占地约126亩，绿地率42%，建筑密度23%，保证楼间距。整个社区完全人车分流，车位配比达到1:1以上。项目涵盖花园洋房、小高层以及高层产品，总户数为1511户。项目分两期开发，一期为多层花园洋房、小高层，容积率为1.99。户型3.2米层高，全明设计、南北通透，宽景阳台、落地景观飘窗。园林设计以“先入花园，后进家园”的景观设计理念，运用玉如意的形态构思建造项目景观的设计，象征吉祥如意之意。项目配套服务的商业面积约为8500平方米（其中商务中心面积为1800平米）。 二期为观景高层产品，超大楼间距，一览社区优美景观；户型全明设计、南北通透，宽景阳台、落地景观飘窗。“荷塘月色、蓝玉生烟”等景观将二期分为两个组团，各组团软景隔离，各具特色。面积区间：95——160平米。 \r\n<p>&nbsp;&nbsp; 中国铁建梧桐苑的开发商中铁二十一局集团有限公司隶属于国务院国资委中国铁建股份有限公司，是集工程建设、科研开发、房地产开发、矿产资源开发、商贸经营等于一体的国家特大型建筑施工企业集团。具有铁路总承包特级，房建、公路、水利水电、市政、矿山、通信总承包一级资质及隧道、桥梁、铁路电务、电气化、环保、公路路基、铁路铺架等专业承包一级资质。取得了国土资源部地质灾害甲级资质，获得境外经营资格许可证</p>', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1327075200, 1318262400, 1324483200, 0, 0, NULL, NULL, NULL, 0),
(2, 1, '龙湖•紫都城', '物业类别： 暂无 \r\n物业级别： 2012年年底 \r\n环线位置： 曲江海洋馆东侧（雁南二路与雁塔南路交汇处） \r\n物业地址： 暂无 \r\n交通状况： 住宅 \r\n开盘时间： 26万㎡ \r\n容积率： 80-140㎡ \r\n标准层面积： 暂无 \r\n物业费：  暂无\r\n开发商：     暂无 \r\n售楼地址：  暂无\r\n项目特色：  暂无\r\n装修状况：  暂无\r\n所属商圈：  暂无\r\n入住时间：  暂无\r\n绿化率：  暂无\r\n预售许可证：  暂无\r\n物业公司：暂无', 0, '@0@', 5, 1, 'Y', 9800.00, 12000.00, '龙湖•紫都城', '', 1, 1, 10, 0, 50, 50, 'N', 'team/2011/1020/13190995386734.jpg', NULL, NULL, 'http://hc.yinyuetai.com/uploads/videos/common/111019_zhanghc.flv', '', 0, 0, 0, 0, 0, '', '<span style="color:#333333;TEXT-ALIGN: left; WIDOWS: 2; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; FONT: 12px/22px 宋体, Arial; WHITE-SPACE: normal; ORPHANS: 2; LETTER-SPACING: normal; WORD-SPACING: 0px; -webkit-text-size-adjust: auto; -webkit-text-decorations-in-effect: none; -webkit-text-stroke-width: 0px">&nbsp; </span>\r\n<div style="TEXT-ALIGN: justify; PADDING-BOTTOM: 5px; LINE-HEIGHT: 18px; BORDER-RIGHT-WIDTH: 0px; TEXT-INDENT: 28px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; LETTER-SPACING: 1px; COLOR: rgb(0,0,0); BORDER-LEFT-WIDTH: 0px; FONT-WEIGHT: normal; PADDING-TOP: 5px" class="DivTxt">龙湖紫都城，位于曲江新区曲江大道（海洋馆东侧），总占地103亩，建面26万㎡，紧邻海洋公园，唐遗址公园、大唐芙蓉园、大雁塔环绕周边。</div>\r\n<div style="TEXT-ALIGN: justify; PADDING-BOTTOM: 5px; LINE-HEIGHT: 18px; BORDER-RIGHT-WIDTH: 0px; TEXT-INDENT: 28px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; LETTER-SPACING: 1px; COLOR: rgb(0,0,0); BORDER-LEFT-WIDTH: 0px; FONT-WEIGHT: normal; PADDING-TOP: 5px" class="DivTxt">龙湖紫都城由龙湖地产开发建设，龙湖地产创建于1994年，成长于重庆，发展于全国，龙湖集团总部设在北京，是一家专业地产公司。龙湖紫都城总规划12栋高层，约2000户体量，并在平层户型设计中创新注入跃层元素，创造舒适半开放空间。主力户型80-140㎡两房、三房，充分考虑居者的舒适性和情感需求。从复式户型中汲取灵感，创新局部调高，塑造5.8米鲜有双层空间。房型设计南北、左右互错。13-32㎡超高比例赠送面积及多变活性空间。物业公司为富有“钻石物业”之称的龙湖物业。</div>\r\n<div style="TEXT-ALIGN: justify; PADDING-BOTTOM: 5px; LINE-HEIGHT: 18px; BORDER-RIGHT-WIDTH: 0px; TEXT-INDENT: 28px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; LETTER-SPACING: 1px; COLOR: rgb(0,0,0); BORDER-LEFT-WIDTH: 0px; FONT-WEIGHT: normal; PADDING-TOP: 5px" class="DivTxt">龙湖紫都城别墅级五重园林为鉴，龙湖自建苗圃进行成树移苗，提前十年享受园林的郁郁葱葱。规划八月凝香、樱源花溪、踏雪闻香、清风竹影、清风坡、银杏大道、杏风商业街等多样组团，采用地面、屋面、平台和垂直绿化方式，增大绿化覆盖率。</div>', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1327075200, 1316534400, 1324483200, 0, 0, NULL, NULL, NULL, 0),
(3, 1, '浐灞新天地', '物业类别： 暂无 物业级别： 2014年 环线位置： 浐灞生态区西大门欧亚大道与广运潭大道的交汇 \r\n物业地址： 暂无 \r\n交通状况： 住宅 \r\n开盘时间： 180万㎡ 容积率： 80-150 标准层面积： 暂无 \r\n物业费：  开发商：      \r\n售楼地址：  \r\n项目特色：  \r\n装修状况：  所属商圈：  入住时间：  \r\n绿化率：  预售许可证：  物业公司：  \r\n售楼电话：', 0, '@0@', 2, 1, 'Y', 3880.00, 4250.00, '浐灞新天地', '', 1, 1, 10, 0, 0, 0, 'N', 'team/2011/1020/13191008502728.jpg', NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '浐灞新天地坐落于浐灞生态区西大门欧亚大道与广运潭大道的交汇处，东边与欧亚论坛永久会址凯宾斯基酒店隔河相望，距世园会主办地广运潭湿地公园仅<span lang="EN-US">2</span>公里。<span lang="EN-US">&nbsp;<br /></span>&nbsp;&nbsp;&nbsp; 浐灞新天地项目占地<span lang="EN-US">1080</span>亩，总建筑面积<span lang="EN-US">200</span>万平方米，绿化率高达<span lang="EN-US">35%</span>以上，规划总户数<span lang="EN-US">10000</span>户，由景观高层、电梯花园洋房、高档会所、<span lang="EN-US">30</span>万建面景观购物中心、五星级酒店、甲级写字楼等组成。项目内还配有<span lang="EN-US">2</span>所国际双语幼儿园，一所国际小学。<span lang="EN-US">&nbsp;<br /></span>&nbsp;&nbsp;&nbsp; 项目由重庆兴达实业集团开发，该公司成立于<span lang="EN-US">1985</span>年是以房地产开发、建筑工程施工等相关产业与一体的集团型企业。<span lang="EN-US"><br /></span>浐灞新天地目前在售一期<span lang="EN-US">3</span>栋高层，面积<span lang="EN-US">80-150</span>平米，预计<span lang="EN-US">2014</span>年<span lang="EN-US">3</span>月入住。', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1327075200, 1317484800, 1324483200, 0, 0, NULL, NULL, NULL, 0),
(4, 1, '百欣花园', '物业类别： 暂无 物业级别： 2013年下半年 环线位置： 大兴新区沣惠北路（西二环）5号 \r\n物业地址： 暂无 \r\n交通状况： 住宅 \r\n开盘时间： 11万㎡ 容积率： 50-120 标准层面积： 暂无 \r\n物业费：  开发商：      \r\n售楼地址：  \r\n项目特色：  \r\n装修状况：  所属商圈：  入住时间：  \r\n绿化率：  预售许可证：  物业公司：  \r\n售楼电话：', 0, '@0@', 4, 1, 'Y', 3900.00, 4520.00, '百欣花园', '', 1, 1, 10, 0, 0, 0, 'N', 'team/2011/1020/13191011288035.jpg', NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '<div>西安市人民政府所属的发改委等六部门，于2008年10月24日以市发改投发［2008］759号文件下达计划批准的经济适用住房项目，由西安海粤股份有限公司开发实施、上海东方建筑设计研究院有限公司设计、西北电力建设工程监理有限责任公司全过程监理。<strong></strong></div>\r\n<div><strong>【位于大兴 区位优越】</strong>项目位于西安市大兴新区沣惠北路（西二环）5号。大兴新区是西安首例综合性成片旧城改造项目，承载千年汉风古韵，打造宜居生态新区。一个交融古今历史、凸现人文理念，充满创新活力，宜商宜居的生态新区将展现于世人面前。</div>\r\n<div><strong>【花园景观 生态新区】</strong>占地面约58亩，地上总建筑面积约11万㎡。宽楼距，高绿化，中央花园，宜居新区。户型面积50——120㎡，设计布局合理，最大限度提高房屋使用率。剪力墙结构，外墙外保温，国际品牌合资电梯，外窗为中空玻璃塑钢推拉窗，室内地幅热，使家居既经济实惠又舒适温馨。</div>\r\n<div><strong>【配套齐全 交通便捷】</strong>内设便民商业服务网点，配套设施齐全，物业服务周到。设有地下停车场，方便了有车业主。设有供人休闲、健身、娱乐活动场所，使人感觉舒心、惬意，有回归大自然的感觉，让栖居更具诗意。周边有国亨批发市场、方欣市场，中小学、医院，购物、上学、就医邻近，有13条公交线路从小区经过，交通便捷。</div>\r\n<div>2010年5月6日，西安市市委、市政府举行大兴新区25个重点项目集中开工仪式上，［百欣花园］项目列为其中之一开工建设。<strong></strong></div>', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1327075200, 1313856000, 1324483200, 0, 0, NULL, NULL, NULL, 0),
(5, 1, '中宝•北岸美域', '物业类别： 34 物业级别： 2014年初交房 环线位置： 未央湖 大学城 \r\n物业地址： 暂无 \r\n交通状况： 住宅 \r\n开盘时间： 100万 容积率： 55--120㎡ 标准层面积： 暂无 \r\n物业费：  开发商：      \r\n售楼地址：  \r\n项目特色：  \r\n装修状况：  所属商圈：  入住时间：  \r\n绿化率：  预售许可证：  物业公司：', 0, '@0@', 2, 1, 'Y', 4300.00, 5200.00, '中宝•北岸美域', '', 1, 1, 10, 0, 0, 0, 'N', 'team/2011/1020/13191012247305.jpg', NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '<span style="font-family:Verdana;">陕西中宝置业有限责任公司是重庆中宝投资（集团）股份有限公司的全资子公司。重庆市中宝集团集房地产开发、能源、农林业、生物制药、金融投资等为一体的综合性集团企业，并在美国纳斯达克上市。作为重庆知名的民营房地产运营商，重庆中宝集团携国外巨资，发力布局全国房地产市场，率先启动西安未央湖畔的中宝•北岸美域项目。<br />中宝•北岸美域位于西安未央区东风路旁，未央湖畔，火车北站、大学城附近，依托草滩生态园区的宜居特色，凭借重庆中宝集团挥斥39亿重金，整合北京、成都、重庆的多方资源，利用国内外的先进理念，为西安人民打造百万方的欧式生态大城，树立西安北方向城市地标。</span>', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1327075200, 1318262400, 1324483200, 0, 0, NULL, NULL, NULL, 0),
(6, 1, '万家灯火', '物业类别： 物业类别 物业级别： 2011-6-30(1-6#)2011-年底（7#） 环线位置： 丈八宾馆西500米 \r\n物业地址： 暂无 \r\n交通状况： 住宅 \r\n开盘时间：  容积率： 暂无 标准层面积：  \r\n物业费：  开发商：      \r\n售楼地址：  \r\n项目特色：  \r\n装修状况：  所属商圈：  入住时间：  \r\n绿化率：  预售许可证：  物业公司：  \r\n售楼电话：', 0, '@0@', 4, 1, 'Y', 6980.00, 7300.00, '万家灯火', '', 1, 1, 10, 0, 0, 0, 'N', 'team/2011/1020/13191056385436.jpg', NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '<table style="MARGIN-TOP: 8px" border="0" cellspacing="0" cellpadding="0" width="*">\r\n<tbody>\r\n<tr>\r\n<td style="LINE-HEIGHT: 180%; PADDING-LEFT: 10px; PADDING-TOP: 18px" valign="top" align="left"><span style="color:#222222;TEXT-ALIGN: left; WIDOWS: 2; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; FONT: 12px/21px 宋体, arial; WHITE-SPACE: normal; ORPHANS: 2; LETTER-SPACING: normal; WORD-SPACING: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px">盛泽·万家灯火拔地而起矗立于高新CBD未来核心，以建筑承载东方家文化的精髓，同时开启盛泽置业的新篇章。 创业研发园、国际软件新城、创意产业区、先进制造业、出口加工区、金融商务区……诸多声名显赫的高新产业园区聚集万家灯火周边，带来的不仅仅是高新区对高品质居住社区的迫切需求，国际软件新城500亩生态湖湿地、50万创新人才聚居的国际化的“花园新城”更是区域短期可以预见的价值体现和未来不可估量的长期发展。 万家灯火为注重事业发展，也更注重家庭幸福的高新仕族倾力打造质感生活安家特区。38亩占地面积，12.2万㎡总建筑面积，36%的绿地率，7栋17至26层高层，无不展现着仕族蛰居之地的真实与精致。 繁忙一天，在夕阳初上之时回到万家灯火，在新古典主义风格的建筑围合中细细品味线条、材质、光线、色彩带来的审美享受。简欧立面之外，华灯初上的璀璨带来的是更多家文化的体验和感悟。夏日的烦躁在欧式皇家水系的中央景观带前渐渐平和下来，汩汩流水像跳动的音符滋润着心底的欢乐。 和家人或朋友一起，在小区商业街里悠闲散步，品评时尚。或者，在植物围合的隐秘之处打几场球，运动时尚的泛会所空间带来了更为健康的生活方式，也带来了心灵的沟通、情感的表达。居住在这里，不必在工作中还担心着家里的老人和孩子，和军官做邻居就是和安全在一起。如果愿意也能够通过手机视屏随时随地的看看家里、看看小区花园、看看运动场，看看老人和孩子在做什么。居住在高新首家3G智能安防社区，还有什么需要操心的呢？ 做个好梦，被清晨的鸟语唤醒，早饭过后目送孩子步入高新五小、三中的校园，和单位的同事们互道一声早，充满活力的新一天，拉开序幕……</span></td></tr></tbody></table>', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1327075200, 1318348800, 1324483200, 0, 0, NULL, NULL, NULL, 0),
(7, 1, '宏信国际花园', '1', 0, '@0@', 4, 1, 'Y', 11000.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 1, 1351958400, 1320249600, 1351958400, 0, 0, NULL, NULL, NULL, 0),
(8, 1, '长兴园湖曲', '1', 0, '@0@', 2, 0, 'Y', 7000.00, 8000.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1351958400, 1320249600, 1351958400, 0, 0, NULL, NULL, NULL, 0),
(9, 1, '金辉•融侨城', '1', 0, '@0@', 2, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1321718400, 0, 0, NULL, NULL, NULL, 0),
(10, 1, '西蒙公社', '1', 0, '@0@', 2, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1320336000, 0, 0, NULL, NULL, NULL, 0),
(11, 1, '振业泊墅', '1', 0, '@0@', 2, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '1', '1', '1', '1', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1320336000, 0, 0, NULL, NULL, NULL, 0),
(12, 1, '盛龙广场', '1', 0, '@0@', 2, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '1', '', '', '1', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1320336000, 0, 0, NULL, NULL, NULL, 0),
(13, 1, '都市之窗', '1', 0, '@0@', 2, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '1', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1320336000, 0, 0, NULL, NULL, NULL, 0),
(14, 1, '万象汇', '1', 0, '@0@', 2, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '1', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1320336000, 0, 0, NULL, NULL, NULL, 0),
(15, 1, '中天锦庭', '1', 0, '@0@', 5, 0, 'Y', 1.00, 1.00, '1', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '1', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 0, 1328198400, 1320249600, 1320336000, 0, 0, NULL, NULL, NULL, 0),
(16, 1, '中国铁建•国际城', '1', 0, '@0@', 8, 0, 'Y', 1.00, 1.00, '中国铁建•国际城', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, '', '1', '', '', '', '', 'N;', 'voucher', 'none', 'N', 'Y', 'normal', 0, 1359820800, 1320249600, 1354550400, 0, 0, NULL, NULL, NULL, 0),
(17, 1, '中天锦庭', '1', 0, '@0@', 5, 0, 'Y', 1.00, 1.00, '中天锦庭', '', 1, 1, 10, 0, 0, 0, 'N', NULL, NULL, NULL, NULL, '', 0, 0, 0, 0, 0, '', '1', '', '', '', '', 'N;', 'coupon', 'none', 'N', 'Y', 'normal', 1, 1328371200, 1320422400, 1322582400, 0, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `toolsbind`
--

CREATE TABLE IF NOT EXISTS `toolsbind` (
  `id` int(10) NOT NULL auto_increment,
  `user_id` int(10) NOT NULL,
  `tools` varchar(16) NOT NULL,
  `secret` varchar(16) default NULL,
  `enable` enum('Y','N') NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `parent_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  `title` varchar(128) default NULL,
  `team_id` int(10) unsigned NOT NULL default '0',
  `city_id` int(10) unsigned NOT NULL default '0',
  `public_id` int(10) unsigned NOT NULL default '0',
  `content` text,
  `head` int(10) unsigned NOT NULL default '0',
  `reply_number` int(10) unsigned NOT NULL default '0',
  `view_number` int(10) unsigned NOT NULL default '0',
  `last_user_id` int(10) unsigned NOT NULL default '0',
  `last_time` int(10) unsigned NOT NULL default '0',
  `create_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `email` varchar(128) default NULL,
  `username` varchar(32) default NULL,
  `realname` varchar(32) default NULL,
  `alipay_id` varchar(32) default NULL,
  `password` varchar(32) default NULL,
  `avatar` varchar(128) default NULL,
  `gender` enum('M','F') NOT NULL default 'M',
  `newbie` enum('Y','N') NOT NULL default 'Y',
  `mobile` varchar(16) default NULL,
  `qq` varchar(16) default NULL,
  `money` double(10,2) NOT NULL default '0.00',
  `score` int(11) NOT NULL default '0',
  `zipcode` char(6) default NULL,
  `address` varchar(255) default NULL,
  `city_id` int(10) unsigned NOT NULL default '0',
  `emailable` enum('Y','N') NOT NULL default 'Y',
  `enable` enum('Y','N') NOT NULL default 'Y',
  `manager` enum('Y','N') NOT NULL default 'N',
  `secret` varchar(32) default NULL,
  `recode` varchar(32) default NULL,
  `sns` varchar(32) default NULL,
  `ip` varchar(16) default NULL,
  `login_time` int(10) unsigned NOT NULL default '0',
  `create_time` int(10) unsigned NOT NULL default '0',
  `mobilecode` char(6) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_name` (`username`),
  UNIQUE KEY `UNQ_e` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `realname`, `alipay_id`, `password`, `avatar`, `gender`, `newbie`, `mobile`, `qq`, `money`, `score`, `zipcode`, `address`, `city_id`, `emailable`, `enable`, `manager`, `secret`, `recode`, `sns`, `ip`, `login_time`, `create_time`, `mobilecode`) VALUES
(1, 'yfcms@qq.com', 'admin', '', NULL, '5c1f801fb3340e59870b3f282bfcd544', NULL, 'M', 'N', '13468671160', '', 0.00, 0, '', '', 0, 'Y', 'Y', 'Y', '', NULL, NULL, '127.0.0.1', 1319096928, 1319096928, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verifycode`
--

CREATE TABLE IF NOT EXISTS `verifycode` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `mobile` char(12) NOT NULL,
  `getip` char(15) NOT NULL,
  `verifycode` char(6) NOT NULL,
  `dateline` int(10) unsigned NOT NULL default '0',
  `reguid` mediumint(8) unsigned default '0',
  `regdateline` int(10) unsigned default '0',
  `status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_feedback`
--

CREATE TABLE IF NOT EXISTS `vote_feedback` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `username` varchar(32) default NULL,
  `user_id` int(10) unsigned NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `addtime` char(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_feedback_input`
--

CREATE TABLE IF NOT EXISTS `vote_feedback_input` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `feedback_id` bigint(20) unsigned NOT NULL,
  `options_id` mediumint(8) unsigned NOT NULL,
  `value` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_feedback_question`
--

CREATE TABLE IF NOT EXISTS `vote_feedback_question` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `feedback_id` bigint(20) unsigned NOT NULL,
  `question_id` mediumint(8) unsigned NOT NULL,
  `options_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_options`
--

CREATE TABLE IF NOT EXISTS `vote_options` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `question_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `is_br` char(1) NOT NULL default '0',
  `is_input` char(1) NOT NULL default '0',
  `is_show` char(1) NOT NULL default '1',
  `order` mediumint(8) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_question`
--

CREATE TABLE IF NOT EXISTS `vote_question` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL default 'radio',
  `is_show` char(1) NOT NULL default '1',
  `addtime` char(10) NOT NULL,
  `order` mediumint(8) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(64) default NULL,
  `user_id` int(10) unsigned NOT NULL default '0',
  `team_id` int(10) unsigned NOT NULL default '0',
  `order_id` int(10) unsigned NOT NULL default '0',
  `sms` int(10) unsigned NOT NULL default '0',
  `sms_time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UNQ_ct` (`code`,`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
