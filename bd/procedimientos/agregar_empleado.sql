DELIMITER $$

USE `organza`$$

DROP PROCEDURE IF EXISTS `agregar_empleado`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_empleado`(nom VARCHAR(20),ap VARCHAR(20),ci INT(15),f_nan DATE, edad INT(2), id_car VARCHAR(20),s CHAR (1))
BEGIN 	     
		
	INSERT INTO `empleado`(`nombre`,`apellido`,`ci`,`f_nacimiento`,`edad`,`id_cargo`,`Status`)
	VALUES(nom,ap,ci,f_nan,edad,(SELECT `id_cargo` FROM `cargo` WHERE `descripcion`= id_car),s);
    END$$

DELIMITER ;