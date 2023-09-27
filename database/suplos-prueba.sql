-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 23:14:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `suplos-prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(20) NOT NULL,
  `codigo_segmento` varchar(40) DEFAULT NULL,
  `nombre_segmento` varchar(200) DEFAULT NULL,
  `codigo_familia` varchar(40) DEFAULT NULL,
  `nombre_familia` varchar(200) DEFAULT NULL,
  `codigo_clase` varchar(250) DEFAULT NULL,
  `nombre_clase` varchar(250) DEFAULT NULL,
  `codigo_producto` varchar(250) DEFAULT NULL,
  `nombre_producto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `codigo_segmento`, `nombre_segmento`, `codigo_familia`, `nombre_familia`, `codigo_clase`, `nombre_clase`, `codigo_producto`, `nombre_producto`) VALUES
(2, '10', 'Material Vivo Vegetal y Animal, Accesorios y Suministros', '1045', 'Orquídeas cortadas secas', '104520', 'Orquídea phalaenopsis cortada seca ', '10452059', 'Orquídea phalaenopsis cortada seca taenialis'),
(3, '11', 'Material Mineral, Textil y  Vegetal y Animal No Comestible', '1110', 'Minerales, minerales metálicos y metales', '111015', 'Minerales', '11101501', 'Carnalita'),
(4, '12', 'Material Químico incluyendo Bioquímicos y Materiales de Gas', '1213', 'Materiales explosivos', '121318', 'Propulsores', '12131804', 'Uranio u'),
(5, '13', 'Materiales de Resina, Colofonia, Caucho, Espuma, Película y Elastómericos', '1310', 'Caucho y elastómeros', '131020', 'Plásticos termoplásticos', '13102003', 'Aleaciones de acrilonitrilo butadieno estireno abs'),
(6, '14', 'Materiales y Productos de Papel', '1411', 'Productos de papels', '141115', 'Papel de imprenta y papel de escribir', '14111534', 'Papel para impresora o fotocopiadora'),
(7, '15', 'Materiales Combustibles, Aditivos para Combustibles, Lubricantes y Anticorrosivos', '1511', 'Combustibles gaseosos y aditivos', '151115', 'Combustibles gaseosos', '15111505', 'Inhibidores de hielo para sistemas de combustibles'),
(8, '20', 'Maquinaria y Accesorios de Minería y Perforación de Pozos', '2010', 'Maquinaria y equipo de minería y explotación de canteras', '201017', 'Trituradoras, quebrantadoras y amoladores', '20101712', 'Taladros de barreno profundo'),
(9, '21', 'Maquinaria y Accesorios para Agricultura, Pesca, Silvicultura y Fauna', '2110', 'Maquinaria y equipo para agricultura, silvicultura y paisajismo', '211016', 'Maquinaria agrícola para siembra y plantado', '21101612', 'Germinador de semillas'),
(10, '22', 'Maquinaria y Accesorios para Construcción y Edificación', '2210', 'Maquinaria y equipo pesado de construcción', '221016', 'Equipo de pavimentación', '22101621', 'Distribuidora de asfalto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(20) NOT NULL,
  `titulo_docu` varchar(200) DEFAULT NULL,
  `descripcion_docu` text NOT NULL,
  `nombre_docu` varchar(100) NOT NULL,
  `ubicacion_docu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `titulo_docu`, `descripcion_docu`, `nombre_docu`, `ubicacion_docu`) VALUES
(1, 'Prueba  ', 'Prueba suplos ', '', ''),
(2, 'Hola', 'Hola', '', 'C:/xampp/htdocs/suplos-prueba/archivosDocumento/Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf'),
(3, 'Pruebas suplos ', 'Suplos 1', 'Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf', '../archivosDocumento/Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf'),
(4, 'Pruebas suplos', 'HOla', 'Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf', '../archivosDocumento/Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf'),
(8, 'probando', 'probando', 'Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf', '../archivosDocumento/Prueba de desarrollo FullStack 2023_Suplos_V2_EVO.pdf'),
(14, 'Hola', 'HOla', 'Prueba de desarrollo FullStack 2023_Suplos.pdf', '../archivosDocumento/Prueba de desarrollo FullStack 2023_Suplos.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docu_procesos`
--

CREATE TABLE `docu_procesos` (
  `id` int(20) NOT NULL,
  `id_proceso` int(20) DEFAULT NULL,
  `id_documento` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id` int(20) NOT NULL,
  `proc_nombre_responsable` varchar(100) DEFAULT NULL,
  `actividades_id` int(20) DEFAULT NULL,
  `proc_objeto` varchar(250) DEFAULT NULL,
  `proc_descripcion` text DEFAULT NULL,
  `proc_moneda` enum('COP','USD','EUR','') DEFAULT NULL,
  `proc_presupuesto` decimal(10,0) DEFAULT NULL,
  `proc_estado` varchar(15) DEFAULT NULL,
  `proc_fecha_inicio` date DEFAULT NULL,
  `proc_hora_inicio` time DEFAULT NULL,
  `proc_fecha_fin` date DEFAULT NULL,
  `proc_hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id`, `proc_nombre_responsable`, `actividades_id`, `proc_objeto`, `proc_descripcion`, `proc_moneda`, `proc_presupuesto`, `proc_estado`, `proc_fecha_inicio`, `proc_hora_inicio`, `proc_fecha_fin`, `proc_hora_fin`) VALUES
(4, 'Carmen Cecilia', 10, 'PC', 'PC HP', 'USD', 855555, 'Evaluado', '2023-09-26', '13:01:00', '2023-09-26', '13:02:00'),
(5, 'Alberto Herazo', 3, 'Celular', 'Samsung', 'COP', 356365356, 'Evaluado', '2023-09-26', '13:08:00', '2023-09-26', '13:09:00'),
(7, 'Jorge', 2, 'Pagina', 'Hola Pagina', 'EUR', 12351445, 'Evaluado', '2023-09-26', '15:03:00', '2023-09-26', '15:04:00'),
(9, 'Patricio Jimenez', 10, 'Comando', 'Comando Moto', 'USD', 500, 'Publicado', '2023-09-27', '00:00:00', '2023-09-28', '00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docu_procesos`
--
ALTER TABLE `docu_procesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_documento` (`id_documento`),
  ADD KEY `id_proceso` (`id_proceso`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_id` (`actividades_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `docu_procesos`
--
ALTER TABLE `docu_procesos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docu_procesos`
--
ALTER TABLE `docu_procesos`
  ADD CONSTRAINT `docu_procesos_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docu_procesos_ibfk_2` FOREIGN KEY (`id_proceso`) REFERENCES `procesos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD CONSTRAINT `procesos_ibfk_1` FOREIGN KEY (`actividades_id`) REFERENCES `actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
