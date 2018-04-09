SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


USE travel_agent;

CREATE TABLE vehicles(
	  vehicle_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	  company_id SMALLINT UNSIGNED NOT NULL,
	  departure_time VARCHAR(45) NOT NULL,
	  arrival_time VARCHAR(45) NOT NULL,
	  boarding_point VARCHAR(45) NOT NULL,
	  dropping_point VARCHAR(45) NOT NULL, 
	  vehicle_facility_id SMALLINT UNSIGNED NOT NULL,
	  availability INT NOT NULL,
	  fare INT NOT NULL,
	  driver_contact VARCHAR(45) NOT NULL,
	  return_policy VARCHAR(100) NOT NULL,

	  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  PRIMARY KEY  (vehicle_id),

	  KEY idx_fk_vehicle_facility_id (vehicle_facility_id),
	  CONSTRAINT `fk_vehicle_facility` FOREIGN KEY (vehicle_facility_id) REFERENCES vehicle_facility (vehicle_facility_id) ON DELETE RESTRICT ON UPDATE CASCADE,

	  KEY idx_fk_company_id (company_id),
	  CONSTRAINT `fk_company` FOREIGN KEY (company_id) REFERENCES company (company_id) ON DELETE RESTRICT ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE vehicle_facility(
	vehicle_facility_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	facility_ac SMALLINT NOT NULL,
	facility_wifi SMALLINT NOT NULL,
	facility_refreshment SMALLINT NOT NULL,
	facility_any_other VARCHAR(103) NOT NULL,

	last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY  (vehicle_facility_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE company(
	company_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	company_name VARCHAR(197) NOT NULL, 
	office_address VARCHAR(197) NOT NULL,
	city VARCHAR(97) NOT NULL,
	state VARCHAR(99) NOT NULL,
	pincode INT NOT NULL, 
	company_contact VARCHAR(45) NOT NULL,
	company_email VARCHAR(45) NOT NULL,

	last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY  (company_id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

