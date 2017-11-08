-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 06:11 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(9) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `descripcion`, `created`, `modified`, `user_id`) VALUES
(1, 'Pastas', '2016-11-13 18:39:12', '2016-12-01 02:20:19', 1),
(2, 'Liquidos', '2016-11-19 20:36:25', '2016-11-19 20:36:25', 1),
(4, 'Gaseosas', '2016-11-29 22:36:22', '2016-12-01 02:20:35', NULL),
(5, 'Fritura', '2016-12-01 02:34:58', '2016-12-01 02:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(9) NOT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `descripcion` text,
  `lang` varchar(5) NOT NULL,
  `url` varchar(80) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `titulo`, `descripcion`, `lang`, `url`, `created`, `modified`, `user_id`) VALUES
(1, 'Class FormHelper', 'The FormHelper does most of the heavy lifting in form creation. The FormHelper focuses on creating forms quickly, in a way that will streamline validation, re-population and layout. The FormHelper is also flexible - it will do almost everything for you using conventions, or you can use specific methods to get only what you need.', 'eng', 'http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html', '2016-11-28 23:39:38', '2016-12-03 06:22:00', 0),
(2, 'Clase FormHelper', 'El FormHelper realiza la mayor parte del trabajo pesado en la creaciÃ³n de formularios. FormHelper se centra en la creaciÃ³n de formularios rÃ¡pidamente, de una manera que racionalizar la validaciÃ³n, la repoblaciÃ³n y el diseÃ±o. El FormHelper es tambiÃ©n flexible - harÃ¡ casi todo para usted usando convenciones, o usted puede utilizar mÃ©todos especÃ­ficos conseguir solamente lo que usted necesita.', 'spa', 'http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html', '2016-12-02 08:00:23', '2016-12-03 06:22:04', 0),
(3, 'Class HtmlHelper', 'The role of the HtmlHelper in CakePHP is to make HTML-related options easier, faster, and more resilient to change. Using this helper will enable your application to be more light on its feet, and more flexible on where it is placed in relation to the root of a domain.', 'eng', 'http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html', '2016-12-03 06:30:30', '2016-12-03 06:30:30', 0),
(4, 'Clase HtmlHelper', 'El papel de HtmlHelper en CakePHP es hacer que las opciones relacionadas con HTML sean mÃ¡s fÃ¡ciles, mÃ¡s rÃ¡pidas y mÃ¡s resistentes al cambio. El uso de este ayudante permitirÃ¡ que su aplicaciÃ³n sea mÃ¡s ligera en sus pies, y mÃ¡s flexible en donde se coloca en relaciÃ³n con la raÃ­z de un dominio.', 'spa', 'http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html', '2016-12-03 06:31:15', '2016-12-03 06:31:15', 0),
(5, 'Class SessionHelper', 'As a natural counterpart to the Session Component, the Session Helper replicates most of the componentâ€™s functionality and makes it available in your view.\r\n\r\nThe major difference between the Session Helper and the Session Component is that the helper does not have the ability to write to the session.', 'eng', 'http://book.cakephp.org/2.0/en/core-libraries/helpers/session.html', '2016-12-03 07:06:53', '2016-12-03 07:06:53', 0),
(6, 'Clase SessionHelper', 'Como contraparte natural del componente de sesiÃ³n, el ayudante de sesiÃ³n reproduce la mayor parte de la funcionalidad del componente y la hace disponible en su vista.\r\n\r\nLa principal diferencia entre el Asistente de sesiÃ³n y el componente de sesiÃ³n es que el ayudante no tiene la capacidad de escribir en la sesiÃ³n.', 'spa', 'http://book.cakephp.org/2.0/en/core-libraries/helpers/session.html', '2016-12-03 07:07:34', '2016-12-03 07:07:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meta_orders`
--

CREATE TABLE `meta_orders` (
  `id` int(9) NOT NULL,
  `cantidad` int(9) DEFAULT NULL,
  `product_id` int(9) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `precioTotal` decimal(10,2) NOT NULL,
  `order_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(9) NOT NULL,
  `descripcion` text,
  `costoTotal` decimal(10,2) DEFAULT NULL,
  `nroMesa` int(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(9) NOT NULL,
  `permisos` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permisos`, `created`, `modified`) VALUES
(1, '''add'',''view''', '2016-11-18 07:03:51', '2016-11-30 04:59:05'),
(2, '''add'',''view'',''delete'',''edit''', '2016-11-18 07:12:20', '2016-11-30 04:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `stock` int(9) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `category_id` int(9) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nombre`, `descripcion`, `stock`, `precio`, `photo`, `photo_dir`, `created`, `modified`, `category_id`, `user_id`) VALUES
(5, 'Pollo con papas', '', 50, '8.00', 'pollopapas.jpg', '5', '2016-12-01 05:27:09', '2016-12-01 05:27:09', 5, NULL),
(6, 'pure de papas', '', 50, '5.00', '18_n.jpg', '6', '2016-12-01 05:41:10', '2016-12-02 11:06:55', 5, NULL),
(7, 'Pollo al spiado', '', 50, '12.00', '15228075_686970151459302_683527688_n.jpg', '7', '2016-12-02 11:06:28', '2016-12-02 11:06:28', 5, NULL),
(8, 'Escabeche de pollo', '', 50, '6.00', '15211642_686970058125978_670415427_n.jpg', '8', '2016-12-03 03:59:05', '2016-12-03 03:59:05', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(9) NOT NULL,
  `role` varchar(70) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `permission_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created`, `modified`, `permission_id`) VALUES
(1, 'Usuario', '2016-11-18 07:11:57', '2016-11-18 07:11:57', 1),
(2, 'Administrador', '2016-11-18 07:12:36', '2016-11-18 07:12:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `lang` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nombre`, `apellidos`, `password`, `direccion`, `email`, `status`, `telefono`, `created`, `modified`, `role_id`) VALUES
(7, 'root', 'alan', 'mamani huayllani', '91d402f6442b624e832be2cf0f2b77c0af4fbd41', 'La Paz', 'alanfernando93.am@gmail.com', 'activo', 12345789, '2016-11-29 05:28:43', '2016-11-29 05:52:17', 2),
(8, 'admin', 'alvaro', 'mamani huayllani', '5bf1da782a7ab7de4eac138cdf691a04821a6428', 'La Paz', 'alan-fernando93@hotmail.com', 'activo', 11111111, '2016-11-29 05:50:26', '2016-11-29 05:50:31', 1),
(9, 'alan', 'alan', 'mamani huayllani', '1bdf00fde6189941b30924de23717a4b46cf363f', 'La Paz', 'alan93@family.org', 'activo', 12345678, '2016-12-16 06:42:50', '2016-12-16 06:42:50', 1),
(10, 'gaby', 'gaby', 'oropesa', '1bdf00fde6189941b30924de23717a4b46cf363f', 'La Paz', 'alan@family.org', 'activo', 222222, '2016-12-20 18:48:53', '2016-12-20 18:48:53', 1),
(11, 'alvaro', 'alvaro', 'mamani huayllani', '1bdf00fde6189941b30924de23717a4b46cf363f', 'La Paz', 'alvaro@alvaro.com', 'activo', 2147483647, '2016-12-20 18:50:21', '2016-12-20 18:50:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_orders`
--
ALTER TABLE `meta_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `meta_orders`
--
ALTER TABLE `meta_orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
