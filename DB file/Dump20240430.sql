-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: diplomnarabota
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum` (
  `idforum` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`idforum`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` VALUES (2,'Образованието е един от най-важните елементи за развитието на индивида и обществото като цяло. То не само предоставя знания и умения, но и формира личността, развива критическо мислене и възприемчивост към нови идеи. В този есе ще разгледаме ролята на образованието в съвременния свят и неговото значение за индивидите и обществото.\r\n\r\nВсеки етап от образователния път – от детската градина до университета и непрекъснатото обучение през целия живот – има своята съществена роля. През детството и ранната младост образованието се фокусира върху основните знания и умения, които са основата за по-нататъшното развитие. С нарастването на възрастта, образованието дава възможност за специализация и избор на посока в кариерата.\r\n\r\nЕдно от основните предимства на образованието е неговата способност да разширява хоризонтите на индивида. То не само предоставя конкретни знания в различни области, но и стимулира критическото мислене, творческото изявяване и решаването на проблеми. Образованите хора са по-склонни към иновации и развитие на нови идеи, което е ключов фактор за напредъка на обществото.\r\n\r\nВ съвременния свят образованието играе решаваща роля за конкурентоспособността на нации и икономическия растеж. Инвестициите в образование се считат за най-добрите инвестиции в бъдещето, тъй като образованите работници са по-продуктивни и по-готови за адаптация към променящите се условия на пазара на труда.\r\n\r\nВъпреки значението си, образованието все още среща предизвикателства. Достъпът до образование е неравен по света, като много хора са лишени от възможността да получат качествено образование поради финансови или социални причини. Освен това, моделите на образование често се нуждаят от промени, за да отговорят на нуждите на съвременното общество и икономика.\r\n',3,'Obrazovatelnata sistema'),(3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam. Fringilla phasellus faucibus scelerisque eleifend donec. Varius morbi enim nunc faucibus a pellentesque. Senectus et netus et malesuada fames ac turpis egestas integer. Scelerisque viverra mauris in aliquam sem. Neque aliquam vestibulum morbi blandit cursus risus at ultrices. Nunc sed velit dignissim sodales. Adipiscing elit pellentesque habitant morbi tristique senectus et netus et. Aenean euismod elementum nisi quis eleifend quam. Elementum tempus egestas sed sed risus pretium quam vulputate dignissim. Viverra maecenas accumsan lacus vel facilisis volutpat est velit egestas. Sollicitudin tempor id eu nisl. Vivamus at augue eget arcu. Et netus et malesuada fames ac. Et netus et malesuada fames ac turpis. Vitae aliquet nec ullamcorper sit amet risus nullam eget. Quis risus sed vulputate odio ut enim blandit. Maecenas volutpat blandit aliquam etiam erat velit. Blandit massa enim nec dui nunc.\r\n\r\nNibh sit amet commodo nulla. Eu volutpat odio facilisis mauris sit amet massa. At varius vel pharetra vel turpis nunc eget lorem dolor. Viverra adipiscing at in tellus. Purus ut faucibus pulvinar elementum integer enim. Sem integer vitae justo eget magna. Tortor aliquam nulla facilisi cras. Tortor dignissim convallis aenean et tortor at risus viverra. Gravida rutrum quisque non tellus orci ac. Vulputate enim nulla aliquet porttitor. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Scelerisque eu ultrices vitae auctor. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna. Arcu odio ut sem nulla pharetra diam sit amet nisl. Nec tincidunt praesent semper feugiat nibh sed. Quisque non tellus orci ac auctor augue mauris augue neque. In vitae turpis massa sed elementum tempus.',3,'Test');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES (2,'Автоматика, информационна и управляваща техника'),(3,'Електроенергетика и електрообзавеждане'),(4,'Електротехника'),(5,'Топлоенергетика и ядрена енергетика'),(6,'Топлинни и хладилни технологии и системи'),(7,'Възобновяеми енергийни технологии и флуидна техника'),(8,'Дизайн и технологии за облекло и текстил'),(9,'Дигитални индустриални технологии'),(10,'Компютърно проектиране и технологии в машиностроенето'),(11,'Машиностроене'),(12,'Инженерна логистика'),(13,'Мехатроника'),(14,'Инженерен дизайн'),(15,'Електронни информационни системи'),(16,'Автомобилна електроника'),(17,'Телекомуникации'),(18,'Компютърно и софтуерно инженерство'),(19,'Информационни технологии в индустрията'),(20,'Транспортна техника и технологии'),(21,'Авиационна техника и технологии'),(22,'Технология и управление на транспорта'),(23,'Индустриален мениджмънт'),(24,'Стопанско управление'),(25,'Мениджмънт и бизнес информационни системи'),(26,'Приложна математика и информатика'),(27,'Информатика и софтуерни науки'),(28,'Приложна физика и компютърно моделиране'),(29,'Киберсигурност'),(30,'Интелигентни системи и изкуствен интелект (на български език)'),(31,'Интелигентни системи и изкуствен интелект (на английски език)'),(32,'Анализ на данни'),(33,'Компютърни системи и технологии (на немски език)'),(34,'Мехатроника и информационна техника (на немски език)'),(35,'Стопанска информатика (на немски език)'),(36,'Индустриално инженерство (на английски език)'),(37,'Електроинженерство (на френски език)'),(38,'История'),(39,'Археология'),(40,'Етнология'),(42,'История и география'),(43,'Архивистика и документалистика');
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university`
--

DROP TABLE IF EXISTS `university`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `university` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Picture` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Description` varchar(1400) NOT NULL,
  `site` varchar(100) NOT NULL,
  `Plans` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university`
--

LOCK TABLES `university` WRITE;
/*!40000 ALTER TABLE `university` DISABLE KEYS */;
INSERT INTO `university` VALUES (1,'Технически Университет','София','02-965-2845','info@tu-sofia.bg','TU-Sofia_1.jpg','Студентски Комплекс, ул. „проф. Георги Брадистилов“ 11, 1756 София','ТУ-София е първият и най-големият, подпомогнал създаването на повечето от висшите технически училища у нас, с най-високата акредитационна оценка от всички ВУ в България, който задава образователните стандарти и въвежда националните приоритети за развитие на образованието и науката. Университетът е водещ в областта на нанотехнологиите, виртуалното инженерство, енергийната ефективност, възобновяемите енергийни източници инженерната екология и инженерния дизайн, в използването на най-добрите практики, като философия и основополагащ принцип в инженерната дейност. Абсолвентите на ТУ са с добра заплата и успешна кариера. Не е случаен и фактът, че повече от десетилетие, ръководителите на всички работодателски организации в страната са възпитаници на Университета.','https://www.tu-sofia.bg/','https://www.tu-sofia.bg/uplan/uplan'),(2,'Софийски Университет \"Св. Климент Охридски\"','София','дададада','дабе@абв.бг','su.jpg','София център, бул. „Цар Освободител“ 15, 1504 София','','','test'),(3,'Нов Български Университет','София','08942324','kok@abv.bg','nbu.jpg','ж.к. Овча купел 2, ул. „Монтевидео“ 21, 1618 София','','','test'),(4,'Университет за национално и световно стопанство','София','02 819 5701','priem@unwe.bg','unss.jpg','Студентски Комплекс, ул. „8-ми декември“ 19, 1700 София','Университетът за национално и световно стопанство е най-старият, най-авторитетният и най-големият бизнес университет в България и Югоизточна Европа. Академичното ръководство си поставя за водеща цел – Университетът, както винаги досега, да подготвя елита на страната ни, да бъде лидер в българското висше образование, неделима част от европейското образователно и изследователско пространство, и предпочитано място за младите хора, които искат да получат модерно образование, да предлага конкурентоспособни образователни услуги. УНСС е лидер и в класацията на професионалните направления на висшите училища у нас, които дават на своите випускници шанс за най-добри доходи. По данни на Националния осигурителен институт 97,5 на сто от завършващите УНСС се реализират на пазара на труда. Голяма част от неговите випускници са на високи позиции в публичната администрация и бизнеса. Държавните и частните работодатели приемат дипломата на УНСС като гаранция за отлична подготовка и висок професионализъм на неговите възпитаници.','https://www.unwe.bg/','https://departments.unwe.bg/soc/bg/pages/6567'),(5,'Университет по хранителни технологии','Пловдив','08787817','лудлиси@ада','plovdiv-ht.png','MarashaPlovdiv Център, Булевард Марица 26, 4002 Пловдив','','','test'),(6,'Национална Спортна Академия \"Васил Левски\"','София','02 401 4100','rector@nsa.bg','NSA.jpg','ул. „Акад. Стефан Младенов“ 21','Национална спортна академия “Васил Левски” е единственото специализирано висше училище в България, което предлага образование на университетско ниво по три основни направления - Спорт, Педагогика на обучението по физическо възпитание, Обществено здраве. Обучението в НСА е базирано на нашия изследователски и интердисциплинарен подход. Учебните програми обединяват професионалната тренировка с научно-изследователските методи, стимулират умението за идентифициране, формулиране и решаване на проблемите в областта на физическата култура и спорта, оформя специалисти, които да могат да посрещнат предизвикателствата на живота с аналитично и съзидателно мислене и подход. За това голяма заслуга има висококвалифицирания научен и преподавателски състав на Академията.','https://www.nsa.bg/','https://www.nsa.bg/bg/page,1642');
/*!40000 ALTER TABLE `university` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university_majors`
--

DROP TABLE IF EXISTS `university_majors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `university_majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `university_id` int(11) DEFAULT NULL,
  `major_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `university_id` (`university_id`,`major_id`),
  KEY `major_id` (`major_id`),
  CONSTRAINT `university_majors_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`),
  CONSTRAINT `university_majors_ibfk_2` FOREIGN KEY (`major_id`) REFERENCES `major` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university_majors`
--

LOCK TABLES `university_majors` WRITE;
/*!40000 ALTER TABLE `university_majors` DISABLE KEYS */;
INSERT INTO `university_majors` VALUES (7,1,2),(8,1,3),(9,1,4),(10,1,5),(11,1,6),(12,1,7),(13,1,8),(14,1,9),(15,1,10),(16,1,11),(17,1,12),(18,1,13),(19,1,14),(20,1,15),(21,1,16),(22,1,17),(23,1,18),(24,1,19),(25,1,20),(26,1,21),(27,1,22),(28,1,23),(29,1,24),(30,1,25),(31,1,26),(32,1,27),(33,1,28),(5,1,29),(34,1,30),(35,1,31),(36,1,32),(37,1,33),(38,1,34),(39,1,35),(40,1,36),(41,1,37),(6,2,29),(42,2,38),(43,2,39),(44,2,40),(45,2,42),(46,2,43);
/*!40000 ALTER TABLE `university_majors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'Martin','Yordanov','marti170705@gmail.com','$2y$10$CUlmBdt3GbwbtKR.2yxR4OsmXQgqZBC6xQBcXO/oEJOGrPPu5KAwS','marti2',1),(4,'Mladi','Bogati Tarikati','mbt@mbt.bg','$2y$10$BUTH033.hJEM3282kfiRXuE45ostfqAvyXMushM9J4YOLFJixLwCS','MBT PA PA',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-30 11:50:50
