-- ================================================================
-- Base de datos: circunferencia_cris
-- Proyecto: Sistema de cálculo de circunferencias
-- ================================================================

CREATE DATABASE IF NOT EXISTS `circunferencia_cris`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `circunferencia_cris`;

-- ----------------------------
-- Tabla: usuario
-- ----------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre`     VARCHAR(150) NOT NULL DEFAULT '',
  `correo`     VARCHAR(255) NOT NULL,
  `clave`      VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `uq_usuario_correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Tabla: circunferencia
-- ----------------------------
CREATE TABLE IF NOT EXISTS `circunferencia` (
  `id_circunferencia` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario`        INT UNSIGNED NOT NULL,
  `detalle`           TEXT NULL,
  `radio`             DOUBLE NOT NULL,
  `area`              DOUBLE NOT NULL,
  `perimetro`         DOUBLE NOT NULL,
  `fecha_registro`    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_circunferencia`),
  KEY `idx_circunferencia_usuario` (`id_usuario`),
  CONSTRAINT `fk_circunferencia_usuario`
    FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id_usuario`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Usuario inicial (clave: 2929)
-- ----------------------------
INSERT INTO `usuario` (`nombre`, `correo`, `clave`)
SELECT 'Administrador', 'admin@circu', '2929'
WHERE NOT EXISTS (SELECT 1 FROM `usuario` WHERE `correo` = 'admin@circu');