-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: demo
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addon`
--

DROP TABLE IF EXISTS `addon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addon` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `filename` varchar(30) NOT NULL COMMENT '压缩包名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addon`
--

LOCK TABLES `addon` WRITE;
/*!40000 ALTER TABLE `addon` DISABLE KEYS */;
/*!40000 ALTER TABLE `addon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `base`
--

DROP TABLE IF EXISTS `base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `base` (
  `name` varchar(50) NOT NULL COMMENT '名称',
  `type` varchar(50) NOT NULL COMMENT '类别',
  `src` varchar(50) DEFAULT NULL,
  `tai` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件主题表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `base`
--

LOCK TABLES `base` WRITE;
/*!40000 ALTER TABLE `base` DISABLE KEYS */;
INSERT INTO `base` VALUES ('主题二','theme','the1','now');
/*!40000 ALTER TABLE `base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `behaviors`
--

DROP TABLE IF EXISTS `behaviors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `behaviors` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hook_name` varchar(30) NOT NULL COMMENT '钩子名称',
  `behavior_name` varchar(30) NOT NULL COMMENT '行为名称',
  `behavior_file` varchar(30) NOT NULL COMMENT '行为文件名',
  `tai` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='行为表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `behaviors`
--

LOCK TABLES `behaviors` WRITE;
/*!40000 ALTER TABLE `behaviors` DISABLE KEYS */;
INSERT INTO `behaviors` VALUES (19,'Css','自定义Css','Css','enable'),(10,'Validator','验证码','Captcha','enable'),(12,'Classfilter','分类过滤','Classfilter','enable'),(17,'Newpage','页面管理','Newpage','enable'),(15,'Filter','评论过滤','Filter','enable'),(21,'Stat','网页统计','Stat','enable');
/*!40000 ALTER TABLE `behaviors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `user_id` mediumint(6) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `category_id` mediumint(5) unsigned DEFAULT NULL COMMENT '分类ID',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位置',
  `read_count` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `create_time` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned DEFAULT NULL COMMENT '更新时间',
  `publish_time` int(11) unsigned DEFAULT NULL COMMENT '发布时间',
  `delete_time` int(11) unsigned DEFAULT NULL COMMENT '删除时间',
  `tai` varchar(15) DEFAULT NULL,
  `sum` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='博客表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (20,'心情,開心,thinkphp5,php','第一只博文！','    終於實現Markdown編輯了！！！\r\n* lis1\r\n* lis2\r\n### tit\r\n### ti2',0,0,0,0,1542446378,1542447237,1542446378,NULL,'display',10),(22,'試探','MD 的超鏈接','這是[超鏈接](https://www.baidu.com)\r\n\r\n### kafa\r\n## fas\r\n* alsf\r\n* fasd',0,1,0,0,1542447036,1542448115,1542447036,NULL,'display',12);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `category_id` mediumint(5) unsigned DEFAULT NULL COMMENT '分类ID',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `tai` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,1,'编程','display'),(2,0,'玩耍','display');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriesegories`
--

DROP TABLE IF EXISTS `categoriesegories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriesegories` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `category_id` mediumint(5) unsigned DEFAULT NULL COMMENT '分类ID',
  `name` varchar(50) NOT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriesegories`
--

LOCK TABLES `categoriesegories` WRITE;
/*!40000 ALTER TABLE `categoriesegories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoriesegories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text NOT NULL COMMENT '内容',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `blog_id` int(6) NOT NULL COMMENT '博文id',
  `publish_time` int(11) unsigned DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='评论表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'goog','shudal',6,NULL),(2,'very good','shudal',6,1540819990),(3,'excellent!','shudal',6,1540820081),(4,'first comment','shudal',7,1540820563),(5,'//评论内容','shudal',6,1540993215),(6,'//评','junhao',6,1541033914),(7,'//评','junhao',6,1541035769),(8,'//评','junhao',6,1541035822),(9,'//评','junhao',6,1541035950),(10,'//评','junhao',6,1541035998),(11,'//评','junhao',6,1541036033),(12,'//评','junhao',6,1541036136),(13,'内容','junhao',6,1541036151),(14,'//评论内容','junhao',7,1541036328),(15,'//评论内容','shudal',1,1541037891),(16,'//评论内容','shudal',8,1541046237),(17,'//评论内容','shudal',7,1541212831),(18,'//评论内容adfaadf','shudal',1,1541219106),(19,'222','shudal',7,1541219145),(20,'打法是否','shudal',1,1541247247),(21,'fuck','shudal',6,1541390448),(22,'第一只品论','shudal',16,1542431933),(23,'   （自己品論自己\r\n    真棒！','shudal',20,1542446650);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `css`
--

DROP TABLE IF EXISTS `css`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `css` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `src` varchar(255) NOT NULL COMMENT '所属页面',
  `content` text NOT NULL COMMENT 'css内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='css表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `css`
--

LOCK TABLES `css` WRITE;
/*!40000 ALTER TABLE `css` DISABLE KEYS */;
INSERT INTO `css` VALUES (14,'blog/search','<style>\r\nbody{\r\n  background:url(\'https://perci-1253331419.cos.ap-chengdu.myqcloud.com/tp/Attack.on.Titan.full.1503541.jpg\');\r\n  background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;\r\n}\r\n</style>');
/*!40000 ALTER TABLE `css` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='页面表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (2,'titleOfFirestPage','contentOfFirstpage'),(5,'第二页面标题','第二页面的内容');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unkeys`
--

DROP TABLE IF EXISTS `unkeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unkeys` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` varchar(50) NOT NULL COMMENT '被过滤关键词',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='博客表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unkeys`
--

LOCK TABLES `unkeys` WRITE;
/*!40000 ALTER TABLE `unkeys` DISABLE KEYS */;
INSERT INTO `unkeys` VALUES (6,'评论内容');
/*!40000 ALTER TABLE `unkeys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `pri` varchar(50) NOT NULL COMMENT '身份'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('shudal','433b0ca0df6c9c9bbf947e317fc83863','admin'),('junhao','433b0ca0df6c9c9bbf947e317fc83863','vistor'),('asfdasf_2daf','42deb1954439c5d06d08159390950202','visitor'),('helloworld','fc5e038d38a57032085441e7fe7010b0','visitor'),('javaaf','de278efa8905ef18990f9c1a5d267e24','visitor'),('adfafa','d2d9e6d65b07a062e99b6c71450f98ed','visitor'),('sfdhgfdh','830583683f40fd38db67560f0821d067','visitor');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-17 18:39:13
