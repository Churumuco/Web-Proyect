-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2016 a las 21:23:47
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `kremail` y de una vez se selecciona dicha bd para que no de errores
CREATE DATABASE kremail;
USE kremail;


-- Estructura de tabla para la tabla `emails`
CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `destinatario` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `asunto` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert de datos para la tabla `emails`
INSERT INTO `emails` (`id`, `destinatario`, `id_user`, `mensaje`, `asunto`, `estado`) VALUES
(24, 'krgrojas@gmail.com', 73, 'Hola que tal....    ', 'Esto es un test', 'enviado');

-- Estructura de tabla para la tabla `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert de datos para la tabla `users`
INSERT INTO `users` (`id`, `name`, `user`, `password`, `estado`, `email`) VALUES
(73, 'Kevin Rojas', 'Churumuco', '202cb962ac59075b964b07152d234b70', 1, 'krgr17@hotmail.com');

ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
