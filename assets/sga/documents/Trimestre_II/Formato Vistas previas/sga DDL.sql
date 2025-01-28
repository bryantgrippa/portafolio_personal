CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `detalles` varchar(50) NOT NULL
);

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL COMMENT 'numero de identificacion del producto',
  `nombre` varchar(100) NOT NULL COMMENT 'nombre del producto',
  `precio` bigint(20) NOT NULL COMMENT 'precio del producto',
  `fecha_ingreso` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de ingreso con la fecha actual',
  `talla` varchar(100) DEFAULT NULL COMMENT 'detalles extra del producto',
  `cantidad` bigint(100) DEFAULT 0,
  `fecha_modificado` datetime DEFAULT current_timestamp(),
  `proveedor` int(11) NOT NULL
);

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nit` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contacto_nombre` varchar(100) DEFAULT NULL,
  `contacto_cel` varchar(20) DEFAULT NULL
);

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `fecha_venta` datetime DEFAULT current_timestamp(),
  `cantidad` bigint(20) NOT NULL,
  `cliente_nombre` varchar(100) DEFAULT NULL,
  `cliente_id` int(22) DEFAULT NULL,
  `cliente_contacto` varchar(100) DEFAULT NULL,
  `cliente_direccion` varchar(150) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
);

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `permiso` int(11) NOT NULL
);

ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `PROVEEDOR` (`proveedor`);

ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `nit` (`nit`);

ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `producto2` (`producto`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `permiso` (`permiso`);

ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'numero de identificacion del producto';

ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `producto`
  ADD CONSTRAINT `PROVEEDOR` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `salida`
  ADD CONSTRAINT `PRODUCTO` FOREIGN KEY (`producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `usuario`
  ADD CONSTRAINT `PERMISO` FOREIGN KEY (`permiso`) REFERENCES `permiso` (`id_permiso`) ON DELETE CASCADE ON UPDATE CASCADE;
