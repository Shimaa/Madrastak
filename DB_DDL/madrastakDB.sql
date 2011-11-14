SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `madrastak` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `madrastak` ;

-- -----------------------------------------------------
-- Table `madrastak`.`UserType`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`UserType` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `value` INT NULL ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`UserProfile`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`UserProfile` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `date_of_birth` DATE NULL ,
  `image_path` VARCHAR(100) NULL ,
  `gender` TINYINT(1)  NULL ,
  `name_appear_as` VARCHAR(45) NULL ,
  `address` VARCHAR(100) NULL ,
  `telephone` VARCHAR(45) NULL ,
  `mobile` VARCHAR(45) NULL ,
  `job` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Child`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Child` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `school_id` INT NULL ,
  `school_name` VARCHAR(45) NULL ,
  `gradeLevel_id` INT NULL ,
  `user_id` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `madrastak`.`Governate`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Governate` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country_id` INT NULL ,
  `arabic_name` VARCHAR(45) NULL ,
  `english_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Country`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Country` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `arabic_name` VARCHAR(45) NULL ,
  `english_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`City`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`City` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `governate_id` INT NULL ,
  `arabic_name` VARCHAR(45) NULL ,
  `english_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`District`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`District` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `city_id` INT NULL ,
  `arabic_name` VARCHAR(45) NULL ,
  `english_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Location`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Location` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country_id` INT NULL ,
  `governate_id` INT NULL ,
  `city_id` INT NULL ,
  `district_id` INT NULL ,
  `arabic_detailed_address` VARCHAR(100) NULL ,
  `english_detailed_address` VARCHAR(45) NULL ,
  `latitude` DOUBLE NULL ,
  `longitude` DOUBLE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Location_Governate1` (`governate_id` ASC) ,
  INDEX `fk_Location_Country1` (`country_id` ASC) ,
  INDEX `fk_Location_City1` (`city_id` ASC) ,
  INDEX `fk_Location_District1` (`district_id` ASC) ,
  CONSTRAINT `fk_Location_Governate1`
    FOREIGN KEY (`governate_id` )
    REFERENCES `madrastak`.`Governate` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Location_Country1`
    FOREIGN KEY (`country_id` )
    REFERENCES `madrastak`.`Country` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Location_City1`
    FOREIGN KEY (`city_id` )
    REFERENCES `madrastak`.`City` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Location_District1`
    FOREIGN KEY (`district_id` )
    REFERENCES `madrastak`.`District` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`FeeRange`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`FeeRange` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `lower_value` VARCHAR(45) NULL ,
  `higher value` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`School`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`School` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `english_name` VARCHAR(45) NULL ,
  `arabic_name` VARCHAR(45) NULL ,
  `telephone1` VARCHAR(45) NULL ,
  `telephone2` VARCHAR(45) NULL ,
  `telephone3` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `website` VARCHAR(45) NULL ,
  `location_id` INT NULL ,
  `fee_range_id` INT NULL ,
  `logo_path` VARCHAR(45) NULL ,
  `other` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_School_Location` (`location_id` ASC) ,
  INDEX `fk_School_FeeRange1` (`fee_range_id` ASC) ,
  CONSTRAINT `fk_School_Location`
    FOREIGN KEY (`location_id` )
    REFERENCES `madrastak`.`Location` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_School_FeeRange1`
    FOREIGN KEY (`fee_range_id` )
    REFERENCES `madrastak`.`FeeRange` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Rating`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Rating` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `value` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `review_text` VARCHAR(1000) NULL ,
  `schools_categories_id` INT NULL ,
  `schools_grade_level_id` INT NULL ,
  `submit_date` DATETIME NULL ,
  `latest_update` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`UserSchoolRating`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`UserSchoolRating` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `school_id` INT NULL ,
  `rating_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_UserSchoolRating_School1` (`school_id` ASC) ,
  INDEX `fk_UserSchoolRating_User1` (`user_id` ASC) ,
  INDEX `fk_UserSchoolRating_Rating1` (`rating_id` ASC) ,
  CONSTRAINT `fk_UserSchoolRating_School1`
    FOREIGN KEY (`school_id` )
    REFERENCES `madrastak`.`School` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserSchoolRating_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `madrastak`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserSchoolRating_Rating1`
    FOREIGN KEY (`rating_id` )
    REFERENCES `madrastak`.`Rating` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Subscription`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Subscription` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  `repeat_mode` INT NULL ,
  `arabic_name` VARCHAR(100) NULL ,
  `englsih_name` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`UserSubscriptions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`UserSubscriptions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `subscription_id` INT NULL ,
  `subscription_date` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_UserSubscriptions_User1` (`user_id` ASC) ,
  INDEX `fk_UserSubscriptions_Subscription1` (`subscription_id` ASC) ,
  CONSTRAINT `fk_UserSubscriptions_User1`
    FOREIGN KEY (`user_id` )
    REFERENCES `madrastak`.`User` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserSubscriptions_Subscription1`
    FOREIGN KEY (`subscription_id` )
    REFERENCES `madrastak`.`Subscription` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_arabic_name` VARCHAR(45) NULL ,
  `category_english_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`SchoolsCategories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`SchoolsCategories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_id` INT NULL ,
  `school_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_SchoolsCategories_School1` (`school_id` ASC) ,
  INDEX `fk_SchoolsCategories_Category1` (`category_id` ASC) ,
  CONSTRAINT `fk_SchoolsCategories_School1`
    FOREIGN KEY (`school_id` )
    REFERENCES `madrastak`.`School` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SchoolsCategories_Category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `madrastak`.`Category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`GradeLevel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`GradeLevel` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `level_arabic` VARCHAR(45) NULL ,
  `level_english` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`SchoolsGradeLevels`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`SchoolsGradeLevels` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `school_id` INT NULL ,
  `grade_level_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_SchoolsGradeLevels_School1` (`school_id` ASC) ,
  INDEX `fk_SchoolsGradeLevels_GradeLevel1` (`grade_level_id` ASC) ,
  CONSTRAINT `fk_SchoolsGradeLevels_School1`
    FOREIGN KEY (`school_id` )
    REFERENCES `madrastak`.`School` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SchoolsGradeLevels_GradeLevel1`
    FOREIGN KEY (`grade_level_id` )
    REFERENCES `madrastak`.`GradeLevel` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`SchoolPictures`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`SchoolPictures` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `school_id` INT NULL ,
  `image_path` VARCHAR(100) NULL ,
  `english_description` VARCHAR(500) NULL ,
  `arabic_description` VARCHAR(500) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_SchoolPictures_School1` (`school_id` ASC) ,
  CONSTRAINT `fk_SchoolPictures_School1`
    FOREIGN KEY (`school_id` )
    REFERENCES `madrastak`.`School` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`Comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`Comment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `text` VARCHAR(1000) NULL ,
  `user_school_rating_id` INT NULL ,
  `post_date` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Comment_UserSchoolRating1` (`user_school_rating_id` ASC) ,
  CONSTRAINT `fk_Comment_UserSchoolRating1`
    FOREIGN KEY (`user_school_rating_id` )
    REFERENCES `madrastak`.`UserSchoolRating` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `madrastak`.`CalendarEvent`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `madrastak`.`CalendarEvent` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NULL ,
  `description` VARCHAR(1000) NULL ,
  `start_date` DATE NULL ,
  `end_date` DATE NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `madrastak`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NOT NULL ,
  `first_name` VARCHAR(45) NULL ,
  `last_name` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `user_type_id` INT NULL ,
  `user_profile_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_User_UserType1` (`user_type_id` ASC) ,
  INDEX `fk_User_UserProfile1` (`user_profile_id` ASC) ,
  CONSTRAINT `fk_User_UserType1`
    FOREIGN KEY (`user_type_id` )
    REFERENCES `madrastak`.`UserType` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_UserProfile1`
    FOREIGN KEY (`user_profile_id` )
    REFERENCES `madrastak`.`UserProfile` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB

ALTER TABLE `madrastak`.`user` ADD COLUMN `activation_token` VARCHAR(10) NULL  AFTER `user_profile_id` , ADD COLUMN `last_activation_request` DATETIME NULL  AFTER `activation_token` , ADD COLUMN `active` TINYINT(1)  NULL  AFTER `last_activation_request` , ADD COLUMN `signup_date` DATETIME NULL  AFTER `active` , ADD COLUMN `last_login` DATETIME NULL  AFTER `signup_date` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
