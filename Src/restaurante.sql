-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 03:04:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(2, 'Postres'),
(4, 'Jugos'),
(5, 'Bebidas'),
(6, 'Ensaladas'),
(7, 'Completos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comidas`
--

CREATE TABLE `comidas` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `nombre` text NOT NULL,
  `datos` text NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comidas`
--

INSERT INTO `comidas` (`id`, `categoria`, `nombre`, `datos`, `precio`) VALUES
(2, 'Postres', 'helado', 'hielo y jugo', 1800),
(3, 'Postres', 'Mini empanada', 'una empanada bebe', 100),
(4, 'Jugos', 'Limonada', 'Jugo de limón con jengibre', 800),
(5, 'Ensaladas', 'Lechuga', 'Lechuga con sal y limón', 1500),
(6, 'Completos', 'Italiano', 'Palta, tomate, mayo', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `graficas`
--

CREATE TABLE `graficas` (
  `id` int(11) NOT NULL,
  `total_o` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `graficas`
--

INSERT INTO `graficas` (`id`, `total_o`, `fecha`) VALUES
(15, 9000, '2020-11-25'),
(16, 14500, '2020-12-02'),
(17, 18000, '2020-12-09'),
(18, 9800, '2020-11-29'),
(19, 9800, '2020-11-29'),
(20, 9800, '2020-11-29'),
(21, 2000, '2020-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `c_personas` int(11) NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `numero`, `c_personas`, `estado`) VALUES
(4, 2, 4, 'libre'),
(11, 1, 2, 'ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `mesero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `id_mesa`, `mesero`) VALUES
(20, 11, 'Gutierrez Ricardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `o_pedidos`
--

CREATE TABLE `o_pedidos` (
  `id` int(11) NOT NULL,
  `comida` text NOT NULL,
  `id_orden` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `p_unitario` float NOT NULL,
  `p_total` float NOT NULL,
  `extras` text NOT NULL,
  `listo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `o_pedidos`
--

INSERT INTO `o_pedidos` (`id`, `comida`, `id_orden`, `cantidad`, `p_unitario`, `p_total`, `extras`, `listo`) VALUES
(18, 'Limonada', 7, 3, 800, 2400, '', ''),
(19, 'Mini empanada', 6, 8, 100, 800, '', ''),
(21, 'Limonada', 6, 3, 800, 2400, '', ''),
(25, 'Mini empanada', 6, 3, 100, 300, '', ''),
(34, 'Mini empanada', 6, 2, 100, 200, 'test', ''),
(35, 'Mini empanada', 8, 1, 100, 100, '+', ''),
(36, 'Limonada', 8, 1, 800, 800, '+', ''),
(37, 'helado', 8, 1, 1800, 1800, '+', ''),
(38, 'Limonada', 8, 3, 800, 2400, 'Test', ''),
(39, 'helado', 8, 1, 1800, 1800, '', ''),
(40, 'Limonada', 9, 1, 800, 800, '', ''),
(41, 'Lechuga', 10, 1, 1500, 1500, '', ''),
(42, 'Limonada', 10, 1, 800, 800, '', ''),
(43, 'Italiano', 11, 1, 2000, 2000, '+', ''),
(44, 'Lechuga', 12, 1, 1500, 1500, '', ''),
(45, 'Limonada', 12, 2, 800, 1600, '', ''),
(46, 'Mini empanada', 12, 1, 100, 100, 'que sean de queso, sin camarones\r\n', ''),
(47, 'Mini empanada', 13, 1, 100, 100, '', ''),
(48, 'Lechuga', 13, 1, 1500, 1500, 'sin sal', ''),
(49, 'Mini empanada', 14, 1, 100, 100, '', ''),
(50, 'Lechuga', 14, 1, 1500, 1500, 'sin sal', ''),
(51, 'Mini empanada', 15, 1, 100, 100, '', ''),
(52, 'Lechuga', 15, 1, 1500, 1500, 'sin sal', ''),
(53, 'Italiano', 15, 1, 2000, 2000, 'sin tomate', 'No'),
(54, 'Italiano', 16, 2, 2000, 4000, 'sin tomate', 'No'),
(56, 'Mini empanada', 16, 2, 100, 200, '', 'No'),
(57, 'Lechuga', 16, 1, 1500, 1500, '', 'No'),
(58, 'Limonada', 17, 2, 800, 1600, '', 'Si'),
(59, 'Italiano', 17, 2, 2000, 4000, '', 'Si'),
(60, 'helado', 17, 2, 1800, 3600, '', 'Si'),
(66, 'Italiano', 18, 1, 2000, 2000, '', 'Si'),
(67, 'Lechuga', 18, 1, 1500, 1500, '', 'Si'),
(68, 'Italiano', 19, 1, 2000, 2000, '', 'Terminado'),
(70, 'helado', 19, 1, 1800, 1800, '', 'Terminado'),
(71, 'Limonada', 19, 1, 800, 800, '', 'Servido'),
(72, 'Mini empanada', 19, 1, 100, 100, '', 'Terminado'),
(73, 'Italiano', 19, 1, 2000, 2000, '', 'No'),
(74, 'Lechuga', 19, 1, 1500, 1500, '', 'No'),
(75, 'Limonada', 19, 1, 800, 800, '', 'No'),
(76, 'Limonada', 19, 1, 800, 800, '', 'No'),
(77, 'Italiano', 20, 1, 2000, 2000, '', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `rol`) VALUES
(1, 'Junne', '123', 'jeni', 'avm', 'Administrador'),
(6, 'fabricio', '123', 'Fabricio', 'G', 'Administrador'),
(8, 'Ricki', '123', 'Ricardo', 'Gutierrez', 'Mesero'),
(11, 'juan', '123', 'Juan', 'Jara', 'Cocinero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comidas`
--
ALTER TABLE `comidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `graficas`
--
ALTER TABLE `graficas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `o_pedidos`
--
ALTER TABLE `o_pedidos`
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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comidas`
--
ALTER TABLE `comidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `graficas`
--
ALTER TABLE `graficas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `o_pedidos`
--
ALTER TABLE `o_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
