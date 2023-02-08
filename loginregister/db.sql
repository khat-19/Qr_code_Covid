CREATE TABLE IF NOT EXISTS `users` (
    `id` AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `serial` varchar(50) NOT NULL,
    `travel_doc` varchar(50) NOT NULL,
    `dob` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `number` varchar(50) NOT NULL,
    `yell_fev_vacc_no` varchar(50) NOT NULL,
    `yell_fev_vacc_date` varchar(50) NOT NULL,
    `evd_vaccin` varchar(50) NOT NULL,
    `dateofevd_vaccin` varchar(50) NOT NULL,
    `gender` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
);