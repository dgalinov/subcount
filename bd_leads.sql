-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2018 a las 14:36:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_leads`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogmail`
--

CREATE TABLE `blogmail` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blogmail`
--

INSERT INTO `blogmail` (`id`, `subject`, `content`) VALUES
(1, 'Step 1', '<p>AWEfiawefo</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_l1` int(30) NOT NULL,
  `name_l1` varchar(255) NOT NULL,
  `id_l2` int(30) NOT NULL,
  `name_l2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_l1`, `name_l1`, `id_l2`, `name_l2`) VALUES
(1, 'Management', 1, 'Strategic /'),
(1, 'Management', 2, 'New Busines'),
(1, 'Management', 3, 'Business Mo'),
(1, 'Management', 4, 'Innovation '),
(1, 'Management', 5, 'Business Pl'),
(1, 'Management', 6, 'Industry 4.'),
(1, 'Management', 7, 'Internation'),
(1, 'Management', 8, 'Law & Tax'),
(2, 'Marketing', 9, 'New Product'),
(2, 'Marketing', 10, 'Consumer Be'),
(2, 'Marketing', 11, 'Communicati'),
(2, 'Marketing', 12, 'New Market '),
(2, 'Marketing', 13, 'Brand Manag'),
(2, 'Marketing', 14, 'Media - Gam'),
(3, 'Human Resources', 15, 'Future of W'),
(3, 'Human Resources', 16, 'Learning & '),
(3, 'Human Resources', 17, 'Employer Br'),
(3, 'Human Resources', 18, 'Employee En'),
(3, 'Human Resources', 19, 'Health & Sa'),
(3, 'Human Resources', 20, 'Organizatio'),
(4, 'Finance', 21, 'Cryptocurre'),
(4, 'Finance', 22, 'Internation'),
(4, 'Finance', 23, 'Accounting '),
(4, 'Finance', 24, 'Procurement'),
(5, 'Logistics, Supply Chain & Oper', 25, 'Logistics &'),
(5, 'Logistics, Supply Chain & Oper', 26, 'Closed-loop'),
(5, 'Logistics, Supply Chain & Oper', 27, 'Forecast - '),
(5, 'Logistics, Supply Chain & Oper', 28, 'Supply Chai'),
(5, 'Logistics, Supply Chain & Oper', 29, 'Operations '),
(5, 'Logistics, Supply Chain & Oper', 30, 'Supplier Ne'),
(6, 'Sustainability', 31, 'Circular Ec'),
(6, 'Sustainability', 32, 'Social Ente'),
(6, 'Sustainability', 33, 'Sustainable'),
(6, 'Sustainability', 34, 'Smart City '),
(6, 'Sustainability', 35, 'Environment'),
(7, 'Computer Science', 36, 'Security - '),
(7, 'Computer Science', 37, 'Project & S'),
(7, 'Computer Science', 38, 'Experience '),
(7, 'Computer Science', 39, 'App & Platf'),
(7, 'Computer Science', 40, 'Building In'),
(7, 'Computer Science', 41, 'Blockchain'),
(7, 'Computer Science', 42, 'Hard- & Sof'),
(7, 'Computer Science', 43, 'Virtual & A'),
(8, 'Data Science', 44, 'Machine Lea'),
(8, 'Data Science', 45, 'Artificial '),
(8, 'Data Science', 46, 'Data Modeli'),
(8, 'Data Science', 47, 'Business Da'),
(8, 'Data Science', 48, 'Decision Su'),
(9, 'Engineering', 49, 'Robotics & '),
(9, 'Engineering', 50, 'Autonomous '),
(9, 'Engineering', 51, 'Electric / '),
(9, 'Engineering', 52, 'Chemical pr'),
(9, 'Engineering', 53, 'Biotechnica'),
(9, 'Engineering', 54, 'Pharmacolog'),
(9, 'Engineering', 55, 'Wearables -'),
(9, 'Engineering', 56, 'Biostatisti'),
(9, 'Engineering', 57, 'Emerging Te'),
(9, 'Engineering', 58, 'Energy & Cl'),
(9, 'Engineering', 59, 'Aero- / Spa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `challengeauditmail`
--

CREATE TABLE `challengeauditmail` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `challengeauditmail`
--

INSERT INTO `challengeauditmail` (`id`, `subject`, `content`) VALUES
(1, 'Step 1', '<p>Example 1</p>\r\n'),
(2, 'Step 2', '<p>Example 2</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crontab`
--

CREATE TABLE `crontab` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `timePicker` varchar(255) NOT NULL,
  `emails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `crontab`
--

INSERT INTO `crontab` (`id`, `name`, `days`, `timePicker`, `emails`) VALUES
(1, 'Newsletter', 'Wednesday', '11:33 AM', 'success@telanto.com'),
(2, 'Challenge Audit', 'Tuesday', '00:00:00', 'challengeaudit@telanto.com'),
(3, 'Webinars', 'Thursday', '00:00:00', 'webinars@telanto.com'),
(4, 'Blog', 'Monday,Sunday', '00:00:00', 'blog@telanto.com,challengeaudit@telanto.com,newsletter@telanto.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `email`, `password`) VALUES
(1, 'newsletter@telanto.com', ''),
(2, 'success@telanto.com', ''),
(3, 'challengeaudit@telanto.com', ''),
(4, 'webinars@telanto.com', ''),
(5, 'blog@telanto.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `information`
--

CREATE TABLE `information` (
  `id_company` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `industry` varchar(255) NOT NULL,
  `preferences` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `subscribed` tinyint(1) DEFAULT '1',
  `counter` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `information`
--

INSERT INTO `information` (`id_company`, `firstname`, `lastname`, `title`, `company`, `email`, `industry`, `preferences`, `date`, `subscribed`, `counter`) VALUES
(1, 'Dragomir', 'Galinov', 'Dragomir', 'Dragonia', 'd.galinov.d.salle@gmail.com', 'Farming', 'Business Model Innovation,Forecast - Demand - Inventory,Autonomous vehicles,Biotechnical / -medical Engineering', '2018-12-14', 1, 1),
(2, 'Francisco', 'Frepo', 'DAweidnai', 'DAWediamo', 'dragomir.galinou@gracia.lasalle.cat', 'Construction', 'Strategic / Digital Transformation,New Business Development & Entrepreneurship,Business Model Innovation', '2018-12-14', 1, 1),
(3, 'wqiuenianweidn', 'awnedjianwedn', 'dnweiandaiwned', 'diawniednawi', 'dragomir.galinou@gracia.lasalle.cat', 'Farming', 'New Business Development & Entrepreneurship,Business Planning & Consulting,Autonomous vehicles,Chemical process optimization', '2018-12-19', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newslettermail`
--

CREATE TABLE `newslettermail` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `newslettermail`
--

INSERT INTO `newslettermail` (`id`, `subject`, `content`) VALUES
(1, 'Step 1', '<p>Example 1</p>\r\n'),
(2, 'Step 2', '<p>Example 2</p>\r\n'),
(3, 'Step 3', '<p>Example 3</p>\r\n'),
(4, 'Step 4', '<p>Example 4</p>\r\n'),
(5, 'Last Day', '<p><strong>Hello there!</strong></p>\r\n\r\n<p><em>This is the last email :)</em></p>\r\n\r\n<ul>\r\n	<li>by my friend,</li>\r\n</ul>\r\n\r\n<p>Telanto.</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webinarsmail`
--

CREATE TABLE `webinarsmail` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `webinarsmail`
--

INSERT INTO `webinarsmail` (`id`, `subject`, `content`) VALUES
(1, 'Step 1', '<p>Agiwamfimwaof</p>\r\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogmail`
--
ALTER TABLE `blogmail`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_l2`);

--
-- Indices de la tabla `challengeauditmail`
--
ALTER TABLE `challengeauditmail`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crontab`
--
ALTER TABLE `crontab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_company`);

--
-- Indices de la tabla `newslettermail`
--
ALTER TABLE `newslettermail`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `webinarsmail`
--
ALTER TABLE `webinarsmail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogmail`
--
ALTER TABLE `blogmail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `challengeauditmail`
--
ALTER TABLE `challengeauditmail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `crontab`
--
ALTER TABLE `crontab`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `information`
--
ALTER TABLE `information`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `newslettermail`
--
ALTER TABLE `newslettermail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `webinarsmail`
--
ALTER TABLE `webinarsmail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
