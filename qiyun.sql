/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.17 : Database - qiyun
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`qiyun` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `qiyun`;

/*Table structure for table `qy_action` */

DROP TABLE IF EXISTS `qy_action`;

CREATE TABLE `qy_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text COMMENT '行为规则',
  `log` text COMMENT '日志规则',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统行为表';

/*Data for the table `qy_action` */

LOCK TABLES `qy_action` WRITE;

insert  into `qy_action`(`id`,`name`,`title`,`remark`,`rule`,`log`,`type`,`status`,`update_time`) values (1,'user_login','用户登录','积分+10，每天一次','table:member|field:score|condition:uid={$self} AND status>-1|rule:score+10|cycle:24|max:1;','[user|get_nickname]在[time|time_format]登录了后台',1,1,1387181220),(2,'add_article','发布文章','积分+5，每天上限5次','table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:5','',2,0,1380173180),(3,'review','评论','评论积分+1，无限制','table:member|field:score|condition:uid={$self}|rule:score+1','',2,1,1383285646),(4,'add_document','发表文档','积分+10，每天上限5次','table:member|field:score|condition:uid={$self}|rule:score+10|cycle:24|max:5','[user|get_nickname]在[time|time_format]发表了一篇文章。\r\n表[model]，记录编号[record]。',2,0,1386139726),(5,'add_document_topic','发表讨论','积分+5，每天上限10次','table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:10','',2,0,1383285551),(6,'update_config','更新配置','新增或修改或删除配置','','',1,1,1383294988),(7,'update_model','更新模型','新增或修改模型','','',1,1,1383295057),(8,'update_attribute','更新属性','新增或更新或删除属性','','',1,1,1383295963),(9,'update_channel','更新导航','新增或修改或删除导航','','',1,1,1383296301),(10,'update_menu','更新菜单','新增或修改或删除菜单','','',1,1,1383296392),(11,'update_category','更新分类','新增或修改或删除分类','','',1,1,1383296765);

UNLOCK TABLES;

/*Table structure for table `qy_action_log` */

DROP TABLE IF EXISTS `qy_action_log`;

CREATE TABLE `qy_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`),
  KEY `action_ip_ix` (`action_ip`),
  KEY `action_id_ix` (`action_id`),
  KEY `user_id_ix` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

/*Data for the table `qy_action_log` */

LOCK TABLES `qy_action_log` WRITE;

insert  into `qy_action_log`(`id`,`action_id`,`user_id`,`action_ip`,`model`,`record_id`,`remark`,`status`,`create_time`) values (1,1,1,2130706433,'member',1,'admin在2017-04-05 17:29登录了后台',1,1491384586),(2,1,1,2130706433,'member',1,'admin在2017-04-06 11:28登录了后台',1,1491449305),(3,11,1,2130706433,'category',1,'操作url：/admin.php?s=/Category/edit.html',1,1491449535),(4,11,1,2130706433,'category',2,'操作url：/admin.php?s=/Category/edit.html',1,1491449538),(5,11,1,2130706433,'category',39,'操作url：/admin.php?s=/Category/add.html',1,1491449558),(6,11,1,2130706433,'category',40,'操作url：/admin.php?s=/Category/add.html',1,1491449575),(7,11,1,2130706433,'category',41,'操作url：/admin.php?s=/Category/add.html',1,1491449607),(8,10,1,2130706433,'Menu',17,'操作url：/admin.php?s=/Menu/edit.html',1,1491449788),(9,10,1,2130706433,'Menu',124,'操作url：/admin.php?s=/Menu/add.html',1,1491450205),(10,1,1,2130706433,'member',1,'admin在2017-04-10 09:15登录了后台',1,1491786925),(11,10,1,2130706433,'Menu',125,'操作url：/admin.php?s=/Menu/add.html',1,1491787326),(12,10,1,2130706433,'Menu',125,'操作url：/admin.php?s=/Menu/edit.html',1,1491787336),(13,10,1,2130706433,'Menu',126,'操作url：/admin.php?s=/Menu/add.html',1,1491792310),(14,10,1,2130706433,'Menu',126,'操作url：/admin.php?s=/Menu/edit.html',1,1491792337),(15,10,1,2130706433,'Menu',126,'操作url：/admin.php?s=/Menu/edit.html',1,1491792347),(16,10,1,2130706433,'Menu',68,'操作url：/admin.php?s=/Menu/edit.html',1,1491792358),(17,10,1,2130706433,'Menu',126,'操作url：/admin.php?s=/Menu/edit.html',1,1491792463),(18,10,1,2130706433,'Menu',127,'操作url：/admin.php?s=/Menu/add.html',1,1491792485),(19,10,1,2130706433,'Menu',128,'操作url：/admin.php?s=/Menu/add.html',1,1491798255),(20,10,1,2130706433,'Menu',129,'操作url：/admin.php?s=/Menu/add.html',1,1491810447),(21,10,1,2130706433,'Menu',129,'操作url：/admin.php?s=/Menu/edit.html',1,1491810455),(22,10,1,2130706433,'Menu',130,'操作url：/admin.php?s=/Menu/add.html',1,1491810480),(23,10,1,2130706433,'Menu',131,'操作url：/admin.php?s=/Menu/add.html',1,1491811321),(24,1,1,2130706433,'member',1,'admin在2017-04-12 10:31登录了后台',1,1491964314),(25,11,1,2130706433,'category',42,'操作url：/admin.php?s=/Category/add.html',1,1491986322),(26,11,1,2130706433,'category',43,'操作url：/admin.php?s=/Category/add.html',1,1491986354),(27,11,1,2130706433,'category',44,'操作url：/admin.php?s=/Category/add.html',1,1491986387),(28,11,1,2130706433,'category',44,'操作url：/admin.php?s=/Category/edit.html',1,1491988992),(29,1,1,2130706433,'member',1,'admin在2017-04-13 14:19登录了后台',1,1492064378),(30,10,1,2130706433,'Menu',132,'操作url：/admin.php?s=/Menu/add.html',1,1492065119),(31,10,1,2130706433,'Menu',132,'操作url：/admin.php?s=/Menu/edit.html',1,1492065144),(32,10,1,2130706433,'Menu',133,'操作url：/admin.php?s=/Menu/add.html',1,1492065168),(33,1,1,2130706433,'member',1,'admin在2017-04-13 14:51登录了后台',1,1492066263),(34,10,1,2130706433,'Menu',134,'操作url：/admin.php?s=/Menu/add.html',1,1492066337),(35,10,1,2130706433,'Menu',134,'操作url：/admin.php?s=/Menu/edit.html',1,1492066352),(36,10,1,2130706433,'Menu',134,'操作url：/admin.php?s=/Menu/edit.html',1,1492066385),(37,10,1,2130706433,'Menu',134,'操作url：/admin.php?s=/Menu/edit.html',1,1492066414),(38,10,1,2130706433,'Menu',135,'操作url：/admin.php?s=/Menu/add.html',1,1492068243),(39,10,1,2130706433,'Menu',134,'操作url：/admin.php?s=/Menu/edit.html',1,1492068285),(40,10,1,2130706433,'Menu',135,'操作url：/admin.php?s=/Menu/edit.html',1,1492068303),(41,10,1,2130706433,'Menu',132,'操作url：/admin.php?s=/Menu/edit.html',1,1492068888),(42,1,1,2130706433,'member',1,'admin在2017-04-13 15:45登录了后台',1,1492069542),(43,1,1,2130706433,'member',1,'admin在2017-04-13 17:20登录了后台',1,1492075215);

UNLOCK TABLES;

/*Table structure for table `qy_addons` */

DROP TABLE IF EXISTS `qy_addons`;

CREATE TABLE `qy_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='插件表';

/*Data for the table `qy_addons` */

LOCK TABLES `qy_addons` WRITE;

insert  into `qy_addons`(`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`) values (15,'EditorForAdmin','后台编辑器','用于增强整站长文本的输入和显示',1,'{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"500px\",\"editor_resize_type\":\"1\"}','thinkphp','0.1',1383126253,0),(2,'SiteStat','站点统计信息','统计站点的基础信息',0,'{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"1\",\"display\":\"1\",\"status\":\"0\"}','thinkphp','0.1',1379512015,0),(3,'DevTeam','开发团队信息','开发团队成员信息',0,'{\"title\":\"OneThink\\u5f00\\u53d1\\u56e2\\u961f\",\"width\":\"2\",\"display\":\"1\"}','thinkphp','0.1',1379512022,0),(4,'SystemInfo','系统环境信息','用于显示一些服务器的信息',1,'{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"2\",\"display\":\"1\"}','thinkphp','0.1',1379512036,0),(5,'Editor','前台编辑器','用于增强整站长文本的输入和显示',1,'{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"300px\",\"editor_resize_type\":\"1\"}','thinkphp','0.1',1379830910,0),(6,'Attachment','附件','用于文档模型上传附件',1,'null','thinkphp','0.1',1379842319,1),(9,'SocialComment','通用社交化评论','集成了各种社交化评论插件，轻松集成到系统中。',1,'{\"comment_type\":\"1\",\"comment_uid_youyan\":\"\",\"comment_short_name_duoshuo\":\"\",\"comment_data_list_duoshuo\":\"\"}','thinkphp','0.1',1380273962,0);

UNLOCK TABLES;

/*Table structure for table `qy_attachment` */

DROP TABLE IF EXISTS `qy_attachment`;

