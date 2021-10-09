-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: originalApp
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'文化・芸術','2021-09-30 09:04:10'),(2,'キャリア＆ビジネス','2021-09-30 09:04:29'),(3,'言語＆教育','2021-09-30 09:04:37'),(4,'スポーツ＆フィットネス','2021-09-30 09:04:49'),(5,'ペット＆動物','2021-09-30 09:04:56'),(6,'IT&テクノロジー','2021-09-30 09:05:03'),(7,'旅行','2021-09-30 09:05:11'),(8,'アウトドア','2021-09-30 09:05:17'),(9,'インドア','2021-09-30 09:05:23'),(10,'環境','2021-09-30 09:05:29'),(11,'ゲーム','2021-09-30 09:05:35'),(12,'趣味','2021-09-30 09:05:41'),(13,'音楽','2021-09-30 09:05:48'),(14,'子育て＆ファミリー','2021-09-30 09:05:54');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_category_relations`
--

DROP TABLE IF EXISTS `event_category_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_category_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `event_category_relations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `event_category_relations_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_category_relations`
--

LOCK TABLES `event_category_relations` WRITE;
/*!40000 ALTER TABLE `event_category_relations` DISABLE KEYS */;
INSERT INTO `event_category_relations` VALUES (11,8,3,'2021-10-01 01:58:20'),(12,8,9,'2021-10-01 01:58:20'),(13,9,9,'2021-10-01 04:12:25'),(14,9,12,'2021-10-01 04:12:25'),(16,11,4,'2021-10-02 01:00:46'),(17,11,8,'2021-10-02 01:00:46'),(27,10,3,'2021-10-02 04:32:42'),(28,10,9,'2021-10-02 04:32:42'),(32,12,4,'2021-10-02 11:23:37'),(36,13,2,'2021-10-08 02:03:21'),(37,13,3,'2021-10-08 02:03:21'),(38,13,9,'2021-10-08 02:03:21'),(39,14,6,'2021-10-08 02:07:08'),(40,14,9,'2021-10-08 02:07:08'),(41,15,8,'2021-10-08 02:22:28'),(42,15,10,'2021-10-08 02:22:28'),(43,15,14,'2021-10-08 02:22:28'),(44,16,9,'2021-10-08 02:26:01'),(45,16,12,'2021-10-08 02:26:01'),(46,16,13,'2021-10-08 02:26:01'),(47,17,2,'2021-10-08 02:28:09'),(48,17,6,'2021-10-08 02:28:09'),(49,17,9,'2021-10-08 02:28:09');
/*!40000 ALTER TABLE `event_category_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `place` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `participants` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (8,1,'Meet up','英会話','自宅','2021-10-16','12:00',20,'オンライン','e.jpg','2021-10-01 01:58:20'),(9,2,'お料理教室','お菓子作りに挑戦しよう','東京','2021-10-23','16:00',10,'対面','top.jpg','2021-10-01 04:13:21'),(10,1,'Meet up','英会話','自宅','2021-10-02','20:16',1,'対面','1AAF9A93-3A3C-4244-9E79-56A02D3C7044.JPG','2021-10-02 03:51:32'),(11,1,'サイクリング','サイクリングをしよう！！','鎌倉駅','2021-10-13','12:00',10,'対面','ダウンロード (2).jpeg','2021-10-02 01:01:26'),(12,4,'野球観戦','野球観戦をしよう！！　　チケットは1000円です。    16時に試合開始します。　集合時間にドームの入り口に集合にお集まりください','東京ドーム','2021-10-16','14:00',10,'対面','a0002281_main.jpeg','2021-10-02 11:23:37'),(13,10,'海外留学相談会','海外留学に興味がある方必見！！　現役アメリカ大学留学生の体験談が聞けます！！オンラインで実施します。','自宅','2021-10-16','18:00',10,'オンライン','IMG_0317.JPG','2021-10-08 02:03:21'),(14,10,'モダンなフロントエンド言語に挑戦しよう','モダンなJavaScript フレームワークReactをマスターできるチャンスです。参加人数は少人数ですのでお早めに参加希望者は参加ボタンを押してください。','自宅','2021-10-23','16:00',5,'オンライン','IMG_0315.WEBP','2021-10-08 02:07:08'),(15,11,'公園を綺麗にしよう！！','場所：船岡城址公園　集合場所:船岡駅　公園のゴミを拾って綺麗にしましょう。１時間前後を考えております。','船岡城址公園','2021-10-23','09:30',20,'対面','S0412.jpeg','2021-10-08 02:22:28'),(16,11,'ギター教室','ギターを練習しよう。楽器がなくても興味がある人は是非参加してください。','自宅','2021-10-22','17:30',30,'オンライン','images (3).jpeg','2021-10-08 02:26:01'),(17,11,'AIについて知ってみよう！！','AIについて知りたい人は是非参加して見てください。参加無料でオンライン開催です。','自宅','2021-10-22','20:30',100,'オンライン','user_create.jpg','2021-10-08 02:28:09');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (10,1,9,'2021-10-02 01:20:18');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_relations`
--

DROP TABLE IF EXISTS `message_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_user_id` int(11) NOT NULL,
  `receive_user_id` int(11) NOT NULL,
  `message_count` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_relations`
