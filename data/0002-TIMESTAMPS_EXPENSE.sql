ALTER TABLE `jocasta`.`expense`
ADD COLUMN `modified_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP on update current_timestamp AFTER `reimbursed`,
ADD COLUMN `created_at` TIMESTAMP NULL DEFAULT current_timestamp AFTER `modified_at`;
ALTER TABLE `jocasta`.`expense`
DROP COLUMN `reimbursable`;
ALTER TABLE `jocasta`.`expense`
CHANGE COLUMN `amount` `amount` DECIMAL(10,2) NOT NULL ,
CHANGE COLUMN `vat_amount` `vat_amount` DECIMAL(10,2) NULL ;
ALTER TABLE `jocasta`.`expense`
ADD COLUMN `notes` TEXT NULL AFTER `paid`;
