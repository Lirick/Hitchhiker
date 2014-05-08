--
-- Table structure for table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `uid` int(11) unsigned NOT NULL COMMENT 'user who is tracked',
  `follower_id` int(11) NOT NULL COMMENT 'user who follows '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

