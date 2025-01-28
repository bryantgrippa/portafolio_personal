INSERT INTO `permiso` (`id_permiso`, `detalles`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `nit`, `correo`, `contacto_nombre`, `contacto_cel`) VALUES
(1, 'SGA', 2671337, 'SGA@sena.com', 'bryant grippa', '2147483647');

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `contraseña`, `permiso`) VALUES
(1, 'Administrador Principal', 'admin', '123', 1),
(2, 'Edwin Albeiro Ramos', 'profealbeiro', '2671337', 2);
