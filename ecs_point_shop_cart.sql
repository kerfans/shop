/*
Navicat MySQL Data Transfer

Source Server         : 188
Source Server Version : 50523
Source Host           : 192.168.10.188:3308
Source Database       : ecs_yaofang

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2016-09-02 18:02:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ecs_point_shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `ecs_point_shop_cart`;
CREATE TABLE `ecs_point_shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `uid` int(11) DEFAULT NULL COMMENT '关联用户ID',
  `gid` int(11) DEFAULT NULL COMMENT '关联商品ID',
  `atime` int(11) DEFAULT NULL COMMENT '添加时间',
  `num` int(11) DEFAULT NULL COMMENT '兑换数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='// 积分商城-----购物车表';

-- ----------------------------
-- Records of ecs_point_shop_cart
-- ----------------------------

-- ----------------------------
-- Table structure for ecs_point_shop_admin
-- ----------------------------
DROP TABLE IF EXISTS `ecs_point_shop_admin`;
CREATE TABLE `ecs_point_shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `name` varchar(255) DEFAULT '' COMMENT '用户名',
  `password` varchar(255) DEFAULT '' COMMENT '密码',
  `class` tinyint(255) DEFAULT NULL COMMENT '级别（0普通，1主号）',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `ctime` int(4) DEFAULT NULL COMMENT '创建时间',
  `ltime` int(11) DEFAULT NULL COMMENT '最后一次登录时间',
  `cip` varchar(255) DEFAULT NULL COMMENT '创建IP',
  `lip` varchar(255) DEFAULT NULL COMMENT '登录IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='// 积分商城-----管理员表';

-- ----------------------------
-- Records of ecs_point_shop_admin
-- ----------------------------

-- ----------------------------
-- Table structure for ecs_point_shop_ad
-- ----------------------------
DROP TABLE IF EXISTS `ecs_point_shop_ad`;
CREATE TABLE `ecs_point_shop_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `type` tinyint(4) DEFAULT '1' COMMENT '类别(默认1轮播图广告)',
  `title` varchar(255) DEFAULT '' COMMENT '标题',
  `picture` varchar(500) DEFAULT '' COMMENT '图片',
  `url` varchar(255) DEFAULT '' COMMENT '链接地址',
  `sort` int(11) DEFAULT '0' COMMENT '权重',
  `atime` int(11) DEFAULT NULL COMMENT '添加时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态（0禁用，1可用）默认0',
  `aaid` int(11) DEFAULT NULL COMMENT '关联管理员ID（未启用）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='// 积分商城-----广告表';

-- ----------------------------
-- Records of ecs_point_shop_ad
-- ----------------------------

-- ----------------------------
-- Table structure for ecs_point_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `ecs_point_goods_type`;
CREATE TABLE `ecs_point_goods_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型ID',
  `class` tinyint(4) DEFAULT '1' COMMENT '类型（1实体，2虚拟）默认1',
  `name` varchar(255) DEFAULT '' COMMENT '名称',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态（0禁用，1启用）默认0',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `mtime` int(11) DEFAULT NULL COMMENT '修改时间',
  `caid` int(11) DEFAULT NULL COMMENT '关联创建管理员ID',
  `maid` int(11) DEFAULT NULL COMMENT '关联修改管理员ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='// 积分商城-----商品类型表';

-- ----------------------------
-- Records of ecs_point_goods_type
-- ----------------------------

-- ----------------------------
-- Table structure for ecs_point_goods_traffic
-- ----------------------------
DROP TABLE IF EXISTS `ecs_point_goods_traffic`;
CREATE TABLE `ecs_point_goods_traffic` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流量ID',
  `name` varchar(30) DEFAULT '' COMMENT '流量名称',
  `operator` varchar(30) DEFAULT '' COMMENT '运营商（1移动，2联通，3电信）',
  `flow` int(255) DEFAULT NULL COMMENT '流量包大小（单位M）',
  `describe` varchar(255) DEFAULT '' COMMENT '备注',
  `parameter` varchar(255) DEFAULT '' COMMENT '参数，占不用',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态默认0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='// 积分商城-----流量表';

-- ----------------------------
-- Records of ecs_point_goods_traffic
-- ----------------------------

-- ----------------------------
-- Table structure for ecs_point_goods
-- ----------------------------
DROP TABLE IF EXISTS `ecs_point_goods`;
CREATE TABLE `ecs_point_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `class` tinyint(4) DEFAULT NULL COMMENT '所属（是否配送订单逻辑，1实体2虚拟）',
  `tid` int(11) DEFAULT NULL COMMENT '关联类型ID',
  `pid` int(11) DEFAULT NULL COMMENT '关联商品ID',
  `title` varchar(255) DEFAULT '' COMMENT '标题（默认品名，可改）',
  `code` varchar(255) DEFAULT '' COMMENT '积分商品编码，未启用',
  `cost_points` int(11) DEFAULT NULL COMMENT '消耗积分',
  `stock_num` int(11) DEFAULT NULL COMMENT '库存（自己设置）',
  `is_sale` tinyint(4) DEFAULT '0' COMMENT '是否上架（0下架，1上架）默认0',
  `sort` int(11) DEFAULT '0' COMMENT '权重',
  `limited` int(11) DEFAULT '0' COMMENT '兑换限制（0不限） 占不用',
  `is_del` tinyint(4) DEFAULT NULL COMMENT '是否删除',
  `is_hot` int(11) DEFAULT NULL COMMENT '是否热销',
  `is_new` int(11) DEFAULT NULL COMMENT '是否新品',
  `atime` int(11) DEFAULT NULL COMMENT '添加时间',
  `aaid` int(11) DEFAULT NULL COMMENT '关联管理员ID 占不用',
  `onsell_time` int(11) DEFAULT NULL COMMENT '上架时间',
  `onsell_aid` int(11) DEFAULT NULL COMMENT '关联上架管理员ID 占不用',
  `offsell_time` int(11) DEFAULT NULL COMMENT '下架时间',
  `offsell_aid` int(11) DEFAULT NULL COMMENT '关联下架管理员ID 占不用',
  `mtime` int(11) DEFAULT NULL COMMENT '修改时间',
  `maid` int(11) DEFAULT NULL COMMENT '关联修改管理员ID 占不用',
  `dtime` int(11) DEFAULT NULL COMMENT '删除时间',
  `daid` int(11) DEFAULT NULL COMMENT '关联删除管理员ID 占不用',
  `sum_num` int(11) DEFAULT NULL COMMENT '兑换量',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `picture` varchar(500) DEFAULT '' COMMENT '图片（空格隔开）',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `instruction` text COMMENT '图文描述（说明书或使用说明）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='// 积分商城-----商品总表';

-- ----------------------------
-- Records of ecs_point_goods
-- ----------------------------
