CREATE DATABASE SitterDB;
 
USE "SitterDB";

-- -----------------------------------------------------
-- Table `SitterDB`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SitterDB`.`Users` (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Role` VARCHAR(2) NOT NULL,
  `FirstName` VARCHAR(100) NOT NULL,
  `LastName` VARCHAR(100) NOT NULL,
  `PhoneNumber` VARCHAR(45) NOT NULL,
  `EmailAddress` VARCHAR(45) NOT NULL,
  `IPAddress` VARCHAR(45) NULL,
  PRIMARY KEY (`UserID`));

-- -----------------------------------------------------
-- Table `SitterDB`.`Sitters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SitterDB`.`Sitters` (
  `SitterID` INT NOT NULL AUTO_INCREMENT,
  `UserID` INT NOT NULL,
  `Specilization` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`SitterID`),
  FOREIGN KEY (`UserID`) REFERENCES `SitterDB`.`Users` (`UserID`));


-- -----------------------------------------------------
-- Table `SitterDB`.`Clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SitterDB`.`Clients` (
  `ClientID` INT NOT NULL AUTO_INCREMENT,
  `UserID` INT NOT NULL,
  `PetType` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`ClientID`),
  FOREIGN KEY (`UserID`) REFERENCES `SitterDB`.`Users` (`UserID`));


-- -----------------------------------------------------
-- Table `SitterDB`.`Requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SitterDB`.`Requests` (
  `RequestNumber` INT NOT NULL AUTO_INCREMENT,
  `TypeOfRequest` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `ServiceState` VARCHAR(1) NOT NULL,
  `SitterID` INT NOT NULL,
  `ClientID` INT NOT NULL,
  PRIMARY KEY (`requestNumber`),
  FOREIGN KEY (`SitterID`) REFERENCES `SitterDB`.`Sitters` (`SitterID`),
  FOREIGN KEY (`ClientID`) REFERENCES `SitterDB`.`Clients` (`ClientID`));


-- -----------------------------------------------------
-- Table `SitterDB`.`Comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SitterDB`.`Comments` (
  `CommentID` INT NOT NULL AUTO_INCREMENT,
  `Comment` VARCHAR(1000) NOT NULL,
  `UserID` INT NOT NULL,
  `RequestNumber` INT NOT NULL,
  PRIMARY KEY (`commentID`),
  FOREIGN KEY (`UserID`) REFERENCES `SitterDB`.`Users` (`UserID`));