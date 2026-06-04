migration.sql
ALTER TABLE `categories` ADD COLUMN `show_on_home` TINYINT(1) DEFAULT 0 AFTER `status`;
ALTER TABLE `categories` ADD COLUMN `home_sort` INT(11) DEFAULT 0 AFTER `show_on_home`;

ALTER TABLE `categories` ADD COLUMN `sort` INT(11) DEFAULT 0;