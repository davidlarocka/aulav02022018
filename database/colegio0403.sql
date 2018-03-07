/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : colegio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-04 10:37:50
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
INSERT INTO `alumno` VALUES ('1', '3', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('2', '12', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('3', '15', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('4', '16', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('5', '17', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('6', '18', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('7', '19', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('8', '20', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('9', '21', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('10', '23', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('11', '24', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('12', '25', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('13', '26', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('14', '27', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('15', '28', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('16', '29', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('17', '13', '2018-01-27 20:00:00', '2018-01-27 20:00:00');
INSERT INTO `alumno` VALUES ('18', '14', '2018-01-27 20:00:00', '2018-01-27 20:00:00');

-- ----------------------------
-- Table structure for alumno_asignatura
-- ----------------------------
DROP TABLE IF EXISTS `alumno_asignatura`;
CREATE TABLE `alumno_asignatura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alumno_asignatura
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alumno_grupo
-- ----------------------------
INSERT INTO `alumno_grupo` VALUES ('1', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '1', '6');
INSERT INTO `alumno_grupo` VALUES ('2', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '2', '5');
INSERT INTO `alumno_grupo` VALUES ('3', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '26', '5');
INSERT INTO `alumno_grupo` VALUES ('4', '2018-02-04 00:00:00', '2018-02-04 00:00:00', '27', '5');
INSERT INTO `alumno_grupo` VALUES ('5', null, null, '3', '6');
INSERT INTO `alumno_grupo` VALUES ('6', null, null, '6', '4');
INSERT INTO `alumno_grupo` VALUES ('7', null, null, '8', '4');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of asignatura
-- ----------------------------
INSERT INTO `asignatura` VALUES ('1', 'Lenguaje y Comunicación', '2018-02-25 00:00:00', '2018-02-25 01:16:49');
INSERT INTO `asignatura` VALUES ('2', 'Matemática', '2018-02-25 00:00:00', '2018-02-25 00:00:00');
INSERT INTO `asignatura` VALUES ('3', 'Inglés', '2018-01-14 09:27:40', '2018-01-14 09:27:40');
INSERT INTO `asignatura` VALUES ('6', 'Ciencias Naturales', '2018-01-14 10:19:17', '2018-01-14 10:19:17');
INSERT INTO `asignatura` VALUES ('7', 'Historia, Geografía y Ciencias Sociales', '2018-01-14 10:19:26', '2018-01-14 10:19:26');
INSERT INTO `asignatura` VALUES ('8', 'Educación Física y Salud', '2018-01-14 10:19:42', '2018-01-14 10:19:42');
INSERT INTO `asignatura` VALUES ('9', 'Artes Visuales', '2018-01-14 10:20:02', '2018-01-14 10:20:02');
INSERT INTO `asignatura` VALUES ('10', 'Música', '2018-01-14 10:21:14', '2018-01-14 10:21:14');
INSERT INTO `asignatura` VALUES ('11', 'Religión', '2018-01-18 17:22:04', '2018-01-18 17:22:04');
INSERT INTO `asignatura` VALUES ('12', 'Tecnología', '2018-02-25 18:53:37', '2018-02-25 18:53:37');
INSERT INTO `asignatura` VALUES ('13', 'Consejo de Curso', '2018-02-25 18:55:24', '2018-02-25 18:55:24');
INSERT INTO `asignatura` VALUES ('14', 'Area SociolInguistica', '2018-02-25 18:59:52', '2018-02-25 18:59:52');
INSERT INTO `asignatura` VALUES ('15', 'Area cientifico Matemática', '2018-02-25 19:00:29', '2018-02-25 19:00:29');
INSERT INTO `asignatura` VALUES ('16', 'Taller', '2018-02-25 19:01:37', '2018-02-25 19:01:37');
INSERT INTO `asignatura` VALUES ('17', 'Lengua y Literatura', '2018-02-25 19:03:20', '2018-02-25 19:03:20');
INSERT INTO `asignatura` VALUES ('18', 'Formación ciudadana I', '2018-02-25 19:05:20', '2018-02-25 19:05:20');
INSERT INTO `asignatura` VALUES ('19', 'Formación ciudadana II', '2018-02-25 19:05:50', '2018-02-25 19:05:50');
INSERT INTO `asignatura` VALUES ('20', 'Biología', '2018-02-25 19:06:59', '2018-02-25 19:06:59');
INSERT INTO `asignatura` VALUES ('21', 'Física', '2018-02-25 19:07:34', '2018-02-25 19:07:34');
INSERT INTO `asignatura` VALUES ('22', 'Química', '2018-02-25 19:08:03', '2018-02-25 19:08:03');
INSERT INTO `asignatura` VALUES ('23', 'Filosofía y psicología', '2018-02-25 19:08:43', '2018-02-25 19:08:43');
INSERT INTO `asignatura` VALUES ('24', 'Educación Física', '2018-02-25 19:09:40', '2018-02-25 19:09:40');
INSERT INTO `asignatura` VALUES ('25', 'Artes Músicales', '2018-02-25 19:11:20', '2018-02-25 19:11:20');
INSERT INTO `asignatura` VALUES ('26', 'PSU Matemáticas', '2018-02-25 19:12:59', '2018-02-25 19:12:59');
INSERT INTO `asignatura` VALUES ('27', 'PSU Lenguaje', '2018-02-25 19:14:10', '2018-02-25 19:14:10');
INSERT INTO `asignatura` VALUES ('28', 'Historia', '2018-02-25 19:15:43', '2018-02-25 19:15:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of grupo
-- ----------------------------
INSERT INTO `grupo` VALUES ('1', 'Seleccione..', '2018-02-25 18:45:52', '2018-02-25 18:45:52');
INSERT INTO `grupo` VALUES ('2', '5° básico A', '2018-02-25 18:45:52', '2018-02-25 18:45:52');
INSERT INTO `grupo` VALUES ('3', '5° básico B', '2018-02-25 18:45:52', '2018-02-25 18:45:52');
INSERT INTO `grupo` VALUES ('4', '6° básico A', '2018-02-25 18:45:52', '2018-02-25 18:45:52');
INSERT INTO `grupo` VALUES ('5', '6° básico B', '2018-01-18 17:48:52', '2018-01-18 17:48:52');
INSERT INTO `grupo` VALUES ('6', '7° básico A', '2018-01-18 17:49:50', '2018-01-18 17:49:50');
INSERT INTO `grupo` VALUES ('7', '7° básico B', '2018-02-25 18:43:51', '2018-02-25 18:43:51');
INSERT INTO `grupo` VALUES ('8', '8° básico A', '2018-02-25 18:44:09', '2018-02-25 18:44:09');
INSERT INTO `grupo` VALUES ('9', '8° básico B', '2018-02-25 18:44:32', '2018-02-25 18:44:32');
INSERT INTO `grupo` VALUES ('10', 'I  A', '2018-02-25 18:44:47', '2018-02-25 18:44:47');
INSERT INTO `grupo` VALUES ('11', 'I  B', '2018-02-25 18:44:54', '2018-02-25 18:44:54');
INSERT INTO `grupo` VALUES ('12', 'II A', '2018-02-25 18:45:05', '2018-02-25 18:45:05');
INSERT INTO `grupo` VALUES ('13', 'II B', '2018-02-25 18:45:13', '2018-02-25 18:45:13');
INSERT INTO `grupo` VALUES ('14', 'III A', '2018-02-25 18:45:32', '2018-02-25 18:45:32');
INSERT INTO `grupo` VALUES ('15', 'III B', '2018-02-25 18:45:38', '2018-02-25 18:45:38');
INSERT INTO `grupo` VALUES ('16', 'IV A', '2018-02-25 18:45:52', '2018-02-25 18:45:52');
INSERT INTO `grupo` VALUES ('17', 'IV B', '2018-02-25 18:46:03', '2018-02-25 18:46:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of grupo_asignatura
-- ----------------------------
INSERT INTO `grupo_asignatura` VALUES ('75', '2', '1', null, null);
INSERT INTO `grupo_asignatura` VALUES ('76', '3', '1', null, null);
INSERT INTO `grupo_asignatura` VALUES ('77', '4', '1', null, null);
INSERT INTO `grupo_asignatura` VALUES ('78', '5', '1', null, null);
INSERT INTO `grupo_asignatura` VALUES ('79', '2', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('80', '3', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('81', '4', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('82', '5', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('83', '8', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('84', '9', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('85', '10', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('86', '11', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('87', '12', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('88', '13', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('89', '14', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('90', '15', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('91', '16', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('92', '17', '2', null, null);
INSERT INTO `grupo_asignatura` VALUES ('93', '2', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('94', '3', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('95', '4', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('96', '5', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('97', '6', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('98', '7', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('99', '8', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('100', '9', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('101', '10', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('102', '11', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('103', '12', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('104', '13', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('105', '14', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('106', '15', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('107', '16', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('108', '17', '3', null, null);
INSERT INTO `grupo_asignatura` VALUES ('109', '2', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('110', '3', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('111', '4', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('112', '5', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('113', '8', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('114', '9', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('115', '10', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('116', '11', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('117', '12', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('118', '13', '6', null, null);
INSERT INTO `grupo_asignatura` VALUES ('119', '2', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('120', '3', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('121', '4', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('122', '5', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('123', '8', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('124', '9', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('125', '10', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('126', '11', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('127', '12', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('128', '13', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('129', '14', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('130', '15', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('131', '16', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('132', '17', '7', null, null);
INSERT INTO `grupo_asignatura` VALUES ('133', '2', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('134', '3', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('135', '4', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('136', '5', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('137', '6', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('138', '7', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('139', '8', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('140', '9', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('141', '10', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('142', '11', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('143', '12', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('144', '13', '8', null, null);
INSERT INTO `grupo_asignatura` VALUES ('145', '2', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('146', '3', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('147', '4', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('148', '5', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('149', '6', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('150', '7', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('151', '8', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('152', '9', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('153', '10', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('154', '11', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('155', '12', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('156', '13', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('157', '14', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('158', '15', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('159', '16', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('160', '17', '9', null, null);
INSERT INTO `grupo_asignatura` VALUES ('161', '2', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('162', '3', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('163', '4', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('164', '5', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('165', '6', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('166', '7', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('167', '8', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('168', '9', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('169', '10', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('170', '11', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('171', '12', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('172', '13', '10', null, null);
INSERT INTO `grupo_asignatura` VALUES ('173', '2', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('174', '3', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('175', '4', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('176', '5', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('177', '6', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('178', '7', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('179', '8', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('180', '9', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('181', '10', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('182', '11', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('183', '12', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('184', '13', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('185', '14', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('186', '15', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('187', '16', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('188', '17', '11', null, null);
INSERT INTO `grupo_asignatura` VALUES ('189', '1', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('190', '2', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('191', '3', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('192', '4', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('193', '5', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('194', '8', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('195', '9', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('196', '10', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('197', '11', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('198', '12', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('199', '13', '12', null, null);
INSERT INTO `grupo_asignatura` VALUES ('200', '2', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('201', '3', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('202', '4', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('203', '5', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('204', '6', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('205', '7', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('206', '8', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('207', '9', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('208', '10', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('209', '11', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('210', '12', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('211', '13', '13', null, null);
INSERT INTO `grupo_asignatura` VALUES ('212', '6', '14', null, null);
INSERT INTO `grupo_asignatura` VALUES ('213', '7', '14', null, null);
INSERT INTO `grupo_asignatura` VALUES ('214', '6', '15', null, null);
INSERT INTO `grupo_asignatura` VALUES ('215', '7', '15', null, null);
INSERT INTO `grupo_asignatura` VALUES ('220', '6', '16', null, null);
INSERT INTO `grupo_asignatura` VALUES ('221', '7', '16', null, null);
INSERT INTO `grupo_asignatura` VALUES ('222', '14', '16', null, null);
INSERT INTO `grupo_asignatura` VALUES ('223', '15', '16', null, null);
INSERT INTO `grupo_asignatura` VALUES ('224', '16', '16', null, null);
INSERT INTO `grupo_asignatura` VALUES ('225', '17', '16', null, null);
INSERT INTO `grupo_asignatura` VALUES ('226', '8', '17', null, null);
INSERT INTO `grupo_asignatura` VALUES ('227', '9', '17', null, null);
INSERT INTO `grupo_asignatura` VALUES ('228', '10', '17', null, null);
INSERT INTO `grupo_asignatura` VALUES ('229', '11', '17', null, null);
INSERT INTO `grupo_asignatura` VALUES ('230', '12', '17', null, null);
INSERT INTO `grupo_asignatura` VALUES ('231', '13', '17', null, null);
INSERT INTO `grupo_asignatura` VALUES ('232', '8', '18', null, null);
INSERT INTO `grupo_asignatura` VALUES ('233', '9', '18', null, null);
INSERT INTO `grupo_asignatura` VALUES ('234', '10', '18', null, null);
INSERT INTO `grupo_asignatura` VALUES ('235', '11', '18', null, null);
INSERT INTO `grupo_asignatura` VALUES ('236', '12', '18', null, null);
INSERT INTO `grupo_asignatura` VALUES ('237', '13', '18', null, null);
INSERT INTO `grupo_asignatura` VALUES ('238', '8', '19', null, null);
INSERT INTO `grupo_asignatura` VALUES ('239', '9', '19', null, null);
INSERT INTO `grupo_asignatura` VALUES ('240', '10', '19', null, null);
INSERT INTO `grupo_asignatura` VALUES ('241', '11', '19', null, null);
INSERT INTO `grupo_asignatura` VALUES ('242', '12', '19', null, null);
INSERT INTO `grupo_asignatura` VALUES ('243', '13', '19', null, null);
INSERT INTO `grupo_asignatura` VALUES ('244', '14', '20', null, null);
INSERT INTO `grupo_asignatura` VALUES ('245', '15', '20', null, null);
INSERT INTO `grupo_asignatura` VALUES ('246', '16', '20', null, null);
INSERT INTO `grupo_asignatura` VALUES ('247', '17', '20', null, null);
INSERT INTO `grupo_asignatura` VALUES ('248', '14', '21', null, null);
INSERT INTO `grupo_asignatura` VALUES ('249', '15', '21', null, null);
INSERT INTO `grupo_asignatura` VALUES ('250', '16', '21', null, null);
INSERT INTO `grupo_asignatura` VALUES ('251', '17', '21', null, null);
INSERT INTO `grupo_asignatura` VALUES ('252', '14', '22', null, null);
INSERT INTO `grupo_asignatura` VALUES ('253', '15', '22', null, null);
INSERT INTO `grupo_asignatura` VALUES ('254', '16', '22', null, null);
INSERT INTO `grupo_asignatura` VALUES ('255', '17', '22', null, null);
INSERT INTO `grupo_asignatura` VALUES ('256', '14', '23', null, null);
INSERT INTO `grupo_asignatura` VALUES ('257', '15', '23', null, null);
INSERT INTO `grupo_asignatura` VALUES ('258', '16', '23', null, null);
INSERT INTO `grupo_asignatura` VALUES ('259', '17', '23', null, null);
INSERT INTO `grupo_asignatura` VALUES ('260', '14', '24', null, null);
INSERT INTO `grupo_asignatura` VALUES ('261', '15', '24', null, null);
INSERT INTO `grupo_asignatura` VALUES ('262', '16', '24', null, null);
INSERT INTO `grupo_asignatura` VALUES ('263', '17', '24', null, null);
INSERT INTO `grupo_asignatura` VALUES ('264', '6', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('265', '7', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('266', '8', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('267', '9', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('268', '10', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('269', '11', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('270', '12', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('271', '13', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('272', '14', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('273', '15', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('274', '16', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('275', '17', '25', null, null);
INSERT INTO `grupo_asignatura` VALUES ('276', '14', '26', null, null);
INSERT INTO `grupo_asignatura` VALUES ('277', '15', '26', null, null);
INSERT INTO `grupo_asignatura` VALUES ('278', '16', '26', null, null);
INSERT INTO `grupo_asignatura` VALUES ('279', '17', '26', null, null);
INSERT INTO `grupo_asignatura` VALUES ('280', '14', '27', null, null);
INSERT INTO `grupo_asignatura` VALUES ('281', '15', '27', null, null);
INSERT INTO `grupo_asignatura` VALUES ('282', '16', '27', null, null);
INSERT INTO `grupo_asignatura` VALUES ('283', '17', '27', null, null);
INSERT INTO `grupo_asignatura` VALUES ('284', '14', '28', null, null);
INSERT INTO `grupo_asignatura` VALUES ('285', '15', '28', null, null);
INSERT INTO `grupo_asignatura` VALUES ('286', '16', '28', null, null);
INSERT INTO `grupo_asignatura` VALUES ('287', '17', '28', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of img_user
-- ----------------------------
INSERT INTO `img_user` VALUES ('1', 'imag_1515944423.jpg', '3', '2018-01-14 07:40:24', '2018-01-14 07:40:24');
INSERT INTO `img_user` VALUES ('2', 'imag_1519148133.jpg', '6', '2018-02-20 17:35:34', '2018-02-20 17:35:34');
INSERT INTO `img_user` VALUES ('3', 'imag_1519158528.jpg', '7', '2018-02-20 20:28:48', '2018-02-20 20:28:48');
INSERT INTO `img_user` VALUES ('4', 'imag_1519582353.jpg', '8', '2018-02-25 18:12:33', '2018-02-25 18:12:33');

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
INSERT INTO `password_resets` VALUES ('nelsoncastellanos605@gmail.com', '$2y$10$rfJwhupCezgqOzlrcXYnxuNkn6BdsrjECyJNcV2xyP.OMbS4Szlrm', '2017-11-17 06:35:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profesor_asignatura
-- ----------------------------
INSERT INTO `profesor_asignatura` VALUES ('1', null, null, '1', '1', '2');
INSERT INTO `profesor_asignatura` VALUES ('2', null, null, '2', '1', '4');
INSERT INTO `profesor_asignatura` VALUES ('4', null, null, '1', '3', '2');
INSERT INTO `profesor_asignatura` VALUES ('5', null, null, '1', '3', '1');
INSERT INTO `profesor_asignatura` VALUES ('6', null, null, '4', '1', '1');
INSERT INTO `profesor_asignatura` VALUES ('7', null, null, '4', '3', '2');
INSERT INTO `profesor_asignatura` VALUES ('8', null, null, '5', '2', '1');
INSERT INTO `profesor_asignatura` VALUES ('9', null, null, '5', '1', '2');
INSERT INTO `profesor_asignatura` VALUES ('11', null, null, '7', '3', '10');
INSERT INTO `profesor_asignatura` VALUES ('12', null, null, '7', '3', '17');

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
  `updated_at` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proyectos
-- ----------------------------
INSERT INTO `proyectos` VALUES ('1', '', '0', '0', '0', 'Proyecto de matemática', 'Descripción de proyectos', '0000-00-00', '2018-02-15', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-29');
INSERT INTO `proyectos` VALUES ('2', '', '4', '1', '1', 'Proyecto de matemática', 'Proyecto editado', '0000-00-00', '2018-01-10', '', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-31');
INSERT INTO `proyectos` VALUES ('3', '', '4', '1', '1', 'Nombre de proyecto de matemáti', 'Descripción de proyectos', '0000-00-00', '2018-02-15', 'xls.xls', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-29');
INSERT INTO `proyectos` VALUES ('4', '', '4', '1', '1', 'Proyecto de prueba de fecha de', 'Descripción de proyectos', '0000-00-00', '2018-11-15', '', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-29', '2018-01-29');
INSERT INTO `proyectos` VALUES ('6', '', '4', '1', '1', 'Proyecto de Josephnys', 'Funciona a la perfección', '2018-01-31', '2018-07-17', '', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-01-31', '2018-01-31');
INSERT INTO `proyectos` VALUES ('7', '', '4', '1', '1', 'Proyecto de matemáticas', 'Revisar calendario', '2018-02-04', '2018-02-10', 'xls.xls', 'https://www.youtube.com/embed/43Kc4uPL11A', '', '2018-02-04', '2018-02-04');
INSERT INTO `proyectos` VALUES ('8', '', '4', '1', '1', 'Nombre de proyecto de matemáti', 'Revisar calendario', '2018-02-04', '2018-02-04', 'xls.xls', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-02-04', '2018-02-04');
INSERT INTO `proyectos` VALUES ('9', '', '4', '1', '1', 'Proyecto de matemáticas', 'Descripciones de materiales de matemáticas', '2018-02-04', '2018-02-05', 'xlsx.xlsx', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-02-04', '2018-02-04');
INSERT INTO `proyectos` VALUES ('10', '', '4', '1', '1', 'prueba', 'Descripciones', '2018-02-05', '2018-02-02', '', '#', '', '2018-02-05', '2018-02-05');
INSERT INTO `proyectos` VALUES ('11', '[1,2,3]', '4', '1', '1', 'Al fin', 'Descripciones', '2018-02-05', '2018-02-20', 'xlsx.xlsx', 'https://www.youtube.com/embed/jUV068nwxM4', '', '2018-02-05', '2018-02-05');

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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of publicacion
-- ----------------------------
INSERT INTO `publicacion` VALUES ('1', '1', '1', '1', '0', 'trigonometria', 'pasos para aprender trigonometria', '', '', '', '2018-01-15 16:00:00', '2018-01-15 16:00:00', null);
INSERT INTO `publicacion` VALUES ('2', '2', '1', '3', '0', 'ciencias', 'aprender ciencias', '', '', '', '2018-01-15 16:00:00', '2018-01-15 16:00:00', null);
INSERT INTO `publicacion` VALUES ('3', '0', '0', '1', '0', 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpD7FB.tmp', 'Observaciones', '2018-01-16 20:55:17', '2018-01-16 20:55:17', '4');
INSERT INTO `publicacion` VALUES ('4', '0', '0', '1', '0', 'Titulo cápsula', 'capsula de asignatura', '', 'C:\\xampp\\tmp\\phpE0A3.tmp', 'Observaciones', '2018-01-16 21:04:04', '2018-01-16 21:04:04', '4');
INSERT INTO `publicacion` VALUES ('12', '1', '0', '1', '0', 'trigonometria 1', 'manual y ejercicios de trigonometria', '', 'C:\\xampp\\tmp\\php382B.tmp', 'ninguna', '2018-01-18 10:41:02', '2018-01-18 10:46:03', '1');
INSERT INTO `publicacion` VALUES ('13', '2', '0', '3', '0', 'recursos naturales', 'material de repaso para proxima clase', '', 'C:\\xampp\\tmp\\php8365.tmp', 'ninguna', '2018-01-18 10:43:31', '2018-01-18 10:43:31', '1');
INSERT INTO `publicacion` VALUES ('14', '4', '0', '3', '5', 'prueba capcula', 'prueba', '', 'C:\\xampp\\tmp\\php3333.tmp', 'ninguna', '2018-01-18 10:50:49', '2018-01-18 10:50:49', '1');
INSERT INTO `publicacion` VALUES ('55', '5', '0', '3', '0', 'Titulo materialh prueba ciencias', 'descripcion', 'Doc.doc', 'https://www.youtube.com/embed/8L5PqL4ylIU', 'observaciones materialh', '2018-01-21 09:58:37', '2018-01-21 15:18:29', '4');
INSERT INTO `publicacion` VALUES ('57', '4', '0', '3', '0', 'titulo capsulas prueba de vídeos', 'descripción capsulas', 'xls.xls', 'https://www.youtube.com/embed/jUV068nwxM4', 'observaciones de guías', '2018-01-21 10:07:27', '2018-01-21 21:20:25', '4');
INSERT INTO `publicacion` VALUES ('58', '4', '0', '3', '0', 'titulo de  capsulas editado', 'descripción capsulas', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-21 10:09:22', '2018-01-21 23:36:10', '4');
INSERT INTO `publicacion` VALUES ('59', '5', '0', '3', '0', 'materialhs ciencias', 'materialhs ciencias probar enlace a youtube', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/L3i9l4XDIE4', 'Bien hecho', '2018-01-21 19:46:15', '2018-01-21 19:46:15', '4');
INSERT INTO `publicacion` VALUES ('60', '2', '0', '1', '0', 'Título material matemática', 'Probar vídeo de youtube', 'Doc.doc', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona correctamente', '2018-01-21 19:59:15', '2018-01-21 19:59:15', '4');
INSERT INTO `publicacion` VALUES ('61', '2', '0', '1', '0', 'Título matemática', 'No guardar archivo', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona', '2018-01-21 20:08:08', '2018-01-21 20:08:08', '4');
INSERT INTO `publicacion` VALUES ('62', '1', '0', '1', '0', 'Título probar agregar vídeos', 'Descripción prueba de vídeos', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Well done', '2018-01-21 20:34:42', '2018-01-21 20:34:42', '4');
INSERT INTO `publicacion` VALUES ('63', '4', '0', '1', '0', 'Título para agregar cápsula', 'Descripción cápsulas', 'Doc.doc', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-21 20:38:23', '2018-01-21 20:38:23', '4');
INSERT INTO `publicacion` VALUES ('64', '2', '0', '3', '0', 'Título de ciencias materialc', 'Descripción materialc', '', 'https://www.youtube.com/embed/FtdrlIT5SSs', 'Observaciones', '2018-01-21 20:41:07', '2018-01-24 20:15:18', '4');
INSERT INTO `publicacion` VALUES ('65', '5', '0', '1', '0', 'Título material habilitado matemáticas', 'Descripción', '', 'https://www.youtube.com/embed/FtdrlIT5SSs', 'Observaciones', '2018-01-21 20:43:05', '2018-01-24 20:16:21', '4');
INSERT INTO `publicacion` VALUES ('66', '4', '0', '1', '0', 'Título capsulas matemáticas', 'Probar a guardar un link érroneo a vídeo', 'Docs.docx', '', 'Observaciones', '2018-01-21 21:03:34', '2018-01-21 21:03:34', '4');
INSERT INTO `publicacion` VALUES ('67', '4', '0', '1', '0', 'titulo cápsula prueba vídeo', 'Descripción', '', 'https://www.youtube.com/embed/NOPXC2-W6U0', 'Prueba vídeo', '2018-01-21 21:11:42', '2018-01-24 19:51:15', '4');
INSERT INTO `publicacion` VALUES ('68', '4', '0', '1', '0', 'Prueba vídeo de matemáticas', 'Descripción', '', '#', 'Funciona', '2018-01-21 21:14:12', '2018-01-24 19:44:06', '4');
INSERT INTO `publicacion` VALUES ('69', '4', '0', '3', '0', 'Título de cápsulas para ciencias', 'Descripción cápsulas para ciencias', 'xls.xls', 'https://www.youtube.com/embed/3V3cW0iSvg8', 'Excelente', '2018-01-22 01:02:53', '2018-01-22 01:02:53', '4');
INSERT INTO `publicacion` VALUES ('70', '4', '0', '3', '0', 'Otra prueba cápsulas ciencias', 'Descripción', 'xls.xls', 'https://www.youtube.com/embed/pu9dyA45tfc', 'Aprobado', '2018-01-22 01:13:53', '2018-01-22 01:13:53', '4');
INSERT INTO `publicacion` VALUES ('71', '1', '0', '3', '0', 'Título guía ciencias', 'Probar fecha', '', 'https://www.youtube.com/embed/iYwFXUbjl_0', 'Muy bien', '2018-01-22 01:50:50', '2018-01-22 01:50:50', '4');
INSERT INTO `publicacion` VALUES ('72', '5', '0', '3', '0', 'Título material habilitado ciencias', 'Descripción material habilitado', 'xls.xls', '#', 'Aprobado. Comprimir y enviar', '2018-01-22 02:01:48', '2018-01-22 02:01:48', '4');
INSERT INTO `publicacion` VALUES ('74', '4', '0', '1', '0', 'Guardar materia y grupo', 'Descripción', 'Docs.docx', 'https://www.youtube.com/embed/KyjjFYM8aUg', 'Observaciones', '2018-01-25 22:49:29', '2018-01-25 22:49:29', '4');
INSERT INTO `publicacion` VALUES ('75', '4', '0', '1', '0', 'Guardar materia y grupo', 'Descripción', 'xls.xls', 'https://www.youtube.com/embed/iEqPk28w9mI', 'Funcionaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-01-25 22:59:11', '2018-01-25 22:59:11', '4');
INSERT INTO `publicacion` VALUES ('76', '4', '0', '1', '0', 'Guardar materia y grupo', 'Descripción', 'xls.xls', 'https://www.youtube.com/embed/iEqPk28w9mI', 'Funcionaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-01-25 23:01:36', '2018-01-25 23:01:36', '4');
INSERT INTO `publicacion` VALUES ('77', '4', '0', '3', '2', 'Prueba de archivos', 'Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descripción Descri', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-27 07:51:43', '2018-01-27 13:36:26', '4');
INSERT INTO `publicacion` VALUES ('78', '1', '0', '1', '1', 'Título de guías de matemáticas', 'Descripción sin vídeo de youtube', 'xls.xls', '#', 'Observaciones', '2018-01-27 08:06:29', '2018-01-27 08:06:29', '4');
INSERT INTO `publicacion` VALUES ('79', '1', '0', '1', '1', 'Título de matemáticas', 'Descripción de guías sin archivo', '', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona apropiadamente', '2018-01-27 08:07:37', '2018-01-27 08:07:37', '4');
INSERT INTO `publicacion` VALUES ('80', '2', '0', '1', '7', 'Pruebas de materiales complementarios', 'Descripciones de materiales', '', '#', 'Funciona', '2018-01-27 08:22:20', '2018-01-27 08:22:20', '4');
INSERT INTO `publicacion` VALUES ('81', '2', '0', '1', '1', 'Título de prueba con materiales', 'Descripción de materiales', 'PDF Prueba.pdf', 'https://www.youtube.com/embed/jUV068nwxM4', 'Funciona', '2018-01-27 08:41:57', '2018-01-27 08:42:16', '4');
INSERT INTO `publicacion` VALUES ('82', '5', '0', '3', '2', 'Título de material habilitado', 'Descripciones de materiales', 'Docs.docx', 'https://www.youtube.com/embed/jUV068nwxM4', 'Observaciones', '2018-01-27 08:46:49', '2018-01-27 08:47:39', '4');
INSERT INTO `publicacion` VALUES ('83', '4', '0', '3', '2', 'Prueba ciencias otro teacher', 'Descripción otro teacher', '', '', 'Observaciones', null, null, null);
INSERT INTO `publicacion` VALUES ('85', '2', '0', '3', '1', 'Prueba otro profesor de ciencias', 'Descripción', '', '', 'Quedó perfecto', '2018-01-30 20:00:00', '2018-01-30 20:00:00', '2');
INSERT INTO `publicacion` VALUES ('86', '5', '0', '3', '3', 'Título para guía de ciencia', 'Guía de ciencias(Revisar obligatoriamente)', '', '#', 'Observaciones', '2018-01-27 12:54:43', '2018-01-27 12:54:43', '3');
INSERT INTO `publicacion` VALUES ('87', '1', '0', '3', '2', 'Material complementario de prueba', 'Descripción de material complementario', '', '#', 'Funciona perfectamente', '2018-01-27 13:07:20', '2018-01-27 13:07:20', '4');
INSERT INTO `publicacion` VALUES ('88', '1', '0', '1', '1', 'prueba', 'prueba12222', 'Manual de Ingreso Aula Virtual.docx', 'https://www.youtube.com/embed/xzC7HdpM8sk', 'ningunaeeeeeeeeeeeeee', '2018-02-07 22:11:08', '2018-02-07 22:11:08', '1');
INSERT INTO `publicacion` VALUES ('89', '1', '0', '1', '1', 'el colera', 'historia del cpolera', 'TP639874.doc', 'https://www.youtube.com/embed/veaGIv0XvyQ', 'estudiar para mañana', '2018-02-16 00:40:33', '2018-02-16 00:40:33', '2');

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
  `primer_apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_perfil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Nelson Castellano', '', '', '', '', '', '', '', '0000-00-00', 'nelsoncastellanos605@gmail.com', 'admin', '$2y$10$ludyHVIN9q8JwQA5tP.uV.gvvN3TfOBROngZh6brxqfUN0FmBzmf2', 'MBmiFkx8KIpPbSnU5c7u4juikQAH8CzQj9jZrlIbti8aWWu0Gqq4vACt15Ge', '2017-11-17 06:35:15', '2017-11-17 06:35:15', '');
INSERT INTO `users` VALUES ('2', 'david garcia', '', '', '', '', '', '', '', '0000-00-00', 'david@gmail.com', 'profesor', '$2y$10$L8/DAX89015O6bIsxpXr7u2AO4JgXECWyqs0OuEIccRK1mPNBlP/2', 'OXHHBQrtcEeSjKGTaBPagov4CWwKCnEAg62rtPymXWPlXDZVTsXk1kWef7kV', '2017-12-30 11:47:27', '2018-01-19 09:34:25', '');
INSERT INTO `users` VALUES ('3', 'Manuel Guevara', '', '', '', '', '', '', '', '0000-00-00', 'manuel@gmail.com', 'alumno', '$2y$10$cb.JKJKfSLf1TCDcSGULmueHLYVyow3cm6F0iDaUW17P.C5u3/TUm', 'URc5unjQm20jOSoneAVxRsT8YpEBObX7wPIo0QL6vkFFvqZQkmoMf4YTU5la', '2018-01-14 07:40:23', '2018-02-10 15:43:06', null);
INSERT INTO `users` VALUES ('4', 'Manuel Guevara', '', '', '', '', '', '', '', '0000-00-00', 'correo@gmail.com', 'profesor', '$2y$10$gGHBz6q/erQWMfZImzvgLu97UTm01Mfum4cNwcUQ14ZwmoYthDQRm', 'ruzBwwR2H7vf9R74XqdoUzyMOscvM1tuTD3zCxA4GsgiW8YqCiIzALGg7w3x', '2018-01-28 07:11:51', '2018-01-28 07:11:51', null);
INSERT INTO `users` VALUES ('5', 'prueba', '', '', '', '', '', '', '', '0000-00-00', 'prueba@gmail.com', 'profesor', '$2y$10$c37Zv7itTsHvMIJZ1p3w0uWxhTxRAezvVaYwnKcE42SbwJ5A8ScJG', 'bu4ZEV1J2o0TFmDNat6nn0ThQC8L0Axjnlq8mKaHipG5lpe61p1GyKhZmyWy', '2018-01-19 09:46:25', '2018-01-19 09:46:25', null);
INSERT INTO `users` VALUES ('6', 'gabriel', 'alejandro', 'castellano', 'martinez', '123456', '', 'chile av. ecuador', '12345678', '0000-00-00', 'gabriel@gmail.com', 'alumno', '$2y$10$b0LDgRSWZUEGdhW5hFZfBOCv/5JMThpQ1tfGIPRsICwGCpDTJtEuC', 'qAli1GkJ2MvCyOZdyR42Ptzpn82WKAe9tDovtpJVqn39DbD5TpKe2WIwOebC', '2018-02-20 17:35:33', '2018-02-20 17:35:33', null);
INSERT INTO `users` VALUES ('7', 'carlina', null, 'maritinez', 'seijas', '1234567', '', 'Manuel Mont 235', '123456', '0000-00-00', 'carlina@gmail.com', 'profesor', '$2y$10$UDL7Ttm2tIFjvrhLHHIl9.6YhNJhYMJohiUZZGRx0KLvpyTTUAFP.', 'yatgxxRKVFUWM0DpGBaG0Snsu7Fdd1wEnMI4PaoomCPko4HPqcHvZzAKIptr', '2018-02-20 20:28:48', '2018-02-20 20:28:48', null);
INSERT INTO `users` VALUES ('8', 'mariana', 'gabriela', 'castellano', 'cabrera', '123456', '', 'Lord Cochrane 136', '12345678', '0000-00-00', 'mariana@gmail.com', 'alumno', '$2y$10$Q9tIVKGHYpDoml9OuDEF9.wHAYudGAANExOuW9QEeMDjy46v25YO.', null, '2018-02-25 18:12:33', '2018-02-25 18:12:33', null);
