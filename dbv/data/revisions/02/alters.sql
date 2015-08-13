ALTER TABLE  `topics` ADD  `unit_details_id` INT NOT NULL ;
ALTER TABLE  `notes` DROP  `unit_details_id` ;
ALTER TABLE  `topics` DROP  `unit_details_id` ;
ALTER TABLE  `notes` ADD  `user_details_id` INT NOT NULL ;