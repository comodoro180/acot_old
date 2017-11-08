-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2017 a las 21:53:20
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `clave`, `fecha_registro`, `activo`) VALUES
(73, 'Carlos Arturo Hoyos R', 'carlos.arturo.hoyos@gmail.com', '$2y$10$BWQjiKPQzqu943yCczXJAeTqvTVIhOfuGwJJu4HZ1AyIGjOZAZF62', '2017-11-06 22:12:25', 1),
(74, 'q', 'q@q.com', '$2y$10$t5pddZnIsw7nT9.yGIzI9O4L8DwcB7iFtiC7ZmqoiaCsBgECxmfUW', '2017-11-07 20:12:49', 0),
(75, 'qq', 'qq@q.com', '$2y$10$/zAB.Gu9mSoxV7d7c2fViOTs.ZuaNkaOKx5ws9/szPoe0nttPxcZK', '2017-11-07 20:50:02', 0),
(76, 'qqq', 'qqq@q.com', '$2y$10$Vey5DFfrYJ83cWxluqtJ/ermjIBWirAUoz1b/BffkYP3QHF1N6NWm', '2017-11-07 20:53:46', 0),
(77, 'a', 'a@a.com', '$2y$10$iMll2wzKsbfaRprjPeWXFuMrSUzgcVD7p9Vmvg2f1uG1xBSUnJagO', '2017-11-07 20:55:39', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_codigo`
--

CREATE TABLE `usuario_codigo` (
  `usuario_id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuario_codigo`
--
ALTER TABLE `usuario_codigo`
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_codigo`
--
ALTER TABLE `usuario_codigo`
  ADD CONSTRAINT `usuario_codigo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
