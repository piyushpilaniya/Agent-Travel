SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


USE travel_agent;

CREATE TABLE vehicles(
	  vehicle_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	  company_id SMALLINT UNSIGNED NOT NULL,
	  departure_time VARCHAR(45),
	  arrival_time VARCHAR(45),
	  boarding_point VARCHAR(45),
	  dropping_point VARCHAR(45), 
	  vehicle_facility_id SMALLINT UNSIGNED NOT NULL,
	  availability INT,
	  fare INT,
	  driver_contact VARCHAR(45),
	  return_policy VARCHAR(100),

	  PRIMARY KEY  (vehicle_id),

	  KEY idx_fk_vehicle_facility_id (vehicle_facility_id),
	  CONSTRAINT `fk_vehicle_facility` FOREIGN KEY (vehicle_facility_id) REFERENCES vehicle_facility (vehicle_facility_id) ON DELETE RESTRICT ON UPDATE CASCADE,

	  KEY idx_fk_company_id (company_id),
	  CONSTRAINT `fk_company` FOREIGN KEY (company_id) REFERENCES company (company_id) ON DELETE RESTRICT ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE vehicle_facility(
	vehicle_facility_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	facility_ac SMALLINT,
	facility_wifi SMALLINT,
	facility_refreshment SMALLINT,
	
	
	PRIMARY KEY  (vehicle_facility_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE company(
	company_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	company_name VARCHAR(197), 
	office_address VARCHAR(197),
	city VARCHAR(97),
	state VARCHAR(99),
	pincode INT, 
	company_contact VARCHAR(45),
	company_email VARCHAR(45),

		
	PRIMARY KEY  (company_id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
