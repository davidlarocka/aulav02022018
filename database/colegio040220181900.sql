/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : colegio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-04 19:17:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumno
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES ('1', '11', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('2', '12', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('3', '15', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('4', '16', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('5', '17', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('6', '18', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('7', '19', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('8', '20', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('9', '21', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('10', '23', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('11', '24', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('12', '25', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('13', '26', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('14', '27', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('15', '28', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('16', '29', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('17', '13', '2018-01-28 00:00:00', '2018-01-28 00:00:00');
INSERT INTO `alumno` VALUES ('18', '14', '2018-01-28 00:00:00', '2018-01-28 00:00:00');

-- ----------------------------
-- Table structure for alumno_grupo
-- ----------------------------
DROP TABLE IF EXISTS `alumno_grupo`;
CREATE TABLE `alumno_grupo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alumno_grupo
-- ----------------------------
INSERT INTO `alumno_grupo` VALUES ('1', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '1', '5');
INSERT INTO `alumno_grupo` VALUES ('2', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '2', '5');
INSERT INTO `alumno_grupo` VALUES ('3', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '26', '5');
INSERT INTO `alumno_grupo` VALUES ('4', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '27', '5');
INSERT INTO `alumno_grupo` VALUES ('5', null, null, '3', '5');

-- ----------------------------
-- Table structure for asignatura
-- ----------------------------
DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE `asignatura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of asignatura
-- ----------------------------
INSERT INTO `asignatura` VALUES ('1', 'matematica', null, null);
INSERT INTO `asignatura` VALUES ('2', 'historia', null, null);
INSERT INTO `asignatura` VALUES ('3', 'Ciencias', '2018-01-14 13:27:40', '2018-01-14 13:27:40');
INSERT INTO `asignatura` VALUES ('6', 'computacion', '2018-01-14 14:19:17', '2018-01-14 14:19:17');
INSERT INTO `asignatura` VALUES ('7', 'Ingles', '2018-01-14 14:19:26', '2018-01-14 14:19:26');
INSERT INTO `asignatura` VALUES ('8', 'Deportes', '2018-01-14 14:19:42', '2018-01-14 14:19:42');
INSERT INTO `asignatura` VALUES ('9', 'Geografia', '2018-01-14 14:20:02', '2018-01-14 14:20:02');
INSERT INTO `asignatura` VALUES ('10', 'Contabilidad', '2018-01-14 14:21:14', '2018-01-14 14:21:14');
INSERT INTO `asignatura` VALUES ('11', 'Literatura', '2018-01-18 21:22:04', '2018-01-18 21:22:04');

-- ----------------------------
-- Table structure for contenido
-- ----------------------------
DROP TABLE IF EXISTS `contenido`;
CREATE TABLE `contenido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contenido
-- ----------------------------

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `id_departamento` int(4) NOT NULL,
  `id_profesor_asignatura` int(4) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departamento
-- ----------------------------

-- ----------------------------
-- Table structure for grupo
-- ----------------------------
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of grupo
-- ----------------------------
INSERT INTO `grupo` VALUES ('3', '8° básico B', null, '2018-01-19 13:27:00');
INSERT INTO `grupo` VALUES ('4', '8° básico A', null, '2018-01-19 13:26:52');
INSERT INTO `grupo` VALUES ('5', '7° básico A', '2018-01-18 21:48:52', '2018-01-18 21:48:52');
INSERT INTO `grupo` VALUES ('6', '7° básico B', '2018-01-18 21:49:50', '2018-01-18 21:49:50');
INSERT INTO `grupo` VALUES ('8', 'I medio B', '2018-01-19 13:27:14', '2018-01-19 13:27:14');
INSERT INTO `grupo` VALUES ('9', '5° básico A', '2018-01-19 13:27:53', '2018-01-19 13:27:53');
INSERT INTO `grupo` VALUES ('10', '5° básico B', '2018-01-19 13:28:00', '2018-01-19 13:28:00');
INSERT INTO `grupo` VALUES ('11', '6° básico A', '2018-01-19 13:28:14', '2018-01-19 13:28:14');
INSERT INTO `grupo` VALUES ('12', '6° básico B', '2018-01-19 13:28:30', '2018-01-19 13:28:30');

-- ----------------------------
-- Table structure for grupo_asignatura
-- ----------------------------
DROP TABLE IF EXISTS `grupo_asignatura`;
CREATE TABLE `grupo_asignatura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of grupo_asignatura
-- ----------------------------
INSERT INTO `grupo_asignatura` VALUES ('1', '5', '1', '2018-02-04 00:00:00', '2018-02-04 00:00:00');

-- ----------------------------
-- Table structure for img_user
-- ----------------------------
DROP TABLE IF EXISTS `img_user`;
CREATE TABLE `img_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `img_user_user_id_foreign` (`user_id`),
  CONSTRAINT `img_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of img_user
-- ----------------------------
INSERT INTO `img_user` VALUES ('1', 'imag_1515944423.jpg', '3', '2018-01-14 11:40:24', '2018-01-14 11:40:24');
INSERT INTO `img_user` VALUES ('2', 'imag_1516369585.jpg', '5', '2018-01-19 13:46:25', '2018-01-19 13:46:25');
INSERT INTO `img_user` VALUES ('3', 'imag_1517173575.pdf', '31', '2018-01-28 21:06:15', '2018-01-28 21:06:15');
INSERT INTO `img_user` VALUES ('4', 'imag_1517699368.jpg', '32', '2018-02-03 23:09:28', '2018-02-03 23:09:28');
INSERT INTO `img_user` VALUES ('5', 'imag_1517708861.jpg', '33', '2018-02-04 01:47:41', '2018-02-04 01:47:41');
INSERT INTO `img_user` VALUES ('7', 'imag_1517781653.jpg', '35', '2018-02-04 22:00:53', '2018-02-04 22:00:53');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('4', '2017_10_30_163735_create_alumno_table', '2');
INSERT INTO `migrations` VALUES ('16', '2014_10_12_000000_create_users_table', '3');
INSERT INTO `migrations` VALUES ('17', '2014_10_12_100000_create_password_resets_table', '3');
INSERT INTO `migrations` VALUES ('18', '2017_10_30_163450_create_profesor_table', '3');
INSERT INTO `migrations` VALUES ('19', '2017_10_30_163859_create_alumno_asignatura_table', '3');
INSERT INTO `migrations` VALUES ('20', '2017_10_30_163936_create_alumno_grupo_table', '3');
INSERT INTO `migrations` VALUES ('21', '2017_10_30_164036_create_asignatura_table', '3');
INSERT INTO `migrations` VALUES ('22', '2017_10_30_164153_create_contenido_table', '3');
INSERT INTO `migrations` VALUES ('23', '2017_10_30_164239_create_grupo_table', '3');
INSERT INTO `migrations` VALUES ('24', '2017_10_30_164316_create_multimedia_table', '3');
INSERT INTO `migrations` VALUES ('25', '2017_10_30_164353_create_multimedia_contenido_table', '3');
INSERT INTO `migrations` VALUES ('26', '2017_10_30_164530_create_profesor_asignatura_table', '3');
INSERT INTO `migrations` VALUES ('27', '2017_10_30_165028_create_tipo_publicacion_table', '3');
INSERT INTO `migrations` VALUES ('28', '2017_10_30_165146_create_publicacion_table', '3');
INSERT INTO `migrations` VALUES ('29', '2017_10_30_165548_create_alumno_table', '3');
INSERT INTO `migrations` VALUES ('30', '2017_10_01_182633_add_img_user_table', '4');
INSERT INTO `migrations` VALUES ('31', '2017_12_30_195432_create_publicacion_table', '4');
INSERT INTO `migrations` VALUES ('32', '2017_12_30_202522_url_perfil', '5');
INSERT INTO `migrations` VALUES ('33', '2018_01_06_214150_create_profesor_grupo_table', '6');
INSERT INTO `migrations` VALUES ('34', '2018_01_07_221604_id_grupo', '7');

-- ----------------------------
-- Table structure for multimedia
-- ----------------------------
DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE `multimedia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of multimedia
-- ----------------------------

-- ----------------------------
-- Table structure for multimedia_contenido
-- ----------------------------
DROP TABLE IF EXISTS `multimedia_contenido`;
CREATE TABLE `multimedia_contenido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of multimedia_contenido
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('nelsoncastellanos605@gmail.com', '$2y$10$rfJwhupCezgqOzlrcXYnxuNkn6BdsrjECyJNcV2xyP.OMbS4Szlrm', '2017-11-17 10:35:29');

-- ----------------------------
-- Table structure for profesor
-- ----------------------------
DROP TABLE IF EXISTS `profesor`;
CREATE TABLE `profesor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profesor
-- ----------------------------
INSERT INTO `profesor` VALUES ('1', null, null, '1');
INSERT INTO `profesor` VALUES ('2', null, null, '2');
INSERT INTO `profesor` VALUES ('3', null, null, '4');

-- ----------------------------
-- Table structure for profesor_asignatura
-- ----------------------------
DROP TABLE IF EXISTS `profesor_asignatura`;
CREATE TABLE `profesor_asignatura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profesor_asignatura
-- ----------------------------
INSERT INTO `profesor_asignatura` VALUES ('4', null, null, '1', '3', '2');
INSERT INTO `profesor_asignatura` VALUES ('5', null, null, '1', '3', '1');
INSERT INTO `profesor_asignatura` VALUES ('6', null, null, '4', '1', '1');
INSERT INTO `profesor_asignatura` VALUES ('7', null, null, '4', '3', '2');
INSERT INTO `profesor_asignatura` VALUES ('28', null, null, '1', '6', '3');
INSERT INTO `profesor_asignatura` VALUES ('29', null, null, '2', '1', '3');
INSERT INTO `profesor_asignatura` VALUES ('30', null, null, '2', '7', '3');
INSERT INTO `profesor_asignatura` VALUES ('31', null, null, '31', '11', '11');
INSERT INTO `profesor_asignatura` VALUES ('33', null, null, '1', '1', '3');
INSERT INTO `profesor_asignatura` VALUES ('34', null, null, '1', '6', '5');
INSERT INTO `profesor_asignatura` VALUES ('36', null, null, '2', '7', '5');

-- ----------------------------
-- Table structure for profesor_grupo
-- ----------------------------
DROP TABLE IF EXISTS `profesor_grupo`;
CREATE TABLE `profesor_grupo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesor_asignatura` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profesor_grupo
-- ----------------------------
INSERT INTO `profesor_grupo` VALUES ('1', null, null, '1', '1');
INSERT INTO `profesor_grupo` VALUES ('2', null, null, '1', '2');
INSERT INTO `profesor_grupo` VALUES ('3', null, null, '2', '3');
INSERT INTO `profesor_grupo` VALUES ('4', null, null, '2', '3');

-- ----------------------------
-- Table structure for proyectos
-- ----------------------------
DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_alumno_grupo` int(11) NOT NULL,
  `id_grupo_asignatura` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `nombre_proyecto` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `archivo` varchar(30) NOT NULL,
  `url` varchar(150) NOT NULL,
  `observaciones` varchar(150) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proyectos
-- ----------------------------
INSERT INTO `proyectos` VALUES ('1', '1', '1', '2', 'proyecto prueba', 'hacer pruebas para los proyectos', '2018-02-14', '', '', 'ninguna', '2018-02-04', '2018-02-04');
INSERT INTO `proyectos` VALUES ('2', '2', '1', '2', 'proyecto prueba 2', 'hacer pruebas para los proyectos', '2018-02-14', '', '', 'ninguna', '2018-02-04', '2018-02-04');

-- ----------------------------
-- Table structure for prueba
-- ----------------------------
DROP TABLE IF EXISTS `prueba`;
CREATE TABLE `prueba` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of prueba
-- ----------------------------

-- ----------------------------
-- Table structure for publicacion
-- ----------------------------
DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE `publicacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_publicacion` int(4) NOT NULL,
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
  `id_profesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of publicacion
-- ----------------------------
INSERT INTO `publicacion` VALUES ('1', '1', '0', '1', '8', 'trigonometria', 'pasos para aprender trigonometria', '', '', '', '2018-01-15 20:00:00', '2018-01-15 20:00:00', '1');
INSERT INTO `publicacion` VALUES ('2', '2', '1', '3', '1', 'ciencias', 'aprender ciencias', '', '', '', '2018-01-15 20:00:00', '2018-01-15 20:00:00', null);
INSERT INTO `publicacion` VALUES ('3', '0', '0', '1', '3', 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpD7FB.tmp', 'Observaciones', '2018-01-17 00:55:17', '2018-01-17 00:55:17', '4');
INSERT INTO `publicacion` VALUES ('4', '0', '0', '1', '0', 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpE0A3.tmp', 'Observaciones', '2018-01-17 01:04:04', '2018-01-17 01:04:04', '4');
INSERT INTO `publicacion` VALUES ('5', '4', '0', '1', '0', 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpFAF9.tmp', 'Observaciones', '2018-01-17 01:14:00', '2018-01-17 01:14:00', '4');
INSERT INTO `publicacion` VALUES ('6', '4', '0', '1', '0', 'Titulo cápsula2', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\php7214.tmp', 'Observaciones', '2018-01-17 01:31:59', '2018-01-17 01:31:59', '4');
INSERT INTO `publicacion` VALUES ('7', '4', '0', '1', '0', 'Titulo cápsula3', 'Vídeo de ecuaciones', '', 'C:\\xampp\\tmp\\phpE792.tmp', 'Observaciones', '2018-01-17 01:32:29', '2018-01-17 01:32:29', '4');
INSERT INTO `publicacion` VALUES ('8', '1', '0', '3', '0', 'titulo guía', 'descripción guía', '', 'C:\\xampp\\tmp\\phpDF98.tmp', 'Observaciones', '2018-01-17 01:33:33', '2018-01-17 01:33:33', '4');
INSERT INTO `publicacion` VALUES ('9', '1', '0', '8', '0', 'Titulo cápsula editada', 'descripción guía edición', '', 'C:\\xampp\\tmp\\phpFC5C.tmp', '', '2018-01-17 01:38:02', '2018-01-17 01:43:31', '4');
INSERT INTO `publicacion` VALUES ('10', '1', '0', '8', '0', 'nueva guía', 'descripción guía', '', 'C:\\xampp\\tmp\\phpE786.tmp', 'Observaciones', '2018-01-17 01:46:41', '2018-01-17 01:46:41', '4');
INSERT INTO `publicacion` VALUES ('11', '1', '0', '8', '0', 'nueva guía', 'descripción guía', '', 'C:\\xampp\\tmp\\phpD742.tmp', 'Observaciones', '2018-01-17 01:47:43', '2018-01-17 01:47:43', '4');
INSERT INTO `publicacion` VALUES ('12', '1', '0', '1', '0', 'trigonometria 1', 'manual y ejercicios de trigonometria', '', 'C:\\xampp\\tmp\\php382B.tmp', 'ninguna', '2018-01-18 14:41:02', '2018-01-18 14:46:03', '1');
INSERT INTO `publicacion` VALUES ('13', '2', '0', '3', '0', 'recursos naturales', 'material de repaso para proxima clase', 'Manual de Ingreso Aula Virtual.pdf', 'https://www.youtube.com/watch?v=wDe7IhcJlDQ', 'ninguna1', '2018-01-18 14:43:31', '2018-01-22 03:11:16', '1');
INSERT INTO `publicacion` VALUES ('14', '4', '0', '3', '0', 'prueba capcula', 'pruebattttttttttttttttttttttttttttttttttttttttttttt', '', 'C:\\xampp\\tmp\\php3333.tmp', 'ningunaeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2018-01-18 14:50:49', '2018-01-18 14:50:49', '1');
INSERT INTO `publicacion` VALUES ('15', '1', '0', '1', '8', 'Ecuaciones', 'guia de ejercicios de ecuaciones', '', 'C:\\xampp\\tmp\\php43D8.tmp', 'ninguna1', '2018-01-18 21:07:43', '2018-01-19 13:04:16', '1');
INSERT INTO `publicacion` VALUES ('16', '2', '0', '3', '2', 'prueba', 'prueba12222', 'Manual de Ingreso Aula Virtual.pdf', 'https://www.youtube.com/embed/wDe7IhcJlDQ', 'ninguna1', '2018-01-22 03:12:22', '2018-01-22 03:12:22', '1');
INSERT INTO `publicacion` VALUES ('17', '1', '0', '1', '1', 'prueba', 'prueba12222', 'Manual de Ingreso Aula Virtual.docx', '#', 'ninguna1', '2018-01-27 23:56:42', '2018-01-27 23:56:42', '1');
INSERT INTO `publicacion` VALUES ('18', '2', '0', '1', '8', 'migracion de TDE', 'prueba12222', 'Propuesta Proyecto Colegio San Nicolás Ult.docx', 'https://www.youtube.com/embed/wDe7IhcJlDQ', 'ninguna1', '2018-01-28 00:01:07', '2018-01-28 00:01:07', '1');
INSERT INTO `publicacion` VALUES ('19', '5', '0', '1', '3', 'prueba', 'prueba12222', '14 Reunión AMCA 4-10-17.docx', 'https://www.youtube.com/embed/wDe7IhcJlDQ', 'ningunaeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2018-01-28 02:33:20', '2018-01-28 02:35:56', '1');
INSERT INTO `publicacion` VALUES ('20', '1', '0', '1', '1', 'prueba', 'prueba12222', 'Manual de Ingreso Aula Virtual.docx', 'https://www.youtube.com/embed/wDe7IhcJlDQ', 'ninguna1', '2018-01-28 18:36:35', '2018-01-28 18:36:35', '1');
INSERT INTO `publicacion` VALUES ('21', '1', '0', '1', '1', 'prueba', 'prueba12222', 'Manual de Ingreso Aula Virtual.docx', 'https://www.youtube.com/embed/wDe7IhcJlDQ', 'ninguna13333', '2018-01-28 18:36:52', '2018-01-28 18:36:52', '1');
INSERT INTO `publicacion` VALUES ('22', '1', '0', '1', '1', 'migracion de TDE', 'prueba12222', 'Formato Oferta Laboral.doc', 'https://www.youtube.com/embed/jUV068nwxM4', 'ninguna1', '2018-01-28 18:37:32', '2018-01-28 18:37:32', '1');
INSERT INTO `publicacion` VALUES ('23', '1', '0', '1', '1', 'migracion de TDE', 'prueba12222', 'Formato Oferta Laboral.doc', 'https://www.youtube.com/embed/wDe7IhcJlDQ', 'ningunaeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2018-01-28 18:39:03', '2018-01-28 18:39:03', '1');
INSERT INTO `publicacion` VALUES ('24', '1', '0', '1', '1', 'ejelmplo', 'dkdkdkd sdfaasd fsad fasdfdsfsdfas f a', '', '#', 'ssss', '2018-01-28 18:41:54', '2018-01-28 18:41:54', '1');
INSERT INTO `publicacion` VALUES ('25', '1', '0', '1', '1', 'ejelmplo', 'dkdkdkd sdfaasd fsad fasdfdsfsdfas f a', 'Manual de Ingreso Aula Virtual.docx', 'https://www.youtube.com/embed/JLFJwty0iD4', 'sssssdfsaf', '2018-01-28 18:42:27', '2018-01-28 18:42:27', '1');
INSERT INTO `publicacion` VALUES ('26', '2', '0', '1', '3', 'prueba', 'prueba12222', 'Formato Oferta Laboral.doc', '#', 'ningunaeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2018-01-28 22:09:19', '2018-01-28 22:09:19', '1');
INSERT INTO `publicacion` VALUES ('27', '2', '0', '1', '3', 'migracion de TDE', 'prueba12222', 'Manual de Ingreso Aula Virtual.docx', 'https://www.youtube.com/embed/CKqPC-rKhTQ', 'ninguna1', '2018-01-28 22:10:17', '2018-01-28 22:10:17', '1');
INSERT INTO `publicacion` VALUES ('28', '1', '0', '6', '6', 'informatica basica', 'componentes del computador', 'Formato Oferta Laboral.doc', '#', 'ninguna', '2018-02-03 04:11:20', '2018-02-03 04:11:49', '1');

-- ----------------------------
-- Table structure for tipo_publicacion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_publicacion`;
CREATE TABLE `tipo_publicacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tipo_publicacion
-- ----------------------------
INSERT INTO `tipo_publicacion` VALUES ('1', 'Guias', null, null);
INSERT INTO `tipo_publicacion` VALUES ('2', 'Material Complementario', null, null);
INSERT INTO `tipo_publicacion` VALUES ('3', 'Videos', null, null);
INSERT INTO `tipo_publicacion` VALUES ('4', 'Capsulas', null, null);
INSERT INTO `tipo_publicacion` VALUES ('5', 'Proyectos', null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Nelson Castellanoss', '', '', '', '', '', '', '', '0000-00-00', 'nelsoncastellanos605@gmail.com', 'admin', '$2y$10$ludyHVIN9q8JwQA5tP.uV.gvvN3TfOBROngZh6brxqfUN0FmBzmf2', 'k4PEDvZ7Np8TFBnRLFS1e9cYUJT0VWNrsm5JWjQSo5kjqhg1kNJex8kBoYIq', '2017-11-17 10:35:15', '2018-01-28 18:27:36');
INSERT INTO `users` VALUES ('2', 'david garcia', '', '', '', '', '', '', '', '0000-00-00', 'david@gmail.com', 'profesor', '$2y$10$L8/DAX89015O6bIsxpXr7u2AO4JgXECWyqs0OuEIccRK1mPNBlP/2', 'CPq7TDeFyqBgVueo5gMrj5kB4bPnMmnSQUDZ2tUVeTu6FA6aHPSNJSXL97qp', '2017-12-30 15:47:27', '2018-01-19 13:34:25');
INSERT INTO `users` VALUES ('3', 'Manuel Guevara', '', '', '', '', '', '', '', '0000-00-00', 'manuel@gmail.com', 'alumno', '$2y$10$cb.JKJKfSLf1TCDcSGULmueHLYVyow3cm6F0iDaUW17P.C5u3/TUm', 'VdW9P8fVO1rhso58zRkYFyxRUodXniRhAOROIIWjRrFNTI23kvb0lOkt1Cnd', '2018-01-14 11:40:23', '2018-01-14 11:40:23');
INSERT INTO `users` VALUES ('5', 'prueba', '', '', '', '', '', '', '', '0000-00-00', 'prueba@gmail.com', 'profesor', '$2y$10$c37Zv7itTsHvMIJZ1p3w0uWxhTxRAezvVaYwnKcE42SbwJ5A8ScJG', '57dq3aiRr7x98S4oUgnpLn6I3pl2idGKtKYMZoOlJRSiiq3yVh3tyge1ZJje', '2018-01-19 13:46:25', '2018-01-19 13:46:25');
INSERT INTO `users` VALUES ('11', 'Cristian', '', 'Ordoñez', 'Soler', '43097-6344', '', '5419 Piña Orchard\nBurgosview, KY 35483', '47146', '1984-08-16', 'paola.sandoval@example.org', '', '$2y$10$8e5ez5ihiL9PSg.PTpIHD.4QtL6bEMj/hxxhN8T5n7Siebhxsj9OK', 'bMvyYTNumWJtext8V4Y6pdp5Az9SEyfN4sFLyjbYkcBERexIYOUwxb1Ahler', '2018-01-28 14:31:25', '2018-01-28 14:31:25');
INSERT INTO `users` VALUES ('12', 'Marcos', '', 'Lara', 'Almanza', '94668-0470', '', '41168 Ian Points\nPort Blancafort, MI 19596', '00952', '2000-06-30', 'rdelrio@example.org', 'alumno', '$2y$10$8e5ez5ihiL9PSg.PTpIHD.4QtL6bEMj/hxxhN8T5n7Siebhxsj9OK', 'BwUxA6T3yX', '2018-01-28 14:31:25', '2018-01-28 18:27:54');
INSERT INTO `users` VALUES ('13', 'Alonso', '', 'Esteban', 'Alfaro', '98580', '', '774 Barreto Street\nMaríabury, WI 96826-3440', '60905-0825', '2015-02-21', 'lgaitan@example.org', '', '$2y$10$8e5ez5ihiL9PSg.PTpIHD.4QtL6bEMj/hxxhN8T5n7Siebhxsj9OK', 'Jv2gCpzCLR', '2018-01-28 14:31:25', '2018-01-28 14:31:25');
INSERT INTO `users` VALUES ('14', 'Rubén', '', 'Colón', 'Alva', '62183', '', '386 Cordero Manor Suite 509\nAnechester, WA 40926', '68206', '2015-05-15', 'jharo@example.org', '', '$2y$10$8e5ez5ihiL9PSg.PTpIHD.4QtL6bEMj/hxxhN8T5n7Siebhxsj9OK', 'BPBgpSYbjE', '2018-01-28 14:31:25', '2018-01-28 14:31:25');
INSERT INTO `users` VALUES ('15', 'Adrián', '', 'Salvador', 'Franco', '96378', '', '10430 Leo Pine Suite 235\nYeraystad, CT 53052', '83318-5541', '1992-08-25', 'gerard.bautista@example.net', '', '$2y$10$8e5ez5ihiL9PSg.PTpIHD.4QtL6bEMj/hxxhN8T5n7Siebhxsj9OK', 'q3ootnU2pw', '2018-01-28 14:31:25', '2018-01-28 14:31:25');
INSERT INTO `users` VALUES ('16', 'Gael', '', 'Blanco', 'Fuentes', '53819-0175', '', '601 Laura Junction\nNorth Claudia, PA 05391', '59813-5672', '1985-06-04', 'castellanos.lola@example.com', '', '$2y$10$LeDY5/05lmNnbmgueT1ZUOnTYeZS5sRx7vN/CfliGJtl9z3hWrA/q', 'qHlTVZP4Hg', '2018-01-28 14:32:36', '2018-01-28 14:32:36');
INSERT INTO `users` VALUES ('17', 'Ismael', '', 'Carrillo', 'Arellano', '23731', '', '76186 Briseño Motorway\nPort Clara, OR 52468-6236', '65889', '1973-04-04', 'marti.cordova@example.net', '', '$2y$10$LeDY5/05lmNnbmgueT1ZUOnTYeZS5sRx7vN/CfliGJtl9z3hWrA/q', 'OJMGl3AtxN', '2018-01-28 14:32:36', '2018-01-28 14:32:36');
INSERT INTO `users` VALUES ('18', 'Alonso', '', 'Quiroz', 'Menéndez', '53148-3342', '', '939 Manzano Islands Apt. 285\nEast Aaronstad, AR 02159-9098', '09890-9344', '2015-01-15', 'gonzalo69@example.net', '', '$2y$10$LeDY5/05lmNnbmgueT1ZUOnTYeZS5sRx7vN/CfliGJtl9z3hWrA/q', 'ktBwZ40Dhp', '2018-01-28 14:32:36', '2018-01-28 14:32:36');
INSERT INTO `users` VALUES ('19', 'Víctor', '', 'Gaitán', 'Marco', '23531-8129', '', '771 Blanco Circle Suite 459\nZaragozabury, PA 68506-9785', '63724-1279', '1980-01-13', 'alba.olivares@example.org', '', '$2y$10$LeDY5/05lmNnbmgueT1ZUOnTYeZS5sRx7vN/CfliGJtl9z3hWrA/q', 'Hu9zSnk4pw', '2018-01-28 14:32:36', '2018-01-28 14:32:36');
INSERT INTO `users` VALUES ('20', 'Unai', '', 'Orozco', 'Bermúdez', '46236', '', '7559 Julia Cape\nJoelside, UT 22625-4053', '26134', '1988-12-11', 'paola.palacios@example.net', '', '$2y$10$LeDY5/05lmNnbmgueT1ZUOnTYeZS5sRx7vN/CfliGJtl9z3hWrA/q', 'WRXKyvCFfY', '2018-01-28 14:32:36', '2018-01-28 14:32:36');
INSERT INTO `users` VALUES ('21', 'Lara', '', 'Alarcón', 'Delafuente', '87764-4073', '', '73373 Manzanares Islands\nAsierport, NM 15143-9003', '88613', '1982-10-13', 'delafuente.luna@example.com', '', '$2y$10$Wg8gjPowe0W8PkvdwoBRwumXZoM7VwSqy5ae.gSobVnFLTtYZWAGa', 'Pc3r2osLSw', '2018-01-28 14:35:10', '2018-01-28 14:35:10');
INSERT INTO `users` VALUES ('22', 'Aya', '', 'Vila', 'Domingo', '56947-4801', '', '65409 Alejandro Locks Apt. 175\nNorth Angela, NM 24858', '64857', '1996-07-05', 'gpizarro@example.net', '', '$2y$10$Wg8gjPowe0W8PkvdwoBRwumXZoM7VwSqy5ae.gSobVnFLTtYZWAGa', 'xrP1lHlTGS', '2018-01-28 14:35:11', '2018-01-28 14:35:11');
INSERT INTO `users` VALUES ('23', 'Blanca', '', 'Paredes', 'Posada', '42092-0292', '', '3392 Clara Tunnel\nEricchester, ME 10851-9768', '30171', '1998-04-27', 'bblazquez@example.org', '', '$2y$10$Wg8gjPowe0W8PkvdwoBRwumXZoM7VwSqy5ae.gSobVnFLTtYZWAGa', 'BxqoLF9gbJ', '2018-01-28 14:35:11', '2018-01-28 14:35:11');
INSERT INTO `users` VALUES ('24', 'Nayara', '', 'Solorzano', 'Castaño', '61875', '', '6547 Noa Well Apt. 057\nSandraborough, NJ 01956-4941', '96315', '1972-07-14', 'brangel@example.org', '', '$2y$10$Wg8gjPowe0W8PkvdwoBRwumXZoM7VwSqy5ae.gSobVnFLTtYZWAGa', 'p2NX0hHd3Z', '2018-01-28 14:35:11', '2018-01-28 14:35:11');
INSERT INTO `users` VALUES ('25', 'Sandra', '', 'Porras', 'Angulo', '22260-9731', '', '8421 Hugo Well Apt. 924\nLake Gabriel, ME 53523-9463', '49316-7910', '2014-05-13', 'diana.rosas@example.net', '', '$2y$10$Wg8gjPowe0W8PkvdwoBRwumXZoM7VwSqy5ae.gSobVnFLTtYZWAGa', 'KWRyKpCRNp', '2018-01-28 14:35:11', '2018-01-28 14:35:11');
INSERT INTO `users` VALUES ('26', 'Nora', '', 'Briseño', 'Solís', '48010', '', '729 Cabán Ford Apt. 070\nWest Rayanchester, LA 23155-2640', '68063-0249', '1990-12-20', 'gamez.ander@example.com', '', '$2y$10$TOrvMseQQ0/NtmX4hie97.rY29hr3uDXoStwdkrtOUh.irKFn91/W', '5pkArRJMU0', '2018-01-28 14:35:35', '2018-01-28 14:35:35');
INSERT INTO `users` VALUES ('27', 'Irene', '', 'Gaona', 'Gaitán', '11785-1864', '', '62804 Isaac Skyway Suite 450\nArnauburgh, TX 25175', '89505-2230', '2009-02-09', 'rybarra@example.net', '', '$2y$10$TOrvMseQQ0/NtmX4hie97.rY29hr3uDXoStwdkrtOUh.irKFn91/W', 'TO3VF4jHFF', '2018-01-28 14:35:35', '2018-01-28 14:35:35');
INSERT INTO `users` VALUES ('28', 'Jana', '', 'Zapata', 'Andrés', '40310', '', '862 Camarillo Islands Apt. 664\nLucasfort, MA 10204-3240', '88323-8498', '1989-01-04', 'iglesias.antonio@example.org', '', '$2y$10$TOrvMseQQ0/NtmX4hie97.rY29hr3uDXoStwdkrtOUh.irKFn91/W', 'GQOe8NMrfl', '2018-01-28 14:35:35', '2018-01-28 14:35:35');
INSERT INTO `users` VALUES ('29', 'Leyre', '', 'Samaniego', 'Zapata', '29536', '', '641 Soriano Burgs Apt. 617\nNorth Elenatown, IL 33503-0162', '67696', '2008-07-31', 'jorge.trujillo@example.net', '', '$2y$10$TOrvMseQQ0/NtmX4hie97.rY29hr3uDXoStwdkrtOUh.irKFn91/W', 'JP1r6QQUdd', '2018-01-28 14:35:35', '2018-01-28 14:35:35');
INSERT INTO `users` VALUES ('30', 'Alba', '', 'Godoy', 'Baeza', '65778', '', '77574 Nil Fort Apt. 338\nEast Yaizaview, WA 28195', '09609', '2011-09-01', 'wcuellar@example.com', '', '$2y$10$TOrvMseQQ0/NtmX4hie97.rY29hr3uDXoStwdkrtOUh.irKFn91/W', 'kVCFfq94gf', '2018-01-28 14:35:35', '2018-01-28 14:35:35');
INSERT INTO `users` VALUES ('31', 'Juan Perez', '', '', '', '', '', '', '', '0000-00-00', 'juanperez@gmail.com', 'profesor', '$2y$10$OYYnihz5SCYhYdiXEqB2IeS3npEhH61Xu31cpALqnPwQLvGCWhF1G', null, '2018-01-28 21:06:15', '2018-01-28 21:06:15');
INSERT INTO `users` VALUES ('32', 'prueba', '', 'perez', 'wwww', '1234567', '', 'wertj6yj', '123456', '0000-00-00', 'jose@gmail.com', 'profesor', '$2y$10$FCyaY3M6HUSUEvmDP3NNm.1PnloL1qAFDA2W0VYw6UvHauVSjR1Lq', null, '2018-02-03 23:09:28', '2018-02-03 23:09:28');
INSERT INTO `users` VALUES ('33', 'prueba', null, 'perez', null, '1234567', '', 'wertj6yj', '1234567', null, 'prueba2@gmail.com', 'profesor', '$2y$10$W59rjqoZQG5W9H22VjG0duqv5OPVbX6PdHBBI1ScrB74DC0DbIe/a', null, '2018-02-04 01:47:41', '2018-02-04 01:47:41');
INSERT INTO `users` VALUES ('35', 'prueba', null, 'perez6', 'wwww', '1234567', '', 'wertj6yj', '1234567', null, 'prueba6@gmail.com', 'alumno', '$2y$10$zSQYJ5Fx5PSDtVYFri/wGeeG4n4pkjwI9sWfsphDsaeky/CKeghky', null, '2018-02-04 22:00:53', '2018-02-04 22:00:53');
