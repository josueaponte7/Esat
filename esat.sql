/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.16-log : Database - esat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`esat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `esat`;

/*Table structure for table `asignacion` */

DROP TABLE IF EXISTS `asignacion`;

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_materia` varchar(15) NOT NULL,
  `cedula_fac` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `asignacion` */

insert  into `asignacion`(`id`,`codigo_materia`,`cedula_fac`) values (5,'DBAMV/OB-01',10987654),(4,'DBAMA/OB-01',10987654),(6,'DBAMV/OB-01',10987654),(7,'DBAMA/OB-01',10987654);

/*Table structure for table `asignaturas` */

DROP TABLE IF EXISTS `asignaturas`;

CREATE TABLE `asignaturas` (
  `cod_asi` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) DEFAULT NULL,
  `nombre` varchar(32) NOT NULL,
  `mencion` varchar(100) NOT NULL,
  `uc` int(11) NOT NULL,
  `cuatrimestre` varchar(15) NOT NULL,
  `tipo` varchar(18) NOT NULL,
  PRIMARY KEY (`cod_asi`),
  KEY `mencion` (`mencion`),
  CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`mencion`) REFERENCES `menciones` (`siglas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `asignaturas` */

insert  into `asignaturas`(`cod_asi`,`codigo`,`nombre`,`mencion`,`uc`,`cuatrimestre`,`tipo`) values (1,'01','Biologia Molecular','DBAMA',3,'PRIMERO','OB');

/*Table structure for table `asignaturas_inscritas` */

DROP TABLE IF EXISTS `asignaturas_inscritas`;

CREATE TABLE `asignaturas_inscritas` (
  `cod_ins` int(11) NOT NULL AUTO_INCREMENT,
  `cod_par` int(11) NOT NULL,
  `cod_ofe` int(11) NOT NULL,
  PRIMARY KEY (`cod_ins`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `asignaturas_inscritas` */

/*Table structure for table `auditoria` */

DROP TABLE IF EXISTS `auditoria`;

CREATE TABLE `auditoria` (
  `cod_aud` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(15) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `accion` varchar(128) NOT NULL,
  `resultado` set('Exito','Error') NOT NULL,
  `ip` varchar(15) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_aud`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `auditoria` */

/*Table structure for table `calificaciones` */

DROP TABLE IF EXISTS `calificaciones`;

CREATE TABLE `calificaciones` (
  `cod_cal` int(11) NOT NULL AUTO_INCREMENT,
  `cod_asi` int(11) NOT NULL,
  `cod_par` int(11) NOT NULL,
  `cod_ofe` int(11) NOT NULL,
  PRIMARY KEY (`cod_cal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `calificaciones` */

/*Table structure for table `detalle_inscripcion` */

DROP TABLE IF EXISTS `detalle_inscripcion`;

CREATE TABLE `detalle_inscripcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cohorte` varchar(10) NOT NULL,
  `cedula_par` int(10) NOT NULL,
  `codigo_materia` varchar(15) NOT NULL,
  `cuatrimestre` varchar(15) NOT NULL,
  `ninscripcion` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_inscripcion` */

insert  into `detalle_inscripcion`(`id`,`cohorte`,`cedula_par`,`codigo_materia`,`cuatrimestre`,`ninscripcion`) values (3,'2013',12345678,'DBAMA/OB-01','PRIMERO',1),(6,'2014',12345678,'DBAMA/OB-01','gggggg',2),(5,'2014',12345678,'DBAMA/OB-01','seleccione..',0);

/*Table structure for table `facilitadores` */

DROP TABLE IF EXISTS `facilitadores`;

CREATE TABLE `facilitadores` (
  `cod_fac` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) DEFAULT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` tinytext NOT NULL,
  `sexo` set('Masculino','Femenino') NOT NULL DEFAULT 'Masculino',
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` int(8) NOT NULL,
  PRIMARY KEY (`cod_fac`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `email` (`email`,`telefono`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Datos de los facilitadores';

/*Data for the table `facilitadores` */

insert  into `facilitadores`(`cod_fac`,`email`,`telefono`,`direccion`,`sexo`,`nombre`,`apellido`,`cedula`) values (1,'sffsffs@gmail.com','0412-141753','sasdssf','Masculino','Josue','Aponte',15649505);

/*Table structure for table `horario` */

DROP TABLE IF EXISTS `horario`;

CREATE TABLE `horario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cuatrimestre` varchar(10) NOT NULL,
  `cohorte` varchar(10) NOT NULL,
  `asignatura` varchar(50) NOT NULL,
  `mes` varchar(15) NOT NULL,
  `jueves` varchar(15) NOT NULL,
  `viernes` varchar(15) NOT NULL,
  `sabado` varchar(15) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `nhorario` int(10) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `observacion` text NOT NULL,
  `mencion` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `horario` */

insert  into `horario`(`id`,`cuatrimestre`,`cohorte`,`asignatura`,`mes`,`jueves`,`viernes`,`sabado`,`hora`,`nhorario`,`periodo`,`observacion`,`mencion`) values (1,'III','','','OCTUBRE','23-10-2014','24-10-2014','25-10-2014','8:00 a 12:00',0,'2','','Doctorado en Biotecnologia Agricola Mencion Animal');

/*Table structure for table `inscripcion` */

DROP TABLE IF EXISTS `inscripcion`;

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cohorte` varchar(10) NOT NULL,
  `cedula_par` int(10) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `doctorado` varchar(100) NOT NULL,
  `ninscripcion` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `inscripcion` */

insert  into `inscripcion`(`id`,`cohorte`,`cedula_par`,`fecha`,`doctorado`,`ninscripcion`) values (2,'2014',12345678,'10-11-2014','Doctorado en Biotecnologia Agricola Mencion Animal',0),(3,'2013',12345678,'10-11-2014','Doctorado en Biotecnologia Agricola Mencion Animal',1),(4,'2014',12345678,'11-11-2014','Doctorado en Biotecnologia Agricola Mencion Animal',2),(5,'2014',12345678,'11-11-2014','Doctorado en Biotecnologia Agricola Mencion Animal',0);

/*Table structure for table `menciones` */

DROP TABLE IF EXISTS `menciones`;

CREATE TABLE `menciones` (
  `cod_men` int(11) NOT NULL AUTO_INCREMENT,
  `siglas` varchar(10) DEFAULT NULL,
  `nombre` varchar(54) NOT NULL,
  PRIMARY KEY (`cod_men`),
  UNIQUE KEY `siglas` (`siglas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `menciones` */

insert  into `menciones`(`cod_men`,`siglas`,`nombre`) values (1,'DBAMA','Doctorado en Biotecnologia Agricola Mencion Animal'),(2,'DBAMV','Doctorado en Biotecnologia Agricola Mencion Vegetal');

/*Table structure for table `notas` */

DROP TABLE IF EXISTS `notas`;

CREATE TABLE `notas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cedula_par` int(10) NOT NULL,
  `cuatrimestre` varchar(15) NOT NULL,
  `cohorte` varchar(10) NOT NULL,
  `codigo_materia` varchar(15) NOT NULL,
  `facilitador` varchar(10) NOT NULL,
  `notaauto` varchar(10) NOT NULL,
  `defauto` varchar(10) NOT NULL,
  `totalco` varchar(10) NOT NULL,
  `definitivoco` varchar(10) NOT NULL,
  `definitivoptos` varchar(10) NOT NULL,
  `definitivopor` int(10) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `notas` */

/*Table structure for table `ofertas` */

DROP TABLE IF EXISTS `ofertas`;

CREATE TABLE `ofertas` (
  `cod_ofe` int(11) NOT NULL AUTO_INCREMENT,
  `cod_asi` int(11) NOT NULL,
  `cod_fac` int(11) NOT NULL,
  `periodo` varchar(6) NOT NULL,
  PRIMARY KEY (`cod_ofe`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ofertas` */

/*Table structure for table `participantes` */

DROP TABLE IF EXISTS `participantes`;

CREATE TABLE `participantes` (
  `cod_par` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` int(8) NOT NULL,
  `pasaporte` int(11) NOT NULL,
  `sexo` set('Masculino','Femenino') NOT NULL,
  `fecha_nacimiento` varchar(15) NOT NULL,
  `lugar_nacimiento` varchar(64) NOT NULL,
  `estado_civil` varchar(25) NOT NULL,
  `direccion` varchar(64) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `condicion` varchar(15) NOT NULL,
  `estatus` set('Activo','Inactivo') NOT NULL,
  PRIMARY KEY (`cod_par`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `pasaporte` (`pasaporte`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `participantes` */

insert  into `participantes`(`cod_par`,`nombre`,`apellido`,`cedula`,`pasaporte`,`sexo`,`fecha_nacimiento`,`lugar_nacimiento`,`estado_civil`,`direccion`,`telefono`,`email`,`condicion`,`estatus`) values (1,'ana','ruiz',12345678,0,'Femenino','10/10/1985','la coromoto ','Soltero(a)','hyjkgcgd dgfhgugfh  fggdsgfd                                    ','0243-241307','fdkfk@gfdr.c','Libre','Activo'),(2,'yuli','fonseca',14430447,0,'Femenino','23/11/1979','caracas','Soltero(a)','las delicias','04154567890','yuli@cantv.net','Regular','Activo');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(56) NOT NULL,
  `contrasena` varchar(56) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nivel` set('administrador','supervisor','analistace','analistacd') NOT NULL,
  `estatus` set('Activo','Inactivo') NOT NULL,
  PRIMARY KEY (`cod_usu`),
  UNIQUE KEY `usuario` (`usuario`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`cod_usu`,`usuario`,`contrasena`,`nombre`,`apellido`,`email`,`nivel`,`estatus`) values (1,'administrador','12345678','Adminis','Trador','administrador@gmail.com','administrador','Activo'),(2,'karlaramones','12345678','Karla','Ramones','kramones07@gmail.com','analistacd','Activo'),(3,'lenysespinoza','12345678','Lenys','Espinoza','lenys@gmail.com','analistace','Activo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
