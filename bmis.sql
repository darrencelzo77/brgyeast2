/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.32-MariaDB : Database - bmis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `approval` */

DROP TABLE IF EXISTS `approval`;

CREATE TABLE `approval` (
  `id_approval` int(11) NOT NULL AUTO_INCREMENT,
  `id_resident` int(11) NOT NULL,
  `apstatus` varchar(50) NOT NULL,
  PRIMARY KEY (`id_approval`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `approval` */

/*Table structure for table `brgy_info` */

DROP TABLE IF EXISTS `brgy_info`;

CREATE TABLE `brgy_info` (
  `id_brgy_info` int(11) NOT NULL AUTO_INCREMENT,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `openhours` text NOT NULL,
  `background` text NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  PRIMARY KEY (`id_brgy_info`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `brgy_info` */

insert  into `brgy_info`(`id_brgy_info`,`brgy`,`municipal`,`province`,`email`,`contact`,`openhours`,`background`,`vision`,`mission`) values (1,'East Modern Site','Bagiuo City','Isabela','brgyEast Modern Site@gmail.com','046-509-1664','Open Hours of Barangay: Monday to Friday (8:00 to 5:00)','The first termer Sangguniang Barangay Members were Hon. Baltazar T. Andres\r\nand Hon. Richard B. Perez. Sangguniang Kabataan (SK) Chairperson elected\r\nwas Hon. Jhon Rod Guieb. Due to the Barangay Treasurer being elected as the\r\nBarangay Kagawad, he was then replaced by the Barangay Secretary, Mrs.\r\nLouresa R. Importa. Importa vacating her position was then replaced by the\r\nformer Barangay Employment Service Assistant (BESO) and Barangay\r\nAdministrative Clerk , Ms. Thea P. Sodsod.\r\nOn January 2024, the barangay’s administrative office appointed a Barangay\r\nClerk through the initiative of Punong Barangay Hon. Quintin J. Romero in the\r\nname of Ms. Jennifer D. Cabauatan, and later in the said year was the\r\nappointment of Barangay Admin Ms. Mary Jane M. Santos.\r\n\r\nEast Modern Site is a barangay in the city of Santiago, in the province of Isabela. Its population as determined by the 2024 census was 6,508.','\"Thru total dedication and unified cooperation  of the Barangay  Officials and its  Constituents, Self Reliant Barangay  will  emerge continuingly outdoing others  in its personality as a society dedicated for the service and  development for the service and development on its own progress.\"','\"To attain continued progress that the implementation of simple, yet accurate projects towards  peace and  order, health and character development for a unified and comforting  independent Barangay guide by our almighty God\"');

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id_position` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  `pos_order` int(11) NOT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `position` */

insert  into `position`(`id_position`,`position`,`pos_order`) values (1,'Barangay Chairman',1),(2,'Sk Chairperson',2),(3,'Barangay Secretary',3),(4,'Barangay Treasurer',4),(5,'Councilor 1',5),(6,'Councilor 2',6),(7,'Councilor 3',7),(8,'Councilor 4',8),(9,'Councilor 5',9),(10,'Councilor 6',10);

/*Table structure for table `system_info` */

DROP TABLE IF EXISTS `system_info`;

CREATE TABLE `system_info` (
  `id_system` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  `poweredBy` text NOT NULL,
  PRIMARY KEY (`id_system`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `system_info` */

insert  into `system_info`(`id_system`,`name`,`acronym`,`poweredBy`) values (1,'Barangay East Modern Site Information System','BBIS','Ive Generalao');

/*Table structure for table `tbl_activities` */

DROP TABLE IF EXISTS `tbl_activities`;

CREATE TABLE `tbl_activities` (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id_activity`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_activities` */

insert  into `tbl_activities`(`id_activity`,`name`,`date`,`image`) values (16,'Sa pamumuno ni Hon. Quintin Javier Romero at buong konseho ng Barangay East Modern Site, Bagiuo City, ganap naming inaanunsyo ang pagkakaroon natin ng  BARANGAY INFORMATION MANAGEMENT SYSTEM na maa-access nating lahat online.  Ano nga ba ang magiging ambag nito sa ating komyunidad? Sa pamamagitan ng Barangay East Modern Site Information Management System ay mas magkakaroon tayo ng makatotohanan at matibay na mga datos patungkol sa iba\'t ibang bagay dito sa ating barangay mula sa ating personal hanggang sa ating kapaligiran.  Ang mga datos na ito ay pangmalawakan dahil gusto natin na tayo ay makapaghanda pa ng mga mas magagandang programa at proyekto ngayong taon na lubos na kinakailangan at nararapat para sa ating lahat.  PAANO MAG REGISTER AT BAKIT KINAKAILANGAN MAG-REGISTER? Pindutin lamang ang link na https://barangayEast Modern Sitesantiagocity.online/ upang makapagfill- out ng form, ang mga datos na inyong ilalagay ay makikita lamang ng mga admin ng ating website kaya wala po kayong dapat ikabahala.  Kailangan mag-register dahil ang mga sumusunod na datos na ating maitatala sa ating website ay ang magiging basehan sa mga bilang/datos na ating kakailanganin sa mga programang panghinaharap. MAAARI NA BA MAG REQUEST NG MGA CERTIFICATES ONLINE?  Pwede na po, pero kayo pa rin po ay iinterbyuhin/kapapanayamin ng ating Barangay Clerk pagdating niyo po sa opisina sa barangay. (Ang pagr- request po online ay bilang paunang hakbang lamang po sa pagkuha ng dokumento kung gusto niyo po magpasabi ahead of time/ kung kayo po ay didiretso mag walk in, wala din naman pong problema) .  ANO PA ANG MGA MAARI NAMING MAKITA SA BARANGAY WEBSITE?  1. Maaari niyo po makita ang Barangay History ng ating barangay. 2. Makikita niyo po ang mga recent activities na ating nilahukan. 3. Sa website po ay makikita rin ang mga mahahalagang anunsyo sa mga aktibidades na paparating pa lamang. 4. Patuloy na inaayos at minomodify ang mga mailalagay sa ating website upang mas mapapadali at makapagbigay ng garantisadong serbisyo para sa lahat.  #JuanEast Modern Site #ProgramaAtOrasGarantisadongIaalaysalahat #KayPOGIPanaloAngBarangay https://barangayEast Modern Sitesantiagocity.online/','2025-05-15','uploads/497684380_700573345988562_9024197463490537465_n.jpg'),(18,'The most coveted crown in the Barangay, Mutya ng East Modern Site 2025. Apply now and be an inspiration. Show us your beauty, grace, and confidence.  WHO CAN JOIN? - Must be at least 16 years of age and under 28 years of age - Must be a 1 year resident of Barangay East Modern Site - Female, never been married or borne children - At least 5\'3 ft. tall  Get the form through this link: https://drive.google.com/.../1MsHH...  More details about the requirements are on the official application form.  For other information please call: +63 967 536 7599','2025-05-16','uploads/494524083_1159564472850365_6353748865146563348_n.jpg');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_status` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id_admin`,`email`,`password`,`lname`,`fname`,`mi`,`role`,`user_status`) values (1,'darren@gmail.com','971ef6d73b20a633967633686c8e124a','Admin','User','','administrator','');

/*Table structure for table `tbl_announcement` */

DROP TABLE IF EXISTS `tbl_announcement`;

CREATE TABLE `tbl_announcement` (
  `id_announcement` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(1000) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `addedby` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_announcement`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_announcement` */

insert  into `tbl_announcement`(`id_announcement`,`event`,`target`,`start_date`,`addedby`,`title`,`photo`) values (9,'SEARCH FOR MUTYA NG East Modern Site 2025\n(UNTIL MAY 18, 2025 ONLY)\n\nThe most coveted crown in the Barangay, Mutya ng East Modern Site 2025. Apply now and be an inspiration. Show us your beauty, grace, and confidence.\n\nWHO CAN JOIN?\n- Must be at least 16 years of age and under 28 years of age\n- Must be a 1 year resident of Barangay East Modern Site\n- Female, never been married or borne children\n- At least 5\'3 ft. tall\n\nGet the form through this link: https://drive.google.com/.../1MsHH...\n\nMore details about the requirements are on the official application form.\n\nFor other information please call:\n+63 967 536 7599 ',NULL,'2025-05-15','Admin, User',NULL,NULL),(10,'? ANNOUNCEMENT | PRE-MARRIAGE ORIENTATION COUNSELING ?\r\nThe City Population and Development Office will be conducting the Pre-Marriage Orientation Counseling (PMOC) as part of its commitment to promote Responsible Parenthood and Family Planning among soon-to-be married couples.\r\n? Date: September 3, 2025 (Wednesday)\r\n? Time: 8:30 AM sharp (Strictly no latecomers allowed)\r\n? Venue: CSWD Compound, City Hall, San Andres, City of Santiago\r\n? Reminders:\r\n? No Kids Allowed\r\n? No Sando, No Slippers, No Shorts\r\n✅ Bring your own ballpen\r\n✅ Wear proper attire\r\n? This orientation is a mandatory requirement prior to marriage and aims to prepare couples for a healthy, responsible, and well-informed family life.\r\n? Para sa matatag na pamilya at maunlad na komunidad.\r\nSerbisyong Tapat, Serbisyong Kabsat!\r\n#CityPopulationDevelopmentOffice #PreMarriageOrientation #ResponsibleParenthood #CityOfSantiago #SerbisyongTapatSerbisyongKabsat',NULL,'2025-09-02','Admin, User',NULL,NULL);

/*Table structure for table `tbl_blotter` */

DROP TABLE IF EXISTS `tbl_blotter`;

CREATE TABLE `tbl_blotter` (
  `id_blotter` int(11) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(50) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `blot_photo` mediumblob DEFAULT NULL,
  `contact` varchar(20) NOT NULL,
  `narrative` mediumtext NOT NULL,
  `timeapplied` datetime NOT NULL DEFAULT current_timestamp(),
  `case_name` varchar(255) DEFAULT NULL,
  `case_respondent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_blotter`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_blotter` */

insert  into `tbl_blotter`(`id_blotter`,`case_no`,`lname`,`fname`,`mi`,`houseno`,`street`,`brgy`,`municipal`,`blot_photo`,`contact`,`narrative`,`timeapplied`,`case_name`,`case_respondent`) values (7,'BLT-20251208-084626216','wqqwqw','wqww','w','wwqwqw','qwwqwq','East Modern Site','Bagiuo City',NULL,'09566795361','wqww','2025-12-08 08:46:26','qwq','wqww'),(8,'BLT-20260111-075352706','Skyler Bender','Gail Owens','R','Occaecat id dolorem','Velit voluptatem aut','East Modern Site','Bagiuo City',NULL,'09611916655','Voluptate quisquam p','2026-01-11 07:53:52','Kamal Franks','Blanditiis velit vi');

/*Table structure for table `tbl_brgyid` */

DROP TABLE IF EXISTS `tbl_brgyid`;

CREATE TABLE `tbl_brgyid` (
  `id_brgyid` int(11) DEFAULT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `res_photo` varchar(255) DEFAULT NULL,
  `inc_lname` varchar(255) NOT NULL,
  `inc_fname` varchar(255) NOT NULL,
  `inc_mi` varchar(255) NOT NULL,
  `inc_contact` varchar(255) NOT NULL,
  `inc_houseno` varchar(255) NOT NULL,
  `inc_street` varchar(255) NOT NULL,
  `inc_brgy` varchar(255) NOT NULL,
  `inc_municipal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_brgyid` */

insert  into `tbl_brgyid`(`id_brgyid`,`id_resident`,`lname`,`fname`,`mi`,`houseno`,`street`,`brgy`,`municipal`,`bplace`,`bdate`,`res_photo`,`inc_lname`,`inc_fname`,`inc_mi`,`inc_contact`,`inc_houseno`,`inc_street`,`inc_brgy`,`inc_municipal`) values (NULL,23,'Vilfamat','Vincent','Briongos','Blk. 2 Lot 5','Kamatisan','Dalig','Antipolo City','2011-06-15','1999-07-30',NULL,'Vilfamat','Teresita','Briongos','09515496436','Antipolo City','2011-06-15','1999-07-30',NULL),(NULL,23,'Vilfamat','Vincent','Briongos','Blk. 2 Lot 5','Kamatisan','Dalig','Antipolo City','2011-06-15','1999-11-29',NULL,'Vilfamat','Teresita','Briongos','09654165465','Antipolo City','2011-06-15','1999-11-29','Array'),(NULL,23,'Vilfamat','Vincent','Briongos','Blk. 2 Lot 5','Kamatisan','Dalig','Antipolo City','Antipolo, Rizal','1999-11-30',NULL,'Vilfamat','Teresita','Briongos','09564815496','Antipolo City','Antipolo, Rizal','1999-11-30','Array');

/*Table structure for table `tbl_bspermit` */

DROP TABLE IF EXISTS `tbl_bspermit`;

CREATE TABLE `tbl_bspermit` (
  `id_bspermit` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mi` varchar(255) DEFAULT NULL,
  `age` tinyint(4) NOT NULL,
  `bsname` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(252) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `bsindustry` varchar(255) DEFAULT NULL,
  `aoe` int(11) NOT NULL,
  PRIMARY KEY (`id_bspermit`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_bspermit` */

insert  into `tbl_bspermit`(`id_bspermit`,`cert_no`,`id_resident`,`lname`,`fname`,`mi`,`age`,`bsname`,`houseno`,`street`,`brgy`,`municipal`,`bsindustry`,`aoe`) values (12,'75035190365',84,'Medina','Jan Clifford','Calad',32,'Zoomtech','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','Computer',500),(15,'82229126314',94,'CRUZ','DANILO','SAMONTE',64,'Zoomtech','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Music',43553),(16,'30182983510',94,'CRUZ','DANILO','SAMONTE',64,'ads','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Energy',34234),(17,'22543590617',94,'CRUZ','DANILO','SAMONTE',64,'ads','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Energy',34234),(18,'93680314471',94,'CRUZ','DANILO','SAMONTE',64,'ads','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Energy',34234),(19,'42585420409',94,'CRUZ','DANILO','SAMONTE',64,'ads','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Energy',34234),(20,'57514032240',94,'CRUZ','DANILO','SAMONTE',64,'ads','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Energy',34234),(21,'05912905069',94,'CRUZ','DANILO','SAMONTE',64,'ads','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Energy',34234),(22,'',105,'Medina','Jan Clifford','C',0,'ZT DEVELOPER','21','1','East Modern Site','Bagiuo City','Agriculture',500),(23,'36315843658',94,'CRUZ','DANILO','SAMONTE',64,'Zoomtech','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Transport',133),(24,'29910416879',94,'CRUZ','DANILO','SAMONTE',64,'Zoomtech','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Transport',133),(25,'90817215362',94,'CRUZ','DANILO','SAMONTE',64,'Zoomtech','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Electronics',133),(26,'00047783913',106,'APELO','ALFREDO','Prieto',71,'Zoomtech','248','Purok 2 camatchili st','East Modern Site','Bagiuo City','Hospitality',133),(27,'66087370299',94,'CRUZ','DANILO','SAMONTE',64,'qqwqw','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','WorldWide Web',1234),(28,'57670665025',95,'Villaluz','Lourdes Dimple','Del Rosario',23,'qqwqw','7','P 4B Durian St.','East Modern Site','Bagiuo City','WorldWide Web',1234),(29,'10528153522',94,'CRUZ','DANILO','SAMONTE',64,'qqq','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Computer',1870),(30,'06032519835',94,'CRUZ','DANILO','SAMONTE',64,'qqq','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Computer',1870);

/*Table structure for table `tbl_clearance` */

DROP TABLE IF EXISTS `tbl_clearance`;

CREATE TABLE `tbl_clearance` (
  `id_clearance` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL DEFAULT '',
  `fname` varchar(255) NOT NULL DEFAULT '',
  `mi` varchar(255) NOT NULL DEFAULT '',
  `purpose` varchar(255) NOT NULL DEFAULT '',
  `houseno` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) NOT NULL DEFAULT '',
  `brgy` varchar(255) NOT NULL DEFAULT '',
  `municipal` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(255) NOT NULL DEFAULT '',
  `age` varchar(255) NOT NULL DEFAULT '',
  `date_issued` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_clearance`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_clearance` */

insert  into `tbl_clearance`(`id_clearance`,`cert_no`,`id_resident`,`lname`,`fname`,`mi`,`purpose`,`houseno`,`street`,`brgy`,`municipal`,`status`,`age`,`date_issued`) values (1,'04674862496',94,'CRUZ','DANILO','SAMONTE','Local Employment','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','In a relationship','64','2025-08-09 07:07:13'),(2,'87629704109',94,'CRUZ','DANILO','SAMONTE','Local Employment','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','In a relationship','64','2025-08-09 07:08:46'),(3,'',0,'HADUCA','KING ADRIAN','A','Local Employment','114','TRAMO STREET','East Modern Site','Bagiuo City','Single','29','2025-08-18 00:58:41'),(4,'',0,'pagba','emily sta','cruz','Bank Requirements','123','IPIL-IPIL','East Modern Site','Bagiuo City','Single','53','2025-08-18 06:22:02'),(5,'',0,'VERSOZA','ROSALINA','S','Loan','123','Lansones st','East Modern Site','Bagiuo City','Married','43','2025-08-19 00:50:50'),(6,'',0,'CABACUNGAN','VIRGILIO JR','ANGALA','Loan','123','PATA','East Modern Site','Bagiuo City','Single','32','2025-08-22 01:05:13'),(7,'',0,'DESINGANO','SLYVIA','A','Postal ID Application','123','mahogany','East Modern Site','Bagiuo City','Married','61','2025-08-22 01:57:46'),(8,'',0,'BORDA','APPLE JOY','LAGUISMA','Bank Requirements','123','BANABA','East Modern Site','Bagiuo City','Single','26','2025-08-27 07:52:06'),(9,'',0,'tucay','judyan','paringit','Bank Requirements','123','BANABA','East Modern Site','Bagiuo City','Married','30','2025-08-27 07:53:36'),(10,'',0,'LAGUISMA','JANICE','DOMINGO','Bank Requirements','123','BANABA','East Modern Site','Bagiuo City','Single','39','2025-09-01 00:23:37'),(11,'71449877107',94,'CRUZ','DANILO','SAMONTE','Local Employment','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Single','64','2025-12-07 23:39:35'),(12,'60910182081',94,'CRUZ','DANILO','SAMONTE','Local Employment','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Single','64','2025-12-08 15:13:05');

/*Table structure for table `tbl_family_member` */

DROP TABLE IF EXISTS `tbl_family_member`;

CREATE TABLE `tbl_family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resident_id` int(11) NOT NULL,
  `family_lastname` varchar(100) DEFAULT NULL,
  `family_firstname` varchar(100) DEFAULT NULL,
  `family_middleinitial` varchar(10) DEFAULT NULL,
  `relationshipid` int(11) DEFAULT NULL,
  `family_age` int(11) DEFAULT NULL,
  `familycivilid` int(11) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `income` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_family_member` */

insert  into `tbl_family_member`(`id`,`resident_id`,`family_lastname`,`family_firstname`,`family_middleinitial`,`relationshipid`,`family_age`,`familycivilid`,`occupation`,`income`) values (1,91,'qwqqw','qwqwqw','wqwwqw',0,20,0,'qwqwwqw','212121'),(2,92,'Medina','Jan Clifford','M',0,20,0,'N/A','10000'),(3,93,'Medina','Jan Clifford','M',0,20,0,'N/A','10000'),(4,96,'Matterig','Gavino','Lagutao ',0,33,0,'Self employed ','15000'),(5,97,'Medina','Clifford','M',0,20,0,'N/A','10000'),(6,102,'Baquiran','Rose','Guiang',0,56,0,'None','00'),(7,102,'Baquiran','Ronaldo','Bacani',0,67,0,'',''),(8,103,'Lorenzo ','Robert','Viernes',0,41,0,'','3000'),(9,103,'Lorenzo','Zoff Maber','Montano ',0,7,0,'NA','0'),(10,103,'Lorenzo ','Yuan Veier','Montano',0,0,0,'NA','0'),(11,103,'Lorenzo ','Xalm Zyfer','Montano',0,3,0,'NA','0'),(12,105,'','','',0,0,0,'',''),(13,143,'Balda','Marivicy','Rillones',0,45,0,'House Wife','');

/*Table structure for table `tbl_indigency` */

DROP TABLE IF EXISTS `tbl_indigency`;

CREATE TABLE `tbl_indigency` (
  `id_indigency` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_indigency`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_indigency` */

insert  into `tbl_indigency`(`id_indigency`,`cert_no`,`id_resident`,`lname`,`fname`,`mi`,`nationality`,`houseno`,`street`,`brgy`,`municipal`,`purpose`,`date`) values (9,'',0,'SUMALBAG','KARYLL ','C','Filipino','139','PASAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(10,'',0,'AQUINO','JUDY-ANN','M','Filipino','139','PASAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(11,'',0,'CASTRO','RIZZA MAE','M','Filipino','805','ala','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(12,'',0,'RAFAEL','CHRISTOFER','C','Filipino','123','CAMACAM','East Modern Site','Bagiuo City','Scholarship','2025-03-04'),(13,'',0,'ASHLEY','ARBOLEDA ','M','Filipino','13','MACOPA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(14,'',0,'ALOTA','LEAH','L','Filipino','5','TINDALO','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(15,'',0,'TOBIAS','JULIE ALMA','O','Filipino','05','STGO HIGH SUBDIVISION','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(16,'',0,'CABANTING','JANDON','A','Filipino','123','ANGALA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(17,'',0,'GOMEZ','ANGELICA','A','Filipino','11','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(18,'',0,'VARGAS','RONILO','R','Filipino','7','MACOPA ST','East Modern Site','Bagiuo City','Other important transactions.','2025-03-04'),(19,'',0,'MENDOZA','DELFIN','G','Filipino','14','STGO HIGH SUBDIVISION','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(20,'',0,'CANTANERO','FELIPE','M','Filipino','78','PATA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(21,'',0,'AQUINO','PRINCESS KYLE','G','Filipino','123','TINDALO','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(22,'',0,'ORTIZ','KRISTINE CASSANDRA','U','Filipino','83','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(23,'',0,'CABACUNGAN','ADETH','A','Filipino','123','SITO PATA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(24,'',0,'LEAÑO','FELISA','C','Filipino','786','SITO PATA','East Modern Site','Bagiuo City','Financial Transaction','2925-03-04'),(25,'',0,'BARROGA','JIAN','T','Filipino','123','NARRA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(26,'',0,'SANTOS','JULIE ANN','B','Filipino','52','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(27,'',0,'LAUNGAYAN','JOHN PAUL','G','Filipino','148','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(28,'',0,'TOQUILAR','JAYSON','C','Filipino','7','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(29,'',0,'ORTALIZA','MICHELLE ','B','Filipino','595','LAUAN','East Modern Site','Bagiuo City','Financial Transaction','2025-03-04'),(30,'',0,'GATDULA','JASMIN','T','Filipino','101','DAU','East Modern Site','Bagiuo City','Financial Transaction','2025-03-05'),(31,'',0,'ANTONIO','CECILIA ','S','Filipino','13','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-03-05'),(32,'',0,'VIERNES','ERLITO','D','Filipino','123','MANGGA','East Modern Site','Bagiuo City','Other important transactions.','2025-03-05'),(33,'',0,'ENRIQUEZ','EVANGELINE','S','Filipino','123','TRAM','East Modern Site','Bagiuo City','Other important transactions.','2025-03-05'),(34,'',0,'BITANTES','FILIPINA','R','Filipino','696','DURIAN','East Modern Site','Bagiuo City','Financial Transaction','2025-03-05'),(35,'',0,'ALVARES','DENVER','SANCHEZ','Filipino','123','DAU','East Modern Site','Bagiuo City','Financial Transaction','2025-03-05'),(36,'',0,'HAY','MARIA MAY','M','Filipino','7','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-05'),(37,'',0,'CALSO','AMELIA','G','Filipino','123','MANGGA','East Modern Site','Bagiuo City','Other important transactions.','2025-03-05'),(38,'',0,'DE GUZMAN','JOMMEL ','SANTOS','Filipino','12','SAMPALOC ST','East Modern Site','Bagiuo City','Other important transactions.','2025-03-05'),(39,'',0,'DUQUE','WILMA','N','Filipino','31','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-05'),(40,'',0,'SADDUL','EVANG','BONDOC','Filipino','701','DUHAT ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(41,'',0,'ANGALA','NARCY','C','Filipino','123','PATA STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(42,'',0,'masiclst','conchita','a','Filipino','123','Lansones st','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(43,'',0,'ICAWAT','ROWENA','S','Filipino','1','LUKBAN ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(44,'',0,'ILAGAN','PAUL JOHN','P','Filipino','123','STGO HIGH SUBDIVISION','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(45,'',0,'CALSO','ROSEMARIE','B','Filipino','123','MANGGA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(46,'',0,'gabuya','mc rovilo','s','Filipino','618','mahogany','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(47,'',0,'dela cruz','van yuske','c','Filipino','595','lauan','East Modern Site','Bagiuo City','Other important transactions.','2025-03-06'),(48,'',0,'rosales','alan','v','Filipino','123','DURIAN','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(49,'',0,'balmediano','sally','g','Filipino','450','casoy','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(50,'',0,'CORPUZ','CHRISTIAN DAVE','C','Filipino','123','DUHAT ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(51,'',0,'CALSO','ANGELINA','G','Filipino','125','MANGGA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-06'),(52,'',0,'CRISITIN','ANALYN','V','Filipino','123','NARRA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-10'),(53,'',0,'gonzalo','joel','l','Filipino','123','CAMACAM','East Modern Site','Bagiuo City','Scholarship','2025-03-10'),(54,'',0,'DELO','GEMMA ','P','Filipino','100','PR','East Modern Site','Bagiuo City','Financial Transaction','2025-03-10'),(55,'',0,'BAES','ALYSSA MARIE','G','Filipino','123','LUKBAN ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-10'),(56,'',0,'LAURELIO','RANDY ','F','Filipino','61','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-03-10'),(57,'',0,'calad','elvira','a','Filipino','166','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(58,'',0,'callangan','jasmin joy ','g','Filipino','123','lauan','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(59,'',0,'ANTONIO','ENALYN ','D','Filipino','123','LAN','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(60,'',0,'CORDOVA','MARK DEXTER','I','Filipino','123','TANGUILE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(61,'',0,'JAVIER','EDERLINA ','B','Filipino','02','MANGGA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(62,'',0,'PASTORFIDE','JOMELLA DECELYN','P','Filipino','123','RAMOS ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(63,'',0,'SIERRA','RENGIE LYN','VELASCO','Filipino','123','ABAUAG ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-11'),(64,'',0,'ESTACIO','LEONORA ','D','Filipino','162','CAMACAM','East Modern Site','Bagiuo City','Financial Transaction','2025-03-12'),(65,'',0,'guiab','ligalig','l','Filipino','808','purok 5 East Modern Site','East Modern Site','Bagiuo City','Financial Transaction','2025-03-12'),(66,'',0,'SADDUL','PRINNIE','C','Filipino','123','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-12'),(67,'',0,'GAMIT','ALLAISA ','R','Filipino','78','PATA STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-12'),(68,'',0,'ASIOCHE','DANILO ','L','Filipino','123','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-03-14'),(69,'',0,'VALDEZ','ARJAY','G','Filipino','123','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-03-14'),(70,'',0,'CAMACAM','VIRGINIA ','S.','Filipino','785','SITO PATA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-14'),(71,'',0,'LIBIRAN','JEDALYN','S','Filipino','7','Lansones st','East Modern Site','Bagiuo City','Financial Transaction','2025-03-17'),(72,'',0,'AGBAYANI','SOLITA','F','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-17'),(73,'',0,'AVILES','MA CRISTINA ','I','Filipino','07','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-18'),(74,'',0,'JOVEN','JULIUS ARNEL','C','Filipino','123','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-03-18'),(75,'',0,'BENICO','AURORA','A','Filipino','56','MOLAVE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-18'),(76,'',0,'DORIGO','JOGEL','C','Filipino','123','Lansones st','East Modern Site','Bagiuo City','Other important transactions.','2025-03-18'),(77,'',0,'tumbaga','cristine','b','Filipino','123','Lansones st','East Modern Site','Bagiuo City','Financial Transaction','2025-03-20'),(78,'',0,'ORTEZA','MISHELLE','P','Filipino','10','TANGUILE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-20'),(79,'',0,'dulloog','diana mae','m','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-24'),(80,'',0,'GRAGASIN','HANZ CHRISTIAN ','B','Filipino','123','CAMACAM','East Modern Site','Bagiuo City','Financial Transaction','2025-03-24'),(81,'',0,'ALFONSO','ALFONSO ','C','Filipino','105','RAMOS ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-27'),(82,'',0,'URBANO','MARY ','C','Filipino','123','LUKBAN ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-28'),(83,'',0,'QUINES','HAINA ','T','Filipino','123','MANGGA','East Modern Site','Bagiuo City','Financial Transaction','2025-03-31'),(84,'',0,'ogaban','jerry','','Filipino','123','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Other important transactions.','2025-03-31'),(85,'',0,'BALMONTE','MARLYN','B','Filipino','11','TANGUILE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-03-31'),(86,'',0,'QUESADA','ROWENA','P','Filipino','249','KAMATSILI','East Modern Site','Bagiuo City','Financial Transaction','2025-03-31'),(87,'',0,'mactal','joana marie','r','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-03-31'),(88,'',0,'PABILING','MARVILYN','C','Filipino','14','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(89,'',0,'DELA VEGA','MIA ZUSANE','P','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(90,'',0,'AQUINO','JONALYN','A','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(91,'',0,'SEREDIO','JAMAICA','C','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(92,'',0,'CRUZ','EMMARYN','M','Filipino','104','IPIL-IPIL','East Modern Site','Bagiuo City','Financial Transaction','2025-04-02'),(93,'',0,'DE LEON','MICHAEL JOE','M','Filipino','123','lauan street','East Modern Site','Bagiuo City','Financial Transaction','2025-04-02'),(94,'',0,'PARINAS','CAMILE DYNNE','V','Filipino','123','lauan street','East Modern Site','Bagiuo City','Financial Transaction','2025-04-02'),(95,'',0,'DUCAS','AUDREY','P','Filipino','123','lauan street','East Modern Site','Bagiuo City','Financial Transaction','2025-04-02'),(96,'',0,'enriquez','MICHAEL','S','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-08'),(97,'',0,'BAOSON','JHAYCK-IAN','T','Filipino','109','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-08'),(98,'',0,'MARTIN','VILLY','P','Filipino','123','lauan street','East Modern Site','Bagiuo City','Financial Transaction','2025-04-08'),(99,'',0,'calso','angelina','g','Filipino','125','MANGGA','East Modern Site','Bagiuo City','Other important transactions.','2025-04-08'),(100,'',0,'CARREON','RHOAD','B','Filipino','123','IPIL-IPIL','East Modern Site','Bagiuo City','Financial Transaction','2025-04-08'),(101,'',0,'VILLAROZA','ANTHONY','R','Filipino','12','casoy','East Modern Site','Bagiuo City','Financial Transaction','2025-04-08'),(102,'',0,'GATTOC','JEROME','R','Filipino','123','NARRA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-08'),(103,'',0,'GARCIA','IRIS LARA DENN','C','Filipino','159','CAMACAM','East Modern Site','Bagiuo City','Financial Transaction','2025-04-11'),(104,'',0,'MERCADO','MERCEDES','T','Filipino','123','CAMACAM','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(105,'',0,'joson','gallardo','l','Filipino','01','SANTOL ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(106,'',0,'PANGANIBAN','JOEL','R','Filipino','123','casoy','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(107,'',0,'tapiador','fe','n','Filipino','123','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(108,'',0,'asenci','elizabeth','n','Filipino','123','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(109,'',0,'SAMBRANO','JONALY','G','Filipino','123','Lansones st','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(110,'',0,'arboleda','benibirth ','b','Filipino','01','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(111,'',0,'TELAN','EDGAR ','T','Filipino','738','DURIAN','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(112,'',0,'OLIGO','CHONA LIZA MAE','D','Filipino','123','APITONG ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-21'),(113,'',0,'labasne','mary ann ','a','Filipino','123','PATA STREET','East Modern Site','Bagiuo City','Other important transactions.','2025-04-21'),(114,'',0,'ragsac','nichiel','m','Filipino','269','SAMPALOC ST','East Modern Site','Bagiuo City','Other important transactions.','2025-04-21'),(115,'',0,'laguisma','julieta','o','Filipino','226','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(116,'',0,'catalon','marc noel','c','Filipino','432','APITONG ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(117,'',0,'grospe','grAce','p','Filipino','123','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(118,'',0,'aranzaso','irene','a','Filipino','37','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(119,'',0,'SARILE','APOLONIA','Y','Filipino','126','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(120,'',0,'joson','al','t','Filipino','123','lauan street','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(121,'',0,'esguerra','realyn','v','Filipino','123','SANTOL ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(122,'',0,'ESTABILLO','ROWENA','G','Filipino','326','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(123,'',0,'da jose','estrella','d','Filipino','136','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(124,'',0,'de la luna','mercidita','d','Filipino','136','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(125,'',0,'marcelino','joebeth','s','Filipino','36','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(126,'',0,'paulino','welino','l','Filipino','114','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(127,'',0,'paulino','welino','l','Filipino','114','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-22'),(128,'',0,'POSILERO','MARLON JAY','M','Filipino','331','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-24'),(129,'',0,'ortega','edgar jr','t','Filipino','123','NARRA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-24'),(130,'',0,'curampez','jenny-vi','m','Filipino','8','MANGGA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-24'),(131,'',0,'ROMERO','CLARITA MARIA','C','Filipino','22','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(132,'',0,'BETRIOLO','NIDA','C','Filipino','02','MULAWIN','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(133,'',0,'HERMAN','EVELYN','QUIRAY','Filipino','651','mahogany','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(134,'',0,'lagundimao','sarah jane','a','Filipino','79','luan','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(135,'',0,'BERMUDEZ','DAISY','B','Filipino','105','SICAT STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(136,'',0,'FERNANDEZ','MARK AXEL','O','Filipino','129','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(137,'',0,'BORDA','TERESITA','D','Filipino','238','DAU','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(138,'',0,'ubaldo','denmark','r','Filipino','02','TANGUILE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(139,'',0,'DE JESUS','JERICK ','S','Filipino','104','IPIL-IPIL','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(140,'',0,'ubaldo','CRISTALLYN','C','Filipino','02','TANGUILE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(141,'',0,'AMILAZAN','WENGIELEEN MAE','P','Filipino','123','TANGUILE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(142,'',0,'telan','coney','t','Filipino','123','DURIAN','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(143,'',0,'VEROSIL','GOLIVER','R','Filipino','123','MULAWIN','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(144,'',0,'rupinta','eddie','b','Filipino','65','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-25'),(145,'',0,'PANGANIBAN','jefrey ','b','Filipino','123','DUHAT ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-28'),(146,'',0,'rivera','erica ','b','Filipino','446','casoy','East Modern Site','Bagiuo City','Financial Transaction','2025-04-28'),(147,'',0,'CAMACAM','julieta ','s','Filipino','784','SITO PATA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-28'),(148,'',0,'CALMA','LEAH','C','Filipino','123','SAMPALOC ST','East Modern Site','Bagiuo City','Financial Transaction','2025-04-28'),(149,'',0,'eugenio','betty','b','Filipino','123','MANGGA','East Modern Site','Bagiuo City','Financial Transaction','2025-04-29'),(150,'',0,'gamit','jesusa','b','Filipino','123','PATA STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-04-29'),(151,'77820003636',85,'Molina','Raynaldo','Camoye','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','Job/Employment','2025-05-01'),(152,'57576261725',84,'Medina','Jan Clifford','Calad','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','Job/Employment','2025-05-02'),(153,'',0,'DACQUIL','JHULIANA','M','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-05-02'),(154,'',0,'SABALO','ELENITA ','R','Filipino','123','lauan street','East Modern Site','Bagiuo City','Financial Transaction','2025-05-06'),(155,'',0,'FELICIANO','ERNESTO ','Y','Filipino','4','mahogany','East Modern Site','Bagiuo City','Financial Transaction','2025-05-06'),(156,'',0,'castillo','elizabeth','r','Filipino','158','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-05-06'),(157,'',0,'dela cruz','perlita','c','Filipino','39','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Financial Transaction','2025-05-15'),(158,'',0,'CALLORINA','NORMA','T','Filipino','123','MOLAVE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(159,'',0,'BAQUIRAN','RONNIE','B','Filipino','123','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(160,'',0,'catalon','EVANGELINE','G','Filipino','9','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(161,'',0,'GOMEZ','TWINKLE MAE','L','Filipino','9','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(162,'',0,'GOMEZ','TWINKLE MAE','L','Filipino','9','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(163,'',0,'SARILE','LUZVIMIN','S','Filipino','126','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(164,'',0,'BERMEJO','WINNIE','O','Filipino','123','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(165,'',0,'GANNABAN','RAMON','U','Filipino','171','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(166,'',0,'TOLENTINO','FRANCISA','G','Filipino','123','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(167,'',0,'GOMEZ','EMILYN','L','Filipino','123','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(168,'',0,'PACIS','MARICEL ','G','Filipino','9','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(169,'',0,'PACIS','MARICEL ','G','Filipino','9','MACOPA ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(170,'',0,'tapiador','MARY JOY','N','Filipino','208','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(171,'',0,'LOPEZ','ARCELIE','D','Filipino','123','APITONG ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(172,'',0,'MATEO','PRINCESS LYNN','M','Filipino','172','MOLAVE ST','East Modern Site','Bagiuo City','Financial Transaction','2025-05-19'),(173,'',0,'laguisma','IRENE','L','Filipino','123','BANABA','East Modern Site','Bagiuo City','Job/Employment','2025-05-19'),(174,'',0,'laguisma','IRENE','L','Filipino','123','BANABA','East Modern Site','Bagiuo City','Job/Employment','2025-05-19'),(175,'',0,'CENTERNO','DANILO JT','E','Filipino','123','PATA STREET','East Modern Site','Bagiuo City','Other important transactions.','2025-05-20'),(176,'',0,'AGUSTIN','ROBEN','S','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','Financial Transaction','2025-06-17'),(177,'',0,'BERMEJO','WHENDY ROSE','O','Filipino','123','BANABA','East Modern Site','Bagiuo City','Financial Transaction','2025-06-27'),(178,'',0,'BALLAD','BALLAD','O','Filipino','43','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-06-27'),(179,'',0,'FELICIANO','FELISA ','Y','Filipino','2','LUKBAN ST','East Modern Site','Bagiuo City','Financial Transaction','2025-06-27'),(180,'',0,'TUMANENG','PRECIOUS SIRACH JANE','E','Filipino','123','PROVINCIAL ROAD','East Modern Site','Bagiuo City','Scholarship','2025-08-18'),(181,'',0,'JOSON','CRISTIAN DAVE','E','Filipino','176','CASOY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-08-18'),(182,'',0,'ARANZASO','IRENE','ANCHETA','Filipino','123','MAGSAYSAY ST','East Modern Site','Bagiuo City','Financial Transaction','2025-08-18'),(183,'',0,'MADDUMA','JEROMIE','GULLA','Filipino','340','Lansones st','East Modern Site','Bagiuo City','Financial Transaction','2025-08-26'),(184,'',0,'NICOLAS','MARK','E','Filipino','7','TINDALO','East Modern Site','Bagiuo City','Financial Transaction','2025-08-28'),(185,'',0,'molina','ginaeva','a','Filipino','123','tindalo','East Modern Site','Bagiuo City','Financial Transaction','2025-09-12'),(186,'87727306412',94,'CRUZ','DANILO','SAMONTE','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Job/Employment','2025-12-08'),(187,'94482809275',94,'CRUZ','DANILO','SAMONTE','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','Business Establishment','2025-12-08');

/*Table structure for table `tbl_officials` */

DROP TABLE IF EXISTS `tbl_officials`;

CREATE TABLE `tbl_officials` (
  `id_official` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `termstart` date NOT NULL,
  `termend` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  PRIMARY KEY (`id_official`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_officials` */

insert  into `tbl_officials`(`id_official`,`name`,`position`,`termstart`,`termend`,`status`,`avatar`) values (1,'        Hon. Quintin J. Romero','Punong Barangay ','2023-10-30','2026-06-28','Active',''),(2,'        Hon. Jhon Rod Guieb','Sk Chairperson','2023-10-30','2023-10-30','Not Active',''),(3,'  Thea Perez Sodsod','Barangay Secretary','2017-06-06','2027-09-30','Active',''),(4,'Louresa R. Importa','Barangay Treasurer','2023-06-15','2025-03-03','',''),(5,'  Jennifer D. Cabauatan','Barangay Clerk','2024-08-01','2025-01-08','',''),(6,'Hon. Al-robert M. Villaluz','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(7,'Hon. Virginia D. Garcia','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(8,'Hon. Baltazar T. Andres','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(9,'Hon. Heherson V. Antonio','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(10,'Hon. Alfredo P. Apelo','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(11,'Hon. Benita A. Mamauag','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(12,'Hon. Richard B. Perez','Sangguniang Barangay Member','2023-10-30','2027-01-01','',''),(13,'Hon. Teodoro S. Galot','IPMR','2023-10-30','2027-01-01','','');

/*Table structure for table `tbl_rescert` */

DROP TABLE IF EXISTS `tbl_rescert`;

CREATE TABLE `tbl_rescert` (
  `id_rescert` int(11) NOT NULL AUTO_INCREMENT,
  `cert_no` varchar(255) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rescert`)
) ENGINE=InnoDB AUTO_INCREMENT=111168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_rescert` */

insert  into `tbl_rescert`(`id_rescert`,`cert_no`,`id_resident`,`lname`,`fname`,`mi`,`age`,`nationality`,`houseno`,`street`,`brgy`,`municipal`,`date`,`purpose`) values (111138,'',0,'dela cruz','van yuske','C','21','Filipino','595','lauan','East Modern Site','Bagiuo City','2025-03-06','Certify that you are living in a certain barangay'),(111139,'',0,'ESCUADRO ','NELIA ','R','58','Filipino','123','PRO','East Modern Site','Bagiuo City','2025-03-10','Other important transactions.'),(111140,'81053589608',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-03-13','Financial Transaction'),(111141,'30949889199',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-03-11','Job/Employment'),(111142,'',0,'JORDAN ALBERT','CINENSE','GUILLERMO','43','Filipino','13','Lansones st','East Modern Site','Bagiuo City','2025-03-11','Certify that you are living in a certain barangay'),(111143,'',0,'GABRIEL ','EVELYN','T','64','Filipino','001','MOLAVE ST','East Modern Site','Bagiuo City','2025-03-13','Certify that you are living in a certain barangay'),(111144,'24769068710',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-03-14','Business Establishment'),(111145,'',0,'APELO','JESSICA ','V','35','Filipino','866','KAMATSILI','East Modern Site','Bagiuo City','2025-03-14','Financial Transaction'),(111146,'',0,'BAGUNU','ROEL','A','49','Filipino','151','TRAMO STREET','East Modern Site','Bagiuo City','2025-03-14','Financial Transaction'),(111147,'',0,'PAS','SHERALYN','PARALLAG','46','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','2025-03-18','Financial Transaction'),(111148,'',0,'acosta','angel','c','18','Filipino','123','MANGGA','East Modern Site','Bagiuo City','2025-03-18','Certify that you are living in a certain barangay'),(111149,'',0,'HADUCA ','JULIANA PRECIOUS','B','17','Filipino','123','TRAMO STREET','East Modern Site','Bagiuo City','2025-03-18','Certify that you are living in a certain barangay'),(111150,'95696486257',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-04-03','Financial Transaction'),(111151,'',0,'CAYETANO','NIKKO','D','35','Filipino','123','BANABA','East Modern Site','Bagiuo City','2025-04-22','Other important transactions.'),(111152,'',0,'CARLOS','NORMA','D','85','Filipino','16','MAGSAYSAY ST','East Modern Site','Bagiuo City','2025-04-02','Financial Transaction'),(111153,'80573474219',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-04-04','Business Establishment'),(111154,'',0,'barroga','carlo','t','24','Filipino','123','NARRA','East Modern Site','Bagiuo City','2025-04-21','Other important transactions.'),(111155,'',0,'DUQUE','OLIVER','P','30','Filipino','123','DAVID','East Modern Site','Bagiuo City','2025-04-21','Certify that you are living in a certain barangay'),(111156,'',0,'cariaga','magdalena','m','74','Filipino','159','CAMACAM','East Modern Site','Bagiuo City','2025-04-29','Financial Transaction'),(111157,'92256482110',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-05-01','Job/Employment'),(111158,'61290356606',84,'Medina','Jan Clifford','Calad','32','Filipino','13','Purok 1 Laurel St','East Modern Site','Bagiuo City','2025-05-02','Job/Employment'),(111159,'',0,'TUMIBAY','JOSHUA','O','24','Filipino','123','MACOPA','East Modern Site','Bagiuo City','2025-05-19','Certify that you are living in a certain barangay'),(111160,'',0,'NAVARRO','GERALDINE','R','22','Filipino','649','MACOPA','East Modern Site','Bagiuo City','2025-05-19','Job/Employment'),(111161,'',0,'NAVARRO','FLERICA','R','24','Filipino','649','MACOPA','East Modern Site','Bagiuo City','2025-05-19','Certify that you are living in a certain barangay'),(111162,'86707904914',94,'CRUZ','DANILO','SAMONTE','64','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','2025-05-30','Job/Employment'),(111163,'27675306265',94,'CRUZ','DANILO','SAMONTE','64','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','2025-08-13','Job/Employment'),(111164,'44691052810',94,'CRUZ','DANILO','SAMONTE','64','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','2025-08-13','Job/Employment'),(111165,'97771673033',94,'CRUZ','DANILO','SAMONTE','64','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','2025-08-13','Business Establishment'),(111166,'13943482806',94,'CRUZ','DANILO','SAMONTE','64','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','2025-12-08','Job/Employment'),(111167,'99730553528',94,'CRUZ','DANILO','SAMONTE','64','Filipino','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City','2025-12-08','Job/Employment');

/*Table structure for table `tbl_resident` */

DROP TABLE IF EXISTS `tbl_resident`;

CREATE TABLE `tbl_resident` (
  `id_resident` int(11) NOT NULL AUTO_INCREMENT,
  `valid1` varchar(128) DEFAULT '',
  `valid2` varchar(128) DEFAULT '',
  `control_no` varchar(128) DEFAULT '',
  `request_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `res_photo` mediumblob DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `bdate` date NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `family_role` varchar(255) DEFAULT NULL,
  `head_of_family` varchar(10) NOT NULL DEFAULT 'No',
  `voter` varchar(255) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `indigent` varchar(255) DEFAULT NULL,
  `single_parent` varchar(255) DEFAULT NULL,
  `malnourished` varchar(255) DEFAULT NULL,
  `four_ps` varchar(255) DEFAULT NULL,
  `vaccinated` varchar(255) DEFAULT NULL,
  `pregnancy` varchar(255) DEFAULT NULL,
  `domesticated_animals` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `ip_community` varchar(255) DEFAULT NULL,
  `out_of_school_youth` enum('Yes','No') DEFAULT NULL,
  `lgbtq` enum('Yes','No') DEFAULT NULL,
  `senior_citizen` varchar(50) DEFAULT NULL,
  `psa_registered` varchar(255) DEFAULT NULL,
  `addedby` varchar(255) DEFAULT NULL,
  `s_of_income` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `psa_holder` varchar(255) DEFAULT NULL,
  `psa_correction` varchar(255) DEFAULT NULL,
  `ntnlId` varchar(255) DEFAULT NULL,
  `trees` varchar(255) DEFAULT NULL,
  `farmer` varchar(255) DEFAULT NULL,
  `vegetables` varchar(255) DEFAULT NULL,
  `id1` varchar(255) DEFAULT NULL,
  `id2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_resident`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_resident` */

insert  into `tbl_resident`(`id_resident`,`valid1`,`valid2`,`control_no`,`request_status`,`res_photo`,`email`,`password`,`lname`,`fname`,`mi`,`age`,`sex`,`status`,`houseno`,`street`,`brgy`,`municipal`,`address`,`contact`,`bdate`,`bplace`,`nationality`,`family_role`,`head_of_family`,`voter`,`pwd`,`indigent`,`single_parent`,`malnourished`,`four_ps`,`vaccinated`,`pregnancy`,`domesticated_animals`,`role`,`ip_community`,`out_of_school_youth`,`lgbtq`,`senior_citizen`,`psa_registered`,`addedby`,`s_of_income`,`occupation`,`psa_holder`,`psa_correction`,`ntnlId`,`trees`,`farmer`,`vegetables`,`id1`,`id2`) values (94,'','','','approved',NULL,'darren_resident@gmail.com','971ef6d73b20a633967633686c8e124a','CRUZ','DANILO','SAMONTE',64,'Male','Married','374','P3 MAGSAYSAY AVENUE','East Modern Site','Bagiuo City',NULL,'09169107405','1961-01-11','SANTIAGO ISABELA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','Yes',NULL,'1','N/A','N/A','','No','No','No','No','No',NULL,NULL),(95,'','','','approved',NULL,'deshdimple.villaluz@gmail.com','25f9e794323b453885f5181f1b624d0b','Villaluz','Lourdes Dimple','Del Rosario',23,'Female','Single','7','P 4B Durian St.','East Modern Site','Bagiuo City',NULL,'09655396873','2001-12-23','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','No','resident','IBANAG','Yes','No','No',NULL,'1','N/A','N/A','','No','No','No','No','No',NULL,NULL),(96,'','','','approved',NULL,'lizamatterig123@gmail.com','94e70f7f63075a83d8a2eb75252e58cd','Matterig','Flordeliza ','Lagutao ',54,'Female','Widowed','256','Dau','East Modern Site','Bagiuo City',NULL,'09565613128','1971-02-09','Victory Sur, Santiago Isabela','Filipino',NULL,'No','Yes','No','No','Yes','No','No',NULL,'No','Dogs','resident','IBANAG','No','No','No',NULL,NULL,'Farming ','','Yes','No','5716075420846745','No','Rice and corn land','Eggplant,okra,Pole sitaw, kalabasa tomatoes ',NULL,NULL),(98,'','','','approved',NULL,'edjaber2000@gmail.com','08f717ed5616bdb26e7e8657d099f6bd','Bermudez','Edgar','J',46,'Male','Married','10','Purok 1 SICAT ROAD','East Modern Site','Bagiuo City',NULL,'09068401712','1978-11-08','Santiago','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'Ambulant Vendor','Ambulant Vendor','Yes','No','No','No','No','No',NULL,NULL),(99,'','','','approved',NULL,'edjaber2000@gmail.com','08f717ed5616bdb26e7e8657d099f6bd','Bermudez','Edgar','J',0,'Male','Married','10','Purok 1 SICAT ROAD','East Modern Site','Bagiuo City',NULL,'09068401712','1978-11-08','Santiago','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'Ambulant Vendor','Ambulant Vendor','Yes','No','No','No','No','No',NULL,NULL),(100,'','','','approved',NULL,'edjaber2000@gmail.com','08f717ed5616bdb26e7e8657d099f6bd','Bermudez','Edgar','J',0,'Male','Married','10','Purok 1 SICAT ROAD','East Modern Site','Bagiuo City',NULL,'09068401712','1978-11-08','Santiago','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'Ambulant Vendor','Ambulant Vendor','Yes','No','No','No','No','No',NULL,NULL),(101,'','','','approved',NULL,'akotala0807@gmail.com','a712566296eca1212da7f5075915d348','Pabiling','marvilyn','cayapan',28,'Female','Live-in','14','Macopa st. Purok4b','East Modern Site','Bagiuo City',NULL,'0913776105','1996-06-25','Ramon','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'Business','buy n sell','Yes','No','No','No','No','No',NULL,NULL),(102,'','','','approved',NULL,'jhabaquiran19@gmail.com','21c76970399a57b07239fb6f167072fe','Baquiran','Janelle Faith','Guiang',24,'Female','Single','N/A','5','East Modern Site','Bagiuo City',NULL,'+6396925627','2000-11-19','San Manuel, Isabela','Filipino',NULL,'No','Yes','No','No','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'None','Chat Support','Yes','No','4619-6830-4270-5401','No','No','No',NULL,NULL),(103,'','','','approved',NULL,'maylorenzo450@gmail.com','dc37696573edbdb9b96c6e9ba41c05d5','Lorenzo','May Rose','Montano',38,'Female','Married','914','Sitio Pata, Purok 5','East Modern Site','Bagiuo City',NULL,'09266209429','1987-05-16','Cordon, Isabela ','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'Farming','Housewife','Yes','No','2064-9821-8361-0317','No','','',NULL,NULL),(104,'','','','approved',NULL,'benjiepalay820@gmail.com','5963eb1f45cedbd6826d8a2261943797','PALAY','BENJIE','RAYMUNDO ',31,'Male','Single','02','Camatsile','East Modern Site','Bagiuo City',NULL,'09634667951','1993-08-20','Rosario Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','Yes','No',NULL,NULL,'Salary','Sales consultant ','Yes','No','','','No','No',NULL,NULL),(105,'','','','approved',NULL,'jancliffordmedina@gmail.com','0192023a7bbd73250516f069df18b500','Medina','Jan Clifford','C',32,'Male','Married','21','1','East Modern Site','Bagiuo City',NULL,'09271429097','1993-01-24','Isabela','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','','resident','IFUGAO','No','No','No',NULL,'1','Freelance','Photographer','Yes','','','','','',NULL,NULL),(106,'','','','approved',NULL,'alfredoapelo@gmail.com','de0c9eca97d7685621fd59d856458415','APELO','ALFREDO','Prieto',71,'Male','Married','248','Purok 2 camatchili st','East Modern Site','Bagiuo City',NULL,'09989643066','1953-12-22','Bagiuo City','Filipino',NULL,'No','Yes','No','No','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','',NULL,NULL),(107,'','','','approved',NULL,'deshdimple.villaluz@gmail.com','de0c9eca97d7685621fd59d856458415','Villaluz','LOURDES DIMPLE','Del Rosario',23,'Male','Single','7','Purok 4b durian street','East Modern Site','Bagiuo City',NULL,'09655396873','2001-12-23','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','','resident','IBANAG','No','No','No',NULL,'1','','','','No','No','','No','No',NULL,NULL),(108,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','Aliangan','Sheila Mae','Alcaraz ',18,'Female','Single','15','Dau st or Camatsili st. P.2','East Modern Site','Bagiuo City',NULL,'09283337924','2006-09-13','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','','resident','N/A','Yes','No','No',NULL,'1','','','','No','No','No','','No',NULL,NULL),(109,'','','','approved',NULL,'shielamaealcarazaliangan@gmail.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','ALIANGAN','ACE MARK ','TARIGA',38,'Male','Married','15','Dau or Camatsili St P.2','East Modern Site','Bagiuo City',NULL,'09972916690','1987-06-21','SAN AGUSTIN ISABELA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','Yes','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(110,'','','','approved',NULL,'Anabeecristin@yahoo.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','CRISTIN','ANALYN ','VILLANUEVA',42,'Female','Married','2934','purok 2','East Modern Site','Bagiuo City',NULL,'09169616887','1982-07-01','cagayan','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(111,'','','','approved',NULL,'Anabee@yahoo.com','0192023a7bbd73250516f069df18b500','cristin','ambee','domingo',44,'Male','Married','2934','P-2 narra street','East Modern Site','Bagiuo City',NULL,'09067960257','1980-09-24','aglipay, Quirino','Filipino',NULL,'No','Yes','Yes','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(112,'','','','approved',NULL,'alicecastrocariaga@gmail.com','259a53a44b22c3854987a1ccc5cfce64','cariaga','alice','castro',40,'Female','Married','805','purok 5 East Modern Site','East Modern Site','Bagiuo City',NULL,'09509006152','1985-04-06','san isidro, isabela','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','Yes','No','No',NULL,'1','','','','No','No','','No','No',NULL,NULL),(113,'','','','approved',NULL,'zenypascual30@gmail.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','pascual','zenaida','viloria',44,'Female','Married','1','purok 5 East Modern Site','East Modern Site','Bagiuo City',NULL,'09755554505','1980-08-31','cordon, isabela','Filipino',NULL,'No','Yes','Yes','Yes','No','No','No',NULL,'No','','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(114,'','','','approved',NULL,'Rowenamateodomingo@yahoo.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','domingo','rowena','donato',46,'Female','Married','54','purok 1 East Modern Site','East Modern Site','Bagiuo City',NULL,'09163261914','1979-05-14','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(115,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','cariaga','julie','marucot',51,'Male','Married','805','purok 5 East Modern Site','East Modern Site','Bagiuo City',NULL,'09474735585','1973-07-17','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(116,'','','','approved',NULL,'Velascomher94@gmail.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','VIERNES','primero','toledo',63,'Male','Single','10','Purok 2 sampaloc','East Modern Site','Bagiuo City',NULL,'09166020668','1961-09-01','Bagiuo City','Filipino',NULL,'No','Yes','Yes','Yes','No','No','No',NULL,'No','','resident','N/A','No','No','Yes',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(117,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','ortiz','martee','san jose',48,'Female','Married','2','purok 3 apitong','East Modern Site','Bagiuo City',NULL,'09358106885','1976-10-15','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(118,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','SIMON ','MARY ROSE','BALLESTEROS',34,'Female','Single','325',' 3 APITONG STREET','East Modern Site','Bagiuo City',NULL,'09975725838','1990-07-05','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(119,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','MORALES','BIENVENIDO','MARIANO',60,'Male','Married','123','Purok 1 moLAVE','East Modern Site','Bagiuo City',NULL,'09993397160','1965-06-21','JONES,ISABELA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(120,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','DALUPANG','DOMETILLA','VIERNES',83,'Female','Widowed','500','PUROK 4A MANGGA','East Modern Site','Bagiuo City',NULL,'09357679527','1942-05-07','CABAGAN, ISABELA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','DOG','resident','IBANAG','No','No','Yes',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(121,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','DOMINGO','JULIO','',53,'Male','Married','44','PUROK 4A MAGSAYSAY','East Modern Site','Bagiuo City',NULL,'09268162650','1972-03-09','ANGADANAN ISABELA','Filipino',NULL,'No','Yes','Yes','Yes','No','No','No',NULL,'No','','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(122,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','DELA CRUZ','EDUARDO','SAMONTE',58,'Male','Married','374','PUROK 3 MAGSAYSAY','East Modern Site','Bagiuo City',NULL,'','1966-09-15','Bagiuo City','Filipino',NULL,'No','Yes','No','No','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(123,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','CADENA','JONALYN','BALICASAN',43,'Female','Married','35','PUROK 3 MAGSAYSAY','East Modern Site','Bagiuo City',NULL,'09553085279','1982-04-17','SAN AGUSTIN ISABELA','Filipino',NULL,'No','Yes','Yes','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(124,'','','','approved',NULL,'ropentadominador@gmail.com','ea7490e32b8148aeefb305a29a1e1d66','ROPENTA','DOMINADOR','BERNALES',38,'Male','Married','35','MAGSAYSAY ST','East Modern Site','Bagiuo City',NULL,'09657153698','1987-02-15','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(125,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','RUPINTA','MARTINA ','BERNALES',75,'Female','Widowed','35','MAGSAYSAY ST','East Modern Site','Bagiuo City',NULL,'NA','1949-10-28','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','No','resident','N/A','No','No','Yes',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(126,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','ALMOREDA','MELCHOR','ORLANDA',50,'Male','Married','123','PUROK 3 LANSONES','East Modern Site','Bagiuo City',NULL,'09750351300','1975-01-06','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','SELF EMPLOYED','DRIVER','','No','No','No','No','No',NULL,NULL),(127,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','AGUSTIN','JUANITO','BAYUBAY',61,'Male','Widowed','123','ABAUAG ST','East Modern Site','Bagiuo City',NULL,'955-2776103','1963-07-22','BAYOMBONG, NUEVA VIZCAYA','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','CAT','resident','GADDANG','No','No','No',NULL,'1','','DRIVER','','No','No','No','No','No',NULL,NULL),(128,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','PADDANAN','ERIC','GOMEZ',49,'Male','Married','225','PUROK 2 BANABA','East Modern Site','Bagiuo City',NULL,'\'0909385696','1975-11-14','TUMAUNI, Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','CAT','resident','IBANAG','No','No','No',NULL,'1','','VENDOR','','No','No','No','No','No',NULL,NULL),(129,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','BALDOZ','JOSEPHINE ','T',65,'Female','Married','123','BUKOHAN','East Modern Site','Bagiuo City',NULL,'NA','1959-08-22','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','YOGAD','No','No','No',NULL,'1','UNEMPLOYED','','','No','No','No','No','No',NULL,NULL),(130,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','PADILLA','DIANA MAY ','ORTEGA',35,'Female','Married','123','BANABA','East Modern Site','Bagiuo City',NULL,'','1990-02-17','ECHAGUE, ISABELA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','YOGAD','No','No','No',NULL,'1','','','','No','No','No','No','No',NULL,NULL),(131,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','tolentino','jeanette','b',44,'Female','Married','na','bukohan','East Modern Site','Bagiuo City',NULL,'NA','1980-07-08','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','Yes','No','No',NULL,'No','No','resident','YOGAD','No','No','No',NULL,'1','UNEMPLOYED','','','No','No','No','No','No',NULL,NULL),(132,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','TOLENTINO','LEONORA ','B',68,'Female','Married','na','bukohan','East Modern Site','Bagiuo City',NULL,'NA','1956-11-24','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','UNEMPLOYED','','','No','No','No','No','No',NULL,NULL),(133,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','AGUSTIN','CARLO','MENDOZA',30,'Male','Married','NA','PUROK 2 ABAUAG ','East Modern Site','Bagiuo City',NULL,'09358105232','1994-11-13','LUNA ISABELA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','SELF EMPLOYED','','','No','No','No','No','No',NULL,NULL),(134,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','BARTOLOME','JOLAN ','CORPUZ',47,'Male','Married','NA','BUKOHAN','East Modern Site','Bagiuo City',NULL,'NA','1977-10-05','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','SELF EMPLOYED','','','No','No','No','No','No',NULL,NULL),(135,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','DELA CRUZ','SHERRYLOU','MENDOZA',44,'Female','Married','16B','PUROK 2 TRAMO','East Modern Site','Bagiuo City',NULL,'09970675422','1981-02-16','METRO MANILA','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','','resident','N/A','No','No','No',NULL,'1','SELF EMPLOYED','','','No','No','No','No','No',NULL,NULL),(136,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','PASCUA','HERMINIO','LAZO',65,'Male','Married','NA','PUROK 2 ABAUAG','East Modern Site','Bagiuo City',NULL,'NA','1960-05-27','ECHAGUE, ISABELA','Filipino',NULL,'No','Yes','No','No','No','No','No',NULL,'No','2 DOGS','resident','N/A','No','No','Yes',NULL,'1','SELF EMPLOYED','DRIVER','','No','No','No','No','No',NULL,NULL),(137,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','ESTEBAN ','EDGARDO','CARDOO',50,'Male','Married','177','PUROK2 TRAMO','East Modern Site','Bagiuo City',NULL,'09532833607','1974-10-19','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','','resident','N/A','Yes','No','No',NULL,'1','SELF EMPLOYED','STORE OWNER','','No','No','No','No','No',NULL,NULL),(138,'','','','approved',NULL,'Kylievelasco@gmail.com','e64b78fc3bc91bcbc7dc232ba8ec59e0','RECTO','KYLIE','VELASCO',23,'Female','Single','29','PUROK2 ','East Modern Site','Bagiuo City',NULL,'09352723115','2002-03-12','QUEZON CITY','Filipino',NULL,'No','Yes','No','No','No','No','No',NULL,'No','','resident','N/A','No','No','No',NULL,'1','STUDENT','','','No','No','coconut','No','No',NULL,NULL),(139,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','MATIAS','MERY JOY','DELA PAZ',49,'Female','Single','NA','PUROK 2','East Modern Site','Bagiuo City',NULL,'09353372807','1975-08-18','Bagiuo City','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','UNEMPLOYED','','','No','No','No','No','No',NULL,NULL),(140,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','matias','merry joy','d',49,'Female','Single','na','purok 2 East Modern Site','East Modern Site','Bagiuo City',NULL,'09353372807','1975-08-18','stgo city','Filipino',NULL,'No','Yes','No','No','Yes','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'1','UNEMPLOYED','','','No','No','No','No','No',NULL,NULL),(141,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','MATIAS','JOSE ROMMEL ','D',56,'Male','Single','NA','PUROK 2 ABAUAG','East Modern Site','Bagiuo City',NULL,'\'0953440620','1968-09-09','CAUAYAN CITY','Filipino',NULL,'No','Yes','No','No','No','No','No',NULL,'No','No','resident','N/A','No','No','No',NULL,'','','','','No','No','No','No','No',NULL,NULL),(142,'','','','approved',NULL,'juanEast Modern Site@gmail.com','de0c9eca97d7685621fd59d856458415','MAGDALENA ','CARIAGA','MENDAROS',75,'Female','Widowed','159','PUROK 2 CAMACAM','East Modern Site','Bagiuo City',NULL,'09066526231','1950-05-15','PANGASINAN','Filipino',NULL,'No','Yes','No','Yes','No','No','No',NULL,'No','No','resident','N/A','Yes','No','Yes',NULL,'','UNEMPLOYED','','','No','No','No','No','No',NULL,NULL),(143,'','','','approved',NULL,'jomariebalda@gmail.com','df55d7f31d2bcfa6239b67302bfa14ce','Balda','Jomarie','Rillones',21,'Male','Single','N/A','3','East Modern Site','Bagiuo City',NULL,'09653833962','2004-09-27','Santiago','Filipino',NULL,'No','Yes','No','Yes','No','Yes','No',NULL,'No','No','resident','N/A','No','No','No',NULL,NULL,'','','No','No','No','No','No','No',NULL,NULL),(147,'','','','approved',NULL,'qwerty@gmail.com','482c811da5d5b4bc6d497ffa98491e38','qwerty','qwerty','q',0,'Male','Single','123','qwert','East Modern Site','Bagiuo City',NULL,'09566795363','2025-12-07','qwerty','Filipino',NULL,'Yes','No','No','No','No','No','No',NULL,'No','No','resident','IFUGAO','No','No','No',NULL,NULL,'qwerty','qwerty','No','No','No','No','No','No',NULL,NULL),(148,'','','','approved',NULL,'asdf@gmail.com','482c811da5d5b4bc6d497ffa98491e38','asdf','asdf','a',0,'Male','Single','1234','asdf','East Modern Site','Bagiuo City',NULL,'09566795364','2025-12-07','asdf','Filipino',NULL,'Yes','No','No','No','No','No','No',NULL,'No','No','resident','IFUGAO','No','No','No',NULL,'','asdf','asdf','No','No','No','No','No','No',NULL,NULL),(149,'','','','pending',NULL,'zxcv@gmail.com','482c811da5d5b4bc6d497ffa98491e38','zxcv','zxcv','z',0,'Male','Single','123','zxcv','East Modern Site','Bagiuo City',NULL,'09566795361','2025-12-08','zxcv','Filipino',NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'zxcv','zxcv','No','No','No','No','No','No','ID1_6936e737889a0.png','ID2_6936e73788a36.png'),(150,'','','','pending',NULL,'yuioop@gmail.com','482c811da5d5b4bc6d497ffa98491e38','yuiop','yuiop','y',0,'Male','Single','1234','yuiop','East Modern Site','Bagiuo City',NULL,'09566785466','2025-12-08','yuiop','Filipino',NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'yuiop','yuiop','No','No','No','No','No','No','ID1_6936e82e44ecb.png','ID2_6936e82e44f80.png'),(151,'','','','pending',NULL,'ghjkl@gmail.com','482c811da5d5b4bc6d497ffa98491e38','ghjkl','ghjkl','ghjkl',0,'Male','Single','123','ghjkl','East Modern Site','Bagiuo City',NULL,'0967795467','2025-12-08','ghjkl','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'ghjkl','ghjkl','No','No','No','No','No','No','ID1_6936e8b7dbe18.png','ID2_6936e8b7dbec1.png'),(152,'','','','pending',NULL,'vbnm@gmail.com','482c811da5d5b4bc6d497ffa98491e38','vbnm','vbnm','v',0,'Male','Single','1234','vbnm','East Modern Site','Bagiuo City',NULL,'09566795368','2025-12-08','vbnm','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'vbnm','vbnm','No','No','No','No','No','No','ID1_6936e95c01002.png','ID2_6936e95c0109b.png'),(153,'','','CN-0001','pending',NULL,'xixazyr@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Alana','Nita Mullins','Incididunt quos sint',40,'Male','Married','Facilis laboris dolo','Aut a veniam ipsa ','East Modern Site','Bagiuo City',NULL,'+1 (393) 117-4358','1985-09-05','Ad occaecat cum volu','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'Cillum provident ni','Adipisicing qui exer','No','No','',NULL,'No','No','ID1_696274f20fe4f.jpeg','ID2_696274f2101b7.jpeg'),(154,'','','CN-0002','pending',NULL,'qocypokun@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','asdf','Hayley Noble','Amet Nam pariatur ',19,'Male','Widowed','Possimus error comm','Quod exercitationem ','East Modern Site','Bagiuo City',NULL,'+1 (374) 214-7228','2006-03-18','Veniam eiusmod aute','Filipino',NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Esse asperiores amet','Ut vero itaque sapie','No','','',NULL,NULL,'No','ID1_696277de3ab26.jpeg','ID2_696277de3ad7f.jpeg'),(155,'','','CN-0003','pending',NULL,'peba@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Ferdinand','Violet Oneill','Aut itaque magnam ir',15,'Male','Widowed','Quis sint dolore qui','Error occaecat cillu','East Modern Site','Bagiuo City',NULL,'+1 (479) 879-7708','2010-02-28','Animi qui deleniti ','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Cupidatat dolore cum','Sunt ex et dolor ius','Yes','No','No','No','No',NULL,'ID1_696345ec6d40b.jpeg','ID2_696345ec6d73e.jpeg'),(156,'','','CN-0004','pending',NULL,'kukowewula@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Sacha','Quinlan Bright','Maiores nisi sunt d',11,'Male','Single','Est dolores odio pla','Laudantium maiores ','East Modern Site','Bagiuo City',NULL,'+1 (194) 491-6593','2014-04-10','Alias aut ipsam inci','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'Ullam magna omnis al','Rerum deserunt porro','Yes','No','','No',NULL,'No','ID1_6963461e53c64.jpeg','ID2_6963461e53e04.jpeg'),(157,'','','CN-0005','pending',NULL,'nexyro@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Valentine','Phoebe Guy','Minim libero enim re',43,'Male','Single','Molestiae voluptatum','Officiis voluptas ve','East Modern Site','Bagiuo City',NULL,'+1 (613) 882-2422','1982-04-06','Dolor laudantium nu','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Aperiam consectetur ','Reprehenderit adipi','No','No','','No',NULL,NULL,'ID1_696346346ee9f.jpeg','ID2_696346346f5b1.jpeg'),(158,'','','CN-0006','pending',NULL,'sovajicy@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Cameron','Ezekiel Weeks','Id occaecat fugiat ',47,'Male','Live-in','Dolorum similique fa','Cillum ut et nihil u','East Modern Site','Bagiuo City',NULL,'+1 (102) 754-9969','1978-05-07','Aute quibusdam est ','Filipino',NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Officia deleniti des','Labore rerum sed rep','Yes','No','No',NULL,NULL,'No','ID1_696346484c5fa.jpeg','ID2_696346484c978.jpeg'),(159,'','','CN-0007','pending',NULL,'sovajicy@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Cameron','Ezekiel Weeks','Id occaecat fugiat ',47,'Male','Live-in','Dolorum similique fa','Cillum ut et nihil u','East Modern Site','Bagiuo City',NULL,'+1 (102) 754-9969','1978-05-07','Aute quibusdam est ','Filipino',NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Officia deleniti des','Labore rerum sed rep','Yes','No','No',NULL,NULL,'No','ID1_696346d2c6789.jpeg','ID2_696346d2c6f14.jpeg'),(160,'','','CN-0008','pending',NULL,'kojadoqah@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Mayasdf','Guinevere Schroeder','Ipsa voluptatem ab',11,'Male','Single','Commodi corporis qui','Illo dolore labore e','East Modern Site','Bagiuo City',NULL,'+1 (744) 549-1336','2014-12-09','Laudantium officiis','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'Doloremque omnis dol','Asperiores ea perfer','No','','No',NULL,NULL,NULL,'ID1_696b955e37533.png','ID2_696b955e3815e.png'),(161,'','','CN-0009','pending',NULL,'bimywep@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Knox Walsh','Chava Owen','Dolore ut qui deseru',13,'Male','Widowed','Facilis magnam dolor','Animi quis quidem t','East Modern Site','Bagiuo City',NULL,'+1 (405) 744-8523','2012-12-31','Velit nulla do ipsum','Filipino',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Illo voluptate illo ','Dolor Nam nisi labor','No','','No','No',NULL,NULL,'ID1_696b991d9b7af.png','ID2_696b991d9b9de.gif'),(162,'','','CN-0010','pending',NULL,'totowonoqe@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Rafael Ferrell','Hadassah Durham','Blanditiis ad volupt',23,'Female','Widowed','Error quidem officia','Aperiam nobis qui ve','East Modern Site','Bagiuo City',NULL,'+1 (625) 967-3201','2002-02-01','Magna consequatur n','Filipino',NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','resident',NULL,NULL,NULL,NULL,NULL,NULL,'Eum quia ullam conse','Aut voluptatibus vol','No','No','','No','No','No','ID1_697d95ca6893e.jpg','ID2_697d95ca6b2a5.jpg'),(163,'','','CN-0011','pending',NULL,'fiha@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Camden Buckner','Aaron Molina','Dolor voluptas anim ',26,'Female','Live-in','Aspernatur eveniet ','Ea dolores debitis v','East Modern Site','Bagiuo City',NULL,'+1 (811) 856-8516','1999-07-19','Rerum deserunt volup','Filipino',NULL,'Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resident',NULL,NULL,NULL,NULL,NULL,NULL,'Optio dolor omnis n','Voluptate libero fug','No','','',NULL,'No',NULL,'ID1_697d9dfe79f5f.jpg','ID2_697d9dfe7a1bf.jpg'),(164,'','','CN-0012','pending',NULL,'faxyxat@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Clark Bradford','Inez Mayo','Commodo saepe enim c',15,'Female','Single','Et dolore sed ut ame','Illum sunt dolor qu','East Modern Site','Bagiuo City',NULL,'+1 (872) 871-3053','2010-09-11','Distinctio Tempore','Filipino',NULL,'No','No','No','Yes','Yes','Yes','No',NULL,'Yes','No','resident',NULL,'No','No','Yes',NULL,NULL,'Ducimus et fugit e','Quia tempore magnam','Yes','No','No',NULL,NULL,NULL,'ID1_697d9ef827d7a.jpg','ID2_697d9ef828086.jpg'),(165,'','','CN-0013','pending',NULL,'boxuhug@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Brynn Hull','Hakeem Davenport','Ducimus ea velit es',52,'Female','Single','Rerum doloribus et c','Officia animi simil','East Modern Site','Bagiuo City',NULL,'+1 (674) 874-5505','1973-08-13','Quis non ullam tempo','Filipino',NULL,'No','No','Yes','No','No','No','No',NULL,'No','No','resident',NULL,'No','Yes','Yes',NULL,NULL,'Ea rerum culpa cumq','Libero eligendi sint','No','','','No','No',NULL,'ID1_697da002b3b88.jpg','ID2_697da002b3f46.jpg'),(166,'','','CN-0014','pending',NULL,'faxyxat@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Clark Bradford','Inez Mayo','Commodo saepe enim c',15,'Female','Single','Et dolore sed ut ame','Illum sunt dolor qu','East Modern Site','Bagiuo City',NULL,'+1 (872) 871-3053','2010-09-11','Distinctio Tempore','Filipino',NULL,'No','No','No','Yes','Yes','Yes','No',NULL,'Yes','No','resident',NULL,'No','No','Yes',NULL,NULL,'Ducimus et fugit e','Quia tempore magnam','Yes','No','No',NULL,NULL,NULL,'ID1_697da140a36d1.jpg','ID2_697da140a3f92.jpg'),(167,'','','CN-0015','pending',NULL,'dyxo@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Kai Harvey','Benedict Cantrell','Adipisicing dolore c',53,'Female','Single','Eum amet amet quod','Nulla similique omni','East Modern Site','Bagiuo City',NULL,'+1 (505) 505-5884','1972-06-28','Perferendis aut nihi','Filipino',NULL,'No','No','Yes','Yes','No','Yes','Yes',NULL,'Yes','No','resident',NULL,'Yes','No','Yes',NULL,NULL,'Omnis in deleniti eu','Inventore doloremque','No','No','','No',NULL,NULL,'ID1_697efc6c91b6d.jpg','ID2_697efc6c9225b.jpg'),(168,NULL,NULL,'CN-0016','pending',NULL,'kumefefa@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Keefe Vasquez','Prescott Mckee','Eum laboriosam mini',48,'Male','Divorced','Suscipit est aut aut','Ex corporis officiis','East Modern Site','Bagiuo City',NULL,'+1 (244) 244-6607','1978-01-11','Rerum non doloremque','Filipino',NULL,'Yes','Yes','No','No','Yes','No','No',NULL,'No',NULL,'resident',NULL,'Yes','No','Yes',NULL,NULL,'Dolore dolorem sunt ','Dolorum dolor sed im','No','','No',NULL,'No',NULL,'ID1_69970e0d9e5ba.gif','ID2_69970e0d9eb67.gif'),(169,NULL,NULL,'CN-0017','pending',NULL,'kumefefa@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Keefe Vasquez','Prescott Mckee','Eum laboriosam mini',48,'Male','Divorced','Suscipit est aut aut','Ex corporis officiis','East Modern Site','Bagiuo City',NULL,'+1 (244) 244-6607','1978-01-11','Rerum non doloremque','Filipino',NULL,'Yes','Yes','No','No','Yes','No','No',NULL,'No',NULL,'resident',NULL,'Yes','No','Yes',NULL,NULL,'Dolore dolorem sunt ','Dolorum dolor sed im','No','','No',NULL,'No',NULL,'ID1_69970e358ba7c.gif','ID2_69970e359057e.gif'),(170,NULL,NULL,'CN-0018','pending',NULL,'kumefefa@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Keefe Vasquez','Prescott Mckee','Eum laboriosam mini',48,'Male','Divorced','Suscipit est aut aut','Ex corporis officiis','East Modern Site','Bagiuo City',NULL,'+1 (244) 244-6607','1978-01-11','Rerum non doloremque','Filipino',NULL,'Yes','Yes','No','No','Yes','No','No',NULL,'No',NULL,'resident',NULL,'Yes','No','Yes',NULL,NULL,'Dolore dolorem sunt ','Dolorum dolor sed im','No','','No',NULL,'No',NULL,'ID1_69970e4074965.gif','ID2_69970e4074b0f.gif'),(171,'Police Clearance ID','OFW ID (OWWA ID)','CN-0019','pending',NULL,'kynegujyxi@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Brock Palmer','Genevieve Jenkins','Ipsam enim incididun',22,'Female','Widowed','Sit anim excepteur v','Veritatis quis adipi','East Modern Site','Bagiuo City',NULL,'+1 (249) 999-7797','2004-01-17','Voluptatibus exercit','Filipino',NULL,'No','No','Yes','Yes','No','Yes','No',NULL,'Yes',NULL,'resident',NULL,'No','Yes','No',NULL,NULL,'Sit ut excepteur qui','Excepturi consequatu','Yes','','','No','No',NULL,'ID1_69970e54259e5.gif','ID2_69970e5425b9f.gif'),(172,'Voter’s ID / Voter’s Certification','Barangay ID','CN-0020','pending',NULL,'febu@mailinator.com','f3ed11bbdb94fd9ebdefbaf646ab94d3','Walter Wolfe','Christine Holden','Distinctio Nisi ut ',2,'Male','Single','Perferendis velit a','Inventore assumenda ','East Modern Site','Bagiuo City',NULL,'+1 (681) 315-1788','2023-07-07','Labore quia est quis','Filipino',NULL,'Yes','No','Yes','No','No','Yes','No',NULL,'No','No','resident',NULL,'Yes','No','No',NULL,NULL,'Quis deserunt maxime','Id dolorem sit iure ','No','','','No',NULL,'No','ID1_69970ef1d364d.gif','ID2_69970ef1d3d22.gif');

/*Table structure for table `tbl_services` */

DROP TABLE IF EXISTS `tbl_services`;

CREATE TABLE `tbl_services` (
  `id_services` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `fees` decimal(10,2) NOT NULL,
  `requires` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `image_service` text NOT NULL,
  PRIMARY KEY (`id_services`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_services` */

insert  into `tbl_services`(`id_services`,`title`,`description`,`fees`,`requires`,`status`,`image_service`) values (1,'BARANGAY CLEARANCE','','35.00','CEDULA','Active','uploads/clearance.png'),(4,'CERTIFICATE OF RESIDENCY','','35.00','CEDULA & BRGY CLEARANCE','Active','uploads/residency.png'),(5,'CERTIFICATE OF INDIGENCY','','35.00','CEDULA','Active','uploads/indigency.png'),(6,'BUSINESS CLEARANCE','','35.00','CEDULA','Active','uploads/busper.png');

/*Table structure for table `tbl_travelpermit` */

DROP TABLE IF EXISTS `tbl_travelpermit`;

CREATE TABLE `tbl_travelpermit` (
  `id_travel` int(11) NOT NULL AUTO_INCREMENT,
  `id_resident` int(11) NOT NULL,
  `prev_owner` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `municipal` varchar(50) NOT NULL,
  `buyers_name` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`id_travel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_travelpermit` */

insert  into `tbl_travelpermit`(`id_travel`,`id_resident`,`prev_owner`,`breed`,`gender`,`color`,`destination`,`date`,`brgy`,`municipal`,`buyers_name`,`purpose`) values (2,44,'Reyes Hannah Joy','Sheep','Female','Spotted','Farm','2024-03-25','Yuson','Guimba','Charmaine Joyce Coloma','Breeding');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `addedby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user` */

/*Table structure for table `tmp_add_family11a2c` */

DROP TABLE IF EXISTS `tmp_add_family11a2c`;

CREATE TABLE `tmp_add_family11a2c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family11a2c` */

/*Table structure for table `tmp_add_family123ee` */

DROP TABLE IF EXISTS `tmp_add_family123ee`;

CREATE TABLE `tmp_add_family123ee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family123ee` */

/*Table structure for table `tmp_add_family252aa` */

DROP TABLE IF EXISTS `tmp_add_family252aa`;

CREATE TABLE `tmp_add_family252aa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family252aa` */

/*Table structure for table `tmp_add_family2ac23` */

DROP TABLE IF EXISTS `tmp_add_family2ac23`;

CREATE TABLE `tmp_add_family2ac23` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family2ac23` */

/*Table structure for table `tmp_add_family2c52a` */

DROP TABLE IF EXISTS `tmp_add_family2c52a`;

CREATE TABLE `tmp_add_family2c52a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family2c52a` */

/*Table structure for table `tmp_add_family30256` */

DROP TABLE IF EXISTS `tmp_add_family30256`;

CREATE TABLE `tmp_add_family30256` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family30256` */

/*Table structure for table `tmp_add_family40d48` */

DROP TABLE IF EXISTS `tmp_add_family40d48`;

CREATE TABLE `tmp_add_family40d48` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family40d48` */

/*Table structure for table `tmp_add_family47949` */

DROP TABLE IF EXISTS `tmp_add_family47949`;

CREATE TABLE `tmp_add_family47949` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family47949` */

/*Table structure for table `tmp_add_family515ee` */

DROP TABLE IF EXISTS `tmp_add_family515ee`;

CREATE TABLE `tmp_add_family515ee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family515ee` */

/*Table structure for table `tmp_add_family55139` */

DROP TABLE IF EXISTS `tmp_add_family55139`;

CREATE TABLE `tmp_add_family55139` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family55139` */

/*Table structure for table `tmp_add_family62044` */

DROP TABLE IF EXISTS `tmp_add_family62044`;

CREATE TABLE `tmp_add_family62044` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family62044` */

/*Table structure for table `tmp_add_family73079` */

DROP TABLE IF EXISTS `tmp_add_family73079`;

CREATE TABLE `tmp_add_family73079` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family73079` */

/*Table structure for table `tmp_add_family74055` */

DROP TABLE IF EXISTS `tmp_add_family74055`;

CREATE TABLE `tmp_add_family74055` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family74055` */

/*Table structure for table `tmp_add_family88c11` */

DROP TABLE IF EXISTS `tmp_add_family88c11`;

CREATE TABLE `tmp_add_family88c11` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family88c11` */

/*Table structure for table `tmp_add_family8dcb7` */

DROP TABLE IF EXISTS `tmp_add_family8dcb7`;

CREATE TABLE `tmp_add_family8dcb7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family8dcb7` */

/*Table structure for table `tmp_add_family9927c` */

DROP TABLE IF EXISTS `tmp_add_family9927c`;

CREATE TABLE `tmp_add_family9927c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family9927c` */

/*Table structure for table `tmp_add_family9a553` */

DROP TABLE IF EXISTS `tmp_add_family9a553`;

CREATE TABLE `tmp_add_family9a553` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_family9a553` */

/*Table structure for table `tmp_add_familya6251` */

DROP TABLE IF EXISTS `tmp_add_familya6251`;

CREATE TABLE `tmp_add_familya6251` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familya6251` */

/*Table structure for table `tmp_add_familya767e` */

DROP TABLE IF EXISTS `tmp_add_familya767e`;

CREATE TABLE `tmp_add_familya767e` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familya767e` */

/*Table structure for table `tmp_add_familya7db0` */

DROP TABLE IF EXISTS `tmp_add_familya7db0`;

CREATE TABLE `tmp_add_familya7db0` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familya7db0` */

/*Table structure for table `tmp_add_familya8ce3` */

DROP TABLE IF EXISTS `tmp_add_familya8ce3`;

CREATE TABLE `tmp_add_familya8ce3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familya8ce3` */

/*Table structure for table `tmp_add_familyaeb45` */

DROP TABLE IF EXISTS `tmp_add_familyaeb45`;

CREATE TABLE `tmp_add_familyaeb45` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyaeb45` */

/*Table structure for table `tmp_add_familyb8051` */

DROP TABLE IF EXISTS `tmp_add_familyb8051`;

CREATE TABLE `tmp_add_familyb8051` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyb8051` */

/*Table structure for table `tmp_add_familyb8451` */

DROP TABLE IF EXISTS `tmp_add_familyb8451`;

CREATE TABLE `tmp_add_familyb8451` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyb8451` */

/*Table structure for table `tmp_add_familyd26ec` */

DROP TABLE IF EXISTS `tmp_add_familyd26ec`;

CREATE TABLE `tmp_add_familyd26ec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyd26ec` */

/*Table structure for table `tmp_add_familyd78d7` */

DROP TABLE IF EXISTS `tmp_add_familyd78d7`;

CREATE TABLE `tmp_add_familyd78d7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyd78d7` */

/*Table structure for table `tmp_add_familye0856` */

DROP TABLE IF EXISTS `tmp_add_familye0856`;

CREATE TABLE `tmp_add_familye0856` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familye0856` */

/*Table structure for table `tmp_add_familye0d1a` */

DROP TABLE IF EXISTS `tmp_add_familye0d1a`;

CREATE TABLE `tmp_add_familye0d1a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familye0d1a` */

/*Table structure for table `tmp_add_familye8065` */

DROP TABLE IF EXISTS `tmp_add_familye8065`;

CREATE TABLE `tmp_add_familye8065` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familye8065` */

/*Table structure for table `tmp_add_familyecba3` */

DROP TABLE IF EXISTS `tmp_add_familyecba3`;

CREATE TABLE `tmp_add_familyecba3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyecba3` */

/*Table structure for table `tmp_add_familyed937` */

DROP TABLE IF EXISTS `tmp_add_familyed937`;

CREATE TABLE `tmp_add_familyed937` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_lastname` varchar(128) DEFAULT '',
  `family_firstname` varchar(128) DEFAULT '',
  `family_middleinitial` varchar(128) DEFAULT '',
  `relationshipid` varchar(128) DEFAULT '0',
  `family_age` varchar(128) DEFAULT '',
  `familycivilid` varchar(128) DEFAULT '0',
  `occupation` varchar(128) DEFAULT '',
  `income` varchar(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tmp_add_familyed937` */

/*Table structure for table `masked_users` */

DROP TABLE IF EXISTS `masked_users`;

/*!50001 DROP VIEW IF EXISTS `masked_users` */;
/*!50001 DROP TABLE IF EXISTS `masked_users` */;

/*!50001 CREATE TABLE  `masked_users`(
 `id_user` int(1) ,
 `masked_email` int(1) ,
 `masked_password` int(1) ,
 `masked_lname` int(1) ,
 `masked_fname` int(1) ,
 `masked_address` int(1) ,
 `masked_position` int(1) 
)*/;

/*View structure for view masked_users */

/*!50001 DROP TABLE IF EXISTS `masked_users` */;
/*!50001 DROP VIEW IF EXISTS `masked_users` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`u680385054_bmis`@`127.0.0.1` SQL SECURITY DEFINER VIEW `masked_users` AS select 1 AS `id_user`,1 AS `masked_email`,1 AS `masked_password`,1 AS `masked_lname`,1 AS `masked_fname`,1 AS `masked_address`,1 AS `masked_position` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
