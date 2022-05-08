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
    0,
    '<div class="row p-5 align-items-center">
      <h2 class="m-2">
        Lo &uacute;ltimo en moda:
        <span class="highlight">
          primavera verano
        </span>
      </h2>

      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col-xl-4">
          <div class="card">
            <img src="../assets/producto_camisa.jpeg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title highlight">Camisa Hawaiana</h5>
              <p class="card-text">
                Tela Algodón, polyester ,lino y viscosa. Composición
                100% viscosa. Acceso: botones
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <img src="../assets/producto_anteojos.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title highlight">Anteojos de sol</h5>
              <p class="card-text">
                Ideal para mascotas por su material flexible, construido
                sin piezas metálicas.
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <img src="../assets/producto_sombrero.jpeg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title highlight">Sombrero de paja</h5>
              <p class="card-text">
                Forrado en jersey 100% paja. No posee orificios para las
                orejas. Detalle de flores amarillas
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>'
  ),
  (
    1,
    '<div class="row p-5 align-items-center">
      <h2 class="m-2">
        Lo &uacute;ltimo en moda:<span class="highlight">
          Oto&ntilde;o Invierno</span>
      </h2>

      <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col-xl-4">
          <div class="card">
            <img src="../assets/productoChaleco.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title highlight">Chaleco</h5>
              <p class="card-text">
                Chaleco oversize escote en U con abotonadura central al
                frente con botones marmolados. Tejido con punto fantasía
                motivo trenzado en delantero.
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="card">
            <img src="../assets/productoBufanda.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title highlight">Bufanda</h5>
              <p class="card-text">
                Algodón|Polyester|Lino|Viscosa Composición 49%
                rayon viscosa - 29% poliéster - 22% poliamida
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="card">
            <img src="../assets/productoSueter.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title highlight">Sweater</h5>
              <p class="card-text">
                Sweater con alta capacidad calórica, segunda y tercera
                piel. Ideal para otoño/invierno.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>'
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