-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2016 a las 16:02:01
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `micomunidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comunidad`
--

CREATE TABLE IF NOT EXISTS `tb_comunidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `server` varchar(250) DEFAULT NULL,
  `db` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_comunidad`
--

INSERT INTO `tb_comunidad` (`id`, `nombre`, `server`, `db`, `user`, `pass`, `id_estado`) VALUES
(1, 'Comunidad Demo 1', 'localhost', 'wordpress', 'root', '', 1),
(2, 'Comunidad Demo 2', 'localhost', 'wordpress2', 'root', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_comunidad`
--
ALTER TABLE `tb_comunidad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_comunidad`
--
ALTER TABLE `tb_comunidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
