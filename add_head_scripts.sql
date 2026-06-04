-- Add head_scripts column to setting table
ALTER TABLE `setting` ADD COLUMN `head_scripts` LONGTEXT NULL AFTER `theme_style`;

