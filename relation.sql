-- MySQL Workbench Synchronization
-- Generated: 2015-05-08 19:18
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: glorio yulianto

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `Grocery`.`Product` 
CHANGE COLUMN `product_key` `product_key` FLOAT(11) NOT NULL ,
ADD PRIMARY KEY (`product_key`);

ALTER TABLE `Grocery`.`Promotion` 
CHANGE COLUMN `promotion_key` `promotion_key` FLOAT(11) NOT NULL ,
ADD PRIMARY KEY (`promotion_key`);

ALTER TABLE `Grocery`.`Sales Fact` 
ADD COLUMN `Time_time_key` FLOAT(11) NOT NULL AFTER `customer_count`,
ADD COLUMN `Store_store_key` FLOAT(11) NOT NULL AFTER `Time_time_key`,
ADD COLUMN `Product_product_key` FLOAT(11) NOT NULL AFTER `Store_store_key`,
ADD COLUMN `Promotion_promotion_key` FLOAT(11) NOT NULL AFTER `Product_product_key`,
ADD INDEX `fk_Sales Fact_Time_idx` (`Time_time_key` ASC),
ADD INDEX `fk_Sales Fact_Store1_idx` (`Store_store_key` ASC),
ADD INDEX `fk_Sales Fact_Product1_idx` (`Product_product_key` ASC),
ADD INDEX `fk_Sales Fact_Promotion1_idx` (`Promotion_promotion_key` ASC);

ALTER TABLE `Grocery`.`Store` 
CHANGE COLUMN `store_key` `store_key` FLOAT(11) NOT NULL ,
ADD PRIMARY KEY (`store_key`);

ALTER TABLE `Grocery`.`Time` 
CHANGE COLUMN `time_key` `time_key` FLOAT(11) NOT NULL ,
ADD PRIMARY KEY (`time_key`);

ALTER TABLE `Grocery`.`Sales Fact` 
ADD CONSTRAINT `fk_Sales Fact_Time`
  FOREIGN KEY (`Time_time_key`)
  REFERENCES `Grocery`.`Time` (`time_key`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Sales Fact_Store1`
  FOREIGN KEY (`Store_store_key`)
  REFERENCES `Grocery`.`Store` (`store_key`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Sales Fact_Product1`
  FOREIGN KEY (`Product_product_key`)
  REFERENCES `Grocery`.`Product` (`product_key`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Sales Fact_Promotion1`
  FOREIGN KEY (`Promotion_promotion_key`)
  REFERENCES `Grocery`.`Promotion` (`promotion_key`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
