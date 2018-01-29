/*
Navicat MySQL Data Transfer

Source Server         : user
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : muzi_bkm

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-01-29 10:07:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bkm_activation
-- ----------------------------
DROP TABLE IF EXISTS `bkm_activation`;
CREATE TABLE `bkm_activation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `activation` char(32) DEFAULT NULL COMMENT '激活码',
  `state` bit(1) DEFAULT NULL COMMENT '使用状态 1为已使用',
  `useTime` int(11) DEFAULT NULL COMMENT '使用时间',
  `createTime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_activation
-- ----------------------------
INSERT INTO `bkm_activation` VALUES ('1', '0C940BD2E327098215A185FAE106514F', '', '1517022120', null);

-- ----------------------------
-- Table structure for bkm_book
-- ----------------------------
DROP TABLE IF EXISTS `bkm_book`;
CREATE TABLE `bkm_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `name` varchar(255) DEFAULT NULL COMMENT '书名',
  `pageNumber` int(11) DEFAULT NULL COMMENT '页数',
  `image` varchar(255) DEFAULT NULL COMMENT '图书封面缩略图地址',
  `summary` text COMMENT '简介',
  `state` bit(1) DEFAULT NULL COMMENT '删除状态 1为删除',
  `tagNum` int(11) DEFAULT NULL COMMENT '引用标签的数量',
  `createTime` int(11) DEFAULT NULL COMMENT '创建时间',
  `tagsId` char(10) DEFAULT NULL COMMENT '所引用标签 用，分隔',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_book
-- ----------------------------
INSERT INTO `bkm_book` VALUES ('1', '西游', '854', '54', '古典四大名著', '\0', '12', null, null);

-- ----------------------------
-- Table structure for bkm_borrow
-- ----------------------------
DROP TABLE IF EXISTS `bkm_borrow`;
CREATE TABLE `bkm_borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `uid` int(11) DEFAULT NULL COMMENT '借书的用户ID',
  `bid` int(11) DEFAULT NULL COMMENT '被借图书ID',
  `createTime` int(11) DEFAULT NULL COMMENT '借书时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_borrow
-- ----------------------------

-- ----------------------------
-- Table structure for bkm_enterprise
-- ----------------------------
DROP TABLE IF EXISTS `bkm_enterprise`;
CREATE TABLE `bkm_enterprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `name` varchar(255) DEFAULT NULL COMMENT '企业名称',
  `activationState` bit(1) DEFAULT NULL COMMENT '激活状态 1为已激活',
  `activation` int(11) DEFAULT NULL COMMENT '激活所用激活码ID',
  `createTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_enterprise
-- ----------------------------
INSERT INTO `bkm_enterprise` VALUES ('1', '木子科技', '', '0', '1517022060');
INSERT INTO `bkm_enterprise` VALUES ('2', '木子科技', '', '0', '1517022120');

-- ----------------------------
-- Table structure for bkm_librarian
-- ----------------------------
DROP TABLE IF EXISTS `bkm_librarian`;
CREATE TABLE `bkm_librarian` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `eid` int(11) DEFAULT NULL COMMENT '企业ID',
  `uids` text COMMENT '管理者ID用，分隔',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_librarian
-- ----------------------------

-- ----------------------------
-- Table structure for bkm_need
-- ----------------------------
DROP TABLE IF EXISTS `bkm_need`;
CREATE TABLE `bkm_need` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `uid` int(11) DEFAULT NULL COMMENT '发布需求的用户ID',
  `name` char(30) DEFAULT NULL COMMENT '书名',
  `createTime` int(11) DEFAULT NULL COMMENT '需求发布时间',
  `state` bit(1) DEFAULT NULL COMMENT '回应状态 1为已回应',
  `echoContent` text COMMENT '回应内容',
  `echo_uid` int(11) DEFAULT NULL COMMENT '回应人ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_need
-- ----------------------------

-- ----------------------------
-- Table structure for bkm_reg_apply
-- ----------------------------
DROP TABLE IF EXISTS `bkm_reg_apply`;
CREATE TABLE `bkm_reg_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `uid` int(11) DEFAULT NULL COMMENT '申请用户ID',
  `state` bit(1) DEFAULT NULL COMMENT '审核状态 1为已通过',
  `createTime` int(11) DEFAULT NULL COMMENT '创建时间',
  `eId` int(11) DEFAULT NULL COMMENT '企业ID',
  `passState` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_reg_apply
-- ----------------------------
INSERT INTO `bkm_reg_apply` VALUES ('1', '119', '', '1517035680', '1', '');

-- ----------------------------
-- Table structure for bkm_return_apply
-- ----------------------------
DROP TABLE IF EXISTS `bkm_return_apply`;
CREATE TABLE `bkm_return_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `uid` int(11) DEFAULT NULL COMMENT '申请用户ID',
  `bid` int(11) DEFAULT NULL COMMENT '图书ID',
  `state` bit(1) DEFAULT NULL COMMENT '审核状态 1为已通过',
  `createTime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_return_apply
-- ----------------------------

-- ----------------------------
-- Table structure for bkm_tag
-- ----------------------------
DROP TABLE IF EXISTS `bkm_tag`;
CREATE TABLE `bkm_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `tagName` char(10) DEFAULT NULL COMMENT '标签名称',
  `bids` text COMMENT '引用标签的图书ID ，分隔',
  `bookNum` int(11) DEFAULT NULL COMMENT '标签下图书数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_tag
-- ----------------------------

-- ----------------------------
-- Table structure for bkm_user
-- ----------------------------
DROP TABLE IF EXISTS `bkm_user`;
CREATE TABLE `bkm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自增长',
  `user_Name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `userPwd` char(32) DEFAULT NULL COMMENT '密码',
  `wxId` char(255) DEFAULT NULL COMMENT '绑定微信ID',
  `name` char(4) DEFAULT NULL COMMENT '真实姓名',
  `employeeId` varchar(255) DEFAULT NULL COMMENT '员工号',
  `createTime` int(11) DEFAULT NULL COMMENT '创建时间戳',
  `phone` char(11) DEFAULT NULL COMMENT '手机号码',
  `salt` char(32) DEFAULT NULL COMMENT '盐值',
  `state` bit(1) DEFAULT NULL COMMENT '禁止登录状态 ，1为禁止',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bkm_user
-- ----------------------------
INSERT INTO `bkm_user` VALUES ('1', 'aq846908158', 'woca123', null, null, null, null, null, null, null);
INSERT INTO `bkm_user` VALUES ('2', '123123', null, null, null, null, null, null, null, null);
INSERT INTO `bkm_user` VALUES ('3', '123123111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', null, null, null, null, null, null, null, null);
INSERT INTO `bkm_user` VALUES ('4', '123123111111111111111', null, null, null, null, null, null, null, null);
INSERT INTO `bkm_user` VALUES ('5', '123123111111111111111', null, null, null, null, null, null, null, null);
INSERT INTO `bkm_user` VALUES ('119', 'user1111', '3d6f589fbef0b1dd3ef82ace0885fa6f', null, '你老母', '1', '1517035680', null, '118a529a1f191a93f57aa8efabab277e', '\0');
