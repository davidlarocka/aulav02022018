-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2018 a las 13:30:52
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 11, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(2, 12, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(3, 15, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(4, 16, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(5, 17, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(6, 18, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(7, 19, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(8, 20, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(9, 21, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(10, 23, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(11, 24, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(12, 25, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(13, 26, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(14, 27, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(15, 28, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(16, 29, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(17, 13, '2018-01-27 23:00:00', '2018-01-27 23:00:00'),
(18, 14, '2018-01-27 23:00:00', '2018-01-27 23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_asignatura`
--

CREATE TABLE `alumno_asignatura` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_grupo`
--

CREATE TABLE `alumno_grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno_grupo`
--

INSERT INTO `alumno_grupo` (`id`, `created_at`, `updated_at`, `id_alumno`, `id_grupo`) VALUES
(1, '2018-02-03 23:00:00', '2018-02-03 23:00:00', 1, 5),
(2, '2018-02-03 23:00:00', '2018-02-03 23:00:00', 2, 5),
(3, '2018-02-03 23:00:00', '2018-02-03 23:00:00', 26, 5),
(4, '2018-02-03 23:00:00', '2018-02-03 23:00:00', 27, 5),
(5, NULL, NULL, 3, 5),
(6, NULL, NULL, 7, 1),
(7, NULL, NULL, 9, 1),
(8, NULL, NULL, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'matemática', NULL, '2018-01-21 04:16:49'),
(2, 'historia', NULL, NULL),
(3, 'Ciencias', '2018-01-14 12:27:40', '2018-01-14 12:27:40'),
(6, 'computacion', '2018-01-14 13:19:17', '2018-01-14 13:19:17'),
(7, 'Ingles', '2018-01-14 13:19:26', '2018-01-14 13:19:26'),
(8, 'Deportes', '2018-01-14 13:19:42', '2018-01-14 13:19:42'),
(9, 'Geografía', '2018-01-14 13:20:02', '2018-02-12 21:31:25'),
(10, 'Contabilidad', '2018-01-14 13:21:14', '2018-01-14 13:21:14'),
(33, 'Ciencias biológicas', '2018-02-12 03:58:19', '2018-02-12 03:58:19'),
(34, 'Ciencias de la tierra', '2018-02-12 04:04:17', '2018-02-12 04:04:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(4) NOT NULL,
  `id_profesor_asignatura` int(4) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '7 A', NULL, NULL),
(2, '7 B', NULL, NULL),
(3, '8 A', NULL, NULL),
(4, '8 B', NULL, NULL),
(5, '7° básico A', '2018-01-18 20:48:52', '2018-01-18 20:48:52'),
(6, '7° básico B', '2018-01-18 20:49:50', '2018-01-18 20:49:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_asignatura`
--

CREATE TABLE `grupo_asignatura` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupo_asignatura`
--

INSERT INTO `grupo_asignatura` (`id`, `id_grupo`, `id_asignatura`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2018-02-03 23:00:00', '2018-02-03 23:00:00'),
(3, 5, 7, NULL, NULL),
(5, 5, 7, NULL, NULL),
(6, 5, 7, NULL, NULL),
(7, 6, 24, NULL, NULL),
(14, 1, 34, NULL, NULL),
(15, 2, 34, NULL, NULL),
(16, 3, 34, NULL, NULL),
(17, 4, 34, NULL, NULL),
(18, 5, 34, NULL, NULL),
(19, 6, 34, NULL, NULL),
(20, 1, 33, NULL, NULL),
(21, 2, 33, NULL, NULL),
(22, 3, 33, NULL, NULL),
(23, 4, 33, NULL, NULL),
(24, 1, 10, NULL, NULL),
(25, 2, 10, NULL, NULL),
(26, 3, 10, NULL, NULL),
(27, 4, 10, NULL, NULL),
(28, 5, 10, NULL, NULL),
(29, 6, 10, NULL, NULL),
(33, 1, 9, NULL, NULL),
(34, 3, 9, NULL, NULL),
(35, 5, 9, NULL, NULL),
(36, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_user`
--

CREATE TABLE `img_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `img_user`
--

INSERT INTO `img_user` (`id`, `nombre`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'imag_1515944423.jpg', 3, '2018-01-14 10:40:24', '2018-01-14 10:40:24'),
(2, 'imag_1518043718.jpeg', 6, '2018-02-07 21:48:38', '2018-02-07 21:48:38'),
(3, 'imag_1518118284.jpeg', 7, '2018-02-08 18:31:24', '2018-02-08 18:31:24'),
(4, 'imag_1518485797.jpeg', 8, '2018-02-13 00:36:38', '2018-02-13 00:36:38'),
(5, 'imag_1518892152.jpeg', 9, '2018-02-17 17:29:12', '2018-02-17 17:29:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proyectos` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_proyectos`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Prueba', 10, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `thread_id`, `user_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 6, 'Hola a todos. Saben cómo solucionar las integrales que envió el profesor en la guía 3?', '2018-03-07 03:40:31', '2018-03-07 03:40:31', NULL),
(6, 3, 6, 'Hola a todos. Saben cómo solucionar las integrales que envió el profesor en la guía 3?', '2018-03-07 03:40:53', '2018-03-07 03:40:53', NULL),
(7, 4, 6, 'Funciona correctamente', '2018-03-07 04:05:25', '2018-03-07 04:05:25', NULL),
(8, 4, 6, 'Hola, está funcionando correctamente', '2018-03-07 04:53:44', '2018-03-07 04:53:44', NULL),
(9, 5, 4, 'Muchachos pueden consultar la pregunta dos en la guía del semestre pasado', '2018-03-07 17:13:09', '2018-03-07 17:13:09', NULL),
(10, 6, 4, 'La pregunta dos no será respondida en este período. Me pueden consultar cualquier duda por este medio', '2018-03-07 17:18:49', '2018-03-07 17:18:49', NULL),
(11, 7, 4, 'La pregunta dos no será respondida en este período. Me pueden consultar cualquier duda por este medio', '2018-03-07 17:19:50', '2018-03-07 17:19:50', NULL),
(12, 8, 4, 'Mensaje', '2018-03-07 17:34:31', '2018-03-07 17:34:31', NULL),
(13, 9, 4, 'Mensaje', '2018-03-07 17:42:43', '2018-03-07 17:42:43', NULL),
(14, 10, 4, 'Mensaje', '2018-03-07 17:46:23', '2018-03-07 17:46:23', NULL),
(15, 11, 4, 'Al fin!!!', '2018-03-07 17:50:28', '2018-03-07 17:50:28', NULL),
(16, 12, 4, 'Mensajes', '2018-03-07 17:51:50', '2018-03-07 17:51:50', NULL),
(17, 4, 4, 'Muy bien', '2018-03-07 17:53:16', '2018-03-07 17:53:16', NULL),
(18, 13, 4, 'Mensajes', '2018-03-07 18:05:02', '2018-03-07 18:05:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_participants`
--

CREATE TABLE `messenger_participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `last_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messenger_participants`
--

INSERT INTO `messenger_participants` (`id`, `thread_id`, `user_id`, `last_read`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 2, 6, '2018-03-07 03:40:31', '2018-03-07 03:40:31', '2018-03-07 03:40:31', NULL),
(11, 2, 4, NULL, '2018-03-07 03:40:31', '2018-03-07 03:40:31', NULL),
(12, 2, 7, NULL, '2018-03-07 03:40:31', '2018-03-07 03:40:31', NULL),
(13, 2, 9, NULL, '2018-03-07 03:40:31', '2018-03-07 03:40:31', NULL),
(14, 3, 6, '2018-03-07 03:40:54', '2018-03-07 03:40:54', '2018-03-07 03:40:54', NULL),
(15, 3, 4, NULL, '2018-03-07 03:40:54', '2018-03-07 03:40:54', NULL),
(16, 3, 7, NULL, '2018-03-07 03:40:54', '2018-03-07 03:40:54', NULL),
(17, 3, 9, NULL, '2018-03-07 03:40:54', '2018-03-07 03:40:54', NULL),
(18, 4, 6, '2018-03-07 20:12:17', '2018-03-07 04:05:25', '2018-03-07 20:12:17', NULL),
(19, 4, 4, '2018-03-07 18:04:44', '2018-03-07 04:05:25', '2018-03-07 18:04:44', NULL),
(20, 4, 7, NULL, '2018-03-07 04:05:25', '2018-03-07 04:05:25', NULL),
(21, 4, 9, NULL, '2018-03-07 04:05:25', '2018-03-07 04:05:25', NULL),
(22, 5, 4, '2018-03-07 17:13:09', '2018-03-07 17:13:09', '2018-03-07 17:13:09', NULL),
(23, 5, 6, NULL, '2018-03-07 17:13:09', '2018-03-07 17:13:09', NULL),
(24, 5, 7, NULL, '2018-03-07 17:13:09', '2018-03-07 17:13:09', NULL),
(25, 5, 9, NULL, '2018-03-07 17:13:10', '2018-03-07 17:13:10', NULL),
(26, 6, 4, '2018-03-07 17:18:50', '2018-03-07 17:18:50', '2018-03-07 17:18:50', NULL),
(27, 6, 6, NULL, '2018-03-07 17:18:50', '2018-03-07 17:18:50', NULL),
(28, 6, 7, NULL, '2018-03-07 17:18:50', '2018-03-07 17:18:50', NULL),
(29, 6, 9, NULL, '2018-03-07 17:18:50', '2018-03-07 17:18:50', NULL),
(30, 7, 4, '2018-03-07 17:19:50', '2018-03-07 17:19:50', '2018-03-07 17:19:50', NULL),
(31, 7, 6, NULL, '2018-03-07 17:19:50', '2018-03-07 17:19:50', NULL),
(32, 7, 7, NULL, '2018-03-07 17:19:50', '2018-03-07 17:19:50', NULL),
(33, 7, 9, NULL, '2018-03-07 17:19:50', '2018-03-07 17:19:50', NULL),
(34, 8, 4, '2018-03-07 17:34:31', '2018-03-07 17:34:31', '2018-03-07 17:34:31', NULL),
(35, 8, 6, NULL, '2018-03-07 17:34:31', '2018-03-07 17:34:31', NULL),
(36, 8, 7, NULL, '2018-03-07 17:34:31', '2018-03-07 17:34:31', NULL),
(37, 8, 9, NULL, '2018-03-07 17:34:31', '2018-03-07 17:34:31', NULL),
(38, 9, 4, '2018-03-07 17:42:43', '2018-03-07 17:42:43', '2018-03-07 17:42:43', NULL),
(39, 9, 6, NULL, '2018-03-07 17:42:43', '2018-03-07 17:42:43', NULL),
(40, 9, 7, NULL, '2018-03-07 17:42:43', '2018-03-07 17:42:43', NULL),
(41, 9, 9, NULL, '2018-03-07 17:42:43', '2018-03-07 17:42:43', NULL),
(42, 10, 4, '2018-03-07 17:46:23', '2018-03-07 17:46:23', '2018-03-07 17:46:23', NULL),
(43, 10, 6, NULL, '2018-03-07 17:46:23', '2018-03-07 17:46:23', NULL),
(44, 10, 7, NULL, '2018-03-07 17:46:23', '2018-03-07 17:46:23', NULL),
(45, 10, 9, NULL, '2018-03-07 17:46:23', '2018-03-07 17:46:23', NULL),
(46, 11, 4, '2018-03-07 17:50:28', '2018-03-07 17:50:28', '2018-03-07 17:50:28', NULL),
(47, 11, 6, NULL, '2018-03-07 17:50:28', '2018-03-07 17:50:28', NULL),
(48, 11, 7, NULL, '2018-03-07 17:50:28', '2018-03-07 17:50:28', NULL),
(49, 11, 9, NULL, '2018-03-07 17:50:28', '2018-03-07 17:50:28', NULL),
(50, 12, 4, '2018-03-07 17:51:50', '2018-03-07 17:51:50', '2018-03-07 17:51:50', NULL),
(51, 12, 6, NULL, '2018-03-07 17:51:50', '2018-03-07 17:51:50', NULL),
(52, 12, 7, NULL, '2018-03-07 17:51:50', '2018-03-07 17:51:50', NULL),
(53, 12, 9, NULL, '2018-03-07 17:51:50', '2018-03-07 17:51:50', NULL),
(54, 13, 4, '2018-03-07 18:05:02', '2018-03-07 18:05:02', '2018-03-07 18:05:02', NULL),
(55, 13, 6, NULL, '2018-03-07 18:05:02', '2018-03-07 18:05:02', NULL),
(56, 13, 7, NULL, '2018-03-07 18:05:02', '2018-03-07 18:05:02', NULL),
(57, 13, 9, NULL, '2018-03-07 18:05:02', '2018-03-07 18:05:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_threads`
--

CREATE TABLE `messenger_threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proyecto` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messenger_threads`
--

INSERT INTO `messenger_threads` (`id`, `subject`, `id_proyecto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mensaje con id', 0, '2018-03-07 03:40:31', '2018-03-07 03:40:31', NULL),
(3, 'Mensaje con id', 0, '2018-03-07 03:40:53', '2018-03-07 03:40:54', NULL),
(4, 'Nuevo hijo con ID', 4, '2018-03-07 04:05:25', '2018-03-07 17:53:17', NULL),
(5, 'La pregunta dos', 4, '2018-03-07 17:13:09', '2018-03-07 17:13:09', NULL),
(6, 'Cambio en la guía', 4, '2018-03-07 17:18:49', '2018-03-07 17:18:50', NULL),
(7, 'Cambio en la guía', 4, '2018-03-07 17:19:50', '2018-03-07 17:19:50', NULL),
(8, 'Prueba 2', 4, '2018-03-07 17:34:30', '2018-03-07 17:34:31', NULL),
(9, 'Prueba 2', 4, '2018-03-07 17:42:42', '2018-03-07 17:42:43', NULL),
(10, 'Prueba', 4, '2018-03-07 17:46:23', '2018-03-07 17:46:23', NULL),
(11, 'Prueba', 4, '2018-03-07 17:50:28', '2018-03-07 17:50:28', NULL),
(12, 'Prueba', 4, '2018-03-07 17:51:50', '2018-03-07 17:51:50', NULL),
(13, 'Prueba', 4, '2018-03-07 18:05:02', '2018-03-07 18:05:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2017_10_30_163735_create_alumno_table', 2),
(16, '2014_10_12_000000_create_users_table', 3),
(17, '2014_10_12_100000_create_password_resets_table', 3),
(18, '2017_10_30_163450_create_profesor_table', 3),
(19, '2017_10_30_163859_create_alumno_asignatura_table', 3),
(20, '2017_10_30_163936_create_alumno_grupo_table', 3),
(21, '2017_10_30_164036_create_asignatura_table', 3),
(22, '2017_10_30_164153_create_contenido_table', 3),
(23, '2017_10_30_164239_create_grupo_table', 3),
(24, '2017_10_30_164316_create_multimedia_table', 3),
(25, '2017_10_30_164353_create_multimedia_contenido_table', 3),
(26, '2017_10_30_164530_create_profesor_asignatura_table', 3),
(27, '2017_10_30_165028_create_tipo_publicacion_table', 3),
(28, '2017_10_30_165146_create_publicacion_table', 3),
(29, '2017_10_30_165548_create_alumno_table', 3),
(30, '2017_10_01_182633_add_img_user_table', 4),
(31, '2017_12_30_195432_create_publicacion_table', 4),
(32, '2017_12_30_202522_url_perfil', 5),
(33, '2018_01_06_214150_create_profesor_grupo_table', 6),
(34, '2018_01_07_221604_id_grupo', 7),
(35, '2018_03_02_005652_create_messages_table', 8),
(36, '2014_10_28_175635_create_threads_table', 9),
(37, '2014_10_28_175710_create_messages_table', 9),
(38, '2014_10_28_180224_create_participants_table', 9),
(39, '2014_11_03_154831_add_soft_deletes_to_participants_table', 9),
(40, '2014_12_04_124531_add_softdeletes_to_threads_table', 9),
(41, '2017_03_30_152742_add_soft_deletes_to_messages_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia_contenido`
--

CREATE TABLE `multimedia_contenido` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nelsoncastellanos605@gmail.com', '$2y$10$rfJwhupCezgqOzlrcXYnxuNkn6BdsrjECyJNcV2xyP.OMbS4Szlrm', '2017-11-17 09:35:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `created_at`, `updated_at`, `id_usuario`) VALUES
(1, NULL, NULL, 1),
(2, NULL, NULL, 2),
(3, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_asignatura`
--

CREATE TABLE `profesor_asignatura` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesor_asignatura`
--

INSERT INTO `profesor_asignatura` (`id`, `created_at`, `updated_at`, `id_profesor`, `id_asignatura`, `id_grupo`) VALUES
(1, NULL, NULL, 1, 1, 2),
(2, NULL, NULL, 2, 1, 4),
(4, NULL, NULL, 1, 3, 2),
(5, NULL, NULL, 1, 3, 1),
(6, NULL, NULL, 4, 1, 1),
(7, NULL, NULL, 4, 3, 2),
(8, NULL, NULL, 8, 33, 1),
(9, NULL, NULL, 8, 34, 2),
(10, NULL, NULL, 8, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_grupo`
--

CREATE TABLE `profesor_grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesor_asignatura` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesor_grupo`
--

INSERT INTO `profesor_grupo` (`id`, `created_at`, `updated_at`, `id_profesor_asignatura`, `id_grupo`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 1, 2),
(3, NULL, NULL, 2, 3),
(4, NULL, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_alumnos` text NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `nombre_proyecto` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `archivo` varchar(30) NOT NULL,
  `url` varchar(150) NOT NULL,
  `observaciones` varchar(150) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `id_alumnos`, `id_profesor`, `id_grupo`, `id_asignatura`, `nombre_proyecto`, `descripcion`, `fecha_publicacion`, `fecha_entrega`, `archivo`, `url`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, '', 0, 0, 0, 'Proyecto de matemática', 'Descripción de proyectos', '0000-00-00', '2018-02-15', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-29'),
(2, '', 4, 1, 1, 'Proyecto de matemática', 'Proyecto editado', '0000-00-00', '2018-01-10', '', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-31'),
(3, '', 4, 1, 1, 'Nombre de proyecto de matemáti', 'Descripción de proyectos', '0000-00-00', '2018-02-15', 'xls.xls', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-29'),
(4, '7,9,6', 4, 1, 1, 'Proyecto de prueba de fecha de', 'Descripción de proyectos', '0000-00-00', '2018-11-15', '', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-03-07'),
(6, '', 4, 1, 1, 'Proyecto de Josephnys', 'Funciona a la perfección', '2018-01-31', '2018-07-17', '', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-31', '2018-01-31'),
(12, '9,6', 8, 1, 33, 'Proyecto de ciencias', 'Descripción de proyecto de ciencias', '2018-02-13', '2018-02-15', '', '#', '', '2018-02-13', '2018-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tipo_publicacion` int(4) NOT NULL,
  `id_alumnos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_profesor_asignatura` int(4) NOT NULL,
  `id_asignatura` int(4) NOT NULL,
  `id_grupo` int(4) NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Observacion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id`, `id_tipo_publicacion`, `id_alumnos`, `id_profesor_asignatura`, `id_asignatura`, `id_grupo`, `titulo`, `descripcion`, `archivo`, `url`, `Observacion`, `created_at`, `updated_at`, `id_profesor`) VALUES
(1, 1, '', 1, 1, 0, 'trigonometria', 'pasos para aprender trigonometria', '', '', '', '2018-01-15 19:00:00', '2018-01-15 19:00:00', NULL),
(2, 2, '', 1, 3, 0, 'ciencias', 'aprender ciencias', '', '', '', '2018-01-15 19:00:00', '2018-01-15 19:00:00', NULL),
(3, 0, '', 0, 1, 0, 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpD7FB.tmp', 'Observaciones', '2018-01-16 23:55:17', '2018-01-16 23:55:17', 4),
(4, 0, '', 0, 1, 0, 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpE0A3.tmp', 'Observaciones', '2018-01-17 00:04:04', '2018-01-17 00:04:04', 4),
(12, 1, '', 0, 1, 0, 'trigonometria 1', 'manual y ejercicios de trigonometria', '', 'C:\\xampp\\tmp\\php382B.tmp', 'ninguna', '2018-01-18 13:41:02', '2018-01-18 13:46:03', 1),
(13, 2, '', 0, 3, 0, 'recursos naturales', 'material de repaso para proxima clase', '', 'C:\\xampp\\tmp\\php8365.tmp', 'ninguna', '2018-01-18 13:43:31', '2018-01-18 13:43:31', 1),
(14, 4, '', 0, 3, 5, 'prueba capcula', 'prueba', '', 'C:\\xampp\\tmp\\php3333.tmp', 'ninguna', '2018-01-18 13:50:49', '2018-01-18 13:50:49', 1),
(55, 5, '', 0, 3, 0, 'Titulo materialh prueba ciencias', 'descripcion', 'Doc.doc', 'https://www.youtube.com/embed/8L5PqL4ylIU', 'observaciones materialh', '2018-01-21 12:58:37', '2018-01-21 18:18:29', 4),
(57, 4, '', 0, 3, 0, 'titulo capsulas prueba de vídeos', 'descripción capsulas', 'xls.xls', 'https://www.youtube.com/embed/jUV068nwxM4', 'observaciones de guías', '2018-01-21 13:07:27', '2018-01-22 00:20:25', 4),
(58, 4, '', 0, 3, 0, 'titulo de  capsulas editado', 'descripción capsulas', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-21 13:09:22', '2018-01-22 02:36:10', 4),
(59, 5, '', 0, 3, 0, 'materialhs ciencias', 'materialhs ciencias probar enlace a youtube', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/L3i9l4XDIE4', 'Bien hecho', '2018-01-21 22:46:15', '2018-01-21 22:46:15', 4),
(60, 4, '', 0, 33, 1, 'Título material matemática', 'Probar vídeo de youtube', 'Doc.doc', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona correctamente', '2018-01-21 22:59:15', '2018-01-21 22:59:15', 4),
(61, 2, '', 0, 1, 0, 'Título matemática', 'No guardar archivo', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona', '2018-01-21 23:08:08', '2018-01-21 23:08:08', 4),
(62, 1, '', 0, 1, 0, 'Título probar agregar vídeos', 'Descripción prueba de vídeos', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Well done', '2018-01-21 23:34:42', '2018-01-21 23:34:42', 4),
(63, 4, '', 0, 1, 0, 'Título para agregar cápsula', 'Descripción cápsulas', 'Doc.doc', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-21 23:38:23', '2018-01-21 23:38:23', 4),
(64, 2, '', 0, 3, 0, 'Título de ciencias materialc', 'Descripción materialc', '', 'https://www.youtube.com/embed/FtdrlIT5SSs', 'Observaciones', '2018-01-21 23:41:07', '2018-01-24 23:15:18', 4),
(65, 5, '', 0, 1, 0, 'Título material habilitado matemáticas', 'Descripción', '', 'https://www.youtube.com/embed/FtdrlIT5SSs', 'Observaciones', '2018-01-21 23:43:05', '2018-01-24 23:16:21', 4),
(66, 4, '', 0, 1, 0, 'Título capsulas matemáticas', 'Probar a guardar un link érroneo a vídeo', 'Docs.docx', '', 'Observaciones', '2018-01-22 00:03:34', '2018-01-22 00:03:34', 4),
(67, 4, '', 0, 1, 0, 'titulo cápsula prueba vídeo', 'Descripción', '', 'https://www.youtube.com/embed/NOPXC2-W6U0', 'Prueba vídeo', '2018-01-22 00:11:42', '2018-01-24 22:51:15', 4),
(68, 4, '', 0, 1, 0, 'Prueba vídeo de matemáticas', 'Descripción', '', '#', 'Funciona', '2018-01-22 00:14:12', '2018-01-24 22:44:06', 4),
(69, 4, '', 0, 3, 0, 'Título de cápsulas para ciencias', 'Descripción cápsulas para ciencias', 'xls.xls', 'https://www.youtube.com/embed/3V3cW0iSvg8', 'Excelente', '2018-01-22 04:02:53', '2018-01-22 04:02:53', 4),
(70, 4, '', 0, 3, 0, 'Otra prueba cápsulas ciencias', 'Descripción', 'xls.xls', 'https://www.youtube.com/embed/pu9dyA45tfc', 'Aprobado', '2018-01-22 04:13:53', '2018-01-22 04:13:53', 4),
(71, 1, '', 0, 3, 0, 'Título guía ciencias', 'Probar fecha', '', 'https://www.youtube.com/embed/iYwFXUbjl_0', 'Muy bien', '2018-01-22 04:50:50', '2018-01-22 04:50:50', 4),
(72, 5, '', 0, 3, 0, 'Título material habilitado ciencias', 'Descripción material habilitado', 'xls.xls', '#', 'Aprobado. Comprimir y enviar', '2018-01-22 05:01:48', '2018-01-22 05:01:48', 4),
(74, 4, '', 0, 1, 0, 'Guardar materia y grupo', 'Descripción', 'Docs.docx', 'https://www.youtube.com/embed/KyjjFYM8aUg', 'Observaciones', '2018-01-26 01:49:29', '2018-01-26 01:49:29', 4),
(75, 4, '', 0, 1, 0, 'Guardar materia y grupo', 'Descripción', 'xls.xls', 'https://www.youtube.com/embed/iEqPk28w9mI', 'Funcionaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-01-26 01:59:11', '2018-01-26 01:59:11', 4),
(76, 4, '', 0, 1, 0, 'Guardar materia y grupo', 'Descripción', 'xls.xls', 'https://www.youtube.com/embed/iEqPk28w9mI', 'Funcionaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-01-26 02:01:36', '2018-01-26 02:01:36', 4),
(77, 4, '', 0, 3, 2, 'Prueba de archivos', 'Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descri', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-27 10:51:43', '2018-01-27 16:36:26', 4),
(78, 1, '', 0, 1, 1, 'Título de guías de matemáticas', 'Descripción sin vídeo de youtube', 'xls.xls', '#', 'Observaciones', '2018-01-27 11:06:29', '2018-01-27 11:06:29', 4),
(79, 1, '', 0, 1, 1, 'Título de matemáticas', 'Descripción de guías sin archivo', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona apropiadamente', '2018-01-27 11:07:37', '2018-01-27 11:07:37', 4),
(80, 2, '', 0, 1, 7, 'Pruebas de materiales complementarios', 'Descripciones de materiales', '', '#', 'Funciona', '2018-01-27 11:22:20', '2018-01-27 11:22:20', 4),
(81, 2, '', 0, 1, 1, 'Título de prueba con materiales', 'Descripción de materiales', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona', '2018-01-27 11:41:57', '2018-01-27 11:42:16', 4),
(82, 5, '', 0, 3, 2, 'Título de material habilitado', 'Descripciones de materiales', 'Docs.docx', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-27 11:46:49', '2018-01-27 11:47:39', 4),
(83, 4, '', 0, 3, 2, 'Prueba ciencias otro teacher', 'Descripción otro teacher', '', '', 'Observaciones', NULL, NULL, NULL),
(85, 2, '', 0, 3, 1, 'Prueba otro profesor de ciencias', 'Descripción', '', '', 'Quedó perfecto', '2018-01-30 23:00:00', '2018-01-30 23:00:00', 2),
(86, 5, '', 0, 3, 3, 'Título para guía de ciencia', 'Guía de ciencias(Revisar obligatoriamente)', '', '#', 'Observaciones', '2018-01-27 15:54:43', '2018-01-27 15:54:43', 3),
(87, 1, '', 0, 3, 2, 'Material complementario de prueba', 'Descripción de material complementario', '', '#', 'Funciona perfectamente', '2018-01-27 16:07:20', '2018-01-27 16:07:20', 4),
(88, 1, '', 0, 1, 1, 'Guía de matemáticas07022018', 'Descripción de guía de matemáticas', 'Docs.docx', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-02-07 17:11:40', '2018-02-07 17:11:40', 4),
(89, 4, '', 0, 1, 1, 'Prueba de mensaje al guardar', 'Descripciones', 'xlsx.xlsx', '#', 'Observaciones', '2018-02-07 20:56:39', '2018-02-07 20:56:39', 4),
(90, 4, '', 0, 1, 1, 'Cápsula sin archivo', 'Cápsula sin archivo', '', 'https://www.youtube.com/embed/Qrshx8BUDjk', 'Observaciones editado', '2018-03-07 22:21:39', '2018-03-07 22:22:02', 4),
(91, 1, '', 0, 1, 1, 'Guía sin vídeo', 'Descripciones de guías sin vídeos', 'Doc.doc', '#', 'Observaciones bla bla bla', '2018-03-07 23:27:32', '2018-03-07 23:27:52', 4),
(92, 3, '7,9,6', 0, 1, 1, 'Material habilitado para algunos alumnos', 'Descripciones', 'xls.xls', '#', 'Eres un excelente alumno', '2018-03-08 09:25:40', '2018-03-08 10:11:43', 4),
(93, 3, '7,9,6', 0, 1, 1, 'Material habilitado nuevo', 'Descripciones de materiales habilitados', '', '#', 'Observaciones', '2018-03-08 10:54:51', '2018-03-08 10:54:51', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicacion`
--

CREATE TABLE `tipo_publicacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_publicacion`
--

INSERT INTO `tipo_publicacion` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Guias', NULL, NULL),
(2, 'Material Complementario', NULL, NULL),
(3, 'Material Habilitado', NULL, NULL),
(4, 'Capsulas', NULL, NULL),
(5, 'Proyectos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_perfil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `rut`, `sexo`, `direccion`, `telefono`, `fecha_nacimiento`, `email`, `type`, `password`, `remember_token`, `created_at`, `updated_at`, `url_perfil`) VALUES
(1, 'Nelson Castellano', '', '', '', '', '', '', '', '0000-00-00', 'nelsoncastellanos605@gmail.com', 'admin', '$2y$10$ludyHVIN9q8JwQA5tP.uV.gvvN3TfOBROngZh6brxqfUN0FmBzmf2', 'IunLcg5Sarg6TICUTLBRhEQnHLfGakNgrvjk5CN0aoqO58YLPPhxnMsPNok4', '2017-11-17 09:35:15', '2017-11-17 09:35:15', ''),
(2, 'david garcia', '', '', '', '', '', '', '', '0000-00-00', 'david@gmail.com', 'profesor', '$2y$10$L8/DAX89015O6bIsxpXr7u2AO4JgXECWyqs0OuEIccRK1mPNBlP/2', 'ZxVx4YchHmEzyPWjHlQNDgfn8HUncifz0lNiUtLzQF9dr88FSNPgM22pDVBu', '2017-12-30 14:47:27', '2018-01-19 12:34:25', ''),
(3, 'Manuel Guevara', '', '', '', '', '', '', '', '0000-00-00', 'manuel@gmail.com', 'alumno', '$2y$10$cb.JKJKfSLf1TCDcSGULmueHLYVyow3cm6F0iDaUW17P.C5u3/TUm', NULL, '2018-01-14 10:40:23', '2018-01-14 10:40:23', NULL),
(4, 'Manuel Guevara', '', '', '', '', '', '', '', '0000-00-00', 'correo@gmail.com', 'profesor', '$2y$10$gGHBz6q/erQWMfZImzvgLu97UTm01Mfum4cNwcUQ14ZwmoYthDQRm', 'SBfpfgUHKwKR67gclosmiKHi3sWoyUiioLAphlMDdYLtyJed19gUimQ3f3o5', '2018-01-28 10:11:51', '2018-01-28 10:11:51', NULL),
(5, 'prueba', '', '', '', '', '', '', '', '0000-00-00', 'prueba@gmail.com', 'profesor', '$2y$10$c37Zv7itTsHvMIJZ1p3w0uWxhTxRAezvVaYwnKcE42SbwJ5A8ScJG', '57dq3aiRr7x98S4oUgnpLn6I3pl2idGKtKYMZoOlJRSiiq3yVh3tyge1ZJje', '2018-01-19 12:46:25', '2018-01-19 12:46:25', NULL),
(6, 'Karen', 'Alejandra', 'Guevara', 'Vivas', '28125232', '', 'La Guaira', '45444545', '0000-00-00', 'princesasirena@gmail.com', 'alumno', '$2y$10$EeO0nEFdcvpdfUMNyRSiau.5hY4VXrYyhkonjzluDS0q3ZTm.O7Hu', 'XBfH9e7NHf1Wr9Qu4e6C3aPIxVPogf1dlnqmTd8GQ7mjokvwj8kWBYEY5c7W', '2018-02-07 21:48:38', '2018-02-07 21:48:38', NULL),
(7, 'Karen', 'Alejandra', 'Guevara', 'Méndez', '28125879', '', 'La Guaira', '02123311195', '0000-00-00', 'labeba@correo.com', 'alumno', '$2y$10$d8pqKesNeKDbpk/PHuYKJ.q1WiQjK/NJCqsoqL6XjWeGfhh.4Vlq.', NULL, '2018-02-08 18:31:24', '2018-02-08 18:31:24', NULL),
(8, 'Manuel', 'David', 'Guevara', 'Vivas', '16286167', '', 'Av. Nva. Granada', '04264001796', '0000-00-00', 'mdguevarav@gmail.com', 'profesor', '$2y$10$PehVFh7270vTVjM4f8FHeuZm2nPlLqsrBT5Hfyel8B7rdfi7cF78C', 'UT8XWwf67wNeGEVIr59w4FJRKbZrL5LxpIfLGtPJIXIW5p9ixEq1wCVQaFBP', '2018-02-13 00:36:38', '2018-02-13 00:36:38', NULL),
(9, 'Heidelberth', 'Gabriel', 'Guevara', 'Méndez', '28153635', '', 'La Guaira', '02123311195', '0000-00-00', 'gabriel@gmail.com', 'alumno', '$2y$10$iqJZmBoWy/KiMpO1LJ6Vp.wHaZ0M5h69juO5qfRN3cufzsKNcp0Py', 'l8aAjNWewkBdAQFjQHmnoLVzyrfuCt2ayP30fNLwTfEaoh6IdKn4ldvnJu5b', '2018-02-17 17:29:12', '2018-02-17 17:29:12', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno_asignatura`
--
ALTER TABLE `alumno_asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_asignatura`
--
ALTER TABLE `grupo_asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `img_user`
--
ALTER TABLE `img_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messenger_participants`
--
ALTER TABLE `messenger_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messenger_threads`
--
ALTER TABLE `messenger_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multimedia_contenido`
--
ALTER TABLE `multimedia_contenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor_asignatura`
--
ALTER TABLE `profesor_asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor_grupo`
--
ALTER TABLE `profesor_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_publicacion`
--
ALTER TABLE `tipo_publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `alumno_asignatura`
--
ALTER TABLE `alumno_asignatura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno_grupo`
--
ALTER TABLE `alumno_grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupo_asignatura`
--
ALTER TABLE `grupo_asignatura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `img_user`
--
ALTER TABLE `img_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `messenger_participants`
--
ALTER TABLE `messenger_participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `messenger_threads`
--
ALTER TABLE `messenger_threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `multimedia_contenido`
--
ALTER TABLE `multimedia_contenido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesor_asignatura`
--
ALTER TABLE `profesor_asignatura`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `profesor_grupo`
--
ALTER TABLE `profesor_grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `tipo_publicacion`
--
ALTER TABLE `tipo_publicacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `img_user`
--
ALTER TABLE `img_user`
  ADD CONSTRAINT `img_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
