# Host: localhost  (Version: 5.5.53)
# Date: 2019-01-02 20:27:04
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

DROP DATABASE IF EXISTS `eat`;
CREATE DATABASE `eat`;
USE `eat`;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'root','root');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "comments"
#

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "comments"
#

/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'12345678','2018-11-04 16:50:50',1),(3,'gfhfh','2018-11-04 16:56:17',1),(6,'真香','2018-12-26 21:48:05',5);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

#
# Structure for table "posts"
#

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `body` longtext NOT NULL,
  `time` datetime NOT NULL,
  `catalog` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "posts"
#

/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'西湖醋鱼','草鱼 900克，醋50克，黄酒 25克，酱油 75克，白糖 60克，姜1块，葱适量，水淀粉 50克。\r\n\r\n1.把姜去皮切成碎末，去掉的姜片不要丢掉，准备好醋、酱油、黄酒、水淀粉和白糖；\r\n\r\n2.草鱼去鳞去膛洗净，把鱼的一面划上5刀，翻面从尾部入刀，沿脊骨向头部劈开，对切分为2半，斩去鱼牙不用，去掉鱼头的淤血，在没有脊骨的身上长划一刀；\r\n\r\n3.锅中放入葱姜片和清水，烧开后，捞出葱姜，用筷子把鱼鳍支起来，让鱼成型，煮上3分钟，撇去血末，打入凉水2次；\r\n\r\n4.倒出汤汁，锅内加入少许的原汤和适量的酱油、绍酒和姜末。捞出鱼，码放在盘中；\r\n\r\n5.锅中的原汁加入白糖、米醋和剩下的酱油。烧开后加入水淀粉烧至汤汁浓缩；\r\n\r\n6.把制作好的汤汁均匀的撒在鱼的身上，再撒上剩余的姜末即可 。','1970-01-01 08:00:00','杭帮菜'),(3,'花岗岩','真香','2018-12-16 14:24:00','石头'),(5,'阿一鲍鱼','1) 撕开「鲍鱼料包」与「顶汤包」，放入锅（砂锅）中，无须加盖，以中火加热。\r\n\r\n2) 待顶汤加热至微微沸腾并升起缕缕白烟，将鲍鱼夹出并盛入盘中。\r\n\r\n3) 锅中顶汤继续加热至完全沸腾后，即可熄火。\r\n\r\n4) 将顶汤均匀浇淋至鲍鱼上，销魂纯味立即上桌，即食。\r\n\r\n','2018-12-26 21:45:00','粤菜'),(6,'麻辣香锅','1.鱼豆腐、豆干、火腿分别切片，藕去皮洗净切片，芹菜洗净切段，洋葱洗净切条，虾仁解冻备用。锅中放油，烧热后放麻辣火锅底料小火炒香.2.放蒜片大火爆香，再放藕片炒3 分钟左右，然后放入鱼豆腐、豆干、火腿、洋葱、虾仁炒3 分钟，再放入芹菜炒2 分钟。\r\n\r\n3.依次放入酱油、孜然和盐炒半分钟，最后放入麻辣花生和香菜炒匀即可。\r\n\r\n','2018-12-27 14:27:00','川菜');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
