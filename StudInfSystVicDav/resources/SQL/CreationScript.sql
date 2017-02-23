-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema StudentInformationSystem
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `StudentInformationSystem` ;

-- -----------------------------------------------------
-- Schema StudentInformationSystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `StudentInformationSystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `StudentInformationSystem` ;

-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`phone_numbers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`phone_numbers` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`phone_numbers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `home_phone` VARCHAR(45) NULL COMMENT '',
  `work_phone` VARCHAR(45) NULL COMMENT '',
  `mobile_phone` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`person` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`person` (
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
    REFERENCES `StudentInformationSystem`.`phone_numbers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`parent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`parent` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`parent` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `work_address` VARCHAR(140) NULL COMMENT '',
  `marital_status` ENUM('MARRIED', 'SINGLE', 'DIVORCED', 'WIDOWED') NOT NULL COMMENT '',
  `instruction_grade` VARCHAR(45) NULL COMMENT '',
  `craft_profession` VARCHAR(45) NULL COMMENT '',
  `live_with_the_student` TINYINT(1) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_parent_person`
    FOREIGN KEY (`id`)
    REFERENCES `StudentInformationSystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`legal_representative`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`legal_representative` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`legal_representative` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `work_address` VARCHAR(140) NULL COMMENT '',
  `authorized_by` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_legal_representative_person1_idx` (`id` ASC)  COMMENT '',
  CONSTRAINT `fk_legal_representative_person1`
    FOREIGN KEY (`id`)
    REFERENCES `StudentInformationSystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`users` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(255) NOT NULL COMMENT '',
  `email` VARCHAR(255) NOT NULL COMMENT '',
  `password` VARCHAR(60) NOT NULL COMMENT '',
  `remember_token` VARCHAR(100) NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `type` ENUM('admin', 'teacher', 'administrativePersonLevel1', 'administrativePersonLevel2') NOT NULL COMMENT '',
  `status` INT(1) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`teacher` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`teacher` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `teacher_code` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_teacher_person1`
    FOREIGN KEY (`id`)
    REFERENCES `StudentInformationSystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`grade_section`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`grade_section` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`grade_section` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `grade` ENUM('1', '2', '3', '4', '5', '6') NOT NULL COMMENT '',
  `section_letter` ENUM('A', 'B', 'C', 'D', 'E', 'F', 'G') NULL COMMENT '',
  `teacher_id` INT UNSIGNED NULL COMMENT '',
  `capacity` INT(11) NULL COMMENT '',
  `shift` ENUM('AM', 'PM') NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_section_teacher1_idx` (`teacher_id` ASC)  COMMENT '',
  CONSTRAINT `fk_section_teacher1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `StudentInformationSystem`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`student` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`student` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `height` FLOAT NULL COMMENT '',
  `weight` FLOAT NULL COMMENT '',
  `born_place` VARCHAR(45) NULL COMMENT '',
  `born_date` DATE NULL COMMENT '',
  `pedagogical_difficulties` VARCHAR(60) NULL COMMENT '',
  `diseases_affecting` VARCHAR(45) NULL COMMENT '',
  `after_school_activities` VARCHAR(45) NULL COMMENT '',
  `status` INT(1) NULL COMMENT '',
  `relationship_with_legal_representative` VARCHAR(45) NULL COMMENT '',
  `grade_to_be_register` ENUM('1°', '2°', '3°', '4°', '5°', '6°') NULL COMMENT '',
  `parent_id` INT UNSIGNED NULL COMMENT '',
  `legal_representative_id` INT UNSIGNED NOT NULL COMMENT '',
  `grade_section_id` INT UNSIGNED NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_student_parent1_idx` (`parent_id` ASC)  COMMENT '',
  INDEX `fk_student_legal_representative1_idx` (`legal_representative_id` ASC)  COMMENT '',
  INDEX `fk_student_section1_idx` (`grade_section_id` ASC)  COMMENT '',
  CONSTRAINT `fk_table1_person1`
    FOREIGN KEY (`id`)
    REFERENCES `StudentInformationSystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_parent1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `StudentInformationSystem`.`parent` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_legal_representative1`
    FOREIGN KEY (`legal_representative_id`)
    REFERENCES `StudentInformationSystem`.`legal_representative` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_section1`
    FOREIGN KEY (`grade_section_id`)
    REFERENCES `StudentInformationSystem`.`grade_section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`brotherhood`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`brotherhood` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`brotherhood` (
  `student_id` INT UNSIGNED NOT NULL COMMENT '',
  `student_id1` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`student_id`, `student_id1`)  COMMENT '',
  INDEX `fk_student_has_student_student2_idx` (`student_id1` ASC)  COMMENT '',
  INDEX `fk_student_has_student_student1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_student_has_student_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `StudentInformationSystem`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_student_student2`
    FOREIGN KEY (`student_id1`)
    REFERENCES `StudentInformationSystem`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`migrations` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`migrations` (
  `migration` VARCHAR(255) NOT NULL COMMENT '',
  `batch` INT(11) NOT NULL COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`password_resets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`password_resets` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`password_resets` (
  `email` VARCHAR(255) NOT NULL COMMENT '',
  `token` VARCHAR(255) NOT NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`system_parameters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`system_parameters` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`system_parameters` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `school_name` VARCHAR(45) NULL COMMENT '',
  `school_principal` VARCHAR(45) NULL COMMENT '',
  `school_mission` VARCHAR(500) NULL COMMENT '',
  `school_vision` VARCHAR(500) NULL COMMENT '',
  `school_address` VARCHAR(45) NULL COMMENT '',
  `school_logo` BLOB NULL COMMENT '',
  `school_phone` VARCHAR(45) NULL COMMENT '',
  `school_email` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `StudentInformationSystem`.`student_grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `StudentInformationSystem`.`student_grades` ;

CREATE TABLE IF NOT EXISTS `StudentInformationSystem`.`student_grades` (
  `id` INT NOT NULL COMMENT '',
  `period` INT(1) NOT NULL COMMENT '',
  `value` INT(1) NOT NULL COMMENT '',
  `student_id` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_student_grades_student1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_student_grades_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `StudentInformationSystem`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`phone_numbers`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`phone_numbers` (`id`, `home_phone`, `work_phone`, `mobile_phone`) VALUES (1, '02742525684', '02722444444', '04248358530');

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`person`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (1, 'V20847147', 'José', 'Cardozo', 'MALE', 'Avenida 3, Milla', 'jcardozo17@gmail.com', NULL, 1);
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (2, 'V20200366', 'Jesés', 'Rosales', 'MALE', 'Santa Juana', 'jesus_jfri@hotmail.com', NULL, NULL);
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (3, 'V8000000', 'Milagros', 'Izarra', 'FEMALE', 'Santa Juana', 'milagros@gmail.com', NULL, NULL);
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (4, 'V3782023', 'Fani', 'Martos', 'FEMALE', 'Avenida 3, Milla', 'fani_mar08@gmail.com', NULL, NULL);
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (5, 'E4326459', 'José  Manuel', 'Cardozo', 'MALE', 'Avenida 3, Milla', 'manolo@gmail.com', NULL, NULL);
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (6, 'V10875432', 'Liliana', 'Capacho', 'FEMALE', 'Residencias El Rodeo', 'liliana@ula.ve', NULL, NULL);
INSERT INTO `StudentInformationSystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (7, 'E9872342', 'Gerard', 'Paez', 'MALE', 'Residencias Belensate', 'gerard@ula.ve', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`parent`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`parent` (`id`, `work_address`, `marital_status`, `instruction_grade`, `craft_profession`, `live_with_the_student`) VALUES (5, 'Avenida Urdaneta', 'MARRIED', 'Profesional', NULL, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`legal_representative`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`legal_representative` (`id`, `work_address`, `authorized_by`) VALUES (3, 'Santa Juana', NULL);
INSERT INTO `StudentInformationSystem`.`legal_representative` (`id`, `work_address`, `authorized_by`) VALUES (4, 'Santa Monica', NULL);
INSERT INTO `StudentInformationSystem`.`legal_representative` (`id`, `work_address`, `authorized_by`) VALUES (5, 'Avenida Urdaneta  Milla', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `status`) VALUES (1, 'Administrador', 'admin@admin.com', '$2y$10$uBNbcDO24s/zP5zeGaOJCe0lzhRtuR2cgxoG6OLkVBw/j9nV982gm', '', '2016-04-13 18:43:00', '2016-04-13 18:43:00', 'admin', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`teacher`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`teacher` (`id`, `teacher_code`) VALUES (6, '12213');
INSERT INTO `StudentInformationSystem`.`teacher` (`id`, `teacher_code`) VALUES (7, '13231');

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`grade_section`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (1, '1', 'A', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (2, '1', 'B', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (3, '1', 'C', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (4, '2', 'A', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (5, '2', 'B', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (6, '2', 'C', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (7, '3', 'A', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (8, '3', 'B', NULL, NULL, NULL);
INSERT INTO `StudentInformationSystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (9, '3', 'C', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`student`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`student` (`id`, `height`, `weight`, `born_place`, `born_date`, `pedagogical_difficulties`, `diseases_affecting`, `after_school_activities`, `status`, `relationship_with_legal_representative`, `grade_to_be_register`, `parent_id`, `legal_representative_id`, `grade_section_id`) VALUES (2, 1.73, 65, 'Mérida', '1991-09-17', NULL, NULL, NULL, 1, NULL, '3°', NULL, 3, NULL);
INSERT INTO `StudentInformationSystem`.`student` (`id`, `height`, `weight`, `born_place`, `born_date`, `pedagogical_difficulties`, `diseases_affecting`, `after_school_activities`, `status`, `relationship_with_legal_representative`, `grade_to_be_register`, `parent_id`, `legal_representative_id`, `grade_section_id`) VALUES (1, 1.77, 71, 'Mérida', '1991-04-17', NULL, NULL, NULL, 1, NULL, '5°', NULL, 4, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `StudentInformationSystem`.`system_parameters`
-- -----------------------------------------------------
START TRANSACTION;
USE `StudentInformationSystem`;
INSERT INTO `StudentInformationSystem`.`system_parameters` (`id`, `school_name`, `school_principal`, `school_mission`, `school_vision`, `school_address`, `school_logo`, `school_phone`, `school_email`) VALUES (1, 'Nombre de la Escuela', 'Director de la Escuela', 'Mision de la Escuela', 'Vision de la Escuela', 'Dirección de la Escuela', NULL, '00000000000', 'emaildelaescuela@gmail.com');

COMMIT;

