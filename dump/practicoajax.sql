-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2017 a las 23:10:01
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de datos: `practicoajax`
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `contactos`
--
CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comentario` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `categorias`
--
CREATE TABLE `categorias` (
  `id` int(5) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estaciones_id` int(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Volcado de datos para la tabla `categorias`
--
INSERT INTO `categorias` (`id`, `descripcion`, `estaciones_id`)
VALUES (0, 'anteojos1', 0),
  (1, 'anteojos2', 0),
  (2, 'anteojos3', 1),
  (3, 'anteojos4', 1),
  (4, 'anteojos5', 2),
  (5, 'anteojos6', 2),
  (6, 'anteojos7', 3),
  (7, 'anteojos8', 3);
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `estaciones`
--
CREATE TABLE `estaciones` (
  `id` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `descripcion` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Volcado de datos para la tabla `estaciones`
--
INSERT INTO `estaciones` (`id`, `descripcion`)
VALUES (0, 'Primavera'),
  (1, 'Verano'),
  (2, 'Otoño'),
  (3, 'Invierno');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabs`
--
CREATE TABLE `tabs` (
  `id` int(10) UNSIGNED NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Volcado de datos para la tabla `tabs`
--
INSERT INTO `tabs` (`id`, `contenido`)
VALUES (
    1,
    '<h3>AJAX</h3>\r\n<p>AJAX, acrónimo de Asynchronous JavaScript And XML (JavaScript asíncrono y XML), es una técnica de desarrollo web para crear aplicaciones interactivas o RIA (Rich Internet Applications). Estas aplicaciones se ejecutan en el cliente, es decir, en el navegador de los usuarios mientras se mantiene la comunicación asíncrona con el servidor en segundo plano. De esta forma es posible realizar cambios sobre las páginas sin necesidad de recargarlas, lo que significa aumentar la interactividad, velocidad y usabilidad en las aplicaciones.</p>'
  ),
  (
    2,
    '<h3>JAVASCRIPT</h3><p>JavaScript es un lenguaje de programación interpretado, es decir, que no requiere compilación, utilizado principalmente en páginas web, con una sintaxis semejante a la del lenguaje Java y el lenguaje C.\r\n<br />\r\nAl igual que Java, JavaScript es un lenguaje orientado a objetos propiamente dicho, ya que dispone de Herencia, si bien esta se realiza siguiendo el paradigma de programación basada en prototipos, ya que las nuevas clases se generan clonando las clases base (prototipos) y extendiendo su funcionalidad.</p>'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios`
--
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Volcado de datos para la tabla `usuarios`
--
INSERT INTO `usuarios` (
    `id`,
    `usuario`,
    `clave`,
    `nombre`,
    `apellido`
  )
VALUES (
    0,
    'pepe',
    'e10adc3949ba59abbe56e057f20f883e',
    'Maria Jose',
    'Segundo'
  ),
  (
    1,
    'pmartinez',
    'e10adc3949ba59abbe56e057f20f883e',
    'Pablo',
    'Martinez'
  ),
  (
    2,
    'aperez',
    'e10adc3949ba59abbe56e057f20f883e',
    'Adriana',
    'Perez'
  ),
  (
    3,
    'malonso',
    'e10adc3949ba59abbe56e057f20f883e',
    'Martín',
    'Alonso'
  ),
  (
    4,
    'vortiz',
    'e10adc3949ba59abbe56e057f20f883e',
    'Valeria',
    'Ortiz'
  );
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
ADD PRIMARY KEY (`id`),
  ADD KEY `estaciones_id` (`estaciones_id`);
--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `tabs`
--
ALTER TABLE `tabs`
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
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 490;
--
-- AUTO_INCREMENT de la tabla `tabs`
--
ALTER TABLE `tabs`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- Restricciones para tablas volcadas
--
--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
ADD CONSTRAINT `cf_paises` FOREIGN KEY (`estaciones_id`) REFERENCES `estaciones` (`id`);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;