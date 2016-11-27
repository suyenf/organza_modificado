# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.5.24-log

 #
 # Table structure for table 'alumno'
 #

DROP TABLE IF EXISTS alumno;
CREATE TABLE `alumno` (
  `id_alumno` int(10) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(10) NOT NULL,
  `ci` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `difreccion` varchar(50) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `FK_alumno` (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'alumno'
 #

LOCK TABLES alumno WRITE;
INSERT INTO alumno (id_alumno,id_carrera,ci,nombre,apellido,difreccion,correo,id_status) VALUES ("4","1","123","ff","dd","cc","ww","1");
INSERT INTO alumno (id_alumno,id_carrera,ci,nombre,apellido,difreccion,correo,id_status) VALUES ("5","2","567","xs","aa","qq","qq","0");
UNLOCK TABLES;


 #
 # Table structure for table 'bitacora'
 #

DROP TABLE IF EXISTS bitacora;
CREATE TABLE `bitacora` (
  `id_bitacora` int(10) NOT NULL AUTO_INCREMENT,
  `id_us` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `FK_bitacora` (`id_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'bitacora'
 #

LOCK TABLES bitacora WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'carrera'
 #

DROP TABLE IF EXISTS carrera;
CREATE TABLE `carrera` (
  `id_carrera` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `siglas` varchar(5) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'carrera'
 #

LOCK TABLES carrera WRITE;
INSERT INTO carrera (id_carrera,nombre,siglas,id_status) VALUES ("1","fff","uj","1");
INSERT INTO carrera (id_carrera,nombre,siglas,id_status) VALUES ("2","ybf","ffr","1");
INSERT INTO carrera (id_carrera,nombre,siglas,id_status) VALUES ("4","ews","rr","1");
UNLOCK TABLES;


 #
 # Table structure for table 'constancias'
 #

DROP TABLE IF EXISTS constancias;
CREATE TABLE `constancias` (
  `id_cons` int(10) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(10) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  `id_seccion` int(10) NOT NULL,
  `id_status` int(10) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_cons`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'constancias'
 #

LOCK TABLES constancias WRITE;
INSERT INTO constancias (id_cons,id_alumno,id_semestre,id_seccion,id_status,fecha) VALUES ("1","1","2","3","1","0000-00-00");
INSERT INTO constancias (id_cons,id_alumno,id_semestre,id_seccion,id_status,fecha) VALUES ("2","3","3","3","3","0000-00-00");
INSERT INTO constancias (id_cons,id_alumno,id_semestre,id_seccion,id_status,fecha) VALUES ("4","7","1","22","3","0000-00-00");
INSERT INTO constancias (id_cons,id_alumno,id_semestre,id_seccion,id_status,fecha) VALUES ("5","8","8","8","9","0000-00-00");
UNLOCK TABLES;


 #
 # Table structure for table 'horario'
 #

DROP TABLE IF EXISTS horario;
CREATE TABLE `horario` (
  `id_horario` int(10) NOT NULL AUTO_INCREMENT,
  `id_materia` int(10) NOT NULL,
  `dia` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_status` int(10) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'horario'
 #

LOCK TABLES horario WRITE;
INSERT INTO horario (id_horario,id_materia,dia,hora_inicio,hora_fin,id_status,id_semestre) VALUES ("2","1","2003-10-14","00:00:05","00:00:09","2","0");
INSERT INTO horario (id_horario,id_materia,dia,hora_inicio,hora_fin,id_status,id_semestre) VALUES ("3","3","2003-10-14","00:00:08","00:00:10","1","0");
UNLOCK TABLES;


 #
 # Table structure for table 'materia'
 #

DROP TABLE IF EXISTS materia;
CREATE TABLE `materia` (
  `id_materia` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `siglas` varchar(5) NOT NULL,
  `horas_TR_PR_LB` varchar(5) NOT NULL,
  `uc` int(2) NOT NULL,
  `id_status` int(10) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  PRIMARY KEY (`id_materia`),
  CONSTRAINT `FK_materia` FOREIGN KEY (`id_materia`) REFERENCES `rel_materia_alumno_nota` (`id_inform`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'materia'
 #

LOCK TABLES materia WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'notas'
 #

DROP TABLE IF EXISTS notas;
CREATE TABLE `notas` (
  `id_notas` int(10) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `nota` int(2) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_notas`),
  KEY `FK_notas` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'notas'
 #

LOCK TABLES notas WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'pensum'
 #

DROP TABLE IF EXISTS pensum;
CREATE TABLE `pensum` (
  `id_pensum` int(10) NOT NULL AUTO_INCREMENT,
  `id_materia` int(10) NOT NULL,
  `id_carrera` int(10) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `T` int(2) NOT NULL,
  `P` int(2) NOT NULL,
  `L` int(2) NOT NULL,
  `UC` int(2) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_pensum`),
  KEY `FK_pensum` (`id_status`),
  CONSTRAINT `FK_pensum` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'pensum'
 #

LOCK TABLES pensum WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'profesor'
 #

DROP TABLE IF EXISTS profesor;
CREATE TABLE `profesor` (
  `id_prof` int(10) NOT NULL AUTO_INCREMENT,
  `ci_prof` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'profesor'
 #

LOCK TABLES profesor WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'record'
 #

DROP TABLE IF EXISTS record;
CREATE TABLE `record` (
  `id_record` int(10) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `nota` int(2) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_record`),
  KEY `FK_record` (`id_status`),
  CONSTRAINT `FK_record` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'record'
 #

LOCK TABLES record WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'regimen'
 #

DROP TABLE IF EXISTS regimen;
CREATE TABLE `regimen` (
  `id_regimen` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_regimen`),
  KEY `FK_regimen` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'regimen'
 #

LOCK TABLES regimen WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'rel_alumno_seccion_sem'
 #

DROP TABLE IF EXISTS rel_alumno_seccion_sem;
CREATE TABLE `rel_alumno_seccion_sem` (
  `id_rel_alum_sec` int(10) NOT NULL AUTO_INCREMENT,
  `id_seccion` int(10) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  `id_alumno` int(10) NOT NULL,
  PRIMARY KEY (`id_rel_alum_sec`),
  KEY `FK_rel_alumno_seccion_sem` (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'rel_alumno_seccion_sem'
 #

LOCK TABLES rel_alumno_seccion_sem WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'rel_horario'
 #

DROP TABLE IF EXISTS rel_horario;
CREATE TABLE `rel_horario` (
  `id_rel_horario` int(10) NOT NULL AUTO_INCREMENT,
  `id_horario` int(10) NOT NULL,
  `id_carrera` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_seccion` int(10) NOT NULL,
  `grupo` int(30) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_rel_horario`),
  KEY `FK_rel_horario` (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'rel_horario'
 #

LOCK TABLES rel_horario WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'rel_materia_alumno_nota'
 #

DROP TABLE IF EXISTS rel_materia_alumno_nota;
CREATE TABLE `rel_materia_alumno_nota` (
  `id_inform` int(10) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `nota_materia` int(10) NOT NULL,
  `aprobo` char(1) NOT NULL,
  `reprobo` char(1) NOT NULL,
  `reparacion` char(1) NOT NULL,
  `repitencia` char(1) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_inform`),
  KEY `FK_rel_materia_alumno_nota` (`id_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'rel_materia_alumno_nota'
 #

LOCK TABLES rel_materia_alumno_nota WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'rel_pensum_materia'
 #

DROP TABLE IF EXISTS rel_pensum_materia;
CREATE TABLE `rel_pensum_materia` (
  `id_rel` int(10) NOT NULL AUTO_INCREMENT,
  `id_pensum` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_rel`),
  KEY `FK_rel_pensum_materia` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'rel_pensum_materia'
 #

LOCK TABLES rel_pensum_materia WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'rel_prof_materia'
 #

DROP TABLE IF EXISTS rel_prof_materia;
CREATE TABLE `rel_prof_materia` (
  `id_prof_mat` int(10) NOT NULL AUTO_INCREMENT,
  `id_prof` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_prof_mat`),
  KEY `FK_rel_prof_materia` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'rel_prof_materia'
 #

LOCK TABLES rel_prof_materia WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'seccion'
 #

DROP TABLE IF EXISTS seccion;
CREATE TABLE `seccion` (
  `id_seccion` int(10) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `id_carrera` int(10) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'seccion'
 #

LOCK TABLES seccion WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'semestre'
 #

DROP TABLE IF EXISTS semestre;
CREATE TABLE `semestre` (
  `id_semestre` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'semestre'
 #

LOCK TABLES semestre WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'status'
 #

DROP TABLE IF EXISTS status;
CREATE TABLE `status` (
  `id_status` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'status'
 #

LOCK TABLES status WRITE;
UNLOCK TABLES;


 #
 # Table structure for table 'usuario'
 #

DROP TABLE IF EXISTS usuario;
CREATE TABLE `usuario` (
  `id_us` int(2) NOT NULL AUTO_INCREMENT,
  `nombre_us` varchar(10) NOT NULL,
  `id_prof` int(10) NOT NULL,
  `clave` varchar(6) NOT NULL,
  `id_nivel_usuario` int(2) NOT NULL,
  `id_status` int(10) NOT NULL,
  PRIMARY KEY (`id_us`),
  KEY `FK_usurio` (`id_nivel_usuario`),
  KEY `FK_usuario` (`id_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 #
 # Dumping data for table 'usuario'
 #

LOCK TABLES usuario WRITE;
UNLOCK TABLES;


