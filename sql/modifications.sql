/*added new field for ebay link*/ALTER TABLE `viven`.`products` ADD COLUMN `ebay_url` LONGTEXT NOT NULL AFTER `images`;