ALTER TABLE `jocasta`.`invoice`
ADD COLUMN `notes` TEXT NULL AFTER `paid`,
ADD COLUMN `modified_at` TIMESTAMP NULL DEFAULT current_timestamp on update current_timestamp AFTER `notes`,
ADD COLUMN `created_at` TIMESTAMP NULL DEFAULT current_timestamp AFTER `modified_at`;
