-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 23:28:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_09_admin`
--

CREATE TABLE `project_09_admin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_09_admin`
--

INSERT INTO `project_09_admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UpdationDate`) VALUES
(1, 'Alejandro', 'admin', 123456789, 'contacto@alejandrovillegas.net', '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-07 18:30:00', '2024-11-26 01:13:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_09_category`
--

CREATE TABLE `project_09_category` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryCode` varchar(50) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_09_category`
--

INSERT INTO `project_09_category` (`id`, `CategoryName`, `CategoryCode`, `PostingDate`) VALUES
(1, 'Bebidas no Alcohólicas', 'Cat001', '2024-11-26 01:34:03'),
(2, 'Alimentos Enlatados y Conservas', 'Cat002', '2024-11-26 01:34:17'),
(3, 'Productos de Panadería y Cereales', 'Cat003', '2024-11-26 01:34:30'),
(4, 'Snacks y Botanas', 'Cat004', '2024-11-26 01:34:44'),
(5, 'Salsas y Condimentos', 'Cat005', '2024-11-26 01:35:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_09_company`
--

CREATE TABLE `project_09_company` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_09_company`
--

INSERT INTO `project_09_company` (`id`, `CompanyName`, `PostingDate`) VALUES
(1, 'Coca-Cola FEMSA', '2024-11-26 01:35:24'),
(2, 'Grupo Bimbo', '2024-11-26 01:35:30'),
(3, 'Nestlé México', '2024-11-26 01:35:36'),
(4, 'Grupo Lala', '2024-11-26 01:35:41'),
(5, 'Herdez', '2024-11-26 01:35:47'),
(6, 'Del Monte México', '2024-11-26 01:35:53'),
(7, 'Maseca (Gruma)', '2024-11-26 01:36:00'),
(8, 'Pepsico México', '2024-11-26 01:36:07'),
(9, 'La Costeña', '2024-11-26 01:36:14'),
(10, 'Alsea (Operadora de marcas de alimentos y bebidas)', '2024-11-26 01:36:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_09_orders`
--

CREATE TABLE `project_09_orders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_09_orders`
--

INSERT INTO `project_09_orders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(1, 12, 1, 774173839, 'Mariana García', 5550123456, 'Efectivo', '2024-11-26 01:56:59'),
(2, 21, 2, 774173839, 'Mariana García', 5550123456, 'Efectivo', '2024-11-26 01:56:59'),
(3, 22, 1, 774173839, 'Mariana García', 5550123456, 'Efectivo', '2024-11-26 01:56:59'),
(4, 15, 2, 244252029, 'Carlos Martínez', 5550987654, 'Tarjeta', '2024-11-26 01:58:11'),
(5, 25, 1, 244252029, 'Carlos Martínez', 5550987654, 'Tarjeta', '2024-11-26 01:58:11'),
(6, 13, 2, 349591835, 'Ana Sánchez', 5552345678, 'Efectivo', '2024-11-26 01:58:55'),
(7, 27, 1, 349591835, 'Ana Sánchez', 5552345678, 'Efectivo', '2024-11-26 01:58:56'),
(8, 29, 1, 666654386, 'Jorge Ramírez', 5555678123, 'Tarjeta', '2024-11-26 01:59:51'),
(9, 27, 1, 666654386, 'Jorge Ramírez', 5555678123, 'Tarjeta', '2024-11-26 01:59:51'),
(10, 14, 1, 666654386, 'Jorge Ramírez', 5555678123, 'Tarjeta', '2024-11-26 01:59:51'),
(11, 16, 1, 666654386, 'Jorge Ramírez', 5555678123, 'Tarjeta', '2024-11-26 01:59:51'),
(12, 17, 3, 732915655, 'Patricia López', 5556789234, 'Efectivo', '2024-11-26 02:01:03'),
(13, 10, 2, 732915655, 'Patricia López', 5556789234, 'Efectivo', '2024-11-26 02:01:03'),
(14, 23, 1, 732915655, 'Patricia López', 5556789234, 'Efectivo', '2024-11-26 02:01:03'),
(15, 26, 1, 732915655, 'Patricia López', 5556789234, 'Efectivo', '2024-11-26 02:01:03'),
(16, 18, 1, 791958268, 'Enrique Rodríguez', 5553456789, 'Tarjeta', '2024-11-26 02:01:55'),
(17, 29, 1, 791958268, 'Enrique Rodríguez', 5553456789, 'Tarjeta', '2024-11-26 02:01:55'),
(18, 22, 2, 791958268, 'Enrique Rodríguez', 5553456789, 'Tarjeta', '2024-11-26 02:01:55'),
(19, 14, 1, 714563870, 'Laura Pérez', 5558765432, 'Efectivo', '2024-11-26 02:02:48'),
(20, 16, 2, 714563870, 'Laura Pérez', 5558765432, 'Efectivo', '2024-11-26 02:02:49'),
(21, 20, 1, 714563870, 'Laura Pérez', 5558765432, 'Efectivo', '2024-11-26 02:02:49'),
(22, 13, 1, 714563870, 'Laura Pérez', 5558765432, 'Efectivo', '2024-11-26 02:02:49'),
(23, 19, 1, 714563870, 'Laura Pérez', 5558765432, 'Efectivo', '2024-11-26 02:02:49'),
(24, 19, 1, 159492109, 'Luis González', 5551357246, 'Tarjeta', '2024-11-26 02:04:01'),
(25, 15, 2, 159492109, 'Luis González', 5551357246, 'Tarjeta', '2024-11-26 02:04:02'),
(26, 25, 1, 159492109, 'Luis González', 5551357246, 'Tarjeta', '2024-11-26 02:04:02'),
(27, 26, 1, 290595187, 'Sofía Martínez', 5558520369, 'Efectivo', '2024-11-26 02:04:45'),
(28, 20, 1, 290595187, 'Sofía Martínez', 5558520369, 'Efectivo', '2024-11-26 02:04:45'),
(29, 21, 3, 290595187, 'Sofía Martínez', 5558520369, 'Efectivo', '2024-11-26 02:04:45'),
(30, 13, 2, 644396470, 'Roberto Díaz', 5551234567, 'Tarjeta', '2024-11-26 02:05:46'),
(31, 29, 1, 644396470, 'Roberto Díaz', 5551234567, 'Tarjeta', '2024-11-26 02:05:46'),
(32, 23, 2, 644396470, 'Roberto Díaz', 5551234567, 'Tarjeta', '2024-11-26 02:05:46'),
(33, 27, 1, 644396470, 'Roberto Díaz', 5551234567, 'Tarjeta', '2024-11-26 02:05:46'),
(34, 17, 1, 644396470, 'Roberto Díaz', 5551234567, 'Tarjeta', '2024-11-26 02:05:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_09_products`
--

CREATE TABLE `project_09_products` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,2) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_09_products`
--

INSERT INTO `project_09_products` (`id`, `CategoryName`, `CompanyName`, `ProductName`, `ProductPrice`, `PostingDate`, `UpdationDate`) VALUES
(9, 'Bebidas no Alcohólicas', 'Coca-Cola FEMSA', 'Coca-Cola en lata 355 ml', 12.00, '2024-11-26 01:37:49', NULL),
(10, 'Bebidas no Alcohólicas', 'Grupo Bimbo', 'Jugos del Valle de naranja 1 L', 22.00, '2024-11-26 01:38:13', NULL),
(11, 'Bebidas no Alcohólicas', 'Nestlé México', 'Nestea Té Frío de durazno 600 ml', 17.00, '2024-11-26 01:38:39', NULL),
(12, 'Bebidas no Alcohólicas', 'Grupo Lala', 'Leche Lala en Tetrapack 1 L', 18.00, '2024-11-26 01:39:05', NULL),
(13, 'Alimentos Enlatados y Conservas', 'Herdez', 'Sopa de fideo en lata 400 g', 18.00, '2024-11-26 01:39:29', NULL),
(14, 'Alimentos Enlatados y Conservas', 'La Costeña', 'Chiles en vinagre enlatados 220 g', 15.00, '2024-11-26 01:40:14', NULL),
(15, 'Alimentos Enlatados y Conservas', 'Del Monte México', 'Atún en agua enlatado 140 g', 25.00, '2024-11-26 01:40:44', NULL),
(16, 'Alimentos Enlatados y Conservas', 'Pepsico México', 'Verduras enlatadas (mezcla) 250 g', 16.00, '2024-11-26 01:41:10', NULL),
(17, 'Productos de Panadería y Cereales', 'Grupo Bimbo', 'Pan de caja Bimbo 680 g', 30.00, '2024-11-26 01:41:42', NULL),
(18, 'Productos de Panadería y Cereales', 'Nestlé México', 'Cereal Cheerios en caja 250 g', 60.00, '2024-11-26 01:42:09', NULL),
(19, 'Productos de Panadería y Cereales', 'Grupo Lala', 'Yogur Lala en envase plástico 250 g', 14.00, '2024-11-26 01:42:41', NULL),
(20, 'Productos de Panadería y Cereales', 'Maseca (Gruma)', 'Harina de maíz Maseca 1 kg', 20.00, '2024-11-26 01:43:06', NULL),
(21, 'Snacks y Botanas', 'Pepsico México', 'Cheetos en bolsa 90 g', 17.00, '2024-11-26 01:43:32', NULL),
(22, 'Snacks y Botanas', 'Grupo Bimbo', 'Galletas Marías en paquete 380 g', 20.00, '2024-11-26 01:44:02', NULL),
(23, 'Snacks y Botanas', 'La Costeña', 'Papas fritas La Costeña en bolsa 200 g', 25.00, '2024-11-26 01:44:33', NULL),
(24, 'Snacks y Botanas', 'Alsea (Operadora de marcas de alimentos y bebidas)', 'Barritas de granola empaquetadas 80 g', 12.00, '2024-11-26 01:45:00', NULL),
(25, 'Salsas y Condimentos', 'Herdez', 'Salsa verde Herdez 230 g', 19.00, '2024-11-26 01:45:18', NULL),
(26, 'Salsas y Condimentos', 'La Costeña', 'Salsa tipo BBQ La Costeña 250 g', 22.00, '2024-11-26 01:45:41', NULL),
(27, 'Salsas y Condimentos', 'Del Monte México', 'Aceite de oliva extra virgen 500 ml', 60.00, '2024-11-26 01:46:04', NULL),
(28, 'Salsas y Condimentos', 'Maseca (Gruma)', 'Salsa de chile seco en paquete 200 g', 25.00, '2024-11-26 01:46:44', NULL),
(29, 'Salsas y Condimentos', 'Nestlé México', 'Mayonesa Helmann’s en Tetrapack 400 g', 45.00, '2024-11-26 01:47:12', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project_09_admin`
--
ALTER TABLE `project_09_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `project_09_category`
--
ALTER TABLE `project_09_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indices de la tabla `project_09_company`
--
ALTER TABLE `project_09_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CompanyName` (`CompanyName`);

--
-- Indices de la tabla `project_09_orders`
--
ALTER TABLE `project_09_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`ProductId`);

--
-- Indices de la tabla `project_09_products`
--
ALTER TABLE `project_09_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compname` (`CompanyName`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `project_09_admin`
--
ALTER TABLE `project_09_admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project_09_category`
--
ALTER TABLE `project_09_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `project_09_company`
--
ALTER TABLE `project_09_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `project_09_orders`
--
ALTER TABLE `project_09_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `project_09_products`
--
ALTER TABLE `project_09_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `project_09_orders`
--
ALTER TABLE `project_09_orders`
  ADD CONSTRAINT `pid` FOREIGN KEY (`ProductId`) REFERENCES `project_09_products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
