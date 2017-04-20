-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema studentinformationsystem
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `studentinformationsystem` ;

-- -----------------------------------------------------
-- Schema studentinformationsystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `studentinformationsystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `studentinformationsystem` ;

-- -----------------------------------------------------
-- Table `studentinformationsystem`.`phone_numbers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`phone_numbers` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`phone_numbers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `home_phone` VARCHAR(45) NULL COMMENT '',
  `work_phone` VARCHAR(45) NULL COMMENT '',
  `mobile_phone` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`person` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`person` (
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
    REFERENCES `studentinformationsystem`.`phone_numbers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`parent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`parent` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`parent` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `work_address` VARCHAR(140) NULL COMMENT '',
  `marital_status` ENUM('MARRIED', 'SINGLE', 'DIVORCED', 'WIDOWED') NOT NULL COMMENT '',
  `instruction_grade` VARCHAR(45) NULL COMMENT '',
  `craft_profession` VARCHAR(45) NULL COMMENT '',
  `live_with_the_student` TINYINT(1) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_parent_person`
    FOREIGN KEY (`id`)
    REFERENCES `studentinformationsystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`legal_representative`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`legal_representative` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`legal_representative` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `work_address` VARCHAR(140) NULL COMMENT '',
  `authorized_by` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_legal_representative_person1_idx` (`id` ASC)  COMMENT '',
  CONSTRAINT `fk_legal_representative_person1`
    FOREIGN KEY (`id`)
    REFERENCES `studentinformationsystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`users` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`users` (
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
-- Table `studentinformationsystem`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`teacher` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`teacher` (
  `id` INT UNSIGNED NOT NULL COMMENT '',
  `teacher_code` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_teacher_person1`
    FOREIGN KEY (`id`)
    REFERENCES `studentinformationsystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`grade_section`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`grade_section` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`grade_section` (
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
    REFERENCES `studentinformationsystem`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`student` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`student` (
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
  `grade_to_be_register` ENUM('1', '2', '3', '4', '5', '6') NULL COMMENT '',
  `parent_id` INT UNSIGNED NULL COMMENT '',
  `legal_representative_id` INT UNSIGNED NOT NULL COMMENT '',
  `grade_section_id` INT UNSIGNED NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_student_parent1_idx` (`parent_id` ASC)  COMMENT '',
  INDEX `fk_student_legal_representative1_idx` (`legal_representative_id` ASC)  COMMENT '',
  INDEX `fk_student_section1_idx` (`grade_section_id` ASC)  COMMENT '',
  CONSTRAINT `fk_table1_person1`
    FOREIGN KEY (`id`)
    REFERENCES `studentinformationsystem`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_parent1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `studentinformationsystem`.`parent` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_legal_representative1`
    FOREIGN KEY (`legal_representative_id`)
    REFERENCES `studentinformationsystem`.`legal_representative` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_section1`
    FOREIGN KEY (`grade_section_id`)
    REFERENCES `studentinformationsystem`.`grade_section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`brotherhood`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`brotherhood` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`brotherhood` (
  `student_id` INT UNSIGNED NOT NULL COMMENT '',
  `student_id1` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`student_id`, `student_id1`)  COMMENT '',
  INDEX `fk_student_has_student_student2_idx` (`student_id1` ASC)  COMMENT '',
  INDEX `fk_student_has_student_student1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_student_has_student_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `studentinformationsystem`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_student_student2`
    FOREIGN KEY (`student_id1`)
    REFERENCES `studentinformationsystem`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`migrations` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`migrations` (
  `migration` VARCHAR(255) NOT NULL COMMENT '',
  `batch` INT(11) NOT NULL COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`password_resets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`password_resets` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`password_resets` (
  `email` VARCHAR(255) NOT NULL COMMENT '',
  `token` VARCHAR(255) NOT NULL COMMENT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `studentinformationsystem`.`system_parameters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`system_parameters` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`system_parameters` (
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
-- Table `studentinformationsystem`.`student_grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `studentinformationsystem`.`student_grades` ;

CREATE TABLE IF NOT EXISTS `studentinformationsystem`.`student_grades` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `period` INT(1) NOT NULL COMMENT '',
  `value` INT(1) NOT NULL COMMENT '',
  `student_id` INT UNSIGNED NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_student_grades_student1_idx` (`student_id` ASC)  COMMENT '',
  CONSTRAINT `fk_student_grades_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `studentinformationsystem`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`phone_numbers`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`phone_numbers` (`id`, `home_phone`, `work_phone`, `mobile_phone`) VALUES (1, '02742525684', '02722444444', '04248358530');

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`person`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (1, 'V20847147', 'José', 'Cardozo', 'MALE', 'Avenida 3, Milla', 'jcardozo17@gmail.com', NULL, 1);
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (2, 'V20200366', 'Jesés', 'Rosales', 'MALE', 'Santa Juana', 'jesus_jfri@hotmail.com', NULL, NULL);
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (3, 'V8000000', 'Milagros', 'Izarra', 'FEMALE', 'Santa Juana', 'milagros@gmail.com', NULL, NULL);
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (4, 'V3782023', 'Fani', 'Martos', 'FEMALE', 'Avenida 3, Milla', 'fani_mar08@gmail.com', NULL, NULL);
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (5, 'E4326459', 'José  Manuel', 'Cardozo', 'MALE', 'Avenida 3, Milla', 'manolo@gmail.com', NULL, NULL);
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (6, 'V10875432', 'Liliana', 'Capacho', 'FEMALE', 'Residencias El Rodeo', 'liliana@ula.ve', NULL, NULL);
INSERT INTO `studentinformationsystem`.`person` (`id`, `document_id`, `name`, `last_name`, `gender`, `home_address`, `email`, `picture`, `phone_numbers_id`) VALUES (7, 'E9872342', 'Gerard', 'Paez', 'MALE', 'Residencias Belensate', 'gerard@ula.ve', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`parent`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`parent` (`id`, `work_address`, `marital_status`, `instruction_grade`, `craft_profession`, `live_with_the_student`) VALUES (5, 'Avenida Urdaneta', 'MARRIED', 'Profesional', NULL, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`legal_representative`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`legal_representative` (`id`, `work_address`, `authorized_by`) VALUES (3, 'Santa Juana', NULL);
INSERT INTO `studentinformationsystem`.`legal_representative` (`id`, `work_address`, `authorized_by`) VALUES (4, 'Santa Monica', NULL);
INSERT INTO `studentinformationsystem`.`legal_representative` (`id`, `work_address`, `authorized_by`) VALUES (5, 'Avenida Urdaneta  Milla', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `status`) VALUES (1, 'Administrador', 'admin@admin.com', '$2y$10$uBNbcDO24s/zP5zeGaOJCe0lzhRtuR2cgxoG6OLkVBw/j9nV982gm', '', '2016-04-13 18:43:00', '2016-04-13 18:43:00', 'admin', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`teacher`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`teacher` (`id`, `teacher_code`) VALUES (6, '12213');
INSERT INTO `studentinformationsystem`.`teacher` (`id`, `teacher_code`) VALUES (7, '13231');

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`grade_section`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (1, '1', 'A', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (2, '1', 'B', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (3, '1', 'C', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (4, '2', 'A', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (5, '2', 'B', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (6, '2', 'C', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (7, '3', 'A', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (8, '3', 'B', NULL, NULL, NULL);
INSERT INTO `studentinformationsystem`.`grade_section` (`id`, `grade`, `section_letter`, `teacher_id`, `capacity`, `shift`) VALUES (9, '3', 'C', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`student`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`student` (`id`, `height`, `weight`, `born_place`, `born_date`, `pedagogical_difficulties`, `diseases_affecting`, `after_school_activities`, `status`, `relationship_with_legal_representative`, `grade_to_be_register`, `parent_id`, `legal_representative_id`, `grade_section_id`) VALUES (2, 1.73, 65, 'Mérida', '1991-09-17', NULL, NULL, NULL, 1, NULL, '3', NULL, 3, 2);
INSERT INTO `studentinformationsystem`.`student` (`id`, `height`, `weight`, `born_place`, `born_date`, `pedagogical_difficulties`, `diseases_affecting`, `after_school_activities`, `status`, `relationship_with_legal_representative`, `grade_to_be_register`, `parent_id`, `legal_representative_id`, `grade_section_id`) VALUES (1, 1.77, 71, 'Mérida', '1991-04-17', NULL, NULL, NULL, 1, NULL, '5', NULL, 4, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `studentinformationsystem`.`system_parameters`
-- -----------------------------------------------------
START TRANSACTION;
USE `studentinformationsystem`;
INSERT INTO `studentinformationsystem`.`system_parameters` (`id`, `school_name`, `school_principal`, `school_mission`, `school_vision`, `school_address`, `school_logo`, `school_phone`, `school_email`) VALUES (1, 'Nombre de la Escuela', 'Director de la Escuela', 'Mision de la Escuela', 'Vision de la Escuela', 'Dirección de la Escuela', NULL, '00000000000', 'emaildelaescuela@gmail.com');

COMMIT;

