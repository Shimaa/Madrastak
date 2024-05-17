-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2012 at 08:56 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `madrastak`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendarevent`
--

CREATE TABLE IF NOT EXISTS `calendarevent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_arabic_name` varchar(45) DEFAULT NULL,
  `category_english_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_arabic_name`, `category_english_name`) VALUES
(1, 'اسلاميه', 'Islamic'),
(2, 'دوليه', 'International'),
(3, 'انجليزيه', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE IF NOT EXISTS `child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `school_name` varchar(45) DEFAULT NULL,
  `gradeLevel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `governate_id` int(11) DEFAULT NULL,
  `arabic_name` varchar(45) DEFAULT NULL,
  `english_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `governate_id`, `arabic_name`, `english_name`) VALUES
(1, 1, 'القاهره', 'cairo');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) DEFAULT NULL,
  `user_school_rating_id` int(11) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Comment_UserSchoolRating1` (`user_school_rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_text`
--

CREATE TABLE IF NOT EXISTS `content_text` (
  `id` int(11) NOT NULL,
  `key` varchar(45) DEFAULT NULL,
  `arabic` varchar(100) DEFAULT NULL,
  `english` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arabic_name` varchar(45) DEFAULT NULL,
  `english_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `arabic_name`, `english_name`) VALUES
(1, 'مصر', 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `detailedrating`
--

CREATE TABLE IF NOT EXISTS `detailedrating` (
  `id` int(11) NOT NULL,
  `english_name` varchar(45) NOT NULL,
  `arabic_name` varchar(45) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `arabic_name` varchar(45) DEFAULT NULL,
  `english_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `city_id`, `arabic_name`, `english_name`) VALUES
(1, 1, 'الحي العاشر', 'tenth district');

-- --------------------------------------------------------

--
-- Table structure for table `feerange`
--

CREATE TABLE IF NOT EXISTS `feerange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lower_value` varchar(45) DEFAULT NULL,
  `higher_value` varchar(45) DEFAULT NULL,
  `english_description` varchar(45) DEFAULT NULL,
  `arabic_description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `feerange`
--

INSERT INTO `feerange` (`id`, `lower_value`, `higher_value`, `english_description`, `arabic_description`) VALUES
(1, '0', '1000', 'Free', 'مجاني'),
(2, '1000', '5000', 'Low', 'منخفض'),
(3, '5000', '10000', 'Medium', 'متوسط'),
(4, '10000', '20000', 'Above Medium', 'متوسط عالي'),
(5, '20000', '40000', 'High', 'مرتفع'),
(6, '40000', '200000', 'Very High', 'مرتفع جدا');

-- --------------------------------------------------------

--
-- Table structure for table `governate`
--

CREATE TABLE IF NOT EXISTS `governate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `arabic_name` varchar(45) DEFAULT NULL,
  `english_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `governate`
--

INSERT INTO `governate` (`id`, `country_id`, `arabic_name`, `english_name`) VALUES
(1, 1, 'محافظه القاهره', 'Cairo '),
(2, 1, 'الأسكندريه', 'Alexandria');

-- --------------------------------------------------------

--
-- Table structure for table `gradelevel`
--

CREATE TABLE IF NOT EXISTS `gradelevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_arabic` varchar(45) DEFAULT NULL,
  `level_english` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gradelevel`
--

