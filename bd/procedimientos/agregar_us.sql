DELIMITER $$

USE `organza`$$

DROP PROCEDURE IF EXISTS `agregar_us`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_us`(nombre_c INT (55),nombre_u VARCHAR(20),clav VARCHAR(10), 
                                                         nivel INT(10),ced INT(15),s CHAR(1))
                                                         
BEGIN 
INSERT INTO `usuario`(nombre_true,nombre_true2,nombre_us,clave, id_nivel,id_empleado,`Status`)
VALUES ((SELECT `nombre` FROM `empleado` WHERE `ci`= nombre_c),(SELECT `apellido` FROM `empleado` WHERE `ci`= nombre_c),
         nombre_u,clav,nivel,(SELECT `id_empleado` FROM `empleado` WHERE `ci`= ced),s);
END$$

DELIMITER ;