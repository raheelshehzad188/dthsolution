-- Add home_sort column to categories table for homepage featured categories sorting
ALTER TABLE `categories` ADD COLUMN `home_sort` INT(11) DEFAULT 0 AFTER `show_on_home`;

