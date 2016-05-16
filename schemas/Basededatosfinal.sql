-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema proyecto_final
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proyecto_final
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto_final` DEFAULT CHARACTER SET utf8 ;
USE `proyecto_final` ;

-- -----------------------------------------------------
-- Table `proyecto_final`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`users` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`users` (
  `username` VARCHAR(45) NOT NULL COMMENT '',
  `password` VARCHAR(250) NOT NULL COMMENT '',
  `is_admin` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '',
  PRIMARY KEY (`username`)  COMMENT '')
ENGINE = InnoDB;

INSERT INTO `users` VALUES ('Drae','$2y$10$RBzd0gnOEg5/xely5LD0bO8d2kPd04lmTDMSAyEHaBF4DvGbEqZYy',1);

-- -----------------------------------------------------
-- Table `proyecto_final`.`alumnos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`alumnos` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`alumnos` (
  `NIE` INT NOT NULL COMMENT '',
  `Nombre` VARCHAR(45) NULL COMMENT '',
  `apellidos` VARCHAR(60) NULL COMMENT '',
  `DNI` VARCHAR(45) NULL COMMENT '',
  `Pasaporte` VARCHAR(45) NULL COMMENT '',
  `Direccion` VARCHAR(60) NULL COMMENT '',
  `Localidad` VARCHAR(45) NULL COMMENT '',
  `Provincia` VARCHAR(40) NULL COMMENT '',
  `Lugna` VARCHAR(45) NULL COMMENT '',
  `Fecna` DATE NULL COMMENT '',
  `Tlf` VARCHAR(13) NULL COMMENT '',
  `TlfUrg` VARCHAR(13) NULL COMMENT '',
  `UltimaMatricula` INT(4) NULL COMMENT '',
  PRIMARY KEY (`NIE`)  COMMENT '',
  UNIQUE INDEX `DNI_UNIQUE` (`DNI` ASC)  COMMENT '',
  UNIQUE INDEX `Pasaporte_UNIQUE` (`Pasaporte` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_final`.`FamAlumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`FamAlumno` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`FamAlumno` (
  `alumnos_NIE` INT NOT NULL COMMENT '',
  `alumnos_NIE_Familiar` INT NOT NULL COMMENT '',
  `Relacion` INT NULL DEFAULT 1 COMMENT '',
  PRIMARY KEY (`alumnos_NIE`, `alumnos_NIE_Familiar`)  COMMENT '',
  INDEX `fk_FamAlumno_alumnos1_idx` (`alumnos_NIE_Familiar` ASC)  COMMENT '',
  CONSTRAINT `fk_Familiares_alumnos`
    FOREIGN KEY (`alumnos_NIE`)
    REFERENCES `proyecto_final`.`alumnos` (`NIE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FamAlumno_alumnos1`
    FOREIGN KEY (`alumnos_NIE_Familiar`)
    REFERENCES `proyecto_final`.`alumnos` (`NIE`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_final`.`Familiares`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`Familiares` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`Familiares` (
  `alumnos_NIE` INT NOT NULL COMMENT '',
  `Fam_ID` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `Nombre` VARCHAR(45) NULL COMMENT '',
  `apellidos` VARCHAR(60) NULL COMMENT '',
  `DNI` VARCHAR(45) NULL COMMENT '',
  `Pasaporte` VARCHAR(45) NULL COMMENT '',
  `Direccion` VARCHAR(60) NULL COMMENT '',
  `Localidad` VARCHAR(45) NULL COMMENT '',
  `Tlf` VARCHAR(13) NULL COMMENT '',
  PRIMARY KEY (`Fam_ID`)  COMMENT '',
  INDEX `fk_Familiares_alumnos2_idx` (`alumnos_NIE` ASC)  COMMENT '',
  CONSTRAINT `fk_Familiares_alumnos2`
    FOREIGN KEY (`alumnos_NIE`)
    REFERENCES `proyecto_final`.`alumnos` (`NIE`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_final`.`Comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`Comentarios` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`Comentarios` (
  `users_username` VARCHAR(16) NOT NULL COMMENT '',
  `date` DATETIME NOT NULL COMMENT '',
  `acceso` TINYINT(1) NOT NULL COMMENT '',
  `Incidencia` VARCHAR(1000) NULL COMMENT '',
  `alumnos_NIE` INT NOT NULL COMMENT '',
  `TipoIncidencia` INT NOT NULL COMMENT '',
  INDEX `fk_Comentarios_users1_idx` (`users_username` ASC)  COMMENT '',
  PRIMARY KEY (`users_username`, `date`, `alumnos_NIE`)  COMMENT '',
  INDEX `fk_Comentarios_alumnos1_idx` (`alumnos_NIE` ASC)  COMMENT '',
  CONSTRAINT `fk_Comentarios_users1`
    FOREIGN KEY (`users_username`)
    REFERENCES `proyecto_final`.`users` (`username`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Comentarios_alumnos1`
    FOREIGN KEY (`alumnos_NIE`)
    REFERENCES `proyecto_final`.`alumnos` (`NIE`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_final`.`Necesidades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`Necesidades` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`Necesidades` (
  `alumnos_NIE` INT NOT NULL COMMENT '',
  `NEE` TINYINT(1) NOT NULL COMMENT '',
  `MedRec` TINYINT(1) NOT NULL COMMENT '',
  `Tipo` INT NOT NULL COMMENT '',
  `Comentario` VARCHAR(1000) NULL COMMENT '',
  PRIMARY KEY (`alumnos_NIE`, `NEE`, `MedRec`, `Tipo`)  COMMENT '',
  CONSTRAINT `fk_Necesidades_alumnos1`
    FOREIGN KEY (`alumnos_NIE`)
    REFERENCES `proyecto_final`.`alumnos` (`NIE`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto_final`.`ObservacionesAlum`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto_final`.`ObservacionesAlum` ;

CREATE TABLE IF NOT EXISTS `proyecto_final`.`ObservacionesAlum` (
  `ID` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `alumnos_NIE` INT NOT NULL COMMENT '',
  `Acceso` TINYINT(1) NOT NULL COMMENT '',
  `Observacion` VARCHAR(1000) NULL COMMENT '',
  PRIMARY KEY (`ID`)  COMMENT '',
  CONSTRAINT `fk_ObservacionesAlum_alumnos1`
    FOREIGN KEY (`alumnos_NIE`)
    REFERENCES `proyecto_final`.`alumnos` (`NIE`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
