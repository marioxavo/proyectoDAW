-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2016 a las 18:57:23
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `work`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5f51747d640e57351d0ebc66730ffbd028731bcb', '::1', 1462915796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323931353539393b6e6f6d6272657c733a393a22616c62657274696b69223b6c6f6767696e7c623a313b),
('6d55a099f8ec1ff0881337926e6e5f45065e487b', '::1', 1462779788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323737393734303b),
('7e21c9249c2392fd51d4ebe640f5d6a1b75b29bd', '::1', 1462915726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436323931353639333b),
('8a7a19db0cfebe78cea1f977353935a1d3a99b4b', '::1', 1462779926, 0x6e6f6d6272657c733a393a22616c62657274696b69223b6c6f6767696e7c623a313b5f5f63695f6c6173745f726567656e65726174657c693a313436323737393735303b),
('f6e706df0cf5d00c91d16387d94ee91e6bab7dc6', '::1', 1462780274, 0x6e6f6d6272657c733a393a22616c62657274696b69223b6c6f6767696e7c623a313b5f5f63695f6c6173745f726567656e65726174657c693a313436323738303237343b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuarios`
--

CREATE TABLE `grupo_usuarios` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_usuarios`
--

INSERT INTO `grupo_usuarios` (`id_grupo`, `nombre`) VALUES
(1, 'trabajador'),
(2, 'empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `texto_oferta` text NOT NULL,
  `categoria` int(11) NOT NULL,
  `candidatos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `habilidades` text NOT NULL,
  `estudios` text NOT NULL,
  `experiencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `id_usuario`, `nombre`, `habilidades`, `estudios`, `experiencia`) VALUES
(1, 1, 'Mario Caballero Iniesta', 'Makina', 'Makina', 'Makina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_empresa`
--

CREATE TABLE `perfiles_empresa` (
  `id_perfil` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_completo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles_empresa`
--

INSERT INTO `perfiles_empresa` (`id_perfil`, `id_usuario`, `titulo_completo`, `descripcion`) VALUES
(2, 4, 'AnimeEspQueTeden.Inc', 'Ter voy a matar kbrn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_grupo_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `id_grupo_usuarios`) VALUES
(1, 'marioxavo', 'marioxavo@gmail.com', 'work1234', 1),
(2, 'albertiki', 'albertiki96@gmail.com', 'albertiki', 1),
(4, 'animeEsp', 'animeEsp@alberto.com', 'animeEsp', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfiles_empresa`
--
ALTER TABLE `perfiles_empresa`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `perfiles_empresa`
--
ALTER TABLE `perfiles_empresa`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
