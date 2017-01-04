-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema fbuh
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fbuh
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fbuh` DEFAULT CHARACTER SET utf8 ;
USE `fbuh` ;

-- -----------------------------------------------------
-- Table `fbuh`.`costItem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`costItem` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`costItem` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(150) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `fbuh`.`revenueItem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`revenueItem` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`revenueItem` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(150) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `fbuh`.`account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`account` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`account` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
INSERT_METHOD = LAST;


-- -----------------------------------------------------
-- Table `fbuh`.`transactionType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`transactionType` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`transactionType` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `fbuh`.`partner`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`partner` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`partner` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `fbuh`.`project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`project` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`project` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(150) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  `completed` TINYINT(1) NOT NULL,
  `success_time` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `fbuh`.`transaction`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fbuh`.`transaction` ;

CREATE TABLE IF NOT EXISTS `fbuh`.`transaction` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(150) NOT NULL,
  `summa` DECIMAL(15,2) NOT NULL,
  `create_time` TIMESTAMP NULL,
  `update_time` TIMESTAMP NULL,
  `time` DATE NOT NULL,
  `costItem_id` INT(11) NOT NULL,
  `revenueItem_id` INT(11) NOT NULL,
  `account_id` INT(11) NOT NULL,
  `transactionType_id` INT(11) NOT NULL,
  `partner_id` INT(11) NOT NULL,
  `project_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_transaction_costItem_idx` (`costItem_id` ASC),
  INDEX `fk_transaction_revenueItem1_idx` (`revenueItem_id` ASC),
  INDEX `fk_transaction_account1_idx` (`account_id` ASC),
  INDEX `fk_transaction_transactionType1_idx` (`transactionType_id` ASC),
  INDEX `fk_transaction_partner1_idx` (`partner_id` ASC),
  INDEX `fk_transaction_project1_idx` (`project_id` ASC),
  CONSTRAINT `fk_transaction_costItem`
    FOREIGN KEY (`costItem_id`)
    REFERENCES `fbuh`.`costItem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_revenueItem1`
    FOREIGN KEY (`revenueItem_id`)
    REFERENCES `fbuh`.`revenueItem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_account1`
    FOREIGN KEY (`account_id`)
    REFERENCES `fbuh`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_transactionType1`
    FOREIGN KEY (`transactionType_id`)
    REFERENCES `fbuh`.`transactionType` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_partner1`
    FOREIGN KEY (`partner_id`)
    REFERENCES `fbuh`.`partner` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `fbuh`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
