# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25-log)
# Database: crown-servers
# Generation Time: 2013-01-15 08:14:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Servers
# ------------------------------------------------------------

CREATE TABLE `Servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host_name` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `cpu_ram` varchar(255) DEFAULT NULL,
  `comment` text,
  `guest_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Servers` WRITE;
/*!40000 ALTER TABLE `Servers` DISABLE KEYS */;

INSERT INTO `Servers` (`id`, `host_name`, `ip_address`, `info`, `operating_system`, `cpu_ram`, `comment`, `guest_name`)
VALUES
	(10,'MSVMHV01','172.16.16.2','VNIC-172.16.16.2','Win 2008 R2 SP1','2(16)x24GB','Full OS Backup - Host Disk #5 @ 2 am',''),
	(11,'MSVMHV01','172.16.7.202','VNIC-172.16.7.202','','','',''),
	(12,'MSVMHV01','172.21.0.10','VNIC-Server Zone','','','',''),
	(13,'MSVMHV01','172.22.0.10','VNIC-DB Zone','','','',''),
	(15,'MSVMHV01','172.16.23.31','Primary SQL Server 2003','Win 2003 SP 2','2x3GB','De-commissioned.','csdb002'),
	(16,'MSVMHV01','172.16.7.42','migrated from cssec01 (09/02/2011)','Win 7 Pro','2x2GB','CA3000 Host PC','vmsec01'),
	(17,'MSVMHV01','172.16.7.41','CS Test Server','Win 2008 R2','4x4GB','','vmacct1'),
	(18,'MSVMHV01','172.22.0.11','new SQL 2008 R2 Public DB server','W 2008 R2; SQL 2008R2','4x4GB','BU#1 (Host Disk #7) @ 9 pm','sinai'),
	(19,'MSVMHV01','172.21.0.11','Coldfusion 9 Public Web server','Win 2008 R2','4x4GB','BU#5 (Host Disk #6) @12:30 am','horeb'),
	(20,'MSVMHV01','172.21.0.100','UofN_Registrar','','','',''),
	(21,'MSVMHV01','172.21.0.101','UofN_OnlineApp','','','',''),
	(22,'MSVMHV01','172.21.0.102','WebCom (YWAMConnectKona)','','','',''),
	(23,'MSVMHV01','172.21.0.103','UofN_Operation','','','',''),
	(24,'MSVMHV01','172.21.0.104','UofN_Gateway (www.JoinYWAMKona.com)','','','',''),
	(25,'MSVMHV01','172.21.070','AutoStore Server - Ricoh OCR Scan','Win 2008 R2','4x4GB','D: drive iscsi to solomon','papyrus'),
	(27,'MSVMHV02','172.16.7.3','VNIC-172.16.7.3','Win 2008 R2 SP1','2(16)x24GB','Full OS Backup - Host Disk #3 @7 pm',''),
	(28,'MSVMHV02','172.16.7.4','VNIC-172.16','','','',''),
	(29,'MSVMHV02','172.21.0.21','VNIC-Server Zone','','','',''),
	(30,'MSVMHV02','172.22.0.20','VNIC-DB Zone','','','',''),
	(32,'MSVMHV02','172.16.17.204','Acct - FE and RE, SQL Server, File server','Win 2008 R2','4x8GB','BU#4 (Host Disk #1) @ 1 am (App backup @ 9 pm and 9:30 pm)','vmacct3'),
	(33,'MSVMHV02','172.22.0.21','Internal Application DB server','W 2008 R2; SQL 2008R2','4x4GB','BU#6 (Host Disk #2) @10 pm','nebo'),
	(36,'MSVMHV03','172.16.7.39','VNIC1-172.16','Win 2008 R2 SP1','2(16)x32GB','Full OS Backup - Host disk #3 BU#3 @ 6:30 pm',''),
	(37,'MSVMHV03','172.16.7.40','VNIC 2 - 172.16','','','VM included - csmsvmxp01, newton',''),
	(38,'MSVMHV03','172.21.0.30','VNIC 3 - Sever Zone','','','vmap01, vmap02, vmgw01',''),
	(39,'MSVMHV03','172.22.0.30','VNIC 4 - DB Zone','<-not active','','SCVMM',''),
	(41,'MSVMHV03','172.16.17.205','uofnkona.edu file server','Win 2008 SP2','4x4GB','BU#7 (Host Disks #1 and #2) @ 9 pm','vmfs004'),
	(42,'MSVMHV03','172.21.0.33','Cold Fusion, SQL 2008R2 Private DB server','Win 2008 SP2','2x2GB','Helpdesk with internal DB','vmap01'),
	(43,'MSVMHV03','172.21.0.34','Cold Fusion','Win 2008 SP2','2x2GB','','vmap02'),
	(44,'MSVMHV03','172.16.18.7','legacy acct db server','Win XP SP 2','2x1GB','Needs Progress database on the fsacct1. Lisa Vos approved offline of the database.','accpac'),
	(45,'MSVMHV03','172.21.0.31','Michelle Johnson','Win XP SP 2','2x1GB','Raptor VPN access.  AD-dannyo','csmsvmxp01.acct'),
	(46,'MSVMHV03','172.16.7.31','Bill Cornell - Auditor','Win XP SP 3','2X2GB','Juniper VNP - billcornell/U0fN@tion$; AD - billcornell/bill2audit','vmxp02.acct'),
	(47,'MSVMHV03','172.16.16.17','ESL school','Win 2003 SP2','2X3GB','','eslserver'),
	(48,'MSVMHV03','172.16.7.77','ITDev Team Training Server - SQL Server','Win 2008 SP2','2x2GB','No backup','newton'),
	(49,'MSVMHV03','172.16.7.12','ITDev Team Training Server - Cold Fusion 9','Win 2008 R2','4x4GB','Woowon dev server','vmgw01'),
	(50,'MSVMHV03','172.16.7.14','','','','CFIDE/admin/admin',''),
	(51,'MSVMHV03','172.21.0.41','Network monitoring','Windows 2003 R2','2x2GB','','gabriel'),
	(52,'MSVMHV03','172.16.7.43','Development - CF and SQL Server','Windows 2008 R2','4x4GB','','philippians'),
	(54,'MSVMHV04','172.16.7.65','VNIC1-172.16','Win 2008 R2 SP1','2(16)x48GB','',''),
	(55,'MSVMHV04','172.16.7.','VNIC 2 - 172.16','','','',''),
	(56,'MSVMHV04','172.21.0.40','VNIC 3 - Sever Zone','','','',''),
	(57,'MSVMHV04','172.22.0.40','VNIC 4 - DB Zone','','','',''),
	(58,'MSVMHV04','172.21.0.42','Cold Fusion Staging Server','Win 2008 SP2','4x2GB','','galileo'),
	(62,'VMUX02','172.16.7.50','','VMWare 4.1','2(16)x48GB','VMClient - Dunami$7',''),
	(63,'VMUX02','172.16.23.43','Moodle Online School ','Cenos 5.5 (LAMP)','4X4GB','64.75.242.235','mdlvx02'),
	(64,'VMUX02','172.16.10.176','YWAMConnect V2 DB server','Cenos 5.5 (MySQL)','2X2GB','','mysql1yc'),
	(65,'VMUX02','172.16.10.175','YWAMConnect V2 web server','Cenos 5.5 (Apache)','4X2GB','','web1yc'),
	(66,'VMUX02','172.30.23.163','4K web and file server','Cenos 5.6 (LAMP)','4X4GB','64.75.242.248','vm4kmap01'),
	(67,'VMUX02','172.16.7.49','GVS FTP server','Centos 5.6 (Vsftpd)','4x2GB','64.75.242.213 (vericorder/sh0wtim3)','gniux'),
	(68,'VMUX02','172.16.7.66','GVS CatDV server','Centos 5.7','4x4GB','64.75.242.237','cdvux'),
	(69,'VMUX02','172.16.7.66','CROWN Developer server','CentOS 6.2','2x4GB','','devux'),
	(70,'VMUX02','172.16.10.170','CROWN Docuwiki and Qmail SMTP server','CentOS 5.5','4x4GB','64.75.242.215','prux'),
	(71,'VMUX02','','TBD','','2x4GB','','ucsux'),
	(72,'VMUX02','','','Cenos 5.5 (Apache)','','Copy of web1yc','galileo'),
	(74,'VMUX61','172.21.0.61','','VMWare ESXi 5.0','','VMClient - Crownkey$7',''),
	(75,'VMUX61','172.21.0.25','Cacti Monitoring - cacti.uofnkona.edu','Centos 4.8','4x2GB','','catciEZ'),
	(76,'VMUX61','172.21.0.254','','','','','cctv'),
	(77,'VMUX61','172.21.0.51','','','','','cucm8'),
	(79,'VMUX61','172.21.0.252','','','','','FreeRadius'),
	(80,'VMUX61','172.21.0.250','','','','','Wavelink'),
	(81,'VMUX61','172.20.0.27','ywamconnect v2 server for non-YWAMers','Centos 6.3','','64.75.242.27\nroot/4*nations','ycv2dev'),
	(83,'BETHEL','172.16.7.21','International Student Records','Windows 2008 R2','4x4GB','Must use VPN or console to access',''),
	(84,'BETHEL','172.16.7.33','Cold Fusion, SQL 2008R2 Private DB server','','','','jericho'),
	(86,'SOLOMON','172.16.7.35','Primary Storage Server','Centos 5.6','1(8)x8GB','','NIC'),
	(87,'SOLOMON','172.16.7.34','Server mgmt IP address (web)','','','','IPMI'),
	(88,'SOLOMON','172.16.7.10','Raid Card mgmt IP (web)','','','','Areca'),
	(90,'Topaz','172.16.7.73','Backup Server - dirvish','Centos 6.3','4x24GB','','NIC 0'),
	(91,'Topaz','172.16.7.72','','','','','IPMI'),
	(94,'Microsoft','172.16.23.179','Security monitor server','Win 2003 SP2','1x512MB','Moved to vmsec01','cssec01'),
	(95,'Microsoft','172.16.30.133','Public Cold Fusion server','Win 2003 SP2','2X1GB','Moved to horeb','cswspub2'),
	(96,'Microsoft','172.16.7.28','ACCT domain AD','Win 2000 SP4','2x1.5GB','Remove','fsacct1'),
	(97,'Microsoft','172.29.255.7','workgroup','Win 2000 SP4','','Bethel -> jericho','intlrecords'),
	(100,'Linux','172.16.10.170','64.75.242.215','Centos 5.5','2x4GB','64.75.242.215','prux'),
	(101,'Linux','172.16.23.33','64.75.242.214','OpenSUSE 10.2','2x2GB','64.75.242.214','csws002'),
	(102,'Linux','172.16.10.171','Content Filter','Centos 5.6','8X12GB','','vmux'),
	(103,'Linux','172.16.23.20','Ben\'s SSH server','','','64.75.242.210','silver'),
	(105,'Thecus','172.16.7.8','Secondary storage server','Thecus','N/A','','n4000pro'),
	(107,'Ben','172.16.23.59','vmplayer - Windows 7 from silver','Wndows 7','','','bronze'),
	(108,'Ben','172.16.7.69','Server Room','Wndows 7','','','emerald');

/*!40000 ALTER TABLE `Servers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
