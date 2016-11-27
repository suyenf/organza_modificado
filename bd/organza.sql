/*
SQLyog Ultimate v9.02 
MySQL - 5.5.24-log : Database - organza
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`organza` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `organza`;

/*Table structure for table `bitacora` */

DROP TABLE IF EXISTS `bitacora`;

CREATE TABLE `bitacora` (
  `id_bitacora` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `id_us` int(10) NOT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `FK_bitacora` (`id_us`),
  CONSTRAINT `FK_bitacora` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `bitacora` */

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `id_cargo` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  CONSTRAINT `FK_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cargo` */

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_c` varchar(20) NOT NULL,
  `apellido_c` varchar(20) NOT NULL,
  `ci` int(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` int(20) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`nombre_c`,`apellido_c`,`ci`,`direccion`,`telefono`) values (1,'jose','paz',17222354,'valencia',2147483647),(2,'carlos','Fernandez',12334541,'La Sorpresa',2147483647),(3,'Miguel','Giron',12333444,'Rancho Grande',24236444);

/*Table structure for table `detalle_salidas` */

DROP TABLE IF EXISTS `detalle_salidas`;

CREATE TABLE `detalle_salidas` (
  `id_edo` int(10) NOT NULL AUTO_INCREMENT,
  `id_producto` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `id_deposito` int(10) NOT NULL,
  `id_almacen` int(10) NOT NULL,
  `cantidad` int(15) NOT NULL,
  PRIMARY KEY (`id_edo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_salidas` */

/*Table structure for table `detalle_salidas_serial` */

DROP TABLE IF EXISTS `detalle_salidas_serial`;

CREATE TABLE `detalle_salidas_serial` (
  `id_detalle_s_serial` int(10) NOT NULL AUTO_INCREMENT,
  `id_salida` int(10) NOT NULL,
  `id_us` int(10) NOT NULL,
  PRIMARY KEY (`id_detalle_s_serial`),
  KEY `FK_detalle_salidas_serial` (`id_salida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalle_salidas_serial` */

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `ci` int(15) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `edad` int(2) NOT NULL,
  `id_cargo` int(10) NOT NULL,
  `Status` char(1) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `FK_empleado` (`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `empleado` */

/*Table structure for table `entrada` */

DROP TABLE IF EXISTS `entrada`;

CREATE TABLE `entrada` (
  `id_entrada` int(10) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(10) NOT NULL,
  `correlativo_factura` int(7) NOT NULL,
  `fecha_factura_emitida` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `id_us` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `FK_entrada` (`id_proveedor`,`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `entrada` */

/*Table structure for table `marca_producto` */

DROP TABLE IF EXISTS `marca_producto`;

CREATE TABLE `marca_producto` (
  `id_marca` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_marca`),
  CONSTRAINT `FK_marca_producto` FOREIGN KEY (`id_marca`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `marca_producto` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_p` varbinary(20) NOT NULL,
  `precio_unitario` decimal(6,2) NOT NULL,
  `cant_existencia` int(100) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `status` char(1) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `FK_producto` (`id_proveedor`),
  CONSTRAINT `FK_producto` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(50) NOT NULL,
  `rif` varchar(10) NOT NULL,
  `direccion` varchar(10) NOT NULL,
  `telefono` int(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `proveedor` */

/*Table structure for table `respaldo` */

DROP TABLE IF EXISTS `respaldo`;

CREATE TABLE `respaldo` (
  `id_resp` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_us` int(10) NOT NULL,
  PRIMARY KEY (`id_resp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `respaldo` */

/*Table structure for table `salidas` */

DROP TABLE IF EXISTS `salidas`;

CREATE TABLE `salidas` (
  `id_salida` int(10) NOT NULL AUTO_INCREMENT,
  `id_us` int(10) NOT NULL,
  `fecha_salida` date NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `id_edo` int(10) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `correlativo_factura` int(7) NOT NULL,
  PRIMARY KEY (`id_salida`),
  KEY `FK_salidas` (`id_us`),
  CONSTRAINT `FK_salidas` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `salidas` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_us` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_us` varchar(20) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `id_nivel` int(10) NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_us`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_us`,`nombre_us`,`clave`,`id_nivel`,`id_empleado`,`status`) values (4,'suyen','123',1,1,'1'),(5,'jesus','244',2,2,'1');

/* Trigger structure for table `cliente` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `agregar_cliente` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `agregar_cliente` BEFORE INSERT ON `cliente` FOR EACH ROW BEGIN 
	INSERT INTO bitacora(`descripcion`)VALUES('se ha registrado un nuevo cliente'); 
    END */$$


DELIMITER ;

/* Procedure structure for procedure `agregar_cargo` */

/*!50003 DROP PROCEDURE IF EXISTS  `agregar_cargo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_cargo`(id int(10),des varchar(20),s char(1))
BEGIN 
INSERT INTO `cargo`(id_cargo,descripcion,status)
VALUES (id,des,s);
END */$$
DELIMITER ;

/* Procedure structure for procedure `agregar_cliente` */

/*!50003 DROP PROCEDURE IF EXISTS  `agregar_cliente` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_cliente`(cl int(10),n varchar(20),a VARCHAR(20),c int(10),d VARCHAR(30),tl int(20))
BEGIN 
INSERT INTO cargo (`id_cliente`,`nombre_c`,`apellido_c`,`ci`,`direccion`,`telefono`)
VALUES (cl,n,a,c,d,tl);
END */$$
DELIMITER ;

/* Procedure structure for procedure `consultar_cargo` */

/*!50003 DROP PROCEDURE IF EXISTS  `consultar_cargo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_cargo`(`cargo` INT(10))
BEGIN
SELECT * FROM `cargo` WHERE id_cargo=cargo ;
END */$$
DELIMITER ;

/* Procedure structure for procedure `consultar_mecanico` */

/*!50003 DROP PROCEDURE IF EXISTS  `consultar_mecanico` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_mecanico`(id_c int(10))
BEGIN
       SELECT * FROM `cargo` WHERE `id_cargo` = id_c;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminar_cargo` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminar_cargo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_cargo`(IN id_cargo int(10),in descripcion varchar(20),
                                                            IN STATUS CHAR(1))
BEGIN
DELETE FROM `cargo` WHERE id =`id_cargo`;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
