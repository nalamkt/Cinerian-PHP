-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2023 a las 17:20:05
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinerian`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `fecha` text NOT NULL,
  `comentario` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generales`
--

CREATE TABLE `generales` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `favicon` text NOT NULL,
  `logo` text NOT NULL,
  `ruta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generales`
--

INSERT INTO `generales` (`id`, `titulo`, `favicon`, `logo`, `ruta`) VALUES
(1, '', '', '', 'http://localhost/cinerian/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_no`
--

CREATE TABLE `peliculas_no` (
  `id` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas_no`
--

INSERT INTO `peliculas_no` (`id`, `id_pelicula`, `id_usuario`) VALUES
(1, 943822, 1),
(3, 505642, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_vistas`
--

CREATE TABLE `peliculas_vistas` (
  `id` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `resena` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas_vistas`
--

INSERT INTO `peliculas_vistas` (`id`, `id_pelicula`, `id_usuario`, `resena`, `comentario`, `fecha`) VALUES
(18, 943822, 26, 4, '', '2023-03-24 08:44:25'),
(19, 505642, 27, 5, '', '2023-03-24 08:45:34'),
(20, 943822, 1, 4, '', '2023-03-24 08:44:25'),
(21, 505642, 1, 5, '', '2023-03-24 08:45:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_seguidor` int(11) NOT NULL,
  `datos_u` text NOT NULL,
  `datos_s` text NOT NULL,
  `seg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguidores`
--

INSERT INTO `seguidores` (`id`, `id_user`, `id_seguidor`, `datos_u`, `datos_s`, `seg`) VALUES
(56, 26, 1, 'María Gaspar-mary@gmail.com-mary', 'Alejandro Petrelli-petrellialejandro@gmail.com-ale', 2),
(57, 27, 1, 'Alejandro Petrelli-petrellialejandro@gmail.com-ale', 'Administrador Mario-111@gmail.com-admin', 1),
(58, 1, 26, 'Alejandro Petrelli-petrellialejandro11@gmail.com-ale', 'María Gaspar-mary@gmail.com-mary', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_seguidor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `id_usuario`, `id_seguidor`, `fecha`, `estado`) VALUES
(52, 1, 27, '2023-02-08 20:21:17', 1),
(59, 1, 26, '2023-02-14 21:45:25', 1),
(61, 26, 1, '2023-02-08 20:21:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `email` text NOT NULL,
  `nombre` text NOT NULL,
  `foto` text NOT NULL,
  `info` text NOT NULL,
  `perfil` int(11) NOT NULL,
  `cod_ver` text NOT NULL,
  `rol` text NOT NULL,
  `eliminado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `email`, `nombre`, `foto`, `info`, `perfil`, `cod_ver`, `rol`, `eliminado`) VALUES
(1, 'ale11', '$2a$07$usesomesillystringforeVNLUvM4fiaAulg0yTettf/aBOAwq1Ri', 'petrellialejandro@gmail.com', 'Alejandro Petrelli11', 'Vistas/img/Usuarios/ale11-1-253.jpg', 'Texto de mi per11212', 0, '', 'Visitante', 0),
(26, 'mary', '$2a$07$usesomesillystringforeVNLUvM4fiaAulg0yTettf/aBOAwq1Ri', 'mary@gmail.com', 'María Gaspar', 'Vistas/img/Usuarios/mary-26-727.png', '', 1, '', 'Visitante', 0),
(27, 'admin', '$2a$07$usesomesillystringforeVNLUvM4fiaAulg0yTettf/aBOAwq1Ri', '111@gmail.com', 'Administrador Mario', '', '', 0, '', 'Visitante', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generales`
--
ALTER TABLE `generales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas_no`
--
ALTER TABLE `peliculas_no`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas_vistas`
--
ALTER TABLE `peliculas_vistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generales`
--
ALTER TABLE `generales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `peliculas_no`
--
ALTER TABLE `peliculas_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculas_vistas`
--
ALTER TABLE `peliculas_vistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
