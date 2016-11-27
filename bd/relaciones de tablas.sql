SELECT a.`id_orden`,b.`matricula`,a.`fecha_eot`,a.`fecha_cot`,c.`nom_estado`,d.`nombre_m`,d.`apellido_m`,e.`nom_to`
FROM  `orden_trabajo` AS a, `movil` AS b, `estado_ot` AS c, `mecanico` AS d, `tipo_ot` AS e
WHERE a.`id_movil`= b.`id_movil` AND a.id_eot = c.`id_eot` AND a.`id_mecanico` = d.`cedula` AND a.`id_tot` = e.`id_tot`
    
    
SELECT a.`id_us`,b.`nombre`,a.`nombre_us`,a.`clave`,c.descripcion,d.`nombre`,d.`apellido`,d.`ci`
     FROM `usuario` AS a, `nivel` AS b,`estado` AS c, `empleado` AS d
     WHERE a.`id_nivel`=b.`id_nivel` AND a.`status`=c.`status` AND  a.`id_empleado` = d.`id_empleado`
     
INSERT INTO `usuario` (`ci,nombre_us`,`clave`,`status`) 
VALUES (SELECT a.`ci`,a.nombre,a.apellido,b.ci FROM `empleado` AS a,usuario AS b WHERE a.ci=b.ci ),'yan',765,1

SELECT a.`ci`,a.nombre,a.apellido,b.ci
FROM `empleado` AS a,usuario AS b WHERE a.ci=b.ci

     
INSERT INTO "Actividades" ("Actividad") SELECT "NombreDeporte" FROM "MisDeportes" WHERE ("Tipo" = 'Individual')  
  

SELECT `nombre`,`apellido`,`ci` FROM `empleado` WHERE (`id_nivel`=0)
INSERT INTO `usuario` (`nombre_true`,`nombre_true2`,`ci`) 


 
  
  SELECT `nombre`,`apellido`,`ci` FROM `empleado` WHERE ci=ci
  
   /*1.-TAMBIEN SE PUEDE BUSCAR US POR CEDULA, RELACIONANDO CON LAS TABLAS US-EMPLEADO
     2.-CUANDO NO SE ES ADMIN NO SE PUEDEN VER LOS USUARIOS QUE TIENEN STATUS 2
     
     */
     
     
     
     
     INSERT INTO [tabla donde se va a escribir] (campo1, campo2, campo3, ...) 
SELECT (campo1, campo2, campo3, ...) 
FROM [tabla de la que se quiere copiar] 
[LEFT JOIN ] 
[WHERE condicion]

INSERT INTO `usuario` (`nombre_true`, `nombre_true2`,`ci`) 
SELECT (`nombre`, `apellido`, `ci`) 
FROM `empleado`
LEFT JOIN, WHERE `ci`=`ci`

INSERT INTO tablaDestino (campoDestino) 
VALUES ((SELECT SUM(campoASumar) AS cantidad FROM tablaOrigen))

