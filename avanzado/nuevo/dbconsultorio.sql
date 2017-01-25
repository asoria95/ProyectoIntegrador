-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2017 a las 19:44:00
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbconsultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `TITULO` varchar(20) DEFAULT NULL,
  `EXPERIENCIA` varchar(70) DEFAULT NULL,
  `CEDULA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `NUMERO_CONSULTA` int(11) NOT NULL,
  `FECHACONSULTA` date NOT NULL,
  `HORACONSULTA` time NOT NULL,
  `HORATERMINO` time NOT NULL,
  `DIAGNOSTICO` varchar(70) DEFAULT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `CONDUCTA_SEGUIR` varchar(300) DEFAULT NULL,
  `CEDULA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`NUMERO_CONSULTA`, `FECHACONSULTA`, `HORACONSULTA`, `HORATERMINO`, `DIAGNOSTICO`, `PRECIO`, `CONDUCTA_SEGUIR`, `CEDULA`) VALUES
(20, '2017-01-01', '09:30:00', '10:00:00', 'dsadsadsa', '25.36', NULL, '172179606-6'),
(21, '2017-01-02', '15:30:00', '16:00:00', 'Gripe', '20.50', ' Primero se realizo los chequeos bÃ¡sicos, luego se realizaron exÃ¡menes', '172179606-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `NUM_FACTURA` int(11) NOT NULL,
  `FECHA_FACTURA` date NOT NULL,
  `SUBTOTAL` decimal(10,2) NOT NULL,
  `IVA` decimal(10,2) NOT NULL,
  `VALOR_PAGAR` decimal(10,2) NOT NULL,
  `NUMERO_CONSULTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `ID_HISTORIACLINICA` int(11) NOT NULL,
  `CEDULA` varchar(11) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `ANTECEDENTESPATOLOGICOS` varchar(70) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeria`
--

CREATE TABLE `mensajeria` (
  `ID_MENSAJERIA` varchar(5) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(70) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `CONTRASENIA` varchar(16) NOT NULL,
  `GRUPO_PRIORITARIO` varchar(14) DEFAULT NULL,
  `CEDULA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`CONTRASENIA`, `GRUPO_PRIORITARIO`, `CEDULA`) VALUES
('12345', '', '172179606-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `CEDULA` varchar(11) NOT NULL,
  `NOMBRES` varchar(50) NOT NULL,
  `APELLIDOS` varchar(70) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `TELEFONO` char(10) NOT NULL,
  `SEXO` varchar(12) NOT NULL,
  `GENERO` varchar(30) NOT NULL,
  `DIRECCION` varchar(50) NOT NULL,
  `CORREO` varchar(70) NOT NULL,
  `EDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`CEDULA`, `NOMBRES`, `APELLIDOS`, `FECHA_NACIMIENTO`, `TELEFONO`, `SEXO`, `GENERO`, `DIRECCION`, `CORREO`, `EDAD`) VALUES
('172179606-6', 'ALEX FERNANDO', 'SORIA PAREDES', '1995-10-17', '0996674478', 'MASCULINO', 'HETEROSEXUAL', 'AV. CANONIGO RAMOS', 'alex4jme@hotmail.com', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `IDRESERVAS` int(11) NOT NULL,
  `FECHARESERVA` date NOT NULL,
  `HORARESERVA` time NOT NULL,
  `CEDULA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CEDULA`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`NUMERO_CONSULTA`),
  ADD KEY `FK_CONSULTAS_PERSONAS` (`CEDULA`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`NUM_FACTURA`),
  ADD KEY `FK_FACTURAS_CONSULTAS` (`NUMERO_CONSULTA`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD PRIMARY KEY (`ID_HISTORIACLINICA`),
  ADD KEY `FK_HISTORIACLINICA_PACIENTES` (`CEDULA`);

--
-- Indices de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD PRIMARY KEY (`ID_MENSAJERIA`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`CEDULA`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`CEDULA`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IDRESERVAS`),
  ADD KEY `FK_RESERVAS_PACIENTES` (`CEDULA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `NUMERO_CONSULTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `NUM_FACTURA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `ID_HISTORIACLINICA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `IDRESERVAS` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FK_ADMINISTRADOR_PERSONAS` FOREIGN KEY (`CEDULA`) REFERENCES `personas` (`CEDULA`);

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `FK_CONSULTAS_PERSONAS` FOREIGN KEY (`CEDULA`) REFERENCES `pacientes` (`CEDULA`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `FK_FACTURAS_CONSULTAS` FOREIGN KEY (`NUMERO_CONSULTA`) REFERENCES `consultas` (`NUMERO_CONSULTA`);

--
-- Filtros para la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD CONSTRAINT `FK_HISTORIACLINICA_PACIENTES` FOREIGN KEY (`CEDULA`) REFERENCES `pacientes` (`CEDULA`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `FK_PACIENTES_PERSONAS` FOREIGN KEY (`CEDULA`) REFERENCES `personas` (`CEDULA`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `FK_RESERVAS_PACIENTES` FOREIGN KEY (`CEDULA`) REFERENCES `pacientes` (`CEDULA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
