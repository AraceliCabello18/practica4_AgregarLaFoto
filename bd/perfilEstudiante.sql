create database perfil;
use perfil;

CREATE TABLE `t_estudiante` (
  `id_estudiante` INT NOT NULL AUTO_INCREMENT,
  `paterno` VARCHAR(245) NOT NULL,
  `materno` VARCHAR(245) NOT NULL,
   `nombre` VARCHAR(255) NOT NULL,
   `edad` VARCHAR(255) NOT NULL,
   `fechaInsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `matricula` VARCHAR(255) NOT NULL,
   `especialidad` VARCHAR(255) NOT NULL,
   `sexo` VARCHAR(255) NOT NULL,
   `imagen` VARCHAR(255) NOT NULL,
  `extension` VARCHAR(245) NOT NULL,
  PRIMARY KEY (`id_estudiante`));