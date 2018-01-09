-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema jocasta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jocasta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jocasta` DEFAULT CHARACTER SET utf8 ;
USE `jocasta` ;

-- -----------------------------------------------------
-- Table `jocasta`.`organisation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jocasta`.`organisation` (
  `idorganisation` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `address` TEXT NOT NULL,
  `vat` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `notes` TEXT NULL,
  PRIMARY KEY (`idorganisation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jocasta`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jocasta`.`invoice` (
  `idinvoice` INT NOT NULL AUTO_INCREMENT,
  `organisation` INT NOT NULL,
  `amount` DECIMAL NOT NULL,
  `vat_percent` DECIMAL NULL,
  `date` DATE NOT NULL,
  `paid` TINYINT(1) NULL,
  PRIMARY KEY (`idinvoice`),
  INDEX `fk_invoice_organisation_idx` (`organisation` ASC),
  CONSTRAINT `fk_invoice_organisation`
    FOREIGN KEY (`organisation`)
    REFERENCES `jocasta`.`organisation` (`idorganisation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jocasta`.`expense`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jocasta`.`expense` (
  `idexpense` INT NOT NULL AUTO_INCREMENT,
  `organisation` INT NOT NULL,
  `amount` DECIMAL NOT NULL,
  `vat_percentage` DECIMAL NULL,
  `date` DATE NOT NULL,
  `paid` TINYINT(1) NULL,
  `reimbursable` TINYINT(1) NULL,
  `reimburser` INT NULL,
  `reimbursed` TINYINT(1) NULL,
  PRIMARY KEY (`idexpense`),
  INDEX `fk_invoice_organisation_idx` (`organisation` ASC),
  INDEX `fk_expense_reimburser_idx` (`reimburser` ASC),
  CONSTRAINT `fk_expense_organisation`
    FOREIGN KEY (`organisation`)
    REFERENCES `jocasta`.`organisation` (`idorganisation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_expense_reimburser`
    FOREIGN KEY (`reimburser`)
    REFERENCES `jocasta`.`organisation` (`idorganisation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jocasta`.`xref_expense_invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jocasta`.`xref_expense_invoice` (
  `idxref_reimbursement_expense` INT NOT NULL AUTO_INCREMENT,
  `expense` INT NOT NULL,
  `invoice` INT NOT NULL,
  PRIMARY KEY (`idxref_reimbursement_expense`),
  INDEX `fk_xref_ei_expense_idx` (`expense` ASC),
  INDEX `fk_xref_ei_invoice_idx` (`invoice` ASC),
  CONSTRAINT `fk_xref_ei_expense`
    FOREIGN KEY (`expense`)
    REFERENCES `jocasta`.`expense` (`idexpense`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_xref_ei_invoice`
    FOREIGN KEY (`invoice`)
    REFERENCES `jocasta`.`invoice` (`idinvoice`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
