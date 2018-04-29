SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS travel_agent;
CREATE SCHEMA travel_agent;
USE travel_agent;

CREATE TABLE hotel(
	  hotel_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	  hotel_name VARCHAR(45),
	  owner_name VARCHAR(45),
	  owner_contact VARCHAR(45),
	  Email_id VARCHAR(45),
	  address_id SMALLINT UNSIGNED NOT NULL, 
	  rating_of_hotel VARCHAR(45), 
	  facility_id SMALLINT UNSIGNED NOT NULL,
	  amenity_id SMALLINT UNSIGNED NOT NULL,
	  availability INT,
	  last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  PRIMARY KEY  (hotel_id),

	  KEY idx_fk_facility_id (facility_id),
	  CONSTRAINT `fk_facility` FOREIGN KEY (facility_id) REFERENCES facility (facility_id) ON DELETE RESTRICT ON UPDATE CASCADE,

	  KEY idx_fk_address_id (address_id),
	  CONSTRAINT `fk_address_city` FOREIGN KEY (address_id) REFERENCES address (address_id) ON DELETE RESTRICT ON UPDATE CASCADE,

	  KEY idx_fk_amenity_id (amenity_id),
	  CONSTRAINT `fk_amenity_city` FOREIGN KEY (amenity_id) REFERENCES amenity (amenity_id) ON DELETE RESTRICT ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE facility(
	facility_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	facility_ac SMALLINT,
	facility_wifi SMALLINT,
	facility_bedroom SMALLINT,
	facility_freebreakfast SMALLINT,
	facility_geyser SMALLINT,
	price INT,
	taken INT,
	last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY  (facility_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE address(
	address_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	longitude FLOAT,
	latitude FLOAT,
	address_line1 VARCHAR(197), 
	address_line2 VARCHAR(197),
	city VARCHAR(97),
	state VARCHAR(99),
	pincode INT, 

	last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY  (address_id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE amenity(
	amenity_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	parking INT,
	laundry INT,
	room_service INT,
	restaurent INT,
	swimming_pool INT,
	spa INT,
	gym INT,
	any_other VARCHAR(109), 

	last_update TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY  (amenity_id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;
