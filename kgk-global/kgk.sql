/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.6.17 : Database - kgk-global
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`kgk-global` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kgk-global`;

/*Table structure for table `cars` */

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(40) DEFAULT NULL,
  `number_car` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cars` */

insert  into `cars`(`id`,`car_name`,`number_car`) values (1,'BMW','AC-1111'),(2,'Subaru forester','DV-222'),(3,'Lada','GA-333');

/*Table structure for table `drivers` */

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(30) CHARACTER SET cp1251 DEFAULT NULL,
  `driver_surname` varchar(50) CHARACTER SET cp1251 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `drivers` */

insert  into `drivers`(`id`,`driver_name`,`driver_surname`) values (1,'Вася','Пупкин'),(2,'Коля','Сумкин'),(3,'Иван','Иванов');

/*Table structure for table `routes` */

DROP TABLE IF EXISTS `routes`;

CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `routes` */

insert  into `routes`(`id`,`car_id`,`driver_id`,`date_start`,`date_end`) values (2,2,2,'2015-02-14 15:00:00','2015-02-15 10:00:00'),(3,2,3,'2015-02-14 12:00:00','2015-02-14 15:00:00'),(4,2,1,'2015-02-14 10:00:00','2015-02-14 16:40:00'),(5,2,1,'2015-02-13 10:00:00','2015-02-14 10:00:00'),(6,3,1,'2015-02-13 10:00:00','2015-02-15 10:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
