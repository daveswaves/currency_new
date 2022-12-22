-- Database: currency

CREATE TABLE `currency_models` (
  `iso_code` varchar(3) NOT NULL,
  `dollar_value` double NOT NULL,
  PRIMARY KEY (`iso_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `currency_models` (`iso_code`, `dollar_value`) VALUES
('eur', 1.03),
('gbp', 1.19);