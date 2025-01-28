DROP DATABASE IF EXISTS GESTIONHUMANA;
CREATE DATABASE GESTIONHUMANA;
USE GESTIONHUMANA;
CREATE TABLE `areas` (
  `id_area` int NOT NULL,
  `detalle_area` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `activo` int NOT NULL DEFAULT '1'
);
CREATE TABLE `cargos` (
  `id_cargo` int NOT NULL,
  `detalle_cargo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `activo` int NOT NULL DEFAULT '1'
);
CREATE TABLE `destacados` (
  `id_destacado` int NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT 'assets/img/user/defecto.png',
  `destacado_noticia` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `orden` int DEFAULT NULL,
  `publicado` int NOT NULL,
  `activo` int NOT NULL DEFAULT '1',
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `area` int NOT NULL,
  `area_2` int DEFAULT NULL,
  `area_3` int DEFAULT NULL
);
CREATE TABLE `noticias` (
  `id_noticia` int NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT 'assets/img/user/defecto.png',
  `noticia_completa` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orden` int DEFAULT NULL,
  `publicado` int NOT NULL,
  `activo` int NOT NULL DEFAULT '1',
  `Area_D` int NOT NULL
);
CREATE TABLE `permisos` (
  `id_permiso` int NOT NULL,
  `detalle_permiso` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `activo` int NOT NULL DEFAULT '1'
);
CREATE TABLE `sobresaliente` (
  `id_sobresaliente` int NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_texto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activo` int NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `solicitudes_permisos_laborales` (
  `id_permiso` int,
  `id_usuario` int NOT NULL,
  `id_tipo_permiso` int NOT NULL,
  `motivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `horario_laboral_entrada` time NOT NULL,
  `horario_laboral_salida` time NOT NULL,
  `fecha_permiso` date NOT NULL,
  `duracion_permiso` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `supervisor` int DEFAULT NULL,
  `jefe_area` int DEFAULT NULL,
  `autorizado_sup` int DEFAULT '0' COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_supervisor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `autorizado_ope` int DEFAULT '0' COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_jefe_operaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `autorizado_nomina` int DEFAULT '0' COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_nomina` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `autorizado_rrhh` int DEFAULT '0' COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_rrhh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `fecha_creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_range` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
);
CREATE TABLE `solicitudes_tipo` (
  `id_tipo` int NOT NULL,
  `detalle_tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activo` int NOT NULL
);
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `n_documento` varchar(25) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `cargo` int DEFAULT NULL,
  `puesto_contratado` varchar(250) NOT NULL,
  `valor_sueldo_letras` varchar(250) NOT NULL,
  `valor_sueldo` int NOT NULL,
  `foto` varchar(19000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'assets/img/user/defecto.png',
  `area` int DEFAULT NULL,
  `permiso` int NOT NULL,
  `bienvenida` int NOT NULL DEFAULT '0',
  `genero` varchar(2) NOT NULL DEFAULT 'M',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activo` int NOT NULL DEFAULT '1',
  `supervisor` int DEFAULT NULL,
  `jefe_area` int DEFAULT NULL,
  `nuevo` int NOT NULL DEFAULT '1'
);

ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id_destacado`),
  ADD KEY `area` (`area`);

ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `Area_D` (`Area_D`);

ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

ALTER TABLE `sobresaliente`
  ADD PRIMARY KEY (`id_sobresaliente`);

ALTER TABLE `solicitudes_permisos_laborales`
  ADD PRIMARY KEY (`id_permiso`);

ALTER TABLE `solicitudes_tipo`
  ADD PRIMARY KEY (`id_tipo`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `n_documento` (`n_documento`);

ALTER TABLE `areas`
  MODIFY `id_area` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `cargos`
  MODIFY `id_cargo` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `destacados`
  MODIFY `id_destacado` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `noticias`
  MODIFY `id_noticia` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `permisos`
  MODIFY `id_permiso` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `sobresaliente`
  MODIFY `id_sobresaliente` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `solicitudes_permisos_laborales`
  MODIFY `id_permiso` int AUTO_INCREMENT;

ALTER TABLE `solicitudes_tipo`
  MODIFY `id_tipo` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `solicitudes_permisos_laborales`
  ADD CONSTRAINT `id_tipo_permiso` FOREIGN KEY (`id_tipo_permiso`) REFERENCES `solicitudes_tipo`(`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE; 

CREATE VIEW bellsupervisor AS SELECT COUNT(*) AS total, supervisor 
FROM solicitudes_permisos_laborales WHERE autorizado_sup = 0 GROUP BY supervisor;

CREATE VIEW belljefearea AS SELECT COUNT(*) AS total, jefe_area 
FROM solicitudes_permisos_laborales WHERE autorizado_sup > 0 AND autorizado_ope = 0 GROUP BY jefe_area;

CREATE VIEW bellrrhh AS SELECT COUNT(*) AS total
FROM solicitudes_permisos_laborales WHERE autorizado_ope > 0 AND autorizado_rrhh = 0;

CREATE VIEW bellnomina AS SELECT COUNT(*) AS total
FROM solicitudes_permisos_laborales WHERE autorizado_rrhh > 0 AND autorizado_nomina = 0;

