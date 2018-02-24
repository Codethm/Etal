-- MySQL Script generated by MySQL Workbench
-- Sat Feb 24 21:12:50 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema etalDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema etalDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `etalDB` DEFAULT CHARACTER SET utf8 ;
USE `etalDB` ;

-- -----------------------------------------------------
-- Table `etalDB`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`student` (
  `idstudent` INT NOT NULL,
  `Fname` VARCHAR(45) NULL,
  `Lname` VARCHAR(45) NULL,
  `Major` VARCHAR(45) NULL,
  PRIMARY KEY (`idstudent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `etalDB`.`teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`teacher` (
  `idteacher` INT NOT NULL,
  `fullname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`idteacher`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `etalDB`.`subjects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`subjects` (
  `idsubjects` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `techer` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `numweek` INT NULL,
  `teacher_idteacher` INT NOT NULL,
  PRIMARY KEY (`idsubjects`),
  INDEX `fk_subjects_teacher1_idx` (`teacher_idteacher` ASC),
  CONSTRAINT `fk_subjects_teacher1`
    FOREIGN KEY (`teacher_idteacher`)
    REFERENCES `etalDB`.`teacher` (`idteacher`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `etalDB`.`class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`class` (
  `idclass` INT NOT NULL,
  `weeknum` INT NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`idclass`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `etalDB`.`student_has_subjects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`student_has_subjects` (
  `student_idstudent` INT NOT NULL,
  `subjects_idsubjects` INT NOT NULL,
  PRIMARY KEY (`student_idstudent`, `subjects_idsubjects`),
  INDEX `fk_student_has_subjects_subjects1_idx` (`subjects_idsubjects` ASC),
  INDEX `fk_student_has_subjects_student_idx` (`student_idstudent` ASC),
  CONSTRAINT `fk_student_has_subjects_student`
    FOREIGN KEY (`student_idstudent`)
    REFERENCES `etalDB`.`student` (`idstudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_subjects_subjects1`
    FOREIGN KEY (`subjects_idsubjects`)
    REFERENCES `etalDB`.`subjects` (`idsubjects`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `etalDB`.`subjects_has_class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`subjects_has_class` (
  `subjects_idsubjects` INT NOT NULL,
  `class_idclass` INT NOT NULL,
  PRIMARY KEY (`subjects_idsubjects`, `class_idclass`),
  INDEX `fk_subjects_has_class_class1_idx` (`class_idclass` ASC),
  INDEX `fk_subjects_has_class_subjects1_idx` (`subjects_idsubjects` ASC),
  CONSTRAINT `fk_subjects_has_class_subjects1`
    FOREIGN KEY (`subjects_idsubjects`)
    REFERENCES `etalDB`.`subjects` (`idsubjects`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subjects_has_class_class1`
    FOREIGN KEY (`class_idclass`)
    REFERENCES `etalDB`.`class` (`idclass`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `etalDB`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `etalDB`.`attendance` (
  `idattendance` INT NOT NULL,
  `student_idstudent` INT NOT NULL,
  `class_idclass` INT NOT NULL,
  `time` DATETIME NULL,
  PRIMARY KEY (`idattendance`),
  INDEX `fk_attendance_student1_idx` (`student_idstudent` ASC),
  INDEX `fk_attendance_class1_idx` (`class_idclass` ASC),
  CONSTRAINT `fk_attendance_student1`
    FOREIGN KEY (`student_idstudent`)
    REFERENCES `etalDB`.`student` (`idstudent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_attendance_class1`
    FOREIGN KEY (`class_idclass`)
    REFERENCES `etalDB`.`class` (`idclass`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
