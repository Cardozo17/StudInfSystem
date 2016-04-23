-- MySQL Script generated by MySQL Workbench
-- 04/23/16 16:37:55
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema VicenteDavila
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `VicenteDavila` ;

-- -----------------------------------------------------
-- Schema VicenteDavila
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `VicenteDavila` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `VicenteDavila` ;

-- -----------------------------------------------------
-- Table `VicenteDavila`.`phone_numbers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`phone_numbers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `home_phone` VARCHAR(45) NULL COMMENT '',
  `work_phone` VARCHAR(45) NULL COMMENT '',
  `mobile_phone` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`person` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `document_id` VARCHAR(45) NOT NULL COMMENT '',
  `name` VARCHAR(45) NOT NULL COMMENT '',
  `last_name` VARCHAR(45) NOT NULL COMMENT '',
  `gender` ENUM('MALE', 'FEMALE') NULL COMMENT '',
  `home_address` VARCHAR(140) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `picture` BLOB NULL COMMENT '',
  `phone_numbers_id` INT UNSIGNED NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_person_phone_number1_idx` (`phone_numbers_id` ASC)  COMMENT '',
  UNIQUE INDEX `document_id_UNIQUE` (`document_id` ASC)  COMMENT '',
  CONSTRAINT `fk_person_phone_number1`
    FOREIGN KEY (`phone_numbers_id`)
    REFERENCES `VicenteDavila`.`phone_numbers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`parent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`parent` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `work_address` VARCHAR(140) NULL COMMENT '',
  `marital_status` ENUM('MARRIED', 'SINGLE', 'DIVORCED', 'WIDOWED') NOT NULL COMMENT '',
  `instruction_grade` VARCHAR(45) NULL COMMENT '',
  `craft_profession` VARCHAR(45) NULL COMMENT '',
  `live_with_the_student` TINYINT(1) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_parent_person`
    FOREIGN KEY (`id`)
    REFERENCES `VicenteDavila`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`legal_representative`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`legal_representative` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `work_address` VARCHAR(140) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_legal_representative_person1_idx` (`id` ASC)  COMMENT '',
  CONSTRAINT `fk_legal_representative_person1`
    FOREIGN KEY (`id`)
    REFERENCES `VicenteDavila`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(255) NOT NULL COMMENT '',
  `email` VARCHAR(255) NOT NULL COMMENT '',
  `password` VARCHAR(60) NOT NULL COMMENT '',
  `remember_token` VARCHAR(100) NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `type` ENUM('admin', 'teacher', 'administrativePersonLevel1', 'administrativePersonLevel2') NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`teacher` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `teacher_code` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_teacher_person1`
    FOREIGN KEY (`id`)
    REFERENCES `VicenteDavila`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`section` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `grade` ENUM('1°', '2°', '3°', '4°', '5°', '6°') NULL COMMENT '',
  `section_letter` VARCHAR(2) NULL COMMENT '',
  `teacher_id` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_section_teacher1_idx` (`teacher_id` ASC)  COMMENT '',
  CONSTRAINT `fk_section_teacher1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `VicenteDavila`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`student` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `height` FLOAT NULL COMMENT '',
  `weight` FLOAT NULL COMMENT '',
  `born_place` VARCHAR(45) NULL COMMENT '',
  `born_date` DATE NULL COMMENT '',
  `pedagogical_difficulties` VARCHAR(60) NULL COMMENT '',
  `diseases_affecting` VARCHAR(45) NULL COMMENT '',
  `after_school_activities` VARCHAR(45) NULL COMMENT '',
  `status` INT(1) NULL COMMENT '',
  `teacher_id` INT UNSIGNED NULL COMMENT '',
  `relationship_with_legal_representative` VARCHAR(45) NULL COMMENT '',
  `parent_id` INT UNSIGNED NULL COMMENT '',
  `legal_representative_id` INT UNSIGNED NOT NULL COMMENT '',
  `section_id` INT UNSIGNED NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_student_teacher1_idx` (`teacher_id` ASC)  COMMENT '',
  INDEX `fk_student_parent1_idx` (`parent_id` ASC)  COMMENT '',
  INDEX `fk_student_legal_representative1_idx` (`legal_representative_id` ASC)  COMMENT '',
  INDEX `fk_student_section1_idx` (`section_id` ASC)  COMMENT '',
  CONSTRAINT `fk_table1_person1`
    FOREIGN KEY (`id`)
    REFERENCES `VicenteDavila`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_teacher1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `VicenteDavila`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_parent1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `VicenteDavila`.`parent` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_legal_representative1`
    FOREIGN KEY (`legal_representative_id`)
    REFERENCES `VicenteDavila`.`legal_representative` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_section1`
    FOREIGN KEY (`section_id`)
    REFERENCES `VicenteDavila`.`section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`brotherhood`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`brotherhood` (
  `student_id` INT UNSIGNED NOT NULL COMMENT '',
  `student_id1` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`student_id`, `student_id1`)  COMMENT '',
  INDEX `fk_student_has_student_student2_idx` (`student_id1` ASC)  COMMENT '',
  INDEX `fk_student_has_student_student1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_student_has_student_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `VicenteDavila`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_student_student2`
    FOREIGN KEY (`student_id1`)
    REFERENCES `VicenteDavila`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`migrations` (
  `migration` VARCHAR(255) NOT NULL COMMENT '',
  `batch` INT(11) NOT NULL COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `VicenteDavila`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `VicenteDavila`.`password_resets` (
  `email` VARCHAR(255) NOT NULL COMMENT '',
  `token` VARCHAR(255) NOT NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`phone_numbers`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`phone_numbers` (`id`, `home_phone`, `work_phone`, `mobile_phone`) VALUES (1, '02742525684', '04248358530', '04248358530');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`person`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (1, '20847147', 'Jose', 'Cardozo', 'MALE', 'Avenida 3, Milla', 'jcardozo17@gmail.com', NULL, 1);
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (2, '20200366', 'Jesus', 'Rosales', 'MALE', 'Santa Juana', 'jesus_jfri@hotmail.com', NULL, 1);
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (3, '8000000', 'Milagros', 'Izarra', 'FEMALE', 'Santa Juana', 'milagros@gmail.com', NULL, 1);
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (4, '3782023', 'Fani', 'Martos', 'FEMALE', 'Avenida 3, Milla', 'fani_mar08@gmail.com', NULL, 1);
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (5, '4326459', 'Jose  Manuel', 'Cardozo', 'MALE', 'Avenida 3, Milla', 'manolo@gmail.com', NULL, 1);
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (6, '10875432', 'Liliana', 'Capacho', 'FEMALE', 'Residencias El Rodeo', 'liliana@ula.ve', NULL, 1);
INSERT INTO `VicenteDavila`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (7, '9872342', 'Gerard', 'Paez', 'MALE', 'Residencias Belensate', 'gerard@ula.ve', NULL, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`parent`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`parent` (`id`, `work_address`, `marital_status`, `instruction_grade`, `craft_profession`, `live_with_the_student`) VALUES (5, 'Avenida Urdaneta', 'Casado', 'Profesional', NULL, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`legal_representative`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`legal_representative` (`id`, `work_address`) VALUES (3, 'Santa Juana');
INSERT INTO `VicenteDavila`.`legal_representative` (`id`, `work_address`) VALUES (4, 'Santa Monica');
INSERT INTO `VicenteDavila`.`legal_representative` (`id`, `work_address`) VALUES (5, 'Avenida Urdaneta  Milla');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES (1, 'Administrador', 'admin@admin.com', '$2y$10$uBNbcDO24s/zP5zeGaOJCe0lzhRtuR2cgxoG6OLkVBw/j9nV982gm', '', '2016-04-13 18:43:00', '2016-04-13 18:43:00', 'admin');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`teacher`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`teacher` (`id`, `teacher_code`) VALUES (6, '12213');
INSERT INTO `VicenteDavila`.`teacher` (`id`, `teacher_code`) VALUES (7, '13231');

COMMIT;


-- -----------------------------------------------------
-- Data for table `VicenteDavila`.`student`
-- -----------------------------------------------------
START TRANSACTION;
USE `VicenteDavila`;
INSERT INTO `VicenteDavila`.`student` (`id`, `height`, `weight`, `born_place`, `born_date`, `pedagogical_difficulties`, `diseases_affecting`, `after_school_activities`, `status`, `teacher_id`, `relationship_with_legal_representative`, `parent_id`, `legal_representative_id`, `section_id`) VALUES (1, 1.77, 73, 'Merida', '1991-04-17', '', NULL, NULL, 1, NULL, 'Parent', 5, 4, NULL);
INSERT INTO `VicenteDavila`.`student` (`id`, `height`, `weight`, `born_place`, `born_date`, `pedagogical_difficulties`, `diseases_affecting`, `after_school_activities`, `status`, `teacher_id`, `relationship_with_legal_representative`, `parent_id`, `legal_representative_id`, `section_id`) VALUES (2, 1.74, 65, 'Merida', '1991-09-10', NULL, NULL, NULL, 1, NULL, 'Parent', NULL, 3, NULL);

COMMIT;

