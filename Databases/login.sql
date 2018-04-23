SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

USE travel_agent;

create table login(
login_id UNSIGNED INT NOT NULL AUTO INCREMENT,
username VARCHAR(30),
password VARCHAR(30),
first_name VARCHAR(50),
last_name VARCHAR(50),
category VARCHAR(20),
email VARCHAR(50),
PRIMARY KEY(login_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;