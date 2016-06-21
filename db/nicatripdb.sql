SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `nicatrip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `nicatrip` ;

-- -----------------------------------------------------
-- Table `nicatrip`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip`.`user` ;

CREATE TABLE IF NOT EXISTS `nicatrip`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(35) NOT NULL,
  `last_name` VARCHAR(35) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `url` VARCHAR(400) NOT NULL,
  `activationkey` VARCHAR(10) NOT NULL,
  `username` VARCHAR(40) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip`.`acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip`.`acceso` ;

CREATE TABLE IF NOT EXISTS `nicatrip`.`acceso` (
  `idaccess` INT NOT NULL,
  `ipaddress` VARCHAR(20) NOT NULL,
  `servername` VARCHAR(30) NOT NULL,
  `datestart` DATETIME NOT NULL,
  `dateend` DATETIME NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idaccess`),
  INDEX `fk_Acceso_usuario_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_Acceso_usuario`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `nicatrip`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip`.`post` ;

CREATE TABLE IF NOT EXISTS `nicatrip`.`post` (
  `idpost` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `date` DATETIME NOT NULL,
  `content` VARCHAR(2500) NOT NULL,
  `user_iduser` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `url` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idpost`),
  INDEX `fk_Post_usuario1_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_Post_usuario1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `nicatrip`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip`.`picture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip`.`picture` ;

CREATE TABLE IF NOT EXISTS `nicatrip`.`picture` (
  `idpicture` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(500) NOT NULL,
  `date` DATETIME NOT NULL,
  `user_idUser` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `Post_idpost` INT NOT NULL,
  PRIMARY KEY (`idpicture`),
  INDEX `fk_Foto_usuario1_idx` (`user_idUser` ASC),
  INDEX `fk_picture_Post1_idx` (`Post_idpost` ASC),
  CONSTRAINT `fk_Foto_usuario1`
    FOREIGN KEY (`user_idUser`)
    REFERENCES `nicatrip`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_picture_Post1`
    FOREIGN KEY (`Post_idpost`)
    REFERENCES `nicatrip`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip`.`comment` ;

CREATE TABLE IF NOT EXISTS `nicatrip`.`comment` (
  `idcomment` INT NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(2000) NOT NULL,
  `date` DATETIME NOT NULL,
  `user_iduser` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `post_idpost` INT NOT NULL,
  PRIMARY KEY (`idcomment`),
  INDEX `fk_Comentario_usuario1_idx` (`user_iduser` ASC),
  INDEX `fk_Comentario_Post1_idx` (`post_idpost` ASC),
  CONSTRAINT `fk_Comentario_usuario1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `nicatrip`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Post1`
    FOREIGN KEY (`post_idpost`)
    REFERENCES `nicatrip`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip`.`video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip`.`video` ;

CREATE TABLE IF NOT EXISTS `nicatrip`.`video` (
  `idvideo` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `url` VARCHAR(400) NOT NULL,
  `user_iduser` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `Post_idpost` INT NOT NULL,
  PRIMARY KEY (`idvideo`),
  INDEX `fk_Video_Usuario1_idx` (`user_iduser` ASC),
  INDEX `fk_Video_Post1_idx` (`Post_idpost` ASC),
  CONSTRAINT `fk_Video_Usuario1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `nicatrip`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Video_Post1`
    FOREIGN KEY (`Post_idpost`)
    REFERENCES `nicatrip`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
