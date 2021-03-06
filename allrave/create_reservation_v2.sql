CREATE TABLE `fx_reservation_v2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alternate_phone1` varchar(20) NOT NULL,
  `alternate_phone2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `flight_number` varchar(50) DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `pickup_address` varchar(100) NOT NULL,
  `dropoff_address` varchar(100) NOT NULL,
  `car` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `special_instruction` text,
  `calendar_id` varchar(100) NULL,
  `event_id` varchar(100) NULL,
  `rave_status` varchar(20) NULL,
  `client_status` varchar(20) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

