USE `nicatrip_datos` ;

-- -----------------------------------------------------
-- Table `nicatrip_datos`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip_datos`.`user` ;

CREATE TABLE IF NOT EXISTS `nicatrip_datos`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(35) NOT NULL,
  `last_name` VARCHAR(35) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `url` VARCHAR(400) NOT NULL,
  `activationkey` VARCHAR(45) NOT NULL,
  `username` VARCHAR(40) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `aboutme` VARCHAR(600) NULL,
  `coverpicture` VARCHAR(200) NULL,
  `profilepicture` VARCHAR(200) NULL,
  `birthday` DATE NOT NULL,
  `live` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip_datos`.`acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip_datos`.`acceso` ;

CREATE TABLE IF NOT EXISTS `nicatrip_datos`.`acceso` (
  `idaccess` INT NOT NULL,
  `ipaddress` VARCHAR(20) NOT NULL,
  `servername` VARCHAR(30) NOT NULL,
  `datestart` DATETIME NOT NULL,
  `dateend` DATETIME NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`idaccess`),
  INDEX `fk_Acceso_usuario_idx` (`id_user` ASC),
  CONSTRAINT `fk_Acceso_usuario`
    FOREIGN KEY (`id_user`)
    REFERENCES `nicatrip_datos`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip_datos`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip_datos`.`post` ;

CREATE TABLE IF NOT EXISTS `nicatrip_datos`.`post` (
  `idpost` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `date` DATETIME NOT NULL,
  `content` VARCHAR(2500) NOT NULL,
  `id_user` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `url` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idpost`),
  INDEX `fk_Post_usuario1_idx` (`id_user` ASC),
  CONSTRAINT `fk_Post_usuario1`
    FOREIGN KEY (`id_user`)
    REFERENCES `nicatrip_datos`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip_datos`.`picture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip_datos`.`picture` ;

CREATE TABLE IF NOT EXISTS `nicatrip_datos`.`picture` (
  `idpicture` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(500) NOT NULL,
  `id_User` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `id_post` INT NOT NULL,
  PRIMARY KEY (`idpicture`),
  INDEX `fk_Foto_usuario1_idx` (`id_User` ASC),
  INDEX `fk_picture_Post1_idx` (`id_post` ASC),
  CONSTRAINT `fk_Foto_usuario1`
    FOREIGN KEY (`id_User`)
    REFERENCES `nicatrip_datos`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_picture_Post1`
    FOREIGN KEY (`id_post`)
    REFERENCES `nicatrip_datos`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip_datos`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip_datos`.`comment` ;

CREATE TABLE IF NOT EXISTS `nicatrip_datos`.`comment` (
  `idcomment` INT NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(2000) NOT NULL,
  `date` DATETIME NOT NULL,
  `id_user` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `id_post` INT NOT NULL,
  PRIMARY KEY (`idcomment`),
  INDEX `fk_Comentario_usuario1_idx` (`id_user` ASC),
  INDEX `fk_Comentario_Post1_idx` (`id_post` ASC),
  CONSTRAINT `fk_Comentario_usuario1`
    FOREIGN KEY (`id_user`)
    REFERENCES `nicatrip_datos`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Post1`
    FOREIGN KEY (`id_post`)
    REFERENCES `nicatrip_datos`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nicatrip_datos`.`video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nicatrip_datos`.`video` ;

CREATE TABLE IF NOT EXISTS `nicatrip_datos`.`video` (
  `idvideo` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(400) NOT NULL,
  `user_iduser` INT NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `id_post` INT NOT NULL,
  PRIMARY KEY (`idvideo`),
  INDEX `fk_Video_Usuario1_idx` (`user_iduser` ASC),
  INDEX `fk_Video_Post1_idx` (`id_post` ASC),
  CONSTRAINT `fk_Video_Usuario1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `nicatrip_datos`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Video_Post1`
    FOREIGN KEY (`id_post`)
    REFERENCES `nicatrip_datos`.`post` (`idpost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
