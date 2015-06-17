--
-- Database: `profession`
--
CREATE USER 'profession'@'%' IDENTIFIED BY 'ZfJnjYpsDnY94LJG';
GRANT USAGE ON * . * TO 'profession'@'%' IDENTIFIED BY 'ZfJnjYpsDnY94LJG' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
CREATE DATABASE IF NOT EXISTS `profession` ;
GRANT ALL PRIVILEGES ON `profession` . * TO 'profession'@'%';
-- --------------------------------------------------------

--
-- Use created DB
--
USE profession;
-- --------------------------------------------------------

--
-- Table structure for table `orientation`
--
CREATE TABLE IF NOT EXISTS `orientation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_orientation_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Table structure for table `job`
--
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orientation_id` int(11) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `activated` datetime NULL DEFAULT NULL,
  `seller_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('friss','kész','aktív') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'friss',
  PRIMARY KEY (`id`),
  KEY `ix_job_orientation_id` (`orientation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_orientation` FOREIGN KEY (`orientation_id`) REFERENCES `orientation` (`id`);
-- --------------------------------------------------------
