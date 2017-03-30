CREATE DATABASE IF NOT EXISTS `shopImooc`;
USE `shopImooc`;  --打开数据库
--管理员表
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin`(
  `id` tinyint unsigned auto_increment key ,  --自增长，主键
  `username` varchar(20) not null UNIQUE ,
  `password` char(32) not null ,
  `email` varchar(50) not null
);

--分类表
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
  `id` SMALLINT unsigned auto_increment key ,
  `cName` VARCHAR(50) UNIQUE
);

--产品表
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
  `id` int unsigned auto_increment KEY ,
  `pName` VARCHAR(50) not null UNIQUE ,
  `pSn` VARCHAR(50) not null ,
  `pNum` int unsigned DEFAULT 1 ,
  `mPrice` DECIMAL(10,2) not null ,
  `iPrice` DECIMAL(10,2) not null ,
  `pDesc` text ,
  `pImg` VARCHAR(50) not null ,
  `pubTime` int unsigned not null ,
  `isShow` tinyint(1) DEFAULT 1 ,
  `isHot` tinyint(0) DEFAULT 0,
  `cId` SMALLINT unsigned not null
);

--用户表
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user`(
  `id` int unsigned auto_increment key ,
  `username` VARCHAR(20) not null UNIQUE ,
  `password` char(2) not null ,
  `sex` enum("男","女","保密") not null DEFAULT "保密",
  `face` VARCHAR(50) not null,
  `regTime` int unsigned not null
);

--相册表
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album`(
  `id` int unsigned auto_increment key ,
  `pid` int unsigned not null ,
  `albumPath` VARCHAR(50) not null
);