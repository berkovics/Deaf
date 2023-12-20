--Adatbázis Berkovics Gellért
create database deaf
character set utf8
collate utf8_hungarian_ci;

use regisztralj;

create Table 'deaf'.'regisztralj' 
('id' INT NOT NULL,
    'Keresztnev' VARCHAR(50) NOT NULL,
    'Vezeteknev' VARCHAR(50) NOT NULL,
    'neme' ENUM('m','f','o') NOT NULL,
    'email' VARCHAR(50) NOT NULL,
    'password' VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
