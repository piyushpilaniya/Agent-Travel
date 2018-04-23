DROP SCHEMA IF EXISTS rc;
CREATE SCHEMA rc;
USE rc;

CREATE TABLE hotel_rating (
 `rating_id` int(11) NOT NULL AUTO_INCREMENT,
 `login_id` int(11),
 `hotel_id` int(11),
 `rating_number` int(11),
 `total_points` int(11),
 `rated_time` datetime,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
 PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE transportation_rating (
 `rating_id` int(11) NOT NULL AUTO_INCREMENT,
 `login_id` int(11),
 `transport_id` int(11),
 `rating_number` int(11),
 `total_points` int(11),
 `rated_time` datetime,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
 PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE transportation_comments (
 `rating_id` int(11) NOT NULL AUTO_INCREMENT,
 `login_id` int(11),
 `transport_id` int(11),
 `rating_number` int(11),
 `total_points` int(11),
 `rated_time` datetime,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
 PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE hotel_comments (
 `rating_id` int(11) NOT NULL AUTO_INCREMENT,
 `login_id` int(11),
 `hotel_id` int(11),
 `rating_number` int(11),
 `total_points` int(11),
 `rated_time` datetime,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
 PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