CREATE TABLE `qy_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '附件显示名',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件类型',
  `source` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资源ID',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联记录ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `dir` int(12) unsigned NOT NULL DEFAULT '0' COMMENT '上级目录ID',
  `sort` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_record_status` (`record_id`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表';

/*Data for the table `qy_attachment` */

LOCK TABLES `qy_attachment` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_attribute` */

DROP TABLE IF EXISTS `qy_attribute`;

CREATE TABLE `qy_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `field` varchar(100) NOT NULL DEFAULT '' COMMENT '字段定义',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '参数',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `is_must` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否必填',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `validate_rule` varchar(255) NOT NULL DEFAULT '',
  `validate_time` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `error_info` varchar(100) NOT NULL DEFAULT '',
  `validate_type` varchar(25) NOT NULL DEFAULT '',
  `auto_rule` varchar(100) NOT NULL DEFAULT '',
  `auto_time` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `auto_type` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='模型属性表';

/*Data for the table `qy_attribute` */

LOCK TABLES `qy_attribute` WRITE;

insert  into `qy_attribute`(`id`,`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) values (1,'uid','用户ID','int(10) unsigned NOT NULL ','num','0','',0,'',1,0,1,1384508362,1383891233,'',0,'','','',0,''),(2,'name','标识','char(40) NOT NULL ','string','','同一根节点下标识不重复',1,'',1,0,1,1383894743,1383891233,'',0,'','','',0,''),(3,'title','标题','char(80) NOT NULL ','string','','文档标题',1,'',1,0,1,1383894778,1383891233,'',0,'','','',0,''),(4,'category_id','所属分类','int(10) unsigned NOT NULL ','string','','',0,'',1,0,1,1384508336,1383891233,'',0,'','','',0,''),(5,'description','描述','char(140) NOT NULL ','textarea','','',1,'',1,0,1,1383894927,1383891233,'',0,'','','',0,''),(6,'root','根节点','int(10) unsigned NOT NULL ','num','0','该文档的顶级文档编号',0,'',1,0,1,1384508323,1383891233,'',0,'','','',0,''),(7,'pid','所属ID','int(10) unsigned NOT NULL ','num','0','父文档编号',0,'',1,0,1,1384508543,1383891233,'',0,'','','',0,''),(8,'model_id','内容模型ID','tinyint(3) unsigned NOT NULL ','num','0','该文档所对应的模型',0,'',1,0,1,1384508350,1383891233,'',0,'','','',0,''),(9,'type','内容类型','tinyint(3) unsigned NOT NULL ','select','2','',1,'1:目录\r\n2:主题\r\n3:段落',1,0,1,1384511157,1383891233,'',0,'','','',0,''),(10,'position','推荐位','smallint(5) unsigned NOT NULL ','checkbox','0','多个推荐则将其推荐值相加',1,'[DOCUMENT_POSITION]',1,0,1,1383895640,1383891233,'',0,'','','',0,''),(11,'link_id','外链','int(10) unsigned NOT NULL ','num','0','0-非外链，大于0-外链ID,需要函数进行链接与编号的转换',1,'',1,0,1,1383895757,1383891233,'',0,'','','',0,''),(12,'cover_id','封面','int(10) unsigned NOT NULL ','picture','0','0-无封面，大于0-封面图片ID，需要函数处理',1,'',1,0,1,1384147827,1383891233,'',0,'','','',0,''),(13,'display','可见性','tinyint(3) unsigned NOT NULL ','radio','1','',1,'0:不可见\r\n1:所有人可见',1,0,1,1386662271,1383891233,'',0,'','regex','',0,'function'),(14,'deadline','截至时间','int(10) unsigned NOT NULL ','datetime','0','0-永久有效',1,'',1,0,1,1387163248,1383891233,'',0,'','regex','',0,'function'),(15,'attach','附件数量','tinyint(3) unsigned NOT NULL ','num','0','',0,'',1,0,1,1387260355,1383891233,'',0,'','regex','',0,'function'),(16,'view','浏览量','int(10) unsigned NOT NULL ','num','0','',1,'',1,0,1,1383895835,1383891233,'',0,'','','',0,''),(17,'comment','评论数','int(10) unsigned NOT NULL ','num','0','',1,'',1,0,1,1383895846,1383891233,'',0,'','','',0,''),(18,'extend','扩展统计字段','int(10) unsigned NOT NULL ','num','0','根据需求自行使用',0,'',1,0,1,1384508264,1383891233,'',0,'','','',0,''),(19,'level','优先级','int(10) unsigned NOT NULL ','num','0','越高排序越靠前',1,'',1,0,1,1383895894,1383891233,'',0,'','','',0,''),(20,'create_time','创建时间','int(10) unsigned NOT NULL ','datetime','0','',1,'',1,0,1,1383895903,1383891233,'',0,'','','',0,''),(21,'update_time','更新时间','int(10) unsigned NOT NULL ','datetime','0','',0,'',1,0,1,1384508277,1383891233,'',0,'','','',0,''),(22,'status','数据状态','tinyint(4) NOT NULL ','radio','0','',0,'-1:删除\r\n0:禁用\r\n1:正常\r\n2:待审核\r\n3:草稿',1,0,1,1384508496,1383891233,'',0,'','','',0,''),(23,'parse','内容解析类型','tinyint(3) unsigned NOT NULL ','select','0','',0,'0:html\r\n1:ubb\r\n2:markdown',2,0,1,1384511049,1383891243,'',0,'','','',0,''),(24,'content','文章内容','text NOT NULL ','editor','','',1,'',2,0,1,1383896225,1383891243,'',0,'','','',0,''),(25,'template','详情页显示模板','varchar(100) NOT NULL ','string','','参照display方法参数的定义',1,'',2,0,1,1383896190,1383891243,'',0,'','','',0,''),(26,'bookmark','收藏数','int(10) unsigned NOT NULL ','num','0','',1,'',2,0,1,1383896103,1383891243,'',0,'','','',0,''),(27,'parse','内容解析类型','tinyint(3) unsigned NOT NULL ','select','0','',0,'0:html\r\n1:ubb\r\n2:markdown',3,0,1,1387260461,1383891252,'',0,'','regex','',0,'function'),(28,'content','下载详细描述','text NOT NULL ','editor','','',1,'',3,0,1,1383896438,1383891252,'',0,'','','',0,''),(29,'template','详情页显示模板','varchar(100) NOT NULL ','string','','',1,'',3,0,1,1383896429,1383891252,'',0,'','','',0,''),(30,'file_id','文件ID','int(10) unsigned NOT NULL ','file','0','需要函数处理',1,'',3,0,1,1383896415,1383891252,'',0,'','','',0,''),(31,'download','下载次数','int(10) unsigned NOT NULL ','num','0','',1,'',3,0,1,1383896380,1383891252,'',0,'','','',0,''),(32,'size','文件大小','bigint(20) unsigned NOT NULL ','num','0','单位bit',1,'',3,0,1,1383896371,1383891252,'',0,'','','',0,'');

UNLOCK TABLES;

/*Table structure for table `qy_auth_extend` */

DROP TABLE IF EXISTS `qy_auth_extend`;

CREATE TABLE `qy_auth_extend` (
  `group_id` mediumint(10) unsigned NOT NULL COMMENT '用户id',
  `extend_id` mediumint(8) unsigned NOT NULL COMMENT '扩展表中数据的id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '扩展类型标识 1:栏目分类权限;2:模型权限',
  UNIQUE KEY `group_extend_type` (`group_id`,`extend_id`,`type`),
  KEY `uid` (`group_id`),
  KEY `group_id` (`extend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组与分类的对应关系表';

/*Data for the table `qy_auth_extend` */

LOCK TABLES `qy_auth_extend` WRITE;

insert  into `qy_auth_extend`(`group_id`,`extend_id`,`type`) values (1,1,1),(1,1,2),(1,2,1),(1,2,2),(1,3,1),(1,3,2),(1,4,1),(1,37,1);

UNLOCK TABLES;

/*Table structure for table `qy_auth_group` */

DROP TABLE IF EXISTS `qy_auth_group`;

CREATE TABLE `qy_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL DEFAULT '' COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `qy_auth_group` */

LOCK TABLES `qy_auth_group` WRITE;

insert  into `qy_auth_group`(`id`,`module`,`type`,`title`,`description`,`status`,`rules`) values (1,'admin',1,'默认用户组','',1,'1,2,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,81,82,83,84,86,87,88,89,90,91,92,93,94,95,96,97,100,102,103,105,106'),(2,'admin',1,'测试用户','测试用户',1,'1,2,5,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,82,83,84,88,89,90,91,92,93,96,97,100,102,103,195');

UNLOCK TABLES;

/*Table structure for table `qy_auth_group_access` */

DROP TABLE IF EXISTS `qy_auth_group_access`;

CREATE TABLE `qy_auth_group_access` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `qy_auth_group_access` */

LOCK TABLES `qy_auth_group_access` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_auth_rule` */

DROP TABLE IF EXISTS `qy_auth_rule`;

CREATE TABLE `qy_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-url;2-主菜单',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

/*Data for the table `qy_auth_rule` */

LOCK TABLES `qy_auth_rule` WRITE;

insert  into `qy_auth_rule`(`id`,`module`,`type`,`name`,`title`,`status`,`condition`) values (1,'admin',2,'Admin/Index/index','首页',1,''),(2,'admin',2,'Admin/Article/index','内容',1,''),(3,'admin',2,'Admin/User/index','用户',1,''),(4,'admin',2,'Admin/Addons/index','扩展',1,''),(5,'admin',2,'Admin/Config/group','系统',1,''),(7,'admin',1,'Admin/article/add','新增',1,''),(8,'admin',1,'Admin/article/edit','编辑',1,''),(9,'admin',1,'Admin/article/setStatus','改变状态',1,''),(10,'admin',1,'Admin/article/update','保存',1,''),(11,'admin',1,'Admin/article/autoSave','保存草稿',1,''),(12,'admin',1,'Admin/article/move','移动',1,''),(13,'admin',1,'Admin/article/copy','复制',1,''),(14,'admin',1,'Admin/article/paste','粘贴',1,''),(15,'admin',1,'Admin/article/permit','还原',1,''),(16,'admin',1,'Admin/article/clear','清空',1,''),(17,'admin',1,'Admin/article/examine','审核列表',1,''),(18,'admin',1,'Admin/article/recycle','回收站',1,''),(19,'admin',1,'Admin/User/addaction','新增用户行为',1,''),(20,'admin',1,'Admin/User/editaction','编辑用户行为',1,''),(21,'admin',1,'Admin/User/saveAction','保存用户行为',1,''),(22,'admin',1,'Admin/User/setStatus','变更行为状态',1,''),(23,'admin',1,'Admin/User/changeStatus?method=forbidUser','禁用会员',1,''),(24,'admin',1,'Admin/User/changeStatus?method=resumeUser','启用会员',1,''),(25,'admin',1,'Admin/User/changeStatus?method=deleteUser','删除会员',1,''),(26,'admin',1,'Admin/User/index','用户信息',1,''),(27,'admin',1,'Admin/User/action','用户行为',1,''),(28,'admin',1,'Admin/AuthManager/changeStatus?method=deleteGroup','删除',1,''),(29,'admin',1,'Admin/AuthManager/changeStatus?method=forbidGroup','禁用',1,''),(30,'admin',1,'Admin/AuthManager/changeStatus?method=resumeGroup','恢复',1,''),(31,'admin',1,'Admin/AuthManager/createGroup','新增',1,''),(32,'admin',1,'Admin/AuthManager/editGroup','编辑',1,''),(33,'admin',1,'Admin/AuthManager/writeGroup','保存用户组',1,''),(34,'admin',1,'Admin/AuthManager/group','授权',1,''),(35,'admin',1,'Admin/AuthManager/access','访问授权',1,''),(36,'admin',1,'Admin/AuthManager/user','成员授权',1,''),(37,'admin',1,'Admin/AuthManager/removeFromGroup','解除授权',1,''),(38,'admin',1,'Admin/AuthManager/addToGroup','保存成员授权',1,''),(39,'admin',1,'Admin/AuthManager/category','分类授权',1,''),(40,'admin',1,'Admin/AuthManager/addToCategory','保存分类授权',1,''),(41,'admin',1,'Admin/AuthManager/index','权限管理',1,''),(42,'admin',1,'Admin/Addons/create','创建',1,''),(43,'admin',1,'Admin/Addons/checkForm','检测创建',1,''),(44,'admin',1,'Admin/Addons/preview','预览',1,''),(45,'admin',1,'Admin/Addons/build','快速生成插件',1,''),(46,'admin',1,'Admin/Addons/config','设置',1,''),(47,'admin',1,'Admin/Addons/disable','禁用',1,''),(48,'admin',1,'Admin/Addons/enable','启用',1,''),(49,'admin',1,'Admin/Addons/install','安装',1,''),(50,'admin',1,'Admin/Addons/uninstall','卸载',1,''),(51,'admin',1,'Admin/Addons/saveconfig','更新配置',1,''),(52,'admin',1,'Admin/Addons/adminList','插件后台列表',1,''),(53,'admin',1,'Admin/Addons/execute','URL方式访问插件',1,''),(54,'admin',1,'Admin/Addons/index','插件管理',1,''),(55,'admin',1,'Admin/Addons/hooks','钩子管理',1,''),(56,'admin',1,'Admin/model/add','新增',1,''),(57,'admin',1,'Admin/model/edit','编辑',1,''),(58,'admin',1,'Admin/model/setStatus','改变状态',1,''),(59,'admin',1,'Admin/model/update','保存数据',1,''),(60,'admin',1,'Admin/Model/index','模型管理',1,''),(61,'admin',1,'Admin/Config/edit','编辑',1,''),(62,'admin',1,'Admin/Config/del','删除',1,''),(63,'admin',1,'Admin/Config/add','新增',1,''),(64,'admin',1,'Admin/Config/save','保存',1,''),(65,'admin',1,'Admin/Config/group','网站设置',1,''),(66,'admin',1,'Admin/Config/index','配置管理',1,''),(67,'admin',1,'Admin/Channel/add','新增',1,''),(68,'admin',1,'Admin/Channel/edit','编辑',1,''),(69,'admin',1,'Admin/Channel/del','删除',1,''),(70,'admin',1,'Admin/Channel/index','导航管理',1,''),(71,'admin',1,'Admin/Category/edit','编辑',1,''),(72,'admin',1,'Admin/Category/add','新增',1,''),(73,'admin',1,'Admin/Category/remove','删除',1,''),(74,'admin',1,'Admin/Category/index','分类管理',1,''),(75,'admin',1,'Admin/file/upload','上传控件',-1,''),(76,'admin',1,'Admin/file/uploadPicture','上传图片',-1,''),(77,'admin',1,'Admin/file/download','下载',-1,''),(94,'admin',1,'Admin/AuthManager/modelauth','模型授权',1,''),(79,'admin',1,'Admin/article/batchOperate','导入',1,''),(80,'admin',1,'Admin/Database/index?type=export','备份数据库',1,''),(81,'admin',1,'Admin/Database/index?type=import','还原数据库',1,''),(82,'admin',1,'Admin/Database/export','备份',1,''),(83,'admin',1,'Admin/Database/optimize','优化表',1,''),(84,'admin',1,'Admin/Database/repair','修复表',1,''),(86,'admin',1,'Admin/Database/import','恢复',1,''),(87,'admin',1,'Admin/Database/del','删除',1,''),(88,'admin',1,'Admin/User/add','新增用户',1,''),(89,'admin',1,'Admin/Attribute/index','属性管理',1,''),(90,'admin',1,'Admin/Attribute/add','新增',1,''),(91,'admin',1,'Admin/Attribute/edit','编辑',1,''),(92,'admin',1,'Admin/Attribute/setStatus','改变状态',1,''),(93,'admin',1,'Admin/Attribute/update','保存数据',1,''),(95,'admin',1,'Admin/AuthManager/addToModel','保存模型授权',1,''),(96,'admin',1,'Admin/Category/move','移动',-1,''),(97,'admin',1,'Admin/Category/merge','合并',-1,''),(98,'admin',1,'Admin/Config/menu','后台菜单管理',-1,''),(99,'admin',1,'Admin/Article/mydocument','内容',-1,''),(100,'admin',1,'Admin/Menu/index','菜单管理',1,''),(101,'admin',1,'Admin/other','其他',-1,''),(102,'admin',1,'Admin/Menu/add','新增',1,''),(103,'admin',1,'Admin/Menu/edit','编辑',1,''),(104,'admin',1,'Admin/Think/lists?model=article','文章管理',-1,''),(105,'admin',1,'Admin/Think/lists?model=download','下载管理',1,''),(106,'admin',1,'Admin/Think/lists?model=config','配置管理',1,''),(107,'admin',1,'Admin/Action/actionlog','行为日志',1,''),(108,'admin',1,'Admin/User/updatePassword','修改密码',1,''),(109,'admin',1,'Admin/User/updateNickname','修改昵称',1,''),(110,'admin',1,'Admin/action/edit','查看行为日志',1,''),(205,'admin',1,'Admin/think/add','新增数据',1,''),(111,'admin',2,'Admin/article/index','文档列表',-1,''),(112,'admin',2,'Admin/article/add','新增',-1,''),(113,'admin',2,'Admin/article/edit','编辑',-1,''),(114,'admin',2,'Admin/article/setStatus','改变状态',-1,''),(115,'admin',2,'Admin/article/update','保存',-1,''),(116,'admin',2,'Admin/article/autoSave','保存草稿',-1,''),(117,'admin',2,'Admin/article/move','移动',-1,''),(118,'admin',2,'Admin/article/copy','复制',-1,''),(119,'admin',2,'Admin/article/paste','粘贴',-1,''),(120,'admin',2,'Admin/article/batchOperate','导入',-1,''),(121,'admin',2,'Admin/article/recycle','回收站',-1,''),(122,'admin',2,'Admin/article/permit','还原',-1,''),(123,'admin',2,'Admin/article/clear','清空',-1,''),(124,'admin',2,'Admin/User/add','新增用户',-1,''),(125,'admin',2,'Admin/User/action','用户行为',-1,''),(126,'admin',2,'Admin/User/addAction','新增用户行为',-1,''),(127,'admin',2,'Admin/User/editAction','编辑用户行为',-1,''),(128,'admin',2,'Admin/User/saveAction','保存用户行为',-1,''),(129,'admin',2,'Admin/User/setStatus','变更行为状态',-1,''),(130,'admin',2,'Admin/User/changeStatus?method=forbidUser','禁用会员',-1,''),(131,'admin',2,'Admin/User/changeStatus?method=resumeUser','启用会员',-1,''),(132,'admin',2,'Admin/User/changeStatus?method=deleteUser','删除会员',-1,''),(133,'admin',2,'Admin/AuthManager/index','权限管理',-1,''),(134,'admin',2,'Admin/AuthManager/changeStatus?method=deleteGroup','删除',-1,''),(135,'admin',2,'Admin/AuthManager/changeStatus?method=forbidGroup','禁用',-1,''),(136,'admin',2,'Admin/AuthManager/changeStatus?method=resumeGroup','恢复',-1,''),(137,'admin',2,'Admin/AuthManager/createGroup','新增',-1,''),(138,'admin',2,'Admin/AuthManager/editGroup','编辑',-1,''),(139,'admin',2,'Admin/AuthManager/writeGroup','保存用户组',-1,''),(140,'admin',2,'Admin/AuthManager/group','授权',-1,''),(141,'admin',2,'Admin/AuthManager/access','访问授权',-1,''),(142,'admin',2,'Admin/AuthManager/user','成员授权',-1,''),(143,'admin',2,'Admin/AuthManager/removeFromGroup','解除授权',-1,''),(144,'admin',2,'Admin/AuthManager/addToGroup','保存成员授权',-1,''),(145,'admin',2,'Admin/AuthManager/category','分类授权',-1,''),(146,'admin',2,'Admin/AuthManager/addToCategory','保存分类授权',-1,''),(147,'admin',2,'Admin/AuthManager/modelauth','模型授权',-1,''),(148,'admin',2,'Admin/AuthManager/addToModel','保存模型授权',-1,''),(149,'admin',2,'Admin/Addons/create','创建',-1,''),(150,'admin',2,'Admin/Addons/checkForm','检测创建',-1,''),(151,'admin',2,'Admin/Addons/preview','预览',-1,''),(152,'admin',2,'Admin/Addons/build','快速生成插件',-1,''),(153,'admin',2,'Admin/Addons/config','设置',-1,''),(154,'admin',2,'Admin/Addons/disable','禁用',-1,''),(155,'admin',2,'Admin/Addons/enable','启用',-1,''),(156,'admin',2,'Admin/Addons/install','安装',-1,''),(157,'admin',2,'Admin/Addons/uninstall','卸载',-1,''),(158,'admin',2,'Admin/Addons/saveconfig','更新配置',-1,''),(159,'admin',2,'Admin/Addons/adminList','插件后台列表',-1,''),(160,'admin',2,'Admin/Addons/execute','URL方式访问插件',-1,''),(161,'admin',2,'Admin/Addons/hooks','钩子管理',-1,''),(162,'admin',2,'Admin/Model/index','模型管理',-1,''),(163,'admin',2,'Admin/model/add','新增',-1,''),(164,'admin',2,'Admin/model/edit','编辑',-1,''),(165,'admin',2,'Admin/model/setStatus','改变状态',-1,''),(166,'admin',2,'Admin/model/update','保存数据',-1,''),(167,'admin',2,'Admin/Attribute/index','属性管理',-1,''),(168,'admin',2,'Admin/Attribute/add','新增',-1,''),(169,'admin',2,'Admin/Attribute/edit','编辑',-1,''),(170,'admin',2,'Admin/Attribute/setStatus','改变状态',-1,''),(171,'admin',2,'Admin/Attribute/update','保存数据',-1,''),(172,'admin',2,'Admin/Config/index','配置管理',-1,''),(173,'admin',2,'Admin/Config/edit','编辑',-1,''),(174,'admin',2,'Admin/Config/del','删除',-1,''),(175,'admin',2,'Admin/Config/add','新增',-1,''),(176,'admin',2,'Admin/Config/save','保存',-1,''),(177,'admin',2,'Admin/Menu/index','菜单管理',-1,''),(178,'admin',2,'Admin/Channel/index','导航管理',-1,''),(179,'admin',2,'Admin/Channel/add','新增',-1,''),(180,'admin',2,'Admin/Channel/edit','编辑',-1,''),(181,'admin',2,'Admin/Channel/del','删除',-1,''),(182,'admin',2,'Admin/Category/index','分类管理',-1,''),(183,'admin',2,'Admin/Category/edit','编辑',-1,''),(184,'admin',2,'Admin/Category/add','新增',-1,''),(185,'admin',2,'Admin/Category/remove','删除',-1,''),(186,'admin',2,'Admin/Category/move','移动',-1,''),(187,'admin',2,'Admin/Category/merge','合并',-1,''),(188,'admin',2,'Admin/Database/index?type=export','备份数据库',-1,''),(189,'admin',2,'Admin/Database/export','备份',-1,''),(190,'admin',2,'Admin/Database/optimize','优化表',-1,''),(191,'admin',2,'Admin/Database/repair','修复表',-1,''),(192,'admin',2,'Admin/Database/index?type=import','还原数据库',-1,''),(193,'admin',2,'Admin/Database/import','恢复',-1,''),(194,'admin',2,'Admin/Database/del','删除',-1,''),(195,'admin',2,'Admin/other','其他',1,''),(196,'admin',2,'Admin/Menu/add','新增',-1,''),(197,'admin',2,'Admin/Menu/edit','编辑',-1,''),(198,'admin',2,'Admin/Think/lists?model=article','应用',-1,''),(199,'admin',2,'Admin/Think/lists?model=download','下载管理',-1,''),(200,'admin',2,'Admin/Think/lists?model=config','应用',-1,''),(201,'admin',2,'Admin/Action/actionlog','行为日志',-1,''),(202,'admin',2,'Admin/User/updatePassword','修改密码',-1,''),(203,'admin',2,'Admin/User/updateNickname','修改昵称',-1,''),(204,'admin',2,'Admin/action/edit','查看行为日志',-1,''),(206,'admin',1,'Admin/think/edit','编辑数据',1,''),(207,'admin',1,'Admin/Menu/import','导入',1,''),(208,'admin',1,'Admin/Model/generate','生成',1,''),(209,'admin',1,'Admin/Addons/addHook','新增钩子',1,''),(210,'admin',1,'Admin/Addons/edithook','编辑钩子',1,''),(211,'admin',1,'Admin/Article/sort','文档排序',1,''),(212,'admin',1,'Admin/Config/sort','排序',1,''),(213,'admin',1,'Admin/Menu/sort','排序',1,''),(214,'admin',1,'Admin/Channel/sort','排序',1,''),(215,'admin',1,'Admin/Category/operate/type/move','移动',1,''),(216,'admin',1,'Admin/Category/operate/type/merge','合并',1,'');

UNLOCK TABLES;

/*Table structure for table `qy_category` */

DROP TABLE IF EXISTS `qy_category`;

CREATE TABLE `qy_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(30) NOT NULL COMMENT '标志',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `list_row` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '列表每页行数',
  `meta_title` varchar(50) NOT NULL DEFAULT '' COMMENT 'SEO的网页标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `template_index` varchar(100) NOT NULL DEFAULT '' COMMENT '频道页模板',
  `template_lists` varchar(100) NOT NULL DEFAULT '' COMMENT '列表页模板',
  `template_detail` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页模板',
  `template_edit` varchar(100) NOT NULL DEFAULT '' COMMENT '编辑页模板',
  `model` varchar(100) NOT NULL DEFAULT '' COMMENT '列表绑定模型',
  `model_sub` varchar(100) NOT NULL DEFAULT '' COMMENT '子文档绑定模型',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '允许发布的内容类型',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `allow_publish` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许发布内容',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '可见性',
  `reply` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许回复',
  `check` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发布的文章是否需要审核',
  `reply_model` varchar(100) NOT NULL DEFAULT '',
  `extend` text COMMENT '扩展设置',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  `icon` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类图标',
  `groups` varchar(255) NOT NULL DEFAULT '' COMMENT '分组定义',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='分类表';

/*Data for the table `qy_category` */

LOCK TABLES `qy_category` WRITE;

insert  into `qy_category`(`id`,`name`,`title`,`pid`,`sort`,`list_row`,`meta_title`,`keywords`,`description`,`template_index`,`template_lists`,`template_detail`,`template_edit`,`model`,`model_sub`,`type`,`link_id`,`allow_publish`,`display`,`reply`,`check`,`reply_model`,`extend`,`create_time`,`update_time`,`status`,`icon`,`groups`) values (1,'blog','微讲座',0,0,10,'','','','','','','','2,3','2','2,1',0,0,1,0,0,'1','',1379474947,1491449535,1,0,''),(2,'default_blog','法律',1,1,10,'','','','','','','','2,3','2','2,1,3',0,1,1,0,1,'1','',1379475028,1491449538,1,0,''),(39,'xs','销售',1,0,10,'','','','','','','','','','',0,1,1,0,0,'',NULL,1491449558,1491449558,1,0,''),(40,'gq','股权',1,0,10,'','','','','','','','','','',0,1,1,0,0,'',NULL,1491449575,1491449575,1,0,''),(41,'rz','融资',1,0,10,'','','','','','','','','','',0,1,1,0,0,'',NULL,1491449607,1491449607,1,0,''),(42,'zw','职位',0,0,10,'','','','','','','','','','',0,1,1,0,0,'',NULL,1491986322,1491986322,1,0,''),(43,'ls','律师',42,0,10,'','','','','','','','','','',0,1,1,0,0,'',NULL,1491986354,1491986354,1,0,''),(44,'zxgw','房地产顾问',42,0,10,'','','','','','','','','','2',0,1,1,0,0,'',NULL,1491986387,1491988992,1,0,'');

UNLOCK TABLES;

/*Table structure for table `qy_channel` */

DROP TABLE IF EXISTS `qy_channel`;

CREATE TABLE `qy_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '频道ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级频道ID',
  `title` char(30) NOT NULL COMMENT '频道标题',
  `url` char(100) NOT NULL COMMENT '频道连接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '导航排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `target` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `qy_channel` */

LOCK TABLES `qy_channel` WRITE;

insert  into `qy_channel`(`id`,`pid`,`title`,`url`,`sort`,`create_time`,`update_time`,`status`,`target`) values (1,0,'首页','Index/index',1,1379475111,1379923177,1,0),(2,0,'博客','Article/index?category=blog',2,1379475131,1379483713,1,0),(3,0,'官网','http://www.onethink.cn',3,1379475154,1387163458,1,0);

UNLOCK TABLES;

/*Table structure for table `qy_config` */

DROP TABLE IF EXISTS `qy_config`;

CREATE TABLE `qy_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `qy_config` */

LOCK TABLES `qy_config` WRITE;

insert  into `qy_config`(`id`,`name`,`type`,`title`,`group`,`extra`,`remark`,`create_time`,`update_time`,`status`,`value`,`sort`) values (1,'WEB_SITE_TITLE',1,'网站标题',1,'','网站标题前台显示标题',1378898976,1379235274,1,'内容管理',0),(2,'WEB_SITE_DESCRIPTION',2,'网站描述',1,'','网站搜索引擎描述',1378898976,1379235841,1,'内容管理',1),(3,'WEB_SITE_KEYWORD',2,'网站关键字',1,'','网站搜索引擎关键字',1378898976,1381390100,1,'内容管理',8),(4,'WEB_SITE_CLOSE',4,'关闭站点',1,'0:关闭,1:开启','站点关闭后其他用户不能访问，管理员可以正常访问',1378898976,1379235296,1,'1',1),(9,'CONFIG_TYPE_LIST',3,'配置类型列表',4,'','主要用于数据解析和页面表单的生成',1378898976,1379235348,1,'0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举',2),(10,'WEB_SITE_ICP',1,'网站备案号',1,'','设置在网站底部显示的备案号，如“沪ICP备12007941号-2',1378900335,1379235859,1,'',9),(11,'DOCUMENT_POSITION',3,'文档推荐位',2,'','文档推荐位，推荐到多个位置KEY值相加即可',1379053380,1379235329,1,'1:列表推荐\r\n2:频道推荐\r\n4:首页推荐',3),(12,'DOCUMENT_DISPLAY',3,'文档可见性',2,'','文章可见性仅影响前台显示，后台不收影响',1379056370,1379235322,1,'0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见',4),(13,'COLOR_STYLE',4,'后台色系',1,'default_color:默认\r\nblue_color:紫罗兰','后台颜色风格',1379122533,1379235904,1,'default_color',10),(20,'CONFIG_GROUP_LIST',3,'配置分组',4,'','配置分组',1379228036,1384418383,1,'1:基本\r\n2:内容\r\n3:用户\r\n4:系统',4),(21,'HOOKS_TYPE',3,'钩子的类型',4,'','类型 1-用于扩展显示内容，2-用于扩展业务处理',1379313397,1379313407,1,'1:视图\r\n2:控制器',6),(22,'AUTH_CONFIG',3,'Auth配置',4,'','自定义Auth.class.php类配置',1379409310,1379409564,1,'AUTH_ON:1\r\nAUTH_TYPE:2',8),(23,'OPEN_DRAFTBOX',4,'是否开启草稿功能',2,'0:关闭草稿功能\r\n1:开启草稿功能\r\n','新增文章时的草稿功能配置',1379484332,1379484591,1,'1',1),(24,'DRAFT_AOTOSAVE_INTERVAL',0,'自动保存草稿时间',2,'','自动保存草稿的时间间隔，单位：秒',1379484574,1386143323,1,'60',2),(25,'LIST_ROWS',0,'后台每页记录数',2,'','后台数据每页显示记录数',1379503896,1380427745,1,'10',10),(26,'USER_ALLOW_REGISTER',4,'是否允许用户注册',3,'0:关闭注册\r\n1:允许注册','是否开放用户注册',1379504487,1379504580,1,'1',3),(27,'CODEMIRROR_THEME',4,'预览插件的CodeMirror主题',4,'3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight','详情见CodeMirror官网',1379814385,1384740813,1,'ambiance',3),(28,'DATA_BACKUP_PATH',1,'数据库备份根路径',4,'','路径必须以 / 结尾',1381482411,1381482411,1,'./Data/',5),(29,'DATA_BACKUP_PART_SIZE',0,'数据库备份卷大小',4,'','该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M',1381482488,1381729564,1,'20971520',7),(30,'DATA_BACKUP_COMPRESS',4,'数据库备份文件是否启用压缩',4,'0:不压缩\r\n1:启用压缩','压缩备份文件需要PHP环境支持gzopen,gzwrite函数',1381713345,1381729544,1,'1',9),(31,'DATA_BACKUP_COMPRESS_LEVEL',4,'数据库备份文件压缩级别',4,'1:普通\r\n4:一般\r\n9:最高','数据库备份文件的压缩级别，该配置在开启压缩时生效',1381713408,1381713408,1,'9',10),(32,'DEVELOP_MODE',4,'开启开发者模式',4,'0:关闭\r\n1:开启','是否开启开发者模式',1383105995,1383291877,1,'1',11),(33,'ALLOW_VISIT',3,'不受限控制器方法',0,'','',1386644047,1386644741,1,'0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture',0),(34,'DENY_VISIT',3,'超管专限控制器方法',0,'','仅超级管理员可访问的控制器方法',1386644141,1386644659,1,'0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree',0),(35,'REPLY_LIST_ROWS',0,'回复列表每页条数',2,'','',1386645376,1387178083,1,'10',0),(36,'ADMIN_ALLOW_IP',2,'后台允许访问IP',4,'','多个用逗号分隔，如果不配置表示不限制IP访问',1387165454,1387165553,1,'',12),(37,'SHOW_PAGE_TRACE',4,'是否显示页面Trace',4,'0:关闭\r\n1:开启','是否显示页面Trace信息',1387165685,1387165685,1,'0',1),(38,'SYSTEM_ABOUT',2,'企业介绍',1,'','关于企业简介',0,0,1,'企业简介企业简介企业简介企业简介企业简介企业简介企业简介',10),(39,'SYSTEM_MONEY',1,'回答问题收费标准',1,'','全站回答问题收费标准',0,0,1,'1',8);

UNLOCK TABLES;

/*Table structure for table `qy_document` */

DROP TABLE IF EXISTS `qy_document`;

CREATE TABLE `qy_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `category_id` int(10) unsigned NOT NULL COMMENT '所属分类',
  `group_id` smallint(3) unsigned NOT NULL COMMENT '所属分组',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `root` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '根节点',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属ID',
  `model_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容模型ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '内容类型',
  `position` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '可见性',
  `deadline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '截至时间',
  `attach` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展统计字段',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '优先级',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  KEY `idx_category_status` (`category_id`,`status`),
  KEY `idx_status_type_pid` (`status`,`uid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文档模型基础表';

/*Data for the table `qy_document` */

LOCK TABLES `qy_document` WRITE;

insert  into `qy_document`(`id`,`uid`,`name`,`title`,`category_id`,`group_id`,`description`,`root`,`pid`,`model_id`,`type`,`position`,`link_id`,`cover_id`,`display`,`deadline`,`attach`,`view`,`comment`,`extend`,`level`,`create_time`,`update_time`,`status`) values (1,1,'','OneThink1.1开发版发布',2,0,'期待已久的OneThink最新版发布',0,0,2,2,0,0,0,1,0,0,8,0,0,0,1406001413,1406001413,1);

UNLOCK TABLES;

/*Table structure for table `qy_document_article` */

DROP TABLE IF EXISTS `qy_document_article`;

CREATE TABLE `qy_document_article` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '文章内容',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `bookmark` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型文章表';

/*Data for the table `qy_document_article` */

LOCK TABLES `qy_document_article` WRITE;

insert  into `qy_document_article`(`id`,`parse`,`content`,`template`,`bookmark`) values (1,0,'<h1>\r\n	OneThink1.1开发版发布&nbsp;\r\n</h1>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>OneThink是一个开源的内容管理框架，基于最新的ThinkPHP3.2版本开发，提供更方便、更安全的WEB应用开发体验，采用了全新的架构设计和命名空间机制，融合了模块化、驱动化和插件化的设计理念于一体，开启了国内WEB应用傻瓜式开发的新潮流。&nbsp;</strong> \r\n</p>\r\n<h2>\r\n	主要特性：\r\n</h2>\r\n<p>\r\n	1. 基于ThinkPHP最新3.2版本。\r\n</p>\r\n<p>\r\n	2. 模块化：全新的架构和模块化的开发机制，便于灵活扩展和二次开发。&nbsp;\r\n</p>\r\n<p>\r\n	3. 文档模型/分类体系：通过和文档模型绑定，以及不同的文档类型，不同分类可以实现差异化的功能，轻松实现诸如资讯、下载、讨论和图片等功能。\r\n</p>\r\n<p>\r\n	4. 开源免费：OneThink遵循Apache2开源协议,免费提供使用。&nbsp;\r\n</p>\r\n<p>\r\n	5. 用户行为：支持自定义用户行为，可以对单个用户或者群体用户的行为进行记录及分享，为您的运营决策提供有效参考数据。\r\n</p>\r\n<p>\r\n	6. 云端部署：通过驱动的方式可以轻松支持平台的部署，让您的网站无缝迁移，内置已经支持SAE和BAE3.0。\r\n</p>\r\n<p>\r\n	7. 云服务支持：即将启动支持云存储、云安全、云过滤和云统计等服务，更多贴心的服务让您的网站更安心。\r\n</p>\r\n<p>\r\n	8. 安全稳健：提供稳健的安全策略，包括备份恢复、容错、防止恶意攻击登录，网页防篡改等多项安全管理功能，保证系统安全，可靠、稳定的运行。&nbsp;\r\n</p>\r\n<p>\r\n	9. 应用仓库：官方应用仓库拥有大量来自第三方插件和应用模块、模板主题，有众多来自开源社区的贡献，让您的网站“One”美无缺。&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>&nbsp;OneThink集成了一个完善的后台管理体系和前台模板标签系统，让你轻松管理数据和进行前台网站的标签式开发。&nbsp;</strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h2>\r\n	后台主要功能：\r\n</h2>\r\n<p>\r\n	1. 用户Passport系统\r\n</p>\r\n<p>\r\n	2. 配置管理系统&nbsp;\r\n</p>\r\n<p>\r\n	3. 权限控制系统\r\n</p>\r\n<p>\r\n	4. 后台建模系统&nbsp;\r\n</p>\r\n<p>\r\n	5. 多级分类系统&nbsp;\r\n</p>\r\n<p>\r\n	6. 用户行为系统&nbsp;\r\n</p>\r\n<p>\r\n	7. 钩子和插件系统\r\n</p>\r\n<p>\r\n	8. 系统日志系统&nbsp;\r\n</p>\r\n<p>\r\n	9. 数据备份和还原\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;[ 官方下载：&nbsp;<a href=\"http://www.onethink.cn/download.html\" target=\"_blank\">http://www.onethink.cn/download.html</a>&nbsp;&nbsp;开发手册：<a href=\"http://document.onethink.cn/\" target=\"_blank\">http://document.onethink.cn/</a>&nbsp;]&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>OneThink开发团队 2013~2014</strong> \r\n</p>','',0);

UNLOCK TABLES;

/*Table structure for table `qy_document_download` */

DROP TABLE IF EXISTS `qy_document_download`;

CREATE TABLE `qy_document_download` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '下载详细描述',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型下载表';

/*Data for the table `qy_document_download` */

LOCK TABLES `qy_document_download` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_file` */

DROP TABLE IF EXISTS `qy_file`;

CREATE TABLE `qy_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `location` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '远程地址',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_md5` (`md5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件表';

/*Data for the table `qy_file` */

LOCK TABLES `qy_file` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_hooks` */

DROP TABLE IF EXISTS `qy_hooks`;

CREATE TABLE `qy_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `qy_hooks` */

LOCK TABLES `qy_hooks` WRITE;

insert  into `qy_hooks`(`id`,`name`,`description`,`type`,`update_time`,`addons`,`status`) values (1,'pageHeader','页面header钩子，一般用于加载插件CSS文件和代码',1,0,'',1),(2,'pageFooter','页面footer钩子，一般用于加载插件JS文件和JS代码',1,0,'ReturnTop',1),(3,'documentEditForm','添加编辑表单的 扩展内容钩子',1,0,'Attachment',1),(4,'documentDetailAfter','文档末尾显示',1,0,'Attachment,SocialComment',1),(5,'documentDetailBefore','页面内容前显示用钩子',1,0,'',1),(6,'documentSaveComplete','保存文档数据后的扩展钩子',2,0,'Attachment',1),(7,'documentEditFormContent','添加编辑表单的内容显示钩子',1,0,'Editor',1),(8,'adminArticleEdit','后台内容编辑页编辑器',1,1378982734,'EditorForAdmin',1),(13,'AdminIndex','首页小格子个性化显示',1,1382596073,'SiteStat,SystemInfo,DevTeam',1),(14,'topicComment','评论提交方式扩展钩子。',1,1380163518,'Editor',1),(16,'app_begin','应用开始',2,1384481614,'',1);

UNLOCK TABLES;

/*Table structure for table `qy_lecture` */

DROP TABLE IF EXISTS `qy_lecture`;

CREATE TABLE `qy_lecture` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '发布人',
  `username` char(50) DEFAULT NULL COMMENT '发布人真实姓名',
  `type` char(10) NOT NULL COMMENT '讲座类型',
  `title` char(50) NOT NULL COMMENT '讲座标题',
  `content` char(200) DEFAULT NULL COMMENT '讲座介绍',
  `money` decimal(10,0) DEFAULT '0' COMMENT '金额',
  `icon` varchar(150) DEFAULT NULL COMMENT '封面图片',
  `content_icon` varchar(150) DEFAULT NULL COMMENT '试听源文件路径',
  `is_tj` tinyint(1) DEFAULT '0' COMMENT '是否推荐',
  `number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '试听次数',
  `addtime` int(10) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `qy_lecture` */

LOCK TABLES `qy_lecture` WRITE;

insert  into `qy_lecture`(`id`,`uid`,`username`,`type`,`title`,`content`,`money`,`icon`,`content_icon`,`is_tj`,`number`,`addtime`) values (1,10,NULL,'0002,0039','测试讲座','讲座介绍','10','/Uploads/Jiangzuo/58e605a72adba.jpg',NULL,0,0,NULL),(2,0,NULL,'0002,0041','测试讲座222','讲座介绍2222','0','/Uploads/Jiangzuo/58e605a72adba.jpg',NULL,1,0,NULL),(3,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(4,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(5,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(6,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(7,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(8,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(9,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(10,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(11,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(12,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(13,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(14,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(15,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(16,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(17,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(18,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(19,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(20,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(21,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(22,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(23,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(24,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(25,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(26,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(27,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(28,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(29,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(30,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(31,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(32,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(33,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(34,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(35,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(36,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(37,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(38,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(39,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(40,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(41,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(42,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(43,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(44,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(45,0,NULL,'','','','0',NULL,NULL,0,0,NULL),(46,0,NULL,'','','','0',NULL,NULL,0,0,NULL);

UNLOCK TABLES;

/*Table structure for table `qy_lecture_partake` */

DROP TABLE IF EXISTS `qy_lecture_partake`;

CREATE TABLE `qy_lecture_partake` (
  `pid` int(10) unsigned NOT NULL COMMENT '对应的讲座ID',
  `puid` int(10) NOT NULL COMMENT '发起讲座人uid',
  `uid` int(10) unsigned NOT NULL COMMENT '参与人uid',
  `order_num` char(32) NOT NULL COMMENT '订单号',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `addtime` int(10) NOT NULL COMMENT '参与时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `qy_lecture_partake` */

LOCK TABLES `qy_lecture_partake` WRITE;

insert  into `qy_lecture_partake`(`pid`,`puid`,`uid`,`order_num`,`money`,`addtime`) values (2,0,10,'20170411123456','10.00',0);

UNLOCK TABLES;

/*Table structure for table `qy_member` */

DROP TABLE IF EXISTS `qy_member`;

CREATE TABLE `qy_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  PRIMARY KEY (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `qy_member` */

LOCK TABLES `qy_member` WRITE;

insert  into `qy_member`(`uid`,`nickname`,`sex`,`birthday`,`qq`,`score`,`login`,`reg_ip`,`reg_time`,`last_login_ip`,`last_login_time`,`status`) values (1,'admin',0,'0000-00-00','',40,9,0,1491384453,2130706433,1492075215,1);

UNLOCK TABLES;

/*Table structure for table `qy_menu` */

DROP TABLE IF EXISTS `qy_menu`;

CREATE TABLE `qy_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否仅开发者模式可见',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

/*Data for the table `qy_menu` */

LOCK TABLES `qy_menu` WRITE;

insert  into `qy_menu`(`id`,`title`,`pid`,`sort`,`url`,`hide`,`tip`,`group`,`is_dev`,`status`) values (1,'首页',0,1,'Index/index',0,'','',0,1),(2,'内容',0,2,'Article/index',1,'','',0,1),(3,'文档列表',2,0,'article/index',1,'','内容',0,1),(4,'新增',3,0,'article/add',0,'','',0,1),(5,'编辑',3,0,'article/edit',0,'','',0,1),(6,'改变状态',3,0,'article/setStatus',0,'','',0,1),(7,'保存',3,0,'article/update',0,'','',0,1),(8,'保存草稿',3,0,'article/autoSave',0,'','',0,1),(9,'移动',3,0,'article/move',0,'','',0,1),(10,'复制',3,0,'article/copy',0,'','',0,1),(11,'粘贴',3,0,'article/paste',0,'','',0,1),(12,'导入',3,0,'article/batchOperate',0,'','',0,1),(13,'回收站',2,0,'article/recycle',1,'','内容',0,1),(14,'还原',13,0,'article/permit',0,'','',0,1),(15,'清空',13,0,'article/clear',0,'','',0,1),(16,'用户',0,3,'User/index',0,'','',0,1),(17,'管理员信息',16,0,'User/index',0,'','用户管理',0,1),(18,'新增用户',17,0,'User/add',0,'添加新用户','',0,1),(19,'用户行为',16,0,'User/action',0,'','行为管理',0,1),(20,'新增用户行为',19,0,'User/addaction',0,'','',0,1),(21,'编辑用户行为',19,0,'User/editaction',0,'','',0,1),(22,'保存用户行为',19,0,'User/saveAction',0,'\"用户->用户行为\"保存编辑和新增的用户行为','',0,1),(23,'变更行为状态',19,0,'User/setStatus',0,'\"用户->用户行为\"中的启用,禁用和删除权限','',0,1),(24,'禁用会员',19,0,'User/changeStatus?method=forbidUser',0,'\"用户->用户信息\"中的禁用','',0,1),(25,'启用会员',19,0,'User/changeStatus?method=resumeUser',0,'\"用户->用户信息\"中的启用','',0,1),(26,'删除会员',19,0,'User/changeStatus?method=deleteUser',0,'\"用户->用户信息\"中的删除','',0,1),(27,'权限管理',16,0,'AuthManager/index',0,'','用户管理',0,1),(28,'删除',27,0,'AuthManager/changeStatus?method=deleteGroup',0,'删除用户组','',0,1),(29,'禁用',27,0,'AuthManager/changeStatus?method=forbidGroup',0,'禁用用户组','',0,1),(30,'恢复',27,0,'AuthManager/changeStatus?method=resumeGroup',0,'恢复已禁用的用户组','',0,1),(31,'新增',27,0,'AuthManager/createGroup',0,'创建新的用户组','',0,1),(32,'编辑',27,0,'AuthManager/editGroup',0,'编辑用户组名称和描述','',0,1),(33,'保存用户组',27,0,'AuthManager/writeGroup',0,'新增和编辑用户组的\"保存\"按钮','',0,1),(34,'授权',27,0,'AuthManager/group',0,'\"后台 \\ 用户 \\ 用户信息\"列表页的\"授权\"操作按钮,用于设置用户所属用户组','',0,1),(35,'访问授权',27,0,'AuthManager/access',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"访问授权\"操作按钮','',0,1),(36,'成员授权',27,0,'AuthManager/user',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"成员授权\"操作按钮','',0,1),(37,'解除授权',27,0,'AuthManager/removeFromGroup',0,'\"成员授权\"列表页内的解除授权操作按钮','',0,1),(38,'保存成员授权',27,0,'AuthManager/addToGroup',0,'\"用户信息\"列表页\"授权\"时的\"保存\"按钮和\"成员授权\"里右上角的\"添加\"按钮)','',0,1),(39,'分类授权',27,0,'AuthManager/category',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"分类授权\"操作按钮','',0,1),(40,'保存分类授权',27,0,'AuthManager/addToCategory',0,'\"分类授权\"页面的\"保存\"按钮','',0,1),(41,'模型授权',27,0,'AuthManager/modelauth',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"模型授权\"操作按钮','',0,1),(42,'保存模型授权',27,0,'AuthManager/addToModel',0,'\"分类授权\"页面的\"保存\"按钮','',0,1),(43,'扩展',0,7,'Addons/index',1,'','',0,1),(44,'插件管理',43,1,'Addons/index',0,'','扩展',0,1),(45,'创建',44,0,'Addons/create',0,'服务器上创建插件结构向导','',0,1),(46,'检测创建',44,0,'Addons/checkForm',0,'检测插件是否可以创建','',0,1),(47,'预览',44,0,'Addons/preview',0,'预览插件定义类文件','',0,1),(48,'快速生成插件',44,0,'Addons/build',0,'开始生成插件结构','',0,1),(49,'设置',44,0,'Addons/config',0,'设置插件配置','',0,1),(50,'禁用',44,0,'Addons/disable',0,'禁用插件','',0,1),(51,'启用',44,0,'Addons/enable',0,'启用插件','',0,1),(52,'安装',44,0,'Addons/install',0,'安装插件','',0,1),(53,'卸载',44,0,'Addons/uninstall',0,'卸载插件','',0,1),(54,'更新配置',44,0,'Addons/saveconfig',0,'更新插件配置处理','',0,1),(55,'插件后台列表',44,0,'Addons/adminList',0,'','',0,1),(56,'URL方式访问插件',44,0,'Addons/execute',0,'控制是否有权限通过url访问插件控制器方法','',0,1),(57,'钩子管理',43,2,'Addons/hooks',0,'','扩展',0,1),(58,'模型管理',68,3,'Model/index',1,'','系统设置',0,1),(59,'新增',58,0,'model/add',0,'','',0,1),(60,'编辑',58,0,'model/edit',0,'','',0,1),(61,'改变状态',58,0,'model/setStatus',0,'','',0,1),(62,'保存数据',58,0,'model/update',0,'','',0,1),(63,'属性管理',68,0,'Attribute/index',1,'网站属性配置。','',0,1),(64,'新增',63,0,'Attribute/add',0,'','',0,1),(65,'编辑',63,0,'Attribute/edit',0,'','',0,1),(66,'改变状态',63,0,'Attribute/setStatus',0,'','',0,1),(67,'保存数据',63,0,'Attribute/update',0,'','',0,1),(68,'系统',0,40,'Config/group',0,'','',0,1),(69,'网站设置',68,1,'Config/group',0,'','系统设置',0,1),(70,'配置管理',68,4,'Config/index',1,'','系统设置',0,1),(71,'编辑',70,0,'Config/edit',0,'新增编辑和保存配置','',0,1),(72,'删除',70,0,'Config/del',0,'删除配置','',0,1),(73,'新增',70,0,'Config/add',0,'新增配置','',0,1),(74,'保存',70,0,'Config/save',0,'保存配置','',0,1),(75,'菜单管理',68,5,'Menu/index',0,'','系统设置',0,1),(76,'导航管理',68,6,'Channel/index',1,'','系统设置',0,1),(77,'新增',76,0,'Channel/add',0,'','',0,1),(78,'编辑',76,0,'Channel/edit',0,'','',0,1),(79,'删除',76,0,'Channel/del',0,'','',0,1),(80,'分类管理',68,2,'Category/index',0,'','系统设置',0,1),(81,'编辑',80,0,'Category/edit',0,'编辑和保存栏目分类','',0,1),(82,'新增',80,0,'Category/add',0,'新增栏目分类','',0,1),(83,'删除',80,0,'Category/remove',0,'删除栏目分类','',0,1),(84,'移动',80,0,'Category/operate/type/move',0,'移动栏目分类','',0,1),(85,'合并',80,0,'Category/operate/type/merge',0,'合并栏目分类','',0,1),(86,'备份数据库',68,0,'Database/index?type=export',0,'','数据备份',0,1),(87,'备份',86,0,'Database/export',0,'备份数据库','',0,1),(88,'优化表',86,0,'Database/optimize',0,'优化数据表','',0,1),(89,'修复表',86,0,'Database/repair',0,'修复数据表','',0,1),(90,'还原数据库',68,0,'Database/index?type=import',0,'','数据备份',0,1),(91,'恢复',90,0,'Database/import',0,'数据库恢复','',0,1),(92,'删除',90,0,'Database/del',0,'删除备份文件','',0,1),(93,'其他',0,5,'other',1,'','',0,1),(96,'新增',75,0,'Menu/add',0,'','系统设置',0,1),(98,'编辑',75,0,'Menu/edit',0,'','',0,1),(106,'行为日志',16,0,'Action/actionlog',0,'','行为管理',0,1),(108,'修改密码',16,0,'User/updatePassword',1,'','',0,1),(109,'修改昵称',16,0,'User/updateNickname',1,'','',0,1),(110,'查看行为日志',106,0,'action/edit',1,'','',0,1),(112,'新增数据',58,0,'think/add',1,'','',0,1),(113,'编辑数据',58,0,'think/edit',1,'','',0,1),(114,'导入',75,0,'Menu/import',0,'','',0,1),(115,'生成',58,0,'Model/generate',0,'','',0,1),(116,'新增钩子',57,0,'Addons/addHook',0,'','',0,1),(117,'编辑钩子',57,0,'Addons/edithook',0,'','',0,1),(118,'文档排序',3,0,'Article/sort',1,'','',0,1),(119,'排序',70,0,'Config/sort',1,'','',0,1),(120,'排序',75,0,'Menu/sort',1,'','',0,1),(121,'排序',76,0,'Channel/sort',1,'','',0,1),(122,'数据列表',58,0,'think/lists',1,'','',0,1),(123,'审核列表',3,0,'Article/examine',1,'','',0,1),(124,'用户信息',16,0,'User/user',0,'','用户管理',0,1),(125,'微讲座',0,3,'Lecture/index',0,'','微讲座',0,1),(126,'问答',0,4,'Question/index',0,'','',0,1),(127,'问答列表',126,0,'Question/index',0,'','问答管理',0,1),(128,'问题详情',127,0,'Question/info',1,'','问答管理',0,1),(129,'商城',0,5,'Shop/index',0,'','',0,1),(130,'商品列表',129,0,'Shop/index',0,'','商品管理',0,1),(131,'新增',130,0,'Shop/add',1,'','商品管理',0,1),(132,'信息',0,6,'Contact/index',0,'','',0,1),(133,'信息列表',132,0,'Contact/index',0,'','信息交流',0,1),(134,'新增',133,0,'Contact/add',1,'','信息交流',0,1),(135,'详情',133,0,'Contact/info',1,'','信息交流',0,1);

UNLOCK TABLES;

/*Table structure for table `qy_model` */

DROP TABLE IF EXISTS `qy_model`;

CREATE TABLE `qy_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型标识',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '继承的模型',
  `relation` varchar(30) NOT NULL DEFAULT '' COMMENT '继承与被继承模型的关联字段',
  `need_pk` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '新建表时是否需要主键字段',
  `field_sort` text COMMENT '表单字段排序',
  `field_group` varchar(255) NOT NULL DEFAULT '1:基础' COMMENT '字段分组',
  `attribute_list` text COMMENT '属性列表（表的字段）',
  `attribute_alias` varchar(255) NOT NULL DEFAULT '' COMMENT '属性别名定义',
  `template_list` varchar(100) NOT NULL DEFAULT '' COMMENT '列表模板',
  `template_add` varchar(100) NOT NULL DEFAULT '' COMMENT '新增模板',
  `template_edit` varchar(100) NOT NULL DEFAULT '' COMMENT '编辑模板',
  `list_grid` text COMMENT '列表定义',
  `list_row` smallint(2) unsigned NOT NULL DEFAULT '10' COMMENT '列表数据长度',
  `search_key` varchar(50) NOT NULL DEFAULT '' COMMENT '默认搜索字段',
  `search_list` varchar(255) NOT NULL DEFAULT '' COMMENT '高级搜索的字段',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `engine_type` varchar(25) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文档模型表';

/*Data for the table `qy_model` */

LOCK TABLES `qy_model` WRITE;

insert  into `qy_model`(`id`,`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`attribute_alias`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) values (1,'document','基础文档',0,'',1,'{\"1\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]}','1:基础','','','','','','id:编号\r\ntitle:标题:[EDIT]\r\ntype:类型\r\nupdate_time:最后更新\r\nstatus:状态\r\nview:浏览\r\nid:操作:[EDIT]|编辑,[DELETE]|删除',0,'','',1383891233,1384507827,1,'MyISAM'),(2,'article','文章',1,'',1,'{\"1\":[\"3\",\"24\",\"2\",\"5\"],\"2\":[\"9\",\"13\",\"19\",\"10\",\"12\",\"16\",\"17\",\"26\",\"20\",\"14\",\"11\",\"25\"]}','1:基础,2:扩展','','','','','','',0,'','',1383891243,1387260622,1,'MyISAM'),(3,'download','下载',1,'',1,'{\"1\":[\"3\",\"28\",\"30\",\"32\",\"2\",\"5\",\"31\"],\"2\":[\"13\",\"10\",\"27\",\"9\",\"12\",\"16\",\"17\",\"19\",\"11\",\"20\",\"14\",\"29\"]}','1:基础,2:扩展','','','','','','',0,'','',1383891252,1387260449,1,'MyISAM');

UNLOCK TABLES;

/*Table structure for table `qy_news` */

DROP TABLE IF EXISTS `qy_news`;

CREATE TABLE `qy_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '发布人',
  `title` char(100) NOT NULL COMMENT '标题',
  `cid` int(10) NOT NULL COMMENT '咨询分类',
  `icon` char(150) NOT NULL COMMENT '封面',
  `content` text NOT NULL COMMENT '内容',
  `addtime` int(10) NOT NULL COMMENT '发布时间',
  `is_tj` tinyint(1) DEFAULT '0' COMMENT '是否推荐',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `qy_news` */

LOCK TABLES `qy_news` WRITE;

insert  into `qy_news`(`id`,`uid`,`title`,`cid`,`icon`,`content`,`addtime`,`is_tj`) values (1,1,'朝鲜或在15日进行核试验？半岛局势迎来关键一周',2,'/Uploads/Picture/2017-04-13/58ef24f6c4785.png','11日，朝鲜第13届最高人民会议第五次会议将在平壤召开，这天也是金正恩被推举为朝鲜最高领导人5周年的日子，外界很关注会上将如何推进“核与经济并进的路线”。15日是纪念金日成诞辰的“太阳节”，西方媒体盛传朝鲜有可能“借机进行第六次核试验”。 除15日的金日成诞辰“太阳节”之外，4月25日是朝鲜建军节。有专家分析称，朝鲜可能借此进行战略挑衅。美国继派出航母“卡尔·文森”号之后，又派出了“里根”号航母前往朝鲜半岛，预计将于四月底抵达韩国海域，半岛局势紧张在所难免。',1492067774,1),(2,NULL,'李克强部署推进医疗联合体建设',2,'/Uploads/Picture/2017-04-13/58ef2ce350826.png','李克强主持召开国务院常务会议\r\n\r\n　　部署推进医疗联合体建设　以深化体制机制改革为群众提供优质便利医疗服务\r\n\r\n　　部署加强中小学幼儿园安全风险防控体系建设　打造平安校园\r\n\r\n　　通过《中华人民共和国统计法实施条例（草案）》\r\n\r\n　　新华社北京4月12日电 国务院总理李克强4月12日主持召开国务院常务会议，部署推进医疗联合体建设，以深化体制机制改革为群众提供优质便利医疗服务；部署加强中小学幼儿园安全风险防控体系建设，打造平安校园；通过《中华人民共和国统计法实施条例（草案）》。\r\n\r\n　　会议指出，建设和发展医联体，是贯彻以人民为中心的发展思想、落实《政府工作报告》部署的重点任务，是深化医疗医保医药联动改革、合理配置资源、使基层群众享受优质便利医疗服务的重要举措。一要破除行政区划、财政投入、医保支付、人事管理等方面存在的壁垒，全面启动多种形式的医联体建设试点，因地制宜探索由三级公立医院或业务能力较强的医院、县级医院牵头，组建不同级别、不同类别城乡医疗机构或专科之间优势互补、分工协作的医联体，大力发展面向基层和边远贫困地区的远程医疗协作网。二要推动优质医疗资源共享和下沉基层，通过派遣专家、专科共建、业务指导等提升基层医疗水平。在医联体内实现健康档案、病历等互联互通，实行检查结果互认、处方流动、药品共享。建立医学影像、检查检验等中心，在医联体内提供一体化服务。不同医联体之间也要加强合作。三要加快落实分级诊疗机制。以需求为导向做实家庭医生签约服务，年内把所有贫困人口纳入服务范围。鼓励和引导居民到基层首诊，上级医院对签约患者提供优先接诊、检查、住院等服务，畅通术后恢复期、重症稳定期等患者向下转诊通道。鼓励护理院、专业康复机构等加入医联体。四要加大政策支持。探索有利于医疗资源上下贯通的分配激励机制。对纵向合作的医联体实行医保总额付费等多种付费方式。将基层诊疗量占比、双向转诊比例、居民健康改善等指标纳入绩效考核。医务人员在医联体内流动执业一般不需办理相关手续。以改革创新更好满足群众疾病预防、方便就医和护理康复等需求。',1492069777,0),(3,NULL,'俄媒：若朝鲜半岛开战 中俄极有可能第二次抗美援朝',2,'/Uploads/New/58ef33eadba70.png','[环球时报综合报道]北京时间12日，日本消息人士透露，海上自卫队计划派出数艘驱逐舰，与“卡尔·文森”号在东海进行联合演习，以显示力量。一名日本高官称，美国打算施加最大压力，迫使朝鲜通过和平和外交手段解决危机。《今日美国报》12日称，目前的局势非常具有戏剧性：美国航母正开赴朝鲜半岛，而朝鲜威胁一旦遭到攻击将核打击美国本土。不过，美国朝鲜问题专家洛佩兹认为，对朝全面制裁的目标是让平壤回到谈判桌。而美国外交关系协会高级研究员施耐德担心，是否有足够的时间制定全面制裁措施，阻止朝鲜导弹到达美国本土，“时间并非在美国这一边。这样，美国的选择往往是极端的，除了谈判，就是斩首或者动武”。',1492071519,0),(4,NULL,'中国弃权俄罗斯反对 安理会未通过叙化武问题决议',2,'/Uploads/New/58ef3667bd3d3.jpg','新华社联合国4月12日电（记者倪红梅　史霄萌）联合国安理会12日就英美法三国起草的叙利亚化学武器问题决议草案进行表决，草案未获通过。\r\n\r\n　　表决结果为10票赞成、2票反对、3票弃权，俄罗斯和玻利维亚投了反对票，中国、哈萨克斯坦、埃塞俄比亚投了弃权票。因有安理会常任理事国投票反对，草案未获通过。据悉，该草案谴责4月4日叙利亚伊德利卜省发生的化武袭击事件，要求对此进行调查，并要求叙政府公布与空袭有关的各种细节信息。',1492072039,0);

UNLOCK TABLES;

/*Table structure for table `qy_picture` */

DROP TABLE IF EXISTS `qy_picture`;

CREATE TABLE `qy_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `qy_picture` */

LOCK TABLES `qy_picture` WRITE;

insert  into `qy_picture`(`id`,`path`,`url`,`md5`,`sha1`,`status`,`create_time`) values (1,'/Uploads/Picture/2017-04-10/58eb3daf4f6ba.png','','941c8dbc4ef0ade9c79e0e594bfc7393','57c663c8f10ce34dc6601a2e1a40c67019b5e5d2',1,1491811759),(2,'/Uploads/Picture/2017-04-13/58ef24f6c4785.png','','0e6997d138caaf258409e24eb09e7251','58ecf8381d0c5dd1b8002a70c1a46d120b8a1fe1',1,1492067574),(3,'/Uploads/Picture/2017-04-13/58ef2c666827e.png','','f314f872b5b22e09b61171bae0bc3f1f','ed9204ddec50f91e6d46453bc05f43e2f211df5e',1,1492069478),(4,'/Uploads/Picture/2017-04-13/58ef2ce350826.png','','5e344fefa607bdc204d57d0e46e31d8f','95bfe29a70cb87b644cbbedc44ca2779c76bf409',1,1492069603);

UNLOCK TABLES;

/*Table structure for table `qy_question` */

DROP TABLE IF EXISTS `qy_question`;

CREATE TABLE `qy_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '提问人',
  `username` char(50) DEFAULT NULL COMMENT '提问人昵称',
  `type` char(10) NOT NULL COMMENT '问题类型',
  `title` char(50) NOT NULL COMMENT '提问标题',
  `content` char(200) NOT NULL COMMENT '提问介绍',
  `is_tj` tinyint(1) DEFAULT '0',
  `addtime` int(10) DEFAULT NULL COMMENT '提问时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `qy_question` */

LOCK TABLES `qy_question` WRITE;

insert  into `qy_question`(`id`,`uid`,`username`,`type`,`title`,`content`,`is_tj`,`addtime`) values (1,0,NULL,'0002,0041','1111111111','自家花园种了洋水仙，邻居老太太为是韭菜，怎么办？看来就是独立开发尽.是利空打击翻领宽,松的肌肤是考虑到经费，立刻接受对方。',0,NULL),(7,0,NULL,'0002,0039','这个游戏咋个玩？？','这个游戏咋玩，剑网三，怎么老是打不死人',0,NULL);

UNLOCK TABLES;

/*Table structure for table `qy_question_answer` */

DROP TABLE IF EXISTS `qy_question_answer`;

CREATE TABLE `qy_question_answer` (
  `pid` int(10) unsigned NOT NULL COMMENT '用户提问id',
  `uid` int(10) unsigned NOT NULL COMMENT '回答者uid',
  `content` varchar(150) NOT NULL COMMENT '回答内容',
  `addtime` int(10) DEFAULT NULL COMMENT '回答时间',
  `num` int(10) DEFAULT NULL COMMENT '试听人数',
  KEY `pid` (`pid`),
  CONSTRAINT `qy_question_answer_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `qy_question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `qy_question_answer` */

LOCK TABLES `qy_question_answer` WRITE;

insert  into `qy_question_answer`(`pid`,`uid`,`content`,`addtime`,`num`) values (1,10,'测试',1491794077,NULL),(1,0,'测试1',1491794077,NULL);

UNLOCK TABLES;

/*Table structure for table `qy_question_heard` */

DROP TABLE IF EXISTS `qy_question_heard`;

CREATE TABLE `qy_question_heard` (
  `pid` int(10) unsigned NOT NULL COMMENT '问答内容ID',
  `puid` int(10) NOT NULL COMMENT '回答者uid',
  `uid` int(10) DEFAULT NULL COMMENT '试听人uid',
  `order_num` char(32) DEFAULT NULL COMMENT '订单号',
  `money` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `addtime` int(10) NOT NULL COMMENT '试听时间',
  `is_pay` tinyint(1) DEFAULT '0' COMMENT '是否支付',
  `transaction_id` char(32) DEFAULT NULL COMMENT '微信支付订单号',
  `paytime` int(10) DEFAULT NULL COMMENT '支付时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `qy_question_heard` */

LOCK TABLES `qy_question_heard` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_shop` */

DROP TABLE IF EXISTS `qy_shop`;

CREATE TABLE `qy_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) DEFAULT NULL COMMENT '名称',
  `cover_id` int(10) unsigned NOT NULL COMMENT '封面',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `number` int(10) NOT NULL COMMENT '使用人数',
  `content` text COMMENT '内容',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `paynum` int(10) DEFAULT '0' COMMENT '累计购买次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `qy_shop` */

LOCK TABLES `qy_shop` WRITE;

insert  into `qy_shop`(`id`,`title`,`cover_id`,`money`,`number`,`content`,`addtime`,`status`,`paynum`) values (1,'213213213',1,'100.00',10,'213123123',1491811970,1,0);

UNLOCK TABLES;

/*Table structure for table `qy_sms_log` */

DROP TABLE IF EXISTS `qy_sms_log`;

CREATE TABLE `qy_sms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `content` char(100) NOT NULL COMMENT '记录内容',
  `addtime` int(10) DEFAULT NULL COMMENT '发送日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `qy_sms_log` */

LOCK TABLES `qy_sms_log` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_ucenter_admin` */

DROP TABLE IF EXISTS `qy_ucenter_admin`;

CREATE TABLE `qy_ucenter_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `member_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员用户ID',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '管理员状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*Data for the table `qy_ucenter_admin` */

LOCK TABLES `qy_ucenter_admin` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_ucenter_app` */

DROP TABLE IF EXISTS `qy_ucenter_app`;

CREATE TABLE `qy_ucenter_app` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '应用ID',
  `title` varchar(30) NOT NULL COMMENT '应用名称',
  `url` varchar(100) NOT NULL COMMENT '应用URL',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT '应用IP',
  `auth_key` varchar(100) NOT NULL DEFAULT '' COMMENT '加密KEY',
  `sys_login` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '同步登陆',
  `allow_ip` varchar(255) NOT NULL DEFAULT '' COMMENT '允许访问的IP',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '应用状态',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='应用表';

/*Data for the table `qy_ucenter_app` */

LOCK TABLES `qy_ucenter_app` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_ucenter_member` */

DROP TABLE IF EXISTS `qy_ucenter_member`;

CREATE TABLE `qy_ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '用户手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `qy_ucenter_member` */

LOCK TABLES `qy_ucenter_member` WRITE;

insert  into `qy_ucenter_member`(`id`,`username`,`password`,`email`,`mobile`,`reg_time`,`reg_ip`,`last_login_time`,`last_login_ip`,`update_time`,`status`) values (1,'admin','67230852fa51ad88ea4fee1a5ec5b0fb','admin@163.com','',1491384453,2130706433,1492075215,2130706433,1491384453,1);

UNLOCK TABLES;

/*Table structure for table `qy_ucenter_setting` */

DROP TABLE IF EXISTS `qy_ucenter_setting`;

CREATE TABLE `qy_ucenter_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '设置ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型（1-用户配置）',
  `value` text NOT NULL COMMENT '配置数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='设置表';

/*Data for the table `qy_ucenter_setting` */

LOCK TABLES `qy_ucenter_setting` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_url` */

DROP TABLE IF EXISTS `qy_url`;

CREATE TABLE `qy_url` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '链接唯一标识',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `short` char(100) NOT NULL DEFAULT '' COMMENT '短网址',
  `status` tinyint(2) NOT NULL DEFAULT '2' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接表';

/*Data for the table `qy_url` */

LOCK TABLES `qy_url` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_user` */

DROP TABLE IF EXISTS `qy_user`;

CREATE TABLE `qy_user` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(10) NOT NULL,
  `OpenID` char(30) NOT NULL COMMENT '微信openID',
  `nickname` char(20) NOT NULL COMMENT '微信昵称',
  `face` char(150) DEFAULT NULL COMMENT '微信头像',
  `username` char(20) DEFAULT NULL COMMENT '真实姓名',
  `company` char(50) DEFAULT NULL COMMENT '公司名称',
  `position` int(10) DEFAULT NULL COMMENT '职位',
  `phone` char(13) DEFAULT NULL COMMENT '联系电话',
  `area` char(20) DEFAULT NULL COMMENT '所在地区',
  `excelled` char(10) DEFAULT NULL COMMENT '擅长类型',
  `content` char(150) DEFAULT NULL COMMENT '个人简介',
  `level` tinyint(1) DEFAULT '0' COMMENT '会员级别 0普通 1 99 2 299 3 专业',
  `addtime` int(10) DEFAULT NULL COMMENT '注册日期',
  `is_apply` tinyint(1) DEFAULT '0' COMMENT '1 待审核 2 通过 3 驳回',
  `is_zs` tinyint(1) DEFAULT '0' COMMENT '1 展示 0 不展示',
  `status` tinyint(1) DEFAULT '1' COMMENT '1 正常 0 禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `qy_user` */

LOCK TABLES `qy_user` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_user_follow` */

DROP TABLE IF EXISTS `qy_user_follow`;

CREATE TABLE `qy_user_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户id',
  `fuid` int(10) NOT NULL COMMENT '被关注的用户id',
  `status` tinyint(1) DEFAULT '0' COMMENT '0 取消 1 关注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `qy_user_follow` */

LOCK TABLES `qy_user_follow` WRITE;

UNLOCK TABLES;

/*Table structure for table `qy_userdata` */

DROP TABLE IF EXISTS `qy_userdata`;

CREATE TABLE `qy_userdata` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(3) unsigned NOT NULL COMMENT '类型标识',
  `target_id` int(10) unsigned NOT NULL COMMENT '目标id',
  UNIQUE KEY `uid` (`uid`,`type`,`target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `qy_userdata` */

LOCK TABLES `qy_userdata` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
