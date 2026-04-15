-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 15-04-2026 a las 01:47:09
-- Versión del servidor: 8.0.40
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reproductor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancionesUsuario`
--

CREATE TABLE `cancionesUsuario` (
  `id` int NOT NULL,
  `nombreCancion` varchar(100) NOT NULL,
  `artista` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `direccionUrl` varchar(250) NOT NULL,
  `imagen` text,
  `IdUsuario` int NOT NULL,
  `borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cancionesUsuario`
--

INSERT INTO `cancionesUsuario` (`id`, `nombreCancion`, `artista`, `genero`, `direccionUrl`, `imagen`, `IdUsuario`, `borrado`) VALUES
(1, '250K', 'Gera MX', 'Hip-Hop/Rap', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview211/v4/eb/7c/a8/eb7ca8e1-3104-9bc1-a170-5f9ca2bb3979/mzaf_17646792532320148798.plus.aac.p.m4a', NULL, 1, '2026-04-10 14:59:16'),
(2, 'Atrapado en un Sueño', 'Gera MX', 'Hip-Hop/Rap', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview126/v4/1d/ce/df/1dcedfb3-6832-a181-b6ef-0ab716ce51c7/mzaf_5439020782156256697.plus.aac.p.m4a', NULL, 1, '2026-04-10 15:01:59'),
(3, 'Como Pacman', 'Alemán & Gera MX', 'Hip-Hop/Rap', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview221/v4/e0/7d/01/e07d01ab-ca6b-3cfe-5bc2-528f33a78e99/mzaf_8343882839161240483.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music221/v4/aa/a2/96/aaa2962d-c57f-3a26-1fc0-cfa211f8218f/196872566338.jpg/60x60bb.jpg', 1, NULL),
(4, 'Afuera Que Tengan Miedo', 'Gera MX', 'Latin Rap', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview211/v4/1e/8e/07/1e8e071c-e8f7-2773-3286-959306ee704a/mzaf_15608424957447976325.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music112/v4/f4/2d/fd/f42dfd66-9a8d-4359-fe60-61ecb73c5e58/196589385598.jpg/60x60bb.jpg', 1, NULL),
(5, 'Toma 2', 'C-Kan', 'Latin Rap', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview115/v4/d9/98/98/d99898d7-ac47-d7ae-9a47-e0453daf5ff6/mzaf_11170148250631085181.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music128/v4/54/35/24/543524e3-b63d-e849-a3e4-b7f9b81d861c/888915718575_cover.jpg/60x60bb.jpg', 1, NULL),
(6, 'Quién Como Tú', 'Ana Gabriel', 'Pop Latino', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview211/v4/d0/c4/70/d0c470ca-d29f-5af7-b1e9-a2eb8de3037e/mzaf_13608315236965002716.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music125/v4/d6/3a/af/d63aafae-9648-5542-43b2-f45cf0ebd352/886445160512.jpg/60x60bb.jpg', 1, NULL),
(7, 'Blinding Lights', 'The Weeknd', 'R&B/Soul', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview211/v4/17/b4/8f/17b48f9a-0b93-6bb8-fe1d-3a16623c2cfb/mzaf_9560252727299052414.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music125/v4/a6/6e/bf/a66ebf79-5008-8948-b352-a790fc87446b/19UM1IM04638.rgb.jpg/60x60bb.jpg', 1, NULL),
(8, 'LA QUE PUEDE, PUEDE', 'CA7RIEL & Paco Amoroso, Ca7riel & Paco Amoroso', 'Urbano latino', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview211/v4/33/07/de/3307ded8-accd-ba10-bb93-1e2103d3b574/mzaf_10822524291851915833.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music211/v4/86/13/da/8613da0a-6b6d-9b9a-568c-8cc3b5a6c41e/196871948906.jpg/60x60bb.jpg', 2, '2026-04-13 11:28:50'),
(9, 'No Me Hubiera Enamorado', 'Cornelio Vega y Su Dinastía', 'Música Mexicana', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview125/v4/56/ba/73/56ba7367-38ca-7a02-8666-4c822a1f6820/mzaf_2594170283523442682.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music124/v4/8b/d0/f4/8bd0f48d-17fb-4c76-3934-d452787dbd01/741533982646.jpg/60x60bb.jpg', 1, NULL),
(10, 'Fue un Error Amarte', 'Cornelio Vega y Su Dinastía', 'Música Mexicana', 'https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview125/v4/7b/1a/07/7b1a0758-004e-52fa-cc84-d6c91bfec2c0/mzaf_6142216148331151723.plus.aac.p.m4a', 'https://is1-ssl.mzstatic.com/image/thumb/Music124/v4/2f/9d/de/2f9ddec7-9768-58f8-81eb-83332fc34314/741533982868.jpg/60x60bb.jpg', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaCanciones`
--

CREATE TABLE `listaCanciones` (
  `id` int NOT NULL,
  `idListaReproduccion` int NOT NULL,
  `idCanciones` int NOT NULL,
  `borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listasReproduccion`
--

CREATE TABLE `listasReproduccion` (
  `id` int NOT NULL,
  `nombreLista` varchar(100) NOT NULL,
  `idUsuario` int NOT NULL,
  `borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `listasReproduccion`
--

INSERT INTO `listasReproduccion` (`id`, `nombreLista`, `idUsuario`, `borrado`) VALUES
(2, 'Favoritos', 1, NULL),
(3, 'gym', 2, NULL),
(4, 'gym', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombreCompleto`, `usuario`, `clave`, `borrado`) VALUES
(1, 'tiberio velasco lozano', 'tiberiovlzn', '$2y$10$5kblB.SId1hEJUv51qSJiueM.6sfi/Lw6zyEWor78C9E8c1mKiN1K', NULL),
(2, 'sergio padilla', 'sergiopadilla', '$2y$10$WNJ5UjTvBZm3n7M3giTereUAI3J3WQsVzy8nnzW4Gonv9XePS1Iyq', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancionesUsuario`
--
ALTER TABLE `cancionesUsuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_canciones_usuario` (`IdUsuario`);

--
-- Indices de la tabla `listaCanciones`
--
ALTER TABLE `listaCanciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_canciones` (`idCanciones`),
  ADD KEY `fk_listas` (`idListaReproduccion`);

--
-- Indices de la tabla `listasReproduccion`
--
ALTER TABLE `listasReproduccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancionesUsuario`
--
ALTER TABLE `cancionesUsuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `listaCanciones`
--
ALTER TABLE `listaCanciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listasReproduccion`
--
ALTER TABLE `listasReproduccion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancionesUsuario`
--
ALTER TABLE `cancionesUsuario`
  ADD CONSTRAINT `fk_canciones_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `listaCanciones`
--
ALTER TABLE `listaCanciones`
  ADD CONSTRAINT `fk_canciones` FOREIGN KEY (`idCanciones`) REFERENCES `cancionesUsuario` (`id`),
  ADD CONSTRAINT `fk_listas` FOREIGN KEY (`idListaReproduccion`) REFERENCES `listasReproduccion` (`id`);

--
-- Filtros para la tabla `listasReproduccion`
--
ALTER TABLE `listasReproduccion`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