INSERT INTO `gradelevel` (`id`, `level_arabic`, `level_english`) VALUES
(1, 'حضانه', 'preschool'),
(2, 'ابتدائي', 'Elementry');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `governate_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `arabic_detailed_address` varchar(100) DEFAULT NULL,
  `english_detailed_address` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Location_Governate1` (`governate_id`),
  KEY `fk_Location_Country1` (`country_id`),
  KEY `fk_Location_City1` (`city_id`),
  KEY `fk_Location_District1` (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country_id`, `governate_id`, `city_id`, `district_id`, `arabic_detailed_address`, `english_detailed_address`, `latitude`, `longitude`) VALUES
(1, 1, 1, 1, 1, 'dummy data', 'dummy data', NULL, NULL),
(2, 1, 1, 1, 1, 'شارع جديد ', 'new Street', NULL, NULL),
(3, 1, 1, 1, 1, 'شارع رقم 7', 'street 7', NULL, NULL),
(4, 1, 1, 1, 1, 'شارع رقم 6', 'street 6', NULL, NULL),
(5, 1, 1, 1, 1, 'المنطقة الثالتة بالمعادي', '3rd Sector, Maadi', 29.960735, 31.313846);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `overall_rating` int(11) NOT NULL,
  `review_heading` varchar(45) DEFAULT NULL,
  `review_text` varchar(1000) DEFAULT NULL,
  `schools_categories_id` int(11) DEFAULT NULL,
  `schools_grade_level_id` int(11) DEFAULT NULL,
  `detailed_rating_1` int(11) DEFAULT NULL,
  `detailed_rating_2` int(11) DEFAULT NULL,
  `detailed_rating_3` int(11) DEFAULT NULL,
  `detailed_rating_4` int(11) DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `latest_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `school_ref_idx` (`school_id`),
  KEY `user_ref_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `school_id`, `user_id`, `overall_rating`, `review_heading`, `review_text`, `schools_categories_id`, `schools_grade_level_id`, `detailed_rating_1`, `detailed_rating_2`, `detailed_rating_3`, `detailed_rating_4`, `submit_date`, `latest_update`) VALUES
(1, 8, 5, 4, 'Nice but', 'I liked the school behavior so much but there are some problems that need to work on ', NULL, NULL, 3, 3, 4, 4, '2012-11-12 07:12:53', '2012-11-12 07:12:53'),
(2, 8, 5, 3, 'Moderate', 'the school is moderated ', NULL, NULL, 5, 3, 2, 5, '2012-11-12 07:16:11', '2012-11-12 07:16:11'),
(3, 8, 5, 5, 'I liked the schoooool', 'Wish I knew about ISR before I came to this school! ', NULL, NULL, 5, 4, 5, 5, '2012-11-12 09:06:08', '2012-11-12 09:06:08'),
(4, 8, 6, 3, 'OK', 'I''m a member, I love what you do! It''s truly empowering for teachers', NULL, NULL, 3, 3, 4, 2, '2012-11-12 09:16:03', '2012-11-12 09:16:03'),
(5, 9, 6, 4, 'Great School', 'Thanks for giving teachers an opportunity to write the truth about the schools they teach at ', NULL, NULL, 4, 5, 4, 4, '2012-11-12 09:33:35', '2012-11-12 09:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `english_name` varchar(45) DEFAULT NULL,
  `arabic_name` varchar(45) DEFAULT NULL,
  `telephone1` varchar(45) DEFAULT NULL,
  `telephone2` varchar(45) DEFAULT NULL,
  `telephone3` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `fee_range_id` int(11) DEFAULT NULL,
  `logo_path` varchar(45) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_School_Location` (`location_id`),
  KEY `fk_School_FeeRange1` (`fee_range_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `english_name`, `arabic_name`, `telephone1`, `telephone2`, `telephone3`, `email`, `website`, `location_id`, `fee_range_id`, `logo_path`, `other`) VALUES
(1, 'Cairo English School', 'القاهره', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'New English School', 'المدرسه الجديده', '42358925', '23546346', '643436346', 'new_english@hotmail.com', NULL, 2, NULL, NULL, NULL),
(3, 'any School', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(4, 'school', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL),
(5, 'second school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'third school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'fourth school', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Alyaa', 'العلياء', '7777712111', '35353666', NULL, 'info@alyaa.com', 'www.alyaa.com', 5, NULL, NULL, NULL),
(9, 'Waha', 'الواحة', '4567878', '456464', NULL, 'admin@waha.com', 'www.waha.com', NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schoolpictures`
--

CREATE TABLE IF NOT EXISTS `schoolpictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `english_description` varchar(500) DEFAULT NULL,
  `arabic_description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SchoolPictures_School1` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schoolscategories`
--

CREATE TABLE IF NOT EXISTS `schoolscategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SchoolsCategories_School1` (`school_id`),
  KEY `fk_SchoolsCategories_Category1` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schoolscategories`
--

INSERT INTO `schoolscategories` (`id`, `category_id`, `school_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolsgradelevels`
--

CREATE TABLE IF NOT EXISTS `schoolsgradelevels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `grade_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SchoolsGradeLevels_School1` (`school_id`),
  KEY `fk_SchoolsGradeLevels_GradeLevel1` (`grade_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schoolsgradelevels`
--

INSERT INTO `schoolsgradelevels` (`id`, `school_id`, `grade_level_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `schoolwithlocation`
--
CREATE TABLE IF NOT EXISTS `schoolwithlocation` (
`id` int(11)
,`location_id` int(11)
,`english_name` varchar(45)
,`arabic_name` varchar(45)
,`country_id` int(11)
,`governate_id` int(11)
,`city_id` int(11)
,`district_id` int(11)
,`arabic_detailed_address` varchar(100)
,`english_detailed_address` varchar(45)
);
-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `repeat_mode` int(11) DEFAULT NULL,
  `arabic_name` varchar(100) DEFAULT NULL,
  `englsih_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` binary(16) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_profile_id` int(11) DEFAULT NULL,
  `activation_token` varchar(10) DEFAULT NULL,
  `last_activation_request` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `signup_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_User_UserType1` (`user_type_id`),
  KEY `fk_User_UserProfile1` (`user_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `password`, `user_type_id`, `user_profile_id`, `activation_token`, `last_activation_request`, `active`, `signup_date`, `last_login`) VALUES
(2, 'alshimaa_cs@yahoo.com', 'Shimaa Gamil', ' ,\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 1, NULL, '4w5bv', NULL, NULL, '2012-11-11 13:22:59', NULL),
(3, 'as@as.com', 'as', ' ,\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 1, NULL, '4b5z1', NULL, NULL, '2012-11-11 13:32:05', NULL),
(4, 'asd@asd.com', 'asd', ' ,\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 1, NULL, '1k5wm', NULL, NULL, '2012-11-11 13:33:44', NULL),
(5, 'af@af.com', 'af', ' ,�b�Y[�K-#Kp', 1, NULL, 'xtmz0', NULL, 1, '2012-11-11 13:35:29', '2012-11-21 07:10:41'),
(6, 'eng.shimaa@gmail.com', 'Shimaa Gamil', '	�k�F!�s��N�&''��', 1, NULL, 'n9fjy', NULL, 1, '2012-11-12 09:04:02', '2012-11-12 09:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE IF NOT EXISTS `userprofile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `name_appear_as` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `job` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userschoolrating`
--

CREATE TABLE IF NOT EXISTS `userschoolrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_UserSchoolRating_School1` (`school_id`),
  KEY `fk_UserSchoolRating_User1` (`user_id`),
  KEY `fk_UserSchoolRating_Rating1` (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usersubscriptions`
--

CREATE TABLE IF NOT EXISTS `usersubscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `subscription_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_UserSubscriptions_User1` (`user_id`),
  KEY `fk_UserSubscriptions_Subscription1` (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  `english_name` varchar(45) DEFAULT NULL,
  `arabic_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `value`, `english_name`, `arabic_name`) VALUES
(1, 1, 'Parent', 'أب أو أم'),
(2, 2, 'Teacher', 'مدرس'),
(3, 4, 'Student', 'طالب'),
(4, 3, 'School', 'مدرسة');

-- --------------------------------------------------------

--
-- Structure for view `schoolwithlocation`
--
DROP TABLE IF EXISTS `schoolwithlocation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `schoolwithlocation` AS select `school`.`id` AS `id`,`location`.`id` AS `location_id`,`school`.`english_name` AS `english_name`,`school`.`arabic_name` AS `arabic_name`,`location`.`country_id` AS `country_id`,`location`.`governate_id` AS `governate_id`,`location`.`city_id` AS `city_id`,`location`.`district_id` AS `district_id`,`location`.`arabic_detailed_address` AS `arabic_detailed_address`,`location`.`english_detailed_address` AS `english_detailed_address` from (`school` join `location` on((`school`.`location_id` = `location`.`id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Comment_UserSchoolRating1` FOREIGN KEY (`user_school_rating_id`) REFERENCES `userschoolrating` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_Location_City1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_Country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_District1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_Governate1` FOREIGN KEY (`governate_id`) REFERENCES `governate` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `school_ref` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ref` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `fk_School_FeeRange1` FOREIGN KEY (`fee_range_id`) REFERENCES `feerange` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_School_Location` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schoolpictures`
--
ALTER TABLE `schoolpictures`
  ADD CONSTRAINT `fk_SchoolPictures_School1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schoolscategories`
--
ALTER TABLE `schoolscategories`
  ADD CONSTRAINT `fk_SchoolsCategories_Category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SchoolsCategories_School1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schoolsgradelevels`
--
ALTER TABLE `schoolsgradelevels`
  ADD CONSTRAINT `fk_SchoolsGradeLevels_GradeLevel1` FOREIGN KEY (`grade_level_id`) REFERENCES `gradelevel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SchoolsGradeLevels_School1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_UserProfile1` FOREIGN KEY (`user_profile_id`) REFERENCES `userprofile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_UserType1` FOREIGN KEY (`user_type_id`) REFERENCES `usertype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userschoolrating`
--
ALTER TABLE `userschoolrating`
  ADD CONSTRAINT `fk_UserSchoolRating_Rating1` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UserSchoolRating_School1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UserSchoolRating_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usersubscriptions`
--
ALTER TABLE `usersubscriptions`
  ADD CONSTRAINT `fk_UserSubscriptions_Subscription1` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UserSubscriptions_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
