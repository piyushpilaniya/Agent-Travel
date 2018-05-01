USE travel_agent;

CREATE TABLE hotel_rating (
 rating_id int(11) NOT NULL AUTO_INCREMENT,
 email varchar(45),
 rating int(10),
 comment varchar(450),
 hotel_name varchar(60),
 hotel_id int(10),
 PRIMARY KEY (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE transportation_rating (
 rating_id int(11) NOT NULL AUTO_INCREMENT,
 email varchar(45),
 rating int(10),
 comment varchar(450),
 transport_name varchar(60),
 transport_id int(10),
 PRIMARY KEY (rating_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

