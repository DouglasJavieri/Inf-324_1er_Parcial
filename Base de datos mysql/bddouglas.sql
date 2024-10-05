-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-10-2024 a las 03:51:17
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
-- Base de datos: `bddouglas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_catastro` int(11) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `superficie_m2` decimal(10,2) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_catastro`, `distrito`, `zona`, `superficie_m2`, `fecha_registro`, `id_ci`) VALUES
(1000, 'COTAHUMA', 'Llojeta', 200.00, '2024-09-13', 2),
(1001, 'SUR', 'Obrajes', 250.00, '2024-01-05', 3),
(1003, 'SUR', 'Irpavi', 500.00, '2024-04-22', 9),
(1004, 'SUR', 'San Miguel', 350.00, '2023-09-15', 10),
(1005, 'SUR', 'Calacoto', 280.00, '2022-12-19', 11),
(2000, 'COTAHUMA', 'Tembladerani', 225.00, '2024-03-15', 4),
(2001, 'MALLASA', 'Aranjuez', 500.00, '2024-05-16', 5),
(2002, 'SAN ANTONIO', 'Pampahasi', 100.00, '2022-09-22', 12),
(2003, 'CENTRO', 'Miraflores', 100.00, '2023-12-12', 13),
(2004, 'CENTRO', 'San Jorge', 170.00, '2023-11-02', 14),
(3000, 'SAN ANTONIO', 'Kupini', 200.00, '2024-02-01', 6),
(3001, 'CENTRO', 'Centro', 150.00, '2024-06-06', 7),
(3002, 'SUR', 'Cota cota', 300.00, '2024-07-07', 8),
(3003, 'MAX PAREDES', 'Gran Poder', 200.00, '2022-10-29', 15),
(3004, 'COTAHUMA', 'Alpacoma', 180.00, '2023-06-16', 16),
(3005, 'CENTRO', 'San Jorge', 250.00, '2024-07-25', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_ci` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `carnet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_ci`, `nombre`, `paterno`, `materno`, `telefono`, `email`, `nombre_usuario`, `contraseña`, `id_cargo`, `carnet`) VALUES
(1, 'Gabriel', 'Limachi', 'Pacheco', '78759258', 'gabriel@gmail.com', 'gabo', '123456', 1, 10883578),
(2, 'Renata', 'Condori', 'Perez', '76289456', 'renata@gmail.com', 'rena', '987654', 2, 7079754),
(3, 'Abad', 'Peralta', 'Choque', '76996321', 'abad@gmail.com', 'aba', '123456', 2, 12905688),
(4, 'Carlos', 'Ramirez', 'Gonzalez', '76543210', 'carlos.ramirez@gmail.com', 'carlos123', 'pass123', 2, 10024567),
(5, 'Lucia', 'Martinez', 'Vega', '71234567', 'lucia.martinez@gmail.com', 'lucia89', 'password89', 2, 10345678),
(6, 'Pedro', 'Lopez', 'Quispe', '70987654', 'pedro.lopez@gmail.com', 'pedro', 'lopez2023', 2, 10987654),
(7, 'Ana', 'Suarez', 'Mendoza', '72837465', 'ana.suarez@gmail.com', 'ana123', 'ana_secure', 2, 11324567),
(8, 'Felipe', 'Gonzalez', 'Pires', '76277625', 'felipe56@gmail.com', 'felipe56', '123456', 2, 12457896),
(9, 'Maximo', 'Oviedo', 'Colquehuanca', '78765412', 'maxi@gmail.com', 'maxi', '123546', 2, 10659874),
(10, 'Sofía', 'Gonzales', 'Torres', '76543211', 'sofia.gonzales@gmail.com', 'sofia2023', 'sofia_pass', 2, 10024568),
(11, 'Diego', 'Mendoza', 'Flores', '71234568', 'diego.mendoza@gmail.com', 'diego_89', 'diego_secure', 2, 10345679),
(12, 'Valeria', 'Martinez', 'Salazar', '70987655', 'valeria.martinez@gmail.com', 'valeria123', 'valeria_pass', 2, 10987655),
(13, 'Felipe', 'Rojas', 'Quispe', '72837466', 'felipe.rojas@gmail.com', 'felipe456', 'felipe_secure', 2, 11324568),
(14, 'Luciano', 'Hernandez', 'Alvarez', '76492838', 'luciano.hernandez@gmail.com', 'luciano789', 'luciano_pass', 2, 12105433),
(15, 'Marta', 'Cruz', 'Sánchez', '76543212', 'marta.cruz@gmail.com', 'marta2024', 'marta_secure', 2, 10024569),
(16, 'Andrés', 'Vargas', 'Peña', '71234569', 'andres.vargas@gmail.com', 'andres_01', 'andres_pass', 2, 10345680),
(17, 'Rafael', 'Medina', 'Poma', '78945612', 'pomarafa@gamil.com', 'rafamedi', '1234567', 2, 10528963);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_catastro`),
  ADD KEY `id_ci` (`id_ci`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_ci`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `usuario_ibfk_1` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_catastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30036;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_ci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`id_ci`) REFERENCES `usuario` (`id_ci`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
