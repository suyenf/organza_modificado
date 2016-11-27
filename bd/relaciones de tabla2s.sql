


INSERT INTO usuario  (`id_nivel`,`nombre_true`=((SELECT nombre FROM empleado WHERE nombre='nombre')),
`nombre_true`=((SELECT apellido  FROM empleado WHERE apellido='apellido')),'nombre_us','clave','status') 
VALUES (3,'marcos','Perez','marc','8999','1');


INSERT INTO `usuario`(`nombre_true`,`nombre_true2`,`id_us`,`nombre_us`,`clave`,`status`) 
SELECT `nombre`,`apellido` FROM `empleado` WHERE `status` = '1';

SELECT `nombre_true`, `nombre_true2`
INTO `organza`.`usuario`
FROM `organza`.`empleado`
WHERE `status` = '1'