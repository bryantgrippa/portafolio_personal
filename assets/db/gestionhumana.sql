-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2025 a las 00:14:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionhumana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `detalle_area` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `detalle_area`, `activo`) VALUES
(1, 'Administrativo', 1),
(2, 'Staff Operativo', 1),
(3, 'Areas de Apoyo (Soporte, Desarrollo)', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `belljefearea`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `belljefearea` (
`total` bigint(21)
,`jefe_area` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bellnomina`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `bellnomina` (
`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bellrrhh`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `bellrrhh` (
`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bellsupervisor`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `bellsupervisor` (
`total` bigint(21)
,`supervisor` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `detalle_cargo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `detalle_cargo`, `activo`) VALUES
(1, 'Administrador', 1),
(2, 'Gerencia', 1),
(3, 'Director Administrativa y Financiera (Nomina)', 1),
(4, 'Recursos Humanos', 1),
(5, 'Director de Operaciones', 1),
(6, 'Jefe de Operaciones', 1),
(7, 'Soporte TICS', 1),
(8, 'Auxiliar Contable', 1),
(9, 'Asistente Adminstrativo', 1),
(10, 'Back Oficce', 1),
(11, 'Asesor CallCenter', 1),
(12, 'Analista Calidad', 1),
(13, 'Analista Formacion', 1),
(14, 'DataMarshall', 1),
(15, 'Aprendiz', 1),
(16, 'Supervisor de Operaciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `id_destacado` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'assets/img/user/defecto.png',
  `destacado_noticia` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `publicado` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_creado` int(11) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `area_2` int(11) DEFAULT NULL,
  `area_3` int(11) DEFAULT NULL,
  `area_4` int(11) DEFAULT NULL,
  `area_5` int(11) DEFAULT NULL,
  `area_6` int(11) DEFAULT NULL,
  `area_7` int(11) DEFAULT NULL,
  `area_8` int(11) DEFAULT NULL,
  `area_9` int(11) DEFAULT NULL,
  `area_10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'assets/img/user/defecto.png',
  `noticia_completa` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `orden` int(11) DEFAULT NULL,
  `publicado` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `Area_D` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `imagen`, `noticia_completa`, `creado`, `orden`, `publicado`, `activo`, `Area_D`) VALUES
(1, 'La nueva versón de Arcos ya esta disponible', 'assets/img/noticias_general/noticias/65aacc07700f1arcos.PNG', ' -Mejoras en el apartado de permisos laborales\r\n-Generador de permisos por Excel\r\n-Mensajes de permisos actualizados.                            ', '2024-01-19 14:22:47', NULL, 0, 1, 0),
(2, 'LA CIBERSEGURIDAD ES RESPONSABILIDAD DE TODOS', 'assets/img/noticias_general/noticias/65dc9407b2334ScreenshotatFeb2608-34-03.png', '                             \r\nEl phishing es una técnica de ciberdelincuencia que utiliza el fraude y el engaño para manipular a sus víctimas y hacer que revelen antecedentes personales confidenciales. El ataque se realiza mediante comunicaciones electrónicas, como un correo electrónico o una llamada de teléfono, por su parte el atacante se hace pasar por una persona u organización de confianza, con el objetivo de obtener información personal y confidencial.\r\n\r\nEn el caso de los correos electrónicos, los mensajes suelen contener enlaces que llevan hasta sitios web maliciosos o archivos adjuntos infectados con malware (programa malicioso).', '2024-02-26 08:37:11', 1, 1, 1, 0),
(3, 'QUE ES EL PHISHING', 'assets/img/noticias_general/noticias/65dc951cac252ScreenshotatFeb2608-38-362.png', 'El phishing es una técnica de estafa en línea utilizada por ciberdelincuentes para engañar a las personas y obtener información confidencial, como contraseñas o información financiera. Para identificar el phishing, presta atención a los siguientes signos: verifica la URL del sitio web, busca errores gramaticales o de ortografía en correos electrónicos o mensajes sospechosos, ten cuidado con los enlaces incrustados en mensajes no solicitados, y evita proporcionar información confidencial a través de enlaces no verificados. Siempre verifica la autenticidad de las solicitudes de información personal antes de responder', '2024-02-26 08:39:34', 2, 1, 1, 0),
(4, 'QUE ES EL FIS', 'assets/img/noticias_general/noticias/65dc949634da0', '                             ', '2024-02-26 08:39:34', NULL, 0, 0, 0),
(5, 'Recuerda!!', 'assets/img/noticias_general/noticias/65ddf80dc8e3eImagen1.jpg', '                             Es crucial recordar que la seguridad informática es responsabilidad de todos nosotros. Nuestra organización depende de la integridad y confidencialidad de nuestros datos para operar de manera efectiva y proteger a nuestros clientes y socios.\r\n\r\nEn los últimos tiempos, hemos sido testigos de un aumento en los ciberataques y amenazas digitales en todo el mundo. Por lo tanto, es fundamental que estemos alerta y tomemos medidas proactivas para salvaguardar nuestra información y sistemas.\r\n\r\nAquí hay algunos recordatorios clave para mantener la seguridad informática en el centro de nuestras operaciones:\r\n\r\nContraseñas seguras: Utiliza contraseñas robustas y cámbialas regularmente. Evita compartir contraseñas y nunca las escribas en lugares fácilmente accesibles.\r\n\r\nAutenticación de dos factores (2FA): Donde sea posible, activa la autenticación de dos factores para agregar una capa adicional de seguridad a tus cuentas.\r\n\r\nActualizaciones de software: Mantén actualizados todos los programas y sistemas operativos. Las actualizaciones a menudo contienen parches de seguridad vitales que protegen contra vulnerabilidades conocidas.\r\n\r\nSospecha de correos electrónicos y enlaces no solicitados: Ten cuidado al abrir correos electrónicos de remitentes desconocidos o hacer clic en enlaces sospechosos. La ingeniería social es una táctica común utilizada por los ciberdelincuentes para obtener acceso no autorizado.\r\n\r\nRespaldo regular de datos: Realiza copias de seguridad periódicas de tus archivos importantes. Esto puede ser crucial en caso de un ataque de ransomware u otra pérdida de datos.\r\n\r\nFormación y concienciación: Participa en sesiones de formación sobre seguridad informática y mantente al tanto de las últimas amenazas y mejores prácticas.\r\n\r\nRecuerda, la seguridad informática es un esfuerzo colaborativo y cada uno de nosotros tiene un papel que desempeñar en la protección de nuestros activos digitales. No subestimemos la importancia de mantenernos alerta y comprometidos con la seguridad en todo momento.\r\n\r\nSi tienes alguna pregunta o preocupación relacionada con la seguridad informática, no dudes en comunicarte con el equipo de IT. Estamos aquí para ayudarte y garantizar que todos estemos trabajando en un entorno seguro y protegido.\r\n\r\nGracias por tu atención y compromiso continuo con la seguridad informática.\r\n\r\n¡Sigamos adelante juntos!\r\n\r\n', '2024-02-27 09:56:13', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `detalle_permiso` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `detalle_permiso`, `activo`) VALUES
(1, 'Administrador', 1),
(2, 'Editor', 1),
(3, 'Usuario', 1),
(4, 'Supervisor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobresaliente`
--

CREATE TABLE `sobresaliente` (
  `id_sobresaliente` int(11) NOT NULL,
  `texto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_texto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_permisos_laborales`
--

CREATE TABLE `solicitudes_permisos_laborales` (
  `id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_permiso` int(11) NOT NULL,
  `motivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `horario_laboral_entrada` time NOT NULL,
  `horario_laboral_salida` time NOT NULL,
  `fecha_permiso` date NOT NULL,
  `duracion_permiso` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `supervisor` int(11) DEFAULT NULL,
  `jefe_area` int(11) DEFAULT NULL,
  `autorizado_sup` int(11) DEFAULT 0 COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_supervisor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `autorizado_ope` int(11) DEFAULT 0 COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_jefe_operaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `autorizado_nomina` int(11) DEFAULT 0 COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_nomina` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `autorizado_rrhh` int(11) DEFAULT 0 COMMENT 'Al momento de insercion de datos estas deben poseer el valor NULL y no 0 porque genera error',
  `observaciones_rrhh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha_creado` datetime NOT NULL DEFAULT current_timestamp(),
  `date_range` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_tipo`
--

CREATE TABLE `solicitudes_tipo` (
  `id_tipo` int(11) NOT NULL,
  `detalle_tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_tipo`
--

INSERT INTO `solicitudes_tipo` (`id_tipo`, `detalle_tipo`, `activo`) VALUES
(1, 'Diligencia Personal', 1),
(2, 'Calamidad', 1),
(3, 'Cita médica', 1),
(4, 'Compesatorio', 1),
(5, 'Licencia de Ley', 1),
(6, 'Vacaciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `n_documento` varchar(25) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `cargo` int(11) DEFAULT NULL,
  `puesto_contratado` varchar(250) NOT NULL,
  `valor_sueldo_letras` varchar(250) NOT NULL,
  `valor_sueldo` int(11) NOT NULL,
  `foto` varchar(19000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'assets/img/user/defecto.png',
  `correo` varchar(100) DEFAULT NULL,
  `area` int(11) DEFAULT 0,
  `area_1` int(11) DEFAULT 0,
  `area_2` int(11) DEFAULT 0,
  `area_3` int(11) DEFAULT 0,
  `area_4` int(11) DEFAULT 0,
  `area_5` int(11) DEFAULT 0,
  `area_6` int(11) DEFAULT 0,
  `area_7` int(11) DEFAULT 0,
  `permiso` int(11) NOT NULL,
  `bienvenida` int(11) NOT NULL DEFAULT 0,
  `genero` varchar(2) NOT NULL DEFAULT 'M',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificado` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activo` int(11) NOT NULL DEFAULT 1,
  `supervisor` int(11) DEFAULT NULL,
  `jefe_area` int(11) DEFAULT NULL,
  `nuevo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `usuario`, `password`, `n_documento`, `fecha_nacimiento`, `fecha_ingreso`, `cargo`, `puesto_contratado`, `valor_sueldo_letras`, `valor_sueldo`, `foto`, `correo`, `area`, `area_1`, `area_2`, `area_3`, `area_4`, `area_5`, `area_6`, `area_7`, `permiso`, `bienvenida`, `genero`, `fecha_registro`, `fecha_modificado`, `activo`, `supervisor`, `jefe_area`, `nuevo`) VALUES
(1, 'Admin principal', 'admin', '$2y$10$xVHLm03fepd45mhHDi6TB.Em3zGHQySBFLbAO1p4hcc1sDSO/q2Ru', '123654789', '1998-03-21', '2023-04-05', 1, 'Aprendiz', 'Millon trecientos mil', 1300000, 'assets/img/user/defecto.png', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'M', '2023-08-11 09:31:39', '2024-06-25 14:31:32', 1, NULL, NULL, 0),
(2, 'Bryant Gilberto Grippa Blanco', 'bryant.grippa', '$2y$10$xVHLm03fepd45mhHDi6TB.Em3zGHQySBFLbAO1p4hcc1sDSO/q2Ru', '1251459', '2003-03-21', '2023-11-01', 1, 'Desarrollador web', 'Millon trecientos mil', 1300000, 'assets/img/user/defecto.png', 'bryant_grippa@soy.sena.edu.co', 3, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'M', '2024-01-15 15:41:09', '2025-01-28 17:54:45', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `belljefearea`
--
DROP TABLE IF EXISTS `belljefearea`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `belljefearea`  AS SELECT count(0) AS `total`, `solicitudes_permisos_laborales`.`jefe_area` AS `jefe_area` FROM `solicitudes_permisos_laborales` WHERE `solicitudes_permisos_laborales`.`autorizado_sup` > 0 AND `solicitudes_permisos_laborales`.`autorizado_ope` = 0 GROUP BY `solicitudes_permisos_laborales`.`jefe_area` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `bellnomina`
--
DROP TABLE IF EXISTS `bellnomina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bellnomina`  AS SELECT count(0) AS `total` FROM `solicitudes_permisos_laborales` WHERE `solicitudes_permisos_laborales`.`autorizado_rrhh` > 0 AND `solicitudes_permisos_laborales`.`autorizado_nomina` = 0 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `bellrrhh`
--
DROP TABLE IF EXISTS `bellrrhh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bellrrhh`  AS SELECT count(0) AS `total` FROM `solicitudes_permisos_laborales` WHERE `solicitudes_permisos_laborales`.`autorizado_ope` > 0 AND `solicitudes_permisos_laborales`.`autorizado_rrhh` = 0 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `bellsupervisor`
--
DROP TABLE IF EXISTS `bellsupervisor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bellsupervisor`  AS SELECT count(0) AS `total`, `solicitudes_permisos_laborales`.`supervisor` AS `supervisor` FROM `solicitudes_permisos_laborales` WHERE `solicitudes_permisos_laborales`.`autorizado_sup` = 0 GROUP BY `solicitudes_permisos_laborales`.`supervisor` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id_destacado`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `Area_D` (`Area_D`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `sobresaliente`
--
ALTER TABLE `sobresaliente`
  ADD PRIMARY KEY (`id_sobresaliente`);

--
-- Indices de la tabla `solicitudes_permisos_laborales`
--
ALTER TABLE `solicitudes_permisos_laborales`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_tipo_permiso` (`id_tipo_permiso`);

--
-- Indices de la tabla `solicitudes_tipo`
--
ALTER TABLE `solicitudes_tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `n_documento` (`n_documento`),
  ADD KEY `Cargo` (`cargo`),
  ADD KEY `Area` (`area`),
  ADD KEY `Permisos` (`permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id_destacado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sobresaliente`
--
ALTER TABLE `sobresaliente`
  MODIFY `id_sobresaliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes_permisos_laborales`
--
ALTER TABLE `solicitudes_permisos_laborales`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes_tipo`
--
ALTER TABLE `solicitudes_tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes_permisos_laborales`
--
ALTER TABLE `solicitudes_permisos_laborales`
  ADD CONSTRAINT `id_tipo_permiso` FOREIGN KEY (`id_tipo_permiso`) REFERENCES `solicitudes_tipo` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
