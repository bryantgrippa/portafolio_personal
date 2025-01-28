	INSERT INTO `areas` (`detalle_area`, `activo`) VALUES
('Administrativo', 1),
('Staff Operativo', 1),
('Areas de Apoyo (Soporte, Desarrollo)', 1);

	INSERT INTO `cargos` (`detalle_cargo`, `activo`) VALUES
('Administrador', 1),
('Gerencia', 1),
('Director Administrativa y Financiera (Nomina)', 1),
('Recursos Humanos', 1),
('Director de Operaciones', 1),
('Jefe de Operaciones', 1),
('Soporte TICS', 1),
('Auxiliar Contable', 1),
('Asistente Adminstrativo', 1),
('Back Oficce', 1),
('Asesor CallCenter', 1),
('Analista Calidad', 1),
('Analista Formacion', 1),
('DataMarshall', 1),
('Aprendiz', 1),
('Supervisor de Operaciones', 1);

	INSERT INTO `permisos` (`detalle_permiso`,`activo`) VALUES
('Administrador', 1),
('Editor', 1),
('Usuario', 1),
('Supervisor', 1);

	INSERT INTO `solicitudes_tipo` (`detalle_tipo`, `activo`) VALUES
('Diligencia Personal', 1),
('Calamidad', 1),
('Cita médica', 1),
('Compesatorio', 1),
('Licencia de Ley', 1),
('Vacaciones', 1);



    INSERT INTO `usuarios` (`nombres`, `usuario`, `password`, `n_documento`, `fecha_nacimiento`, `fecha_ingreso`, `cargo`, `puesto_contratado`, `valor_sueldo_letras`, `valor_sueldo`, `foto`, `area`, `permiso`, `bienvenida`, `genero`, `fecha_registro`, `activo`, `supervisor`, `jefe_area`, `nuevo`) VALUES
('Admin principal', 'Admin', '$2y$10$xVHLm03fepd45mhHDi6TB.Em3zGHQySBFLbAO1p4hcc1sDSO/q2Ru', '123654789', '1998-03-21', '2023-04-05', 1, 'Aprendiz', 'un millón ciento sesenta mil ', 1160000, 'assets/img/user/defecto.png', 1, 1, 0, 'M', '2023-08-11 09:31:39', 1, NULL, NULL, 0),
('Bryant Gilberto Grippa Blanco', 'bryant.grippa', '$2y$10$xVHLm03fepd45mhHDi6TB.Em3zGHQySBFLbAO1p4hcc1sDSO/q2Ru', '1251459', '2003-03-21', '2023-11-01', 15, 'Desarrollador web', 'Un millon ciento sesenta mil pesos', 1160000, 'assets/img/user/defecto.png', 3, 3, 0, 'M', '2024-01-15 15:41:09', 1, 11, 2, 0);