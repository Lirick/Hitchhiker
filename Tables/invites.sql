--
-- Table structure for table `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `inviter_user_id` int(11) unsigned NOT NULL,
  `invited_user_id` int(11) unsigned NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  `invitation_accept` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Sends` (`inviter_user_id`),
  KEY `Gets` (`invited_user_id`),
  KEY `BlongsTo` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Constraints for table `invites`
--
ALTER TABLE `invites`
  ADD CONSTRAINT `BlongsTo` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `Gets` FOREIGN KEY (`invited_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Sends` FOREIGN KEY (`inviter_user_id`) REFERENCES `users` (`id`);

