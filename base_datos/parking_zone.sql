-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2021 a las 23:55:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parking_zone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_sesion`
--

CREATE TABLE `administrador_sesion` (
  `num_contrato` varchar(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador_sesion`
--

INSERT INTO `administrador_sesion` (`num_contrato`, `nombre`, `correo`, `contraseña`) VALUES
('002345', 'admin', 'admin@gmail.com', 'admin67'),
('2142329', 'andres', 'amlozano055@misena.edu.co', 'andres32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(20) NOT NULL,
  `apellido1_cliente` varchar(20) NOT NULL,
  `num_documento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `num_documento` varchar(10) NOT NULL,
  `nombre_empleado` varchar(30) NOT NULL,
  `telefono-empelado` varchar(10) NOT NULL,
  `sueldobase_empleado` decimal(50,0) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `cod_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_factura` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valor_total` decimal(30,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueaderos`
--

CREATE TABLE `parqueaderos` (
  `cod_parqueadero` int(11) NOT NULL,
  `nombre_parqueadero` varchar(100) NOT NULL,
  `direccion_parqueadero` varchar(100) NOT NULL,
  `tipo` enum('publico','privado') NOT NULL,
  `estado` enum('abierto','cerrado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `num_matricula` varchar(10) NOT NULL,
  `fecha_entrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id`, `nombres`, `apellido`, `apellido1`, `documento`, `marca`, `num_matricula`, `fecha_entrada`) VALUES
(1, 'fernando', 'lozano', 'olivero', '93128975', 'susuzi', 'ffd123', '2021-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `cod_tarifa` int(11) NOT NULL,
  `tipo` enum('automovil','motocicleta','taxi','avg','bicicleta') NOT NULL,
  `vr_minuto` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquetes`
--

CREATE TABLE `tiquetes` (
  `num_tiquete` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `hora_ingreso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sesion`
--

CREATE TABLE `usuario_sesion` (
  `nombre` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_sesion`
--

INSERT INTO `usuario_sesion` (`nombre`, `correo`, `contraseña`) VALUES
('angie', 'angie13@gmail.com', 'angie123'),
('andres', 'amlozano055@misena.edu.co', 'f70a50b47e'),
('fernando', 'fernandolozano098@gmail.com', 'fernando12'),
('julian', 'julio@misena.edu.co', 'julian123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `num_matricula` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `num_matricula`, `marca`, `color`, `tipo`, `fecha_entrada`) VALUES
(1, 'ffd123', 'susuzi', 'azul', 'automovil', '2021-06-11 21:55:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador_sesion`
--
ALTER TABLE `administrador_sesion`
  ADD PRIMARY KEY (`num_contrato`,`contraseña`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`num_documento`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`cod_factura`);

--
-- Indices de la tabla `parqueaderos`
--
ALTER TABLE `parqueaderos`
  ADD PRIMARY KEY (`cod_parqueadero`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id`,`documento`,`num_matricula`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`cod_tarifa`);

--
-- Indices de la tabla `tiquetes`
--
ALTER TABLE `tiquetes`
  ADD PRIMARY KEY (`num_tiquete`);

--
-- Indices de la tabla `usuario_sesion`
--
ALTER TABLE `usuario_sesion`
  ADD PRIMARY KEY (`contraseña`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`,`num_matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `cod_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parqueaderos`
--
ALTER TABLE `parqueaderos`
  MODIFY `cod_parqueadero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tiquetes`
--
ALTER TABLE `tiquetes`
  MODIFY `num_tiquete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
