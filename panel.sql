CREATE TABLE `code` (
  `id_code` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `code` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `active_until` date NOT NULL,
  `token` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `logger` (
  `id_logger` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `server_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `terminal_time` datetime NOT NULL,
  `log` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(2) NOT NULL COMMENT '1 = admin, 2 = user',
  `apply_public` int(2) NOT NULL DEFAULT 0 COMMENT '0 - false; 1- true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `monitoring` (
  `id_monitoring` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` int(11) NOT NULL,
  `account_type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `account_server` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ea_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ea_symbols` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ea_settings` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ea_start` datetime NOT NULL,
  `ea_day_trade` int(11) NOT NULL,
  `account_balance` float NOT NULL,
  `account_equity` float NOT NULL,
  `total_order` int(11) NOT NULL,
  `ea_running_symbol` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `floating` float NOT NULL,
  `drawdown` float NOT NULL,
  `drawdown_percent` float NOT NULL,
  `today_profit` float NOT NULL,
  `total_profit` float NOT NULL,
  `daily_profit` float NOT NULL,
  `daily_romad` float NOT NULL,
  `daily_percentage` float NOT NULL,
  `account_first_balance` float NOT NULL,
  `account_total_deposit` float NOT NULL,
  `account_total_withdraw` float NOT NULL,
  `account_romad` float NOT NULL,
  `account_location` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `any_details` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_update` datetime NOT NULL,
  `token` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `token`, `level`, `apply_public`) VALUES 
('admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin','admin@panel','21232f297a57a5a743894a0e4a801fc3',1,0);

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `token`, `level`, `apply_public`) VALUES
('user','12dea96fec20593566ab75692c9949596833adc9','user','user@panel','ee11cbb19052e40b07aac0ca060c23ee',2,0)