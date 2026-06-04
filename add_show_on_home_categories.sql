-- Add show_on_home and home_sort columns to categories table
-- Run this in phpMyAdmin or MySQL

-- Step 1: Add show_on_home (1 = show on homepage, 0 = hide)
ALTER TABLE `categories` ADD COLUMN `show_on_home` TINYINT(1) DEFAULT 0;

-- Step 2: Add home_sort (lower number = higher position on homepage)
ALTER TABLE `categories` ADD COLUMN `home_sort` INT(11) DEFAULT 0;
