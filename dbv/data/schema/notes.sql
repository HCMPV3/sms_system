CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_details_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1