--

LOCK TABLES `message_relations` WRITE;
/*!40000 ALTER TABLE `message_relations` DISABLE KEYS */;
INSERT INTO `message_relations` VALUES (1,2,1,0,'2021-10-01 00:30:51'),(2,2,1,0,'2021-10-01 00:39:05'),(3,1,2,0,'2021-10-01 01:57:03'),(4,1,2,0,'2021-10-01 04:14:53'),(5,3,1,0,'2021-10-01 04:24:28'),(6,3,1,0,'2021-10-01 04:24:42'),(7,1,3,0,'2021-10-01 05:59:25'),(8,1,3,0,'2021-10-02 01:30:59'),(9,4,3,0,'2021-10-02 11:44:37'),(10,1,3,0,'2021-10-07 01:50:18');
/*!40000 ALTER TABLE `message_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_user_id` int(11) NOT NULL,
  `receive_user_id` int(11) NOT NULL,
  `message_content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `send_user_id` (`send_user_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`send_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,2,1,'What\'s up?','2021-10-01 00:30:51'),(2,2,1,'Hello!!','2021-10-01 00:39:05'),(3,1,2,'Hello World','2021-10-01 01:57:03'),(4,1,2,'Hello!!','2021-10-01 04:14:53'),(5,3,1,'Hello World','2021-10-01 04:24:28'),(6,3,1,'What\'s up?','2021-10-01 04:24:42'),(7,1,3,'What\'s up?','2021-10-01 05:59:25'),(8,1,3,'Hello World','2021-10-02 01:30:59'),(9,4,3,'Hello!!','2021-10-02 11:44:37'),(10,1,3,'Hello!!','2021-10-07 01:50:18');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (2,2,8,'2021-10-01 02:26:58');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,1,23,'男性','エンジニア','Japan','よろしくお願い致します','1AAF9A93-3A3C-4244-9E79-56A02D3C7044.JPG','2021-10-02 00:42:49'),(2,2,23,'男性','英語教師','日本','よろしくお願い致します','user_pic.jpg','2021-10-01 00:29:07'),(3,3,21,'男性','フリーター','America','I\'m a spider-man.','ダウンロード.jpeg','2021-10-01 04:23:35'),(4,4,23,'女性','英語教師','America','こんにちは                                                               ','icon.jpg','2021-10-02 11:24:07'),(5,5,26,'女性','学生','日本','よろしくお願い致します','user_pic.jpg','2021-10-08 01:35:06'),(6,6,27,'男性','メジャーリーガー','America','よろしくお願い致します','images.jpeg','2021-10-08 01:36:56'),(7,7,19,'男性','大学生','日本','よろしくお願い致します','images (1).jpeg','2021-10-08 01:38:17'),(8,8,26,'男性','会社員','日本','よろしくお願い致します','images.png','2021-10-08 01:39:19'),(9,9,28,'女性','写真家','French','よろしくお願い致します','images (2).jpeg','2021-10-08 01:40:34'),(10,10,39,'男性','ユーチューバー','日本','よろしく','ダウンロード (1).jpeg','2021-10-08 01:57:52'),(11,11,19,'女性','学生','日本　仙台　船岡市','よろしくお願い致します','user_pic.jpg','2021-10-08 02:17:31');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'吉住','Taku1710','Taku1710','2021-09-30 07:18:50','2021-10-01 06:45:09'),(2,'佐藤','Satou1710','Satou1710','2021-10-01 00:28:43','2021-10-01 00:28:43'),(3,'トム・ホランド','Tome1710','Tome1710','2021-10-01 04:22:04','2021-10-01 04:22:04'),(4,'坂本','Sakamoto1710','Sakamoto1710','2021-10-02 05:27:23','2021-10-02 05:27:23'),(5,'鈴木','Suzuki1710','Suzuki1710','2021-10-08 01:34:41','2021-10-08 01:34:41'),(6,'大谷','Otani1710','Otani1710','2021-10-08 01:36:12','2021-10-08 01:36:12'),(7,'佐藤','Satou171010','Satou171010','2021-10-08 01:37:22','2021-10-08 01:37:22'),(8,'高橋','Takahasi1820','Takahasi1820','2021-10-08 01:38:51','2021-10-08 01:38:51'),(9,'齋藤','Saitou1890','Saitou1890','2021-10-08 01:40:08','2021-10-08 01:40:08'),(10,'ヒカキン','gusiKe1090','gusiKe1090','2021-10-08 01:56:49','2021-10-08 01:58:19'),(11,'田中','Tanaka1090','Tanaka1090','2021-10-08 02:16:31','2021-10-08 02:16:31');
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

-- Dump completed on 2021-10-08 11:31:33
