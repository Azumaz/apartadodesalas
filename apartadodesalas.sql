-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2018 a las 18:44:21
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apartadodesalas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `pass`) VALUES
(7, 'paulina', '$2y$10$YX7rIzvr29fL6hJ4/0Yg9.In0'),
(8, 'Mayra', '$2y$10$.X/P9raQ1zr5d4dDtktequBTt'),
(9, 'osvaldo1', '$2y$10$Vuu22xVwA6mtWh89D4Ac/.B.V'),
(11, 'osvaldo', '$2y$10$aAxgLkVzv7gR/znCRiyoDOmSZbOeKZTyh5bT.72uxG6NMdIp8h1Vm'),
(15, 'ivan', '$2y$10$ImInlx1F8e8wuvTsVs2ktOE8m9XAmK9dX9hGIY10x7NNIKCTTqj4O'),
(16, 'luis', '$2y$10$A29zpqhWsBTOWOGIMCANxe3/YlW.dzU3IBex5efuqF05tiX1S.IIW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `folio` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`id`, `nombre`, `descripcion`) VALUES
(1, 'mision', 'Formar profesionistas en educación superior tecnológica de calidad, capaces de contribuir a la ciencia, tecnología e investigación con un enfoque creativo e innovador, mediante una educación integral basada en competencias para el desarrollo sustentable de una sociedad incluyente, globalizada, equitativa y humana.'),
(2, 'vision', 'Ser una institución de alto desempeño en educación superior tecnológica, que forme profesionales e investigadores que contribuyan al desarrollo sostenido, sustentable y equitativo de la sociedad.\r\n\r\nCon esta visión el Instituto Tecnológico de Ciudad Juárez busca contribuir a la transformación educativa en México, orientando sus esfuerzos hacia el desarrollo humano sustentable y la competitividad.'),
(3, 'acerca', 'El objetivo de esta aplicación web es ofrecer comodidad al usuario cuando se necesite apartar una sala del ITCJ; de una forma sencilla se muestra también los recursos disponibles para que seleccione lo necesario.\r\n\r\nComo beneficio obtendremos una mejor comunicación entre el usuario y el administrador, rapidez al usar el servicio y se proporciona facilidad con el manejo de los datos al administrador y directivos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `id` int(11) NOT NULL,
  `seleccionados` varchar(65) DEFAULT NULL,
  `folio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `folio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombre`, `status`, `folio`) VALUES
(1, 'osvaldo', 0, 1),
(2, 'osvaldo', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `folio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` text,
  `departamento` text NOT NULL,
  `telefono` text,
  `comentarios` text,
  `salaNombre` text NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'Por decidir',
  `recursosSeleccionados` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`folio`, `nombre`, `correo`, `departamento`, `telefono`, `comentarios`, `salaNombre`, `fecha`, `horaInicio`, `horaFin`, `status`, `recursosSeleccionados`) VALUES
(100, 'valo', 'alex.ruiz@gmail.com', 'sistemas', '016563873411', '0', 'auditorio', '2019-04-06', '03:02:00', '05:00:00', 'Validada', ' fotografia  presidium'),
(101, 'valo', 'alex.ruiz@gmail.com', 'sistemas', '016563873411', '0', 'auditorio', '2019-04-06', '03:02:00', '05:00:00', '0', ' fotografia  presidium'),
(102, 'Mayra Ruiz', 'mayra@gmail.com', 'sistemas', '016563873411', '0', 'Audiovisual', '2019-02-03', '03:01:00', '02:00:00', 'Cancelada', ' fotografia  '),
(103, 'Mayra Ruiz', 'mayra@gmail.com', 'sistemas', '016563873411', 'esto es una prueba', 'Audiovisual', '2019-02-03', '03:01:00', '02:00:00', '0', ' fotografia  '),
(104, 'chavela', 'buiy@gmail.com', 'sistemas', '', '', 'auditorio', '2018-05-04', '01:00:00', '01:00:00', 'Validada', 'audio  podium '),
(105, 'chavela', 'buiy@gmail.com', 'sistemas', '', '', 'auditorio', '2018-05-04', '01:00:00', '01:00:00', 'Usuario solicita cancelar', 'audio  podium '),
(106, 'chavela', 'buiy@gmail.com', 'sistemas', '', '', 'auditorio', '2018-05-04', '01:00:00', '01:00:00', 'Validada', 'audio  podium '),
(107, 'chavela', 'buiy@gmail.com', 'sistemas', '', '', 'auditorio', '2018-05-04', '01:00:00', '01:00:00', 'Cancelada', 'audio  podium '),
(108, 'prueba', 'prueba@gmail.com', '700', '', '', 'Aula Magna', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', ' fotografia  '),
(109, 'oscar', 'oscar@gmail.com', 'Admon.', '', '', 'Aula Magna', '2018-01-01', '01:00:00', '01:00:00', 'Usuario solicita cancelar', ' fotografia podium '),
(110, 'Adolfo Sanchez', 'Sanchez@gmail.com', 'Electrica', '6562891765', 'todo ok', 'auditorio', '2018-01-01', '01:00:00', '01:00:00', 'Cancelada', 'audio fotografia podium presidium'),
(111, 'osvaldo aguirre', 'azumaz@gmail.com', 'sistemas', '6561103100', 'pruebas\r\n', 'zona 1', '2018-08-29', '01:00:00', '14:00:00', 'Por decidir', 'audio  podium '),
(112, 'adolfo gomez', 'gomez@gmail.com', 'Admon.', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', '   '),
(113, 'adolfo gomez', 'gomez@gmail.com', 'Admon.', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', '   '),
(114, 'chavela', 'mayra@gmail.com', 'los 100s', '', '', 'Aula Magna', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', '   '),
(115, 'isabel corral', 'icorral@itcj.edu.mx', 'com y dif', '', '', 'auditorio', '2018-08-22', '08:00:00', '09:00:00', 'Cancelada', 'audio  podium presidium'),
(116, 'juan', 'juan@gmail.com', 'com y dif', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', ' fotografia podium '),
(117, 'osvaldo', 'azumaz@yopmail.com', 'sistemas', '', '', 'Aula Magna', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', '   '),
(118, 'osvaldo', 'mrchirisco@gmail.com', 'sistemas', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Validada', ' fotografia  '),
(119, 'Luis Marquez', 'luismarquez1795@gmail.com', 'sistemas', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', '  podium '),
(120, 'Luis Marquez', 'luismarquez1795@gmail.com', 'sistemas', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Por decidir', '  podium '),
(121, 'Luis Marquez', 'luismarquez1795@gmail.com', 'sistemas', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Validada', '  podium '),
(122, 'LUCERO', 'JOKE201249@GMAIL.COM', 'sistemas', '016562494115', '', 'Audiovisual', '2018-10-25', '14:00:00', '16:30:00', 'Validada', '   '),
(123, 'justino', 'victomacava13@gmail.com', 'sistemas', '016563873411', '', 'Aula Magna', '2018-10-31', '16:00:00', '17:00:00', 'Validada', 'audio fotografia  '),
(124, 'justino', 'victormacava13@gmail.com', 'reno', '', '', 'Audiovisual', '2018-01-01', '01:00:00', '01:00:00', 'Cancelada', '  podium ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `folio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` text NOT NULL,
  `telefono` text NOT NULL,
  `comentarios` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`folio`),
  ADD UNIQUE KEY `folio` (`folio`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`folio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
