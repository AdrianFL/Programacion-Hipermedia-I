-- phpMyAdmin SQL Dump
-- version 4.6.5.1deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-12-2016 a las 13:18:47
-- Versión del servidor: 5.6.30-1
-- Versión de PHP: 7.0.13-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pibd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `IdAlbum` int(11) NOT NULL,
  `Titulo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`IdAlbum`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Usuario`) VALUES
(1, 'El gran Album', 'El mejor album de la historia', '2016-11-17 10:50:27', 2, 1),
(2, 'El segundo album', 'Joder que buen album', '2016-11-17 15:52:56', 7, 4),
(3, 'Er Mejoh Arbuhm Porque sare er admin', 'Este john nieve tiene 2 albumes que cabron', '2016-11-17 15:52:56', 5, 4),
(5, 'funciona', 'joder como funcione salto de alegria OMg', '2016-12-08 00:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `IdFoto` int(11) NOT NULL,
  `Titulo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `Album` int(11) NOT NULL,
  `Fichero` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `FRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`IdFoto`, `Titulo`, `Descripcion`, `Fecha`, `Pais`, `Album`, `Fichero`, `FRegistro`) VALUES
(1, 'La venganza de los sith', 'Venganza de un muñeco anime de los siths que le quitaron su sombrilla.', '2016-11-01 09:24:12', 1, 1, 'resources/foto1.jpg', '2016-11-17 00:00:00'),
(2, 'Amor stalinista', 'Torrida historia de amor narrada en \"Tu al gulag y yo a California\"', '1946-04-13 15:26:24', 3, 1, 'resources/foto2.jpg', '2016-11-17 01:03:23'),
(3, 'Viva Cthulhu', 'Ia! Ia! Cthulhu Fthagn!', '1010-10-14 13:26:27', 4, 2, 'resources/foto3.jpg\\r\\n', '2016-11-17 01:03:09'),
(4, 'Penelope sonriente', 'Penelope sonriendo por la felicidad de su corazón.', '2016-11-01 16:42:36', 6, 2, 'resources/foto4.jpg', '2016-11-17 00:00:25'),
(5, 'Nuestro querido administrador', 'Nuestro querido y adorado administrador, diseñador de esta fabulosa página web.', '2016-11-02 12:21:27', 1, 3, 'resources/foto5.jpg', '2016-11-17 00:44:28'),
(6, 'Rick y Morty', 'Rick y Morty sorprendidos', '2016-09-21 14:32:00', 1, 3, 'resources/foto6.jpg', '2016-11-17 00:55:35'),
(12, 'fotita', '', '2016-12-15 00:00:00', 1, 5, 'subidas/marioga/funciona/foto5.jpg', '2016-12-15 11:56:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `IdPais` int(11) NOT NULL,
  `NomPais` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`IdPais`, `NomPais`) VALUES
(1, 'España'),
(2, 'Francia'),
(3, 'Reino Unido'),
(4, 'Alemania'),
(5, 'Iran'),
(6, 'Emiratos Arabes Unidos'),
(7, 'República democátrica del Congo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `IdSolicitud` int(11) NOT NULL,
  `Album` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Titulo` text COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Emai` text COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Color` text COLLATE utf8_unicode_ci NOT NULL,
  `Copias` int(11) NOT NULL,
  `Resolucion` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `IColor` tinyint(1) NOT NULL,
  `FRegistro` datetime NOT NULL,
  `Coste` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NomUsuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Clave` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Email` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Sexo` smallint(6) NOT NULL,
  `FNacimiento` date NOT NULL,
  `Ciudad` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Pais` int(11) NOT NULL,
  `Foto` mediumtext COLLATE utf8_unicode_ci,
  `FRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NomUsuario`, `Clave`, `Email`, `Sexo`, `FNacimiento`, `Ciudad`, `Pais`, `Foto`, `FRegistro`) VALUES
(1, 'AdrianFL', 'admin', 'admin@admin.es', 1, '2015-09-16', 'Alicante', 1, NULL, '2016-11-17 04:17:39'),
(2, 'ManuelJG', 'admin', 'admin@admin.com', 1, '2016-11-01', 'Elche', 1, NULL, '2016-11-17 04:18:43'),
(3, 'Usuario1', 'user', 'user@user.es', 1, '2016-11-07', 'Alicante', 4, NULL, '2016-11-17 04:19:36'),
(4, 'JonNieve', 'qwerty1234', 'nosabenada@invernalia.com', 1, '1990-05-17', 'Invernalia', 5, NULL, '2016-11-17 14:36:02'),
(5, 'marioga', 'Numero2', 'marioga2512@gmail.com', 1, '2003-07-11', 'adasdada', 1, 'subidas/marioga/foto6.jpg', '2016-12-15 10:46:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`IdAlbum`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`IdFoto`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`IdPais`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`IdSolicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NomUsuario` (`NomUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `IdAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `IdFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `IdPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `IdSolicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
