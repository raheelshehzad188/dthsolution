-- Add button_color column to setting table
ALTER TABLE `setting` ADD COLUMN `button_color` VARCHAR(7) NULL DEFAULT '#154880' AFTER `navigation_color`;

