CREATE DATABASE `foodbook` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `foodbook`;


/*users*/
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

/*events*/
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `min_guests` int(11) NOT NULL,
  `max_guests` int(11) NOT NULL,
  `price_per_guest` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*users_events*/
CREATE TABLE IF NOT EXISTS `users_events` (
  `user_id` int(11) unsigned NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*cuisines*/
CREATE TABLE IF NOT EXISTS `cuisines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;


/*cuisines_events*/
CREATE TABLE IF NOT EXISTS `cuisines_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned NOT NULL,
  `cuisine_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `cuisine_id` (`cuisine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `cuisines_events`
--
ALTER TABLE `cuisines_events`
  ADD CONSTRAINT `cuisines_events_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `cuisines_events_ibfk_1` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisines` (`id`);


/*rating*/
CREATE TABLE IF NOT EXISTS `rating` (
  `user_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mark` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*userratings*/
DROP TABLE IF EXISTS `userratings`;
CREATE TABLE `userratings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userfrom` int(11) unsigned NOT NULL,
  `userto` int(11) unsigned NOT NULL,
  `rating` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



/*requestinvites*/
DROP TABLE IF EXISTS `requestinvites`;
CREATE TABLE `requestinvites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*recipes*/
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ingreds` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `tags` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sumratings` int(11) NOT NULL DEFAULT '0',
  `nrratings` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0 ;

/*locations*/
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `display_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `country` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*invitedto*/
DROP TABLE IF EXISTS `invitedto`;
CREATE TABLE `invitedto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*goingtos*/
DROP TABLE IF EXISTS `goingtos`;
CREATE TABLE `goingtos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*followers*/
CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL COMMENT 'user who is tracked',
  `follower_id` int(11) NOT NULL COMMENT 'user who follows ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

/*eventpics*/
CREATE TABLE IF NOT EXISTS `eventpics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `showed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

/*endorsers*/
CREATE TABLE IF NOT EXISTS `endorsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `endorser_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;


/*comments*/
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
